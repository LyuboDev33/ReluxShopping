<?php

namespace App\Http\Controllers;

use App\Constants\PrescriptionOptions;
use App\Models\Admin\Glass;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;
use App\Services\ShopService;
use App\Services\SpeedyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ShopController extends Controller
{
    /** Show all products */
    public function index(Request $request)
    {
        if ($redirect = ShopService::filterLinks($request)) {
            return $redirect;
        }

        $filters = $request->except('page');

        $query = Product::with([
            'categories',
            'attributeValues.type',
        ]);

        // Apply filters if any exist
        if (! empty($filters)) {

            foreach ($filters as $attributeTypeSlug => $attributeValueSlug) {

                $query->whereHas('attributeValues', function ($query) use (
                    $attributeTypeSlug,
                    $attributeValueSlug
                ) {
                    $query->where('slug', $attributeValueSlug)
                        ->whereHas('type', function ($query) use ($attributeTypeSlug) {
                            $query->where('slug', $attributeTypeSlug);
                        });
                });
            }
        }

        $products = $query
            ->orderByDesc('id')
            ->paginate(15);

        foreach ($products as $product) {
            $brand = $product->attributeValues->first(
                fn($attribute) => $attribute->type->name === 'Марка'
            );

            $product->brand = $brand?->value;
        }

        return view('Frontend.shop.Shop', [
            'products' => $products,
            'category' => null,
            'categoriesTree' => ProductService::buildCategoriesTree(),
            'filters' => ShopService::filters(),
        ]);
    }

    /**
     * Show products from a specific category, including descendants.
     *
     * @param string $category_slug
     * @return View
     */
    public function category(Request $request, string $category_slug
    ) {
        if ($redirect = ShopService::filterLinks($request)) {
            return $redirect;
        }

        $category = Category::where('slug', $category_slug)
            ->firstOrFail();

        $categoryIds = ProductService::getCategoryIds($category);

        // Do not treat the pagination parameter as a product filter.
        $filters = $request->except('page');

        $query = Product::with([
            'categories',
            'attributeValues.type',
        ])
            ->whereHas('categories', function ($query) use ($categoryIds) {
                $query->whereIn('category_id', $categoryIds);
            });

        if (! empty($filters)) {
            foreach ($filters as $attributeTypeSlug => $attributeValueSlug) {
                $query->whereHas(
                    'attributeValues',
                    function ($query) use (
                        $attributeTypeSlug,
                        $attributeValueSlug
                    ) {
                        $query->where('slug', $attributeValueSlug)
                            ->whereHas(
                                'type',
                                function ($query) use ($attributeTypeSlug) {
                                    $query->where(
                                        'slug',
                                        $attributeTypeSlug
                                    );
                                }
                            );
                    }
                );
            }
        }

        $products = $query
            ->orderByDesc('id')
            ->paginate(15)
            ->withQueryString();

        foreach ($products as $product) {
            $brand = $product->attributeValues->first(
                fn($attribute) =>
                $attribute->type?->name === 'Марка'
            );

            $product->brand = $brand?->value;
        }

        $categoriesTree = ProductService::buildCategoriesTree();

        $breadcrumbs = ProductService::getCategoryBreadcrumbs(
            $categoriesTree,
            $category->slug
        );

        return view('Frontend.shop.Shop', [
            'products' => $products,
            'category' => $category,
            'categoriesTree' => $categoriesTree,
            'breadcrumbs' => $breadcrumbs,
            'filters' => ShopService::filters(),
        ]);
    }

    /** Show the checkout */
    public function checkout(): View|RedirectResponse
    {
        $products = Session::get('products', []);

        /** If there are no products, redirect to the shop */
        if (empty($products)) {
            Session::forget('promo_code');

            return redirect()->route('shop.index');
        }

        $subtotal = ShopService::calculateSubtotal($products);

        $promoCode = Session::get('promo_code');

        $promoPercentage = 0;
        $promoDiscount = 0;

        if ($promoCode !== null) {
            $promoPercentage = (int) (
                $promoCode['percentage_promo_code'] ?? 0
            );

            if ($promoPercentage > 0 && $promoPercentage <= 100) {
                $promoDiscount = round(
                    ($subtotal * $promoPercentage) / 100,
                    2
                );

                $subtotal = round($subtotal - $promoDiscount, 2);
            }
        }

        return view('Frontend.shop.Checkout', [
            'speedyOffices' => SpeedyService::offices(),
            'products' => $products,
            'subtotal' => $subtotal,
            'promoCode' => $promoCode,
            'promoPercentage' => $promoPercentage,
            'promoDiscount' => $promoDiscount,
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

            $lineTotal = ShopService::calculateProductTotal($cartProduct);

            $products[$key] = array_merge($cartProduct, [
                'product_id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => (float) $product->price,
                'discount' => (int) $product->discount,
                'image' => $product->main_image,
                'quantity' => $quantity,
                'final_price' => $finalPrice,
                'line_total' => $lineTotal,
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
        ShopService::lastViewedProducts($product);
        $similarProducts = ShopService::similarProducts($product);


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
            'product' => $product,
            'sphValues' => PrescriptionOptions::SPH,
            'cylValues' => PrescriptionOptions::CYL,
            'pdValues' => PrescriptionOptions::PD,
            'axisValues' => PrescriptionOptions::AXIS,
            'glasses' => $glasses,
            'visionTypes' => $visionTypes,
            'similarProducts' => $similarProducts,
            'productFinalPrice' => $product->discount
                ? $product->price
                - ($product->price * $product->discount) / 100
                : $product->price,
        ]);
    }

    /** Redirect after succesfull order */
    public function success()
    {
        return view('Frontend.shop.success');
    }

    /** Show the wishlist
     *
     * @return View
     */
    public function wishlist(): View
    {
        return view('Frontend.wishlist', [
            'wishlist' => Session::get('wishlist', []),
        ]);
    }

    /**
     * Add a product to wishlist
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function addToWishlist(Product $product): JsonResponse
    {
        return ShopService::addToWishlist($product);
    }

    /**
     * Validate and apply a promo code to the current cart.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function applyPromoCode(Request $request)
    {
        return ShopService::applyPromoCode($request);
    }
}
