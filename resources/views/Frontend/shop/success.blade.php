<x-frontend>

    @section('SEO')
        <title>Успешна поръчка | ReLux TopShopping</title>

        <meta name="description"
            content="Вашата поръчка в ReLux TopShopping беше приета успешно. Очаквайте имейл за потвърждение и обаждане от нашия екип за уточняване на доставката.">

        <meta name="robots" content="noindex, nofollow">
    @endsection

    <!-- Success Checkout Start -->
    <section class="about-five relux-about-section">
        <div class="container">

            <div class="row align-items-stretch relux-about-section__row">

                <div class="col-xl-6 col-lg-6">
                    <div class="about-five__left relux-about-section__content">

                        <div class="section-title text-left sec-title-animation animation-style2">

                            <div class="section-title__tagline-box">
                                <span class="section-title__tagline">
                                    Поръчката е приета
                                </span>
                            </div>

                            <h1 class="section-title__title title-animation">
                                Вашата поръчка беше направена успешно
                            </h1>

                        </div>

                        <ul class="list-unstyled relux-about-points">

                            <li>
                                <div class="icon">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div>

                                <div class="text">
                                    <p>
                                        <b>Благодарим ви за поръчката</b>

                                        Благодарим ви, че избрахте
                                        <strong>ReLux TopShopping</strong>.
                                        Получихме вашата поръчка и вече започваме
                                        нейната обработка.
                                    </p>
                                </div>
                            </li>

                            <li>
                                <div class="icon">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>

                                <div class="text">
                                    <p>
                                        <b>Очаквайте имейл за потвърждение</b>

                                        До няколко минути ще получите имейл,
                                        съдържащ информация за направената поръчка.
                                        Ако не откриете писмото, проверете папките
                                        <strong>Spam</strong> или
                                        <strong>Promotions</strong>.
                                    </p>
                                </div>
                            </li>

                            <li>
                                <div class="icon">
                                    <i class="fa-solid fa-phone"></i>
                                </div>

                                <div class="text">
                                    <p>
                                        <b>Ще се свържем с вас</b>

                                        Наш служител ще се свърже с вас по телефона,
                                        за да потвърди поръчката и да уточни
                                        детайлите по доставката.
                                    </p>
                                </div>
                            </li>

                        </ul>

                        <div class="mt-4 d-flex flex-wrap gap-3">

                            <a href="{{ route('shop.index') }}"
                                class="relux-shop-btn relux-shop-btn--primary">

                                <i class="fa-solid fa-bag-shopping me-2"></i>

                                Продължи с пазаруването
                            </a>

                            <a href="{{ route('contact') }}"
                                class="relux-shop-btn relux-shop-btn--secondary">

                                <i class="fa-solid fa-headset me-2"></i>

                                Свържи се с нас
                            </a>

                        </div>

                    </div>
                </div>

                <div class="col-xl-6 col-lg-6">
                    <div class="relux-about-section__image-column">

                        <div class="relux-about-section__image-box">
                            <img src="/assets/img/checkout.jpg"
                                alt="Поръчката в ReLux TopShopping е успешна">
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- Success Checkout End -->

</x-frontend>
