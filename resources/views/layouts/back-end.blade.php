<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Табло за управление | Оптика Valente</title>

    <meta name="robots" content="noindex,nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- FAVICONS --}}

    <link rel="icon" sizes="180x180" href="/assets/img/logo-relux.png?v=<?php echo time(); ?>" />

    {{-- CORE CSS --}}
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css?v=<?php echo time(); ?>" />

    <link rel="stylesheet" href="/assets/css/dashboard.css?v=<?php echo time(); ?>" />

    <link rel="stylesheet" href="/assets/css/shop.css?v=<?php echo time(); ?>" />

    <link rel="stylesheet" href="https://unpkg.com/lenis@1.3.23/dist/lenis.css">

    <script src="https://unpkg.com/lenis@1.3.23/dist/lenis.min.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">

    <script src="https://cdn.tiny.cloud/1/v2rtxhtgnbmw7x4hswnvpvejzuaankjl6lfde5n3swkjawjo/tinymce/8/tinymce.min.js"
        referrerpolicy="origin" crossorigin="anonymous"></script>

    <script src="/assets/js/vendor/jquery.min.js?v=<?php echo time(); ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>




</head>

<body class="dashboard-body">

    <div class="dashboard-shell">

        @include('layouts.partials.backend.sidebar')

        <div class="dashboard-main">

            @include('layouts.partials.backend.header')

            <main id="content" class="dashboard-content shadow">
                {{ $slot }}
            </main>

        </div>

    </div>
    <script src="/assets/js/bootstrap.bundle.min.js?v=<?php echo time(); ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>


    <script>
        $(document).ready(function() {
            initDashboardDropdown();
            initSidebarToggle();
            initTinyMce();
            initializeChoicesJS();
            initializeLenis();
        });

        function initDashboardDropdown() {
            document.addEventListener('click', function(e) {
                const trigger = e.target.closest('[data-dropdown-toggle]');
                const openDropdown = document.querySelector('.dashboard-dropdown.is-open');

                if (trigger) {
                    const dropdown = trigger.closest('.dashboard-dropdown');

                    if (openDropdown && openDropdown !== dropdown) {
                        openDropdown.classList.remove('is-open');
                    }

                    dropdown.classList.toggle('is-open');
                    e.stopPropagation();

                    return;
                }

                if (openDropdown && !e.target.closest('.dashboard-dropdown')) {
                    openDropdown.classList.remove('is-open');
                }
            });
        }

        function initSidebarToggle() {
            document.addEventListener('click', function(e) {
                if (e.target.closest('[data-sidebar-toggle]')) {
                    document.body.classList.toggle('sidebar-open');
                }

                if (
                    e.target.closest('[data-sidebar-close]') ||
                    (
                        document.body.classList.contains('sidebar-open') &&
                        !e.target.closest('.dashboard-sidebar') &&
                        !e.target.closest('[data-sidebar-toggle]')
                    )
                ) {
                    document.body.classList.remove('sidebar-open');
                }
            });
        }


        function initTinyMce() {
            tinymce.init({
                selector: 'textarea',
                plugins: [
                    'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'link', 'lists', 'media',
                    'searchreplace', 'table', 'visualblocks', 'wordcount',
                ],
                toolbar: 'undo redo | tinymceai-chat tinymceai-quickactions tinymceai-review | blocks fontfamily fontsize | bold italic underline strikethrough | link media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography uploadcare | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                mergetags_list: [{
                        value: 'First.Name',
                        title: 'First Name'
                    },
                    {
                        value: 'Email',
                        title: 'Email'
                    },
                ],
            });
        }

        function initializeChoicesJS() {
            const attributeSelects = document.querySelectorAll(
                '.attribute-choice'
            );

            attributeSelects.forEach(function(select) {
                new Choices(select, {
                    searchEnabled: true,
                    searchChoices: true,
                    itemSelectText: '',
                    searchPlaceholderValue: 'Търси стойност...',
                    noResultsText: 'Няма намерени резултати',
                    noChoicesText: 'Няма налични стойности',
                    placeholder: true,
                    removeItemButton: true,
                });
            });
        }

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

    </script>





</body>


</html>
