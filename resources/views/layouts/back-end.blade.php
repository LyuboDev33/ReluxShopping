<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Табло за управление | Оптика Valente</title>

    <meta name="robots" content="noindex,nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- FAVICONS --}}
    <link rel="icon" type="image/png" href="/assets/images/favicons/favicon-96x96.png?v=<?php echo time(); ?>"
        sizes="96x96" />
    <link rel="icon" type="image/svg+xml"
        href="/assets/images/favicons/transparent-image.png?v=<?php echo time(); ?>" />
    <link rel="shortcut icon" href="/assets/images/favicons/favicon-96x96.png?v=<?php echo time(); ?>" />
    <link rel="apple-touch-icon" sizes="180x180"
        href="/assets/images/favicons/apple-touch-icon.png?v=<?php echo time(); ?>" />
    <link rel="manifest" href="/assets/images/favicons/site.webmanifest?v=<?php echo time(); ?>" />

    {{-- CORE CSS --}}
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/animate.min.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/custom-animate.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/swiper.min.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/font-awesome-all.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/jarallax.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/flaticon.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css?v=<?php echo time(); ?>" />

    {{-- MODULE CSS --}}
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

    <link rel="stylesheet" href="/assets/css/style.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/shop.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/responsive.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/custom.css?v=<?php echo time(); ?>" />

    <link rel="stylesheet" href="/assets/css/dashboard.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.tiny.cloud/1/daj9dftxtp56iiymy0p7tr418kjkhmf54509unx3enwwzrca/tinymce/8/tinymce.min.js"
        referrerpolicy="origin" crossorigin="anonymous"></script>

    <script src="/assets/js/jquery-3.6.0.min.js?v=<?php echo time(); ?>"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


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
    <script src="/assets/js/jarallax.min.js?v=<?php echo time(); ?>"></script>


    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.umd.js"></script>



    <script>
        $(document).ready(function() {
            initDashboardDropdown();
            initSidebarToggle();
            initSearchableSelect();
            initTinyMce();
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

        function initSearchableSelect() {
            if ($('.searchable-select').length > 0) {
                $('.searchable-select').select2({
                    width: '100%',
                    placeholder: 'Търси...',
                    allowClear: true
                });
            }
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
    </script>





</body>


</html>
