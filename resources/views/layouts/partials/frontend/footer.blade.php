<!-- Footer Start -->
<footer class="footer border-top ptb--40 ptb-md--30">
    <div class="container">

        <div class="row mb--40 mb-md--30">

            <!-- Контакти -->
            <div class="col-lg-4 col-md-6 mb-md--30">
                <div class="footer-widget">

                    <h3 class="widget-title">
                        ReLux TopShopping
                    </h3>

                    <div class="widget-content mb--20">
                        <p>
                            Премиум селекция от 100% автентични часовници,
                            аксесоари и луксозни модни предложения.
                        </p>

                        <p>
                            <strong>Телефон:</strong>
                            <a href="tel:+359876904056">
                                0876 904 056
                            </a>
                        </p>

                        <p>
                            <strong>Имейл:</strong>
                            <a href="mailto:contact@reluxtop.com">
                                contact@reluxtop.com
                            </a>
                        </p>
                    </div>

                    <ul class="social social-round">

                        <li class="social__item">
                            <a class="social__link"
                                href="https://facebook.com"
                                target="_blank"
                                rel="noopener noreferrer">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </li>

                        <li class="social__item">
                            <a class="social__link"
                                href="https://instagram.com"
                                target="_blank"
                                rel="noopener noreferrer">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </li>

                        <li class="social__item">
                            <a class="social__link"
                                href="https://tiktok.com"
                                target="_blank"
                                rel="noopener noreferrer">
                                <i class="fa-brands fa-tiktok"></i>
                            </a>
                        </li>

                    </ul>

                </div>
            </div>

            <!-- Полезна информация -->
            <div class="col-lg-4 col-md-6 mb-md--30">
                <div class="footer-widget">

                    <h3 class="widget-title">
                        Полезна информация
                    </h3>

                    <ul class="widget-menu">
                        <li>
                            <a href="{{ route('about') }}">
                                За нас
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('contact') }}">
                                Контакти
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Доставка и плащане
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Политика за поверителност
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Общи условия
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Право на връщане
                            </a>
                        </li>
                    </ul>

                </div>
            </div>

            <!-- Клиентски профил -->
            <div class="col-lg-4 col-md-6 mb-sm--30">
                <div class="footer-widget">

                    <h3 class="widget-title">
                        Моят профил
                    </h3>

                    <ul class="widget-menu">

                        <li>
                            <a href="{{ route('shop.index') }}">
                                Магазин
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('wishlist') }}">
                                Любими продукти
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('cart') }}">
                                Количка
                            </a>
                        </li>

                       
                        <li>
                            <a href="{{ route('contact') }}">
                                Свържете се с нас
                            </a>
                        </li>

                    </ul>

                </div>
            </div>

        </div>

        <!-- Bottom Menu -->
        <div class="row mb--40 mb-md--30">

            <div class="col-12">

                <ul class="footer-menu">

                    <li>
                        <a href="/">
                            Начало
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('shop.index') }}">
                            Магазин
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('about') }}">
                            За нас
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contact') }}">
                            Контакти
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Общи условия
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Политика за поверителност
                        </a>
                    </li>

                </ul>

            </div>

        </div>

        <!-- Copyright -->
        <div class="row">

            <div class="col-12 text-center">

                <p class="copyright-text">
                    &copy; {{ date('Y') }}
                    <strong>ReLux TopShopping</strong>.
                    Всички права запазени.
                    Направено с много
                    <i class="fa fa-heart text-danger"></i>
                    във Варна.
                </p>

            </div>

        </div>

    </div>
</footer>
<!-- Footer End -->
