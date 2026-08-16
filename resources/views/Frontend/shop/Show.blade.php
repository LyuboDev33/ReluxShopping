<x-frontend>

    @section('SEO')
        <title>{{ $product->name }} | Valente Optics</title>

        <meta name="description" content="{{ strip_tags($product->description) }}">

        <meta name="keywords"
            content="{{ $product->name }}, {{ $product->sku }}, диоптрични рамки, очила, маркови очила, онлайн магазин за очила, Valente Optics">

        <meta name="robots" content="index, follow">

        <link rel="canonical" href="{{ url()->current() }}">

        <meta property="og:type" content="product">
        <meta property="og:site_name" content="Valente Optics">
        <meta property="og:title" content="{{ $product->name }} | Valente Optics">
        <meta property="og:description" content="{{ strip_tags($product->description) }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="{{ url('assets/images/products/' . $product->main_image) }}">
        <meta property="og:image:alt" content="{{ $product->name }}">

        <meta property="product:retailer_item_id" content="{{ $product->sku }}">
        <meta property="product:price:amount" content="{{ number_format($productFinalPrice, 2, '.', '') }}">
        <meta property="product:price:currency" content="EUR">
        <meta property="product:availability" content="{{ (int) $product->stock > 0 ? 'in stock' : 'out of stock' }}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $product->name }} | Valente Optics">
        <meta name="twitter:description" content="{{ strip_tags($product->description) }}">
        <meta name="twitter:image" content="{{ url('assets/images/products/' . $product->main_image) }}">
        <meta name="twitter:image:alt" content="{{ $product->name }}">
    @endsection


    <!-- Start Product Details -->
    <form action="{{ route('product.cart.add', $product) }}" method="POST" class="product-details">
        @csrf

        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-xl-6">
                    <div>

                        <div class="product-details__img">
                            <img data-fancybox="product-gallery"
                                src="/assets/images/products/{{ $product->main_image }}?v=<?= time() ?>"
                                alt="{{ $product->name }}">
                        </div>

                        @if (!empty($product->gallery))
                            <div class="product-gallery mt-3">
                                @foreach ($product->gallery as $image)
                                    <a href="/assets/images/product_gallery/{{ $image }}?v=<?= time() ?>"
                                        class="product-gallery__item" data-fancybox="product-gallery">

                                        <img src="/assets/images/product_gallery/{{ $image }}?v=<?= time() ?>"
                                            alt="{{ $product->name }}">
                                    </a>
                                @endforeach
                            </div>
                        @endif

                        <div class="product-description__text1 mt-3 d-none d-lg-block">
                            {!! $product->description !!}
                        </div>

                    </div>
                </div>

                <div class="col-lg-6 col-xl-6 product-add">

                    <div class="card rounded-5 p-4 shadow product-page-image">

                        <div class="product-details__top">
                            <h3 class="product-details__title">
                                {{ $product->name }}
                                <br>

                                <span>Цена: </span>

                                @if ($product->discount)
                                    <span>
                                        <del class="text-muted">
                                            {{ number_format($product->price, 2) }} €
                                        </del>

                                        <span class="text-danger ms-2">
                                            {{ number_format($productFinalPrice, 2) }} €
                                        </span>

                                        <span class="badge bg-danger ms-2 rounded-pill text-color">
                                            -{{ $product->discount }}%
                                        </span>
                                    </span>
                                @else
                                    <span>
                                        <u>{{ number_format($productFinalPrice, 2) }} €</u>
                                    </span>
                                @endif
                            </h3>
                        </div>

                        @if ($product->attributeValues->count())
                            <div class="product-details__attributes mt-4">

                                <h3 class="product-details__quantity-title">
                                    Характеристики
                                </h3>

                                <ul class="list-unstyled">
                                    @foreach ($product->attributeValues as $attributeValue)
                                        <li>
                                            <p>
                                                <strong>
                                                    {{ $attributeValue->type?->name }}:
                                                </strong>

                                                {{ $attributeValue->value }}
                                            </p>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                        @endif

                        <h3 class="alert alert-info w-fit p-2 rounded-pill mt-3">
                            Каталожен номер: {{ $product->sku }}
                        </h3>

                        <p
                            class="product-details__content-text2 mb-3 rounded-pill alert w-fit {{ (int) $product->stock > 0 ? 'alert-success' : 'alert-danger' }} p-2 d-inline-block">

                            @if ((int) $product->stock > 0)
                                Наличен продукт
                            @else
                                Няма наличност
                            @endif

                        </p>

                        <div class="product-details__buttons">
                            <div class="product-details__buttons-2">

                                <button type="submit" class="thm-btn">
                                    Добави в количката
                                </button>

                            </div>
                        </div>

                        <div class="alert alert-info mt-4 mb-2">
                            <div class="d-flex align-items-start gap-3">

                                <div>
                                    <i class="fa-solid fa-building-columns"></i>
                                </div>

                                <div>
                                    <strong>Плащане по банков път</strong>

                                    <p class="mb-0 mt-1">
                                        Ако желаете да заплатите поръчката си по банков път,
                                        след нейното успешно завършване ще получите имейл с
                                        данните на банковата сметка и необходимите инструкции
                                        за извършване на плащането.
                                    </p>
                                </div>

                            </div>
                        </div>

                        @if ((int) $product->stock > 0)
                            <div class="d-flex mt-3 mb-3 justify-content-center">

                                <div class="product-details__quantity d-flex flex-column">

                                    <h3 class="product-details__quantity-title">
                                        Изберете брой
                                    </h3>

                                    <div class="quantity-box">

                                        <button type="button" class="sub">
                                            <i class="fa fa-minus"></i>
                                        </button>

                                        <input type="number" name="quantity" value="{{ old('quantity', 1) }}"
                                            min="1" max="{{ (int) $product->stock }}">

                                        <button type="button" class="add">
                                            <i class="fa fa-plus"></i>
                                        </button>

                                    </div>

                                    @error('quantity')
                                        <p class="field-error">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                            </div>
                        @endif

                    </div>


                    @if ($product->variants->isNotEmpty() || $product->variantParent->isNotEmpty())
                        <div class="card border-0 rounded-5 mb-4">
                            <div class="card-body rounded-5 shadow">

                                <h3 class="mb-3">
                                    Цветове на продукта
                                </h3>

                                <div class="d-flex flex-wrap gap-3">

                                    @foreach ($product->variantParent as $parent)
                                        <a href="{{ route('shop.show', $parent->slug) }}" class="product-variant-card">

                                            <img src="{{ asset('assets/images/products/' . $parent->main_image) }}"
                                                alt="{{ $parent->name }}">

                                            <span>Основен</span>
                                        </a>
                                    @endforeach

                                    <a href="{{ route('shop.show', $product->slug) }}"
                                        class="product-variant-card active">

                                        <img src="{{ asset('assets/images/products/' . $product->main_image) }}"
                                            alt="{{ $product->name }}">

                                        <span>
                                            @if ($product->variantParent->isEmpty())
                                                Основен
                                            @else
                                                {{ $product->name }}
                                            @endif
                                        </span>
                                    </a>

                                    @foreach ($product->variants as $variant)
                                        <a href="{{ route('shop.show', $variant->slug) }}"
                                            class="product-variant-card">

                                            <img src="{{ asset('assets/images/products/' . $variant->main_image) }}"
                                                alt="{{ $variant->name }}">

                                            <span>
                                                {{ $variant->name }}
                                            </span>
                                        </a>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    @endif

                    @error('stock')
                        <p class="field-error">
                            {{ $message }}
                        </p>
                    @enderror


                </div>

            </div>
        </div>
    </form>
    <!-- End Product Details -->

    <!-- Start Product Description -->
    <section class="product-description d-lg-none">
        <div class="container">

            <h3 class="product-description__title">
                Описание
            </h3>

            <div class="product-description__text1">
                {!! $product->description !!}
            </div>

        </div>
    </section>
    <!-- End Product Description -->

    <hr class="mt-0">

    @include('Frontend.shop.partials.similar-products', $similarProducts)

    <hr>

    @include('Frontend.shop.partials.last-viewed-products')


    @if (session('success'))
        <div class="modal fade cart-feedback-modal" id="cartSuccessModal" tabindex="-1" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content position-relative">

                    <button type="button" class="btn-close cart-feedback-modal__close" data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>

                    <div class="modal-body text-center p-5">

                        <div class="cart-feedback-modal__icon cart-feedback-modal__icon--success">
                            <i class="fas fa-check"></i>
                        </div>

                        <h4>
                            Продуктът е добавен
                        </h4>

                        <p class="mb-0">
                            {{ session('success') }}
                        </p>

                        <div class="cart-feedback-modal__actions">
                            <a href="{{ route('checkout') }}" class="thm-btn">
                                Към поръчка
                            </a>

                            <a href="{{ route('cart') }}" class="thm-btn">
                                Към количката
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif


    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modalElement = document.getElementById('cartSuccessModal');

                if (modalElement) {
                    new bootstrap.Modal(modalElement).show();
                }
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            resetRadioButtons();
            resetIndexRadioBtns();
            changeInputType();
        });


        function resetRadioButtons() {
            const resetButton = document.getElementById('frame-with-glasses-tab-button');

            if (!resetButton) {
                return;
            }

            resetButton.addEventListener('click', function() {
                document.querySelectorAll('input[type="radio"]').forEach(function(radioButton) {
                    radioButton.checked = false;
                });
            });
        }

        function resetIndexRadioBtns() {
            const buttons = document.querySelectorAll('.configurator-option__card');
            const lensOptions = document.querySelectorAll('.glass-value-lens-options input[type="radio"]');

            buttons.forEach(function(button) {
                button.addEventListener('click', function() {
                    lensOptions.forEach(function(option) {
                        option.checked = false;
                    });
                });
            });
        }


        function changeInputType() {
            const purchaseTypeTabs = document.querySelectorAll('.purchase-type-tab');
            const purchaseTypeInput = document.getElementById('purchase_type');

            if (!purchaseTypeTabs.length || !purchaseTypeInput) {
                return;
            }

            purchaseTypeTabs.forEach(function(tab) {
                tab.addEventListener('click', function() {
                    purchaseTypeInput.value = this.dataset.purchaseType;
                });
            });
        }
    </script>

</x-frontend>
