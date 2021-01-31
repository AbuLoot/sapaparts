@extends('layout')

@section('meta_title', (!empty($page->meta_title)) ? $page->meta_title : $page->title)

@section('meta_description', (!empty($page->meta_description)) ? $page->meta_description : $page->title)

@section('head')

@endsection

@section('content')

  <?php $items = session('items'); ?>
  <?php $favorite = session('favorite'); ?>

  <div class="site__body">

    <!-- Slideshow -->
    @if($slide_items->isNotEmpty())
      <div class="block-slideshow block-slideshow--layout--full block">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="block-slideshow__body">
                <div class="owl-carousel">
                  @foreach($slide_items as $key => $slide_item)
                    <a class="block-slideshow__slide" href="/{{ $slide_item->link }}">
                      <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url('img/slide/{{ $slide_item->image }}')"></div>
                      <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url('img/slide/{{ $slide_item->image }}')"></div>
                      <div class="block-slideshow__slide-content">
                        <div class="block-slideshow__slide-title" style="color: {{ $slide_item->color }};">{{ $slide_item->title }}</div>
                        <div class="block-slideshow__slide-text" style="color: {{ $slide_item->color }};">{{ $slide_item->marketing }}</div>
                        @if($slide_item->link != NULL)
                          <div class="block-slideshow__slide-button">
                            <span class="btn btn-primary btn-lg">Подробнее</span>
                          </div>
                        @endif
                      </div>
                    </a>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif

    <!-- Products Top -->
    <div class="container block">
      <div class="block-header">
        <h3 class="block-header__title">{{ $mode_top->title }}</h3>
        <div class="block-header__divider"></div>
      </div>
      <div class="row custom-row">
        @foreach($mode_top->products->where('status', 1)->take(8) as $top_product)
          <div class="col-6 col-lg-3">
            <div class="product-card">
              <div class="product-card__image">
                <a href="/p/{{ $top_product->id.'-'.$top_product->slug }}" class="mx-auto"><img src="/img/products/{{ $top_product->path.'/'.$top_product->image }}" alt="{{ $top_product->title }}"></a>
              </div>
              <div class="product-card__info">
                <div class="product-card__name">
                  <a href="/p/{{ $top_product->id.'-'.$top_product->slug }}">{{ $top_product->title }}</a>
                </div>
              </div>
              <div class="product-card__actions">
                <div class="product-card__prices">{{ $top_product->price }}〒</div>
                <div class="product-card__buttons">
                  @if (is_array($items) AND isset($items['products_id'][$top_product->id]))
                    <a href="/cart" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="Перейти в корзину">Оплатить</a>
                  @else
                    <button class="btn btn-primary btn-sm" type="button" data-product-id="{{ $top_product->id }}" onclick="addToCart(this);" title="Добавить в корзину">В корзину</button>
                  @endif

                  <button class="btn btn-light btn-sm d-none d-sm-block <?php if (is_array($favorite) AND in_array($top_product->id, $favorite['products_id'])) echo 'btn-liked'; ?>" type="button" data-favourite-id="{{ $top_product->id }}" onclick="toggleFavourite(this);">
                    <svg width="16px" height="16px"><use xlink:href="/img/sprite.svg#wishlist-16"></use></svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <!-- Products New -->
    <div class="container block">
      <div class="block-header">
        <h3 class="block-header__title">{{ $mode_new->title }}</h3>
        <div class="block-header__divider"></div>
      </div>
      <div class="row custom-row">
        @foreach($mode_new->products->where('status', 1)->take(8) as $new_product)
          <div class="col-6 col-lg-3">
            <div class="product-card">
              <div class="product-card__image">
                <a href="/p/{{ $new_product->id.'-'.$new_product->slug }}"><img src="/img/products/{{ $new_product->path.'/'.$new_product->image }}" alt="{{ $new_product->title }}"></a>
              </div>
              <div class="product-card__info">
                <div class="product-card__name">
                  <a href="/p/{{ $new_product->id.'-'.$new_product->slug }}">{{ $new_product->title }}</a>
                </div>
              </div>
              <div class="product-card__actions">
                <div class="product-card__prices">{{ $new_product->price }}〒</div>
                <div class="product-card__buttons">
                  @if (is_array($items) AND isset($items['products_id'][$new_product->id]))
                    <a href="/cart" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="Перейти в корзину">Оплатить</a>
                  @else
                    <button class="btn btn-primary btn-sm" type="button" data-product-id="{{ $new_product->id }}" onclick="addToCart(this);" title="Добавить в корзину">В корзину</button>
                  @endif

                  <button class="btn btn-light btn-sm d-none d-sm-block <?php if (is_array($favorite) AND in_array($new_product->id, $favorite['products_id'])) echo 'btn-liked'; ?>" type="button" data-favourite-id="{{ $new_product->id }}" onclick="toggleFavourite(this);">
                    <svg width="16px" height="16px"><use xlink:href="/img/sprite.svg#wishlist-16"></use></svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <!-- Categories -->
    <div class="block block--highlighted block-categories block-categories--layout--classic">
      <div class="container">
        <div class="block-header">
          <h3 class="block-header__title">Популярные категории</h3>
          <div class="block-header__divider"></div>
        </div>
        <div class="block-categories__list">
          @foreach($relevant_categories as $relevant_category)
            <div class="block-categories__item category-card category-card--layout--classic">
              <div class="category-card__body">
                <div class="category-card__image">
                  <a href="/c/{{ $relevant_category->slug .'/'. $relevant_category->id }}"><img src="/file-manager/{{ $relevant_category->image }}" alt="{{ $relevant_category->title }}"></a>
                </div>
                <div class="category-card__content">
                  <div class="category-card__name">
                    <a href="/c/{{ $relevant_category->slug .'/'. $relevant_category->id }}">{{ $relevant_category->title }}</a>
                  </div>
                  <ul class="category-card__links">
                    <?php $hide_descendants = []; ?>
                    @foreach($relevant_category->children as $num => $descendant)
                      @if($num >= 5)
                        <?php $hide_descendants[] = $descendant; continue; ?>
                      @endif
                      <li><a href="/c/{{ $descendant->parent->slug .'/'. $descendant->slug .'/'. $descendant->id }}">{{ $descendant->title }}</a></li>
                    @endforeach
                  </ul>
                  @if(!empty($hide_descendants))
                    <div class="category-card__all">
                      <a href="#" data-toggle="collapse" data-target="#collapse{{ $relevant_category->id }}" aria-expanded="false" aria-controls="collapse{{ $relevant_category->id }}">Все <span class="fa fa-chevron-down"></span></a>
                      <div class="collapse" id="collapse{{ $relevant_category->id }}">
                        <ul class="category-card__links">
                          @foreach($hide_descendants as $hide_descendant)
                            <li><a href="/c/{{ $hide_descendant->parent->slug .'/'. $hide_descendant->slug .'/'. $hide_descendant->id }}">{{ $hide_descendant->title }}</a></li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                  @endif
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Features -->
    @if(!empty($advantages))
      {!! $advantages->content !!}
    @endif

  </div>

@endsection


@section('scripts')
  <script>
    // Add to cart
    function addToCart(i) {
      var productId = $(i).data("product-id");

      $.ajax({
        type: "get",
        url: '/add-to-cart/'+productId,
        dataType: "json",
        data: {},
        success: function(data) {
          $('*[data-product-id="'+productId+'"]').replaceWith('<a href="/cart" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="Перейти в корзину">Оплатить</a>');
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