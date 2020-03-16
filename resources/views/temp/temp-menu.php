<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <title>@yield('title_description', 'Biotic - Продукты долголетия')</title>
  <meta name="description" content="@yield('meta_description', 'Biotic - Продукты долголетия')">
  <link rel="icon" type="image/png" href="/img/favicon.png">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">

  <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/vendor/owl-carousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="/vendor/photoswipe/photoswipe.css">
  <link rel="stylesheet" href="/vendor/photoswipe/default-skin/default-skin.css">
  <link rel="stylesheet" href="/vendor/select2/css/select2.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/custom.css">
  <link rel="stylesheet" href="/vendor/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="/fonts/stroyka/stroyka.css">
  @yield('head')
</head>
<body>
  <div class="site">
    <!-- mobile site__header -->
    <header class="site__header d-lg-none">
      <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
      <div class="mobile-header mobile-header--sticky" data-sticky-mode="pullToShow">
        <div class="mobile-header__panel">
          <div class="container">
            <div class="mobile-header__body">
              <button class="mobile-header__menu-button">
                <svg width="18px" height="14px">
                  <use xlink:href="/img/sprite.svg#menu-18x14"></use>
                </svg>
              </button>
              <a class="mobile-header__logo" href="index.html">
                <img src="/img/logo.png">
              </a>
              <div class="search search--location--mobile-header mobile-header__search">
                <div class="search__body">
                  <form class="search__form" action="">
                    <input class="search__input" name="search" placeholder="Search over 10,000 products" aria-label="Site search" type="text" autocomplete="off">
                    <button class="search__button search__button--type--submit" type="submit">
                      <svg width="20px" height="20px">
                        <use xlink:href="/img/sprite.svg#search-20"></use>
                      </svg>
                    </button>
                    <button class="search__button search__button--type--close" type="button">
                      <svg width="20px" height="20px">
                        <use xlink:href="/img/sprite.svg#cross-20"></use>
                      </svg>
                    </button>
                    <div class="search__border"></div>
                  </form>
                  <div class="search__suggestions suggestions suggestions--location--mobile-header"></div>
                </div>
              </div>
              <div class="mobile-header__indicators">
                <div class="indicator indicator--mobile-search indicator--mobile d-md-none">
                  <button class="indicator__button">
                    <span class="indicator__area">
                      <svg width="20px" height="20px">
                        <use xlink:href="/img/sprite.svg#search-20"></use>
                      </svg>
                    </span>
                  </button>
                </div>
                <div class="indicator indicator--mobile d-sm-flex d-none">
                  <a href="wishlist.html" class="indicator__button">
                    <span class="indicator__area">
                      <svg width="20px" height="20px">
                        <use xlink:href="/img/sprite.svg#heart-20"></use>
                      </svg>
                      <span class="indicator__value">0</span>
                    </span>
                  </a>
                </div>
                <div class="indicator indicator--mobile">
                  <a href="cart.html" class="indicator__button">
                    <span class="indicator__area">
                      <svg width="20px" height="20px">
                        <use xlink:href="/img/sprite.svg#cart-20"></use>
                      </svg>
                      <span class="indicator__value">3</span>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- desktop site__header -->
    <header class="site__header d-lg-block d-none">
      <div class="site-header">

        <!-- .topbar -->
        <div class="site-header__topbar topbar">
          <div class="topbar__container container">
            <div class="topbar__row">
              @foreach($pages as $page)
                <div class="topbar__item topbar__item--link">
                  <a class="topbar-link" href="/{{ $page->slug }}">{{ $page->title }}</a>
                </div>
              @endforeach
              <div class="topbar__spring"></div>
              <div class="topbar__item">
                <div class="topbar-dropdown">
                  <button class="topbar-dropdown__btn" type="button">
                    My Account
                    <svg width="7px" height="5px">
                      <use xlink:href="/img/sprite.svg#arrow-rounded-down-7x5"></use>
                    </svg>
                  </button>
                  <div class="topbar-dropdown__body">

                    <!-- .menu -->
                    <div class="menu menu--layout--topbar ">
                      <div class="menu__submenus-container"></div>
                      <ul class="menu__list">
                        <li class="menu__item">
                          <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                          <div class="menu__item-submenu-offset"></div>
                          <a class="menu__item-link" href="account-dashboard.html">
                            Dashboard
                          </a>
                        </li>
                        <li class="menu__item">
                          <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                          <div class="menu__item-submenu-offset"></div>
                          <a class="menu__item-link" href="account-profile.html">
                            Edit Profile
                          </a>
                        </li>
                        <li class="menu__item">
                          <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                          <div class="menu__item-submenu-offset"></div>
                          <a class="menu__item-link" href="account-orders.html">
                            Order History
                          </a>
                        </li>
                        <li class="menu__item">
                          <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                          <div class="menu__item-submenu-offset"></div>
                          <a class="menu__item-link" href="account-addresses.html">
                            Addresses
                          </a>
                        </li>
                        <li class="menu__item">
                          <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                          <div class="menu__item-submenu-offset"></div>
                          <a class="menu__item-link" href="account-password.html">
                            Password
                          </a>
                        </li>
                        <li class="menu__item">
                          <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                          <div class="menu__item-submenu-offset"></div>
                          <a class="menu__item-link" href="account-login.html">
                            Logout
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="topbar__item">
                <div class="topbar-dropdown">
                  <button class="topbar-dropdown__btn" type="button">
                    Currency: <span class="topbar__item-value">USD</span>
                    <svg width="7px" height="5px">
                      <use xlink:href="/img/sprite.svg#arrow-rounded-down-7x5"></use>
                    </svg>
                  </button>
                  <div class="topbar-dropdown__body">

                    <!-- .menu -->
                    <div class="menu menu--layout--topbar ">
                      <div class="menu__submenus-container"></div>
                      <ul class="menu__list">
                        <li class="menu__item">
                          <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                          <div class="menu__item-submenu-offset"></div>
                          <a class="menu__item-link" href="">
                            € Euro
                          </a>
                        </li>
                        <li class="menu__item">
                          <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                          <div class="menu__item-submenu-offset"></div>
                          <a class="menu__item-link" href="">
                            £ Pound Sterling
                          </a>
                        </li>
                        <li class="menu__item">
                          <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                          <div class="menu__item-submenu-offset"></div>
                          <a class="menu__item-link" href="">
                            $ US Dollar
                          </a>
                        </li>
                        <li class="menu__item">
                          <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                          <div class="menu__item-submenu-offset"></div>
                          <a class="menu__item-link" href="">
                            ₽ Russian Ruble
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="topbar__item">
                <div class="topbar-dropdown">
                  <button class="topbar-dropdown__btn" type="button">
                    Language: <span class="topbar__item-value">EN</span>
                    <svg width="7px" height="5px">
                      <use xlink:href="/img/sprite.svg#arrow-rounded-down-7x5"></use>
                    </svg>
                  </button>
                  <div class="topbar-dropdown__body">

                    <!-- .menu -->
                    <div class="menu menu--layout--topbar  menu--with-icons ">
                      <div class="menu__submenus-container"></div>
                      <ul class="menu__list">
                        <li class="menu__item">
                          <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                          <div class="menu__item-submenu-offset"></div>
                          <a class="menu__item-link" href="">
                            <div class="menu__item-icon"><img srcset="/img/languages/language-1.png 1x, images/languages/language-1@2x.png 2x" src="/img/languages/language-1.png" alt=""></div>
                            English
                          </a>
                        </li>
                        <li class="menu__item">
                          <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                          <div class="menu__item-submenu-offset"></div>
                          <a class="menu__item-link" href="">
                            <div class="menu__item-icon"><img srcset="/img/languages/language-2.png 1x, images/languages/language-2@2x.png 2x" src="/img/languages/language-2.png" alt=""></div>
                            French
                          </a>
                        </li>
                        <li class="menu__item">
                          <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                          <div class="menu__item-submenu-offset"></div>
                          <a class="menu__item-link" href="">
                            <div class="menu__item-icon"><img srcset="/img/languages/language-3.png 1x, images/languages/language-3@2x.png 2x" src="/img/languages/language-3.png" alt=""></div>
                            German
                          </a>
                        </li>
                        <li class="menu__item">
                          <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                          <div class="menu__item-submenu-offset"></div>
                          <a class="menu__item-link" href="">
                            <div class="menu__item-icon"><img srcset="/img/languages/language-4.png 1x, images/languages/language-4@2x.png 2x" src="/img/languages/language-4.png" alt=""></div>
                            Russian
                          </a>
                        </li>
                        <li class="menu__item">
                          <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                          <div class="menu__item-submenu-offset"></div>
                          <a class="menu__item-link" href="">
                            <div class="menu__item-icon"><img srcset="/img/languages/language-5.png 1x, images/languages/language-5@2x.png 2x" src="/img/languages/language-5.png" alt=""></div>
                            Italian
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="site-header__middle container">
          <div class="site-header__logo">
            <a href="index.html">
              <img src="/img/logo.png">
            </a>
          </div>
          <div class="site-header__search">
            <div class="search search--location--header ">
              <div class="search__body">
                <form class="search__form" action="">
                  <input class="search__input" name="search" placeholder="Search over 10,000 products" aria-label="Site search" type="text" autocomplete="off">
                  <button class="search__button search__button--type--submit" type="submit">
                    <svg width="20px" height="20px">
                      <use xlink:href="/img/sprite.svg#search-20"></use>
                    </svg>
                  </button>
                  <div class="search__border"></div>
                </form>
                <div class="search__suggestions suggestions suggestions--location--header"></div>
              </div>
            </div>
          </div>
          <div class="site-header__phone">
            <div class="site-header__phone-title">Customer Service</div>
            <div class="site-header__phone-number">8 (775) 900 4204</div>
          </div>
        </div>
        <div class="site-header__nav-panel">
          <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
          <div class="nav-panel nav-panel--sticky" data-sticky-mode="pullToShow">
            <div class="nav-panel__container container">
              <div class="nav-panel__row">
                
                <!-- .departments -->


                <!-- .nav-links -->
                <div class="nav-panel__nav-links nav-links">
                  <ul class="nav-links__list">                   
                    <?php $traverse = function ($categories, $parent = NULL) use (&$traverse) { ?>
                      <?php foreach ($categories as $category) : ?>
                        <?php if ($category->isRoot() && count($category->children) > 0) : ?>
                          <li class="nav-links__item  nav-links__item--has-submenu ">
                            <a class="nav-links__item-link" href="shop-grid-3-columns-sidebar.html">
                              <div class="nav-links__item-body">
                                {{ $category->title }}
                                <svg class="nav-links__item-arrow" width="9px" height="6px">
                                  <use xlink:href="/img/sprite.svg#arrow-rounded-down-9x6"></use>
                                </svg>
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
                        <?php elseif ($category->isRoot() && count($category->children) == 0) : ?>
                          <li class="nav-links__item ">
                            <a class="nav-links__item-link" href="https://themeforest.net/item/stroyka-tools-store-html-template/23326943">
                              <div class="nav-links__item-body">{{ $category->title }}</div>
                            </a>
                          </li>
                        <?php else : ?>
                          <?php if (count($category->children) > 0) : ?>
                            <li class="menu__item">
                              <div class="menu__item-submenu-offset"></div>
                              <a class="menu__item-link" href="shop-grid-3-columns-sidebar.html">
                                {{ $category->title }}
                                <svg class="menu__item-arrow" width="6px" height="9px">
                                  <use xlink:href="/img/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg>
                              </a>
                              <div class="menu__submenu">
                                <!-- .menu -->
                                <div class="menu menu--layout--classic ">
                                  <div class="menu__submenus-container"></div>
                                  <ul class="menu__list">
                                    <?php $traverse($category->children, $category->slug.'/'); ?>

                                  </ul>
                                </div>
                              </div>
                            </li>
                          <?php else : ?>
                            <li class="menu__item">
                              <div class="menu__item-submenu-offset"></div>
                              <a class="menu__item-link" href="/catalog/{{ $parent . $category->slug }}/{{ $category->id }}">{{ $category->title }}</a>
                            </li>
                          <?php endif; ?>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    <?php }; ?>
                    <?php $traverse($categories); ?>
                  </ul>
                </div>
                <div class="nav-panel__indicators">
                  <div class="indicator">
                    <a href="wishlist.html" class="indicator__button">
                      <span class="indicator__area">
                        <svg width="20px" height="20px">
                          <use xlink:href="/img/sprite.svg#heart-20"></use>
                        </svg>
                        <span class="indicator__value">0</span>
                      </span>
                    </a>
                  </div>
                  <div class="indicator indicator--trigger--click">
                    <a href="cart.html" class="indicator__button">
                      <span class="indicator__area">
                        <svg width="20px" height="20px">
                          <use xlink:href="/img/sprite.svg#cart-20"></use>
                        </svg>
                        <span class="indicator__value">3</span>
                      </span>
                    </a>
                    <div class="indicator__dropdown">

                      <!-- .dropcart -->
                      <div class="dropcart dropcart--style--dropdown">
                        <div class="dropcart__body">
                          <div class="dropcart__products-list">
                            <div class="dropcart__product">
                              <div class="dropcart__product-image">
                                <a href="product.html"><img src="/img/products/product-1.jpg" alt=""></a>
                              </div>
                              <div class="dropcart__product-info">
                                <div class="dropcart__product-name"><a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a></div>
                                <ul class="dropcart__product-options">
                                  <li>Color: Yellow</li>
                                  <li>Material: Aluminium</li>
                                </ul>
                                <div class="dropcart__product-meta">
                                  <span class="dropcart__product-quantity">2</span> ×
                                  <span class="dropcart__product-price">$699.00</span>
                                </div>
                              </div>
                              <button type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                                <svg width="10px" height="10px">
                                  <use xlink:href="/img/sprite.svg#cross-10"></use>
                                </svg>
                              </button>
                            </div>
                            <div class="dropcart__product">
                              <div class="dropcart__product-image">
                                <a href="product.html"><img src="/img/products/product-2.jpg" alt=""></a>
                              </div>
                              <div class="dropcart__product-info">
                                <div class="dropcart__product-name"><a href="product.html">Undefined Tool IRadix DPS3000SY 2700 watts</a></div>
                                <div class="dropcart__product-meta">
                                  <span class="dropcart__product-quantity">1</span> ×
                                  <span class="dropcart__product-price">$849.00</span>
                                </div>
                              </div>
                              <button type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                                <svg width="10px" height="10px">
                                  <use xlink:href="/img/sprite.svg#cross-10"></use>
                                </svg>
                              </button>
                            </div>
                            <div class="dropcart__product">
                              <div class="dropcart__product-image">
                                <a href="product.html"><img src="/img/products/product-5.jpg" alt=""></a>
                              </div>
                              <div class="dropcart__product-info">
                                <div class="dropcart__product-name"><a href="product.html">Brandix Router Power Tool 2017ERXPK</a></div>
                                <ul class="dropcart__product-options">
                                  <li>Color: True Red</li>
                                </ul>
                                <div class="dropcart__product-meta">
                                  <span class="dropcart__product-quantity">3</span> ×
                                  <span class="dropcart__product-price">$1,210.00</span>
                                </div>
                              </div>
                              <button type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                                <svg width="10px" height="10px">
                                  <use xlink:href="/img/sprite.svg#cross-10"></use>
                                </svg>
                              </button>
                            </div>
                          </div>
                          <div class="dropcart__totals">
                            <table>
                              <tr>
                                <th>Subtotal</th>
                                <td>$5,877.00</td>
                              </tr>
                              <tr>
                                <th>Shipping</th>
                                <td>$25.00</td>
                              </tr>
                              <tr>
                                <th>Tax</th>
                                <td>$0.00</td>
                              </tr>
                              <tr>
                                <th>Total</th>
                                <td>$5,902.00</td>
                              </tr>
                            </table>
                          </div>
                          <div class="dropcart__buttons">
                            <a class="btn btn-secondary" href="cart.html">View Cart</a>
                            <a class="btn btn-primary" href="checkout.html">Checkout</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="indicator indicator--trigger--click">
                    <a href="account-login.html" class="indicator__button">
                      <span class="indicator__area">
                        <svg width="20px" height="20px">
                          <use xlink:href="/img/sprite.svg#person-20"></use>
                        </svg>
                      </span>
                    </a>
                    <div class="indicator__dropdown">
                      <div class="account-menu">
                        <form class="account-menu__form">
                          <div class="account-menu__form-title">Log In to Your Account</div>
                          <div class="form-group">
                            <label for="header-signin-email" class="sr-only">Email address</label>
                            <input id="header-signin-email" type="email" class="form-control form-control-sm" placeholder="Email address">
                          </div>
                          <div class="form-group">
                            <label for="header-signin-password" class="sr-only">Password</label>
                            <div class="account-menu__form-forgot">
                              <input id="header-signin-password" type="password" class="form-control form-control-sm" placeholder="Password">
                              <a href="" class="account-menu__form-forgot-link">Forgot?</a>
                            </div>
                          </div>
                          <div class="form-group account-menu__form-button">
                            <button type="submit" class="btn btn-primary btn-sm">Login</button>
                          </div>
                          <div class="account-menu__form-link"><a href="account-login.html">Create An Account</a></div>
                        </form>
                        <div class="account-menu__divider"></div>
                        <a href="account-dashboard.html" class="account-menu__user">
                          <div class="account-menu__user-avatar">
                            <img src="/img/avatars/avatar-3.jpg" alt="">
                          </div>
                          <div class="account-menu__user-info">
                            <div class="account-menu__user-name">Helena Garcia</div>
                            <div class="account-menu__user-email">stroyka@example.com</div>
                          </div>
                        </a>
                        <div class="account-menu__divider"></div>
                        <ul class="account-menu__links">
                          <li><a href="account-profile.html">Edit Profile</a></li>
                          <li><a href="account-orders.html">Order History</a></li>
                          <li><a href="account-addresses.html">Addresses</a></li>
                          <li><a href="account-password.html">Password</a></li>
                        </ul>
                        <div class="account-menu__divider"></div>
                        <ul class="account-menu__links">
                          <li><a href="account-login.html">Logout</a></li>
                        </ul>
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

    <!-- site__body -->
    <div class="site__body">

      <!-- .block-slideshow -->
      <div class="block-slideshow block-slideshow--layout--full block">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="block-slideshow__body">
                <div class="owl-carousel">
                  <a class="block-slideshow__slide" href="">
                    <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url('images/slides/slide-1-full.jpg')"></div>
                    <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url('images/slides/slide-1-mobile.jpg')"></div>
                    <div class="block-slideshow__slide-content">
                      <div class="block-slideshow__slide-title">Big choice of<br>Plumbing products</div>
                      <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>Etiam pharetra laoreet dui quis molestie.</div>
                      <div class="block-slideshow__slide-button">
                        <span class="btn btn-primary btn-lg">Shop Now</span>
                      </div>
                    </div>
                  </a>
                  <a class="block-slideshow__slide" href="">
                    <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url('images/slides/slide-2-full.jpg')"></div>
                    <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url('images/slides/slide-2-mobile.jpg')"></div>
                    <div class="block-slideshow__slide-content">
                      <div class="block-slideshow__slide-title">Screwdrivers<br>Professional Tools</div>
                      <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>Etiam pharetra laoreet dui quis molestie.</div>
                      <div class="block-slideshow__slide-button">
                        <span class="btn btn-primary btn-lg">Shop Now</span>
                      </div>
                    </div>
                  </a>
                  <a class="block-slideshow__slide" href="">
                    <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url('images/slides/slide-3-full.jpg')"></div>
                    <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url('images/slides/slide-3-mobile.jpg')"></div>
                    <div class="block-slideshow__slide-content">
                      <div class="block-slideshow__slide-title">One more<br>Unique header</div>
                      <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>Etiam pharetra laoreet dui quis molestie.</div>
                      <div class="block-slideshow__slide-button">
                        <span class="btn btn-primary btn-lg">Shop Now</span>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- .block-features -->
      <div class="block block-features block-features--layout--classic">
        <div class="container">
          <div class="block-features__list">
            <div class="block-features__item">
              <div class="block-features__icon">
                <svg width="48px" height="48px">
                  <use xlink:href="/img/sprite.svg#fi-free-delivery-48"></use>
                </svg>
              </div>
              <div class="block-features__content">
                <div class="block-features__title">Free Shipping</div>
                <div class="block-features__subtitle">For orders from $50</div>
              </div>
            </div>
            <div class="block-features__divider"></div>
            <div class="block-features__item">
              <div class="block-features__icon">
                <svg width="48px" height="48px">
                  <use xlink:href="/img/sprite.svg#fi-24-hours-48"></use>
                </svg>
              </div>
              <div class="block-features__content">
                <div class="block-features__title">Support 24/7</div>
                <div class="block-features__subtitle">Call us anytime</div>
              </div>
            </div>
            <div class="block-features__divider"></div>
            <div class="block-features__item">
              <div class="block-features__icon">
                <svg width="48px" height="48px">
                  <use xlink:href="/img/sprite.svg#fi-payment-security-48"></use>
                </svg>
              </div>
              <div class="block-features__content">
                <div class="block-features__title">100% Safety</div>
                <div class="block-features__subtitle">Only secure payments</div>
              </div>
            </div>
            <div class="block-features__divider"></div>
            <div class="block-features__item">
              <div class="block-features__icon">
                <svg width="48px" height="48px">
                  <use xlink:href="/img/sprite.svg#fi-tag-48"></use>
                </svg>
              </div>
              <div class="block-features__content">
                <div class="block-features__title">Hot Offers</div>
                <div class="block-features__subtitle">Discounts up to 90%</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Products 1 -->
      <div class="container block">
        <div class="block-header">
          <h3 class="block-header__title">Bestsellers</h3>
          <div class="block-header__divider"></div>
        </div>
        <div class="row custom-row">
          <div class="col-6 col-lg-3">
            <div class="product-card ">
              <div class="product-card__badges-list">
                <div class="product-card__badge product-card__badge--new">New</div>
              </div>
              <div class="product-card__image">
                <a href="product.html"><img src="/img/products/product-1.jpg" alt=""></a>
              </div>
              <div class="product-card__info">
                <div class="product-card__name">
                  <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                </div>
              </div>
              <div class="product-card__actions">
                <div class="product-card__prices">
                  $749.00
                </div>
                <div class="product-card__buttons">
                  <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                  <button class="btn btn-light btn-sm d-none d-sm-block" type="button">
                    <svg width="16px" height="16px">
                      <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                    </svg>
                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="product-card ">
              <div class="product-card__image">
                <a href="product.html"><img src="/img/products/product-1.jpg" alt=""></a>
              </div>
              <div class="product-card__info">
                <div class="product-card__name">
                  <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                </div>
              </div>
              <div class="product-card__actions">
                <div class="product-card__prices">
                  $749.00
                </div>
                <div class="product-card__buttons">
                  <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                  <button class="btn btn-light btn-sm d-none d-sm-block" type="button">
                    <svg width="16px" height="16px">
                      <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                    </svg>
                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="product-card ">
              <div class="product-card__image">
                <a href="product.html"><img src="/img/products/product-1.jpg" alt=""></a>
              </div>
              <div class="product-card__info">
                <div class="product-card__name">
                  <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                </div>
              </div>
              <div class="product-card__actions">
                <div class="product-card__prices">
                  $749.00
                </div>
                <div class="product-card__buttons">
                  <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                  <button class="btn btn-light btn-sm d-none d-sm-block" type="button">
                    <svg width="16px" height="16px">
                      <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                    </svg>
                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="product-card ">
              <div class="product-card__image">
                <a href="product.html"><img src="/img/products/product-1.jpg" alt=""></a>
              </div>
              <div class="product-card__info">
                <div class="product-card__name">
                  <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                </div>
                <div class="product-card__prices">
                  $749.00
                </div>
              </div>
              <div class="product-card__actions">
                <div class="product-card__buttons">
                  <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                  <button class="btn btn-light btn-sm d-none d-sm-block" type="button">
                    <svg width="16px" height="16px">
                      <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                    </svg>
                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="product-card ">
              <div class="product-card__image">
                <a href="product.html"><img src="/img/products/product-1.jpg" alt=""></a>
              </div>
              <div class="product-card__info">
                <div class="product-card__name">
                  <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                </div>
                <div class="product-card__prices">
                  $749.00
                </div>
              </div>
              <div class="product-card__actions">
                <div class="product-card__buttons">
                  <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                  <button class="btn btn-light btn-sm d-none d-sm-block" type="button">
                    <svg width="16px" height="16px">
                      <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                    </svg>
                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="product-card ">
              <div class="product-card__image">
                <a href="product.html"><img src="/img/products/product-1.jpg" alt=""></a>
              </div>
              <div class="product-card__info">
                <div class="product-card__name">
                  <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                </div>
                <div class="product-card__prices">
                  $749.00
                </div>
              </div>
              <div class="product-card__actions">
                <div class="product-card__buttons">
                  <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                  <button class="btn btn-light btn-sm d-none d-sm-block" type="button">
                    <svg width="16px" height="16px">
                      <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                    </svg>
                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="product-card ">
              <div class="product-card__image">
                <a href="product.html"><img src="/img/products/product-1.jpg" alt=""></a>
              </div>
              <div class="product-card__info">
                <div class="product-card__name">
                  <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                </div>
                <div class="product-card__prices">
                  $749.00
                </div>
              </div>
              <div class="product-card__actions">
                <div class="product-card__buttons">
                  <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                  <button class="btn btn-light btn-sm d-none d-sm-block" type="button">
                    <svg width="16px" height="16px">
                      <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                    </svg>
                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="product-card ">
              <div class="product-card__image">
                <a href="product.html"><img src="/img/products/product-1.jpg" alt=""></a>
              </div>
              <div class="product-card__info">
                <div class="product-card__name">
                  <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                </div>
                <div class="product-card__prices">
                  $749.00
                </div>
              </div>
              <div class="product-card__actions">
                <div class="product-card__buttons">
                  <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                  <button class="btn btn-light btn-sm d-none d-sm-block" type="button">
                    <svg width="16px" height="16px">
                      <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                    </svg>
                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Products 2 -->
      <div class="container block">
        <div class="block-header">
          <h3 class="block-header__title">Bestsellers</h3>
          <div class="block-header__divider"></div>
        </div>
        <div class="row custom-row">
          <div class="col-6 col-lg-3">
            <div class="product-card ">
              <div class="product-card__image">
                <a href="product.html"><img src="/img/products/product-1.jpg" alt=""></a>
              </div>
              <div class="product-card__info">
                <div class="product-card__name">
                  <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                </div>
              </div>
              <div class="product-card__actions">
                <div class="product-card__prices">
                  $749.00
                </div>
                <div class="product-card__buttons">
                  <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                  <button class="btn btn-light btn-sm d-none d-sm-block" type="button">
                    <svg width="16px" height="16px">
                      <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                    </svg>
                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="product-card ">
              <div class="product-card__image">
                <a href="product.html"><img src="/img/products/product-1.jpg" alt=""></a>
              </div>
              <div class="product-card__info">
                <div class="product-card__name">
                  <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                </div>
              </div>
              <div class="product-card__actions">
                <div class="product-card__prices">
                  $749.00
                </div>
                <div class="product-card__buttons">
                  <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                  <button class="btn btn-light btn-sm d-none d-sm-block" type="button">
                    <svg width="16px" height="16px">
                      <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                    </svg>
                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="product-card ">
              <div class="product-card__image">
                <a href="product.html"><img src="/img/products/product-1.jpg" alt=""></a>
              </div>
              <div class="product-card__info">
                <div class="product-card__name">
                  <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                </div>
              </div>
              <div class="product-card__actions">
                <div class="product-card__prices">
                  $749.00
                </div>
                <div class="product-card__buttons">
                  <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                  <button class="btn btn-light btn-sm d-none d-sm-block" type="button">
                    <svg width="16px" height="16px">
                      <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                    </svg>
                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="product-card ">
              <div class="product-card__image">
                <a href="product.html"><img src="/img/products/product-1.jpg" alt=""></a>
              </div>
              <div class="product-card__info">
                <div class="product-card__name">
                  <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                </div>
                <div class="product-card__prices">
                  $749.00
                </div>
              </div>
              <div class="product-card__actions">
                <div class="product-card__buttons">
                  <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                  <button class="btn btn-light btn-sm d-none d-sm-block" type="button">
                    <svg width="16px" height="16px">
                      <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                    </svg>
                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="product-card ">
              <div class="product-card__image">
                <a href="product.html"><img src="/img/products/product-1.jpg" alt=""></a>
              </div>
              <div class="product-card__info">
                <div class="product-card__name">
                  <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                </div>
                <div class="product-card__prices">
                  $749.00
                </div>
              </div>
              <div class="product-card__actions">
                <div class="product-card__buttons">
                  <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                  <button class="btn btn-light btn-sm d-none d-sm-block" type="button">
                    <svg width="16px" height="16px">
                      <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                    </svg>
                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="product-card ">
              <div class="product-card__image">
                <a href="product.html"><img src="/img/products/product-1.jpg" alt=""></a>
              </div>
              <div class="product-card__info">
                <div class="product-card__name">
                  <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                </div>
                <div class="product-card__prices">
                  $749.00
                </div>
              </div>
              <div class="product-card__actions">
                <div class="product-card__buttons">
                  <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                  <button class="btn btn-light btn-sm d-none d-sm-block" type="button">
                    <svg width="16px" height="16px">
                      <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                    </svg>
                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="product-card ">
              <div class="product-card__image">
                <a href="product.html"><img src="/img/products/product-1.jpg" alt=""></a>
              </div>
              <div class="product-card__info">
                <div class="product-card__name">
                  <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                </div>
                <div class="product-card__prices">
                  $749.00
                </div>
              </div>
              <div class="product-card__actions">
                <div class="product-card__buttons">
                  <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                  <button class="btn btn-light btn-sm d-none d-sm-block" type="button">
                    <svg width="16px" height="16px">
                      <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                    </svg>
                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="product-card ">
              <div class="product-card__image">
                <a href="product.html"><img src="/img/products/product-1.jpg" alt=""></a>
              </div>
              <div class="product-card__info">
                <div class="product-card__name">
                  <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                </div>
                <div class="product-card__prices">
                  $749.00
                </div>
              </div>
              <div class="product-card__actions">
                <div class="product-card__buttons">
                  <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                  <button class="btn btn-light btn-sm d-none d-sm-block" type="button">
                    <svg width="16px" height="16px">
                      <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                    </svg>
                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div btn-sm>

      <!-- .block-categories -->
      <div class="block block--highlighted block-categories block-categories--layout--classic">
        <div class="container">
          <div class="block-header">
            <h3 class="block-header__title">Popular Categories</h3>
            <div class="block-header__divider"></div>
          </div>
          <div class="block-categories__list">
            <div class="block-categories__item category-card category-card--layout--classic">
              <div class="category-card__body">
                <div class="category-card__image">
                  <a href=""><img src="/img/categories/category-1.jpg" alt=""></a>
                </div>
                <div class="category-card__content">
                  <div class="category-card__name">
                    <a href="">Power Tools</a>
                  </div>
                  <ul class="category-card__links">
                    <li><a href="">Screwdrivers</a></li>
                    <li><a href="">Milling Cutters</a></li>
                    <li><a href="">Sanding Machines</a></li>
                    <li><a href="">Wrenches</a></li>
                    <li><a href="">Drills</a></li>
                  </ul>
                  <div class="category-card__all">
                    <a href="">Show All</a>
                  </div>
                  <div class="category-card__products">
                    572 Products
                  </div>
                </div>
              </div>
            </div>
            <div class="block-categories__item category-card category-card--layout--classic">
              <div class="category-card__body">
                <div class="category-card__image">
                  <a href=""><img src="/img/categories/category-2.jpg" alt=""></a>
                </div>
                <div class="category-card__content">
                  <div class="category-card__name">
                    <a href="">Hand Tools</a>
                  </div>
                  <ul class="category-card__links">
                    <li><a href="">Screwdrivers</a></li>
                    <li><a href="">Hammers</a></li>
                    <li><a href="">Spanners</a></li>
                    <li><a href="">Handsaws</a></li>
                    <li><a href="">Paint Tools</a></li>
                  </ul>
                  <div class="category-card__all">
                    <a href="">Show All</a>
                  </div>
                  <div class="category-card__products">
                    134 Products
                  </div>
                </div>
              </div>
            </div>
            <div class="block-categories__item category-card category-card--layout--classic">
              <div class="category-card__body">
                <div class="category-card__image">
                  <a href=""><img src="/img/categories/category-4.jpg" alt=""></a>
                </div>
                <div class="category-card__content">
                  <div class="category-card__name">
                    <a href="">Machine Tools</a>
                  </div>
                  <ul class="category-card__links">
                    <li><a href="">Lathes</a></li>
                    <li><a href="">Milling Machines</a></li>
                    <li><a href="">Grinding Machines</a></li>
                    <li><a href="">CNC Machines</a></li>
                    <li><a href="">Sharpening Machines</a></li>
                  </ul>
                  <div class="category-card__all">
                    <a href="">Show All</a>
                  </div>
                  <div class="category-card__products">
                    301 Products
                  </div>
                </div>
              </div>
            </div>
            <div class="block-categories__item category-card category-card--layout--classic">
              <div class="category-card__body">
                <div class="category-card__image">
                  <a href=""><img src="/img/categories/category-3.jpg" alt=""></a>
                </div>
                <div class="category-card__content">
                  <div class="category-card__name">
                    <a href="">Power Machinery</a>
                  </div>
                  <ul class="category-card__links">
                    <li><a href="">Generators</a></li>
                    <li><a href="">Compressors</a></li>
                    <li><a href="">Winches</a></li>
                    <li><a href="">Plasma Cutting</a></li>
                    <li><a href="">Electric Motors</a></li>
                  </ul>
                  <div class="category-card__all">
                    <a href="">Show All</a>
                  </div>
                  <div class="category-card__products">
                    79 Products
                  </div>
                </div>
              </div>
            </div>
            <div class="block-categories__item category-card category-card--layout--classic">
              <div class="category-card__body">
                <div class="category-card__image">
                  <a href=""><img src="/img/categories/category-5.jpg" alt=""></a>
                </div>
                <div class="category-card__content">
                  <div class="category-card__name">
                    <a href="">Measurement</a>
                  </div>
                  <ul class="category-card__links">
                    <li><a href="">Tape Measure</a></li>
                    <li><a href="">Theodolites</a></li>
                    <li><a href="">Thermal Imagers</a></li>
                    <li><a href="">Calipers</a></li>
                    <li><a href="">Levels</a></li>
                  </ul>
                  <div class="category-card__all">
                    <a href="">Show All</a>
                  </div>
                  <div class="category-card__products">
                    366 Products
                  </div>
                </div>
              </div>
            </div>
            <div class="block-categories__item category-card category-card--layout--classic">
              <div class="category-card__body">
                <div class="category-card__image">
                  <a href=""><img src="/img/categories/category-6.jpg" alt=""></a>
                </div>
                <div class="category-card__content">
                  <div class="category-card__name">
                    <a href="">Clothes and PPE</a>
                  </div>
                  <ul class="category-card__links">
                    <li><a href="">Winter Workwear</a></li>
                    <li><a href="">Summer Workwear</a></li>
                    <li><a href="">Helmets</a></li>
                    <li><a href="">Belts and Bags</a></li>
                    <li><a href="">Work Shoes</a></li>
                  </ul>
                  <div class="category-card__all">
                    <a href="">Show All</a>
                  </div>
                  <div class="category-card__products">
                    81 Products
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- .block-products-carousel -->
      <div class="block block-products-carousel" data-layout="horizontal">
        <div class="container">
          <div class="block-header">
            <h3 class="block-header__title">New Arrivals</h3>
            <div class="block-header__divider"></div>
            <ul class="block-header__groups-list">
              <li><button type="button" class="block-header__group  block-header__group--active ">All</button></li>
              <li><button type="button" class="block-header__group ">Power Tools</button></li>
              <li><button type="button" class="block-header__group ">Hand Tools</button></li>
              <li><button type="button" class="block-header__group ">Plumbing</button></li>
            </ul>
            <div class="block-header__arrows-list">
              <button class="block-header__arrow block-header__arrow--left" type="button">
                <svg width="7px" height="11px">
                  <use xlink:href="/img/sprite.svg#arrow-rounded-left-7x11"></use>
                </svg>
              </button>
              <button class="block-header__arrow block-header__arrow--right" type="button">
                <svg width="7px" height="11px">
                  <use xlink:href="/img/sprite.svg#arrow-rounded-right-7x11"></use>
                </svg>
              </button>
            </div>
          </div>
          <div class="block-products-carousel__slider">
            <div class="block-products-carousel__preloader"></div>
            <div class="owl-carousel">
              <div class="block-products-carousel__column">
                <div class="block-products-carousel__cell">
                  <div class="product-card ">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__badges-list">
                      <div class="product-card__badge product-card__badge--new">New</div>
                    </div>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-1.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">9 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $749.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__cell">
                  <div class="product-card ">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__badges-list">
                      <div class="product-card__badge product-card__badge--hot">Hot</div>
                    </div>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-2.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Undefined Tool IRadix DPS3000SY 2700 Watts</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">11 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $1,019.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="block-products-carousel__column">
                <div class="block-products-carousel__cell">
                  <div class="product-card ">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-3.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Drill Screwdriver Brandix ALX7054 200 Watts</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">9 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $850.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__cell">
                  <div class="product-card ">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__badges-list">
                      <div class="product-card__badge product-card__badge--sale">Sale</div>
                    </div>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-4.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Drill Series 3 Brandix KSR4590PQS 1500 Watts</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">7 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        <span class="product-card__new-price">$949.00</span>
                        <span class="product-card__old-price">$1189.00</span>
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="block-products-carousel__column">
                <div class="block-products-carousel__cell">
                  <div class="product-card ">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-5.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Brandix Router Power Tool 2017ERXPK</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">9 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $1,700.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__cell">
                  <div class="product-card ">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-6.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Brandix Drilling Machine DM2019KW4 4kW</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">7 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $3,199.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="block-products-carousel__column">
                <div class="block-products-carousel__cell">
                  <div class="product-card ">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-7.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Brandix Pliers</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">4 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $24.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__cell">
                  <div class="product-card ">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-8.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Water Hose 40cm</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">4 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $15.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="block-products-carousel__column">
                <div class="block-products-carousel__cell">
                  <div class="product-card ">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-9.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Spanner Wrench</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">9 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $19.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__cell">
                  <div class="product-card ">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-10.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Water Tap</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">11 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $15.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="block-products-carousel__column">
                <div class="block-products-carousel__cell">
                  <div class="product-card ">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-11.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Hand Tool Kit</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">9 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $149.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__cell">
                  <div class="product-card ">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-12.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Ash's Chainsaw 3.5kW</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">11 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $666.99
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="block-products-carousel__column">
                <div class="block-products-carousel__cell">
                  <div class="product-card ">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-13.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Brandix Angle Grinder KZX3890PQW</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">4 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $649.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__cell">
                  <div class="product-card ">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-14.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Brandix Air Compressor DELTAKX500</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">7 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $1,800.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="block-products-carousel__column">
                <div class="block-products-carousel__cell">
                  <div class="product-card ">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-15.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Brandix Electric Jigsaw JIG7000BQ</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">4 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $290.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__cell">
                  <div class="product-card ">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-16.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Brandix Screwdriver SCREW1500ACC</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">11 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $1,499.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- .block-brands -->
      <div class="block block-brands">
        <div class="container">
          <div class="block-brands__slider">
            <div class="owl-carousel">
              <div class="block-brands__item">
                <a href=""><img src="/img/logos/logo-1.png" alt=""></a>
              </div>
              <div class="block-brands__item">
                <a href=""><img src="/img/logos/logo-2.png" alt=""></a>
              </div>
              <div class="block-brands__item">
                <a href=""><img src="/img/logos/logo-3.png" alt=""></a>
              </div>
              <div class="block-brands__item">
                <a href=""><img src="/img/logos/logo-4.png" alt=""></a>
              </div>
              <div class="block-brands__item">
                <a href=""><img src="/img/logos/logo-5.png" alt=""></a>
              </div>
              <div class="block-brands__item">
                <a href=""><img src="/img/logos/logo-6.png" alt=""></a>
              </div>
              <div class="block-brands__item">
                <a href=""><img src="/img/logos/logo-7.png" alt=""></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- .block-product-columns -->
      <div class="block block-product-columns d-lg-block d-none">
        <div class="container">
          <div class="row">
            <div class="col-4">
              <div class="block-header">
                <h3 class="block-header__title">Top Rated Products</h3>
                <div class="block-header__divider"></div>
              </div>
              <div class="block-product-columns__column">
                <div class="block-product-columns__item">
                  <div class="product-card product-card--layout--horizontal">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__badges-list">
                      <div class="product-card__badge product-card__badge--new">New</div>
                    </div>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-1.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">9 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $749.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-product-columns__item">
                  <div class="product-card product-card--layout--horizontal">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__badges-list">
                      <div class="product-card__badge product-card__badge--hot">Hot</div>
                    </div>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-2.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Undefined Tool IRadix DPS3000SY 2700 Watts</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">11 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $1,019.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-product-columns__item">
                  <div class="product-card product-card--layout--horizontal">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-3.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Drill Screwdriver Brandix ALX7054 200 Watts</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">9 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $850.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="block-header">
                <h3 class="block-header__title">Special Offers</h3>
                <div class="block-header__divider"></div>
              </div>
              <div class="block-product-columns__column">
                <div class="block-product-columns__item">
                  <div class="product-card product-card--layout--horizontal">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__badges-list">
                      <div class="product-card__badge product-card__badge--sale">Sale</div>
                    </div>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-4.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Drill Series 3 Brandix KSR4590PQS 1500 Watts</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">7 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        <span class="product-card__new-price">$949.00</span>
                        <span class="product-card__old-price">$1189.00</span>
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-product-columns__item">
                  <div class="product-card product-card--layout--horizontal">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-5.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Brandix Router Power Tool 2017ERXPK</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">9 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $1,700.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-product-columns__item">
                  <div class="product-card product-card--layout--horizontal">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-6.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Brandix Drilling Machine DM2019KW4 4kW</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">7 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $3,199.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="block-header">
                <h3 class="block-header__title">Bestsellers</h3>
                <div class="block-header__divider"></div>
              </div>
              <div class="block-product-columns__column">
                <div class="block-product-columns__item">
                  <div class="product-card product-card--layout--horizontal">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-7.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Brandix Pliers</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">4 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $24.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-product-columns__item">
                  <div class="product-card product-card--layout--horizontal">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-8.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Water Hose 40cm</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">4 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $15.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-product-columns__item">
                  <div class="product-card product-card--layout--horizontal">
                    <button class="product-card__quickview" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="/img/sprite.svg#quickview-16"></use>
                      </svg>
                      <span class="fake-svg-icon"></span>
                    </button>
                    <div class="product-card__image">
                      <a href="product.html"><img src="/img/products/product-9.jpg" alt=""></a>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <a href="product.html">Spanner Wrench</a>
                      </div>
                      <div class="product-card__rating">
                        <div class="rating">
                          <div class="rating__body">
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge rating__star--active">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                            <svg class="rating__star " width="13px" height="12px">
                              <g class="rating__fill">
                                <use xlink:href="/img/sprite.svg#star-normal"></use>
                              </g>
                              <g class="rating__stroke">
                                <use xlink:href="/img/sprite.svg#star-normal-stroke"></use>
                              </g>
                            </svg>
                            <div class="rating__star rating__star--only-edge ">
                              <div class="rating__fill">
                                <div class="fake-svg-icon"></div>
                              </div>
                              <div class="rating__stroke">
                                <div class="fake-svg-icon"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-card__rating-legend">9 Reviews</div>
                      </div>
                      <ul class="product-card__features-list">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                      </ul>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">
                        Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">
                        $19.00
                      </div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary btn-sm" type="button">В корзину</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">В корзину</button>
                        <button class="btn btn-light btn-sm" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                        </button>
                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                          <svg width="16px" height="16px">
                            <use xlink:href="/img/sprite.svg#compare-16"></use>
                          </svg>
                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- site__footer -->
    <footer class="site__footer">
      <div class="site-footer">
        <div class="container">
          <div class="site-footer__widgets">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-4">
                <div class="site-footer__widget footer-contacts">
                  <h5 class="footer-contacts__title">Contact Us</h5>
                  <div class="footer-contacts__text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in feugiat lorem. Pellentque ac placerat tellus.
                  </div>
                  <ul class="footer-contacts__contacts">
                    <li><i class="footer-contacts__icon fas fa-globe-americas"></i> 715 Fake Street, New York 10021 USA</li>
                    <li><i class="footer-contacts__icon far fa-envelope"></i> stroyka@example.com</li>
                    <li><i class="footer-contacts__icon fas fa-mobile-alt"></i> (800) 060-0730, (800) 060-0730</li>
                    <li><i class="footer-contacts__icon far fa-clock"></i> Mon-Sat 10:00pm - 7:00pm</li>
                  </ul>
                </div>
              </div>
              <div class="col-6 col-md-3 col-lg-2">
                <div class="site-footer__widget footer-links">
                  <h5 class="footer-links__title">Information</h5>
                  <ul class="footer-links__list">
                    <li class="footer-links__item"><a href="" class="footer-links__link">About Us</a></li>
                    <li class="footer-links__item"><a href="" class="footer-links__link">Delivery Information</a></li>
                    <li class="footer-links__item"><a href="" class="footer-links__link">Privacy Policy</a></li>
                    <li class="footer-links__item"><a href="" class="footer-links__link">Brands</a></li>
                    <li class="footer-links__item"><a href="" class="footer-links__link">Contact Us</a></li>
                    <li class="footer-links__item"><a href="" class="footer-links__link">Returns</a></li>
                    <li class="footer-links__item"><a href="" class="footer-links__link">Site Map</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-6 col-md-3 col-lg-2">
                <div class="site-footer__widget footer-links">
                  <h5 class="footer-links__title">My Account</h5>
                  <ul class="footer-links__list">
                    <li class="footer-links__item"><a href="" class="footer-links__link">Store Location</a></li>
                    <li class="footer-links__item"><a href="" class="footer-links__link">Order History</a></li>
                    <li class="footer-links__item"><a href="" class="footer-links__link">Wish List</a></li>
                    <li class="footer-links__item"><a href="" class="footer-links__link">Newsletter</a></li>
                    <li class="footer-links__item"><a href="" class="footer-links__link">Specials</a></li>
                    <li class="footer-links__item"><a href="" class="footer-links__link">Gift Certificates</a></li>
                    <li class="footer-links__item"><a href="" class="footer-links__link">Affiliate</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-4">
                <div class="site-footer__widget footer-newsletter">
                  <h5 class="footer-newsletter__title">Newsletter</h5>
                  <div class="footer-newsletter__text">
                    Praesent pellentesque volutpat ex, vitae auctor lorem pulvinar mollis felis at lacinia.
                  </div>
                  <form action="" class="footer-newsletter__form">
                    <label class="sr-only" for="footer-newsletter-address">Email Address</label>
                    <input type="text" class="footer-newsletter__form-input form-control" id="footer-newsletter-address" placeholder="Email Address...">
                    <button class="footer-newsletter__form-button btn btn-primary">Subscribe</button>
                  </form>
                  <div class="footer-newsletter__text footer-newsletter__text--social">
                    Follow us on social networks
                  </div>
                  <ul class="footer-newsletter__social-links">
                    <li class="footer-newsletter__social-link footer-newsletter__social-link--facebook"><a href="https://themeforest.net/user/kos9" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="footer-newsletter__social-link footer-newsletter__social-link--twitter"><a href="https://themeforest.net/user/kos9" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li class="footer-newsletter__social-link footer-newsletter__social-link--youtube"><a href="https://themeforest.net/user/kos9" target="_blank"><i class="fab fa-youtube"></i></a></li>
                    <li class="footer-newsletter__social-link footer-newsletter__social-link--instagram"><a href="https://themeforest.net/user/kos9" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li class="footer-newsletter__social-link footer-newsletter__social-link--rss"><a href="https://themeforest.net/user/kos9" target="_blank"><i class="fas fa-rss"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="site-footer__bottom">
            <div class="site-footer__copyright">
              Powered by HTML — Design by <a href="https://themeforest.net/user/kos9" target="_blank">Kos</a>
            </div>
            <div class="site-footer__payments">
              <img src="/img/payments.png" alt="">
            </div>
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

  <!-- quickview-modal -->
  <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content"></div>
    </div>
  </div>

  <!-- mobilemenu -->
  <div class="mobilemenu">
    <div class="mobilemenu__backdrop"></div>
    <div class="mobilemenu__body">
      <div class="mobilemenu__header">
        <div class="mobilemenu__title">Menu</div>
        <button type="button" class="mobilemenu__close">
          <svg width="20px" height="20px">
            <use xlink:href="/img/sprite.svg#cross-20"></use>
          </svg>
        </button>
      </div>
      <div class="mobilemenu__content">
        <ul class="mobile-links mobile-links--level--0" data-collapse data-collapse-opened-class="mobile-links__item--open">
          <?php $traverse = function ($categories, $parent = NULL) use (&$traverse) { ?>
            <?php foreach ($categories as $category) : ?>
              <?php if ($category->isRoot() && count($category->children) > 0) : ?>
                <li class="nav-links__item  nav-links__item--has-submenu ">
                  <a class="nav-links__item-link" href="shop-grid-3-columns-sidebar.html">
                    <div class="nav-links__item-body">
                      {{ $category->title }}
                      <svg class="nav-links__item-arrow" width="9px" height="6px">
                        <use xlink:href="/img/sprite.svg#arrow-rounded-down-9x6"></use>
                      </svg>
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

          <li class="mobile-links__item" data-collapse-item>
            <div class="mobile-links__item-title">
              <a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">{{ $category->title }}</a>
              <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                  <use xlink:href="/img/sprite.svg#arrow-rounded-down-12x7"></use>
                </svg>
              </button>
            </div>
            <div class="mobile-links__item-sub-links" data-collapse-content>
              <ul class="mobile-links mobile-links--level--1">
                <li class="mobile-links__item" data-collapse-item>
                  <div class="mobile-links__item-title">
                    <a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">Shop Grid</a>
                    <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                      <svg class="mobile-links__item-arrow" width="12px" height="7px">
                        <use xlink:href="/img/sprite.svg#arrow-rounded-down-12x7"></use>
                      </svg>
                    </button>
                  </div>
                  <div class="mobile-links__item-sub-links" data-collapse-content>
                    <ul class="mobile-links mobile-links--level--2">
                      <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                          <a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">3 Columns Sidebar</a>
                        </div>
                      </li>
                      <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                          <a href="shop-grid-4-columns-full.html" class="mobile-links__item-link">4 Columns Full</a>
                        </div>
                      </li>
                      <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                          <a href="shop-grid-5-columns-full.html" class="mobile-links__item-link">5 Columns Full</a>
                        </div>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                  <div class="mobile-links__item-title">
                    <a href="shop-list.html" class="mobile-links__item-link">Shop List</a>
                  </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                  <div class="mobile-links__item-title">
                    <a href="shop-right-sidebar.html" class="mobile-links__item-link">Shop Right Sidebar</a>
                  </div>
                </li>
              </ul>
            </div>
          </li>

              <?php elseif ($category->isRoot() && count($category->children) == 0) : ?>
                <li class="nav-links__item ">
                  <a class="nav-links__item-link" href="https://themeforest.net/item/stroyka-tools-store-html-template/23326943">
                    <div class="nav-links__item-body">{{ $category->title }}</div>
                  </a>
                </li>
              <?php else : ?>
                <?php if (count($category->children) > 0) : ?>
                  <li class="menu__item">
                    <div class="menu__item-submenu-offset"></div>
                    <a class="menu__item-link" href="shop-grid-3-columns-sidebar.html">
                      {{ $category->title }}
                      <svg class="menu__item-arrow" width="6px" height="9px">
                        <use xlink:href="/img/sprite.svg#arrow-rounded-right-6x9"></use>
                      </svg>
                    </a>
                    <div class="menu__submenu">
                      <!-- .menu -->
                      <div class="menu menu--layout--classic ">
                        <div class="menu__submenus-container"></div>
                        <ul class="menu__list">
                          <?php $traverse($category->children, $category->slug.'/'); ?>

                        </ul>
                      </div>
                    </div>
                  </li>
                <?php else : ?>
                  <li class="menu__item">
                    <div class="menu__item-submenu-offset"></div>
                    <a class="menu__item-link" href="/catalog/{{ $parent . $category->slug }}/{{ $category->id }}">{{ $category->title }}</a>
                  </li>
                <?php endif; ?>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php }; ?>
          <?php $traverse($categories); ?>
          <li class="mobile-links__item" data-collapse-item>
            <div class="mobile-links__item-title">
              <a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">Shop</a>
              <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                  <use xlink:href="/img/sprite.svg#arrow-rounded-down-12x7"></use>
                </svg>
              </button>
            </div>
            <div class="mobile-links__item-sub-links" data-collapse-content>
              <ul class="mobile-links mobile-links--level--1">
                <li class="mobile-links__item" data-collapse-item>
                  <div class="mobile-links__item-title">
                    <a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">Shop Grid</a>
                    <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                      <svg class="mobile-links__item-arrow" width="12px" height="7px">
                        <use xlink:href="/img/sprite.svg#arrow-rounded-down-12x7"></use>
                      </svg>
                    </button>
                  </div>
                  <div class="mobile-links__item-sub-links" data-collapse-content>
                    <ul class="mobile-links mobile-links--level--2">
                      <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                          <a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">3 Columns Sidebar</a>
                        </div>
                      </li>
                      <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                          <a href="shop-grid-4-columns-full.html" class="mobile-links__item-link">4 Columns Full</a>
                        </div>
                      </li>
                      <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                          <a href="shop-grid-5-columns-full.html" class="mobile-links__item-link">5 Columns Full</a>
                        </div>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                  <div class="mobile-links__item-title">
                    <a href="shop-list.html" class="mobile-links__item-link">Shop List</a>
                  </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                  <div class="mobile-links__item-title">
                    <a href="shop-right-sidebar.html" class="mobile-links__item-link">Shop Right Sidebar</a>
                  </div>
                </li>
              </ul>
            </div>
          </li>
          <li class="mobile-links__item" data-collapse-item>
            <div class="mobile-links__item-title">
              <a href="index.html" class="mobile-links__item-link">Home</a>
              <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                  <use xlink:href="/img/sprite.svg#arrow-rounded-down-12x7"></use>
                </svg>
              </button>
            </div>
            <div class="mobile-links__item-sub-links" data-collapse-content>
              <ul class="mobile-links mobile-links--level--1">
                @foreach($pages as $page)
                  <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title">
                      <a href="/{{ $page->slug }}" class="mobile-links__item-link">{{ $page->title }}</a>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <!-- photoswipe -->
  <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
      <div class="pswp__container">
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
      </div>
      <div class="pswp__ui pswp__ui--hidden">
        <div class="pswp__top-bar">
          <div class="pswp__counter"></div>
          <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
          <!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>-->
          <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
          <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
          <div class="pswp__preloader">
            <div class="pswp__preloader__icn">
              <div class="pswp__preloader__cut">
                <div class="pswp__preloader__donut"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
          <div class="pswp__share-tooltip"></div>
        </div>
        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
        <div class="pswp__caption">
          <div class="pswp__caption__center"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- js -->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/owl-carousel/owl.carousel.min.js"></script>
  <script src="/vendor/nouislider/nouislider.min.js"></script>
  <script src="/vendor/photoswipe/photoswipe.min.js"></script>
  <script src="/vendor/photoswipe/photoswipe-ui-default.min.js"></script>
  <script src="/vendor/select2/js/select2.min.js"></script>
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