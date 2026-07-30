    <header class="main-header-two">
        <div class="main-header-two__wrapper">
            @include('layouts.partials.frontend.navigation')
        </div>
    </header>


    <div class="stricky-header stricked-menu main-menu main-menu-four">
        <div class="sticky-header__content">
            @include('layouts.partials.frontend.navigation')
        </div>
        <!-- /.sticky-header__content -->
    </div>
    <!-- /.stricky-header -->

    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:valenteoptics@gmail.com">valenteoptics@gmail.com</a>
                </li>
                <li>
                    <i class="fas fa-phone"></i>
                    <a href="tel:359893023731">+359 89 3023731</a>
                </li>
            </ul>
            <!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a target="_blank" href="https://www.facebook.com/valente.optic">
                        <i class="fa-brands fa-facebook"></i>
                    </a>

                    <a target="_blank" href="https://www.tiktok.com/@valenteoptic.burgas">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>

                </div>
                <!-- /.mobile-nav__social -->
            </div>
            <!-- /.mobile-nav__top -->
        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->
