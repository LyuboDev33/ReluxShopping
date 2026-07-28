<x-frontend>

    @section('SEO')
        <title>{{ $product->name }} | Valente Optic</title>

        <meta name="description" content="{{ strip_tags($product->description) }}">

        <meta name="keywords"
            content="{{ $product->name }}, {{ $product->sku }}, диоптрични рамки, очила, маркови очила, онлайн магазин за очила, Valente Optic">

        <meta name="robots" content="index, follow">

        <link rel="canonical" href="{{ url()->current() }}">

        <meta property="og:type" content="product">
        <meta property="og:site_name" content="Valente Optic">
        <meta property="og:title" content="{{ $product->name }} | Valente Optic">
        <meta property="og:description" content="{{ strip_tags($product->description) }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="{{ url('assets/images/products/' . $product->main_image) }}">
        <meta property="og:image:alt" content="{{ $product->name }}">

        <meta property="product:retailer_item_id" content="{{ $product->sku }}">
        <meta property="product:price:amount" content="{{ number_format($productFinalPrice, 2, '.', '') }}">
        <meta property="product:price:currency" content="EUR">
        <meta property="product:availability" content="{{ (int) $product->stock > 0 ? 'in stock' : 'out of stock' }}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $product->name }} | Valente Optic">
        <meta name="twitter:description" content="{{ strip_tags($product->description) }}">
        <meta name="twitter:image" content="{{ url('assets/images/products/' . $product->main_image) }}">
        <meta name="twitter:image:alt" content="{{ $product->name }}">
    @endsection


    <!--Start Product Details-->
    <form action="{{ route('product.cart.add', $product) }}" method="POST" enctype="multipart/form-data"
        class="product-details">
        @csrf

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6">
                    <div class="product-page-image">
                        <div class="product-details__img">
                            <img data-fancybox="product-gallery"
                                src="/assets/images/products/{{ $product->main_image }}?v=<?= time() ?>"
                                alt="{{ $product->name }}" />
                        </div>

                        <div class="product-gallery mt-3">
                            @foreach ($product->gallery as $image)
                                <a href="/assets/images/product_gallery/{{ $image }}?v=<?= time() ?>"
                                    class="product-gallery__item" data-fancybox="product-gallery">

                                    <img src="/assets/images/product_gallery/{{ $image }}?v=<?= time() ?>"
                                        alt="{{ $product->name }}">
                                </a>
                            @endforeach
                        </div>

                        <div class="product-description__text1 mt-3 d-none d-lg-block">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-6">
                    <div class="product-details__top">
                        <h3 class="product-details__title">
                            {{ $product->name }}

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
                                    {{ number_format($productFinalPrice, 2) }} €
                                </span>
                            @endif
                        </h3>
                    </div>

                    @if ($product->attributeValues->count())
                        <div class="product-details__attributes mt-4">
                            <h3 class="product-details__quantity-title">Характеристики</h3>

                            <ul class="list-unstyled">
                                @foreach ($product->attributeValues as $attributeValue)
                                    <li>
                                        <p>
                                            <strong>{{ $attributeValue->type?->name }}:</strong>
                                            {{ $attributeValue->value }}
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h6 class="alert alert-info w-fit p-2 rounded-pill mt-3">
                        Каталожен номер: {{ $product->sku }}
                    </h6>

                          <p
                        class="product-details__content-text2 mb-3 rounded-pill alert w-fit {{ (int) $product->stock > 0 ? 'alert-success' : 'alert-danger' }} p-2 d-inline-block">
                        @if ((int) $product->stock > 0)
                            Наличен продукт
                        @else
                            Няма наличност
                        @endif
                    </p>

                    <hr>

                    @if ($product->variants->isNotEmpty() || $product->variantParent->isNotEmpty())
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body">
                                <h5 class="mb-3">Цветове на продукта</h5>

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

                                            <span>{{ $variant->name }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif



                    @error('stock')
                        <p class="field-error">{{ $message }}</p>
                    @enderror

                    @if ((int) $product->stock > 0)

                        <div class="card border-0 shadow-sm mt-4 mb-4">
                            <div class="card-body">
                                <h5 class="mb-3">Изберете начин на покупка</h5>

                                <input type="hidden" name="purchase_type" id="purchase_type"
                                    value="{{ old('purchase_type', 'frame_only') }}">

                                <ul class="nav nav-tabs mb-3 gap-3" id="purchaseTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button
                                            class="nav-link {{ old('purchase_type', 'frame_only') === 'frame_only' && !$errors->has('prescription') ? 'active' : '' }} purchase-type-tab"
                                            id="frame-only-tab-button" data-bs-toggle="tab"
                                            data-bs-target="#frame-only-tab" type="button" role="tab"
                                            data-purchase-type="frame_only">
                                            Купете само рамката
                                        </button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button
                                            class="nav-link {{ old('purchase_type') === 'frame_with_glasses' || $errors->has('prescription') ? 'active' : '' }} purchase-type-tab"
                                            id="frame-with-glasses-tab-button" data-bs-toggle="tab"
                                            data-bs-target="#frame-with-glasses-tab" type="button" role="tab"
                                            data-purchase-type="frame_with_glasses">
                                            Купете рамката заедно със стъкла
                                        </button>
                                    </li>
                                </ul>

                                <div class="tab-content" id="purchaseTabsContent">
                                    <div class="tab-pane fade {{ old('purchase_type', 'frame_only') === 'frame_only' ? 'show active' : '' }}"
                                        id="frame-only-tab" role="tabpanel" aria-labelledby="frame-only-tab-button">


                                    </div>

                                    @if ($product->can_buy_with_lenses === 1)
                                        <div class="tab-pane fade {{ old('purchase_type') === 'frame_with_glasses' || $errors->has('prescription') ? 'show active' : '' }}"
                                            id="frame-with-glasses-tab" role="tabpanel"
                                            aria-labelledby="frame-with-glasses-tab-button">

                                            {{-- Check if a product is type "Sunglasses" or not --}}
                                            {{-- If the product is not sunglasses, then show this section, else return an error message --}}
                                            @if (!$isProductSunglasses)

                                                <div class="prescription-box mt-4 mb-4">
                                                    <p class="prescription-box__notice">
                                                        За да добавите този продукт в количката е нужно да предоставите
                                                        снимка с рецепта
                                                        за диоптър или въведете ръчно данните ако ги знаете.
                                                    </p>

                                                    @error('prescription')
                                                        <p class="field-error">{{ $message }}</p>
                                                    @enderror

                                                    <ul class="nav nav-tabs prescription-tabs" id="prescriptionTabs"
                                                        role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active"
                                                                id="upload-prescription-tab" data-bs-toggle="tab"
                                                                data-bs-target="#upload-prescription" type="button"
                                                                role="tab">
                                                                Качи рецепта
                                                            </button>
                                                        </li>

                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="manual-prescription-tab"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#manual-prescription" type="button"
                                                                role="tab">
                                                                Избери ръчно
                                                            </button>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content" id="prescriptionTabsContent">
                                                        <div class="tab-pane fade show active"
                                                            id="upload-prescription" role="tabpanel"
                                                            aria-labelledby="upload-prescription-tab">

                                                            <div class="prescription-upload">
                                                                <label for="prescription_image"
                                                                    class="form-label fw-bold">
                                                                    Прикачете рецепта
                                                                </label>

                                                                <input type="file" id="prescription_image"
                                                                    name="prescription_image"
                                                                    class="form-control @error('prescription_image') is-invalid @enderror"
                                                                    accept="image/*,.pdf">

                                                                @error('prescription_image')
                                                                    <p class="field-error">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane fade" id="manual-prescription"
                                                            role="tabpanel" aria-labelledby="manual-prescription-tab">

                                                            <table class="prescription-table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Око</th>
                                                                        <th>Сфера (SPH)</th>
                                                                        <th>Цилиндър (CYL)</th>
                                                                        <th>Градус (AXIS)</th>
                                                                        <th>PD</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    <tr>
                                                                        <td data-label="Око">
                                                                            <strong>Дясно (OD)</strong>
                                                                        </td>

                                                                        <td data-label="Сфера (SPH)">
                                                                            <select name="right_eye[sph]"
                                                                                class="form-select">
                                                                                <option value="">Изберете
                                                                                </option>
                                                                                @foreach ($sphValues as $value)
                                                                                    <option
                                                                                        value="{{ $value }}">
                                                                                        {{ $value }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>

                                                                        </td>

                                                                        <td data-label="Цилиндър (CYL)">
                                                                            <select name="right_eye[cyl]"
                                                                                class="form-select">
                                                                                <option value="">Изберете
                                                                                </option>
                                                                                @foreach ($cylValues as $value)
                                                                                    <option
                                                                                        value="{{ $value }}">
                                                                                        {{ $value }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>

                                                                        <td data-label="Градус (AXIS)">
                                                                            <select name="right_eye[axis]"
                                                                                class="form-select">
                                                                                <option value="">Изберете
                                                                                </option>
                                                                                @foreach ($axisValues as $value)
                                                                                    <option
                                                                                        value="{{ $value }}">
                                                                                        {{ $value }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>

                                                                        <td rowspan="2" data-label="PD">
                                                                            <select name="pd"
                                                                                class="form-select">
                                                                                <option value="">Изберете
                                                                                </option>

                                                                                @foreach ($pdValues as $value)
                                                                                    <option
                                                                                        value="{{ $value }}"
                                                                                        {{ old('pd') == $value ? 'selected' : '' }}>
                                                                                        {{ $value }} mm
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>



                                                                    </tr>

                                                                    <tr>
                                                                        <td data-label="Око">
                                                                            <strong>Ляво (OS)</strong>
                                                                        </td>

                                                                        <td data-label="Сфера (SPH)">
                                                                            <select name="left_eye[sph]"
                                                                                class="form-select">
                                                                                <option value="">Изберете
                                                                                </option>
                                                                                @foreach ($sphValues as $value)
                                                                                    <option
                                                                                        value="{{ $value }}">
                                                                                        {{ $value }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>

                                                                        <td data-label="Цилиндър (CYL)">
                                                                            <select name="left_eye[cyl]"
                                                                                class="form-select">
                                                                                <option value="">Изберете
                                                                                </option>
                                                                                @foreach ($cylValues as $value)
                                                                                    <option
                                                                                        value="{{ $value }}">
                                                                                        {{ $value }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>

                                                                        <td data-label="Градус (AXIS)">
                                                                            <select name="left_eye[axis]"
                                                                                class="form-select">
                                                                                <option value="">Изберете
                                                                                </option>
                                                                                @foreach ($axisValues as $value)
                                                                                    <option
                                                                                        value="{{ $value }}">
                                                                                        {{ $value }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>



                                                                    </tr>


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-column gap-2 pb-3 mt-0">
                                                    <h6 class="text-center alert alert-info rounded-pill p-2 mb-2">
                                                        Моля изберете дали очилата са за близо или за далечно виждане
                                                    </h6>

                                                    <div class="nav nav-pills d-flex gap-2" id="vision-type-tabs"
                                                        role="tablist">
                                                        @foreach ($visionTypes as $visionType)
                                                            <button type="button"
                                                                class="thm-btn p-2 w-45 showVisionBtns"
                                                                id="vision-type-tab-{{ $visionType->id }}"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#vision-type-pane-{{ $visionType->id }}"
                                                                role="tab"
                                                                aria-controls="vision-type-pane-{{ $visionType->id }}"
                                                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                                                {{ $visionType->name }}
                                                            </button>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div class="configurator-section mb-4">
                                                    <div class="configurator-section__header">
                                                        {{-- <span class="configurator-step">2</span> --}}

                                                        <div>
                                                            <h3 class="mb-1">Изберете стъкла</h3>

                                                            <p class="mb-0 text-muted">
                                                                Изберете тип зрение, стъкло, покритие и индекс на
                                                                изтъняване.
                                                            </p>
                                                        </div>
                                                    </div>

                                                    @error('glass_value_id')
                                                        <p class="field-error">{{ $message }}</p>
                                                    @enderror

                                                    @error('glass_value_lens_index_id')
                                                        <p class="field-error">{{ $message }}</p>
                                                    @enderror

                                                    <div class="tab-content" id="vision-type-tabs-content">
                                                        @foreach ($visionTypes as $visionType)
                                                            <div class="tab-pane"
                                                                id="vision-type-pane-{{ $visionType->id }}"
                                                                role="tabpanel"
                                                                aria-labelledby="vision-type-tab-{{ $visionType->id }}"
                                                                tabindex="0">
                                                                <div class="glass-configurator-group vision-glasses-group"
                                                                    data-vision-type-id="{{ $visionType->id }}">
                                                                    <h3 class="glass-configurator-group__title">
                                                                        {{ $visionType->name }}
                                                                    </h3>

                                                                    @foreach ($glasses->where('vision_type_id', $visionType->id) as $glass)
                                                                        <details class="glass-type-configurator mb-4">
                                                                            <summary>
                                                                                <h6 class="mb-0 d-inline-block">
                                                                                    {{ $glass->name }}
                                                                                </h6>
                                                                            </summary>

                                                                            @if ($glass->values->isEmpty())
                                                                                <p class="text-muted mb-3">
                                                                                    Няма добавени стойности към това
                                                                                    стъкло.
                                                                                </p>
                                                                            @else
                                                                                <div class="faq-page__single">
                                                                                    <div class="accrodion-grp faq-one-accrodion d-flex flex-column gap-2"
                                                                                        data-grp-name="glass-value-accordion-{{ $visionType->id }}-{{ $glass->id }}">
                                                                                        @foreach ($glass->values as $value)
                                                                                            <div class="accrodion {{ old('glass_value_id') == $value->id ? 'active' : '' }}"
                                                                                                data-glass-value-id="{{ $value->id }}">
                                                                                                {{-- Accordion title / glass value --}}
                                                                                                <div
                                                                                                    class="accrodion-title">
                                                                                                    <label
                                                                                                        class="configurator-option mb-0">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="glass_value_id"
                                                                                                            value="{{ $value->id }}"
                                                                                                            class="configurator-option__input glass-option frame-with-glasses-field"
                                                                                                            data-price="{{ $value->price }}"
                                                                                                            data-glass-value-id="{{ $value->id }}"
                                                                                                            {{ old('glass_value_id') == $value->id ? 'checked' : '' }}>

                                                                                                        <span
                                                                                                            class="configurator-option__card shadow">
                                                                                                            <span
                                                                                                                class="configurator-option__check"></span>

                                                                                                            <span
                                                                                                                class="configurator-option__content">
                                                                                                                <strong
                                                                                                                    class="configurator-option__title">
                                                                                                                    {{ $value->value }}
                                                                                                                </strong>
                                                                                                            </span>

                                                                                                            {{-- <span
                                                                                                            class="configurator-option__price">
                                                                                                            +
                                                                                                            {{ number_format($value->price, 2) }}
                                                                                                            €дасдса
                                                                                                        </span> --}}
                                                                                                        </span>
                                                                                                    </label>
                                                                                                </div>

                                                                                                {{-- Accordion content / indexes --}}
                                                                                                <div
                                                                                                    class="accrodion-content">
                                                                                                    <div
                                                                                                        class="inner">
                                                                                                        <div
                                                                                                            class="glass-value-lens-options">
                                                                                                            <h6
                                                                                                                class="mb-3 mt-3">
                                                                                                                Изберете
                                                                                                                индекс
                                                                                                                на
                                                                                                                изтъняване
                                                                                                            </h6>

                                                                                                            @if ($value->lensIndexes->isEmpty())
                                                                                                                <div
                                                                                                                    class="alert alert-light border mb-0">
                                                                                                                    Няма
                                                                                                                    добавени
                                                                                                                    индекси
                                                                                                                    към
                                                                                                                    тази
                                                                                                                    стойност.
                                                                                                                </div>
                                                                                                            @else
                                                                                                                <div
                                                                                                                    class="row g-3">
                                                                                                                    @foreach ($value->lensIndexes as $lensIndex)
                                                                                                                        <div
                                                                                                                            class="col-lg-6 col-xl-6">
                                                                                                                            <label
                                                                                                                                class="configurator-option mb-0">
                                                                                                                                <input
                                                                                                                                    type="radio"
                                                                                                                                    name="glass_value_lens_index_id"
                                                                                                                                    value="{{ $lensIndex->id }}"
                                                                                                                                    class="configurator-option__input glass-value-lens-index-option frame-with-glasses-field"
                                                                                                                                    data-price="{{ $lensIndex->price }}"
                                                                                                                                    data-glass-value-id="{{ $value->id }}"
                                                                                                                                    {{ old('glass_value_lens_index_id') == $lensIndex->id ? 'checked' : '' }}>

                                                                                                                                <span
                                                                                                                                    class="configurator-option__card shadow-sm">
                                                                                                                                    <span
                                                                                                                                        class="configurator-option__check"></span>

                                                                                                                                    <span
                                                                                                                                        class="configurator-option__content">
                                                                                                                                        <strong
                                                                                                                                            class="configurator-option__title">
                                                                                                                                            {{ $lensIndex->name }}
                                                                                                                                        </strong>
                                                                                                                                    </span>

                                                                                                                                    <span
                                                                                                                                        class="configurator-option__price">
                                                                                                                                        +
                                                                                                                                        {{ number_format($lensIndex->price, 2) }}
                                                                                                                                        €
                                                                                                                                    </span>
                                                                                                                                </span>
                                                                                                                            </label>
                                                                                                                        </div>
                                                                                                                    @endforeach
                                                                                                                </div>
                                                                                                            @endif
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                        </details>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @else
                                                <div class="alert alert-danger p-3 rounded-4">
                                                   Диоптрични стъкла могат да бъдат поставени на този продукт само след консултация с оптик.
                                                   Моля потърсете ни в секция <a class="thm-btn p-2 pe-2" href="{{ route('contact') }}">
                                                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                                                    Контакти</a>
                                                </div>
                                            @endif
                                            {{-- End of Check if a product is type "Sunglasses" or not --}}


                                        </div>
                                    @else
                                        <div class="tab-pane fade {{ old('purchase_type') === 'frame_with_glasses' ? 'show active' : '' }}"
                                            id="frame-with-glasses-tab" role="tabpanel"
                                            aria-labelledby="frame-with-glasses-tab-button">
                                            <div class="alert alert-danger p-2 rounded-pill text-center">
                                                Няма подходящи стъкла за тези очила
                                            </div>
                                        </div>


                                    @endif

                                </div>
                            </div>
                        </div>



                        <div class="d-flex mt-3 mb-3 justify-content-center">
                            <div class="product-details__quantity d-flex flex-column">
                                <h3 class="product-details__quantity-title">Изберете брой</h3>

                                <div class="quantity-box">
                                    <button type="button" class="sub">
                                        <i class="fa fa-minus"></i>
                                    </button>

                                    <input type="number" name="quantity" value="{{ old('quantity', 1) }}"
                                        min="1" max="{{ (int) $product->stock }}" />

                                    <button type="button" class="add">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>

                                @error('quantity')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="product-details__buttons">
                                <div class="product-details__buttons-2">
                                    <button type="submit" class="thm-btn">
                                        Добави в количката
                                    </button>
                                </div>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </form>
    <!--End Product Details-->

    <!--Start Product Description-->
    <section class="product-description d-lg-none">
        <div class="container">
            <h3 class="product-description__title">Описание</h3>

            <div class="product-description__text1">
                {!! $product->description !!}
            </div>
        </div>
    </section>
    <!--End Product Description-->

    <hr class="mt-0">

    @include('Frontend.shop.partials.similar-products', $similarProducts)

    <hr>

    @include('Frontend.shop.partials.last-viewed-products')

    @if (session('success'))
        <div class="modal fade cart-feedback-modal" id="cartSuccessModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content position-relative">
                    <button type="button" class="btn-close cart-feedback-modal__close" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                    <div class="modal-body text-center p-5">
                        <div class="cart-feedback-modal__icon cart-feedback-modal__icon--success">
                            <i class="fas fa-check"></i>
                        </div>

                        <h4>Продуктът е добавен</h4>

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

    <script src="/assets/js/products/show.js"></script>

    <script>
        @if (session('success'))
            new bootstrap.Modal(document.getElementById('cartSuccessModal')).show();
        @endif

        @if ($errors->any())
            new bootstrap.Modal(document.getElementById('cartErrorModal')).show();
        @endif
    </script>

</x-frontend>
