    <div class="row container m-0-auto">

        <h3 class="mb-4 mt-3 text-center">Последно разгледани продукти</h3>

        @foreach (Session::get('lastViewedProducts', []) as $product)
            <div class="col-xl-3 col-lg-3 col-md-6 col-6">
                <div class="product__all-single">

                    <div class="product__all-img">
                        <a href="{{ $product['url'] }}">

                            @if (!empty($product['image']))
                                <img src="{{ asset('/assets/images/products/' . $product['image']) }}"
                                    alt="{{ $product['name'] }}">

                                <img src="{{ asset('/assets/images/products/' . $product['image']) }}"
                                    alt="{{ $product['name'] }}">
                            @else
                                <img src="{{ asset('assets/images/shop/shop-product-1-1.jpg') }}"
                                    alt="{{ $product['name'] }}">

                                <img src="{{ asset('assets/images/shop/shop-product-1-1.jpg') }}"
                                    alt="{{ $product['name'] }}">
                            @endif

                        </a>
                    </div>

                    <div class="product__all-content">

                        <h4 class="product__all-title">
                            <a href="{{ $product['url'] }}">
                                {{ $product['name'] }}
                            </a>
                        </h4>

                        <p class="product__all-price">

                            @if ($product['discount'])
                                <del class="text-muted me-2">
                                    {{ number_format($product['price'], 2) }} €
                                </del>

                                <span class="text-danger">
                                    {{ number_format($product['final_price'], 2) }} €
                                </span>

                                (-{{ $product['discount'] }}%)
                            @else
                                {{ number_format($product['price'], 2) }} €
                            @endif

                        </p>

                        <div class="product__all-btn-box d-flex justify-content-center">

                            <a class="thm-btn product__all-btn p-2" href="{{ $product['url'] }}">
                                Разгледай
                            </a>

                            @php
                                $wishlist = Session::get('wishlist', []);
                                $isInWishlist = isset($wishlist[$product['id']]);
                            @endphp

                            <form method="POST" action="{{ route('wishlist.add', $product['id']) }}"
                                class="wishlist-form">
                                @csrf

                                <button type="submit" class="wishlist-btn">
                                    <i class="{{ $isInWishlist ? 'fa-solid' : 'fa-regular' }} fa-heart"></i>
                                </button>

                            </form>

                        </div>

                    </div>

                </div>
            </div>
        @endforeach
    </div>
