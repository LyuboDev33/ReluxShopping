<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('SEO')

    <!-- Favicons -->
    <link rel="icon" sizes="180x180" href="/assets/img/logo-relux.png?v=<?php echo time(); ?>" />


    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Lenis CSS -->
    <link rel="stylesheet" href="https://unpkg.com/lenis@1.3.23/dist/lenis.css">

    <!-- Choices.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <!-- Elegant Icons CSS -->
    <link rel="stylesheet" href="/assets/css/elegent-icons.css">

    <!-- Template Plugins CSS -->
    <link rel="stylesheet" href="/assets/css/plugins.css">

    <!-- Main Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}?v={{ time() }}">

    <link rel="stylesheet" href="/assets/css/shop.css?v=<?php echo time(); ?>" />

    <link rel="stylesheet" href="/assets/css/testimonials.css?v=<?php echo time(); ?>" />


    <!-- Modernizr JS -->
    <script src="/assets/js/vendor/modernizr-2.8.3.min.js" defer></script>

    <!-- jQuery JS -->
    <script src="/assets/js/vendor/jquery.min.js"></script>

    <!-- Bootstrap and Popper Bundle JS -->
    <script src="/assets/js/bootstrap.bundle.min.js" defer></script>

    <!-- Template Plugins JS -->
    <script src="/assets/js/plugins.js" defer></script>

    <!-- Lenis JS -->
    <script src="https://unpkg.com/lenis@1.3.23/dist/lenis.min.js" defer></script>

    <!-- Choices.js JS -->
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js" defer></script>

    <!-- Fancybox JS -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.umd.js" defer></script>

    <!-- Main Template JS -->
    <script src="{{ asset('assets/js/main.js') }}?v={{ filemtime(public_path('assets/js/main.js')) }}" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
</head>

<body class="font-sans antialiased">

    <div class="wrapper bg--shaft">

        @include('layouts.partials.frontend.header')

        <main>
            {{ $slot }}
        </main>

        @include('layouts.partials.frontend.footer')


    </div>

    <div class="cookies__modal shadow">
        <img class="cookies" src="/assets/images/cookie.webp" alt="Бисквитки">

        <div>
            <p>
                <strong>Relux</strong> използва бисквитки за по-добро и
                персонализирано потребителско изживяване.
            </p>

            <div class="d-flex gap-4 justify-content-center mt-30">
                <button id="acceptBtn" type="button">
                    Добре, разбрах
                </button>
            </div>
        </div>
    </div>

    <script src="/assets/js/custom.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initializeLenis();
            initializeFancybox();
            initializeChoicesJS();
        });

        function initializeLenis() {
            if (typeof Lenis === 'undefined') {
                return;
            }

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
        }

        function initializeFancybox() {
            if (typeof Fancybox === 'undefined') {
                return;
            }

            Fancybox.bind('[data-fancybox]', {});
        }

        function initializeChoicesJS() {
            if (typeof Choices === 'undefined') {
                return;
            }

            const attributeSelects = document.querySelectorAll(
                '.attribute-choice'
            );

            if (attributeSelects.length === 0) {
                return;
            }

            attributeSelects.forEach(function(select) {
                if (select.dataset.choicesInitialized === 'true') {
                    return;
                }

                new Choices(select, {
                    searchEnabled: true,
                    searchChoices: true,
                    itemSelectText: '',
                    searchPlaceholderValue: 'Търси стойност...',
                    noResultsText: 'Няма намерени резултати',
                    noChoicesText: 'Няма налични стойности',
                    placeholder: true,
                    removeItemButton: true,
                    shouldSort: false
                });

                select.dataset.choicesInitialized = 'true';
            });
        }
    </script>


</body>

</html>
