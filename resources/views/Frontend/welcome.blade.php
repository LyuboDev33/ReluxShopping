<x-frontend>

    @section('SEO')
        <title>Начална страница | Valente Optic</title>
        <meta name="description"
            content="Valente Optic — семеен бизнес с над 10 години опит. Диоптрични очила, слънчеви очила, висококачествени стъкла и професионална консултация в Бургас и Равда.">
        <meta name="keywords"
            content="оптика, диоптрични очила, слънчеви очила, прогресивни стъкла, Бургас, Равда, Valente Optic">
    @endsection


    {{-- <div class="preloader">
        <div class="preloader__image"></div>
    </div> --}}


    <!-- Main Slider Two Start -->
    <section class="main-slider-two">
        <div class="main-slider-two__wrap">
            <div class="main-slider-two__carousel">
                <div class="item">

                    <div class="container welcome-container">
                        <div class="main-slider-two__content">

                            <p class="main-slider-two__subtitle-custom">
                                Valente Optic
                            </p>

                            <h2 class="main-slider-two__title main-slider-two__title-custom">
                                ВСИЧКО ЗА <br> ВАШЕТО ЗРЕНИЕ
                            </h2>

                            <div class="main-slider-two__divider-custom">
                                <span></span>
                                <i class="fa-regular fa-heart"></i>
                                <span></span>
                            </div>

                            <p class="main-slider-two__text main-slider-two__text-custom">
                                Диоптрични, слънчеви и компютърни очила,<br>
                                качествени стъкла, модерни рамки и професионална консултация.
                            </p>

                            <div class="main-slider-two__btn">
                                <a href="{{ route('shop.index') }}" class="main-slider-two__btn-custom rounded-pill">
                                    Разгледай магазина
                                </a>
                            </div>

                            <div class="main-slider-two__img-box">
                                <div>
                                    <img src="/assets/images/couple.png" alt="Valente Optic — главна снимка">
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Services Strip -->
                    <div class="services-strip">

                        <div class="services-strip__inner">

                            <div class="services-strip__single">
                                <div class="services-strip__icon">
                                    <span class="fa-solid fa-glasses"></span>
                                </div>

                                <div class="services-strip__content">
                                    <h4>
                                        <a href="/service/konsultaciy-za-ochila">
                                            Консултация за очила
                                        </a>
                                    </h4>

                                    <p>
                                        Избор на подходящи рамки, стъкла и индивидуално решение за вашето зрение.
                                    </p>
                                </div>
                            </div>

                            <hr class="d-md-none bg-white mt-1 mb-1">

                            <div class="services-strip__single">
                                <div class="services-strip__icon">
                                    <span class="fa-solid fa-eye"></span>
                                </div>

                                <div class="services-strip__content">
                                    <h4>
                                        <a href="/service/kompiutarna-diagnostika">
                                            Компютърна диагностика
                                        </a>
                                    </h4>

                                    <p>
                                        Бързо измерване на ориентировъчен диоптър с модерна апаратура.
                                    </p>
                                </div>
                            </div>


                            <hr class="d-md-none bg-white mt-1 mb-1">

                            <div class="services-strip__single">
                                <div class="services-strip__icon">
                                    <span class="fa-solid fa-screwdriver-wrench"></span>
                                </div>

                                <div class="services-strip__content">
                                    <h4>
                                        <a href="/service/izrabotka-ochila">
                                            Изработка на очила
                                        </a>
                                    </h4>

                                    <p>
                                        Прецизна изработка на диоптрични очила с висококачествени стъкла.
                                    </p>
                                </div>
                            </div>

                            <hr class="d-md-none bg-white mt-1 mb-1">

                            <div class="services-strip__single">
                                <div class="services-strip__icon">
                                    <span class="fa-solid fa-screwdriver"></span>
                                </div>

                                <div class="services-strip__content">
                                    <h4>
                                        <a href="/service/regulirane-serviz-ochila">
                                            Регулиране и сервиз
                                        </a>
                                    </h4>

                                    <p>
                                        Регулиране, почистване и сервизно обслужване за максимален комфорт.
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- End Services Strip -->

                </div>
            </div>
        </div>
    </section>
    <!-- Main Slider Two End -->

    <!--About Four Start -->
    <section class="about-four">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-four__left">
                        <div class="about-four__img">
                            <img src="/assets/images/resources/girl-pic.png" alt="За Valente Optic" />
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="about-four__right">

                        <div class="section-title-two text-left sec-title-animation animation-style1">
                            <div class="section-title-two__tagline-box">
                                <span class="section-title-two__tagline">
                                    За Valente Optic
                                </span>

                                <div class="section-title-two__tagline-shape-1"></div>
                            </div>

                            <h2 class="section-title-two__title title-animation">
                                Над 20 години грижа за Вашето зрение
                            </h2>
                        </div>

                        <p class="about-four__text">
                            <strong>Valente Optic</strong> е семеен бизнес с над 20 години опит в сферата на
                            оптиката. Нашата мисия е да предложим качествени решения за добро зрение,
                            съчетавайки професионална консултация, модерни технологии и богато разнообразие
                            от диоптрични и слънчеви очила за цялото семейство.
                        </p>

                        <p class="about-four__text">
                            Освен чрез нашия онлайн магазин, можете да ни посетите и в оптиките ни в
                            <strong>Бургас</strong> и <strong>Равда</strong>, където предлагаме професионални
                            очни прегледи, консултации при избор на рамки и диоптрични стъкла, както и
                            индивидуално обслужване, съобразено с нуждите на всеки клиент.
                        </p>

                        <div class="d-flex flex-wrap gap-3 mt-4">
                            <a href="{{ route('shop.index') }}" class="thm-btn">
                                Разгледай магазина
                            </a>

                            <a href="/service/konsultaciy-za-ochila" class="thm-btn">
                                Нашите услуги
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About Four End -->


    <!-- Brand Marquee Start -->
    <section class="brand-marquee">
        <div class="brand-marquee__viewport">
            <div class="brand-marquee__track">

                <div class="brand-marquee__group">
                    @foreach ($brands as $brand)
                        <div class="brand-marquee__item">
                            <img src="{{ asset('assets/images/brands/' . $brand->getFilename()) }}"
                                alt="{{ pathinfo($brand->getFilename(), PATHINFO_FILENAME) }}">
                        </div>
                    @endforeach
                </div>

                <div class="brand-marquee__group" aria-hidden="true">
                    @foreach ($brands as $brand)
                        <div class="brand-marquee__item">
                            <img src="{{ asset('assets/images/brands/' . $brand->getFilename()) }}" alt="">
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    <!-- Brand Marquee End -->

    <section class="d-flex justify-content-center align-items-center pb-4 section-prods">
        <div class="product__all container">
            <div class="row justify-content-center align-items-center">

                @forelse ($products as $product)
                    <!--Product Single Start-->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-6 align-self-start">
                        <div class="product__all-single">

                            <div class="product__all-img">
                                <a href="{{ route('shop.show', $product->slug) }}">
                                    @if ($product->main_image)
                                        <img src="{{ asset('assets/images/products/' . $product->main_image) }}"
                                            alt="{{ $product->name }}" />
                                        <img src="{{ asset('assets/images/products/' . $product->main_image) }}"
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

                                @if ($product->brand)
                                    <h4 class="small mb-1">
                                        Марка: {{ $product->brand }}
                                    </h4>
                                @endif

                                <h4 class="product__all-title">
                                    <a href="{{ route('shop.show', $product->slug) }}">
                                        {{ $product->name }}
                                    </a>
                                </h4>

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

                                    <a class="thm-btn product__all-btn p-2"
                                        href="{{ route('shop.show', $product->slug) }}">
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
                    <!--Product Single End-->
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            @if ($category)
                                В категория „{{ $category->name }}" все още няма продукти.
                            @else
                                Все още няма налични продукти.
                            @endif
                        </div>
                    </div>
                @endforelse

                <a class="thm-btn w-auto mb-3" href="{{ route('shop.index') }}">Разгледай магазина</a>

            </div>
        </div>
    </section>



    <!--Services Four Start -->
    <section class="services-four">
        <div class="container">
            <div class="section-title-two text-center sec-title-animation animation-style1">
                <div class="section-title-two__tagline-box justify-content-center">
                    <div class="section-title-two__tagline-shape-1"></div>
                    <span class="section-title-two__tagline">Нашите услуги</span>
                    <div class="section-title-two__tagline-shape-1"></div>
                </div>
                <h2 class="section-title-two__title title-animation">
                    Професионална грижа <br />
                    за вашето зрение
                </h2>
            </div>

            <div class="services-four__top">
                <div class="row">

                    <!-- Service -->
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="services-four__single shadow">
                            <div class="services-four__icon">
                                <span class="fa-solid fa-glasses"></span>
                            </div>

                            <h3 class="services-four__title">
                                <a href="/service/konsultaciy-za-ochila">
                                    Консултация за очила
                                </a>
                            </h3>

                            <p class="services-four__text">
                                Професионална консултация за избор на рамка и подходящи диоптрични или слънчеви лещи
                                според вашите нужди.
                            </p>
                        </div>
                    </div>

                    <!-- Service -->
                    <div class="col-xl-3 col-lg-6 col-md-6 ">
                        <div class="services-four__single shadow">
                            <div class="services-four__icon">
                                <span class="fa-solid fa-eye"></span>
                            </div>

                            <h3 class="services-four__title">
                                <a href="/service/kompiutarna-diagnostika">
                                    Компютърна диагностика
                                </a>
                            </h3>

                            <p class="services-four__text">
                                Бързо и прецизно измерване на ориентировъчния диоптър чрез професионален
                                авторефрактометър.
                            </p>
                        </div>
                    </div>

                    <!-- Service -->
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="services-four__single shadow">
                            <div class="services-four__icon">
                                <span class="fa-solid fa-screwdriver-wrench"></span>
                            </div>

                            <h3 class="services-four__title">
                                <a href="/service/izrabotka-ochila">
                                    Изработка на очила
                                </a>
                            </h3>

                            <p class="services-four__text">
                                Изработка на диоптрични очила с качествени лещи, прецизен монтаж и възможност за
                                изработка до 30 минути.
                            </p>
                        </div>
                    </div>

                    <!-- Service -->
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="services-four__single shadow">
                            <div class="services-four__icon">
                                <span class="fa-solid fa-screwdriver"></span>
                            </div>

                            <h3 class="services-four__title">
                                <a href="/service/regulirane-serviz-ochila">
                                    Регулиране и сервиз
                                </a>
                            </h3>

                            <p class="services-four__text">
                                Регулиране, почистване и обслужване на очила за максимален комфорт, стабилност и дълъг
                                живот на рамките.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--Services Four End -->




    <!--CTA One Start -->
    <section class="cta-one">
        <div class="cta-one__bg jarallax" data-jarallax data-speed="0.05" data-imgPosition="50% 0%"
            style="background-image: url(assets/images/backgrounds/cta-one-bg.jpg);">
        </div>

        <div class="container">
            <div class="cta-one__inner">

                <h3 class="cta-one__title">
                    Нуждаете се от професионален съвет? <br>
                    Разгледайте всички услуги на <a href="/service/konsultaciy-za-ochila">Valente Optic</a>
                </h3>

                <div class="cta-one__btn-and-video-link">
                    <div class="cta-one__btn">
                        <a href="/service/konsultaciy-za-ochila" class="thm-btn">
                            Разгледай услугите
                            <span class="icon-arrow-up-right"></span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--CTA One End -->

    <!--Feature One Start -->
    <section class="feature-one">
        <div class="container">
            <div class="section-title-two text-center sec-title-animation animation-style1">
                <div class="section-title-two__tagline-box justify-content-center">
                    <div class="section-title-two__tagline-shape-1"></div>
                    <span class="section-title-two__tagline">Защо нас</span>
                    <div class="section-title-two__tagline-shape-1"></div>
                </div>
                <h2 class="section-title-two__title title-animation">
                    Качество, опит и доверие <br />
                    във всеки детайл
                </h2>
            </div>
            <ul class="list-unstyled feature-one__list">
                <li>
                    <div class="feature-one__title-box">
                        <h2 class="feature-one__title">
                            <a href="/service/konsultaciy-za-ochila">Консултация за <br />очила</a>
                        </h2>
                    </div>
                    <div class="feature-one__content-box">
                        <p class="feature-one__text">
                            Над 19 години работа в оптиката ни дава увереността да предложим <br />
                            най-подходящото решение за всеки клиент. Помогнали сме на хиляди <br />
                            хора да видят света по-ясно.
                        </p>
                        <div class="feature-one__arrow">
                            <a href="/service/konsultaciy-za-ochila"><span class="icon-arrow-up-right"></span></a>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="feature-one__title-box">
                        <h2 class="feature-one__title">
                            <a href="/service/kompiutarna-diagnostika">Компютърна <br />диагностика</a>
                        </h2>
                    </div>
                    <div class="feature-one__content-box">
                        <p class="feature-one__text">
                            Изборът на очила е нещо лично. Отделяме време за консултация и <br />
                            всеки клиент получава решение, съобразено с неговите нужди — не <br />
                            просто продукт, а истинска грижа.
                        </p>
                        <div class="feature-one__arrow">
                            <a href="/service/kompiutarna-diagnostika"><span class="icon-arrow-up-right"></span></a>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="feature-one__title-box">
                        <h2 class="feature-one__title">
                            <a href="/service/izrabotka-ochila">Изработка <br />на очила</a>
                        </h2>
                    </div>
                    <div class="feature-one__content-box">
                        <p class="feature-one__text">
                            Работим с утвърдени световни марки и внимателно подбрани <br />
                            бюджетни модели. Стъкла с Blue Control защита, прогресивни, <br />
                            фотосоларни — за всеки вкус и бюджет.
                        </p>
                        <div class="feature-one__arrow">
                            <a href="/service/izrabotka-ochila"><span class="icon-arrow-up-right"></span></a>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="feature-one__title-box">
                        <h2 class="feature-one__title">
                            <a href="/service/regulirane-serviz-ochila">Регулиране и <br />сервиз на очила</a>
                        </h2>
                    </div>
                    <div class="feature-one__content-box">
                        <p class="feature-one__text">
                            За клиенти от цяла България предлагаме съдействие при избор на <br />
                            рамки и очила чрез снимки, видеоразговори и онлайн комуникация. <br />
                            Доставяме до дома ви.
                        </p>
                        <div class="feature-one__arrow">
                            <a href="/service/regulirane-serviz-ochila"><span class="icon-arrow-up-right"></span></a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!--Feature One End -->

    <!-- Brand Marquee Start -->
    <section class="brand-marquee">
        <div class="brand-marquee__viewport">
            <div class="brand-marquee__track">

                <div class="brand-marquee__group">
                    @foreach ($brands2 as $brand)
                        <div class="brand-marquee__item">
                            <img src="{{ asset('assets/images/brands_2/' . $brand->getFilename()) }}"
                                alt="{{ pathinfo($brand->getFilename(), PATHINFO_FILENAME) }}">
                        </div>
                    @endforeach
                </div>

                <div class="brand-marquee__group" aria-hidden="true">
                    @foreach ($brands2 as $brand)
                        <div class="brand-marquee__item">
                            <img src="{{ asset('assets/images/brands_2/' . $brand->getFilename()) }}"
                                alt="{{ pathinfo($brand->getFilename(), PATHINFO_FILENAME) }}">
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    <!-- Brand Marquee End -->

    <!--Gallery Four Start -->
    <section class="gallery-four">
        <div class="container">
            <div class="gallery-four__top">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="gallery-four__left">
                            <div class="section-title-two text-left sec-title-animation animation-style2">
                                <div class="section-title-two__tagline-box">
                                    <span class="section-title-two__tagline">Нашата галерия</span>
                                    <div class="section-title-two__tagline-shape-1"></div>
                                </div>
                                <h2 class="section-title-two__title title-animation">
                                    Качество във всеки детайл <br />
                                    стил за всеки клиент
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="gallery-four__right">
                            <p class="gallery-four__text">
                                Внимателно подбран асортимент от диоптрични рамки, слънчеви очила и
                                стъкла от водещи световни марки.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-four__bottom">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="gallery-four__single">

                            <div class="gallery-four__img-box">
                                <div class="gallery-four__img">
                                    <img class="welcome6" src="/assets/images/welcome/welcome6.jpg"
                                        alt="Консултация за очила" />
                                </div>

                                <div class="gallery-four__content">
                                    <div class="gallery-four__title-box">
                                        <h3>
                                            <a href="/service/konsultaciy-za-ochila">Консултация за очила</a>
                                        </h3>

                                        <p>Професионален съвет</p>
                                    </div>

                                    <div class="gallery-four__arrow">
                                        <a href="/service/konsultaciy-za-ochila" class="img-popup">
                                            <span class="icon-arrow-right-three"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="gallery-four__img-box">
                                <div class="gallery-four__img">
                                    <img class="welcome5" src="/assets/images/welcome/welcome5.jpg"
                                        alt="Компютърна диагностика" />
                                </div>

                                <div class="gallery-four__content">
                                    <div class="gallery-four__title-box">
                                        <h3>
                                            <a href="/service/kompiutarna-diagnostika">Компютърна диагностика</a>
                                        </h3>

                                        <p>Прецизно измерване</p>
                                    </div>

                                    <div class="gallery-four__arrow">
                                        <a href="/service/kompiutarna-diagnostika" class="img-popup">
                                            <span class="icon-arrow-right-three"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <div class="gallery-four__single">

                            <div class="gallery-four__img-box">
                                <div class="gallery-four__img">
                                    <img class="welcome2" src="/assets/images/welcome/welcome2.jpg"
                                        alt="Изработка на очила" />
                                </div>

                                <div class="gallery-four__content">
                                    <div class="gallery-four__title-box">
                                        <h3>
                                            <a href="/service/izrabotka-ochila">Изработка на очила</a>
                                        </h3>

                                        <p>По индивидуална поръчка</p>
                                    </div>

                                    <div class="gallery-four__arrow">
                                        <a href="/service/izrabotka-ochila" class="img-popup">
                                            <span class="icon-arrow-right-three"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="gallery-four__img-box">
                                <div class="gallery-four__img">
                                    <img class="welcome3" src="/assets/images/welcome/welcome3.jpg"
                                        alt="Регулиране и сервиз на очила" />
                                </div>

                                <div class="gallery-four__content">
                                    <div class="gallery-four__title-box">
                                        <h3>
                                            <a href="/service/regulirane-serviz-ochila">Регулиране и сервиз на
                                                очила</a>
                                        </h3>

                                        <p>Поддръжка и комфорт</p>
                                    </div>

                                    <div class="gallery-four__arrow">
                                        <a href="/service/regulirane-serviz-ochila" class="img-popup">
                                            <span class="icon-arrow-right-three"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Gallery Four End -->


    <!-- Testimonial Four Start -->
    <section class="testimonial-four">
        <div class="container">
            <h1 class="text-center mt-2 mb-4">Мнения на клиенти</h1>
            <div class="testimonial-four__inner">
                <div class="testimonial-four__big-img">
                    <img src="/assets/images/testimonial/testimonials.jpg" alt="Отзиви от клиенти">
                </div>

                <div class="testimonial-four__top">
                    <div class="row">
                        <div class="col-xl-6">

                            <section class="splide testimonial-four__splide" id="testimonialSplide"
                                aria-label="Отзиви от клиенти">
                                <div class="splide__track">
                                    <ul class="splide__list">

                                        <li class="splide__slide">
                                            <div class="testimonial-four__single">
                                                <div class="testimonial-four__quote-and-rating">

                                                    <div class="testimonial-four__quote">
                                                        <span class="fas fa-quote-right"></span>
                                                    </div>

                                                    <div class="testimonial-four__rating">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star"></span>
                                                    </div>

                                                </div>

                                                <p class="testimonial-four__text">
                                                    Изключително професионално отношение! Получих помощ при избора на
                                                    прогресивни стъкла, които ми решиха проблема със зрението напълно.
                                                    Препоръчвам Valente Optic на всеки, който търси качество и истинска
                                                    грижа.
                                                </p>

                                                <div class="testimonial-four__client-info">
                                                    {{-- <div class="testimonial-four__client-img">
                                                        <img src="/assets/images/testimonial/testimonial-4-1.jpg"
                                                            alt="Стоянка Михайлова">
                                                    </div> --}}

                                                    <h3 class="testimonial-four__client-name">
                                                        Стоянка Михайлова
                                                    </h3>

                                                    <p class="testimonial-four__client-sub-title">
                                                        Доволен клиент, Бургас
                                                    </p>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="splide__slide">
                                            <div class="testimonial-four__single">
                                                <div class="testimonial-four__quote-and-rating">

                                                    <div class="testimonial-four__quote">
                                                        <span class="fas fa-quote-right"></span>
                                                    </div>

                                                    <div class="testimonial-four__rating">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star"></span>
                                                    </div>

                                                </div>

                                                <p class="testimonial-four__text">
                                                    Поръчах слънчеви очила с поляризация и съм изключително доволна.
                                                    Качествени материали, бърза изработка и винаги усмихнат екип.
                                                    Чувството, че те познават и помнят, е безценно.
                                                </p>

                                                <div class="testimonial-four__client-info">
                                                    {{-- <div class="testimonial-four__client-img">
                                                        <img src="/assets/images/testimonial/testimonial-4-2.jpg"
                                                            alt="Мария Тодорова">
                                                    </div> --}}

                                                    <h3 class="testimonial-four__client-name">
                                                        Мария Тодорова
                                                    </h3>

                                                    <p class="testimonial-four__client-sub-title">
                                                        Доволен клиент, Равда
                                                    </p>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="splide__slide">
                                            <div class="testimonial-four__single">
                                                <div class="testimonial-four__quote-and-rating">

                                                    <div class="testimonial-four__quote">
                                                        <span class="fas fa-quote-right"></span>
                                                    </div>

                                                    <div class="testimonial-four__rating">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star"></span>
                                                    </div>

                                                </div>

                                                <p class="testimonial-four__text">
                                                    Дъщеря ми получи първите си очила във Valente Optic и беше истинско
                                                    приключение. Екипът намери идеалната рамка за нея и сега тя обича
                                                    да ги носи. Благодаря за търпението и професионализма!
                                                </p>

                                                <div class="testimonial-four__client-info">
                                                    {{-- <div class="testimonial-four__client-img">
                                                        <img src="/assets/images/testimonial/testimonial-4-3.jpg"
                                                            alt="Иван Георгиев">
                                                    </div> --}}

                                                    <h3 class="testimonial-four__client-name">
                                                        Иван Георгиев
                                                    </h3>

                                                    <p class="testimonial-four__client-sub-title">
                                                        Доволен родител
                                                    </p>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </section>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Testimonial Four End -->



    <style>
        .optics-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    width: min(100%, var(--grid-max-width));
    overflow: hidden;
    background: #ffffff;
}

.optics-card {
    min-width: 0;
    overflow: hidden;
}

.optics-card img {
    display: block;
    width: 100%;
    height: 100%;
    aspect-ratio: 1 / 1.075;
    object-fit: cover;
}
    </style>

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
