<x-backend>

    <div class="d-flex gap-2">
        <h3 class="col-lg-3">Всички промо кодове</h3>
    </div>
    <hr>

    @if (session('successCreatePromocode'))
        <div class="alert alert-success">
            {{ session('successCreatePromocode') }}
        </div>
    @endif

    @if (session('successDeletePomocode'))
        <div class="alert alert-success">
            {{ session('successDeletePomocode') }}
        </div>
    @endif

    @if (session('noSuchPromocode'))
        <div class="alert alert-danger">
            {{ session('noSuchPromocode') }}
        </div>
    @endif

    <form class="row g-3 align-items-end" action="{{ route('admin.promocodes.create') }}" method="POST">
        @csrf

        <div class="col-lg-4">
            <label class="form-label">Име на промо код</label>
            <input class="form-control rounded-5" type="text" name="promocode_name"
                value="{{ old('promocode_name') }}" placeholder="Например: SUMMER20">

            @error('promocode_name')
                <p class="text-danger mt-1 mb-0">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-lg-3">
            <label class="form-label">Отстъпка (%)</label>
            <input class="form-control rounded-5" type="number" name="percentage_promo_code"
                value="{{ old('percentage_promo_code') }}" min="1" max="99" placeholder="Например: 20">

            @error('percentage_promo_code')
                <p class="text-danger mt-1 mb-0">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-lg-3">
            <button class="btn btn-primary rounded-pill px-4" type="submit">
                Създай промо код
            </button>
        </div>
    </form>

    <hr>

    <section class="mt-4">
        <div class="container">
            <div class="table-responsive">
                <table class="table cart-table">
                    <thead>
                        <tr>
                            <th>Промо код</th>
                            <th>Отстъпка</th>
                            <th>Статус</th>
                            <th>Дата на създаване</th>
                            <th>Действие</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($promocodes as $promocode)
                            <tr>
                                <td>
                                    <strong>{{ $promocode->promo_code_name }}</strong>
                                </td>

                                <td>
                                    <strong>{{ $promocode->percentage_promo_code }}%</strong>
                                </td>

                                <td>
                                    @if ($promocode->is_active)
                                        <span class="badge bg-success">Активен</span>
                                    @else
                                        <span class="badge bg-danger">Неактивен</span>
                                    @endif
                                </td>

                                <td>
                                    {{ $promocode->created_at->format('d.m.Y') }}
                                </td>

                                <td>
                                    <div class="product__all-btn-box d-flex gap-2 flex-column pe-3 ps-3">
                                        <form class="m-0 change-promocode-status-form">
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $promocode->id }}">

                                            <button type="submit"
                                                class="thm-btn product__all-btn p-2 w-100 change-status-btn">
                                                @if ($promocode->is_active)
                                                    Деактивирай
                                                @else
                                                    Активирай
                                                @endif
                                            </button>
                                        </form>

                                        <form action="{{ route('admin.promocodes.delete') }}" method="POST"
                                            onsubmit="return confirm('Сигурен ли си, че искаш да изтриеш този промо код?');"
                                            class="m-0">
                                            @csrf
                                            @method('DELETE')

                                            <input type="hidden" name="promocodeID" value="{{ $promocode->id }}">

                                            <button type="submit"
                                                class="btn btn-danger text-white btn-outline-danger rounded-5 p-2 w-100">
                                                Изтрий
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    Няма намерени промо кодове.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script>
        $(document).on('submit', '.change-promocode-status-form', function(e) {

            e.preventDefault();

            const form = $(this);

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

        });
    </script>

</x-backend>
