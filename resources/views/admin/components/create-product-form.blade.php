@props(['action'])

<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf

    <div class="row g-3">

        {{-- ================= BASIC INFO ================= --}}
        <div class="col-lg-3">
            <label>Име на продукта</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="col-lg-3">
            <label>SKU</label>
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

        <div class="col-lg-1">
            <label>Наличност</label>
            <input type="number" name="stock" class="form-control" value="{{ old('stock') }}">
        </div>

        <div class="col-lg-1">
            <label>Отстъпка</label>
            <input type="number" name="discount" class="form-control" value="{{ old('discount') }}">
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
                    <label>
                        {{ $type->name }}
                        @if ($type->is_multiple)
                            <small class="text-muted">(множествен избор)</small>
                        @endif
                    </label>

                    @if ($type->is_multiple)
                        {{-- multi-select --}}
                        <select name="attribute_values[]" class="form-control searchable-select" multiple size="4">
                            @foreach ($type->values as $value)
                                <option value="{{ $value->id }}"
                                    {{ in_array($value->id, old('attribute_values', [])) ? 'selected' : '' }}>
                                    {{ $value->value }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        {{-- single-select --}}
                        <select name="attribute_values[]" class="form-control searchable-select">
                            <option value="">— Избери —</option>
                            @foreach ($type->values as $value)
                                <option value="{{ $value->id }}"
                                    {{ in_array($value->id, old('attribute_values', [])) ? 'selected' : '' }}>
                                    {{ $value->value }}
                                </option>
                            @endforeach
                        </select>
                    @endif
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
