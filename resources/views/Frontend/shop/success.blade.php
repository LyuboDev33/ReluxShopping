<x-frontend>

    @section('SEO')
        <title>Успешна поръчка</title>
    @endsection

    <!-- Success Checkout Start -->
    <section class="contact-four">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-xl-6">
                    <div class="contact-four__left">

                        <div class="section-title text-left sec-title-animation animation-style2">
                            <div class="section-title__tagline-box">
                                <span class="section-title__tagline">
                                    Поръчката е приета
                                </span>
                            </div>

                            <h3 class="">
                                🎉 Поръчката е приета! <br>
                                Вашата поръчка беше изпратена успешно.
                            </h3>
                        </div>

                        <p class="contact-four__text mb-3">
                            Благодарим Ви, че избрахте <strong>Valente Optic</strong>.
                            Получихме Вашата поръчка и вече започваме нейната обработка.
                        </p>

                        <p class="contact-four__text mb-3">
                            До няколко минути ще получите <strong>имейл с потвърждение</strong>,
                            съдържащ информация за направената поръчка. Ако не откриете писмото,
                            моля проверете папките <strong>Spam</strong> или <strong>Promotions</strong>.
                        </p>

                        <p class="contact-four__text">
                            Наш служител ще се свърже с Вас по телефона, за да потвърди
                            поръчката и да уточни детайлите по доставката.
                        </p>

                        <div class="mt-4 d-flex flex-wrap gap-3">
                            <a href="{{ route('shop.index') }}" class="thm-btn">
                                Продължи с пазаруването
                            </a>

                            <a href="{{ route('contact') }}" class="thm-btn">
                                Свържи се с нас
                            </a>
                        </div>

                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="contact-four__right text-center">
                        <img
                            src="/assets/images/succes-checkout.png"
                            alt="Поръчката е успешна"
                            class="img-fluid"
                        >
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Success Checkout End -->

</x-frontend>
