<x-frontend>

  @section('SEO')
    <title>Компютърна диагностика на зрението | Valente Optics</title>

    <meta name="description" content="Компютърна диагностика на зрението с професионален авторефрактометър. Бързо ориентировъчно измерване на диоптър, астигматизъм, късогледство и далекогледство.">
    <meta name="keywords" content="компютърна диагностика на зрението, измерване на диоптър, авторефрактометър, проверка на зрението, диоптър, астигматизъм, късогледство, далекогледство, оптика">
    <meta name="author" content="Valente Optics">
    <meta name="robots" content="index, follow">

    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:type" content="website">
    <meta property="og:locale" content="bg_BG">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Компютърна диагностика на зрението | Valente Optics">
    <meta property="og:description" content="Бързо и прецизно ориентировъчно измерване на диоптър чрез професионален авторефрактометър. Подходящо преди изработка или корекция на очила.">
    <meta property="og:image" content="{{ asset('/assets/images/seo.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('/assets/images/seo.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="Valente Optics">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Компютърна диагностика на зрението | Valente Optics">
    <meta name="twitter:description" content="Ориентировъчна проверка на зрението и измерване на диоптър с авторефрактометър във Valente Optics.">
    <meta name="twitter:image" content="{{ asset('/assets/images/seo.png') }}">
@endsection

    <!--Service Details Start-->
    <section class="service-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="service-details__left">
                        <h3 class="service-details__title-1">
                            Компютърна диагностика на зрението
                        </h3>

                        <p class="service-details__text-1">
                            Компютърната диагностика е бърз и прецизен метод за определяне на ориентировъчния
                            диоптър. Тя се извършва със специализиран уред – авторефрактометър, който анализира
                            как окото пречупва светлината и изчислява приблизителните стойности на диоптрите.
                        </p>

                        <div class="service-details__img">
                            <img src="/assets/images/resources/diagnostics1.jpg"
                                alt="Компютърна диагностика на зрението" />
                        </div>

                        <h3 class="service-details__title-2">
                            За кого е подходяща услугата
                        </h3>

                        <p class="service-details__text-2">
                            Услугата е идеална за клиенти, които желаят да проверят дали има промяна в зрението им
                            или да получат базова информация преди изработка на нови очила.
                        </p>

                        <p class="service-details__text-3">
                            Компютърната диагностика предоставя надеждна отправна точка при избора на подходящи
                            диоптрични стъкла и спестява време при последваща изработка на очила.
                        </p>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="service-details__single">
                                    <div class="service-details__icon-and-title">
                                        <div class="service-details__icon">
                                            <span class="icon-broken-car"></span>
                                        </div>
                                        <h4 class="service-details__single-title">
                                            Прецизно измерване
                                        </h4>
                                    </div>
                                    <p>
                                        Измерване на диоптъра чрез професионален авторефрактометър.
                                    </p>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="service-details__single">
                                    <div class="service-details__icon-and-title">
                                        <div class="service-details__icon">
                                            <span class="icon-wheel-2"></span>
                                        </div>
                                        <h4 class="service-details__single-title">
                                            Ориентировъчни резултати
                                        </h4>
                                    </div>
                                    <p>
                                        Определяне на приблизителни стойности за късогледство,
                                        далекогледство и астигматизъм.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <p class="service-details__text-4">
                            Получените резултати служат като ориентир при изработка или корекция на очила,
                            но не представляват медицинска диагноза.
                        </p>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-5">
                    @include('Frontend.services.components.service-right')
                </div>
            </div>

            <div class="service-details__bottom">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="service-details__bottom-left">
                            <div class="service-details__bottom-img">
                                <img src="/assets/images/resources/dignostics2.jpg"
                                    alt="Компютърна диагностика" />
                            </div>

                            <h3 class="service-details__bottom-title">
                                Какво НЕ представлява услугата
                            </h3>

                            <p class="service-details__bottom-text">
                                Компютърната диагностика е техническо измерване на зрението. Тя не е медицински
                                очен преглед, не поставя диагнози и не заменя консултацията с офталмолог.
                                Резултатите служат като ориентир при изработка или корекция на очила.
                            </p>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="service-details__bottom-right">
                            <div class="service-details__bottom-points-box">
                                <ul class="service-details__bottom-points list-unstyled">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-double-arrow-right"></span>
                                        </div>
                                        <p>Измерване чрез професионален авторефрактометър</p>
                                    </li>

                                    <li>
                                        <div class="icon">
                                            <span class="icon-double-arrow-right"></span>
                                        </div>
                                        <p>Ориентировъчни стойности за късогледство</p>
                                    </li>

                                    <li>
                                        <div class="icon">
                                            <span class="icon-double-arrow-right"></span>
                                        </div>
                                        <p>Ориентировъчни стойности за далекогледство</p>
                                    </li>

                                    <li>
                                        <div class="icon">
                                            <span class="icon-double-arrow-right"></span>
                                        </div>
                                        <p>Ориентировъчни стойности за астигматизъм</p>
                                    </li>
                                </ul>

                                <ul class="service-details__bottom-points list-unstyled">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-double-arrow-right"></span>
                                        </div>
                                        <p>Дава бърза представа за промяна в зрението</p>
                                    </li>

                                    <li>
                                        <div class="icon">
                                            <span class="icon-double-arrow-right"></span>
                                        </div>
                                        <p>Улеснява избора на подходящи лещи</p>
                                    </li>

                                    <li>
                                        <div class="icon">
                                            <span class="icon-double-arrow-right"></span>
                                        </div>
                                        <p>Спестява време при поръчка на нови очила</p>
                                    </li>

                                    <li>
                                        <div class="icon">
                                            <span class="icon-double-arrow-right"></span>
                                        </div>
                                        <p>Подходяща за първоначална проверка на зрението</p>
                                    </li>
                                </ul>
                            </div>

                            <div class="service-details__bottom-img-two">
                                <img src="/assets/images/resources/dignostics3.jpg"
                                    alt="Авторефрактометър" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--Service Details End-->

</x-frontend>

