<x-backend>

    <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Продуктови атрибути</h3>
        <a class="btn btn-secondary p-2 rounded-5" href="{{ route('admin.products.index') }}">
            Назад към всички
        </a>
    </div>
    <hr>

    {{-- ================= FLASH MESSAGES ================= --}}
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

            {{-- ================= CREATE ATTRIBUTE TYPE ================= --}}
            <div class="col-md-6">
                <div class="shadow">
                    <div class="card-header bg-dark text-white p-2 mb-1">
                        <strong>Нов тип атрибут</strong>
                        <small class="text-white-50 d-block">
                            Напр. „Цвят на рамката“, „Размер“, „Материал“
                        </small>
                    </div>

                    <div class="card-body p-2">
                        <form action="{{ route('admin.attributes.types.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="type_name" class="form-label">
                                    Име на типа
                                </label>

                                <input
                                    type="text"
                                    id="type_name"
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Цвят на рамката"
                                    value="{{ old('name') }}"
                                    required
                                >

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success rounded-5 px-4">
                                + Добави тип
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- ================= CREATE ATTRIBUTE VALUE ================= --}}
            <div class="col-md-6">
                <div class="shadow">
                    <div class="card-header bg-dark text-white p-2 mb-1">
                        <strong>Нова стойност</strong>
                        <small class="text-white-50 d-block">
                            Напр. „Черен“ под „Цвят на рамката“
                        </small>
                    </div>

                    <div class="card-body p-2">
                        @if ($types->isEmpty())
                            <p class="text-muted mb-0">
                                Първо създай поне един тип атрибут отляво.
                            </p>
                        @else
                            <form action="{{ route('admin.attributes.values.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="attribute_type_id" class="form-label">
                                        Тип атрибут
                                    </label>

                                    <select
                                        id="attribute_type_id"
                                        name="attribute_type_id"
                                        class="form-select @error('attribute_type_id') is-invalid @enderror"
                                        required
                                    >
                                        <option value="">— Избери тип —</option>

                                        @foreach ($types as $type)
                                            <option
                                                value="{{ $type->id }}"
                                                {{ old('attribute_type_id') == $type->id ? 'selected' : '' }}
                                            >
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('attribute_type_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="value" class="form-label">
                                        Стойност
                                    </label>

                                    <input
                                        type="text"
                                        id="value"
                                        name="value"
                                        class="form-control @error('value') is-invalid @enderror"
                                        placeholder="Черен"
                                        value="{{ old('value') }}"
                                        required
                                    >

                                    @error('value')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success rounded-5 px-4">
                                    + Добави стойност
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

        </div>

        <hr class="my-5">

        {{-- ================= LIST OF ALL TYPES + VALUES ================= --}}
        <h4 class="mb-3">Съществуващи атрибути</h4>

        @if ($types->isEmpty())
            <div class="alert alert-info">
                Все още няма създадени атрибути. Започни като добавиш първия тип отгоре.
            </div>
        @else
            <div class="row g-3">
                @foreach ($types as $type)
                    <div class="col-md-6 col-lg-4">
                        <div class="h-100 shadow p-3">

                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-start gap-3">
                                    <div>
                                        <strong class="d-block">
                                            {{ $type->name }}
                                        </strong>

                                        <small class="text-muted">
                                            slug: {{ $type->slug }}
                                        </small>
                                    </div>

                                    <form
                                        action="{{ route('admin.attributes.types.destroy', $type) }}"
                                        method="POST"
                                        onsubmit="return confirm('Сигурен ли си? Това ще изтрие типа и всичките му стойности.');"
                                        class="m-0"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-5">
                                            Изтрий тип
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="card-body">
                                @if ($type->values->isEmpty())
                                    <p class="text-muted mb-0 fst-italic">
                                        Няма добавени стойности.
                                    </p>
                                @else
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach ($type->values as $value)
                                            <span
                                                class="badge bg-light text-dark border d-inline-flex align-items-center gap-2 p-2"
                                            >
                                                <span class="text-start">
                                                    <span class="d-block">
                                                        {{ $value->value }}
                                                    </span>

                                                    <small class="text-muted fw-normal">
                                                        {{ $value->slug }}
                                                    </small>
                                                </span>

                                                <form
                                                    action="{{ route('admin.attributes.values.destroy', $value) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Изтрий тази стойност?');"
                                                    class="m-0"
                                                >
                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="btn-close"
                                                        style="font-size: .6rem;"
                                                        aria-label="Изтрий"
                                                    ></button>
                                                </form>
                                            </span>
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

</x-backend>
