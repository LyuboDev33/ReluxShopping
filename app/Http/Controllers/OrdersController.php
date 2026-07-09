<?php

namespace App\Http\Controllers;

use App\Mail\OrderCreated;
use App\Models\Admin\GlassValue;
use App\Models\Admin\LanceColor;
use App\Models\Admin\LensIndex;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class OrdersController extends Controller
{


    /**
     * Add a product to the session.
     *
     * @param Request $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function addProduct(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'purchase_type' => ['required', 'in:frame_only,frame_with_glasses'],
            'quantity'      => ['required', 'integer', 'min:1'],

            'lens_index_id' => [
                'required_if:purchase_type,frame_with_glasses',
                'nullable',
                'exists:lens_indexes,id',
            ],

            'glass_value_id' => [
                'required_if:purchase_type,frame_with_glasses',
                'nullable',
                'exists:glass_values,id',
            ],

            'lance_color_id' => [
                'required_if:purchase_type,frame_with_glasses',
                'nullable',
                'exists:lance_colors,id',
            ],

            'prescription_image' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,pdf', 'max:5120'],

            'right_eye'      => ['nullable', 'array'],
            'right_eye.sph'  => ['nullable', 'string'],
            'right_eye.cyl'  => ['nullable', 'string'],
            'right_eye.axis' => ['nullable', 'string'],
            'right_eye.add'  => ['nullable', 'string'],

            'left_eye'      => ['nullable', 'array'],
            'left_eye.sph'  => ['nullable', 'string'],
            'left_eye.cyl'  => ['nullable', 'string'],
            'left_eye.axis' => ['nullable', 'string'],
            'left_eye.add'  => ['nullable', 'string'],
        ], [
            'lens_index_id.required_if'  => 'Моля, изберете индекс на изтъняване.',
            'glass_value_id.required_if' => 'Моля, изберете тип стъкло.',
            'lance_color_id.required_if' => 'Моля, изберете цвят на стъклото.',
        ]);

        $purchaseType = $validated['purchase_type'];
        $quantity = (int) $validated['quantity'];
        $stock = (int) $product->stock;

        if ($stock <= 0) {
            return back()->withErrors([
                'stock' => 'Този продукт няма наличност.',
            ])->withInput();
        }

        $lensIndex = null;
        $glassValue = null;
        $lanceColor = null;

        if ($purchaseType === 'frame_with_glasses') {
            if (! $product->can_buy_with_lenses) {
                return back()->withErrors([
                    'purchase_type' => 'Този продукт не може да бъде закупен със стъкла.',
                ])->withInput();
            }

            $lensIndex = LensIndex::findOrFail($validated['lens_index_id']);
            $glassValue = GlassValue::with('glass')->findOrFail($validated['glass_value_id']);
            $lanceColor = LanceColor::findOrFail($validated['lance_color_id']);
        }

        $hasUploadedPrescription = $request->hasFile('prescription_image');

        $rightEye = $validated['right_eye'] ?? [];
        $leftEye = $validated['left_eye'] ?? [];

        $requiredEyeFields = ['sph', 'cyl', 'axis', 'add'];

        $hasAnyManualPrescription =
            ! empty(array_filter($rightEye)) ||
            ! empty(array_filter($leftEye));

        $hasCompleteManualPrescription = true;

        foreach ($requiredEyeFields as $field) {
            if (
                empty($rightEye[$field]) ||
                empty($leftEye[$field])
            ) {
                $hasCompleteManualPrescription = false;
                break;
            }
        }

        if ($purchaseType === 'frame_with_glasses') {
            if (! $hasUploadedPrescription && ! $hasAnyManualPrescription) {
                return back()->withErrors([
                    'prescription' => 'Моля, качете снимка с рецепта или въведете ръчно данните за диоптър.',
                ])->withInput();
            }

            if ($hasAnyManualPrescription && ! $hasCompleteManualPrescription) {
                return back()->withErrors([
                    'prescription' => 'Моля, попълнете всички полета за дясно и ляво око.',
                ])->withInput();
            }
        }

        $prescriptionImageName = null;

        if ($hasUploadedPrescription) {
            $file = $request->file('prescription_image');
            $prescriptionImageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/prescriptions'), $prescriptionImageName);
        }

        $baseFinalPrice = $product->discount
            ? $product->price - (($product->price * $product->discount) / 100)
            : $product->price;

        $finalPrice = $baseFinalPrice;

        if ($purchaseType === 'frame_with_glasses') {
            $finalPrice += $lensIndex->price;
            $finalPrice += $glassValue->price;
            $finalPrice += $lanceColor->price;
        }

        $products = Session::get('products', []);

        $existingProductKey = null;

        foreach ($products as $cartKey => $cartProduct) {
            if ((int) $cartProduct['product_id'] === (int) $product->id) {
                $existingProductKey = $cartKey;
                break;
            }
        }

        $newKey = $product->id
            . '-' . $purchaseType
            . '-' . ($lensIndex?->id ?? 0)
            . '-' . ($glassValue?->id ?? 0)
            . '-' . ($lanceColor?->id ?? 0);

        $existingQuantity = 0;

        if ($existingProductKey && $existingProductKey === $newKey) {
            $existingQuantity = (int) $products[$existingProductKey]['quantity'];
        }

        if (($existingQuantity + $quantity) > $stock) {
            return back()->withErrors([
                'quantity' => 'Няма достатъчна наличност за желаното количество.',
            ])->withInput();
        }

        $cartItem = [
            'product_id'    => $product->id,
            'name'          => $product->name,
            'slug'          => $product->slug,
            'price'         => (float) $product->price,
            'discount'      => $product->discount,
            'base_price'    => (float) $baseFinalPrice,
            'final_price'   => (float) $finalPrice,
            'quantity'      => $quantity,
            'image'         => $product->main_image,
            'purchase_type' => $purchaseType,

            'lens_index' => $lensIndex ? [
                'id'    => $lensIndex->id,
                'name'  => $lensIndex->name,
                'price' => (float) $lensIndex->price,
            ] : null,

            'glass_value' => $glassValue ? [
                'id'         => $glassValue->id,
                'glass_id'   => $glassValue->glass_id,
                'glass_name' => $glassValue->glass?->name,
                'value'      => $glassValue->value,
                'price'      => (float) $glassValue->price,
            ] : null,

            'lance_color' => $lanceColor ? [
                'id'    => $lanceColor->id,
                'name'  => $lanceColor->name,
                'price' => (float) $lanceColor->price,
            ] : null,

            'prescription_image' => $prescriptionImageName,
            'right_eye'          => $rightEye,
            'left_eye'           => $leftEye,
        ];

        if ($existingProductKey) {
            if ($existingProductKey === $newKey) {
                $cartItem['quantity'] = $products[$existingProductKey]['quantity'] + $quantity;
            }

            unset($products[$existingProductKey]);
        }

        $products[$newKey] = $cartItem;

        Session::put('products', $products);

        return back()->with('success', 'Продуктът беше добавен успешно в количката!');
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
            'delivery_method' => ['required'],

            'city' => ['nullable', 'string', 'max:255'],
            'billing_address' => ['nullable', 'string', 'max:255'],
            'office_list' => ['nullable', 'string', 'max:255'],

            'request_invoice' => ['nullable', 'boolean'],

            'company_name' => ['nullable', 'string', 'max:255'],
            'company_mol' => ['nullable', 'string', 'max:255'],
            'company_bulstat' => ['nullable', 'string', 'max:255'],
            'company_address' => ['nullable', 'string', 'max:255'],
        ]);

        $personalDelivery =
            ! empty($validated['city']) &&
            ! empty($validated['billing_address']);

        $officeDelivery = ! empty($validated['office_list']);

        if (! $personalDelivery && ! $officeDelivery) {
            return back()
                ->withErrors([
                    'delivery' => 'Моля попълнете адрес за доставка или изберете офис на Speedy и попълнете нужните данни.',
                ])
                ->withInput();
        }

        $cartProducts = Session::get('products', []);

        if (empty($cartProducts)) {
            return back()->withErrors([
                'cart' => 'Количката е празна.',
            ]);
        }

        DB::transaction(function () use ($validated, $cartProducts) {
            $subtotal = 0;

            foreach ($cartProducts as $product) {
                $subtotal += $product['final_price'] * $product['quantity'];
            }

            $order = Order::create([
                'order_number' => 'ORD-' . date('ymd') . '-' . random_int(1000, 9999),
                'first_name' => $validated['fname'],
                'last_name' => $validated['lname'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],

                'delivery_method' => $validated['delivery_method'],

                'city' => $validated['city'] ?? null,
                'personal_address' => $validated['billing_address'] ?? null,

                'courier' => ! empty($validated['office_list']) ? 'speedy' : null,
                'office_list' => $validated['office_list'] ?? null,

                'request_invoice' => $validated['request_invoice'] ?? false,

                'company_name' => $validated['company_name'] ?? null,
                'company_mol' => $validated['company_mol'] ?? null,
                'company_bulstat' => $validated['company_bulstat'] ?? null,
                'company_address' => $validated['company_address'] ?? null,

                'subtotal' => $subtotal,
                'delivery_price' => 0,
                'total' => $subtotal,

                'payment_option' => 'cash_on_delivery',
                'status' => Order::STATUS_PENDING,
            ]);

            foreach ($cartProducts as $product) {
                $databaseProduct = Product::where('id', $product['product_id'])
                    ->lockForUpdate()
                    ->first();

                if (! $databaseProduct) {
                    throw new \Exception('Продуктът не съществува.');
                }

                $currentStock = (int) $databaseProduct->stock;
                $orderedQuantity = (int) $product['quantity'];

                if ($currentStock < $orderedQuantity) {
                    throw new \Exception('Няма достатъчна наличност за продукт: ' . $product['name']);
                }

                $databaseProduct->update([
                    'stock' => $currentStock - $orderedQuantity,
                ]);

                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product['product_id'],

                    'product_name' => $product['name'],
                    'product_slug' => $product['slug'],
                    'product_image' => $product['image'],

                    'price' => $product['price'],
                    'discount' => $product['discount'],
                    'final_price' => $product['final_price'],
                    'quantity' => $product['quantity'],

                    'purchase_type' => $product['purchase_type'] ?? 'frame_only',

                    'lens_index_id' => $product['lens_index']['id'] ?? null,
                    'lens_index_name' => $product['lens_index']['name'] ?? null,
                    'lens_index_price' => $product['lens_index']['price'] ?? null,

                    'glass_value_id' => $product['glass_value']['id'] ?? null,
                    'glass_name' => $product['glass_value']['glass_name'] ?? null,
                    'glass_value_name' => $product['glass_value']['value'] ?? null,
                    'glass_value_price' => $product['glass_value']['price'] ?? null,

                    'lance_color_id' => $product['lance_color']['id'] ?? null,
                    'lance_color_name' => $product['lance_color']['name'] ?? null,
                    'lance_color_price' => $product['lance_color']['price'] ?? null,

                    'prescription_image' => $product['prescription_image'] ?? null,
                    'right_eye' => $product['right_eye'] ?? null,
                    'left_eye' => $product['left_eye'] ?? null,
                ]);
            }

            Mail::to($order->email)->send(new OrderCreated($order));
        });

        Session::forget('products');

        return redirect(route('checkout.succes'));
    }
}
