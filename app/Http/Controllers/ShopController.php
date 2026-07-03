<?php

namespace App\Http\Controllers;

use App\Constants\PrescriptionOptions;
use App\Models\Admin\Glass;
use App\Models\Admin\LensIndex;
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
            'products'       => Product::with(['categories', 'attributeValues'])->paginate(15),
            'category'       => null,
            'categoriesTree' => ProductService::buildCategoriesTree(),
        ]);
    }

    /** Show products from a specific category (including descendants)
     *
     * @param string $category_slug
     * @return View
     */
    public function category(string $category_slug)
    {
        $category    = Category::where('slug', $category_slug)->firstOrFail();
        $categoryIds = ProductService::getCategoryIds($category);

        $products = Product::with(['categories', 'attributeValues'])
            ->whereHas('categories', function ($query) use ($categoryIds) {
                $query->whereIn('category_id', $categoryIds);
            })
            ->paginate(15);

        return view('Frontend.shop.Shop', [
            'products'       => $products,
            'category'       => $category,
            'categoriesTree' => ProductService::buildCategoriesTree(),
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
        // dd($sessionProducts);
        $productIds = array_keys($sessionProducts);

        $databaseProducts = Product::whereIn('id', $productIds)
            ->get()
            ->keyBy('id');

        $products = [];

        foreach ($sessionProducts as $productId => $cartProduct) {
            $product = $databaseProducts->get((int) $productId);

            if (! $product) {
                continue;
            }

            $price = (float) $product->price;
            $discount = (int) $product->discount;
            $finalPrice = $discount > 0 ? $price - (($price * $discount) / 100) : $price;

            $products[$productId] = array_merge($cartProduct, [
                'product_id'  => $product->id,
                'name'        => $product->name,
                'slug'        => $product->slug,
                'price'       => $price,
                'discount'    => $discount,
                'final_price' => round($finalPrice, 2),
                'image'       => $product->main_image,
            ]);
        }

        $subtotal = 0;

        foreach ($products as $product) {
            $subtotal += $product['final_price'] * $product['quantity'];
        }

        return view('Frontend.shop.Cart', [
            'products' => $products,
            'subtotal' => $subtotal,
        ]);
    }


    /** Show a specific product
     *
     * @param string $slug
     * @return View
     */
    public function show(string $slug)
    {
        $product = Product::with(['categories.parent', 'categories.children', 'attributeValues.type', 'variants', 'variantParent'])
            ->where('slug', $slug)
            ->first();

        if (! $product) {
            return view('errors.ProductNotFound');
        }

        // Add the viewed product to Last 10 viewed products
        $this->lastViewedProducts($product);

        $isProductDioptric = ProductService::isProductDioptric($product);

        $category = $product->categories->first();

        while ($category && $category->parent) {
            $category = $category->parent;
        }

        $glasses = Glass::with('values')
            ->where('category_id', $category->id)
            ->get();

        return view('Frontend.shop.Show', [
            'product'           => $product,
            'isProductDioptric' => $isProductDioptric,
            'sphValues'         => PrescriptionOptions::SPH,
            'cylValues'         => PrescriptionOptions::CYL,
            'addValues'         => PrescriptionOptions::CYL,
            'axisValues'        => PrescriptionOptions::AXIS,
            'lens'              => LensIndex::get(),
            'glasses'           => $glasses,
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

        // Keep only the latest 10 viewed products.
        $lastViewedProducts = array_slice(
            $lastViewedProducts,
            0,
            10,
            true
        );

        Session::put('lastViewedProducts', $lastViewedProducts);
    }
}
