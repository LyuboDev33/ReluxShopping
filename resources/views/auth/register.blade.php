<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Регистрация | Оптика Valente</title>

    <meta name="description"
        content="Създайте свой профил в Оптика Valente, за да управлявате поръчки, резервации и настройки на акаунта си.">

    <meta name="robots" content="noindex,nofollow">

    <meta property="og:title" content="Регистрация | Оптика Valente">
    <meta property="og:description"
        content="Създайте своя профил за бързи поръчки и резервации.">
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
                            Създайте профил
                        </div>
                    </div>

                    <form action="{{ route('register') }}" method="post">
                        @csrf

                        {{-- Име --}}
                        <div class="auth__field">
                            <label for="formName" class="auth__label">
                                Име
                            </label>

                            <div class="auth__input-wrapper">
                                <input
                                    type="text"
                                    name="name"
                                    id="formName"
                                    class="auth__input"
                                    placeholder="Вашето име"
                                    value="{{ old('name') }}"
                                    autocomplete="name"
                                    autofocus
                                    required>
                            </div>

                            @error('name')
                                <p class="auth__error">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Имейл --}}
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
                                    autocomplete="username"
                                    required>
                            </div>

                            @error('email')
                                <p class="auth__error">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Парола --}}
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
                                    autocomplete="new-password"
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

                        {{-- Потвърди парола --}}
                        <div class="auth__field">
                            <label for="formPasswordConfirmation" class="auth__label">
                                Потвърдете паролата
                            </label>

                            <div class="auth__input-wrapper">
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    id="formPasswordConfirmation"
                                    class="auth__input auth__input--with-addon"
                                    placeholder="Повторете паролата"
                                    autocomplete="new-password"
                                    required>

                                <button
                                    type="button"
                                    class="auth__input-addon"
                                    data-toggle-password="formPasswordConfirmation">

                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>

                            @error('password_confirmation')
                                <p class="auth__error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="auth__submit">
                            <button type="submit" class="auth__button">
                                Регистрация
                            </button>
                        </div>

                        <p class="auth__signup">
                            Вече имате акаунт?

                            <a href="{{ route('login') }}" class="auth__link">
                                Влезте оттук
                            </a>
                        </p>

                    </form>

                </div>
            </div>

            {{-- ДЯСНА ЧАСТ --}}
            <div
                class="auth__side auth__side--right"
                style="
                    background-image:url('{{ asset('/assets/img/register.jpg') }}');
                    background-size:cover;
                    background-position:top;
                ">
            </div>

        </div>
    </div>

</body>

</html>
