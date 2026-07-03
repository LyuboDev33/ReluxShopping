<x-backend>
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Стъкла</h3>

        <a class="btn btn-secondary p-2 rounded-5" href="{{ route('admin.products.index') }}">
            Назад към всички
        </a>
    </div>

    <hr>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="container">
        <div class="row g-4">

            {{-- ================= CREATE LANCE INDEX ================= --}}
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <strong>Нов индекс на изтъняване</strong>
                        <small class="text-white-50 d-block">
                            Напр. „1.5 стандартно“, „1.6 изтънено“, „1.67 изтънено“
                        </small>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.lances.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="lance_name" class="form-label">Индекс на изтъняване</label>

                                <input type="text" id="lance_name" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="1.6 (изтънено)" value="{{ old('name') }}" required>

                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="lance_price" class="form-label">Цена</label>

                                <input type="number" id="lance_price" name="price"
                                    class="form-control @error('price') is-invalid @enderror"
                                    placeholder="Напр. 40" value="{{ old('price') }}" min="0" required>

                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success rounded-5 px-4">
                                + Добави индекс
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- ================= CREATE GLASS ================= --}}
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <strong>Нов тип стъкло</strong>
                        <small class="text-white-50 d-block">
                            Напр. „Хелиоматични стъкла“, „Антирефлексни стъкла“
                        </small>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.glasses.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="category_id" class="form-label">Основна категория</label>

                                <select id="category_id" name="category_id"
                                    class="form-select @error('category_id') is-invalid @enderror" required>
                                    <option value="">— Изберете категория —</option>

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="glass_name" class="form-label">Име на стъклото</label>

                                <input type="text" id="glass_name" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Хелиоматични стъкла" value="{{ old('name') }}" required>

                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success rounded-5 px-4">
                                + Добави стъкло
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- ================= CREATE GLASS VALUE BY CATEGORY ================= --}}
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <strong>Нова стойност</strong>
                        <small class="text-white-50 d-block">
                            Добави стойност към стъкло според категорията
                        </small>
                    </div>

                    <div class="card-body">
                        @foreach ($categories as $category)
                            <div class="border rounded-3 p-3 mb-3">
                                <h6 class="mb-3">{{ $category->name }}</h6>

                                @if ($glasses->where('category_id', $category->id)->isEmpty())
                                    <p class="text-muted mb-0">
                                        Няма добавени стъкла за тази категория.
                                    </p>
                                @else
                                    <form action="{{ route('admin.glass-values.store', $category) }}" method="POST">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label">Тип стъкло</label>

                                            <select name="glass_id"
                                                class="form-select @error('glass_id') is-invalid @enderror" required>
                                                <option value="">— Избери тип стъкло —</option>

                                                @foreach ($glasses->where('category_id', $category->id) as $glass)
                                                    <option value="{{ $glass->id }}" @selected(old('glass_id') == $glass->id)>
                                                        {{ $glass->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('glass_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">
                                                Стойност / покритие
                                            </label>

                                            <input type="text" name="value"
                                                class="form-control @error('value') is-invalid @enderror"
                                                placeholder="до 80% потъмняване" value="{{ old('value') }}" required>

                                            @error('value')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Цена</label>

                                            <input type="number" name="price"
                                                class="form-control @error('price') is-invalid @enderror"
                                                placeholder="Напр. 25" value="{{ old('price') }}" min="0" required>

                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-success rounded-5 px-4">
                                            + Добави стойност
                                        </button>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-3">

        {{-- ================= LIST OF ALL GLASSES + VALUES BY CATEGORY ================= --}}
        <h4 class="mb-3">Съществуващи стъкла</h4>

        @foreach ($categories as $category)
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light">
                    <strong>{{ $category->name }}</strong>
                </div>

                <div class="card-body">
                    @if ($glasses->where('category_id', $category->id)->isEmpty())
                        <div class="alert alert-info mb-0">
                            Все още няма създадени стъкла за тази категория.
                        </div>
                    @else
                        <div class="row g-3">
                            @foreach ($glasses->where('category_id', $category->id) as $glass)
                                <div class="col-md-6 col-lg-4">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <strong>{{ $glass->name }}</strong>

                                            <form action="{{ route('admin.glasses.destroy', $glass) }}" method="POST"
                                                onsubmit="return confirm('Сигурен ли си? Това ще изтрие типа стъкло и всичките му стойности.');"
                                                class="m-0">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-5">
                                                    Изтрий тип
                                                </button>
                                            </form>
                                        </div>

                                        <div class="card-body">
                                            @if ($glass->values->isEmpty())
                                                <p class="text-muted mb-0 fst-italic">
                                                    Няма добавени стойности.
                                                </p>
                                            @else
                                                <div class="d-flex flex-column gap-2">
                                                    @foreach ($glass->values as $value)
                                                        <div class="border rounded-3 p-2">
                                                            <form action="{{ route('admin.glass-values.update', $value) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')

                                                                <div class="mb-2">
                                                                    <label class="form-label small mb-1">Стойност</label>

                                                                    <input type="text" name="value"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ old("glass_values.$value->id.value", $value->value) }}"
                                                                        required>
                                                                </div>

                                                                <div class="mb-2">
                                                                    <label class="form-label small mb-1">Цена</label>

                                                                    <input type="number" name="price"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ old("glass_values.$value->id.price", $value->price) }}"
                                                                        min="0" required>
                                                                </div>

                                                                <button type="submit"
                                                                    class="btn btn-sm btn-outline-primary rounded-5">
                                                                    Запази
                                                                </button>
                                                            </form>

                                                            <form action="{{ route('admin.glass-values.destroy', $value) }}"
                                                                method="POST" class="mt-2"
                                                                onsubmit="return confirm('Изтрий тази стойност?');">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit"
                                                                    class="btn btn-sm btn-outline-danger rounded-5">
                                                                    Изтрий
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @endforeach

        <hr class="my-3">

        {{-- ================= LIST OF ALL LANCES ================= --}}
        <h4 class="mb-3">Съществуващи индекси на изтъняване</h4>

        @if ($lances->isEmpty())
            <div class="alert alert-info">
                Все още няма създадени индекси на изтъняване.
            </div>
        @else
            <div class="row g-3">
                @foreach ($lances as $lance)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <form action="{{ route('admin.lances.update', $lance) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-2">
                                        <label class="form-label small mb-1">Индекс на изтъняване</label>

                                        <input type="text" name="name" class="form-control form-control-sm"
                                            value="{{ old("lances.$lance->id.name", $lance->name) }}" required>
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label small mb-1">Цена</label>

                                        <input type="number" name="price" class="form-control form-control-sm"
                                            value="{{ old("lances.$lance->id.price", $lance->price) }}" min="0"
                                            required>
                                    </div>

                                    <button type="submit" class="btn btn-sm btn-outline-primary rounded-5">
                                        Запази
                                    </button>
                                </form>

                                <form action="{{ route('admin.lances.destroy', $lance) }}" method="POST"
                                    onsubmit="return confirm('Сигурен ли си, че искаш да изтриеш този индекс?');"
                                    class="mt-2">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-5">
                                        Изтрий
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-backend>
