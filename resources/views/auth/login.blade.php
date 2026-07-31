<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Вход | Оптика Valente</title>

    <meta name="description"
        content="Влезте в своя профил, за да управлявате поръчки, резервации и настройките на акаунта си.">

    <meta name="robots" content="noindex,nofollow">

    <meta property="og:title" content="Вход | Оптика Valente">
    <meta property="og:description"
        content="Влезте в своя профил и продължете оттам, докъдето сте стигнали.">
    <meta property="og:type" content="website">

    {{-- FAVICONS --}}
    <link rel="icon" type="image/png"
        href="/assets/images/favicons/favicon-96x96.png?v=<?php echo time(); ?>"
        sizes="96x96" />

    <link rel="icon" type="image/svg+xml"
        href="/assets/images/favicons/transparent-image.png?v=<?php echo time(); ?>" />

    <link rel="shortcut icon"
        href="/assets/images/favicons/favicon-96x96.png?v=<?php echo time(); ?>" />

    <link rel="apple-touch-icon" sizes="180x180"
        href="/assets/images/favicons/apple-touch-icon.png?v=<?php echo time(); ?>" />

    {{-- CSS --}}
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/custom.css?v=<?php echo time(); ?>" />


</head>

<body>

    <div class="auth log-register-form">
        <div class="auth__container">

            {{-- ЛЯВА ЧАСТ: Форма --}}
            <div class="auth__side auth__side--left">
                <div class="auth__form">

                    <div class="text-center">
                        <div class="auth__logo">
                            <x-logo width="120" />
                        </div>

                        <div class="auth__title">
                            Добре дошли отново!
                        </div>

                        <p class="auth__description">
                            Влезте в профила си и продължете оттам,
                            докъдето сте стигнали.
                        </p>
                    </div>

                    <form action="{{ route('login') }}"
                        method="post">
                        @csrf

                        <div class="auth__field">
                            <label for="formEmail" class="auth__label">
                                Имейл
                            </label>

                            <div class="auth__input-wrapper">
                                <input
                                    type="email"
                                    name="email"
                                    id="formEmail"
                                    class="auth__input"
                                    placeholder="Имейл адрес"
                                    value="{{ old('email') }}"
                                    required>
                            </div>

                            @error('email')
                                <p class="auth__error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="auth__field">
                            <label for="formPassword" class="auth__label">
                                Парола
                            </label>

                            <div class="auth__input-wrapper">
                                <input
                                    type="password"
                                    name="password"
                                    id="formPassword"
                                    class="auth__input auth__input--with-addon"
                                    placeholder="Парола"
                                    required>

                                <button
                                    type="button"
                                    class="auth__input-addon"
                                    data-toggle-password="formPassword">

                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>

                            @error('password')
                                <p class="auth__error">{{ $message }}</p>
                            @enderror
                        </div>

                        @if (Route::has('password.request'))
                            <div class="auth__forgot">
                                <a href="{{ route('password.request') }}" class="auth__link">
                                    Забравена парола?
                                </a>
                            </div>
                        @endif



                        <div class="auth__submit">
                            <button type="submit" class="auth__button">
                                Вход
                            </button>
                        </div>

                        @if (Route::has('register'))
                            <p class="auth__signup">
                                Нямате акаунт?

                                <a href="{{ route('register') }}" class="auth__link">
                                    Регистрирайте се
                                </a>
                            </p>
                        @endif

                    </form>

                </div>
            </div>

            {{-- ДЯСНА ЧАСТ --}}
            <div
                class="auth__side auth__side--right"
                style="
                    background-image:url('{{ asset('/assets/img/slider1-mirora1-1920x634.jpg') }}');
                    background-size:cover;
                    background-position:left;
                ">
            </div>

        </div>
    </div>

</body>
</html>
