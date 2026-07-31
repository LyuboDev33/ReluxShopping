<header class="dashboard-header">
    <div class="dashboard-header__wrapper">

        <div class="dashboard-header__left">
            <button type="button" class="dashboard-header__sidebar-toggle" data-sidebar-toggle aria-label="Меню">
             <i class="fa-solid fa-bars"></i>
            </button>

        </div>

        <div class="dashboard-header__right">

            <div class="dashboard-dropdown">
                <a href="#" class="dashboard-dropdown__toggle" data-dropdown-toggle>
                    <span class="dashboard-dropdown__avatar">
                        <img src="{{ Auth::user()->profile_pic ?? '/assets/img/avatar-default.webp' }}"
                             alt="{{ Auth::user()->name }}" />
                    </span>
                    <span class="dashboard-dropdown__name">
                        {{ Auth::user()->name }}
                    </span>
                    <i class="fa fa-chevron-down dashboard-dropdown__caret"></i>
                </a>

                <div class="dashboard-dropdown__menu">
                    <ul>
                        <li>
                            <a href="{{ route('profile.edit') }}">
                                <i class="fa fa-user"></i>
                                Профил
                            </a>
                        </li>
                        <li class="dashboard-dropdown__divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dashboard-dropdown__logout">
                                    <i class="fa fa-share-square"></i>
                                    Изход
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</header>
