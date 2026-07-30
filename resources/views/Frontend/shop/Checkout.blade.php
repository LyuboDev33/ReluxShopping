<x-frontend>

    @section('SEO')
        <title>Valente Optics | Чекаут</title>
    @endsection



    <!--Start Checkout Page-->
    <section class="checkout-page">
        <div class="container">

            @error('order')
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    {{ $message }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror

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

                                            <input type="text" placeholder="Въведете първото си име" name="fname"
                                                value="{{ old('fname') }}">

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

                                            <input type="text" placeholder="Въведете фамилията си" name="lname"
                                                value="{{ old('lname') }}">

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

                                            <input type="text" placeholder="Въведете телефонен номер" name="phone"
                                                value="{{ old('phone') }}">

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

                                            <input type="email" placeholder="Въведете имейл адрес" name="email"
                                                value="{{ old('email') }}">

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
                                        <div class="text-danger text-center mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    @error('delivery')
                                        <div class="text-danger text-center mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <div class="content mt-4">
                                        <div id="personal-delivery"
                                            class="{{ old('delivery_method', 'personal') === 'personal' ? '' : 'd-none' }}">

                                            <div class="row bs-gutter-x-20">
                                                <div class="col-xl-6 col-lg-6">
                                                    <div class="billing_input_box">
                                                        <label>
                                                            Град <span class="red-dot">*</span>
                                                        </label>

                                                        <select name="city" class="attribute-choice">
                                                            <option value="">Напишете град и го изберете</option>

                                                            @foreach ($cities as $city)
                                                                <option value="{{ $city->name }}"
                                                                    {{ old('city') === $city->name ? 'selected' : '' }}>
                                                                    {{ $city->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        @error('city')
                                                            <div class="text-danger">
                                                                {{ $message }}
                                                            </div>
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
                                                            <div class="text-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="office-delivery"
                                            class="{{ old('delivery_method') === 'office' ? '' : 'd-none' }}">

                                            <div class="billing_input_box">
                                                <label>
                                                    Град / офис на Speedy <span class="red-dot">*</span>
                                                </label>

                                                <select name="office_list" class="attribute-choice">
                                                    <option value="">Изберете офис на Speedy</option>

                                                    @foreach ($speedyOffices as $office)
                                                        <option value="{{ $office->name }} [{{ $office->office_id }}]"
                                                            {{ old('office_list') === $office->name . ' [' . $office->office_id . ']' ? 'selected' : '' }}>
                                                            {{ $office->name }} [{{ $office->office_id }}]
                                                        </option>
                                                    @endforeach
                                                </select>

                                                @error('office_list')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
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
                                                                @if (!empty($product['glass_value']))
                                                                    <p class="mb-1">
                                                                        <strong>Тип стъкло:</strong>

                                                                        {{ $product['glass_value']['glass_name'] }}
                                                                    </p>

                                                                    <p class="mb-1">
                                                                        <strong>Избран вариант:</strong>

                                                                        {{ $product['glass_value']['value'] }}

                                                                        {{-- <span class="text-muted">
                                                                    (+{{ number_format($product['glass_value']['price'], 2) }} €)
                                                                </span> --}}
                                                                    </p>
                                                                @endif

                                                                @if (!empty($product['lens_index']))
                                                                    <div class="d-flex justify-content-between mb-2">
                                                                        <p> <strong>Индекс на изтъняване:
                                                                                {{ $product['lens_index']['name'] }}</strong>

                                                                            +{{ number_format($product['lens_index']['price'], 2) }}
                                                                            €
                                                                        </p>
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



                                        @if (!empty($promoCode))
                                            <tr>
                                                <td class="pro__title">
                                                    Промо код

                                                    <div class="mt-1">
                                                        <strong class="text-success">
                                                            {{ $promoCode['promo_code_name'] }}
                                                        </strong>
                                                    </div>
                                                </td>

                                                <td class="pro__price">
                                                    <span class="text-success">
                                                        -{{ $promoCode['percentage_promo_code'] }}%
                                                    </span>
                                                </td>
                                            </tr>
                                        @endif

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

                                                @if (!empty($promoCode))
                                                    <del class="text-muted d-block">
                                                        {{ number_format($subtotal + $promoDiscount, 2) }} €
                                                    </del>

                                                    <strong class="text-success">
                                                        {{ number_format($subtotal, 2) }} €
                                                    </strong>
                                                @else
                                                    <strong>
                                                        {{ number_format($subtotal ?? 0, 2) }} €
                                                    </strong>
                                                @endif

                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="checkout-promo-code mb-4">

                                <h4 class="mb-3">
                                    Промо код
                                </h4>

                                <div class="checkout-promo-code__controls">

                                    <input type="text" id="promo-code-input" class="form-control rounded-pill"
                                        placeholder="Въведете промо код"
                                        value="{{ session('promo_code.promo_code_name', '') }}" autocomplete="off">

                                    <button type="button" id="apply-promo-code"
                                        class="{{ session()->has('promo_code') ? 'alert alert-info' : 'thm-btn' }} mt-3 rounded-pill p-2">
                                        {{ session()->has('promo_code') ? 'Промокодът е приложен' : 'Приложи' }}
                                    </button>

                                </div>

                                <div id="promo-code-message" class="mt-2" aria-live="polite"></div>

                            </div>

                            <div class="checkout__payment">
                                <div class="checkout__payment__item checkout__payment__item--active">

                                    <h3 class="checkout__payment__title text-center">
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

    <script>
        $(document).ready(function() {
            applyPromoCode();
        });

        function applyPromoCode() {
            $('#apply-promo-code').on('click', function() {
                const button = $(this);
                const promoCode = $('#promo-code-input').val().trim();
                const messageBox = $('#promo-code-message');

                messageBox
                    .removeClass('text-danger text-success')
                    .text('');

                if (!promoCode) {
                    messageBox
                        .addClass('text-danger')
                        .text('Моля, въведете промо код.');

                    return;
                }

                button
                    .prop('disabled', true)
                    .text('Проверка...');

                $.ajax({
                    url: "{{ route('checkout.promo.apply') }}",
                    type: "POST",

                    data: {
                        _token: "{{ csrf_token() }}",
                        promo_code: promoCode
                    },

                    success: function(response) {
                        messageBox
                            .addClass('text-success')
                            .text(response.message);

                        sessionStorage.setItem(
                            'scrollToCheckoutTotal',
                            'true'
                        );

                        window.location.reload();
                    },

                    error: function(xhr) {
                        let message =
                            'Промо кодът не можа да бъде приложен.';

                        if (
                            xhr.responseJSON &&
                            xhr.responseJSON.errors &&
                            xhr.responseJSON.errors.promo_code
                        ) {
                            message =
                                xhr.responseJSON.errors.promo_code[0];
                        } else if (
                            xhr.responseJSON &&
                            xhr.responseJSON.message
                        ) {
                            message =
                                xhr.responseJSON.message;
                        }

                        messageBox.addClass('text-danger').text(message);
                    },

                    complete: function() {
                        button
                            .prop('disabled', false)
                            .text('Приложи');
                    }
                });
            });

            $('#promo-code-input').on('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();

                    $('#apply-promo-code').trigger('click');
                }
            });


        }
    </script>

</x-frontend>
