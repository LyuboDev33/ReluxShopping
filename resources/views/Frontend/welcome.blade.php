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
                            Погледни света
                        </p>

                        <h2 class="main-slider-two__title main-slider-two__title-custom">
                            ПО СВОЙ НАЧИН
                        </h2>

                        <div class="main-slider-two__divider-custom">
                            <span></span>
                            <i class="fa-regular fa-heart"></i>
                            <span></span>
                        </div>

                        <p class="main-slider-two__text main-slider-two__text-custom">
                            Стилни очила за всеки твой момент.<br>
                            Защото красотата е в детайлите.
                        </p>

                        <div class="main-slider-two__btn">
                            <a href="{{ route('shop.index') }}" class="main-slider-two__btn-custom rounded-pill">
                                Разгледай колекцията
                            </a>
                        </div>

                        <div class="main-slider-two__img-box">
                            <div class="">
                                <img src="/assets/images/couple.png"
                                    alt="Valente Optic — главна снимка">
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Black Services Strip -->
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
                                        Избор на рамка и лещи според вашите нужди.
                                    </p>
                                </div>
                            </div>

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
                                        Бързо измерване на ориентировъчен диоптър.
                                    </p>
                                </div>
                            </div>

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
                                        Прецизна изработка и монтаж на диоптрични очила.
                                    </p>
                                </div>
                            </div>

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
                                        Регулиране, почистване и обслужване на очила.
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>
                <!-- End Black Services Strip -->

            </div>
        </div>
    </div>
</section>
    <!-- Main Slider Two End -->



    <!-- Main Slider Two Start -->
    {{-- <section class="main-slider-two">
        <div class="main-slider-two__wrap">
            <div class="main-slider-two__carousel owl-carousel owl-theme">
                <div class="item">
                    <div class="container">
                        <div class="main-slider-two__content">
                            <h2 class="main-slider-two__title">
                                Качествени очила <br />
                                за вашето зрение <br />
                                с грижа от 2014
                            </h2>
                            <p class="main-slider-two__text">
                                Над 19 години опит в оптиката, индивидуален подход <br />
                                и внимателно подбрани диоптрични рамки, слънчеви очила и стъкла
                            </p>
                            <div class="main-slider-two__btn">
                                <a href="{{ route('contact') }}" class="thm-btn">
                                    Запази час<span class="icon-arrow-up-right"></span>
                                </a>
                            </div>
                            <div class="main-slider-two__img-box">
                                <div class="main-slider-two__img">
                                    <img src="/assets/images/resources/main-slider-two-img-1.png" alt="Valente Optic — главна снимка" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--Main Slider Two End -->



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

    <!--About Four Start -->
    <section class="about-four">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 ">
                    <div class="about-four__left">
                        <div class="about-four__img">
                            <img src="/assets/images/resources/about-four-img-1.jpg" alt="За Valente Optic" />
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-four__right">
                        <div class="section-title-two text-left sec-title-animation animation-style1">
                            <div class="section-title-two__tagline-box">
                                <span class="section-title-two__tagline">За нас</span>
                                <div class="section-title-two__tagline-shape-1"></div>
                            </div>
                            <h2 class="section-title-two__title title-animation">
                                Семеен бизнес с над 10 години история и индивидуално отношение
                            </h2>
                        </div>
                        <p class="about-four__text">
                            Valente Optic е семеен бизнес, създаден с желание да предложи качествени очила,
                            професионално обслужване и индивидуално отношение към всеки клиент. Зад нас стои
                            дългогодишен опит — повече от 19 години в оптиката.
                        </p>
                        <div class="about-four__points-box">
                            <ul class="list-unstyled about-four__points">
                                <li>
                                    <div class="about-four__points-count"></div>
                                    <div class="about-four__points-content">
                                        <h4><a href="#">Дипломиран оптик</a></h4>
                                        <p>
                                            Над 19 години опит <br />
                                            в избора на правилното решение
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="about-four__points-count"></div>
                                    <div class="about-four__points-content">
                                        <h4>
                                            <a href="#">Два обекта — Бургас и Равда</a>
                                        </h4>
                                        <p>
                                            Обслужваме клиенти и онлайн <br />
                                            в цяла България
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About Four End -->

    <!--CTA One Start -->
    <section class="cta-one">
        <div class="cta-one__bg jarallax" data-jarallax data-speed="0.05" data-imgPosition="50% 0%"
            style="background-image: url(assets/images/backgrounds/cta-one-bg.jpg);">
        </div>
        <div class="container">
            <div class="cta-one__inner">
                <h3 class="cta-one__title">
                    Запази час за безплатна консултация <br />
                    Свържи се с <a href="#">нашия екип</a>
                </h3>
                <div class="cta-one__btn-and-video-link">
                    <div class="cta-one__btn">
                        <a href="#" class="thm-btn">
                            Свържи се<span class="icon-arrow-up-right"></span>
                        </a>
                    </div>
                    <div class="cta-one__video-link">
                        <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                            <div class="cta-one__video-icon">
                                <span class="icon-video"></span>
                                <i class="ripple"></i>
                            </div>
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
                            <a href="#">Дългогодишен <br />опит</a>
                        </h2>
                    </div>
                    <div class="feature-one__content-box">
                        <p class="feature-one__text">
                            Над 19 години работа в оптиката ни дава увереността да предложим <br />
                            най-подходящото решение за всеки клиент. Помогнали сме на хиляди <br />
                            хора да видят света по-ясно.
                        </p>
                        <div class="feature-one__arrow">
                            <a href="#"><span class="icon-arrow-up-right"></span></a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="feature-one__title-box">
                        <h2 class="feature-one__title">
                            <a href="#">Индивидуален <br />подход</a>
                        </h2>
                    </div>
                    <div class="feature-one__content-box">
                        <p class="feature-one__text">
                            Изборът на очила е нещо лично. Отделяме време за консултация и <br />
                            всеки клиент получава решение, съобразено с неговите нужди — не <br />
                            просто продукт, а истинска грижа.
                        </p>
                        <div class="feature-one__arrow">
                            <a href="#"><span class="icon-arrow-up-right"></span></a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="feature-one__title-box">
                        <h2 class="feature-one__title">
                            <a href="#">Качествени <br />материали</a>
                        </h2>
                    </div>
                    <div class="feature-one__content-box">
                        <p class="feature-one__text">
                            Работим с утвърдени световни марки и внимателно подбрани <br />
                            бюджетни модели. Стъкла с Blue Control защита, прогресивни, <br />
                            фотосоларни — за всеки вкус и бюджет.
                        </p>
                        <div class="feature-one__arrow">
                            <a href="#"><span class="icon-arrow-up-right"></span></a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="feature-one__title-box">
                        <h2 class="feature-one__title">
                            <a href="#">Онлайн <br />консултации</a>
                        </h2>
                    </div>
                    <div class="feature-one__content-box">
                        <p class="feature-one__text">
                            За клиенти от цяла България предлагаме съдействие при избор на <br />
                            рамки и очила чрез снимки, видеоразговори и онлайн комуникация. <br />
                            Доставяме до дома ви.
                        </p>
                        <div class="feature-one__arrow">
                            <a href="#"><span class="icon-arrow-up-right"></span></a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!--Feature One End -->

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
                                    <img src="/assets/images/gallery/gallery-4-1.jpg" alt="Диоптрични рамки" />
                                </div>
                                <div class="gallery-four__content">
                                    <div class="gallery-four__title-box">
                                        <h3>
                                            <a href="#">Диоптрични рамки</a>
                                        </h3>
                                        <p>Колекция 2024</p>
                                    </div>
                                    <div class="gallery-four__arrow">
                                        <a href="/assets/images/gallery/gallery-4-1.jpg" class="img-popup">
                                            <span class="icon-arrow-right-three"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery-four__img-box">
                                <div class="gallery-four__img">
                                    <img src="/assets/images/gallery/gallery-4-2.jpg" alt="Слънчеви очила" />
                                </div>
                                <div class="gallery-four__content">
                                    <div class="gallery-four__title-box">
                                        <h3>
                                            <a href="#">Слънчеви очила</a>
                                        </h3>
                                        <p>UV защита</p>
                                    </div>
                                    <div class="gallery-four__arrow">
                                        <a href="/assets/images/gallery/gallery-4-2.jpg" class="img-popup">
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
                                    <img src="/assets/images/gallery/gallery-4-3.jpg" alt="Прогресивни стъкла" />
                                </div>
                                <div class="gallery-four__content">
                                    <div class="gallery-four__title-box">
                                        <h3>
                                            <a href="#">Прогресивни стъкла</a>
                                        </h3>
                                        <p>За далеч и близо</p>
                                    </div>
                                    <div class="gallery-four__arrow">
                                        <a href="/assets/images/gallery/gallery-4-3.jpg" class="img-popup">
                                            <span class="icon-arrow-right-three"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery-four__img-box">
                                <div class="gallery-four__img">
                                    <img src="/assets/images/gallery/gallery-4-4.jpg" alt="Детски очила" />
                                </div>
                                <div class="gallery-four__content">
                                    <div class="gallery-four__title-box">
                                        <h3>
                                            <a href="#">Детски очила</a>
                                        </h3>
                                        <p>Грижа за малките</p>
                                    </div>
                                    <div class="gallery-four__arrow">
                                        <a href="/assets/images/gallery/gallery-4-4.jpg" class="img-popup">
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



    <!--Testimonial Four Start -->
    <section class="testimonial-four">
        <div class="container">
            <div class="testimonial-four__inner">
                <div class="testimonial-four__big-img">
                    <img src="/assets/images/testimonial/testimonial-four-big-img.png" alt="Отзиви от клиенти" />
                </div>
                <div class="testimonial-four__top">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="testimonial-four__carousel owl-theme owl-carousel">
                                <div class="item">
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
                                            Препоръчвам Valente Optic на всеки, който търси качество и истинска грижа.
                                        </p>
                                        <div class="testimonial-four__client-info">
                                            <div class="testimonial-four__client-img">
                                                <img src="/assets/images/testimonial/testimonial-4-1.jpg"
                                                    alt="Стоянка Михайлова" />
                                            </div>
                                            <h3 class="testimonial-four__client-name">
                                                <a href="#">Стоянка Михайлова</a>
                                            </h3>
                                            <p class="testimonial-four__client-sub-title">
                                                Доволен клиент, Бургас
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
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
                                            <div class="testimonial-four__client-img">
                                                <img src="/assets/images/testimonial/testimonial-4-2.jpg"
                                                    alt="Мария Тодорова" />
                                            </div>
                                            <h3 class="testimonial-four__client-name">
                                                <a href="#">Мария Тодорова</a>
                                            </h3>
                                            <p class="testimonial-four__client-sub-title">
                                                Доволен клиент, Равда
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
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
                                            <div class="testimonial-four__client-img">
                                                <img src="/assets/images/testimonial/testimonial-4-3.jpg"
                                                    alt="Иван Георгиев" />
                                            </div>
                                            <h3 class="testimonial-four__client-name">
                                                <a href="#">Иван Георгиев</a>
                                            </h3>
                                            <p class="testimonial-four__client-sub-title">
                                                Доволен родител
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Testimonial Four End -->


</x-frontend>
