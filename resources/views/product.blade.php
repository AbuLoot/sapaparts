@extends('layout')

@section('meta_title', $product->meta_title ?? $product->title.' - '.$category->title)

@section('meta_description', $product->meta_description ?? $product->title.' - '.$category->title)

@section('head')

@endsection

@section('content')

  <?php $items = session('items'); ?>
  <?php $favorite = session('favorite'); ?>

  <div class="site__body">
    <!-- Breadcrumb -->
    <div class="page-header">
      <div class="page-header__container container">
        <div class="page-header__breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/">Главная</a>
                <svg class="breadcrumb-arrow" width="6px" height="9px"><use xlink:href="/img/sprite.svg#arrow-rounded-right-6x9"></use></svg>
              </li>
              <li class="breadcrumb-item">
                <a href="/c/{{ $product->category->slug.'/'.$product->category->id }}">{{ $product->category->title }}</a>
                <svg class="breadcrumb-arrow" width="6px" height="9px"><use xlink:href="/img/sprite.svg#arrow-rounded-right-6x9"></use></svg>
              </li>
              <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <!-- Product card -->
    <div class="block">
      <div class="container">
        <div class="product product--layout--standard" data-layout="standard">
          <div class="product__content">
            <!-- .product__gallery -->
            <div class="product__gallery">
              <div class="product-gallery">
                <div class="product-gallery__featured">
                  <button class="product-gallery__zoom">
                    <svg width="24px" height="24px"><use xlink:href="/img/sprite.svg#zoom-in-24"></use></svg>
                  </button>
                  <div class="owl-carousel" id="product-image">
                    @if ($product->images != '')
                      <?php $images = ($product->images == true) ? unserialize($product->images) : []; ?>
                      @foreach ($images as $k => $image)
                        <a href="/img/products/{{ $product->path.'/'.$images[$k]['image'] }}" target="_blank">
                          <img src="/img/products/{{ $product->path.'/'.$images[$k]['image'] }}" alt="{{ $product->title }}">
                        </a>
                      @endforeach
                    @else
                      <a href="/img/products/product-16-1.jpg" target="_blank">
                        <img src="/img/products/product-16-1.jpg" alt="">
                      </a>
                    @endif
                  </div>
                </div>
                <div class="product-gallery__carousel">
                  <div class="owl-carousel" id="product-carousel">
                    @if ($product->images != '')
                      @foreach ($images as $k => $image)
                        <a href="/img/products/{{ $product->path.'/'.$images[$k]['mini_image'] }}" class="product-gallery__carousel-item">
                          <img class="product-gallery__carousel-image" src="/img/products/{{ $product->path.'/'.$images[$k]['mini_image'] }}" alt="">
                        </a>
                      @endforeach
                    @endif
                  </div>
                </div>
              </div>
            </div>

            <!-- .product__info -->
            <div class="product__info">
              <div class="product__wishlist-compare">
                <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Wishlist">
                  <svg width="16px" height="16px">
                    <use xlink:href="/img/sprite.svg#wishlist-16"></use>
                  </svg>
                </button>
                <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Compare">
                  <svg width="16px" height="16px">
                    <use xlink:href="/img/sprite.svg#compare-16"></use>
                  </svg>
                </button>
              </div>
              <h1 class="product__name">{{ $product->title }}</h1>
              <div class="product__description">{!! $product->characteristic !!}</div>
              <div class="spec spec__section">
                <div class="spec__row">
                  <div class="spec__name">Код товара:</div>
                  <div class="spec__value">{{ $product->barcode }}</div>
                </div>
                <div class="spec__row">
                  <div class="spec__name">OEM:</div>
                  <div class="spec__value">{{ $product->oem }}</div>
                </div>
                <div class="spec__row">
                  <div class="spec__name">Объем:</div>
                  <div class="spec__value">{{ $product->capacity }}</div>
                </div>
                <div class="spec__row">
                  <div class="spec__name">Вес:</div>
                  <div class="spec__value">{{ $product->weight }}</div>
                </div>
                <div class="spec__row">
                  <div class="spec__name">Производитель:</div>
                  <div class="spec__value">
                    @foreach($product->options as $option)
                      {{ $option->title }}
                    @endforeach
                  </div>
                </div>
                <div class="spec__row">
                  <div class="spec__name">Доступность:</div>
                  <div class="spec__value">Предзаказ</div>
                </div>
              </div>
            </div>
            <!-- .product__sidebar -->
            <div class="product__sidebar">
              <div class="product__prices">{{ $product->price }}〒</div>
              <!-- .product__options -->
              <form action="add-to-cart/{{ $product->id }}" class="product__options">
                <div class="form-group product__option">
                  <label class="product__option-label" for="product-quantity">Количество</label>
                  <div class="product__actions">
                    <div class="product__actions-item">
                      <div class="input-number product__quantity">
                        <input id="product-quantity" class="input-number__input form-control form-control-lg" type="quantity" min="1" value="1">
                        <div class="input-number__add"></div>
                        <div class="input-number__sub"></div>
                      </div>
                    </div>
                    <div class="product__actions-item product__actions-item--addtocart">
                      @if (is_array($items) AND isset($items['products_id'][$product->id]))
                        <a href="/cart" class="btn btn-secondary btn-lg" data-toggle="tooltip" data-placement="top" title="Перейти в корзину">Оплатить</a>
                      @else
                        <button class="btn btn-primary btn-lg" type="button" data-product-id="{{ $product->id }}" onclick="addToCart(this);" title="Добавить в корзину">В корзину</button>
                      @endif
                    </div>

                    <div class="product__actions-item product__actions-item--wishlist">
                      <button type="button" class="btn btn-secondary btn-svg-icon btn-lg <?php if (is_array($favorite) AND in_array($product->id, $favorite['products_id'])) echo 'btn-liked'; ?>" type="button" data-favourite-id="{{ $product->id }}" onclick="toggleFavourite(this);">
                        <svg width="16px" height="16px"><use xlink:href="/img/sprite.svg#wishlist-16"></use></svg>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="product-tabs">
          <div class="product-tabs__list">
            <a href="#tab-description" class="product-tabs__item product-tabs__item--active">Описание</a>
            <a href="#tab-specification" class="product-tabs__item">Характеристика</a>
          </div>
          <div class="product-tabs__content">
            <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
              <div class="typography">
                <div class="product__description">
                  {!! $product->description !!}
                </div>
              </div>
            </div>
            <div class="product-tabs__pane" id="tab-specification">
              {!! $product->characteristic !!}
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Products carousel -->
    <div class="block block-products-carousel" data-layout="grid-4">
      <div class="container">
        <div class="block-header">
          <h3 class="block-header__title">Похожие товары</h3>
          <div class="block-header__divider"></div>
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
            @foreach ($products as $product)
              <div class="block-products-carousel__column">
              <div class="block-products-carousel__cell">
                <div class="product-card ">
                  @foreach($product->modes as $m)
                    @if(in_array($m->slug, ['recommend', 'new', 'best-price', 'stock', 'plus-gift']))
                      <div class="product-card__badges-list">
                        <div class="product-card__badge product-card__badge--{{ $m->slug }}">{{ $m->title }}</div>
                      </div>
                    @endif
                  @endforeach
                  <div class="product-card__image">
                    <a href="/p/{{ $product->id.'-'.$product->slug }}"><img src="/img/products/{{ $product->path.'/'.$product->image }}" alt="{{ $product->title }}"></a>
                  </div>
                  <div class="product-card__info">
                    <div class="product-card__name">
                      <a href="/p/{{ $product->id.'-'.$product->slug }}">{{ $product->title }}</a>
                    </div>
                  </div>
                  <div class="product-card__actions">
                    <div class="product-card__prices">{{ $product->price }}〒</div>
                    <div class="product-card__buttons">
                      @if (is_array($items) AND isset($items['products_id'][$product->id]))
                        <a href="/cart" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Перейти в корзину">Оплатить</a>
                      @else
                        <button class="btn btn-primary btn-sm" type="button" data-product-id="{{ $product->id }}" onclick="addToCart(this);" title="Добавить в корзину">В корзину</button>
                      @endif

                      <button class="btn btn-light btn-sm d-none d-sm-block <?php if (is_array($favorite) AND in_array($product->id, $favorite['products_id'])) echo 'btn-liked'; ?>" type="button" data-favourite-id="{{ $product->id }}" onclick="toggleFavourite(this);">
                        <svg width="16px" height="16px"><use xlink:href="/img/sprite.svg#wishlist-16"></use></svg>
                        <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            @endforeach
          </div>
        </div>
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
@endsection

@section('scripts')
  <script>
    // Add to cart
    function addToCart(i) {
      var productId = $(i).data("product-id");
      var quantity = $('#product-quantity').val();

      $.ajax({
        type: "get",
        url: '/add-to-cart/'+productId,
        dataType: "json",
        data: {'quantity': quantity},
        success: function(data) {
          $('*[data-product-id="'+productId+'"]').replaceWith('<a href="/cart" class="btn btn-secondary btn-lg" data-toggle="tooltip" data-placement="top" title="Перейти в корзину">Оплатить</a>');
          $('#count-items').text(data.countItems);
          alert('Товар добавлен в корзину');
        }
      });
    }

    // Toggle favourite
    function toggleFavourite (f) {
      var productId = $(f).data("favourite-id");

      $.ajax({
        type: "get",
        url: '/toggle-favourite/'+productId,
        dataType: "json",
        data: {},
        success: function(data) {
          if (data.status == true) {
            $('*[data-favourite-id="'+productId+'"]').addClass('btn-liked');
          } else {
            $('*[data-favourite-id="'+productId+'"]').removeClass('btn-liked');
          }
          $('#count-favorite').text(data.countFavorite);
        }
      });
    }
  </script>
@endsection
