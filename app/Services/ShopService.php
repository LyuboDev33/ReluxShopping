<?php

namespace App\Services;

use App\Models\Admin\Promocode;
use App\Models\AttributeType;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class ShopService
{

    /**
     * Calculate the subtotal for all products.
     *
     * @param array $products
     * @return float
     */
    public static function calculateSubtotal(array $products): float
    {
        $subtotal = 0;

        foreach ($products as $product) {
            $subtotal += self::calculateProductTotal($product);
        }

        return round($subtotal, 2);
    }

    /**
     * Calculate the total price for one product.
     *
     * @param array $product
     * @return float
     */
    public static function calculateProductTotal(array $product): float
    {
        $quantity = (int) ($product['quantity'] ?? 1);
        $finalPrice = (float) ($product['final_price'] ?? 0);

        $total = $finalPrice * $quantity;

        if (! empty($product['lens_index'])) {
            $lensIndexPrice = (float) (
                $product['lens_index']['price'] ?? 0
            );

            $total += $lensIndexPrice * $quantity;
        }

        if (! empty($product['glass_value'])) {
            $glassValuePrice = (float) (
                $product['glass_value']['price'] ?? 0
            );

            $total += $glassValuePrice * $quantity;
        }

        return round($total, 2);
    }

    /**
     * This method returns all filters
     *
     * @return array[]
     */
    public static function filters(): array
    {
        $types = AttributeType::with('values')->get();

        $filters = [];

        foreach ($types as $type) {
            $values = [];

            foreach ($type->values as $value) {
                $values[$value->id] = [
                    'name' => $value->value,
                    'slug' => $value->slug,
                ];
            }

            if (! empty($values)) {
                $filters[] = [
                    'name' => $type->name,
                    'slug' => $type->slug,
                    'values' => array_values($values),
                ];
            }
        }

        return $filters;
    }

    /**
     * Remove empty values from the filter URL.
     *
     * @param Request $request
     * @return RedirectResponse|null
     */
    public static function filterLinks(Request $request)
    {
        $cleanQuery = [];

        foreach ($request->query() as $key => $value) {
            if ($value !== null && $value !== '') {
                $cleanQuery[$key] = $value;
            }
        }

        if ($cleanQuery == $request->query()) {
            return null;
        }

        return redirect()->to(
            $request->url() . '?' . http_build_query($cleanQuery)
        );
    }

    /**
     * Add a product to wishlist
     *
     * @param Product $product
     * @return JsonResponse
     */
    public static function addToWishlist(Product $product): JsonResponse
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

        $finalPrice = $product->discount
            ? $product->price - (($product->price * $product->discount) / 100)
            : $product->price;

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

    /**
     * This function creates the session for last 10 viewed products
     *
     * @param Product $product
     * @return void
     */
    public static function lastViewedProducts(Product $product): void
    {
        $lastViewedProducts = Session::get('lastViewedProducts', []);

        // If the product has already been viewed,
        // remove it so we can place it at the beginning.
        if (isset($lastViewedProducts[$product->id])) {
            unset($lastViewedProducts[$product->id]);
        }

        $finalPrice = $product->discount
            ? $product->price - (($product->price * $product->discount) / 100)
            : $product->price;

        // Add the newest product to the beginning of the array.
        $lastViewedProducts = [
            $product->id => [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'url' => route('shop.show', $product->slug),
                'image' => $product->main_image,
                'price' => $product->price,
                'discount' => $product->discount,
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

    /**
     * Apply the promo code
     * @param Request $request
     */

    public static function applyPromoCode($request): JsonResponse
    {

        $validated = $request->validate([
            'promo_code' => [
                'required',
                'string',
                'max:255',
            ],
        ], [
            'promo_code.required' => 'Моля, въведете промо код.',
            'promo_code.string' => 'Промо кодът е невалиден.',
            'promo_code.max' => 'Промо кодът е прекалено дълъг.',
        ]);

        $promoCode = Promocode::query()
            ->where(
                'promo_code_name',
                trim($validated['promo_code'])
            )
            ->where('is_active', true)
            ->first();

        if (! $promoCode) {
            return response()->json([
                'success' => false,
                'message' =>
                'Промо кодът е невалиден или не е активен.',
            ], 422);
        }

        $percentage = (int) $promoCode->percentage_promo_code;

        if ($percentage <= 0 || $percentage > 100) {
            return response()->json([
                'success' => false,
                'message' =>
                'Промо кодът има невалиден процент отстъпка.',
            ], 422);
        }

        Session::put('promo_code', [
            'promo_code_name' => $promoCode->promo_code_name,
            'percentage_promo_code' => $percentage,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Промо кодът беше приложен успешно.',
        ]);
    }

    /**
     * Get similar products.
     *
     * @param Product $product
     * @return Collection
     */
    public static function similarProducts(Product $product)
    {
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
                    fn($attributeValue) =>
                    $attributeValue->type?->name === 'Марка'
                );

                $similarProduct->brand = $brand?->value;

                return $similarProduct;
            });

        return $similarProducts;
    }
}
