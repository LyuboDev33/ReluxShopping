<x-backend>
<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

    <h3 class="mb-0">Всички продукти админ табло</h3>

    <div class="product-search-bar d-flex gap-2">

        <div class="position-relative">
            <i class="fa-solid fa-magnifying-glass product-search-icon"></i>
            <input
                type="text"
                class="form-control product-search-input"
                placeholder="Търси по име">
        </div>

        <div class="position-relative">
            <i class="fa-solid fa-barcode product-search-icon"></i>
            <input
                type="text"
                class="form-control product-search-input"
                placeholder="Търси по каталожен номер">
        </div>

    </div>

    <a class="btn btn-secondary rounded-pill px-4" href="{{ route('admin.products.create') }}">
        <i class="fa-solid fa-plus me-2"></i>
        Създай продукт
    </a>

</div>
    <hr>

    {{-- Flash messages --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!--Product Start-->
    <section class="product">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="product__items">

                        {{-- Results header --}}
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="product__showing-result">
                                    <div class="product__showing-text-box">
                                        <p class="product__showing-text">
                                            Показване на
                                            {{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }}
                                            от {{ $products->total() }} общо
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- Products grid --}}
                        <div class="product__all">
                            <div class="row">

                                @forelse ($products as $product)
                                    <!--Product All Single Start-->
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="product__all-single">
                                            <div class="product__all-img">
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
                                            </div>
                                            <div class="product__all-content">


                                                <h4 class="product__all-title">
                                                    <a href="{{ route('admin.products.show', $product->slug) }}">
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
                                                {{-- Categories --}}
                                                @if ($product->categories->isNotEmpty())
                                                    <p class="small text-muted mb-1">
                                                        {{ $product->categories->pluck('name')->join(', ') }}
                                                    </p>
                                                @endif



                                                <div class="product__all-btn-box d-flex gap-2 flex-column pe-3 ps-3">
                                                    <a class="thm-btn product__all-btn p-2"
                                                        href="{{ route('admin.products.show', $product->slug) }}">
                                                        Редактирай
                                                    </a>

                                                    <form action="{{ route('admin.products.destroy', $product) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Сигурен ли си, че искаш да изтриеш този продукт?');"
                                                        class="m-0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger text-white btn-outline-danger btn-sm rounded-5 p-2 w-100">
                                                            Изтрий
                                                        </button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--Product All Single End-->
                                @empty
                                    <div class="col-12">
                                        <div class="alert alert-info">
                                            Все още няма създадени продукти.
                                            <a href="{{ route('admin.products.create') }}">Създай първия</a>.
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

</x-backend>
