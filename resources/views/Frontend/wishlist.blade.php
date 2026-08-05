<x-frontend>

    @section('SEO')

    @endsection

    <div class="main-content-wrapper">
        <div class="wishlist-area pt--40 pb--80 pt-md--30 pb-md--60">
            <div class="container">

                <!-- Wishlist Area Start -->
                <div class="wishlist-wrapper bg--2">
                    <div class="row">
                        <div class="col-12">

                            <div class="wishlist-table table-content table-responsive">
                                <table class="table">

                                    <thead>
                                        <tr>
                                            <th>Снимка</th>
                                            <th>Продукт</th>
                                            <th>Цена</th>
                                            <th>Действие</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @forelse ($wishlist as $product)

                                            <tr>


                                                {{-- Image --}}
                                                <td>
                                                    <a href="{{ $product['url'] }}">
                                                        <img
                                                            src="{{ asset('assets/images/products/' . $product['image']) }}"
                                                            alt="{{ $product['name'] }}">
                                                    </a>
                                                </td>

                                                {{-- Product --}}
                                                <td>
                                                    <h3>
                                                        <a href="{{ $product['url'] }}">
                                                            {{ $product['name'] }}
                                                        </a>
                                                    </h3>
                                                </td>

                                                {{-- Price --}}
                                                <td class="cart-product-price">

                                                    @if (!empty($product['discount']))
                                                        <del class="text-muted d-block">
                                                            {{ number_format($product['price'], 2) }} €
                                                        </del>

                                                        <strong class="text-danger">
                                                            {{ number_format($product['final_price'], 2) }} €
                                                        </strong>

                                                        <div class="text-danger small">
                                                            -{{ $product['discount'] }}%
                                                        </div>
                                                    @else
                                                        <strong>
                                                            {{ number_format($product['price'], 2) }} €
                                                        </strong>
                                                    @endif

                                                </td>

                                   
                                                {{-- View Product --}}
                                                <td>
                                                    <a
                                                        href="{{ $product['url'] }}"
                                                        class="btn add-to-cart btn-medium btn-style-2">
                                                        Разгледай
                                                    </a>
                                                </td>

                                            </tr>

                                        @empty

                                            <tr>
                                                <td colspan="6">

                                                    <div class="alert alert-info text-center mb-0">
                                                        Все още нямате добавени продукти в любими.
                                                    </div>

                                                </td>
                                            </tr>

                                        @endforelse

                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Wishlist Area End -->

            </div>
        </div>
    </div>

</x-frontend>
