<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('SEO')

    {{-- Google Search Console --}}
    <meta name="google-site-verification" content="GG3KFO1fxuArNlnRhzstDNXHzya2PeAShiR_3qb3CNQ">


    <link rel="stylesheet" href="/assets/css/bootstrap.min.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/animate.min.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/custom-animate.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/jarallax.css?v=<?php echo time(); ?>" />


    <link rel="stylesheet" href="/assets/css/flaticon.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css?v=<?php echo time(); ?>" />

    <link rel="stylesheet" href="/assets/css/odometer.min.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/nice-select.css?v=<?php echo time(); ?>" />


    <link rel="stylesheet" href="/assets/css/module-css/slider.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/module-css/footer.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/module-css/counter.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/module-css/services.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/module-css/about.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/module-css/brand.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/module-css/gallery.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/module-css/faq.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/module-css/testimonial.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/module-css/team.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/module-css/contact.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/module-css/pricing.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/module-css/blog.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/module-css/sliding-text.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/module-css/cta.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/module-css/feature.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/module-css/banner.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/module-css/error-page.css?v=<?php echo time(); ?>" />

    <!-- template styles -->
    <link rel="stylesheet" href="/assets/css/style.css?v=<?php echo time(); ?>" />
    {{-- <link rel="stylesheet" href="/assets/css/style-new-colors.css?v=<?php echo time(); ?>" /> --}}

    <link rel="stylesheet" href="/assets/css/shop.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/responsive.css?v=<?php echo time(); ?>" />

    <link rel="icon" type="image/png" href="/assets/images/favicons/favicon-96x96.png?v=<?php echo time(); ?>"
        sizes="96x96" />

    <link rel="icon" type="image/svg+xml"
        href="/assets/images/favicons/transparent-image.png?v=<?php echo time(); ?>" />
    <link rel="shortcut icon" href="/assets/images/favicons/favicon-96x96.png?v=<?php echo time(); ?>" />
    <link rel="apple-touch-icon" sizes="180x180"
        href="/assets/images/favicons/apple-touch-icon.png?v=<?php echo time(); ?>" />
    <link rel="manifest" href="/assets/images/favicons/site.webmanifest?v=<?php echo time(); ?>" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.css" />

    <link rel="stylesheet" href="https://unpkg.com/lenis@1.3.23/dist/lenis.css">

    <script src="https://unpkg.com/lenis@1.3.23/dist/lenis.min.js"></script>

    <script>
        const lenis = new Lenis({
            duration: 1,
            smoothWheel: true,
            wheelMultiplier: 0.8,
            touchMultiplier: 0.8,
            lerp: 0.5
        });

        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }

        requestAnimationFrame(raf);
    </script>

    <script src="/assets/js/jquery-3.6.0.min.js?v=<?php echo time(); ?>"></script>

    <script src="/assets/js/bootstrap.bundle.min.js?v=<?php echo time(); ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>


</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        @include('layouts.partials.frontend.header')

        <main class="page-wrapper">
            {{ $slot }}
        </main>

        @include('layouts.partials.frontend.footer')

    </div>

    <script src="/assets/js/jarallax.min.js?v=<?php echo time(); ?>"></script>

    <script src="/assets/js/aos.js?v=<?php echo time(); ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.umd.js"></script>

    <!-- template js -->
    <script src="/assets/js/script.js?v=<?php echo time(); ?>"></script>
    <script src="/assets/js/custom.js?v=<?php echo time(); ?>"></script>

    <script>
        $(document).ready(function() {
            Fancybox.bind("[data-fancybox]", {});

            initializeChoicesJS();
        });

        function initializeChoicesJS() {
            const attributeSelects = document.querySelectorAll(
                '.attribute-choice'
            );

            if (attributeSelects.length < 0) {
                return;
            }

            attributeSelects.forEach(function(select) {
                new Choices(select, {
                    searchEnabled: true,
                    searchChoices: true,
                    itemSelectText: '',
                    searchPlaceholderValue: 'Търси стойност...',
                    noResultsText: 'Няма намерени резултати',
                    noChoicesText: 'Няма налични стойности',
                    placeholder: true,
                    placeholder: true,
                    removeItemButton: true,
                });
            });
        }
    </script>

    <div class="cookies__modal shadow wrapper">
        <img class="cookies" src="/assets/images/cookie.webp" alt="Бисквитки">
        <div>
            <p><strong>Valente Optics</strong> използва бисквитки за по-добро и персонализирано
                потребителско изживяване.</p>

            <div class="d-flex gap-4 justify-content-center mt-30">
                <button id="acceptBtn">Добре, разбрах</button>
            </div>
        </div>
    </div>



</body>

</html>
