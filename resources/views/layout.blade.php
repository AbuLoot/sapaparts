<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <title>@yield('meta_title', 'SapaParts')</title>
  <meta name="description" content="@yield('meta_description', 'SapaParts')">
  <link rel="icon" type="image/png" href="/img/favicon.png">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">

  <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/vendor/owl-carousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="/vendor/photoswipe/photoswipe.css">
  <link rel="stylesheet" href="/vendor/photoswipe/default-skin/default-skin.css">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/custom.css">
  <link rel="stylesheet" href="/vendor/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="/fonts/stroyka/stroyka.css">
  @yield('head')
</head>
<body>
  <div class="site">
    <?php
      $data_address = unserialize($contacts->data_1);
      $data_phones = unserialize($contacts->data_2);
      $data_email = unserialize($contacts->data_3);
      $phones = explode('/', $data_phones['value']);

      $items = session('items');
      $favorite = session('favorite');
    ?>
    <!-- Mobile header -->
    <header class="site__header d-lg-none">
      <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
      <div class="mobile-header mobile-header--sticky" data-sticky-mode="alwaysOnTop">
        <div class="mobile-header__panel">
          <div class="container">
            <div class="mobile-header__body">
              <button class="mobile-header__menu-button">
                <svg width="18px" height="14px"><use xlink:href="/img/sprite.svg#menu-18x14"></use></svg>
              </button>
              <a class="mobile-header__logo" href="/">
                <img src="/img/logo-mobile.png">
              </a>
              <div class="search search--location--mobile-header mobile-header__search">
                <div class="search__body">
                  <form action="/search" method="get" class="search__form">
                    <input class="search__input" name="text" placeholder="Поиск запчастей..." aria-label="Поиск по сайту" type="search" autocomplete="off">
                    <button class="search__button search__button--type--submit" type="submit">
                      <svg width="20px" height="20px"><use xlink:href="/img/sprite.svg#search-20"></use></svg>
                    </button>
                    <button class="search__button search__button--type--close" type="button">
                      <svg width="20px" height="20px"><use xlink:href="/img/sprite.svg#cross-20"></use></svg>
                    </button>
                    <div class="search__border"></div>
                  </form>
                  <div class="search__suggestions suggestions suggestions--location--mobile-header"></div>
                </div>
              </div>
              <div class="mobile-header__indicators">
                <div class="indicator indicator--mobile d-sm-flex d-none">
                  <a href="/favorite" class="indicator__button">
                    <span class="indicator__area">
                      <svg width="20px" height="20px"><use xlink:href="/img/sprite.svg#heart-20"></use></svg>
                      <span class="indicator__value" id="count-favorite-">{{ (is_array($favorite)) ? count($favorite['products_id']) : 0 }}</span>
                    </span>
                  </a>
                </div>
                <div class="indicator indicator--mobile-search indicator--mobile d-md-none">
                  <button class="indicator__button">
                    <span class="indicator__area"><svg width="20px" height="20px"><use xlink:href="/img/sprite.svg#search-20"></use></svg></span>
                  </button>
                </div>
                <div class="indicator indicator--mobile">
                  <a href="/cart" class="indicator__button">
                    <span class="indicator__area">
                      <svg width="20px" height="20px"><use xlink:href="/img/sprite.svg#cart-20"></use></svg>
                      <span class="indicator__value" id="count-items-">{{ (is_array($items)) ? count($items['products_id']) : 0 }}</span>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          @yield('btn-filter')
        </div>
      </div>
    </header>

    <!-- Desktop header -->
    <header class="site__header d-lg-block d-none">
      <div class="site-header">
        <div class="site-header__topbar topbar">
          <div class="topbar__container container">
            <div class="topbar__row">
              @foreach($pages as $page)
                <div class="topbar__item topbar__item--link">
                  <a class="topbar-link" href="/i/{{ $page->slug }}">{{ $page->title }}</a>
                </div>
              @endforeach
              <div class="topbar__spring"></div>
              <div class="topbar__item">
                @guest
                  <a href="/cs-login">Войти</a>
                @else
                  <div class="topbar-dropdown">
                    <button class="topbar-dropdown__btn" type="button">
                      {{ Auth::user()->name }}
                      <svg width="7px" height="5px"><use xlink:href="/img/sprite.svg#arrow-rounded-down-7x5"></use></svg>
                    </button>
                    <div class="topbar-dropdown__body">
                      <div class="menu menu--layout--topbar ">
                        <div class="menu__submenus-container"></div>
                        <ul class="menu__list">
                          <li class="menu__item">
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="/profile">Моя страница</a>
                          </li>
                          <li class="menu__item">
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="/orders">История заказов</a>
                          </li>
                          <li class="menu__item">
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Выйти') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                            </form>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                @endguest
              </div>
            </div>
          </div>
        </div>

        <div class="site-header__middle container">
          <div class="site-header__logo">
            <a href="/">
              <img src="/img/logo.png">
            </a>
          </div>
          <div class="site-header__search">
            <div class="search search--location--header ">
              <div class="search__body">
                <form action="/search" method="get" class="search__form">
                  <input class="search__input" name="text" placeholder="Поиск запчастей..." aria-label="Site search" type="text" autocomplete="off">
                  <button class="search__button search__button--type--submit" type="submit">
                    <svg width="20px" height="20px"><use xlink:href="/img/sprite.svg#search-20"></use></svg>
                  </button>
                  <div class="search__border"></div>
                </form>
                <div class="search__suggestions suggestions suggestions--location--header"></div>
              </div>
            </div>
          </div>
          <div class="site-header__phone">
            <!-- <div class="site-header__phone-title">Рабочий телефон</div> -->
            <div class="site-header__phone-number">
              @foreach($phones as $phone)
                <a href="tel:{{ $phone }}"><i class="fa fa-phone"></i> {{ $phone }}</a>
              @endforeach
            </div>
          </div>
        </div>

        <div class="site-header__nav-panel">
          <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
          <div class="nav-panel nav-panel--sticky" data-sticky-mode="alwaysOnTop">
            <div class="nav-panel__container container">
              <div class="nav-panel__row">
                
                <!-- .departments -->

                <!-- .nav-links -->
                <div class="nav-panel__nav-links nav-links">
                  <ul class="nav-links__list">
                    <?php $traverse = function ($categories, $parent_slug = NULL) use (&$traverse) { ?>
                      <?php foreach ($categories as $category) : ?>
                        <?php if ($category->isRoot() && $category->descendants->count() > 0) : ?>
                          <li class="nav-links__item  nav-links__item--has-submenu ">
                            <a class="nav-links__item-link" href="/c/{{ $category->slug .'/'. $category->id }}">
                              <div class="nav-links__item-body">
                                <b>{{ $category->title }}</b> <svg class="nav-links__item-arrow" width="9px" height="6px"><use xlink:href="/img/sprite.svg#arrow-rounded-down-9x6"></use></svg>
                              </div>
                            </a>
                            <div class="nav-links__submenu nav-links__submenu--type--menu">
                              <!-- .menu -->
                              <div class="menu menu--layout--classic ">
                                <div class="menu__submenus-container"></div>
                                <ul class="menu__list">
                                  <?php $traverse($category->children, $category->slug.'/'); ?>
                                </ul>
                              </div>
                            </div>
                          </li>
                        <?php elseif ($category->isRoot() && $category->descendants->count() == 0) : ?>
                          <li class="nav-links__item ">
                            <a class="nav-links__item-link" href="/c/{{ $parent_slug . $category->slug .'/'. $category->id }}">
                              <div class="nav-links__item-body"><b>{{ $category->title }}</b></div>
                            </a>
                          </li>
                        <?php elseif ($category->descendants->count() > 0) : ?>
                          <li class="menu__item">
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="/c/{{ $parent_slug . $category->slug .'/'. $category->id }}">
                              {{ $category->title }} <svg class="menu__item-arrow" width="6px" height="9px"><use xlink:href="/img/sprite.svg#arrow-rounded-right-6x9"></use></svg>
                            </a>
                            <div class="menu__submenu">
                              <!-- .menu -->
                              <div class="menu menu--layout--classic ">
                                <div class="menu__submenus-container"></div>
                                <ul class="menu__list">
                                  <?php $traverse($category->children, $category->parent->slug.'/'.$category->slug.'/'); ?>
                                </ul>
                              </div>
                            </div>
                          </li>
                        <?php else : ?>
                          <li class="menu__item">
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="/c/{{ $parent_slug . $category->slug .'/'. $category->id }}">{{ $category->title }}</a>
                          </li>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    <?php }; ?>
                    <?php $traverse($categories); ?>
                    <li class="nav-links__item  nav-links__item--has-submenu ">
                      <a class="nav-links__item-link" href="#">
                        <div class="nav-links__item-body">
                          <b>Бренды</b> <svg class="nav-links__item-arrow" width="9px" height="6px"><use xlink:href="/img/sprite.svg#arrow-rounded-down-9x6"></use></svg>
                        </div>
                      </a>
                      <div class="nav-links__submenu nav-links__submenu--type--menu">
                        <!-- .menu -->
                        <div class="menu menu--layout--classic ">
                          <div class="menu__submenus-container"></div>
                          <ul class="menu__list">
                            @foreach ($companies as $company)
                              <li class="menu__item">
                                <div class="menu__item-submenu-offset"></div>
                                <a class="menu__item-link" href="/brand/{{ $company->slug }}">{{ $company->title }}</a>
                              </li>
                            @endforeach
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="nav-panel__indicators">
                  <div class="indicator">
                    <a href="/favorite" class="indicator__button">
                      <span class="indicator__area">
                        <svg width="20px" height="20px"><use xlink:href="/img/sprite.svg#heart-20"></use></svg>
                        <span class="indicator__value" id="count-favorite">{{ (is_array($favorite)) ? count($favorite['products_id']) : 0 }}</span>
                      </span>
                    </a>
                  </div>
                  <div class="indicator">
                    <a href="/cart" class="indicator__button">
                      <span class="indicator__area">
                        <svg width="20px" height="20px"><use xlink:href="/img/sprite.svg#cart-20"></use></svg>
                        <span class="indicator__value" id="count-items">{{ (is_array($items)) ? count($items['products_id']) : 0 }}</span>
                      </span>
                    </a>
                  </div>
                  <div class="indicator indicator--trigger--click">
                    <a href="/profile" class="indicator__button">
                      <span class="indicator__area"><svg width="20px" height="20px"><use xlink:href="/img/sprite.svg#person-20"></use></svg></span>
                    </a>
                    <div class="indicator__dropdown">
                      <div class="account-menu">
                        @guest
                          <form class="account-menu__form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="account-menu__form-title">Войдите в свой аккаунт</div>
                            <div class="form-group">
                              <label for="header-signin-email" class="sr-only">Email</label>
                              <input id="header-signin-email" type="email" class="form-control form-control-sm" name="email" value="{{ old('email') }}" autofocus placeholder="Введите Email" required>
                            </div>
                            <div class="form-group">
                              <label for="header-signin-password" class="sr-only">Пароль</label>
                              <div class="account-menu__form-forgot">
                                <input id="header-signin-password" type="password" class="form-control form-control-sm" name="password" placeholder="Введите пароль" required>
                                <a href="{{ route('password.request') }}" class="account-menu__form-forgot-link">Забыли пароль?</a>
                              </div>
                            </div>
                            <div class="form-group account-menu__form-button">
                              <button type="submit" class="btn btn-primary btn-sm">Войти</button>
                            </div>
                            <div class="account-menu__form-link"><a href="/cs-register">Создать аккаунт</a></div>
                          </form>
                        @else
                          <a href="/profile" class="account-menu__user">
                            <div class="account-menu__user-avatar">
                              <img src="/img/avatars/avatar-3.jpg" alt="">
                            </div>
                            <div class="account-menu__user-info">
                              <div class="account-menu__user-name">{{ Auth::user()->name }}</div>
                              <div class="account-menu__user-email">{{ Auth::user()->email }}</div>
                            </div>
                          </a>
                          <div class="account-menu__divider"></div>
                          <ul class="account-menu__links">
                            <li><a href="/profile">Моя страница</a></li>
                            <li><a href="/orders">История заказов</a></li>
                          </ul>
                          <div class="account-menu__divider"></div>
                          <ul class="account-menu__links">
                            <li>
                              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Выйти') }}</a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                              </form>
                            </li>
                          </ul>
                        @endguest
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="site__footer">
      <div class="site-footer">
        <div class="container">
          <div class="site-footer__widgets">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-4">
                <div class="site-footer__widget footer-contacts">
                  <h5 class="footer-contacts__title">Контакты</h5>
                  <div class="footer-contacts__text">{{ $contacts->content }}</div>
                  <ul class="footer-contacts__contacts">
                    <li><i class="footer-contacts__icon fas fa-globe-americas"></i> {{ $data_address['value'] }}</li>
                    <li><a href="mailto:{{ $data_email['value'] }}"></a><i class="footer-contacts__icon far fa-envelope"></i> {{ $data_email['value'] }}</li>
                    @foreach($phones as $phone)
                      <li><a href="tel:{{ $phone }}"><i class="footer-contacts__icon fas fa-mobile-alt"></i> {{ $phone }}</a></li>
                    @endforeach
                    <li><i class="footer-contacts__icon far fa-clock"></i> Пн-Сб 09:00 - 18:30</li>
                  </ul>
                </div>
              </div>
              <div class="col-6 col-md-3 col-lg-2">
                <div class="site-footer__widget footer-links">
                  <h5 class="footer-links__title">Информация</h5>
                  <ul class="footer-links__list">
                    <li class="footer-links__item"><a href="/" class="footer-links__link">Главная</a></li>
                    @foreach($pages as $page)
                      <li class="footer-links__item"><a href="/i/{{ $page->slug }}" class="footer-links__link">{{ $page->title }}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <div class="col-6 col-md-3 col-lg-2">
                <div class="site-footer__widget footer-links">
                  <h5 class="footer-links__title">Мой аккаунт</h5>
                  <ul class="footer-links__list">
                    @guest
                      <li class="footer-links__item"><a href="cs-login" class="footer-links__link">Войти</a></li>
                      <li class="footer-links__item"><a href="cs-register" class="footer-links__link">Регистрация</a></li>
                    @else
                      <li class="footer-links__item"><a href="/profile" class="footer-links__link">Моя страница</a></li>
                      <li class="footer-links__item"><a href="/orders" class="footer-links__link">История заказов</a></li>
                      <li class="footer-links__item">
                        <a class="footer-links__link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Выйти') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                        </form>
                      </li>
                    @endguest
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="site-footer__bottom">
            <div class="site-footer__copyright">SapaParts 2015 - {{ date('Y') }}</div>
            <div class="site-footer__payments"></div>
          </div>
        </div>
        <div class="totop">
          <div class="totop__body">
            <div class="totop__start"></div>
            <div class="totop__container container"></div>
            <div class="totop__end">
              <button type="button" class="totop__button">
                <svg width="13px" height="8px">
                  <use xlink:href="/img/sprite.svg#arrow-rounded-up-13x8"></use>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <!-- Mobile menu -->
  <div class="mobilemenu">
    <div class="mobilemenu__backdrop"></div>
    <div class="mobilemenu__body">
      <div class="mobilemenu__header">
        <div class="mobilemenu__title">Каталог</div>
        <button type="button" class="mobilemenu__close">
          <svg width="20px" height="20px"><use xlink:href="/img/sprite.svg#cross-20"></use></svg>
        </button>
      </div>
      <div class="mobilemenu__content">
        <ul class="mobile-links mobile-links--level--0" data-collapse data-collapse-opened-class="mobile-links__item--open">
          <?php $traverse = function ($categories, $parent_slug = NULL) use (&$traverse) { ?>
            <?php foreach ($categories as $category) : ?>
              <?php if ($category->isRoot() && $category->descendants->count() > 0) : ?>
                <li class="mobile-links__item" data-collapse-item>
                  <div class="mobile-links__item-title">
                    <a href="/c/{{ $category->slug .'/'. $category->id }}" class="mobile-links__item-link">{{ $category->title }}</a>
                    <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                      <svg class="mobile-links__item-arrow" width="12px" height="7px"><use xlink:href="/img/sprite.svg#arrow-rounded-down-12x7"></use></svg>
                    </button>
                  </div>
                  <div class="mobile-links__item-sub-links" data-collapse-content>
                    <ul class="mobile-links mobile-links--level--1">
                      <?php $traverse($category->children, $category->slug.'/'); ?>
                    </ul>
                  </div>
                </li>
              <?php elseif ($category->descendants->count() > 0) : ?>
                <li class="mobile-links__item" data-collapse-item>
                  <div class="mobile-links__item-title">
                    <a href="/c/{{ $parent_slug . $category->slug .'/'. $category->id }}" class="mobile-links__item-link">{{ $category->title }}</a>
                    <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                      <svg class="mobile-links__item-arrow" width="12px" height="7px"><use xlink:href="/img/sprite.svg#arrow-rounded-down-12x7"></use></svg>
                    </button>
                  </div>
                  <div class="mobile-links__item-sub-links" data-collapse-content>
                    <ul class="mobile-links mobile-links--level--2">
                      <?php $traverse($category->children, $category->parent->slug.'/'.$category->slug.'/'); ?>
                    </ul>
                  </div>
                </li>
              <?php else : ?>
                <li class="mobile-links__item" data-collapse-item>
                  <div class="mobile-links__item-title">
                    <a href="/c/{{ $parent_slug . $category->slug .'/'. $category->id }}" class="mobile-links__item-link">{{ $category->title }}</a>
                  </div>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php }; ?>
          <?php $traverse($categories); ?>

          <!-- Companies -->
          <li class="mobile-links__item" data-collapse-item>
            <div class="mobile-links__item-title">
              <a href="#" class="mobile-links__item-link">Бренды</a>
              <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                <svg class="mobile-links__item-arrow" width="12px" height="7px"><use xlink:href="/img/sprite.svg#arrow-rounded-down-12x7"></use></svg>
              </button>
            </div>
            <div class="mobile-links__item-sub-links" data-collapse-content>
              <ul class="mobile-links mobile-links--level--1">
                @foreach ($companies as $company)
                  <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title">
                      <a href="/brand/{{ $company->slug }}" class="mobile-links__item-link">{{ $company->title }}</a>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
          </li>

          <!-- Account -->
          @guest
            <li class="mobile-links__item" data-collapse-item>
              <div class="mobile-links__item-title">
                <a href="/cs-login" class="mobile-links__item-link">Войти</a>
              </div>
            </li>
            <li class="mobile-links__item" data-collapse-item>
              <div class="mobile-links__item-title">
                <a href="/cs-register" class="mobile-links__item-link">Регистрация</a>
              </div>
            </li>
          @else
            <li class="mobile-links__item" data-collapse-item>
              <div class="mobile-links__item-title">
                <a href="/profile" class="mobile-links__item-link">Моя страница</a>
              </div>
            </li>
            <li class="mobile-links__item" data-collapse-item>
              <div class="mobile-links__item-title">
                <a href="/orders" class="mobile-links__item-link">История заказов</a>
              </div>
            </li>
            <li class="mobile-links__item" data-collapse-item>
              <div class="mobile-links__item-title">
                <a href="{{ route('logout') }}" class="mobile-links__item-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Выйти') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/owl-carousel/owl.carousel.min.js"></script>
  <script src="/vendor/nouislider/nouislider.min.js"></script>
  <script src="/vendor/photoswipe/photoswipe.min.js"></script>
  <script src="/vendor/photoswipe/photoswipe-ui-default.min.js"></script>
  <script src="/js/number.js"></script>
  <script src="/js/main.js"></script>
  <script src="/js/header.js"></script>
  <script src="/vendor/svg4everybody/svg4everybody.min.js"></script>
  <script>
    svg4everybody();
  </script>
  @yield('scripts')
</body>
</html>