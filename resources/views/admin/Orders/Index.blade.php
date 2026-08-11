<x-backend>

    <div class="d-flex gap-2">
        <h3 class="col-lg-3">Всички поръчки</h3>
    </div>
    <hr>

    <form class="d-flex gap-3" action="">

        <p>Потърсете поръчка по номер: </p>

        <input class="col-lg-3 w-fit form-control rounded-5" type="text" name="order_numb">
        <button class="btn btn-primary rounded-pill" type="submit">Потърси</button>

    </form>

    <hr>

    <section class="mt-4">
        <div class="container">
            <div class="table-responsive">
                <table class="table cart-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Номер на поръчка</th>
                            <th>Клиент</th>
                            <th>Статус</th>
                            <th>Обща сума</th>
                            <th>Дата</th>
                            <th>Действие</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($orders as $order)
                            <tr>

                                <td>{{ $order->id }} </td>

                                <td>
                                    <strong>{{ $order->order_number }}</strong>
                                </td>

                                <td>
                                    {{ $order->first_name }} {{ $order->last_name }}
                                </td>

                                <td>
                                    @switch($order->status)
                                        @case(\App\Models\Order::STATUS_PENDING)
                                            <span class="badge bg-warning text-dark">Чакаща</span>
                                        @break

                                        @case(\App\Models\Order::STATUS_PROCESSING)
                                            <span class="badge bg-info text-dark">Обработва се</span>
                                        @break

                                        @case(\App\Models\Order::STATUS_DELIVERED)
                                            <span class="badge bg-success">Доставена</span>
                                        @break

                                        @case(\App\Models\Order::STATUS_CANCELLED)
                                            <span class="badge bg-danger">Отказана</span>
                                        @break

                                        @default
                                            <span class="badge bg-secondary">{{ $order->status }}</span>
                                    @endswitch
                                </td>

                                <td>
                                    <strong>{{ number_format($order->total, 2) }} EUR</strong>
                                </td>

                                <td>
                                    {{ $order->created_at->format('d.m.Y') }}
                                </td>

                                <td>
                                    <a href="{{ route('admin.orders.show', $order->order_number) }}"
                                        class="thm-btn p-2 ps-4 pe-4">
                                        Отвори
                                    </a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">
                                        Няма намерени поръчки.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </x-backend>
