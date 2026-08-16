<x-frontend>

    @section('SEO')
        <title>За нас | ReLux TopShopping – Луксозни часовници и премиум аксесоари</title>

        <meta name="description"
            content="Научете повече за ReLux TopShopping – доверено място за 100% автентични луксозни часовници и премиум аксесоари. Подбрана селекция, качество, персонализирано отношение и сигурно пазаруване.">

        <meta name="keywords"
            content="за нас ReLux TopShopping, луксозни часовници, премиум часовници, автентични часовници, оригинални часовници, луксозни аксесоари, маркови часовници, часовници за колекционери, премиум аксесоари">

        <meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1">

        <meta name="googlebot" content="index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1">

        <link rel="canonical" href="{{ url('/about') }}">
        <meta property="og:locale" content="bg_BG">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="ReLux TopShopping">
        <meta property="og:title" content="За нас | ReLux TopShopping – Луксозни часовници и премиум аксесоари">

        <meta property="og:description"
            content="ReLux TopShopping предлага внимателно подбрана селекция от 100% автентични премиум часовници и луксозни аксесоари, съчетани с персонализирано отношение, качество и сигурност.">

        <meta property="og:url" content="{{ url('/about') }}">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="За нас | ReLux TopShopping – Премиум часовници и аксесоари">
        <meta name="twitter:description"
            content="Открийте повече за ReLux TopShopping – автентични луксозни часовници, премиум аксесоари, внимателна селекция и персонализирано обслужване."> 
        <meta name="author" content="ReLux TopShopping">

        <meta name="application-name" content="ReLux TopShopping">

        <meta name="theme-color" content="#171717">
    @endsection


    <!-- About ReLux Start -->
    <section class="about-five relux-about-section">
        <div class="container">
            <div class="row relux-about-section__row">

                <div class="col-lg-6">
                    <div class="about-five__left relux-about-section__content">

                        <div class="section-title text-left sec-title-animation animation-style2">
                            <div class="section-title__tagline-box">
                                <span class="section-title__tagline">
                                    За нас
                                </span>
                            </div>

                            <h2 class="section-title__title title-animation">
                                Добре дошли в ReLux TopShopping
                            </h2>
                        </div>

                        <p class="about-five__text-1">
                            <strong>ReLux TopShopping</strong> е вашето доверено пространство за висша
                            часовникарска подборка, доказан стил и безкомпромисно качество.
                        </p>

                        <p class="about-five__text-1">
                            Ние сме динамично и бързо развиваща се компания в сферата на луксозните
                            аксесоари и модата. Вярваме, че един премиум часовник или аксесоар е много
                            повече от допълнение към тоалета — той е история, статус, инвестиция и
                            израз на индивидуалност.
                        </p>

                        <h3>
                            Нашата мисия
                        </h3>

                        <p class="about-five__text-1">
                            Основният ни фокус е да предоставяме внимателно подбрана премиум селекция
                            от <strong>100% автентични часовници и аксесоари</strong> от
                            световноутвърдени марки.
                        </p>

                        <p class="about-five__text-1">
                            В свят, преситен от масово производство и имитации, нашата цел е да
                            осигурим на клиентите си пълна сигурност, спокойствие и удовлетворение
                            при всяка покупка.
                        </p>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-five__right relux-about-section__image-column">
                        <div class="relux-about-section__image-box">
                            <img src="/assets/img/about/picture-elegant-young-fashion-man.jpg"
                                alt="ReLux TopShopping – премиум часовници и аксесоари">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- About ReLux End -->

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
                            <img src="{{ asset('assets/img/brands/' . $brand->getFilename()) }}" alt="">
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    <!-- Brand Marquee End -->

    <!-- Brand Marquee Start -->
    <section class="brand-marquee">
        <div class="brand-marquee__viewport">
            <div class="brand-marquee__track-backwards">

                <div class="brand-marquee__group">
                    @foreach ($brands2 as $brand)
                        <div class="brand-marquee__item">
                            <img src="{{ asset('assets/img/brands_2/' . $brand->getFilename()) }}"
                                alt="{{ pathinfo($brand->getFilename(), PATHINFO_FILENAME) }}">
                        </div>
                    @endforeach
                </div>

                <div class="brand-marquee__group" aria-hidden="true">
                    @foreach ($brands2 as $brand)
                        <div class="brand-marquee__item">
                            <img src="{{ asset('assets/img/brands_2/' . $brand->getFilename()) }}"
                                alt="{{ pathinfo($brand->getFilename(), PATHINFO_FILENAME) }}">
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    <!-- Brand Marquee End -->

    <!-- About ReLux Vision Start -->
    <section class="about-five relux-about-section">
        <div class="container">
            <div class="row flex-row-reverse relux-about-section__row">

                <div class="col-xl-6">
                    <div class="about-five__left relux-about-section__content">

                        <div class="section-title text-left sec-title-animation animation-style2">
                            <div class="section-title__tagline-box">
                                <span class="section-title__tagline">
                                    ReLux TopShopping
                                </span>
                            </div>

                            <h2 class="section-title__title title-animation">
                                Защо да изберете ReLux TopShopping?
                            </h2>
                        </div>

                        <ul class="list-unstyled relux-about-points">

                            <li>
                                <div class="text">
                                    <p>
                                        <b>Гарантирана автентичност</b>

                                        Всеки артикул в нашия каталог преминава през прецизна
                                        проверка на произхода и състоянието, преди да стигне до вас.
                                    </p>
                                </div>
                            </li>

                            <li>

                                <div class="text">
                                    <p>
                                        <b>Селектиран асортимент</b>

                                        Предлагаме както класически и вечни модели, така и модерни
                                        премиум находки за ценители и колекционери.
                                    </p>
                                </div>
                            </li>

                            <li>
                                <div class="text">
                                    <p>
                                        <b>Персонализирано отношение</b>

                                        За нас всеки клиент е специален. Помагаме ви да откриете
                                        точния модел, който подхожда най-добре на вашия стил или
                                        инвестиционни намерения.
                                    </p>
                                </div>
                            </li>

                            <li>

                                <div class="text">
                                    <p>
                                        <b>Бързина и коректност</b>

                                        Като бързо развиваща се фирма, залагаме на високи стандарти
                                        в обслужването, прозрачна комуникация и сигурна доставка.
                                    </p>
                                </div>
                            </li>

                        </ul>

                        <h3>
                            Нашата визия
                        </h3>

                        <p class="about-five__text-1">
                            Продължаваме да разширяваме нашето портфолио и да надграждаме услугите си,
                            за да поддържаме мястото си сред предпочитаните дестинации за премиум
                            пазаруване.
                        </p>

                        <p class="about-five__text-1">
                            В <strong>ReLux TopShopping</strong> не просто продаваме часовници —
                            ние изграждаме дългосрочни взаимоотношения, базирани на доверие.
                        </p>

                        <p class="relux-about-section__quote">
                            <b>
                                „Времето е най-ценният лукс — инвестирайте го със стил.“
                            </b>
                        </p>

                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="relux-about-section__image-column">
                        <div class="relux-about-section__image-box">
                            <img src="/assets/img/about/man-fashion.jpg"
                                alt="ReLux TopShopping – луксозни часовници и стил">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- About ReLux Vision End -->

    <!-- Testimonial Two Start -->
    <section class="testimonial-showcase">
        <div class="container">
            <div class="testimonial-showcase__wrapper">

                <div class="testimonial-showcase__content">
                    <div class="testimonial-showcase__heading">

                        <span class="testimonial-showcase__eyebrow">
                            Мнения за нас
                        </span>

                        <h3 class="testimonial-showcase__title">
                            Отзиви от нашите клиенти
                        </h3>

                    </div>

                    <div class="splide testimonial-showcase__splide" id="testimonialSplide"
                        aria-label="Отзиви от клиенти">

                        <div class="splide__track">
                            <ul class="splide__list">

                                <li class="splide__slide">
                                    <div class="testimonial-showcase__single">

                                        <div class="testimonial-showcase__quote">
                                            <i class="fa-solid fa-quote-right"></i>
                                        </div>

                                        <p class="testimonial-showcase__text">
                                            Изключително професионално отношение! Помогнаха ми с избора
                                            на прогресивни стъкла и сега виждам перфектно както отблизо,
                                            така и отдалече. Препоръчвам Valente Optics с пълна увереност.
                                        </p>

                                        <div class="testimonial-showcase__author">

                                            <div class="testimonial-showcase__author-icon">
                                                <i class="fa-solid fa-user"></i>
                                            </div>

                                            <div class="testimonial-showcase__author-content">
                                                <h4 class="testimonial-showcase__name">
                                                    Стоянка Михайлова
                                                </h4>

                                                <p class="testimonial-showcase__location">
                                                    Клиент, Бургас
                                                </p>
                                            </div>

                                        </div>

                                    </div>
                                </li>

                                <li class="splide__slide">
                                    <div class="testimonial-showcase__single">

                                        <div class="testimonial-showcase__quote">
                                            <i class="fa-solid fa-quote-right"></i>
                                        </div>

                                        <p class="testimonial-showcase__text">
                                            Поръчах слънчеви очила с поляризация и съм изключително
                                            доволна от качеството. Бърза изработка, внимателно обслужване
                                            и винаги усмихнат екип, който помни своите клиенти.
                                        </p>

                                        <div class="testimonial-showcase__author">

                                            <div class="testimonial-showcase__author-icon">
                                                <i class="fa-solid fa-user"></i>
                                            </div>

                                            <div class="testimonial-showcase__author-content">
                                                <h4 class="testimonial-showcase__name">
                                                    Мария Тодорова
                                                </h4>

                                                <p class="testimonial-showcase__location">
                                                    Клиент, Равда
                                                </p>
                                            </div>

                                        </div>

                                    </div>
                                </li>

                                <li class="splide__slide">
                                    <div class="testimonial-showcase__single">

                                        <div class="testimonial-showcase__quote">
                                            <i class="fa-solid fa-quote-right"></i>
                                        </div>

                                        <p class="testimonial-showcase__text">
                                            Дъщеря ми получи първите си очила във Valente Optics.
                                            Екипът намери идеалната рамка за нея, прояви огромно търпение
                                            и сега тя обича да ги носи. Благодаря за професионализма!
                                        </p>

                                        <div class="testimonial-showcase__author">

                                            <div class="testimonial-showcase__author-icon">
                                                <i class="fa-solid fa-user"></i>
                                            </div>

                                            <div class="testimonial-showcase__author-content">
                                                <h4 class="testimonial-showcase__name">
                                                    Иван Георгиев
                                                </h4>

                                                <p class="testimonial-showcase__location">
                                                    Доволен родител
                                                </p>
                                            </div>

                                        </div>

                                    </div>
                                </li>

                                <li class="splide__slide">
                                    <div class="testimonial-showcase__single">

                                        <div class="testimonial-showcase__quote">
                                            <i class="fa-solid fa-quote-right"></i>
                                        </div>

                                        <p class="testimonial-showcase__text">
                                            Стъклата с Blue Control защита промениха работата ми пред
                                            компютъра. Никаква умора в очите дори след дълги часове.
                                            Благодаря за съвета и за качествената изработка!
                                        </p>

                                        <div class="testimonial-showcase__author">

                                            <div class="testimonial-showcase__author-icon">
                                                <i class="fa-solid fa-user"></i>
                                            </div>

                                            <div class="testimonial-showcase__author-content">
                                                <h4 class="testimonial-showcase__name">
                                                    Петър Колев
                                                </h4>

                                                <p class="testimonial-showcase__location">
                                                    Редовен клиент
                                                </p>
                                            </div>

                                        </div>

                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="testimonial-showcase__image" role="img"
                    aria-label="Доволен клиент на ReLux TopShopping">

                    <div class="testimonial-showcase__image-content">
                        <div class="testimonial-showcase__image-badge">

                            <i class="fa-solid fa-star"></i>

                            <span>
                                Доверие и професионализъм
                            </span>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Testimonial Two End -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const testimonialSplide = document.getElementById(
                'testimonialSplide'
            );

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
