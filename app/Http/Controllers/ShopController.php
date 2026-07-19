<?php

namespace App\Http\Controllers;

use App\Constants\PrescriptionOptions;
use App\Models\Admin\Glass;
use App\Models\Admin\LanceColor;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;
use App\Services\SpeedyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;


class ShopController extends Controller
{
    /** Show all products */
    public function index()
    {
        return view('Frontend.shop.Shop', [
            'products'       => Product::with(['categories', 'attributeValues'])
                ->orderBy('id', 'desc')
                ->paginate(15),
            'category'       => null,
            'categoriesTree' => ProductService::buildCategoriesTree(),
        ]);
    }

    /**
     * Show products from a specific category, including descendants.
     *
     * @param string $category_slug
     * @return View
     */
    public function category(string $category_slug)
    {
        $category = Category::where('slug', $category_slug)
            ->firstOrFail();

        $categoryIds = ProductService::getCategoryIds($category);

        $products = Product::with([
            'categories',
            'attributeValues',
        ])
            ->whereHas('categories', function ($query) use ($categoryIds) {
                $query->whereIn('category_id', $categoryIds);
            })
            ->paginate(15);

        $categoriesTree = ProductService::buildCategoriesTree();

        $breadcrumbs = ProductService::getCategoryBreadcrumbs($categoriesTree, $category->slug);

        return view('Frontend.shop.Shop', [
            'products' => $products,
            'category' => $category,
            'categoriesTree' => $categoriesTree,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /** Show the checkout */
    public function checkout()
    {
        $products = Session::get('products');

        if (! $products || count($products) <= 0) {
            return redirect(route('cart'));
        }

        $subtotal = 0;

        foreach ($products as $product) {
            $subtotal += $product['final_price'] * $product['quantity'];

            if (! empty($product['lens_index'])) {
                $subtotal += $product['lens_index']['price'] * $product['quantity'];
            }

            if (! empty($product['glass_value'])) {
                $subtotal += $product['glass_value']['price'] * $product['quantity'];
            }
        }


        return view('Frontend.shop.Checkout', [
            'speedyOffices' => SpeedyService::offices(),
            'products'      => $products,
            'subtotal'      => $subtotal,
        ]);
    }

    /** Show the cart */
    public function cart()
    {
        $sessionProducts = Session::get('products', []);

        $productIds = [];

        foreach ($sessionProducts as $sessionProduct) {
            $productIds[] = $sessionProduct['product_id'];
        }

        $databaseProducts = Product::whereIn('id', $productIds)
            ->get()
            ->keyBy('id');

        $products = [];
        $subtotal = 0;

        foreach ($sessionProducts as $key => $cartProduct) {
            $product = $databaseProducts->get($cartProduct['product_id']);

            if (! $product) {
                continue;
            }

            $quantity = (int) ($cartProduct['quantity'] ?? 1);
            $finalPrice = (float) ($cartProduct['final_price'] ?? 0);

            /*
         * Start with the frame price.
         */
            $lineTotal = $finalPrice * $quantity;

            /*
         * Add the lens index price.
         */
            if (! empty($cartProduct['lens_index'])) {
                $lensIndexPrice = (float) ($cartProduct['lens_index']['price'] ?? 0);

                $lineTotal += $lensIndexPrice * $quantity;
            }

            /*
         * Add the glass option price.
         */
            if (! empty($cartProduct['glass_value'])) {
                $glassValuePrice = (float) ($cartProduct['glass_value']['price'] ?? 0);

                $lineTotal += $glassValuePrice * $quantity;
            }

            $products[$key] = array_merge($cartProduct, [
                'product_id'  => $product->id,
                'name'        => $product->name,
                'slug'        => $product->slug,
                'price'       => (float) $product->price,
                'discount'    => (int) $product->discount,
                'image'       => $product->main_image,
                'quantity'    => $quantity,
                'final_price' => $finalPrice,
                'line_total'  => round($lineTotal, 2),
            ]);

            $subtotal += $lineTotal;
        }

        return view('Frontend.shop.Cart', [
            'products' => $products,
            'subtotal' => round($subtotal, 2),
        ]);
    }

    /**
     * Show a specific product.
     *
     * @param string $slug
     * @return View
     */
    public function show(string $slug)
    {
        $product = Product::with([
            'categories.parent',
            'categories.children',
            'attributeValues.type',
            'variants',
            'variantParent',
        ])
            ->where('slug', $slug)
            ->first();

        if (! $product) {
            return view('errors.ProductNotFound');
        }

        // Add each product to last viewed
        $this->lastViewedProducts($product);

        $similarProducts = Product::with([
            'categories',
            'attributeValues.type',
        ])
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->latest('id')
            ->take(4)
            ->get()
            ->map(function ($similarProduct) {
                $brand = $similarProduct->attributeValues->first(
                    fn($attributeValue) => $attributeValue->type?->name === 'Марка'
                );

                $similarProduct->brand = $brand?->value;

                return $similarProduct;
            });

        $isProductDioptric = ProductService::isProductDioptric($product);

        $category = $product->categories->first();

        while ($category && $category->parent) {
            $category = $category->parent;
        }

        $glasses = $category
            ? Glass::with([
                'values.lensIndexes',
                'category',
                'visionType',
            ])
            ->where('category_id', $category->id)
            ->get()
            : collect();

        $visionTypes = $glasses
            ->pluck('visionType')
            ->filter()
            ->unique('id')
            ->values();

        return view('Frontend.shop.Show', [
            'product'           => $product,
            'isProductDioptric' => $isProductDioptric,
            'sphValues'         => PrescriptionOptions::SPH,
            'cylValues'         => PrescriptionOptions::CYL,
            'pdValues'          => PrescriptionOptions::PD,
            'axisValues'        => PrescriptionOptions::AXIS,
            'glasses'           => $glasses,
            'visionTypes'       => $visionTypes,
            'similarProducts'   => $similarProducts,
            'productFinalPrice' => $product->discount
                ? $product->price - ($product->price * $product->discount) / 100
                : $product->price,
        ]);
    }


    /** Redirect after succesfull order */
    public function success()
    {
        return view('Frontend.shop.success');
    }

    /** Show the wishlist */
    public function wishlist()
    {
        return view('Frontend.wishlist', [
            'wishlist' => Session::get('wishlist', [])
        ]);
    }

    /** Add a product to wishlist
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function addToWishlist(Request $request, Product $product): JsonResponse
    {
        $wishlist = Session::get('wishlist', []);

        $productId = $product->id;

        if (isset($wishlist[$productId])) {
            unset($wishlist[$productId]);

            Session::put('wishlist', $wishlist);

            return response()->json([
                'success' => true,
                'action' => 'removed',
                'count' => count($wishlist),
            ]);
        }

        $finalPrice = $product->discount ? $product->price - (($product->price * $product->discount) / 100) : $product->price;

        $wishlist[$productId] = [
            'id' => $product->id,
            'name' => $product->name,
            'slug' => $product->slug,
            'url' => route('shop.show', $product->slug),
            'price' => $product->price,
            'discount' => $product->discount,
            'final_price' => round($finalPrice, 2),
            'image' => $product->main_image,
        ];

        Session::put('wishlist', $wishlist);

        return response()->json([
            'success' => true,
            'action' => 'added',
            'message' => 'Продуктът беше добавен в любими.',
            'count' => count($wishlist),
        ]);
    }

    /** This function creates the session for last 10 viewed products
     *
     * @param Product $product
     * @return void
     */
    private function lastViewedProducts(Product $product): void
    {
        $lastViewedProducts = Session::get('lastViewedProducts', []);

        // If the product has already been viewed,
        // remove it so we can place it at the beginning.
        if (isset($lastViewedProducts[$product->id])) {
            unset($lastViewedProducts[$product->id]);
        }

        $finalPrice = $product->discount ? $product->price - (($product->price * $product->discount) / 100) : $product->price;

        // Add the newest product to the beginning of the array.
        $lastViewedProducts = [
            $product->id => [
                'id'          => $product->id,
                'name'        => $product->name,
                'slug'        => $product->slug,
                'url'         => route('shop.show', $product->slug),
                'image'       => $product->main_image,
                'price'       => $product->price,
                'discount'    => $product->discount,
                'final_price' => round($finalPrice, 2),
            ],
        ] + $lastViewedProducts;

        // Keep only the latest 4 viewed products.
        $lastViewedProducts = array_slice(
            $lastViewedProducts,
            0,
            4,
            true
        );

        Session::put('lastViewedProducts', $lastViewedProducts);
    }
}
