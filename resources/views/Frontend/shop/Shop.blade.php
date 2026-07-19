<x-frontend>

    @section('SEO')
        <title>
            {{ $category ? $category->name . ' — Магазин' : 'Магазин' }} | Valente Optic
        </title>
        <meta name="description"
            content="Разгледайте нашата колекция от диоптрични рамки, слънчеви очила и стъкла във Valente Optic.">
    @endsection


    <!--Product Start-->
    <section class="product fe-section">
        <div class="container">
            <div class="row">

                <div class="col-xl-3 col-lg-12">

                    <button class="shop-sidebar-toggle d-xl-none" id="shopSidebarToggle">
                        <i class="fa-solid fa-bars"></i>
                        Категории
                    </button>

                    <div class="shop-sidebar-overlay"></div>

                    <div class="product__sidebar">

                        <div class="shop-category product__sidebar-single">
                            <h3 class="product__sidebar-title">Категории</h3>

                            <ul class="list-unstyled shop-category__tree">

                                <li class="{{ !$category ? 'active' : '' }}">
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

                                <nav class="shop-breadcrumb rounded-pill bg-dark w-fit p-3 mb-3 mt-3" aria-label="Навигация">
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

                                <div class="product__showing-result">
                                    <div class="product__showing-text-box">
                                        <p class="product__showing-text">
                                            Показване на
                                            {{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }}
                                            от {{ $products->total() }} продукта
                                        </p>
                                    </div>
                                </div>

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
                                                В категория „{{ $category->name }}" все още няма продукти.
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
                            <div class="row mt-4">
                                <div class="col-12 d-flex justify-content-center">
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
    </script>

</x-frontend>
