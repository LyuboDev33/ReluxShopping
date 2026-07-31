<ul class="mainmenu">
    <li class="mainmenu__item active menu-item-has-children has-children">
        <a href="/" class="mainmenu__link">
            Home
        </a>

        <ul class="sub-menu">
            <li>
                <a href="/">Home 1</a>
            </li>

            <li>
                <a href="index-2.html">Home 2</a>
            </li>

            <li>
                <a href="index-3.html">Home 3</a>
            </li>

            <li>
                <a href="index-4.html">Home 4</a>
            </li>
        </ul>
    </li>

    <li class="mainmenu__item menu-item-has-children has-children">
        <a href="{{ route('shop.index') }}" class="mainmenu__link">
            Магазин
        </a>

        <ul class="sub-menu">
            <li>
                <a href="{{ route('cart') }}">Количка</a>
            </li>
        </ul>
    </li>

    <li class="mainmenu__item">
        <a href="{{ route('about') }}" class="mainmenu__link">
            За нас
        </a>
    </li>

    <li class="mainmenu__item">
        <a href="{{ route('contact') }}" class="mainmenu__link">
            Контакти
        </a>
    </li>
</ul>
