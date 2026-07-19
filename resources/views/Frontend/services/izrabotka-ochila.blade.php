<x-frontend>

    @section('SEO')
        <title>Изработка на диоптрични очила | Valente Optic</title>

        <meta name="description" content="Професионална изработка на диоптрични очила на място. Подбор на рамки и лещи, прецизен монтаж и изработка до 30 минути при налични стъкла.">
        <meta name="keywords" content="изработка на диоптрични очила, диоптрични очила, монтаж на лещи, изрязване на лещи, диоптрични рамки, фотохромни лещи, антирефлексни лещи, оптика, Valente Optic">
        <meta name="author" content="Valente Optic">
        <meta name="robots" content="index, follow">

        <link rel="canonical" href="{{ url()->current() }}">

        <meta property="og:type" content="website">
        <meta property="og:locale" content="bg_BG">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="Изработка на диоптрични очила | Valente Optic">
        <meta property="og:description" content="Изработваме диоптрични очила с модерна техника, висок професионализъм и възможност за изработка до 30 минути при налични лещи.">
        <meta property="og:image" content="{{ asset('/assets/images/seo.png') }}">
        <meta property="og:image:secure_url" content="{{ asset('/assets/images/seo.png') }}">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:site_name" content="Valente Optic">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Изработка на диоптрични очила | Valente Optic">
        <meta name="twitter:description" content="Професионална изработка на диоптрични очила с качествени лещи, прецизен монтаж и обслужване.">
        <meta name="twitter:image" content="{{ asset('/assets/images/seo.png') }}">
    @endsection

    <!--Service Details Start-->
    <section class="service-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="service-details__left">
                        <h3 class="service-details__title-1">
                            Изработка на диоптрични очила
                        </h3>

                        <p class="service-details__text-1">
                            Изработваме вашите диоптрични очила на място в оптиката, с модерна техника и висок
                            професионализъм. Това ни позволява да осигурим бърза, прецизна и качествена
                            изработка, съобразена с индивидуалните нужди на всеки клиент.
                        </p>

                        <div class="service-details__img">
                            <img src="/assets/images/resources/izrabotka1.jpg"
                                alt="Изработка на диоптрични очила">
                        </div>

                        <h3 class="service-details__title-2">
                            Какво включва услугата
                        </h3>

                        <p class="service-details__text-2">
                            Всяка изработка започва с професионално измерване на диоптъра и консултация за
                            най-подходящите рамки и диоптрични лещи според вашите нужди.
                        </p>

                        <p class="service-details__text-3">
                            Работим със специализирана техника за изрязване, монтаж и центриране на лещите,
                            което гарантира прецизност, комфорт и отлично зрение.
                        </p>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="service-details__single">
                                    <div class="service-details__icon-and-title">
                                        <div class="service-details__icon">
                                            <span class="icon-broken-car"></span>
                                        </div>
                                        <h4 class="service-details__single-title">
                                            Прецизна изработка
                                        </h4>
                                    </div>
                                    <p>
                                        Изрязване, монтаж и центриране на лещите с професионална техника.
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
                                            Индивидуален подбор
                                        </h4>
                                    </div>
                                    <p>
                                        Избор на рамки и диоптрични лещи според начина ви на живот и зрението.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <p class="service-details__text-4">
                            При налични лещи можем да изработим вашите нови диоптрични очила само за 30 минути.
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
                                <img src="/assets/images/resources/izrabotka2.jpg"
                                    alt="Изработка на очила">
                            </div>

                            <h3 class="service-details__bottom-title">
                                Изработка до 30 минути
                            </h3>

                            <p class="service-details__bottom-text">
                                Когато диоптърът позволява и разполагаме с необходимите лещи на склад,
                                можем да изработим вашите диоптрични очила само за 30 минути.
                                Това е идеалното решение при спешни случаи или необходимост от нов чифт очила.
                            </p>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="service-details__bottom-right">
                            <div class="service-details__bottom-points-box">
                                <ul class="service-details__bottom-points list-unstyled">
                                    <li>
                                        <div class="icon"><span class="icon-double-arrow-right"></span></div>
                                        <p>Професионално измерване на диоптъра</p>
                                    </li>

                                    <li>
                                        <div class="icon"><span class="icon-double-arrow-right"></span></div>
                                        <p>Избор на рамка според лицето и стила</p>
                                    </li>

                                    <li>
                                        <div class="icon"><span class="icon-double-arrow-right"></span></div>
                                        <p>Подбор на стандартни, изтънени и фотохромни лещи</p>
                                    </li>

                                    <li>
                                        <div class="icon"><span class="icon-double-arrow-right"></span></div>
                                        <p>Прецизно изрязване и монтаж на лещите</p>
                                    </li>
                                </ul>

                                <ul class="service-details__bottom-points list-unstyled">
                                    <li>
                                        <div class="icon"><span class="icon-double-arrow-right"></span></div>
                                        <p>Идеално за клиенти с натоварен график</p>
                                    </li>

                                    <li>
                                        <div class="icon"><span class="icon-double-arrow-right"></span></div>
                                        <p>Подходящо при спешни ситуации</p>
                                    </li>

                                    <li>
                                        <div class="icon"><span class="icon-double-arrow-right"></span></div>
                                        <p>При счупени или изгубени очила</p>
                                    </li>

                                    <li>
                                        <div class="icon"><span class="icon-double-arrow-right"></span></div>
                                        <p>Изработка на резервен чифт очила</p>
                                    </li>
                                </ul>
                            </div>

                            <div class="service-details__bottom-img-two">
                                <img src="/assets/images/resources/izrabotka3.jpg"
                                    alt="Диоптрични очила">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</x-frontend>
