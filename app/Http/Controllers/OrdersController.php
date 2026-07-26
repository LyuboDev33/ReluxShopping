<?php

namespace App\Http\Controllers;

use App\Mail\OrderCreated;
use App\Models\Admin\GlassValue;
use App\Models\Admin\LanceColor;
use App\Models\Admin\LensIndex;
use App\Models\Admin\Promocode;
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
            'purchase_type' => [
                'required',
                'in:frame_only,frame_with_glasses',
            ],

            'quantity' => [
                'required',
                'integer',
                'min:1',
            ],

            'glass_value_id' => [
                'nullable',
                'required_if:purchase_type,frame_with_glasses',
                'integer',
                'exists:glass_values,id',
            ],

            'glass_value_lens_index_id' => [
                'nullable',
                'required_if:purchase_type,frame_with_glasses',
                'integer',
                'exists:glass_value_lens_indexes,id',
            ],

            'prescription_image' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,webp,pdf',
                'max:5120',
            ],

            'right_eye' => [
                'nullable',
                'array',
            ],

            'right_eye.sph' => [
                'nullable',
                'string',
            ],

            'right_eye.cyl' => [
                'nullable',
                'string',
            ],

            'right_eye.axis' => [
                'nullable',
                'string',
            ],

            'left_eye' => [
                'nullable',
                'array',
            ],

            'left_eye.sph' => [
                'nullable',
                'string',
            ],

            'left_eye.cyl' => [
                'nullable',
                'string',
            ],

            'left_eye.axis' => [
                'nullable',
                'string',
            ],

            'pd' => [
                'nullable',
                'string',
            ],
        ], [
            'purchase_type.required' => 'Моля, изберете начин на покупка.',
            'purchase_type.in' => 'Избраният начин на покупка е невалиден.',

            'quantity.required' => 'Моля, изберете количество.',
            'quantity.integer' => 'Количеството трябва да бъде цяло число.',
            'quantity.min' => 'Количеството трябва да бъде поне 1.',

            'glass_value_id.required_if' => 'Моля, изберете тип стъкло.',
            'glass_value_id.exists' => 'Избраният тип стъкло е невалиден.',

            'glass_value_lens_index_id.required_if' => 'Моля, изберете индекс на изтъняване.',
            'glass_value_lens_index_id.exists' => 'Избраният индекс на изтъняване е невалиден.',

            'prescription_image.file' => 'Прикачената рецепта трябва да бъде файл.',
            'prescription_image.mimes' => 'Рецептата трябва да бъде JPG, JPEG, PNG, WEBP или PDF файл.',
            'prescription_image.max' => 'Файлът с рецептата не може да бъде по-голям от 5 MB.',
        ]);

        $purchaseType = $validated['purchase_type'];
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

        $glassValue = null;
        $lensIndex = null;
        $rightEye = [];
        $leftEye = [];
        $pd = null;
        $hasUploadedPrescription = false;

        if ($purchaseType === 'frame_with_glasses') {
            if (! $product->can_buy_with_lenses) {
                return back()
                    ->withErrors([
                        'purchase_type' => 'Този продукт не може да бъде закупен със стъкла.',
                    ])
                    ->withInput();
            }

            $glassValue = GlassValue::with([
                'glass',
                'lensIndexes',
            ])->findOrFail($validated['glass_value_id']);

            $lensIndex = $glassValue->lensIndexes->firstWhere(
                'id',
                (int) $validated['glass_value_lens_index_id']
            );

            if (! $lensIndex) {
                return back()
                    ->withErrors([
                        'glass_value_lens_index_id' => 'Избраният индекс не е наличен за това стъкло.',
                    ])
                    ->withInput();
            }

            $rightEye = $validated['right_eye'] ?? [];
            $leftEye = $validated['left_eye'] ?? [];
            $pd = $validated['pd'] ?? null;

            $hasUploadedPrescription = $request->hasFile('prescription_image');

            $rightSph = $rightEye['sph'] ?? null;
            $rightCyl = $rightEye['cyl'] ?? null;
            $rightAxis = $rightEye['axis'] ?? null;

            $leftSph = $leftEye['sph'] ?? null;
            $leftCyl = $leftEye['cyl'] ?? null;
            $leftAxis = $leftEye['axis'] ?? null;

            $hasRightSph = $rightSph !== null && $rightSph !== '';
            $hasRightCyl = $rightCyl !== null && $rightCyl !== '';
            $hasRightAxis = $rightAxis !== null && $rightAxis !== '';

            $hasLeftSph = $leftSph !== null && $leftSph !== '';
            $hasLeftCyl = $leftCyl !== null && $leftCyl !== '';
            $hasLeftAxis = $leftAxis !== null && $leftAxis !== '';

            $hasPd = $pd !== null && $pd !== '';

            $hasRightEyeValues =
                $hasRightSph ||
                $hasRightCyl ||
                $hasRightAxis;

            $hasLeftEyeValues =
                $hasLeftSph ||
                $hasLeftCyl ||
                $hasLeftAxis;

            $hasAnyManualPrescription =
                $hasRightEyeValues ||
                $hasLeftEyeValues ||
                $hasPd;

            if (! $hasUploadedPrescription && ! $hasAnyManualPrescription) {
                return back()
                    ->withErrors([
                        'prescription' => 'Моля, качете рецепта или въведете ръчно данните за диоптър.',
                    ])
                    ->withInput();
            }

            if ($hasAnyManualPrescription) {
                $prescriptionErrors = [];

                if ($hasRightAxis && ! $hasRightCyl) {
                    $prescriptionErrors[] = 'За дясното око трябва да изберете цилиндър (CYL), когато е избран градус (AXIS).';
                }

                if ($hasRightCyl && ! $hasRightAxis) {
                    $prescriptionErrors[] = 'За дясното око градусът (AXIS) е задължителен, когато е избран цилиндър (CYL).';
                }

                if ($hasLeftAxis && ! $hasLeftCyl) {
                    $prescriptionErrors[] = 'За лявото око трябва да изберете цилиндър (CYL), когато е избран градус (AXIS).';
                }

                if ($hasLeftCyl && ! $hasLeftAxis) {
                    $prescriptionErrors[] = 'За лявото око градусът (AXIS) е задължителен, когато е избран цилиндър (CYL).';
                }

                if (
                    ($hasRightSph || $hasRightCyl || $hasLeftSph || $hasLeftCyl) &&
                    ! $hasPd
                ) {
                    $prescriptionErrors[] = 'Полето PD е задължително, когато е избрана сфера (SPH) или цилиндър (CYL).';
                }

                if (
                    $hasPd &&
                    ! $hasRightSph &&
                    ! $hasRightCyl &&
                    ! $hasLeftSph &&
                    ! $hasLeftCyl
                ) {
                    $prescriptionErrors[] = 'Трябва да изберете сфера (SPH) или цилиндър (CYL), когато е въведено PD.';
                }

                if (! empty($prescriptionErrors)) {
                    return back()
                        ->withErrors([
                            'prescription' => implode(' ', $prescriptionErrors),
                        ])
                        ->withInput();
                }
            }
        }

        $baseFinalPrice = $product->discount
            ? $product->price - (($product->price * $product->discount) / 100)
            : $product->price;

        $finalPrice = (float) $baseFinalPrice;

        if ($purchaseType === 'frame_with_glasses') {
            $finalPrice += (float) $lensIndex->price;
        }

        $products = Session::get('products', []);

        $productKey = (string) $product->id;

        $existingQuantity = isset($products[$productKey])
            ? (int) $products[$productKey]['quantity']
            : 0;

        if (($existingQuantity + $quantity) > $stock) {
            return back()
                ->withErrors([
                    'quantity' => 'Няма достатъчна наличност за желаното количество.',
                ])
                ->withInput();
        }

        $prescriptionImageName = null;

        if (
            $purchaseType === 'frame_with_glasses' &&
            $hasUploadedPrescription
        ) {
            $file = $request->file('prescription_image');

            $prescriptionImageName =
                time()
                . '_'
                . uniqid()
                . '.'
                . $file->getClientOriginalExtension();

            $file->move(
                public_path('assets/images/prescriptions'),
                $prescriptionImageName
            );
        }

        $cartItem = [
            'product_id' => $product->id,
            'name' => $product->name,
            'slug' => $product->slug,
            'price' => (float) $product->price,
            'discount' => $product->discount,
            'base_price' => (float) $baseFinalPrice,
            'final_price' => (float) $finalPrice,
            'quantity' => $existingQuantity + $quantity,
            'image' => $product->main_image,
            'purchase_type' => $purchaseType,

            'glass_value' => $glassValue ? [
                'id' => $glassValue->id,
                'glass_id' => $glassValue->glass_id,
                'glass_name' => $glassValue->glass?->name,
                'value' => $glassValue->value,
            ] : null,

            'lens_index' => $lensIndex ? [
                'id' => $lensIndex->id,
                'name' => $lensIndex->name,
                'price' => (float) $lensIndex->price,
            ] : null,

            'prescription_image' => $prescriptionImageName,
            'right_eye' => $rightEye,
            'left_eye' => $leftEye,
            'pd' => $pd,
        ];

        $products[$productKey] = $cartItem;

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
            return back()
                ->withErrors([
                    'cart' => 'Количката е празна.',
                ]);
        }

        $sessionPromoCode = Session::get('promo_code');


        try {
            $order = DB::transaction(function () use ($validated, $cartProducts, $sessionPromoCode) {
                $subtotal = 0;
                $promoCodeName = $sessionPromoCode['promo_code_name'] ?? null;


                foreach ($cartProducts as $product) {
                    $subtotal +=
                        (float) $product['final_price'] *
                        (int) $product['quantity'];
                }

                $order = Order::create([
                    'order_number'     => 'ORD-' . date('dmy') . '-' . random_int(1000, 9999),

                    'first_name'       => $validated['fname'],
                    'last_name'        => $validated['lname'],
                    'phone'            => $validated['phone'],
                    'email'            => $validated['email'],

                    'delivery_method'  => $validated['delivery_method'],

                    'city'             => $validated['city'] ?? null,
                    'personal_address' => $validated['billing_address'] ?? null,

                    'courier'          => ! empty($validated['office_list']) ? 'speedy' : null,

                    'office_list'      => $validated['office_list'] ?? null,

                    'request_invoice'  => $validated['request_invoice'] ?? false,

                    'company_name'     => $validated['company_name'] ?? null,
                    'company_mol'      => $validated['company_mol'] ?? null,
                    'company_bulstat'  => $validated['company_bulstat'] ?? null,
                    'company_address'  => $validated['company_address'] ?? null,

                    'subtotal'         => $subtotal,
                    'promo_code'       => $promoCodeName,
                    'delivery_price'   => 0,
                    'total'            => $subtotal,

                    'payment_option'   => 'cash_on_delivery',
                    'status'           => Order::STATUS_PENDING,
                ]);

                $orderProducts = [];

                foreach ($cartProducts as $product) {
                    $databaseProduct = Product::where('id', $product['product_id'])
                        ->lockForUpdate()
                        ->first();

                    if (! $databaseProduct) {
                        throw new \Exception(
                            'Продуктът не съществува: ' . $product['name']
                        );
                    }

                    $currentStock = (int) $databaseProduct->stock;
                    $orderedQuantity = (int) $product['quantity'];

                    if ($currentStock < $orderedQuantity) {
                        throw new \Exception(
                            'Няма достатъчна наличност за продукт: ' .
                                $product['name']
                        );
                    }

                    $databaseProduct->update([
                        'stock' => $currentStock - $orderedQuantity,
                    ]);

                    $orderProduct = OrderProduct::create([
                        'order_id'                      => $order->id,
                        'product_id'                    => $product['product_id'],

                        'product_name'                  => $product['name'],
                        'product_slug'                  => $product['slug'],
                        'product_image'                 => $product['image'] ?? null,

                        'price'                         => $product['price'],
                        'discount'                      => $product['discount'] ?? null,
                        'base_price'                    => $product['base_price'],
                        'final_price'                   => $product['final_price'],
                        'quantity'                      => $product['quantity'],

                        'purchase_type'                 => $product['purchase_type'] ?? 'frame_only',

                        'glass_id'                      => $product['glass_value']['glass_id'] ?? null,

                        'glass_value_id'                => $product['glass_value']['id'] ?? null,

                        'glass_name'                    => $product['glass_value']['glass_name'] ?? null,

                        'glass_value_name'              => $product['glass_value']['value'] ?? null,

                        'glass_value_price'             => $product['glass_value']['price'] ?? null,
                        'glass_value_lens_index_id'     => $product['lens_index']['id'] ?? null,
                        'glass_value_lens_index_name'   => $product['lens_index']['name'] ?? null,
                        'glass_value_lens_index_price'  => $product['lens_index']['price'] ?? null,

                        'prescription_image'            => $product['prescription_image'] ?? null,

                        'right_eye'                     => $product['right_eye'] ?? null,
                        'left_eye'                      => $product['left_eye'] ?? null,
                        'pd'                            => $product['pd'] ?? null,
                    ]);

                    $orderProducts[] = $orderProduct;
                }

                return [
                    'order' => $order,
                    'orderProducts' => collect($orderProducts),
                ];
            });
        } catch (\Exception $exception) {
            return back()
                ->withErrors([
                    'order' => $exception->getMessage(),
                ])
                ->withInput();
        }

        $newOrder = $order['order'];
        $orderProducts = $order['orderProducts'];
        $email = $order['order']->email;

        Session::forget([
            'products',
            'promo_code',
        ]);

        $promoCode = null;

        if ($sessionPromoCode) {
            $promoCode = Promocode::where(
                'promo_code_name',
                $sessionPromoCode['promo_code_name']
            )->first();
        }

        Mail::to($email)->send(
            new OrderCreated(
                $newOrder,
                $orderProducts,
                $promoCode
            )
        );

        return redirect()->route('checkout.succes');
    }
}
