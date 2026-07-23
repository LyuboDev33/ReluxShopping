<x-frontend>

    @section('SEO')
        <title>Онлайн магазин за очила | Диоптрични рамки, слънчеви очила и аксесоари | Valente Optic</title>

        <meta name="description"
            content="Открийте богато разнообразие от диоптрични рамки, слънчеви очила, очила за деца, стъкла и аксесоари във Valente Optic. Качествени марки, професионална консултация и бърза доставка в цяла България.">

        <meta name="keywords"
            content="Valente Optic, онлайн магазин за очила, диоптрични рамки, слънчеви очила, детски очила, очила, оптика, оптика Бургас, оптика Равда, стъкла за очила, прогресивни стъкла, аксесоари за очила">

        <meta name="robots" content="index,follow">

        <link rel="canonical" href="{{ url()->current() }}">

        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Valente Optic">
        <meta property="og:title" content="Онлайн магазин за очила | Valente Optic">
        <meta property="og:description"
            content="Разгледайте богат избор от диоптрични рамки, слънчеви очила, стъкла и аксесоари. Качество, професионално обслужване и бърза доставка от Valente Optic.">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="{{ url('assets/images/logo/logo.png') }}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Онлайн магазин за очила | Valente Optic">
        <meta name="twitter:description"
            content="Диоптрични рамки, слънчеви очила, стъкла и аксесоари от Valente Optic. Пазарувайте онлайн с бърза доставка и професионална консултация.">
        <meta name="twitter:image" content="{{ url('assets/images/logo/logo.png') }}">

        <link href="/assets/css/tom-select.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.6.2/dist/js/tom-select.complete.min.js"></script>
    @endsection


    <!--Product Start-->
    <section class="product fe-section">
        <div class="container">
            <div class="row">

                <div class="col-xl-3 col-lg-12">

                    <button class="shop-sidebar-toggle d-xl-none" id="shopSidebarToggle">
                        <i class="fa-solid fa-bars"></i>
                        Филтри
                    </button>

                    <div class="shop-sidebar-overlay"></div>

                    <div class="product__sidebar">


                        <form method="GET" class="shop-category product__sidebar-single">
                            <h3 class="product__sidebar-title text-center">Филтри</h3>


                            @foreach ($filters as $filter)
                                <div class="mb-3">
                                    <label class="form-label" for="filter-{{ $filter['slug'] }}">
                                        {{ $filter['name'] }}
                                    </label>

                                    <select id="filter-{{ $filter['slug'] }}" name="{{ $filter['slug'] }}"
                                        class="form-select select-beast p-0">
                                        <option value=""></option>

                                        @foreach ($filter['values'] as $value)
                                            <option value="{{ $value['slug'] }}" @selected(request()->filled($filter['slug']) && request($filter['slug']) === $value['slug'])>
                                                {{ $value['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach

                            <button type="submit" class="btn btn-primary">
                                Филтрирай
                            </button>

                            <a href="{{ route('shop.index') }}" class="btn btn-light">
                                Изчисти
                            </a>
                        </form>


                        <div class="shop-category product__sidebar-single">
                            <h3 class="product__sidebar-title">Категории</h3>

                            <ul class="list-unstyled shop-category__tree">

                                <li class="{{ $category ? 'active' : '' }}">
                                    <a href="{{ route('shop.index') }}">
                                        Всички продукти
                                    </a>
                                </li>

                                @foreach ($categoriesTree as $node)
                                    @include('Frontend.shop.partials.category-tree', [
                                        'node' => $node,
                                        'activeSlug' => $category?->slug,
                                    ])
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>

                {{-- ============ PRODUCTS GRID ============ --}}
                <div class="col-xl-9 col-lg-12">
                    <div class="product__items">

                        <div class="row">
                            <div class="col-xl-12">

                                <nav class="shop-breadcrumb rounded-pill bg-dark w-fit p-3 mb-3 mt-3"
                                    aria-label="Навигация">
                                    <a href="{{ route('shop.index') }}">
                                        Магазин
                                    </a>

                                    @foreach ($breadcrumbs ?? [] as $breadcrumb)
                                        <span class="shop-breadcrumb__separator">
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </span>

                                        @if ($loop->last)
                                            <span class="shop-breadcrumb__current" aria-current="page">
                                                {{ $breadcrumb['name'] }}
                                            </span>
                                        @else
                                            <a href="{{ route('shop.category', $breadcrumb['slug']) }}">
                                                {{ $breadcrumb['name'] }}
                                            </a>
                                        @endif
                                    @endforeach
                                </nav>

                                @if ($products->hasPages())
                                    <div class="row mt-4 mb-4">
                                        <div class="col-12 d-flex justify-content-start gap-3">
                                            {{ $products->links() }}
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>

                        {{-- Products --}}
                        <div class="product__all">
                            <div class="row">

                                @forelse ($products as $product)
                                    <!--Product Single Start-->
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-6">
                                        <div class="product__all-single">

                                            <div class="product__all-img">
                                                <a href="{{ route('shop.show', $product->slug) }}">
                                                    @if ($product->main_image)
                                                        <img src="{{ asset('assets/images/products/' . $product->main_image) }}"
                                                            alt="{{ $product->name }}" />
                                                        <img src="{{ asset('assets/images/products/' . $product->main_image) }}"
                                                            alt="{{ $product->name }}" />
                                                    @else
                                                        <img src="{{ asset('assets/images/shop/shop-product-1-1.jpg') }}"
                                                            alt="{{ $product->name }}" />
                                                        <img src="{{ asset('assets/images/shop/shop-product-1-1.jpg') }}"
                                                            alt="{{ $product->name }}" />
                                                    @endif
                                                </a>
                                            </div>

                                            <div class="product__all-content">

                                                @if ($product->categories->isNotEmpty())
                                                    <p class="small text-muted mb-1">
                                                        {{ $product->categories->pluck('name')->join(' · ') }}
                                                    </p>
                                                @endif

                                                <h4 class="product__all-title">
                                                    <a href="{{ route('shop.show', $product->slug) }}">
                                                        {{ $product->name }}
                                                    </a>
                                                </h4>

                                                @if ($product->brand)
                                                    <p class="product__all-brand mt-3 mb-3">
                                                        <span>Марка:</span> <b>{{ $product->brand }}</b>
                                                    </p>
                                                @endif

                                                <p class="product__all-price">
                                                    @if ($product->discount)
                                                        <del class="text-muted me-2">
                                                            {{ number_format($product->price, 2) }} €
                                                        </del>

                                                        <span class="text-danger">
                                                            {{ number_format($product->price - ($product->price * $product->discount) / 100, 2) }}
                                                            €
                                                        </span>
                                                        (-{{ $product->discount }}%)
                                                    @else
                                                        {{ number_format($product->price, 2) }} €
                                                    @endif
                                                </p>

                                                <form method="POST" action="{{ route('wishlist.add', $product) }}"
                                                    class="product__all-btn-box d-flex justify-content-center wishlist-form">

                                                    @csrf

                                                    <a class="thm-btn product__all-btn p-2"
                                                        href="{{ route('shop.show', $product->slug) }}">
                                                        Разгледай
                                                    </a>
                                                    @php
                                                        $wishlist = Session::get('wishlist', []);
                                                        $isInWishlist = isset($wishlist[$product->id]);
                                                    @endphp
                                                    <button type="submit" class="wishlist-btn">
                                                        <i
                                                            class="{{ $isInWishlist ? 'fa-solid' : 'fa-regular' }} fa-heart"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!--Product Single End-->
                                @empty
                                    <div class="col-12">
                                        <div class="alert alert-info text-center">
                                            @if ($category)
                                                Няма налични продукти с филтрите, които сте избрали
                                            @else
                                                Все още няма налични продукти.
                                            @endif
                                        </div>
                                    </div>
                                @endforelse

                            </div>
                        </div>

                        {{-- Pagination --}}
                        @if ($products->hasPages())
                            <div class="row mt-4 mb-4">
                                <div class="col-12 d-flex justify-content-start gap-3">
                                    {{ $products->links() }}
                                </div>
                            </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Product End-->

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            toggleSidebar();
            initializTomSelect();
        });

        function toggleSidebar() {
            const shopSidebarToggle = document.getElementById('shopSidebarToggle');
            const shopSidebar = document.querySelector('.product__sidebar');
            const shopSidebarOverlay = document.querySelector('.shop-sidebar-overlay');

            if (!shopSidebarToggle || !shopSidebar || !shopSidebarOverlay) {
                return;
            }

            function closeSidebar() {
                shopSidebar.classList.remove('active');
                shopSidebarOverlay.classList.remove('active');
                document.body.classList.remove('sidebar-open');
            }

            shopSidebarToggle.addEventListener('click', function() {
                shopSidebar.classList.toggle('active');
                shopSidebarOverlay.classList.toggle('active');
                document.body.classList.toggle('sidebar-open');
            });

            shopSidebarOverlay.addEventListener('click', closeSidebar);
        }

        function initializTomSelect() {

            document.querySelectorAll('.select-beast').forEach((select) => {
                new TomSelect(select, {
                    create: false,
                    sortField: {
                        field: 'text',
                        direction: 'asc'
                    },
                    render: {
                        no_results: function(data, escape) {
                            return '<div class="no-results">Няма резултати от търсенето</div>';
                        }
                    }
                });
            });

        }
    </script>

</x-frontend>
