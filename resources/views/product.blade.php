@extends('layout')

@section('meta_title', $category->meta_title)

@section('meta_description', $category->meta_description)

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
                        <a href="/img/products/{{ $product->path.'/'.$images[$k]['present_image'] }}" class="product-gallery__carousel-item">
                          <img class="product-gallery__carousel-image" src="/img/products/{{ $product->path.'/'.$images[$k]['present_image'] }}" alt="">
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
            <a href="#tab-reviews" class="product-tabs__item">Отзывы</a>
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
            <div class="product-tabs__pane" id="tab-reviews">
              <div class="reviews-view">
                <div class="reviews-view__list">
                  <h3 class="reviews-view__header">Customer Reviews</h3>
                  <div class="reviews-list">
                    <ol class="reviews-list__content">
                      <li class="reviews-list__item">
                        <div class="review">
                          <div class="review__avatar"><img src="/img/avatars/avatar-1.jpg" alt=""></div>
                          <div class="review__content">
                            <div class="review__author">Samantha Smith</div>
                            <div class="review__rating">
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
                            </div>
                            <div class="review__text">Phasellus id mattis nulla. Mauris velit nisi, imperdiet vitae sodales in, maximus ut lectus. Vivamus commodo scelerisque lacus, at porttitor dui iaculis id. Curabitur imperdiet ultrices fermentum.</div>
                            <div class="review__date">27 May, 2018</div>
                          </div>
                        </div>
                      </li>
                      <li class="reviews-list__item">
                        <div class="review">
                          <div class="review__avatar"><img src="/img/avatars/avatar-2.jpg" alt=""></div>
                          <div class="review__content">
                            <div class="review__author">Adam Taylor</div>
                            <div class="review__rating">
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
                            </div>
                            <div class="review__text">Aenean non lorem nisl. Duis tempor sollicitudin orci, eget tincidunt ex semper sit amet. Nullam neque justo, sodales congue feugiat ac, facilisis a augue. Donec tempor sapien et fringilla facilisis. Nam maximus consectetur diam. Nulla ut ex mollis, volutpat tellus vitae, accumsan ligula.</div>
                            <div class="review__date">12 April, 2018</div>
                          </div>
                        </div>
                      </li>
                      <li class="reviews-list__item">
                        <div class="review">
                          <div class="review__avatar"><img src="/img/avatars/avatar-3.jpg" alt=""></div>
                          <div class="review__content">
                            <div class="review__author">Helena Garcia</div>
                            <div class="review__rating">
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
                            </div>
                            <div class="review__text">Duis ac lectus scelerisque quam blandit egestas. Pellentesque hendrerit eros laoreet suscipit ultrices.</div>
                            <div class="review__date">2 January, 2018</div>
                          </div>
                        </div>
                      </li>
                    </ol>
                    <div class="reviews-list__pagination">
                      <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                          <a class="page-link page-link--with-arrow" href="" aria-label="Previous">
                            <svg class="page-link__arrow page-link__arrow--left" aria-hidden="true" width="8px" height="13px">
                              <use xlink:href="/img/sprite.svg#arrow-rounded-left-8x13"></use>
                            </svg>
                          </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="">1</a></li>
                        <li class="page-item active"><a class="page-link" href="">2 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item"><a class="page-link" href="">3</a></li>
                        <li class="page-item">
                          <a class="page-link page-link--with-arrow" href="" aria-label="Next">
                            <svg class="page-link__arrow page-link__arrow--right" aria-hidden="true" width="8px" height="13px">
                              <use xlink:href="/img/sprite.svg#arrow-rounded-right-8x13"></use>
                            </svg>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <form class="reviews-view__form">
                  <h3 class="reviews-view__header">Write A Review</h3>
                  <div class="row">
                    <div class="col-12 col-lg-9 col-xl-8">
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="review-stars">Review Stars</label>
                          <select id="review-stars" class="form-control">
                            <option>5 Stars Rating</option>
                            <option>4 Stars Rating</option>
                            <option>3 Stars Rating</option>
                            <option>2 Stars Rating</option>
                            <option>1 Stars Rating</option>
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="review-author">Your Name</label>
                          <input type="text" class="form-control" id="review-author" placeholder="Your Name">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="review-email">Email Address</label>
                          <input type="text" class="form-control" id="review-email" placeholder="Email Address">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="review-text">Your Review</label>
                        <textarea class="form-control" id="review-text" rows="6"></textarea>
                      </div>
                      <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary btn-lg">Post Your Review</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
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
