<x-backend>

    <div class="d-flex flex-column flex-md-row gap-3 justify-content-between">
        <h3>Редактиране на продукт: <br> {{ $product->name }}</h3>
        <div class="d-flex flex-column flex-md-row gap-3 align-items-start">
            <form action="{{ route('admin.products.toggle-lenses', $product) }}" method="POST" class="toggle">
                @csrf

                @method('PATCH')

                <p class="mb-0">Закупуване на стъкла</p>

                <input type="checkbox" id="can_buy_with_lenses" name="can_buy_with_lenses" value="1"
                    onchange="this.form.submit()" {{ $product->can_buy_with_lenses ? 'checked' : '' }}>

                <label for="can_buy_with_lenses"></label>
            </form>

            <a target="_blank" class="btn btn-info p-2 rounded-5 text-white"
                href="{{ route('shop.show', $product->slug) }}">
                Преглед на продукта
            </a>
            <a class="btn btn-secondary p-2 rounded-5" href="{{ route('admin.products.index') }}">
                Назад към всички
            </a>
            <button type="button" class="btn btn-primary rounded-5 px-4 mb-3" id="openProductVariantSidebar">
                Добави вариант
            </button>
        </div>
    </div>
    <hr>

    {{-- ================= FLASH MESSAGES ================= --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="container">

        @if ($product->variants->isNotEmpty() || $product->variantParent->isNotEmpty())
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">

                    <h5 class="mb-3">
                        Варианти на продукта
                    </h5>

                    <div class="d-flex flex-wrap gap-3">

                        @foreach ($product->variantParent as $parent)
                            <a href="{{ route('admin.products.show', $parent->slug) }}" class="product-variant-card">

                                <img src="/products/{{ $parent->main_image }}" alt="{{ $parent->name }}">

                                <span>Основен</span>
                            </a>
                        @endforeach

                        {{-- Current product --}}
                        <a href="{{ route('admin.products.show', $product->slug) }}"
                            class="product-variant-card active">

                            <img src="/products/{{ $parent->main_image }}" alt="{{ $parent->name }}">

                            <span>
                                @if ($product->variantParent->isEmpty())
                                    Основен
                                @else
                                    {{ $product->name }}
                                @endif
                            </span>
                        </a>

                        @foreach ($product->variants as $variant)
                            <a href="{{ route('admin.products.show', $variant->slug) }}" class="product-variant-card">

                                <img src="{{ asset('assets/images/products/' . $variant->main_image) }}"
                                    alt="{{ $variant->name }}">

                                <span>{{ $variant->name }}</span>
                            </a>
                        @endforeach

                    </div>

                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.product.update', $product) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">

                {{-- ================= BASIC INFO ================= --}}
                <div class="col-lg-3">
                    <label>Име на продукта</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}"
                        required>
                </div>

                <div class="col-lg-3">
                    <label>SKU</label>
                    <input value="{{ $product->sku }}" type="text" name="sku" class="form-control" required>
                </div>

                <div class="col-lg-4">
                    <label>Категория</label>
                    <select name="category_id" class="form-control" required>
                        <option value="">Избери категория</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}"
                                {{ old('category_id', $product->category_id) == $category['id'] ? 'selected' : '' }}>
                                {{ $category['path'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-1">
                    <label>Наличност</label>
                    <input type="text" name="stock" class="form-control"
                        value="{{ old('stock', $product->stock) }}">
                </div>

                <div class="col-lg-1">
                    <label>Отстъпка</label>
                    <input type="number" name="discount" class="form-control"
                        value="{{ old('discount', $product->discount) }}">
                </div>

                <div class="col-lg-12">
                    <label>Описание на продукта</label>
                    <textarea name="description" rows="4" class="form-control">{{ old('description', $product->description) }}</textarea>
                </div>

                {{-- ================= PRICING ================= --}}
                <div class="col-lg-4">
                    <label>Цена</label>
                    <input type="number" step="0.01" name="price" class="form-control"
                        value="{{ old('price', $product->price) }}" required>
                </div>

                {{-- ================= MAIN IMAGE ================= --}}
                <div class="col-lg-4">
                    <label>Главна снимка</label>

                    @if ($product->main_image)
                        <div class="mb-2">
                            <img src="{{ asset('assets/images/products/' . $product->main_image) }}"
                                alt="{{ $product->name }}" style="max-height: 80px; border-radius: 8px;">
                        </div>
                    @endif

                    <input type="file" name="main_image" class="form-control" accept="image/*">
                    <small class="text-muted">Качи нова снимка, за да замениш текущата.</small>
                </div>

                {{-- ================= GALLERY ================= --}}
                <div class="col-lg-4">
                    <label>Галерия (множество снимки)</label>

                    @if (!empty($product->gallery))
                        <div class="mb-2 d-flex flex-wrap gap-2">
                            @foreach ($product->gallery as $galleryImage)
                                <div class="gallery-img-bin">
                                    <img src="/assets/images/product_gallery/{{ $galleryImage }}"
                                        alt="{{ $galleryImage }}">

                                    <a href="/assets/images/product_gallery/{{ $galleryImage }}"
                                        download="{{ $galleryImage }}" class="gallery-image-download">
                                        <i class="fa-solid fa-download"></i>
                                    </a>

                                    <button type="button" class="gallery-img-bin__delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <input type="file" name="gallery[]" class="form-control" accept="image/*" multiple>
                    <small class="text-muted">Качването на нови снимки ще ги добави към съществуващите.</small>
                </div>


                @if ($attributeTypes->isNotEmpty())
                    <div class="col-lg-12">
                        <hr>
                        <h5 class="mb-3">Атрибути на продукта</h5>
                    </div>

                    @foreach ($attributeTypes as $type)
                        <div class="col-lg-4">
                            <label for="attribute-{{ $type->id }}" class="form-label">
                                {{ $type->name }}
                            </label>

                            <select id="attribute-{{ $type->id }}" name="attribute_values[{{ $type->id }}]"
                                class="form-select attribute-choice" data-placeholder="Започни да пишеш...">
                                <option value="">Избери стойност</option>

                                @foreach ($type->values as $value)
                                    <option value="{{ $value->value }}" @selected(old('attribute_values.' . $type->id, $selectedAttributes[$type->id] ?? '') === $value->value)>
                                        {{ $value->value }}
                                    </option>
                                @endforeach
                            </select>

                            @error('attribute_values.' . $type->id)
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    @endforeach
                @endif

                {{-- ================= SUBMIT + DELETE ================= --}}
                <div class="col-lg-12 d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary rounded-5 px-4">
                        Запази промените
                    </button>
                </div>

            </div>
        </form>

        <form method="POST" action="{{ route('admin.products.destroy', $product->slug) }}"
            onsubmit="return confirm('Сигурен ли си, че искаш да изтриеш този продукт?');" class="mt-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger rounded-5 px-4">
                Изтрий продукта
            </button>
        </form>

        <div class="product-variant-overlay"></div>


        <div class="product_variant">

            <div class="product-variant-sidebar__header">
                <h4>Добави вариант</h4>

                <button type="button" class="product-variant-sidebar__close" id="closeProductVariantSidebar">
                    &times;
                </button>
            </div>

            @include('admin.components.create-product-form', [
                'action' => route('admin.product.create', $product),
            ])

        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            openVariantSidebar()
            deleteImage()
        });

        /** Open the variant sidebar */
        function openVariantSidebar() {

            const openButton = document.getElementById('openProductVariantSidebar');
            const closeButton = document.getElementById('closeProductVariantSidebar');
            const sidebar = document.querySelector('.product_variant');
            const overlay = document.querySelector('.product-variant-overlay');

            if (!openButton || !closeButton || !sidebar || !overlay) {
                return;
            }

            function openSidebar() {
                sidebar.classList.add('active');
                overlay.classList.add('active');
                document.body.classList.add('product-variant-sidebar-open');
            }

            function closeSidebar() {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                document.body.classList.remove('product-variant-sidebar-open');
            }

            openButton.addEventListener('click', openSidebar);
            closeButton.addEventListener('click', closeSidebar);
            overlay.addEventListener('click', closeSidebar);
        }

        /** Open the variant sidebar */
        function deleteImage() {

            const deleteButtons = document.querySelectorAll('.gallery-img-bin__delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {

                    $.ajax({

                        url: "{{ route('admin.promocodes.change-status') }}",
                        type: "PATCH",

                        data: {
                            _token: form.find('input[name="_token"]').val(),
                            id: form.find('input[name="id"]').val()
                        },

                        success: function(response) {

                            const row = form.closest('tr');
                            const badge = row.find('.badge');
                            const button = form.find('.change-status-btn');

                            const isActive = Boolean(response.is_active);


                            badge
                                .removeClass('bg-success bg-danger')
                                .addClass(isActive ? 'bg-success' : 'bg-danger')
                                .text(isActive ? 'Активен' : 'Неактивен');

                            button.text(isActive ? 'Деактивирай' : 'Активирай');

                        },

                        error: function(xhr) {
                            alert(xhr.responseJSON.message);
                        }

                    });

                })
            });

        }
    </script>

</x-backend>
