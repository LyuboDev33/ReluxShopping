<aside class="dashboard-sidebar bg-white">

    <div class="dashboard-sidebar__header">
        <a href="{{ route('dashboard') }}" class="dashboard-sidebar__logo">
            <x-logo width="100" />
        </a>

        <button type="button" class="dashboard-sidebar__close" data-sidebar-close aria-label="Затвори">
            <i class="fa fa-times"></i>
        </button>
    </div>

    <nav class="dashboard-sidebar__nav">
        <ul>
            <li>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'is-active' : '' }}">
                    <i class="fa fa-home"></i>
                    <span>Табло за управление</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.orders.index') }}"
                class="{{ request()->routeIs('admin.orders.index') ||
                          request()->routeIs('admin.orders.show') ? 'is-active' : '' }}">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <span>Поръчки</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.category.index') }}"
                    class="{{ request()->routeIs('admin.category.index') ? 'is-active' : '' }}">
                  <i class="fa-solid fa-boxes-stacked"></i>
                    <span>Категории</span>
                </a>
            </li>


            <li>
                <a href="{{ route('admin.attributes.index') }}"
                    class="{{ request()->routeIs('admin.attributes.index') ? 'is-active' : '' }}">
                 <i class="fa-solid fa-boxes-packing"></i>
                    <span>Продуктови Атрибути</span>
                </a>
            </li>




            <li>
                <a href="{{ route('admin.products.index') }}"
                    class="{{ request()->routeIs('admin.products.index') ||
                            request()->routeIs('admin.products.create') ||
                            request()->routeIs('admin.products.show') ? 'is-active' : '' }}">
                    <i class="fa-solid fa-dolly"></i>
                    <span>Продукти</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.promocodes.index') }}"
                    class="{{ request()->routeIs('admin.promocodes.index') ? 'is-active' : '' }}">
                 <i class="fa-solid fa-percent"></i>
                    <span>Промо кодове</span>
                </a>
            </li>


            <li>
                <a href="{{ route('profile.edit') }}"
                    class="{{ request()->routeIs('profile.*') ? 'is-active' : '' }}">
                    <i class="fa fa-user"></i>
                    <span>Профил</span>
                </a>
            </li>
        </ul>
    </nav>

</aside>
