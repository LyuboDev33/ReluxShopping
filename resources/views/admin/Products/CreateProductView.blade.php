<x-backend>

    <div class="d-flex justify-content-between">
        <h3>Създаване на продукт</h3>
        <a class="btn btn-secondary p-2 rounded-5" href="{{ route('admin.products.index') }}">
            Назад към всички
        </a>
    </div>
    <hr>

    @error('create_product')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror

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

    {{-- ================= PRODUCT CREATE FORM ================= --}}
    <div class="container">

        @include('admin.components.create-product-form', [
            'action' => route('admin.product.create'),
        ])
    </div>

</x-backend>
