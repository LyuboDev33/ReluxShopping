<ul class="mainmenu">
    <li class="mainmenu__item">
        <a href="/">
            Начало
        </a>
    </li>

    <li class="mainmenu__item menu-item-has-children has-children">
        <a href="{{ route('shop.index') }}" class="mainmenu__link">
            Магазин
        </a>

        <ul class="sub-menu">
            <li>
                <a href="{{ route('shop.index') }}">Продукти</a>
            
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
