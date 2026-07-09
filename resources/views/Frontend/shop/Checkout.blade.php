<x-frontend>

    @section('SEO')
        <title>Valente Optic | Чекаут</title>
    @endsection
    <!--Start Checkout Page-->
    <section class="checkout-page">
        <div class="container">

            <form action="{{ route('order.create') }}" method="POST" class="checkout-form">

                @csrf

                <input type="hidden" name="promo_code" value="{{ old('promo_code') }}">

                <div class="row">
                    <div class="col-xl-6 col-lg-7">
                        <div class="billing_details">
                            <div class="billing_title">
                                <h2>Данни за доставка</h2>
                            </div>

                            <div class="billing_details_form">
                                <div class="row bs-gutter-x-20">
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="billing_input_box">
                                            <label>
                                                Име <span class="red-dot">*</span>
                                            </label>

                                            <input type="text" name="fname" value="{{ old('fname') }}">

                                            @error('fname')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6">
                                        <div class="billing_input_box">
                                            <label>
                                                Фамилия <span class="red-dot">*</span>
                                            </label>

                                            <input type="text" name="lname" value="{{ old('lname') }}">

                                            @error('lname')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6">
                                        <div class="billing_input_box">
                                            <label>
                                                Телефон <span class="red-dot">*</span>
                                            </label>

                                            <input type="text" name="phone" value="{{ old('phone') }}">

                                            @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6">
                                        <div class="billing_input_box">
                                            <label>
                                                Имейл <span class="red-dot">*</span>
                                            </label>

                                            <input type="email" name="email" value="{{ old('email') }}">

                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="checkout-delivery">
                                    <h4 class="mb-3">
                                        Изберете начин на доставка <span class="red-dot">*</span>
                                    </h4>

                                    <ul class="checkout-delivery__tabs list-unstyled d-flex gap-3 flex-wrap">
                                        <li>
                                            <label class="checkout-delivery__option">
                                                <input type="radio" name="delivery_method" value="personal"
                                                    {{ old('delivery_method', 'personal') === 'personal' ? 'checked' : '' }}>

                                                <span>Личен адрес</span>
                                            </label>
                                        </li>

                                        <li>
                                            <label class="checkout-delivery__option">
                                                <input type="radio" name="delivery_method" value="office"
                                                    {{ old('delivery_method') === 'office' ? 'checked' : '' }}>

                                                <span>До офис на Speedy</span>
                                            </label>
                                        </li>
                                    </ul>

                                    @error('delivery_method')
                                        <div class="text-danger text-center mt-2">{{ $message }}</div>
                                    @enderror

                                    @error('delivery')
                                        <div class="text-danger text-center  mt-2">{{ $message }}</div>
                                    @enderror

                                    <div class="content mt-4">
                                        <div class="tab-pane fade {{ old('delivery_method', 'personal') === 'personal' ? 'show active' : '' }}"
                                            id="personal-delivery" role="tabpanel">

                                            <div class="row bs-gutter-x-20">
                                                <div class="col-xl-6 col-lg-6">
                                                    <div class="billing_input_box">
                                                        <label>
                                                            Град <span class="red-dot">*</span>
                                                        </label>

                                                        <input type="text" name="city"
                                                            value="{{ old('city') }}">

                                                        @error('city')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-xl-6 col-lg-6">
                                                    <div class="billing_input_box">
                                                        <label>
                                                            Адрес <span class="red-dot">*</span>
                                                        </label>

                                                        <input type="text" name="billing_address"
                                                            value="{{ old('billing_address') }}">

                                                        @error('billing_address')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="{{ old('delivery_method') === 'office' ? 'show active' : '' }}"
                                            id="office-delivery" role="tabpanel">

                                            <div class="billing_input_box">
                                                <label>
                                                    Град / офис на Speedy <span class="red-dot">*</span>
                                                </label>

                                                <input type="text" name="office_list"
                                                    value="{{ old('office_list') }}" list="speedy-offices-list">

                                                <datalist id="speedy-offices-list">
                                                    @foreach ($speedyOffices ?? [] as $office)
                                                        <option
                                                            value="{{ $office['name'] ?? $office->name }} [{{ $office['id'] ?? $office->id }}]">
                                                    @endforeach
                                                </datalist>

                                                @error('office_list')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout-invoice mt-4">
                                    <div class="checked-box">
                                        <input type="checkbox" name="request_invoice" id="request_invoice"
                                            value="1" {{ old('request_invoice') ? 'checked' : '' }}>

                                        <label for="request_invoice">
                                            <span></span> Желая фактура
                                        </label>
                                    </div>

                                    <div class="checkout-invoice__fields d-none mt-3">
                                        <div class="row bs-gutter-x-20">
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="billing_input_box">
                                                    <label>
                                                        Име на фирма <span class="red-dot">*</span>
                                                    </label>

                                                    <input type="text" name="company_name"
                                                        value="{{ old('company_name') }}">
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6">
                                                <div class="billing_input_box">
                                                    <label>
                                                        МОЛ <span class="red-dot">*</span>
                                                    </label>

                                                    <input type="text" name="company_mol"
                                                        value="{{ old('company_mol') }}">
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6">
                                                <div class="billing_input_box">
                                                    <label>
                                                        Булстат <span class="red-dot">*</span>
                                                    </label>

                                                    <input type="text" name="company_bulstat"
                                                        value="{{ old('company_bulstat') }}">
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6">
                                                <div class="billing_input_box">
                                                    <label>
                                                        Адрес на фирма <span class="red-dot">*</span>
                                                    </label>

                                                    <input type="text" name="company_address"
                                                        value="{{ old('company_address') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @error('company')
                                        <div class="alert alert-danger mt-3">
                                            Моля въведете всички фирмени данни ако желаете фактура!
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-5">
                        <div class="your_order shadow">
                            <div class="order_table_box">
                                <table class="order_table_detail">
                                    <tbody>

                                        @foreach ($products ?? [] as $product)
                                            <tr class="produc-td">
                                                <td class="pro__title">

                                                    <div class="row align-items-start">

                                                        <div class="col-lg-6">

                                                            <a href="/shop/product/{{ $product['slug'] }}">
                                                                <img src="/assets/images/products/{{ $product['image'] }}"
                                                                    alt="{{ $product['name'] }}">

                                                                {{ $product['name'] }}
                                                            </a>

                                                            <div class="mt-2">
                                                                <strong>Количество:</strong>
                                                                {{ $product['quantity'] }} бр.
                                                            </div>


                                                        </div>

                                                        <div class="col-lg-6">

                                                            @if (($product['purchase_type'] ?? 'frame_only') === 'frame_with_glasses')
                                                                @if (!empty($product['lens_index']))
                                                                    <div class="d-flex justify-content-between mb-2">
                                                                        <span>Индекс</span>

                                                                        <strong>
                                                                            +{{ number_format($product['lens_index']['price'], 2) }}
                                                                            €
                                                                        </strong>
                                                                    </div>
                                                                @endif

                                                                @if (!empty($product['glass_value']))
                                                                    <div class="d-flex justify-content-between mb-2">
                                                                        <span>Стъкло</span>

                                                                        <strong>
                                                                            +{{ number_format($product['glass_value']['price'], 2) }}
                                                                            €
                                                                        </strong>
                                                                    </div>
                                                                @endif

                                                                @if (!empty($product['lance_color']))
                                                                    <div class="d-flex justify-content-between mb-2">
                                                                        <span>Цвят</span>

                                                                        <strong>
                                                                            +{{ number_format($product['lance_color']['price'], 2) }}
                                                                            €
                                                                        </strong>
                                                                    </div>
                                                                @endif
                                                            @endif

                                                        </div>

                                                    </div>

                                                </td>

                                                <td class="pro__price">

                                                    @if ($product['discount'] > 0)
                                                        <del class="text-muted me-2">
                                                            {{ number_format($product['price'] * $product['quantity'], 2) }}
                                                            €
                                                        </del>

                                                        <span class="badge bg-danger ms-2">
                                                            -{{ $product['discount'] }}%
                                                        </span>

                                                        <div class="mt-2">
                                                            <strong class="text-danger">
                                                                {{ number_format($product['final_price'] * $product['quantity'], 2) }}
                                                                €
                                                            </strong>
                                                        </div>
                                                    @else
                                                        <strong>
                                                            {{ number_format($product['final_price'] * $product['quantity'], 2) }}
                                                            €
                                                        </strong>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td class="pro__title">
                                                Междинна сума
                                            </td>

                                            <td class="pro__price">
                                                {{ number_format($subtotal ?? 0, 2) }} €
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="pro__title">
                                                Доставка
                                            </td>

                                            <td class="pro__price">
                                                Потвърждава се по телефона
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="pro__title">
                                                <strong>Общо</strong>
                                            </td>

                                            <td class="pro__price">
                                                <strong>{{ number_format($subtotal ?? 0, 2) }} €</strong>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="checkout__payment">
                                <div class="checkout__payment__item checkout__payment__item--active">

                                    <h3 class="checkout__payment__title">
                                        Плащане при получаване
                                    </h3>

                                    <p>
                                        Платете в брой при получаване на пратката от куриера.
                                    </p>

                                    <button type="submit" class="thm-btn order-btn">
                                        Завърши поръчката
                                    </button>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </form>

        </div>
    </section>
    <!--End Checkout Page-->

</x-frontend>
