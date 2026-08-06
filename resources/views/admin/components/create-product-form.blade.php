@props(['action'])

<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf

    <div class="row g-3">

        {{-- ================= BASIC INFO ================= --}}
        <div class="col-lg-3">
            <label>Име на продукта</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="col-lg-2">
            <label>Каталожен номер</label>
            <input type="text" name="sku" class="form-control" required>
        </div>


        <div class="col-lg-4">
            <label>Категория</label>
            <select name="category_id" class="form-control" required>
                <option value="">Избери категория</option>
                @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}" {{ old('category_id') == $category['id'] ? 'selected' : '' }}>
                        {{ $category['path'] }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-lg-2">
            <label>Наличност</label>
            <input type="number" name="stock" class="form-control" value="{{ old('stock') }}">
        </div>

        <div class="col-lg-1">
            <label>Отстъпка</label>
            <input type="number" name="discount" class="form-control" value="{{ old('discount') }}">
        </div>

        <div class="col-lg-6">
            <label>Видео линк</label>
            <input type="text" name="video_link" class="form-control" value="{{ old('discount') }}">
        </div>

        <div class="col-lg-12">
            <label>Описание на продукта</label>
            <textarea name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
        </div>

        {{-- ================= PRICING ================= --}}
        <div class="col-lg-4">
            <label>Цена </label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', 0) }}"
                required>
        </div>

        {{-- ================= IMAGES ================= --}}
        <div class="col-lg-4">
            <label>Главна снимка</label>
            <input type="file" name="main_image" class="form-control" accept="image/*">
        </div>

        <div class="col-lg-4">
            <label>Галерия (множество снимки)</label>
            <input type="file" name="gallery[]" class="form-control" accept="image/*" multiple>
        </div>

        {{-- ================= DYNAMIC ATTRIBUTES ================= --}}
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
                            <option value="{{ $value->value }}" @selected(old("attribute_values.$type->id") === $value->value)>
                                {{ $value->value }}
                            </option>
                        @endforeach
                    </select>

                    @error("attribute_values.$type->id")
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            @endforeach
        @endif

        <div class="col-lg-12">
            <button type="submit" class="btn btn-primary rounded-5 px-4">
                Създай продукт
            </button>
        </div>

    </div>

</form>
