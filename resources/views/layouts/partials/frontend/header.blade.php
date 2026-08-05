<!-- Header Area Start -->
<header class="header headery-style-1">


    <!-- Header Middle -->
    <div class="header-middle header-top-1">
        <div class="container">
            <div class="row no-gutters align-items-center">

                <!-- Logo -->
                <div class="col-lg-3 col-md-5 col-sm-6 col-6">
                    <x-logo width="100" mobileWidth="90" />
                </div>

                <!-- Desktop Navigation -->
                <div class="col-lg-6 d-none d-lg-block text-center">
                    <nav class="main-navigation desktop-navigation">
                        @include('layouts.partials.frontend.navigation')
                    </nav>
                </div>

                <!-- Toolbar -->
                <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                    <div class="header-toolbar">

                        <div class="search-form-wrapper search-hide">
                            <form action="#" class="search-form">
                                <input
                                    type="text"
                                    name="search"
                                    id="search"
                                    class="search-form__input"
                                    placeholder="Search entire store here..">

                                <button
                                    type="submit"
                                    class="search-form__submit">
                                    <i class="icon_search"></i>
                                </button>
                            </form>
                        </div>

                        <ul class="header-toolbar-icons">

                            <li class="wishlist-icon">
                                <a href="{{ route('wishlist') }}"
                                    class="bordered-icon">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </li>

                            <li class="mini-cart-icon">
                                <div class="mini-cart mini-cart--1">
                                    <a
                                        href="{{ route('cart') }}"
                                        class="mini-cart__dropdown-toggle bordered-icon">

                                        <span class="mini-cart__count">
                                            0
                                        </span>

                                        <i class="icon_cart_alt mini-cart__icon"></i>

                                    </a>
                                </div>
                            </li>

                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div class="header-bottom header-top-1 position-relative navigation-wrap fixed-header d-lg-none">

        <div class="container position-static">

            <!-- Hidden navigation used ONLY by MeanMenu -->
            <div class="row">
                <div class="col-12 position-static text-center">

                    <nav class="mobile-navigation-source">
                        @include('layouts.partials.frontend.navigation')
                    </nav>

                </div>
            </div>

            <!-- MeanMenu injects the mobile menu here -->
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="mobile-menu"></div>
                </div>
            </div>

        </div>

    </div>

</header>
<!-- Header Area End -->
