<x-frontend>

    @section('SEO')
        {{-- Основно SEO --}}
        <title>Valente Optics | Диоптрични и слънчеви очила в Бургас и Равда</title>

        <meta name="description"
            content="Valente Optics предлага диоптрични, слънчеви, компютърни и детски очила, качествени стъкла, професионална консултация, компютърна диагностика, изработка и сервиз на очила в Бургас и Равда. Пазарувайте и онлайн с доставка в цяла България.">

        <meta name="keywords"
            content="Valente Optics, оптика Бургас, оптика Равда, онлайн магазин за очила, диоптрични очила, диоптрични рамки, слънчеви очила, детски очила, компютърни очила, прогресивни стъкла, фотосоларни стъкла, Blue Control, изработка на очила, сервиз на очила, компютърна диагностика">

        <meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1">

        <meta name="googlebot" content="index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1">

        <link rel="canonical" href="{{ url('/') }}">

        {{-- Език и регион --}}
        <meta property="og:locale" content="bg_BG">

        {{-- Open Graph: Facebook, Messenger, LinkedIn и други --}}
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Valente Optics">

        <meta property="og:title" content="Valente Optics | Всичко за вашето зрение">

        <meta property="og:description"
            content="Диоптрични, слънчеви, компютърни и детски очила, качествени стъкла и професионална грижа за зрението. Посетете Valente Optics в Бургас и Равда или пазарувайте онлайн.">

        <meta property="og:url" content="{{ url('/') }}">
        <meta property="og:image" content="{{ asset('assets/images/seo/valente-optics-home.jpg') }}">

        <meta property="og:image:secure_url" content="{{ asset('assets/images/seo/valente-optics-home.jpg') }}">
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:alt" content="Valente Optics – диоптрични и слънчеви очила в Бургас и Равда">

        {{-- Twitter / X Card --}}
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Valente Optics | Всичко за вашето зрение">
        <meta name="twitter:description"
            content="Открийте диоптрични и слънчеви очила, качествени стъкла, професионална консултация, диагностика, изработка и сервиз на очила.">

        <meta name="twitter:image" content="{{ asset('assets/images/seo/valente-optics-home.jpg') }}">
        <meta name="twitter:image:alt" content="Valente Optics – очила, стъкла и професионална грижа за зрението">

        {{-- Допълнителна информация --}}
        <meta name="author" content="Valente Optics">
        <meta name="application-name" content="Valente Optics">
        <meta name="theme-color" content="#ffffff">
    @endsection


    <!-- Main Content Wrapper Start -->
    <div class="main-content-wrapper">

        <!-- Slider area Start -->
        <section class="slider-area">
            <div class="homepage-slider">
                <!-- Single Slide Start -->
                <div class="single-slider content-v-center"
                    style="background-image: url(assets/img/slider/slider1-mirora2-1920x634.jpg)">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-content">
                                    <h5 data-animation="rollIn" data-duration=".8s" data-delay=".5s">Exclusive Offer
                                        -20% Off This Week</h5>
                                    <h1 data-animation="fadeInDown" data-duration=".8s" data-delay=".2s">H-Vault
                                        Classico</h1>
                                    <p class="mb--30 mb-sm--20" data-animation="fadeInDown" data-duration=".8s"
                                        data-delay=".2s">H-Vault Watches Are A Lot Like Classic American Muscle Cars -
                                        Expect For The American Part That Is. </p>
                                    <p class="mb--50 mb-sm--20" data-animation="fadeInDown" data-duration=".8s"
                                        data-delay=".2s">Starting At <strong>$1.499.00</strong></p>
                                    <div class="slide-btn-group" data-animation="fadeInUp" data-duration="1s"
                                        data-delay=".3s">
                                        <a href="shop.html" class="btn btn-bordered btn-style-1">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Slide End -->

                <!-- Single Slide Start -->
                <div class="single-slider content-v-center"
                    style="background-image: url(assets/img/slider/slider3-mirora2-1920x634.jpg)">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-content">
                                    <h5 data-animation="rollIn" data-duration=".8s" data-delay=".5s">Exclusive Offer
                                        -20% Off This Week</h5>
                                    <h1 data-animation="fadeInDown" data-duration=".8s" data-delay=".2s">Our Sale
                                        Continues</h1>
                                    <p class="mb--30 mb-sm--20" data-animation="fadeInDown" data-duration=".8s"
                                        data-delay=".2s">Christmas Might Be Over, But Our Sale Isn't. Up To 70% Off,
                                        With New Items Added.</p>
                                    <p class="mb--50 mb-sm--20" data-animation="fadeInDown" data-duration=".8s"
                                        data-delay=".2s">Starting At <strong>$1.499.00</strong></p>
                                    <div class="slide-btn-group" data-animation="fadeInUp" data-duration="1s"
                                        data-delay=".3s">
                                        <a href="shop.html" class="btn btn-bordered btn-style-1">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Slide End -->
            </div>
        </section>
        <!-- Slider area End -->


        <!-- Main Wrapper Start -->
        <section class="main-content-wrapper container">
            <div class="about-area bg--dark-3 mt--40 mt-sm--30">
                <div class="container-fluid p-0">
                    <div class="row no-gutters align-items-center">
                        <div class="col-xl-6">
                            <div class="img-box text-center">
                                <img src="assets/img/about/about-us-img1.jpg" alt="about">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-10 offset-1">
                                    <div class="about-text text-center">
                                        <h2 class="heading-secondary mb--40 mb-sm--30">
                                            About Us
                                        </h2>
                                        <p class="mb--40 mb-sm--30">Duis autem vel eum iriure dolor in hendrerit in
                                            vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                            facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                                            praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                                            Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet
                                            doming id quod mazim placerat facer possim assum. Typi non habent claritatem
                                            insitam, est usus legentis in iis qui facit eorum claritatem.</p>
                                        <div class="about-btn-group text-center">
                                            <a href="portfolio.html" class="btn btn-style-3">view work</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fact-area" id="fun-fact">
                <div class="container-fluid p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-3 col-sm-6">
                            <div class="fact">
                                <div class="fact__icon">
                                    <img src="assets/img/icons/about-us-icon1.png" alt="about icon">
                                </div>
                                <div class="fact__content">
                                    <h3><span class="counter" data-count="2169">0</span></h3>
                                    <p>HAPPY CUSTOMERS</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="fact">
                                <div class="fact__icon">
                                    <img src="assets/img/icons/about-us-icon2.png" alt="about icon">
                                </div>
                                <div class="fact__content">
                                    <h3><span class="counter" data-count="869">0</span></h3>
                                    <p>AWARDS WON</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="fact">
                                <div class="fact__icon">
                                    <img src="assets/img/icons/about-us-icon3.png" alt="about icon">
                                </div>
                                <div class="fact__content">
                                    <h3><span class="counter" data-count="689">0</span></h3>
                                    <p>HOURS WORKED</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="fact">
                                <div class="fact__icon">
                                    <img src="assets/img/icons/about-us-icon4.png" alt="about icon">
                                </div>
                                <div class="fact__content">
                                    <h3><span class="counter" data-count="2500">0</span></h3>
                                    <p>COMPLETE PROJECTS</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="skill-area bg--dark-3">
                <div class="container-fluid p-0">
                    <div class="row no-gutters align-items-center">
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-sm-9 offset-sm-2 col-10 offset-1">
                                    <div class="skill-progress">
                                        <h2 class="heading-secondary heading-secondary--2 mb--40">
                                            WE HAVE SKILLS TO SHOW
                                        </h2>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="img-box text-center">
                                <img src="assets/img/about/about-us-img2.jpg" alt="about image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main Wrapper End -->

        <!-- Brand Marquee Start -->
        <section class="brand-marquee">
            <div class="brand-marquee__viewport">
                <div class="brand-marquee__track">

                    <div class="brand-marquee__group">
                        @foreach ($brands as $brand)
                            <div class="brand-marquee__item">
                                <img src="{{ asset('assets/img/brands/' . $brand->getFilename()) }}"
                                    alt="{{ pathinfo($brand->getFilename(), PATHINFO_FILENAME) }}">
                            </div>
                        @endforeach
                    </div>

                    <div class="brand-marquee__group" aria-hidden="true">
                        @foreach ($brands as $brand)
                            <div class="brand-marquee__item">
                                <img src="{{ asset('assets/img/brands/' . $brand->getFilename()) }}"
                                    alt="{{ $brand->getFilename() }}">
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>
        <!-- Brand Marquee End -->


        <section class="banner-area banner-bg-1 mb-5 ptb--80 ptb-md--60">
            <div class="banner-box text-center">
                <h5 class="banner__label">Sale Off 20% All Products</h5>
                <h2 class="banner__name">New Trending Collection</h2>
                <p class="banner__text mb--50 mb-md--20">We Believe That Good Design is Always in Season</p>
                <a href="shop.html" class="btn btn-bordered btn-style-1">Shop Now</a>
            </div>
        </section>

        <!-- Banner area End -->

        <!-- Promo Box area Start -->
        <section class="promo-box-area border-bottom pt-md--60 ptb--80 ptb-md--60">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-sm--20">
                        <div class="promo promo-1">
                            <a href="shop.html" class="promo__box">
                                <img src="assets/img/banner/img1-top-mirora2.jpg" alt="Product Category">
                                <span class="promo__content promo__content-3">
                                    <span class="promo__label">Design Creative</span>
                                    <span class="promo__name">Modern and Clean</span>
                                    <span class="promo__price">From $60.99 - Sale 20%</span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="promo promo-1">
                            <a href="shop.html" class="promo__box">
                                <img src="assets/img/banner/img2-top-mirora2.jpg" alt="Product Category">
                                <span class="promo__content promo__content-3">
                                    <span class="promo__label">Onsale Products</span>
                                    <span class="promo__name">Perfect Rider Watch</span>
                                    <span class="promo__price">Selling Off 30%</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Promo Box area End -->

        <!-- Most Viewed Product area Start -->
        <section class="mostviewed-product-area pt--80 pb--20 pt-md--60">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title mb--15">
                            <h2 class="color--white">Най-продавани продукти</h2>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-12">
                        <div class="product-carousel nav-top js-product-carousel-2">
                            @foreach ($products as $product)
                                <div class="mirora-product">
                                    <div class="product-img">
                                        <img src="assets/img/products/2-450x450.jpg" alt="Product"
                                            class="primary-image" />
                                        <img src="assets/img/products/2-2-450x450.jpg" alt="Product"
                                            class="secondary-image" />
                                        <div class="product-img-overlay">
                                            <span class="product-label discount">
                                                -7%
                                            </span>
                                            <a data-bs-toggle="modal" data-bs-target="#productModal"
                                                class="btn btn-transparent btn-fullwidth btn-medium btn-style-1">Quick
                                                View</a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <span>Cartier</span>
                                        <h4><a href="product-details.html">Acer Aspire E 15</a></h4>
                                        <div class="product-price-wrapper">
                                            <span class="money">$550.00</span>
                                            <span class="product-price-old">
                                                <span class="money">$700.00</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mirora_product_action text-center position-absolute">
                                        <div class="product-rating">
                                            <span>
                                                <i class="fa fa-star theme-star"></i>
                                                <i class="fa fa-star theme-star"></i>
                                                <i class="fa fa-star theme-star"></i>
                                                <i class="fa fa-star theme-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                        <p>
                                            It is a long established fact that a reader will be distracted by the
                                            readable
                                            content...
                                        </p>
                                        <div class="product-action">
                                            <a class="same-action" href="wishlist.html" title="wishlist">
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                            <a class="add_cart cart-item action-cart" href="cart.html"
                                                title="wishlist"><span>Add to cart</span></a>
                                            <a class="same-action compare-mrg" data-bs-toggle="modal"
                                                data-bs-target="#productModal" href="compare.html">
                                                <i class="fa fa-sliders fa-rotate-90"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Most Viewed Product area End -->


        <section class="corporate-area border-top border-bottom ptb--80 ptb-md--60">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 mb-sm--30">
                        <div class="corporate-2 text-center">
                            <i class="fa fa-globe"></i>
                            <h3>Free Shipping</h3>
                            <p>Free shipping on all order</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-sm--30">
                        <div class="corporate-2 text-center">
                            <i class="fa fa-check-square-o"></i>
                            <h3>Money Return</h3>
                            <p>Back guarantee under 7 days</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-xsm--30">
                        <div class="corporate-2 text-center">
                            <i class="fa fa-bell"></i>
                            <h3>Member Discount</h3>
                            <p>Onevery order over $120.00</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="corporate-2 text-center">
                            <i class="fa fa-clock-o"></i>
                            <h3>Online Support</h3>
                            <p>Support online 24 hours a day</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Corporate area Start -->
        <div class="corporate-area pt--40 pb--80 pt-md--30 pb-md--60">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-sm--20">
                        <div class="corporate text-center">
                            <h3>Money Return Guarantee</h3>
                            <p>Back guarantee under 30 days</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="corporate text-center">
                            <h3>Free Shipping On Order Over $120</h3>
                            <p>Free shipping on all order</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Corporate area End -->



        <!-- Newsletter area End -->
    </div>
    <!-- Main Content Wrapper Start -->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const testimonialSplide = document.getElementById('testimonialSplide');

            if (!testimonialSplide) {
                return;
            }

            new Splide(testimonialSplide, {
                type: 'loop',
                perPage: 1,
                perMove: 1,
                gap: '20px',
                arrows: true,
                pagination: true,
                autoplay: false,
                interval: 5000,
                pauseOnHover: false,
                pauseOnFocus: false,
                speed: 800,
            }).mount();
        });
    </script>

</x-frontend>
