<x-frontend>

    @section('SEO')
        <title>За нас | Valente Optic</title>
        <meta name="description"
            content="Valente Optic — семеен бизнес с над 10 години история и над 19 години опит в оптиката. Качествени очила, индивидуално отношение и професионална консултация в Бургас и Равда.">
        <meta name="keywords"
            content="за нас, Valente Optic, семейна оптика, дипломиран оптик, Бургас, Равда, опит в оптиката">
    @endsection



    <!--About Five Start -->
    <section class="about-five pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-five__left">
                        <div class="section-title text-left sec-title-animation animation-style2">
                            <div class="section-title__tagline-box">
                                <span class="section-title__tagline">За нас</span>
                            </div>
                            <h2 class="section-title__title title-animation">
                                Над 20 години професионална грижа за вашето зрение
                            </h2>
                        </div>

                        <p class="about-five__text-1">
                            <strong>Valente Optic</strong> е семеен бизнес с над 20 години опит в сферата на
                            оптиката. Предлагаме <strong>професионални очни прегледи, консултации,
                                компютърна диагностика, изработка и сервиз на очила</strong>, съобразени
                            с индивидуалните нужди на всеки клиент.
                        </p>

                        <p class="about-five__text-1">
                            Можете да ни посетите в нашите оптики в <strong>Бургас</strong> и
                            <strong>Равда</strong>, както и да разгледате и закупите диоптрични рамки,
                            слънчеви очила и други продукти директно от нашия
                            <strong>онлайн магазин</strong>.
                        </p>

                        {{-- <ul class="list-unstyled about-five__points">
                            <li>
                                <div class="icon">
                                    <span class="icon-double-arrow-right"></span>
                                </div>
                                <div class="text">
                                    <p>Над 20 години професионален опит и лично отношение</p>
                                </div>
                            </li>

                            <li>
                                <div class="icon">
                                    <span class="icon-double-arrow-right"></span>
                                </div>
                                <div class="text">
                                    <p>Оптични услуги и индивидуални решения за добро зрение</p>
                                </div>
                            </li>

                            <li>
                                <div class="icon">
                                    <span class="icon-double-arrow-right"></span>
                                </div>
                                <div class="text">
                                    <p>Онлайн магазин за рамки, очила и оптични продукти</p>
                                </div>
                            </li>

                            <li>
                                <div class="icon">
                                    <span class="icon-double-arrow-right"></span>
                                </div>
                                <div class="text">
                                    <p>Физически обекти в Бургас и Равда</p>
                                </div>
                            </li>
                        </ul> --}}
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-five__right">
                        <div class="about-five__img-box">
                            <div class="about-five__img">
                                <img src="/assets/images/about/about-all.jpg" alt="Valente Optic" />
                            </div>

                            <div class="">
                                <div class="about-five__shope-box-bg-shape">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About Five End -->


    <!--Counter One Start -->
    <section class="counter-one counter-three">
        <div class="container">
            <div class="counter-one__inner">
                <ul class="list-unstyled counter-one__list">
                    <li>
                        <div class="counter-one__single">
                            <div class="counter-one__count-box">
                                <h3 class="odometer" data-count="19">20</h3>
                                <span>+</span>
                            </div>
                            <p class="counter-one__text">Години опит</p>
                        </div>
                    </li>
                    <li>
                        <div class="counter-one__single">
                            <div class="counter-one__count-box">
                                <h3 class="odometer" data-count="5">5000</h3>
                                <span>+</span>
                            </div>
                            <p class="counter-one__text">Доволни клиенти</p>
                        </div>
                    </li>
                    <li>
                        <div class="counter-one__single">
                            <div class="counter-one__count-box">
                                <h3 class="odometer" data-count="2">2</h3>
                                <span></span>
                            </div>
                            <p class="counter-one__text">Локации в България</p>
                        </div>
                    </li>
                    <li>
                        <div class="counter-one__single">
                            <div class="counter-one__count-box">
                                <h3 class="odometer" data-count="500">4000</h3>
                                <span>+</span>
                            </div>
                            <p class="counter-one__text">Налични модели</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--Counter One End -->



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
       <!-- Brand Marquee Start -->
    <section class="brand-marquee">
        <div class="brand-marquee__viewport">
            <div class="brand-marquee__track-backwards">

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

    <!--About Maria Start -->
    <section class="about-five pb-5">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-xl-6">
                    <div class="about-five__left">
                        <div class="section-title text-left sec-title-animation animation-style2">
                            <div class="section-title__tagline-box">
                                <span class="section-title__tagline">За собственика</span>
                            </div>

                            <h2 class="section-title__title title-animation">
                                Мария Рашева
                            </h2>
                        </div>

                        <p class="about-five__text-1">
                            <strong>Дипломиран оптик с над 19 години професионален опит.</strong>
                            През годините съм помогнала на хиляди клиенти да открият
                            най-подходящите очила и диоптрични стъкла според своите
                            индивидуални нужди, начин на живот и стил.
                        </p>

                        <p class="about-five__text-1">
                            В работата си вярвам, че доброто зрение започва с
                            <strong>правилната консултация и внимателното отношение</strong>
                            към всеки човек. Затова отделям необходимото време, за да
                            изслушам клиента и да му помогна да избере най-доброто решение
                            за своя комфорт и ежедневие.
                        </p>

                        <p class="about-five__text-1">
                            Днес продължавам да развивам семейния бизнес
                            <strong>Valente Optic</strong>, като съчетавам дългогодишния си
                            опит с модерни решения и индивидуален подход към всеки клиент.
                        </p>

                        <p class="about-five__text-1">
                            За мен най-голямото удовлетворение е доверието на хората,
                            които се връщат отново и отново и ме препоръчват на своите
                            близки и приятели.
                        </p>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div>
                        <div class="about-five__img-box">
                            <div class="about-five__img">
                                <img src="/assets/images/about/about-mariya.jpg"
                                    alt="Мария Рашева – дипломиран оптик и собственик на Valente Optic" />
                            </div>

                            <div>
                                <div class="about-five__shope-box-bg-shape"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About Maria End -->

    <!--Services Two Start -->
    <section class="services-two services-five">
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style1">
                <div class="section-title__tagline-box">
                    <span class="section-title__tagline">Нашите услуги</span>
                </div>
                <h2 class="section-title__title title-animation">
                    Професионална грижа <br />
                    за вашето зрение
                </h2>
            </div>

            <div class="row">
                <!--Services Two Single Start-->
                <div class="col-xl-4 col-lg-4">

                    <div class="services-two__single">
                        <div class="services-two__icon">
                            <i class="fa-solid fa-glasses"></i>
                        </div>

                        <h3 class="services-two__title">
                            <a href="/service/konsultaciy-za-ochila">Консултация за очила</a>
                        </h3>

                        <p class="services-two__text">
                            Индивидуална консултация за избор на рамки и стъкла според вашето зрение, стил и ежедневие.
                        </p>
                    </div>

                    <div class="services-two__single">
                        <div class="services-two__icon">
                            <i class="fa-solid fa-eye"></i>
                        </div>

                        <h3 class="services-two__title">
                            <a href="/service/kompiutarna-diagnostika">Компютърна диагностика</a>
                        </h3>

                        <p class="services-two__text">
                            Прецизно измерване на зрението с модерна апаратура за точно определяне на необходимата
                            корекция.
                        </p>
                    </div>

                </div>
                <!--Services Two Single End-->

                <!--Services Two Single Start-->
                <div class="col-xl-4 col-lg-4">
                    <div class="services-two__img">
                        <img class="rounded-5" src="/assets/images/about/woman-portrait.jpg" alt="Valente Optic екип" />
                    </div>
                </div>
                <!--Services Two Single End-->

                <!--Services Two Single Start-->
                <div class="col-xl-4 col-lg-4">

                    <div class="services-two__single">
                        <div class="services-two__icon">
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                        </div>

                        <h3 class="services-two__title">
                            <a href="/service/izrabotka-ochila">Изработка на очила</a>
                        </h3>

                        <p class="services-two__text">
                            Изработка на очила по индивидуална поръчка с качествени материали и прецизен монтаж.
                        </p>
                    </div>

                    <div class="services-two__single">
                        <div class="services-two__icon">
                            <i class="fa-solid fa-toolbox"></i>
                        </div>

                        <h3 class="services-two__title">
                            <a href="/service/regulirane-serviz-ochila">Регулиране и сервиз</a>
                        </h3>

                        <p class="services-two__text">
                            Настройка, ремонт и профилактика на очила за по-добър комфорт и по-дълъг живот на рамките.
                        </p>
                    </div>

                </div>
                <!--Services Two Single End-->
            </div>
        </div>
    </section>
    <!--Services Two End -->

    <!--Testimonial Two Start -->
    <section class="testimonial-two">
        <div class="testimonial-two__inner">
            {{-- <div class="testimonial-two__shape-1"></div> --}}

            {{-- <div class="testimonial-two__shape-2">
                <img src="/assets/images/shapes/testimonial-two-shape-2.png" alt="" />
            </div>

            <div class="testimonial-two__shape-3">
                <img src="/assets/images/shapes/testimonial-two-shape-3.png" alt="" />
            </div>

            <div class="testimonial-two__shape-4">
                <img src="/assets/images/shapes/testimonial-two-shape-4.png" alt="" />
            </div> --}}

            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="testimonial-two__left">
                            <h3 class="testimonial-two__title">Отзиви от клиенти</h3>

                            <section class="splide testimonial-two__splide" id="testimonialSplide"
                                aria-label="Отзиви от клиенти">
                                <div class="splide__track">
                                    <ul class="splide__list">

                                        <!--Testimonial Two Single Start -->
                                        <li class="splide__slide">
                                            <div class="testimonial-two__single">
                                                <div class="testimonial-two__quote">
                                                    <i class="fal fa-quote-right"></i>
                                                </div>

                                                <div class="testimonial-two__name-box">
                                                    <h4 class="testimonial-two__name">
                                                        <a href="#">Стоянка Михайлова</a>
                                                    </h4>

                                                    <p class="testimonial-two__sub-title">
                                                        Клиент, Бургас
                                                    </p>
                                                </div>

                                                <p class="testimonial-two__text">
                                                    Изключително професионално отношение! Помогнаха ми с избора
                                                    на прогресивни стъкла и сега виждам перфектно както отблизо,
                                                    така и отдалече. Препоръчвам Valente Optic с пълна увереност.
                                                </p>
                                            </div>
                                        </li>
                                        <!--Testimonial Two Single End -->

                                        <!--Testimonial Two Single Start -->
                                        <li class="splide__slide">
                                            <div class="testimonial-two__single">
                                                <div class="testimonial-two__quote">
                                                    <i class="fal fa-quote-right"></i>
                                                </div>

                                                <div class="testimonial-two__name-box">
                                                    <h4 class="testimonial-two__name">
                                                        <a href="#">Мария Тодорова</a>
                                                    </h4>

                                                    <p class="testimonial-two__sub-title">
                                                        Клиент, Равда
                                                    </p>
                                                </div>

                                                <p class="testimonial-two__text">
                                                    Поръчах слънчеви очила с поляризация и съм изключително
                                                    доволна от качеството. Бърза изработка, внимателно обслужване
                                                    и винаги усмихнат екип, който помни своите клиенти.
                                                </p>
                                            </div>
                                        </li>
                                        <!--Testimonial Two Single End -->

                                        <!--Testimonial Two Single Start -->
                                        <li class="splide__slide">
                                            <div class="testimonial-two__single">
                                                <div class="testimonial-two__quote">
                                                    <i class="fal fa-quote-right"></i>
                                                </div>

                                                <div class="testimonial-two__name-box">
                                                    <h4 class="testimonial-two__name">
                                                        <a href="#">Иван Георгиев</a>
                                                    </h4>

                                                    <p class="testimonial-two__sub-title">
                                                        Доволен родител
                                                    </p>
                                                </div>

                                                <p class="testimonial-two__text">
                                                    Дъщеря ми получи първите си очила във Valente Optic.
                                                    Екипът намери идеалната рамка за нея, прояви огромно търпение
                                                    и сега тя обича да ги носи. Благодаря за професионализма!
                                                </p>
                                            </div>
                                        </li>
                                        <!--Testimonial Two Single End -->

                                        <!--Testimonial Two Single Start -->
                                        <li class="splide__slide">
                                            <div class="testimonial-two__single">
                                                <div class="testimonial-two__quote">
                                                    <i class="fal fa-quote-right"></i>
                                                </div>

                                                <div class="testimonial-two__name-box">
                                                    <h4 class="testimonial-two__name">
                                                        <a href="#">Петър Колев</a>
                                                    </h4>

                                                    <p class="testimonial-two__sub-title">
                                                        Редовен клиент
                                                    </p>
                                                </div>

                                                <p class="testimonial-two__text">
                                                    Стъклата с Blue Control защита промениха работата ми пред
                                                    компютъра. Никаква умора в очите дори след дълги часове.
                                                    Благодаря за съвета и за качествената изработка!
                                                </p>
                                            </div>
                                        </li>
                                        <!--Testimonial Two Single End -->

                                    </ul>
                                </div>
                            </section>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <div class="testimonial-two__right">
                            <div class="testimonial-two__img">
                                <img src="/assets/images/testimonial/test-girl.jpg"
                                    alt="Отзиви Valente Optic" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Testimonial Two End -->

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
