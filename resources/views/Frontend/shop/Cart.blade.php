<x-frontend>

    @section('SEO')
        <title>Количка | ReLux TopShopping</title>

        <meta name="description"
            content="Прегледайте продуктите във вашата количка в ReLux TopShopping и продължете към сигурно завършване на поръчката.">

        <meta name="robots" content="noindex,nofollow">

        <meta name="googlebot" content="noindex,nofollow">

        <meta property="og:locale" content="bg_BG">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="ReLux TopShopping">
        <meta property="og:title" content="Количка | ReLux TopShopping">

        <meta property="og:description"
            content="Прегледайте избраните продукти във вашата количка и продължете към завършване на поръчката.">

        <meta name="twitter:card" content="summary_large_image">

        <meta name="twitter:title" content="Количка | ReLux TopShopping">

        <meta name="twitter:description"
            content="Прегледайте избраните продукти и продължете към завършване на поръчката в ReLux TopShopping.">

        <meta name="author" content="ReLux TopShopping">

        <meta name="application-name" content="ReLux TopShopping">

        <meta name="theme-color" content="#171717">
    @endsection


    <!-- Start Cart Page -->
    <section class="cart-page">
        <div class="container">

            @if (count($products))

                <div class="table-responsive">

                    <table class="table cart-table">

                        <thead>
                            <tr>
                                <th>Продукт</th>
                                <th>Цена</th>
                                <th>Количество</th>
                                <th>Общо</th>
                                <th>Премахни</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($products as $key => $product)

                                <tr>

                                    {{-- Product --}}
                                    <td>

                                        <div class="product-box align-items-start">

                                            <div class="img-box">

                                                <img
                                                    src="{{ asset('assets/images/products/' . $product['image']) }}"
                                                    alt="{{ $product['name'] }}"
                                                >

                                            </div>

                                            <div>

                                                <h3>

                                                    <a href="{{ route('shop.show', $product['slug']) }}">
                                                        {{ $product['name'] }}
                                                    </a>

                                                </h3>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- Price --}}
                                    <td>

                                        @if ((int) ($product['discount'] ?? 0) > 0)

                                            <div class="d-flex flex-column gap-1">

                                                <div>

                                                    <del class="text-muted">
                                                        {{ number_format($product['price'], 2) }} €
                                                    </del>

                                                    <span class="badge bg-danger ms-2 rounded-pill text-color">
                                                        -{{ $product['discount'] }}%
                                                    </span>

                                                </div>

                                                <span class="text-danger">
                                                    {{ number_format($product['final_price'], 2) }} €
                                                </span>

                                            </div>

                                        @else

                                            {{ number_format($product['final_price'], 2) }} €

                                        @endif

                                    </td>


                                    {{-- Quantity --}}
                                    <td>

                                        <div class="quantity-box">

                                            <p class="text-center mb-0">
                                                {{ $product['quantity'] }}
                                            </p>

                                        </div>

                                    </td>


                                    {{-- Total --}}
                                    <td>

                                        <strong>
                                            {{ number_format($product['line_total'], 2) }} €
                                        </strong>

                                    </td>


                                    {{-- Remove --}}
                                    <td>

                                        <form
                                            class="d-flex justify-content-end"
                                            action="{{ route('cart.remove', $key) }}"
                                            method="POST"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="cross-icon border-0 bg-transparent"
                                                aria-label="Премахни {{ $product['name'] }} от количката"
                                            >

                                                <i class="fa-regular fa-trash-can"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>


                <div class="row">

                    <div class="col-xl-8 col-lg-7"></div>

                    <div class="col-xl-4 col-lg-5 d-flex flex-column">

                        <a
                            class="thm-btn mb-4"
                            href="{{ route('checkout') }}"
                        >

                            Премини към плащане

                        </a>


                        <ul class="cart-total list-unstyled">

                            <li>

                                <span>
                                    Междинна сума
                                </span>

                                <span>
                                    {{ number_format($subtotal, 2) }} €
                                </span>

                            </li>

                            <li>

                                <span>
                                    Общо
                                </span>

                                <span class="cart-total-amount">
                                    {{ number_format($subtotal, 2) }} €
                                </span>

                            </li>

                        </ul>

                    </div>

                </div>

            @else

                <!-- Empty Cart Start -->
                <div class="error-area pt--90 pb--100">

                    <div class="container">

                        <div class="row justify-content-center">

                            <div class="col-xl-7 col-lg-8 text-center">

                                <div class="error">

                                    <h1>
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </h1>

                                    <h2>
                                        КОЛИЧКАТА ВИ Е ПРАЗНА
                                    </h2>

                                    <p>
                                        Все още няма добавени продукти във вашата количка.
                                        Разгледайте нашата селекция от луксозни часовници
                                        и премиум аксесоари и открийте своя следващ любим модел.
                                    </p>

                                    <div class="mt-5">

                                        <a
                                            href="{{ route('shop.index') }}"
                                            class="thm-btn"
                                        >

                                            Разгледай продуктите

                                            <span class="icon-arrow-up-right"></span>

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- Empty Cart End -->

            @endif

        </div>
    </section>
    <!-- End Cart Page -->

</x-frontend>
