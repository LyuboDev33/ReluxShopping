<x-frontend>

    @section('SEO')
        <title>Завършване на поръчката | ReLux TopShopping</title>

        <meta name="description"
            content="Завършете своята поръчка в ReLux TopShopping. Въведете данни за доставка, изберете личен адрес или офис на Speedy и прегледайте продуктите в поръчката си.">

        <meta name="robots" content="noindex, nofollow">
    @endsection

    <!-- Main Content Wrapper Start -->
    <div class="main-content-wrapper">

        <!-- Checkout Area Start -->
        <div class="checkout-area pt--40 pb--80 pt-md--30 pb-md--60">
            <div class="container">

                @error('order')
                    <div class="alert alert-danger alert-dismissible fade show mb-4"
                        role="alert">

                        {{ $message }}

                        <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Затвори">
                        </button>
                    </div>
                @enderror

                <form action="{{ route('order.create') }}"
                    method="POST"
                    class="checkout-form">

                    @csrf

                    <input type="hidden"
                        name="promo_code"
                        value="{{ old('promo_code') }}">

                    <div class="checkout-wrapper bg--2">
                        <div class="row">

                            <!-- Delivery Information Start -->
                            <div class="col-lg-6">

                                <div class="checkout-title">
                                    <h2>
                                        Данни за доставка
                                    </h2>
                                </div>

                                <div class="checkout-form">

                                    <!-- Personal Information -->
                                    <div class="row mb--30">

                                        <div class="form__group col-md-6 mb-sm--30">
                                            <label for="fname"
                                                class="form__label">

                                                Име <span>*</span>
                                            </label>

                                            <input type="text"
                                                name="fname"
                                                id="fname"
                                                class="form__input form__input--2"
                                                placeholder="Въведете първото си име"
                                                value="{{ old('fname') }}">

                                            @error('fname')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form__group col-md-6">
                                            <label for="lname"
                                                class="form__label">

                                                Фамилия <span>*</span>
                                            </label>

                                            <input type="text"
                                                name="lname"
                                                id="lname"
                                                class="form__input form__input--2"
                                                placeholder="Въведете фамилията си"
                                                value="{{ old('lname') }}">

                                            @error('lname')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row mb--30">

                                        <div class="form__group col-md-6 mb-sm--30">
                                            <label for="phone"
                                                class="form__label">

                                                Телефон <span>*</span>
                                            </label>

                                            <input type="tel"
                                                name="phone"
                                                id="phone"
                                                class="form__input form__input--2"
                                                placeholder="Въведете телефонен номер"
                                                value="{{ old('phone') }}">

                                            @error('phone')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form__group col-md-6">
                                            <label for="email"
                                                class="form__label">

                                                Имейл <span>*</span>
                                            </label>

                                            <input type="email"
                                                name="email"
                                                id="email"
                                                class="form__input form__input--2"
                                                placeholder="Въведете имейл адрес"
                                                value="{{ old('email') }}">

                                            @error('email')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>

                                    <!-- Delivery Method Start -->
                                    <div class="checkout-delivery mb--30">

                                        <div class="checkout-title">
                                            <h3>
                                                Начин на доставка
                                            </h3>
                                        </div>

                                        <div class="d-flex flex-wrap gap-3">

                                            <div class="custom-radio">
                                                <input type="radio"
                                                    name="delivery_method"
                                                    id="delivery-personal"
                                                    value="personal"
                                                    {{ old('delivery_method', 'personal') === 'personal' ? 'checked' : '' }}>

                                                <label for="delivery-personal">
                                                    <i class="fa-solid fa-house me-2"></i>
                                                    До личен адрес
                                                </label>
                                            </div>

                                            <div class="custom-radio">
                                                <input type="radio"
                                                    name="delivery_method"
                                                    id="delivery-office"
                                                    value="office"
                                                    {{ old('delivery_method') === 'office' ? 'checked' : '' }}>

                                                <label for="delivery-office">
                                                    <i class="fa-solid fa-box me-2"></i>
                                                    До офис на Speedy
                                                </label>
                                            </div>

                                        </div>

                                        @error('delivery_method')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        @error('delivery')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                    <!-- Delivery Method End -->

                                    <!-- Personal Address Start -->
                                    <div id="personal-delivery"
                                        class="{{ old('delivery_method', 'personal') === 'personal' ? '' : 'd-none' }}">

                                        <div class="row mb--30">

                                            <div class="form__group col-md-6 mb-sm--30">
                                                <label for="city"
                                                    class="form__label">

                                                    Град <span>*</span>
                                                </label>

                                                <select name="city"
                                                    id="city"
                                                    class="form__input form__input--2 attribute-choice">

                                                    <option value="">
                                                        Напишете град и го изберете
                                                    </option>

                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->name }}"
                                                            {{ old('city') === $city->name ? 'selected' : '' }}>

                                                            {{ $city->name }}
                                                        </option>
                                                    @endforeach

                                                </select>

                                                @error('city')
                                                    <div class="text-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form__group col-md-6">
                                                <label for="billing_address"
                                                    class="form__label">

                                                    Адрес <span>*</span>
                                                </label>

                                                <input type="text"
                                                    name="billing_address"
                                                    id="billing_address"
                                                    class="form__input form__input--2"
                                                    placeholder="Улица, номер, вход, етаж и апартамент"
                                                    value="{{ old('billing_address') }}">

                                                @error('billing_address')
                                                    <div class="text-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>

                                    </div>
                                    <!-- Personal Address End -->

                                    <!-- Speedy Office Start -->
                                    <div id="office-delivery"
                                        class="{{ old('delivery_method') === 'office' ? '' : 'd-none' }}">

                                        <div class="row mb--30">
                                            <div class="form__group col-12">

                                                <label for="office_list"
                                                    class="form__label">

                                                    Град / офис на Speedy <span>*</span>
                                                </label>

                                                <select name="office_list"
                                                    id="office_list"
                                                    class="form__input form__input--2 attribute-choice">

                                                    <option value="">
                                                        Изберете офис на Speedy
                                                    </option>

                                                    @foreach ($speedyOffices as $office)
                                                        <option
                                                            value="{{ $office->name }} [{{ $office->office_id }}]"
                                                            {{ old('office_list') === $office->name . ' [' . $office->office_id . ']' ? 'selected' : '' }}>

                                                            {{ $office->name }}
                                                            [{{ $office->office_id }}]
                                                        </option>
                                                    @endforeach

                                                </select>

                                                @error('office_list')
                                                    <div class="text-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>

                                    </div>
                                    <!-- Speedy Office End -->

                                    <!-- Invoice Start -->
                                    <div class="checkout-invoice">

                                        <div class="custom-checkbox">

                                            <input type="checkbox"
                                                name="request_invoice"
                                                id="request_invoice"
                                                class="form__checkbox"
                                                value="1"
                                                {{ old('request_invoice') ? 'checked' : '' }}>

                                            <label for="request_invoice"
                                                class="form__checkbox--label">

                                                Желая фактура
                                            </label>

                                        </div>

                                        <div class="checkout-invoice__fields d-none mt--30">

                                            <div class="row mb--30">

                                                <div class="form__group col-md-6 mb-sm--30">
                                                    <label for="company_name"
                                                        class="form__label">

                                                        Име на фирма <span>*</span>
                                                    </label>

                                                    <input type="text"
                                                        name="company_name"
                                                        id="company_name"
                                                        class="form__input form__input--2"
                                                        value="{{ old('company_name') }}">

                                                    @error('company_name')
                                                        <div class="text-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="form__group col-md-6">
                                                    <label for="company_mol"
                                                        class="form__label">

                                                        МОЛ <span>*</span>
                                                    </label>

                                                    <input type="text"
                                                        name="company_mol"
                                                        id="company_mol"
                                                        class="form__input form__input--2"
                                                        value="{{ old('company_mol') }}">

                                                    @error('company_mol')
                                                        <div class="text-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="row mb--30">

                                                <div class="form__group col-md-6 mb-sm--30">
                                                    <label for="company_bulstat"
                                                        class="form__label">

                                                        ЕИК / Булстат <span>*</span>
                                                    </label>

                                                    <input type="text"
                                                        name="company_bulstat"
                                                        id="company_bulstat"
                                                        class="form__input form__input--2"
                                                        value="{{ old('company_bulstat') }}">

                                                    @error('company_bulstat')
                                                        <div class="text-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="form__group col-md-6">
                                                    <label for="company_address"
                                                        class="form__label">

                                                        Адрес на фирма <span>*</span>
                                                    </label>

                                                    <input type="text"
                                                        name="company_address"
                                                        id="company_address"
                                                        class="form__input form__input--2"
                                                        value="{{ old('company_address') }}">

                                                    @error('company_address')
                                                        <div class="text-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                            </div>

                                        </div>

                                        @error('company')
                                            <div class="alert alert-danger mt-3">
                                                Моля, въведете всички фирмени данни,
                                                когато желаете фактура.
                                            </div>
                                        @enderror

                                    </div>
                                    <!-- Invoice End -->

                                </div>
                            </div>
                            <!-- Delivery Information End -->

                            <!-- Order Details Start -->
                            <div class="col-lg-6 mt-md--30">

                                <div class="order-details">

                                    <h3 class="heading-tertiary">
                                        Вашата поръчка
                                    </h3>

                                    <div class="order-table table-content table-responsive mb--30">

                                        <table class="table">

                                            <thead>
                                                <tr>
                                                    <th>Продукт</th>
                                                    <th>Общо</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @foreach ($products ?? [] as $product)
                                                    <tr>

                                                        <td>

                                                            <div class="d-flex align-items-center gap-3">

                                                                <a href="{{ route('shop.show', $product['slug']) }}">

                                                                    <img src="{{ asset('assets/images/products/' . $product['image']) }}"
                                                                        alt="{{ $product['name'] }}"
                                                                        width="75">
                                                                </a>

                                                                <div>

                                                                    <h4 class="mb-1">

                                                                        <a href="{{ route('shop.show', $product['slug']) }}">
                                                                            {{ $product['name'] }}
                                                                        </a>
                                                                    </h4>

                                                                    <span>
                                                                        Количество:
                                                                        <strong>
                                                                            {{ $product['quantity'] }}
                                                                        </strong>
                                                                    </span>

                                                                    @if ((int) ($product['discount'] ?? 0) > 0)
                                                                        <div class="mt-1">
                                                                            <span class="badge bg-danger">
                                                                                -{{ $product['discount'] }}%
                                                                            </span>
                                                                        </div>
                                                                    @endif

                                                                </div>

                                                            </div>

                                                        </td>

                                                        <td>

                                                            @if ((int) ($product['discount'] ?? 0) > 0)
                                                                <del class="text-muted d-block">
                                                                    {{ number_format(
                                                                        $product['price'] * $product['quantity'],
                                                                        2,
                                                                    ) }}
                                                                    €
                                                                </del>

                                                                <strong class="text-danger">
                                                                    {{ number_format(
                                                                        $product['final_price'] * $product['quantity'],
                                                                        2,
                                                                    ) }}
                                                                    €
                                                                </strong>
                                                            @else
                                                                <strong>
                                                                    {{ number_format(
                                                                        $product['final_price'] * $product['quantity'],
                                                                        2,
                                                                    ) }}
                                                                    €
                                                                </strong>
                                                            @endif

                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>

                                            <tfoot>

                                                @if (!empty($promoCode))
                                                    <tr class="cart-subtotal">

                                                        <th>
                                                            Промо код

                                                            <span class="d-block text-success mt-1">
                                                                {{ $promoCode['promo_code_name'] }}
                                                            </span>
                                                        </th>

                                                        <td>
                                                            <strong class="text-success">
                                                                -{{ $promoCode['percentage_promo_code'] }}%
                                                            </strong>
                                                        </td>

                                                    </tr>
                                                @endif

                                                <tr class="shipping">

                                                    <th>
                                                        Доставка
                                                    </th>

                                                    <td>
                                                        Потвърждава се по телефона
                                                    </td>

                                                </tr>

                                                <tr class="order-total">

                                                    <th>
                                                        Общо
                                                    </th>

                                                    <td>

                                                        @if (!empty($promoCode))
                                                            <del class="text-muted d-block">
                                                                {{ number_format($subtotal + $promoDiscount, 2) }}
                                                                €
                                                            </del>

                                                            <span class="order-total-ammount text-success">
                                                                {{ number_format($subtotal, 2) }} €
                                                            </span>
                                                        @else
                                                            <span class="order-total-ammount">
                                                                {{ number_format($subtotal ?? 0, 2) }} €
                                                            </span>
                                                        @endif

                                                    </td>

                                                </tr>

                                            </tfoot>

                                        </table>

                                    </div>

                                    <!-- Promo Code Start -->
                                    <div class="checkout-promo-code mb--30">

                                        <h3 class="heading-tertiary">
                                            Промо код
                                        </h3>

                                        <div class="form__group">

                                            <label for="promo-code-input"
                                                class="form__label">

                                                Код за отстъпка
                                            </label>

                                            <input type="text"
                                                id="promo-code-input"
                                                class="form__input form__input--2"
                                                placeholder="Въведете промо код"
                                                value="{{ session('promo_code.promo_code_name', '') }}"
                                                autocomplete="off">

                                        </div>

                                        <button type="button"
                                            id="apply-promo-code"
                                            class="btn btn-medium btn-style-3 mt--20">

                                            {{ session()->has('promo_code')
                                                ? 'Промокодът е приложен'
                                                : 'Приложи промокода' }}
                                        </button>

                                        <div id="promo-code-message"
                                            class="mt-2"
                                            aria-live="polite">
                                        </div>

                                    </div>
                                    <!-- Promo Code End -->

                                    <!-- Payment Start -->
                                    <div class="checkout-payment">

                                        <div class="payment-group">

                                            <div class="custom-radio payment-radio">

                                                <input type="radio"
                                                    name="payment_method"
                                                    id="cash-on-delivery"
                                                    value="cash"
                                                    checked>

                                                <label class="payment-label"
                                                    for="cash-on-delivery">

                                                    <i class="fa-solid fa-money-bill-wave me-2"></i>

                                                    Плащане при получаване
                                                </label>

                                            </div>

                                            <div class="payment-info">
                                                <p>
                                                    Платете в брой при получаване на
                                                    пратката от куриера.
                                                </p>
                                            </div>

                                        </div>

                                        <div class="payment-btn-group">

                                            <button type="submit"
                                                class="btn btn-style-3">

                                                <i class="fa-solid fa-check me-2"></i>

                                                Завърши поръчката
                                            </button>

                                        </div>

                                    </div>
                                    <!-- Payment End -->

                                </div>

                            </div>
                            <!-- Order Details End -->

                        </div>
                    </div>

                </form>

            </div>
        </div>
        <!-- Checkout Area End -->

    </div>
    <!-- Main Content Wrapper End -->

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
