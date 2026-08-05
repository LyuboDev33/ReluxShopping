<?php

namespace App\Http\Controllers;

use App\Mail\OrderCreated;
use App\Models\Admin\Promocode;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class OrdersController extends Controller
{



    /**
     * Add a product to the session cart.
     *
     * @param Request $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function addProduct(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'quantity' => [
                'required',
                'integer',
                'min:1',
            ],
        ], [
            'quantity.required' => 'Моля, изберете количество.',
            'quantity.integer' => 'Количеството трябва да бъде цяло число.',
            'quantity.min' => 'Количеството трябва да бъде поне 1.',
        ]);

        $quantity = (int) $validated['quantity'];
        $stock = (int) $product->stock;

        if ($stock <= 0) {
            return back()
                ->withErrors([
                    'stock' => 'Този продукт няма наличност.',
                ])
                ->withInput();
        }

        if ($quantity > $stock) {
            return back()
                ->withErrors([
                    'quantity' => 'Няма достатъчна наличност за желаното количество.',
                ])
                ->withInput();
        }

        $finalPrice = $product->discount
            ? $product->price - (($product->price * $product->discount) / 100)
            : $product->price;

        $products = Session::get('products', []);

        $productKey = (string) $product->id;

        $existingQuantity = isset($products[$productKey])
            ? (int) $products[$productKey]['quantity']
            : 0;

        $newQuantity = $existingQuantity + $quantity;

        if ($newQuantity > $stock) {
            return back()
                ->withErrors([
                    'quantity' => 'Няма достатъчна наличност за желаното количество.',
                ])
                ->withInput();
        }

        $products[$productKey] = [
            'product_id' => $product->id,
            'name' => $product->name,
            'slug' => $product->slug,
            'price' => (float) $product->price,
            'discount' => $product->discount,
            'final_price' => (float) $finalPrice,
            'quantity' => $newQuantity,
            'image' => $product->main_image,
        ];

        Session::put('products', $products);

        return back()->with(
            'success',
            'Продуктът беше добавен успешно в количката!'
        );
    }

    /** Remove a product from the cart
     *
     * @param int $productId
     * @return RedirectResponse
     */
    public function removeProduct($productId): RedirectResponse
    {
        $products = Session::get('products', []);

        if (isset($products[$productId])) {

            if (! empty($products[$productId]['prescription_image'])) {

                Storage::disk('public')->delete(
                    $products[$productId]['prescription_image']
                );
            }

            unset($products[$productId]);

            Session::put('products', $products);
        }

        return back()->with(
            'success',
            'Продуктът беше премахнат успешно от количката.'
        );
    }

    /**
     * Create a new order.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],

            'delivery_method' => ['required', 'in:personal,office'],

            'city' => ['required_if:delivery_method,personal', 'nullable', 'string', 'max:255'],
            'billing_address' => ['required_if:delivery_method,personal', 'nullable', 'string', 'max:255'],
            'office_list' => ['required_if:delivery_method,office', 'nullable', 'string', 'max:255'],

            'request_invoice' => ['nullable', 'boolean'],

            'company_name' => ['nullable', 'required_if:request_invoice,1', 'string', 'max:255'],
            'company_mol' => ['nullable', 'required_if:request_invoice,1', 'string', 'max:255'],
            'company_bulstat' => ['nullable', 'required_if:request_invoice,1', 'string', 'max:255'],
            'company_address' => ['nullable', 'required_if:request_invoice,1', 'string', 'max:255'],
        ], [
            'fname.required' => 'Моля, въведете вашето име.',
            'fname.max' => 'Името не може да бъде по-дълго от 255 символа.',

            'lname.required' => 'Моля, въведете вашата фамилия.',
            'lname.max' => 'Фамилията не може да бъде по-дълга от 255 символа.',

            'phone.required' => 'Моля, въведете телефонен номер.',
            'phone.max' => 'Телефонният номер не може да бъде по-дълъг от 255 символа.',

            'email.required' => 'Моля, въведете имейл адрес.',
            'email.email' => 'Моля, въведете валиден имейл адрес.',
            'email.max' => 'Имейл адресът не може да бъде по-дълъг от 255 символа.',

            'delivery_method.required' => 'Моля, изберете начин на доставка.',
            'delivery_method.in' => 'Избраният начин на доставка е невалиден.',

            'city.required_if' => 'Моля, изберете град.',
            'city.max' => 'Градът не може да бъде по-дълъг от 255 символа.',

            'billing_address.required_if' => 'Моля, въведете адрес за доставка.',
            'billing_address.max' => 'Адресът не може да бъде по-дълъг от 255 символа.',

            'office_list.required_if' => 'Моля, изберете офис на Speedy.',
            'office_list.max' => 'Избраният офис не може да бъде по-дълъг от 255 символа.',

            'company_name.required_if' => 'Моля, въведете името на фирмата.',
            'company_name.max' => 'Името на фирмата не може да бъде по-дълго от 255 символа.',

            'company_mol.required_if' => 'Моля, въведете името на МОЛ.',
            'company_mol.max' => 'Името на МОЛ не може да бъде по-дълго от 255 символа.',

            'company_bulstat.required_if' => 'Моля, въведете ЕИК / Булстат.',
            'company_bulstat.max' => 'Булстатът не може да бъде по-дълъг от 255 символа.',

            'company_address.required_if' => 'Моля, въведете адреса на фирмата.',
            'company_address.max' => 'Адресът на фирмата не може да бъде по-дълъг от 255 символа.',
        ]);

        $cartProducts = Session::get('products', []);

        if (empty($cartProducts)) {
            return back()
                ->withErrors([
                    'cart' => 'Количката е празна.',
                ])
                ->withInput();
        }

        $sessionPromoCode = Session::get('promo_code');

        try {
            $transactionResult = DB::transaction(function () use (
                $validated,
                $cartProducts,
                $sessionPromoCode
            ) {
                $subtotal = 0;

                foreach ($cartProducts as $product) {
                    $subtotal +=
                        (float) $product['final_price'] *
                        (int) $product['quantity'];
                }

                $promoCodeName =
                    $sessionPromoCode['promo_code_name'] ?? null;

                $order = Order::create([
                    'order_number' =>
                    'ORD-' . date('dmy') . '-' . random_int(1000, 9999),
                    'first_name' => $validated['fname'],
                    'last_name' => $validated['lname'],
                    'phone' => $validated['phone'],
                    'email' => $validated['email'],

                    'delivery_method' => $validated['delivery_method'],

                    'city' => $validated['delivery_method'] === 'personal'
                        ? ($validated['city'] ?? null)
                        : null,

                    'personal_address' =>
                    $validated['delivery_method'] === 'personal'
                        ? ($validated['billing_address'] ?? null)
                        : null,

                    'courier' =>
                    $validated['delivery_method'] === 'office'
                        ? 'speedy'
                        : null,

                    'office_list' =>
                    $validated['delivery_method'] === 'office'
                        ? ($validated['office_list'] ?? null)
                        : null,

                    'request_invoice' =>
                    (bool) ($validated['request_invoice'] ?? false),

                    'company_name' =>
                    $validated['company_name'] ?? null,

                    'company_mol' =>
                    $validated['company_mol'] ?? null,

                    'company_bulstat' =>
                    $validated['company_bulstat'] ?? null,

                    'company_address' =>
                    $validated['company_address'] ?? null,

                    'subtotal' => $subtotal,
                    'promo_code' => $promoCodeName,
                    'delivery_price' => 0,
                    'total' => $subtotal,

                    'payment_option' => 'cash_on_delivery',
                    'status' => Order::STATUS_PENDING,
                ]);

                $orderProducts = [];

                foreach ($cartProducts as $product) {
                    $databaseProduct = Product::query()
                        ->whereKey($product['product_id'])
                        ->lockForUpdate()
                        ->first();

                    if (! $databaseProduct) {
                        throw new \Exception(
                            'Продуктът не съществува: '
                                . $product['name']
                        );
                    }

                    $currentStock = (int) $databaseProduct->stock;
                    $orderedQuantity = (int) $product['quantity'];

                    if ($currentStock < $orderedQuantity) {
                        throw new \Exception(
                            'Няма достатъчна наличност за продукт: '
                                . $product['name']
                        );
                    }

                    $databaseProduct->update([
                        'stock' => $currentStock - $orderedQuantity,
                    ]);

                    $orderProduct = OrderProduct::create([
                        'order_id' => $order->id,
                        'product_id' => $databaseProduct->id,

                        'product_name' => $product['name'],
                        'product_slug' => $product['slug'],
                        'product_image' => $product['image'] ?? null,

                        'price' => (float) $product['price'],
                        'discount' => $product['discount'] ?? null,

                        'base_price' => (float) $product['final_price'],
                        'final_price' => (float) $product['final_price'],

                        'quantity' => $orderedQuantity,
                    ]);

                    $orderProducts[] = $orderProduct;
                }

                return [
                    'order' => $order,
                    'orderProducts' => collect($orderProducts),
                ];
            });
        } catch (\Throwable $exception) {
            return back()
                ->withErrors([
                    'order' => $exception->getMessage(),
                ])
                ->withInput();
        }

        $newOrder = $transactionResult['order'];
        $orderProducts = $transactionResult['orderProducts'];

        Session::forget([
            'products',
            'promo_code',
        ]);

        $promoCode = null;

        if ($sessionPromoCode) {
            $promoCode = Promocode::query()
                ->where(
                    'promo_code_name',
                    $sessionPromoCode['promo_code_name']
                )
                ->first();
        }

        Mail::to($newOrder->email)->send(
            new OrderCreated(
                $newOrder,
                $orderProducts,
                $promoCode
            )
        );

        return redirect()->route('checkout.succes');
    }
}
