<!--Site Footer Start-->
<footer class="site-footer site-footer-two site-footer-four">
    <div class="site-footer__wrap">
        <div class="site-footer-two__shape-1"></div>
        <div class="site-footer-two__shape-2"></div>

        <div class="site-footer__top">
            <div class="container">
                <div class="site-footer__top-inner">
                    <div class="row">

                        <!-- Logo + Contacts -->
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="footer-widget__about">

                                <div class="footer-widget__about-logo">
                                    <x-logo width="150" />
                                </div>

                                <div class="footer-widget__contact-info">
                                    <ul class="footer-widget__contact-list list-unstyled">

                                        <li>
                                            <div class="footer-widget__contact-icon-box">
                                                <span class="icon-pin"></span>
                                                <p>Равда</p>
                                            </div>

                                            <p class="footer-widget__contact-text">
                                                ул. „Македония“ 20, 8238 Равда
                                            </p>
                                        </li>

                                        <li>
                                            <div class="footer-widget__contact-icon-box">
                                                <span class="icon-phone"></span>
                                                <p>Телефон</p>
                                            </div>

                                            <p class="footer-widget__contact-text">
                                                <a href="tel:+359877000027">
                                                    +359 877 000 027
                                                </a>
                                            </p>
                                        </li>

                                        <li>
                                            <div class="footer-widget__contact-icon-box">
                                                <span class="icon-mail"></span>
                                                <p>Имейл</p>
                                            </div>

                                            <p class="footer-widget__contact-text">
                                                <a href="mailto:info@valenteoptic.bg">
                                                    info@valenteoptic.bg
                                                </a>
                                            </p>
                                        </li>

                                    </ul>
                                </div>

                            </div>
                        </div>

                        <!-- Pages -->
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="footer-widget__page-link">

                                <h4 class="footer-widget__title">
                                    Бързи връзки
                                </h4>

                                <ul class="footer-widget__page-link-list list-unstyled">

                                    <li>
                                        <a href="/">
                                            <span class="icon-double-arrow-right"></span>
                                            <p>Начало</p>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/about">
                                            <span class="icon-double-arrow-right"></span>
                                            <p>За нас</p>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/shop">
                                            <span class="icon-double-arrow-right"></span>
                                            <p>Магазин</p>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/services">
                                            <span class="icon-double-arrow-right"></span>
                                            <p>Услуги</p>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/contact">
                                            <span class="icon-double-arrow-right"></span>
                                            <p>Контакти</p>
                                        </a>
                                    </li>

                                </ul>

                            </div>
                        </div>

                        <!-- Services -->
                  <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
    <div class="footer-widget__social-box">

        <h4 class="footer-widget__title">
            Социални мрежи
        </h4>

        <p class="footer-widget__social-text mt-0">
            Последвайте ни в социалните мрежи
        </p>

        <div class="footer-widget__social">

            <a href="#" target="_blank">
                <span class="icon-facebook-f"></span>
            </a>

            <a href="#" target="_blank">
                <span class="icon-instagram"></span>
            </a>

            <a href="#" target="_blank">
                <span class="icon-pintarest"></span>
            </a>

            <a href="#" target="_blank">
                <span class="icon-Vector"></span>
            </a>

        </div>

    </div>
</div>

                        <!-- Working Hours -->
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                            <div class="site-footer-four__contact-box">

                                <h4 class="site-footer-four__contact-title">
                                    Работно време
                                </h4>

                                <ul class="list-unstyled site-footer-four__contact-time">
                                    <li>Понеделник – Петък: 09:00 – 18:30</li>
                                    <li>Събота: 09:00 – 14:00</li>
                                    <li>Неделя: Почивен ден</li>
                                </ul>

                                <div class="site-footer-four__btn-box">
                                    <a href="/contact" class="thm-btn">
                                        Контакти
                                        <span class="icon-arrow-up-right"></span>
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom -->
        <div class="site-footer__bottom">
            <div class="container">

                <div class="row">
                    <div class="col-xl-12">

                        <div class="site-footer__bottom-inner">

                            <div class="site-footer__copyright">
                                <p class="site-footer__copyright-text">
                                    © {{ date('Y') }}
                                    <a href="/">
                                        Valente Optic
                                    </a>
                                    . Всички права запазени.
                                </p>
                            </div>

                            <div class="site-footer__bottom-menu-box">
                                <ul class="list-unstyled site-footer__bottom-menu">

                                    <li>
                                        <a href="{{ route('conditions') }}">
                                            Общи условия
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('privacy') }}">
                                            Политика за поверителност
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/contact">
                                            Контакти
                                        </a>
                                    </li>

                                </ul>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
<!--Site Footer End-->
