<x-backend>

    @section('title', 'Категории')

    <div class="d-flex justify-content-between align-items-center">
        <h3>Всички категории</h3>
    </div>

    <hr>

    {{-- Success flash --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    {{-- =========================
        CREATE CATEGORY FORM
    ========================== --}}
    <div class="category-create">
        <h5 class="category-create__title">Създай нова категория</h5>

        <form action="{{ route('category.create') }}" method="POST" class="category-create__form">
            @csrf

            <div class="row g-3">

                {{-- Name --}}
                <div class="col-md-6">
                    <label for="categoryName" class="form-label">
                        Име на категорията <span class="text-danger">*</span>
                    </label>

                    <input type="text" name="name" id="categoryName"
                        class="form-control w-100 @error('name') is-invalid @enderror" placeholder="Напр. Слънчеви очила"
                        value="{{ old('name') }}" required />

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Parent category (optional) --}}
                <div class="col-md-6">
                    <label for="categoryParent" class="form-label">
                        Родителска категория
                        <small class="text-muted">(по избор)</small>
                    </label>

                    <select name="category_parent_id" id="categoryParent"
                        class="form-select @error('category_parent_id') is-invalid @enderror">
                        <option value="">— Няма (главна категория) —</option>

                        {{-- FLAT SELECT STILL USED FOR ASSIGNMENT --}}
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_parent_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('category_parent_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Submit --}}
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Добави категория
                    </button>
                </div>

            </div>
        </form>
    </div>


    <hr class="mt-4">


    <div class="category-tree-wrapper">

        <h5 class="mb-3">Структура на категориите</h5>

        <ul class="category-tree">
            @foreach ($categoriesTree as $category)
                <li class="custom-items">
                    <div class="category-node">
                        <strong>{{ $category['name'] }}</strong>
                    </div>

                    @if (!empty($category['children']))
                        <ul>
                            @foreach ($category['children'] as $child)
                                @include('admin.Categories.tree', ['category' => $child])
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>

    </div>

</x-backend>
