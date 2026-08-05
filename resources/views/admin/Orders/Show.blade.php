<x-backend>

    <section class="content-main">
        <div class="content-header mb-4">
            <div>
                <h2 class="content-title card-title">
                    Детайли на поръчка
                </h2>

                <p>
                    Информация за поръчка №: {{ $order->order_number }}
                </p>
            </div>
        </div>

        <div class="bg-white">
            <header class="card-header">
                <div class="row align-items-center">

                    <div class="col-lg-6 col-md-6 mb-lg-0 mb-3">
                        <span>
                            <i class="fa fa-calendar"></i>

                            <strong>
                                {{ $order->created_at->format('d.m.Y H:i') }}
                            </strong>
                        </span>

                        <br>

                        <small class="text-muted">
                            № Поръчка: {{ $order->order_number }}
                        </small>
                    </div>

                    <div class="col-lg-6 col-md-6 text-md-end">
                        @switch($order->status)
                            @case(\App\Models\Order::STATUS_PENDING)
                                <span class="badge bg-warning text-dark p-2">
                                    Чакаща
                                </span>
                            @break

                            @case(\App\Models\Order::STATUS_PROCESSING)
                                <span class="badge bg-info text-dark p-2">
                                    В обработка
                                </span>
                            @break

                            @case(\App\Models\Order::STATUS_DELIVERED)
                                <span class="badge bg-success p-2">
                                    Доставена
                                </span>
                            @break

                            @case(\App\Models\Order::STATUS_CANCELLED)
                                <span class="badge bg-danger p-2">
                                    Отказана
                                </span>
                            @break

                            @default
                                <span class="badge bg-secondary p-2">
                                    {{ $order->status }}
                                </span>
                        @endswitch
                    </div>

                </div>
            </header>

            <div class="card-body">

                <div class="row mt-3 order-info-wrap">

                    <div class="col-md-4">
                        <article class="d-flex align-items-start gap-3">

                            <span
                                class="rounded-circle bg-primary d-flex align-items-center justify-content-center"
                                style="width: 42px; height: 42px;">

                                <i class="fa fa-user text-white"></i>
                            </span>

                            <div>
                                <h6 class="mb-1">
                                    Клиент
                                </h6>

                                <p class="mb-1">
                                    {{ $order->first_name }} {{ $order->last_name }}
                                    <br>

                                    {{ $order->email }}
                                    <br>

                                    {{ $order->phone }}
                                </p>
                            </div>

                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="d-flex align-items-start gap-3">

                            <span
                                class="rounded-circle bg-primary d-flex align-items-center justify-content-center"
                                style="width: 42px; height: 42px;">

                                <i class="fa fa-truck text-white"></i>
                            </span>

                            <div>
                                <h6 class="mb-1">
                                    Информация за поръчка
                                </h6>

                                <p class="mb-1">
                                    Доставка:

                                    @if ($order->delivery_method === 'office')
                                        До офис на куриер Speedy
                                    @else
                                        До адрес
                                    @endif

                                    <br>

                                    Плащане:

                                    @if ($order->payment_option === 'cash_on_delivery')
                                        При получаване
                                    @else
                                        {{ $order->payment_option }}
                                    @endif

                                    <br>

                                    Статус:

                                    @switch($order->status)
                                        @case(\App\Models\Order::STATUS_PENDING)
                                            Чакаща
                                        @break

                                        @case(\App\Models\Order::STATUS_PROCESSING)
                                            В обработка
                                        @break

                                        @case(\App\Models\Order::STATUS_DELIVERED)
                                            Доставена
                                        @break

                                        @case(\App\Models\Order::STATUS_CANCELLED)
                                            Отказана
                                        @break

                                        @default
                                            {{ $order->status }}
                                    @endswitch
                                </p>
                            </div>

                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="d-flex align-items-start gap-3">

                            <span
                                class="rounded-circle bg-primary d-flex align-items-center justify-content-center"
                                style="width: 42px; height: 42px;">

                                <i class="fa fa-location-dot text-white"></i>
                            </span>

                            <div>
                                <h6 class="mb-1">
                                    Адрес за доставка
                                </h6>

                                <p class="mb-1">

                                    @if ($order->city)
                                        Град: {{ $order->city }}
                                        <br>
                                    @endif

                                    @if ($order->office_list)
                                        Офис: {{ $order->office_list }}
                                    @elseif($order->personal_address)
                                        Адрес: {{ $order->personal_address }}
                                    @else
                                        —
                                    @endif

                                </p>
                            </div>

                        </article>
                    </div>

                </div>

                <hr>

                <div class="row">

                    <div class="col-lg-8">
                        <div class="table-responsive">

                            <table class="table cart-table align-middle">

                                <thead>
                                    <tr>
                                        <th>Продукт</th>
                                        <th>Ед. цена</th>
                                        <th>Отстъпка</th>
                                        <th>К-во</th>
                                        <th class="text-end">Общо</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($order->products as $product)
                                        <tr>

                                            <td>
                                                <div class="d-flex align-items-center gap-3">

                                                    <div class="img-box">
                                                        <img
                                                            src="{{ asset('/assets/images/products/' . $product->product_image) }}"
                                                            alt="{{ $product->product_name }}"
                                                            style="width: 55px; height: 55px; object-fit: cover; border-radius: 8px;">
                                                    </div>

                                                    <div>
                                                        <a
                                                            target="_blank"
                                                            href="{{ route('shop.show', $product->product_slug) }}">

                                                            <strong>
                                                                {{ $product->product_name }}
                                                            </strong>
                                                        </a>

                                                        <br>

                                                        <small class="text-muted">
                                                            ID: #{{ $product->product_id }}
                                                        </small>
                                                    </div>

                                                </div>
                                            </td>

                                            <td>
                                                {{ number_format($product->price, 2) }} EUR
                                            </td>

                                            <td>
                                                @if ($product->discount)
                                                    {{ $product->discount }}%
                                                @else
                                                    Няма
                                                @endif
                                            </td>

                                            <td>
                                                {{ $product->quantity }}
                                            </td>

                                            <td class="text-end">
                                                @if ($product->discount)
                                                    <strong>
                                                        {{ number_format(($product->price - ($product->price * $product->discount) / 100) * $product->quantity, 2) }}
                                                        EUR
                                                    </strong>
                                                @else
                                                    <strong>
                                                        {{ number_format($product->price * $product->quantity, 2) }}
                                                        EUR
                                                    </strong>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>

                        <a
                            href="{{ route('admin.orders.index') }}"
                            class="btn btn-primary mt-3">

                            Назад към поръчките
                        </a>
                    </div>

                    <div class="col-lg-4">

                        <div class="box shadow-sm bg-light p-4 rounded">

                            <h6 class="mb-3">
                                Информация за плащане
                            </h6>

                            <div class="d-flex justify-content-between mb-2">

                                <span>
                                    Сума на продуктите:
                                </span>

                                <strong>
                                    {{ number_format(
                                        $order->products->sum(
                                            fn($product) => ($product->discount
                                                ? $product->price - ($product->price * $product->discount) / 100
                                                : $product->price) * $product->quantity,
                                        ),
                                        2,
                                    ) }}
                                    EUR
                                </strong>

                            </div>

                            @if ($promoCode)
                                <div class="d-flex justify-content-between mb-2">

                                    <span>
                                        Промо код ({{ $promoCode->promo_code_name }}):
                                    </span>

                                    <strong class="text-danger">
                                        -{{ $promoCode->percentage_promo_code }}%
                                    </strong>

                                </div>
                            @endif

                            <hr>

                            <div class="d-flex justify-content-between">

                                <span>
                                    <strong>
                                        Обща сума:
                                    </strong>
                                </span>

                                @if ($promoCode)
                                    <strong class="h5 mb-0 text-success">
                                        {{ number_format(
                                            $order->products->sum(
                                                fn($product) => ($product->discount
                                                    ? $product->price - ($product->price * $product->discount) / 100
                                                    : $product->price) * $product->quantity,
                                            ) *
                                                (1 - $promoCode->percentage_promo_code / 100),
                                            2,
                                        ) }}
                                        EUR
                                    </strong>
                                @else
                                    <strong class="h5 mb-0">
                                        {{ number_format(
                                            $order->products->sum(
                                                fn($product) => ($product->discount
                                                    ? $product->price - ($product->price * $product->discount) / 100
                                                    : $product->price) * $product->quantity,
                                            ),
                                            2,
                                        ) }}
                                        EUR
                                    </strong>
                                @endif

                            </div>

                            <hr>

                            <p class="mb-2">
                                <strong>
                                    Фирмени данни:
                                </strong>
                            </p>

                            @if ($order->request_invoice)
                                <div>
                                    {{ $order->company_name }}
                                </div>

                                <div>
                                    {{ $order->company_mol }}
                                </div>

                                <div>
                                    {{ $order->company_bulstat }}
                                </div>

                                <div>
                                    {{ $order->company_address }}
                                </div>
                            @else
                                <p class="mb-0">
                                    Няма фирмени данни
                                </p>
                            @endif

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>

</x-backend>
