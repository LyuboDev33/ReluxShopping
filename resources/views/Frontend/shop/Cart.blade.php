<x-frontend>
    <!--Start Cart Page-->
    <section class="cart-page">
        <div class="container">
            @if (count($products))
                <div class="table-responsive">
                    <table class="table cart-table">
                        <thead>
                            <tr>
                                <th>Продукт</th>
                                <th>Цена</th>
                                <th>Количество</th>
                                <th>Общо</th>
                                <th>Премахни</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>
                                        <div class="product-box align-items-start">
                                            <div class="img-box">
                                                <img src="{{ asset('/assets/images/products/' . $product['image']) }}"
                                                    alt="{{ $product['name'] }}" />
                                            </div>

                                            <div>
                                                <h3>
                                                    <a href="{{ route('shop.show', $product['slug']) }}">
                                                        {{ $product['name'] }}
                                                    </a>
                                                </h3>

                                                @if (($product['purchase_type'] ?? 'frame_only') === 'frame_only')
                                                    <span class="badge bg-secondary rounded-pill">
                                                        Само рамка
                                                    </span>
                                                @else
                                                    <span class="badge bg-primary rounded-pill mb-2">
                                                        Рамка със стъкла
                                                    </span>

                                                    <div class="cart-product-options mt-2">
                                                        @if (!empty($product['lens_index']))
                                                            <p class="mb-1">
                                                                <strong>Индекс на изтъняване:</strong>
                                                                {{ $product['lens_index']['name'] }}
                                                                <span class="text-muted">
                                                                    (+{{ number_format($product['lens_index']['price'], 2) }} €)
                                                                </span>
                                                            </p>
                                                        @endif

                                                        @if (!empty($product['glass_value']))
                                                            <p class="mb-1">
                                                                <strong>Стъкло:</strong>
                                                                {{ $product['glass_value']['glass_name'] }}
                                                            </p>

                                                            <p class="mb-1">
                                                                <strong>Стойност:</strong>
                                                                {{ $product['glass_value']['value'] }}
                                                                <span class="text-muted">
                                                                    (+{{ number_format($product['glass_value']['price'], 2) }} €)
                                                                </span>
                                                            </p>
                                                        @endif

                                                        @if (!empty($product['prescription_image']))
                                                            <p class="mb-1">
                                                                <strong>Рецепта:</strong>
                                                                <a href="{{ asset('assets/images/prescriptions/' . $product['prescription_image']) }}"
                                                                    target="_blank">
                                                                    Виж прикачен файл
                                                                </a>
                                                            </p>
                                                        @endif

                                                        @if (!empty(array_filter($product['right_eye'] ?? [])) || !empty(array_filter($product['left_eye'] ?? [])))
                                                            <div class="mt-2">
                                                                <strong>Диоптър:</strong>

                                                                <div class="table-responsive mt-2">
                                                                    <table class="table table-sm table-bordered mb-0">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Око</th>
                                                                                <th>SPH</th>
                                                                                <th>CYL</th>
                                                                                <th>AXIS</th>
                                                                                <th>ADD</th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Дясно</td>
                                                                                <td>{{ $product['right_eye']['sph'] ?? '-' }}</td>
                                                                                <td>{{ $product['right_eye']['cyl'] ?? '-' }}</td>
                                                                                <td>{{ $product['right_eye']['axis'] ?? '-' }}</td>
                                                                                <td>{{ $product['right_eye']['add'] ?? '-' }}</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td>Ляво</td>
                                                                                <td>{{ $product['left_eye']['sph'] ?? '-' }}</td>
                                                                                <td>{{ $product['left_eye']['cyl'] ?? '-' }}</td>
                                                                                <td>{{ $product['left_eye']['axis'] ?? '-' }}</td>
                                                                                <td>{{ $product['left_eye']['add'] ?? '-' }}</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        @if ((int) $product['discount'] > 0)
                                            <del class="text-muted">
                                                {{ number_format($product['price'], 2) }} €
                                            </del>

                                            <span class="text-danger ms-2">
                                                {{ number_format($product['final_price'], 2) }} €
                                            </span>

                                            <span class="badge bg-danger ms-2 rounded-pill text-color">
                                                -{{ $product['discount'] }}%
                                            </span>
                                        @else
                                            {{ number_format($product['final_price'], 2) }} €
                                        @endif
                                    </td>

                                    <td>
                                        <div class="quantity-box">
                                            <p class="text-center">
                                                {{ $product['quantity'] }}
                                            </p>
                                        </div>
                                    </td>

                                    <td>
                                        {{ number_format($product['final_price'] * $product['quantity'], 2) }} €
                                    </td>

                                    <td>
                                        <form class="d-flex justify-content-end"
                                            action="{{ route('cart.remove', $key) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="cross-icon border-0 bg-transparent">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-xl-8 col-lg-7"></div>

                    <div class="col-xl-4 col-lg-5 d-flex flex-column">
                        <a class="thm-btn mb-4" href="{{ route('checkout') }}">
                            Премини към чекаут
                        </a>

                        <ul class="cart-total list-unstyled">
                            <li>
                                <span>Междинна сума</span>
                                <span>{{ number_format($subtotal, 2) }} €</span>
                            </li>

                            <li>
                                <span>Общо</span>
                                <span class="cart-total-amount">
                                    {{ number_format($subtotal, 2) }} €
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            @else
                <div class="alert alert-info mt-5">
                    Количката е празна.
                </div>
            @endif
        </div>
    </section>
    <!--End Cart Page-->
</x-frontend>
