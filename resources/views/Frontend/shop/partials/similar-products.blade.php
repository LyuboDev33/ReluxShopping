@props(['similarProducts'])

<div class="row container m-0-auto">

    <h3 class="mb-4 mt-3 text-center">Подобни продукти</h3>

    @foreach ($similarProducts as $product)
        <div class="col-xl-3 col-lg-3 col-md-6 col-6">
            <div class="product__all-single">

                <div class="product__all-img">
                    <a href="{{ route('shop.show', $product->slug) }}">
                        @if ($product->main_image)
                            <img src="{{ asset('/assets/images/products/' . $product->main_image) }}"
                                alt="{{ $product->name }}" />
                            <img src="{{ asset('/assets/images/products/' . $product->main_image) }}"
                                alt="{{ $product->name }}" />
                        @else
                            <img src="{{ asset('assets/images/shop/shop-product-1-1.jpg') }}"
                                alt="{{ $product->name }}" />
                            <img src="{{ asset('assets/images/shop/shop-product-1-1.jpg') }}"
                                alt="{{ $product->name }}" />
                        @endif
                    </a>
                </div>

                <div class="product__all-content">

                    @if ($product->categories->isNotEmpty())
                        <p class="small text-muted mb-1">
                            {{ $product->categories->pluck('name')->join(' · ') }}
                        </p>
                    @endif

                    <h4 class="product__all-title">
                        <a href="{{ route('shop.show', $product->slug) }}">
                            {{ $product->name }}
                        </a>
                    </h4>

                    @if ($product->brand)
                        <h4 class="small mb-3 mt-3">
                          Марка: {{ $product->brand }}
                        </h4>
                    @endif

                    <p class="product__all-price">
                        @if ($product->discount)
                            <del class="text-muted me-2">
                                {{ number_format($product->price, 2) }} €
                            </del>

                            <span class="text-danger">
                                {{ number_format($product->price - ($product->price * $product->discount) / 100, 2) }}
                                €
                            </span>
                            (-{{ $product->discount }}%)
                        @else
                            {{ number_format($product->price, 2) }} €
                        @endif
                    </p>

                    <form method="POST" action="{{ route('wishlist.add', $product) }}"
                        class="product__all-btn-box d-flex justify-content-center wishlist-form">

                        @csrf

                        <a class="thm-btn product__all-btn p-2" href="{{ route('shop.show', $product->slug) }}">
                            Разгледай
                        </a>
                        @php
                            $wishlist = Session::get('wishlist', []);
                            $isInWishlist = isset($wishlist[$product->id]);
                        @endphp
                        <button type="submit" class="wishlist-btn">
                            <i class="{{ $isInWishlist ? 'fa-solid' : 'fa-regular' }} fa-heart"></i>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    @endforeach

</div>
