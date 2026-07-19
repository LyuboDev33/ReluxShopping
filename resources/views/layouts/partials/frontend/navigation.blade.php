   <nav class="main-menu main-menu-two">
       <div class="main-menu-two__wrapper">
           <div class="main-menu-two__wrapper-inner container">
               <div class="main-menu-two__left">
                   <div class="main-header-two__logo">
                       <x-logo width="250" mobileWidth="150" />
                   </div>
               </div>
               <div class="main-menu-two__main-menu-box">

                   <ul class="main-menu__list">

                       <li>
                           <a href="/">Начало</a>
                       </li>

                       <li>
                           <a href="/about">За нас</a>
                       </li>

                       <li class="dropdown">
                           <a>Услуги</a>
                           <ul>
                               <li>
                                   <a href="/service/konsultaciy-za-ochila">
                                       Консултация за очила
                                   </a>
                               </li>

                               <li>
                                   <a href="/service/kompiutarna-diagnostika">
                                       Компютърна диагностика
                                   </a>
                               </li>

                               <li>
                                   <a href="/service/izrabotka-ochila">
                                       Изработка на очила
                                   </a>
                               </li>

                               <li>
                                   <a href="/service/regulirane-serviz-ochila">
                                       Регулиране и сервиз на очила
                                   </a>
                               </li>
                           </ul>
                       </li>

                       <li class="dropdown">
                           <a href="/shop">Магазин</a>
                           <ul>
                               <li>
                                   <a href="/shop?category=frames">
                                       Диоптрични рамки
                                   </a>
                               </li>
                               <li>
                                   <a href="/shop?category=sunglasses">
                                       Слънчеви очила
                                   </a>
                               </li>
                               <li>
                                   <a href="/shop?category=men">
                                       Мъжки модели
                                   </a>
                               </li>
                               <li>
                                   <a href="/shop?category=women">
                                       Дамски модели
                                   </a>
                               </li>
                               <li>
                                   <a href="/shop?category=kids">
                                       Детски модели
                                   </a>
                               </li>
                               <li>
                                   <a href="/shop">
                                       Всички продукти
                                   </a>
                               </li>
                           </ul>
                       </li>


                       <li>
                           <a href="/contact">Контакти</a>
                       </li>

                   </ul>


               </div>
               <div class="d-flex gap-2 align-items-center">
                   <a href="{{ route('wishlist') }}" class="cart numb">
                       <img class="heart" src="{{ asset('/assets/images/heart.png') }}" alt="Heart">

                       <span class="wishlist-count">
                           {{ count(session('wishlist', [])) }}
                       </span>

                   </a>
                   <a href="/cart" class="cart numb">
                       <img class="shopping-cart" src="{{ asset('/assets/images/shopping.png') }}" alt="Shopping cart">

                       <span>
                           {{ count(session('products', [])) }}
                       </span>

                   </a>
                   @if (Auth::check())
                       <a href="{{ route('dashboard') }}">Табло</a>
                   @endif
                   <a href="#" class="mobile-nav__toggler">
                       <i class="fa fa-bars"></i>
                   </a>
                   {{-- <div class="main-menu-two__right">
                       <div class="main-menu-two__call-icon">
                           <i class="icon-phone"></i>
                       </div>
                       <div class="main-menu-two__call-content">
                           <h5 class="main-menu-two__call-number">
                               <a href="tel:3598770000027">+359 877 000 027</a>
                           </h5>
                       </div>
                   </div> --}}
               </div>
           </div>
       </div>
   </nav>
