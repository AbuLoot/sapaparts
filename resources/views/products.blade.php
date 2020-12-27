@extends('layout')

@section('meta_title', $category->title.' - '.$category->meta_title)

@section('meta_description', $category->meta_description ?? $category->title)

@section('btn-filter')
  <div class="view-options__filters-button">
    <button type="button" class="filters-button">
      <svg class="filters-button__icon" width="16px" height="16px"><use xlink:href="/img/sprite.svg#filters-16"></use></svg>
      <span class="filters-button__title">Фильтры</span>
    </button>
  </div>
@endsection

@section('content')

  <?php $items = session('items'); ?>
  <?php $favorite = session('favorite'); ?>

  <div class="site__body">
    <div class="page-header">
      <div class="page-header__container container">
        <div class="page-header__breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/">Главная</a>
                <svg class="breadcrumb-arrow" width="6px" height="9px"><use xlink:href="/img/sprite.svg#arrow-rounded-right-6x9"></use></svg>
              </li>
              @foreach ($category->ancestors as $ancestor)
                @unless($ancestor->parent_id != NULL && $ancestor->children->count() > 0)
                  <li class="breadcrumb-item">
                    <a href="/c/{{ $ancestor->slug.'/'.$ancestor->id }}">{{ $ancestor->title }}</a>
                    <svg class="breadcrumb-arrow" width="6px" height="9px"><use xlink:href="/img/sprite.svg#arrow-rounded-right-6x9"></use></svg>
                  </li>
                @endunless
              @endforeach
              <li class="breadcrumb-item active" aria-current="page">{{ $category->title }}</li>
            </ol>
          </nav>
        </div>
        <br>
        <div class="page-header__title">
          <h1>{{ $category->title }}</h1>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="shop-layout shop-layout--sidebar--start">

        <!-- Sidebar -->
        <div class="shop-layout__sidebar">
          <div class="block block-sidebar block-sidebar--offcanvas--mobile">
            <div class="block-sidebar__backdrop"></div>
            <div class="block-sidebar__body">
              <div class="block-sidebar__header">
                <div class="block-sidebar__title">Фильтры</div>
                <button class="block-sidebar__close" type="button">
                  <svg width="20px" height="20px"><use xlink:href="/img/sprite.svg#cross-20"></use></svg>
                </button>
              </div>
              <div class="block-sidebar__item">
                <div class="widget-filters widget widget-filters--offcanvas--mobile" data-collapse data-collapse-opened-class="filter--opened">
                  <h4 class="widget-filters__title widget__title">Фильтр</h4>
                  <div class="widget-filters__list">
                    <form action="/с/{{ $category->slug.'-'.$category->id }}" method="get" id="filter">
                      {{ csrf_field() }}
                      <?php $options_id = session('options'); ?>
                      @foreach ($grouped as $data => $group)
                        <div class="widget-filters__item">
                          <div class="filter filter--opened" data-collapse-item>
                            <button type="button" class="filter__title" data-collapse-trigger>
                              {{ $data }}... <svg class="filter__arrow" width="12px" height="7px"><use xlink:href="/img/sprite.svg#arrow-rounded-down-12x7"></use></svg>
                            </button>
                            <div class="filter__body" data-collapse-content>
                              <div class="filter__container">
                                <div class="filter-list">
                                  <div class="filter-list__list">
                                    @foreach ($group as $option)
                                      <label class="filter-list__item ">
                                        <span class="filter-list__input input-check">
                                          <span class="input-check__body">
                                            <input class="input-check__input" type="checkbox" id="o{{ $option->id }}" name="options_id[]" value="{{ $option->id }}" @if(isset($options_id) AND in_array($option->id, $options_id)) checked @endif>
                                            <span class="input-check__box"></span>
                                            <svg class="input-check__icon" width="9px" height="7px"><use xlink:href="/img/sprite.svg#check-9x7"></use></svg>
                                          </span>
                                        </span>
                                        <span class="filter-list__title">{{ $option->title }}</span>
                                      </label>
                                    @endforeach
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </form>
                  </div>
                  <div class="widget-filters__actions d-flex">
                    <button type="submit" class="btn btn-primary btn-sm">Применить</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Content -->
        <div class="shop-layout__content">

          <!-- Products option -->
          <div class="products-view__options">
            <div class="view-options view-options--offcanvas--mobile">
              <div class="view-options__legend">Показано с {{ $products->firstItem().' по '.$products->lastItem().' из '.$products->total() }} товаров</div>
            </div>
          </div>

          <!-- Products list -->
          <div id="products">
            <div class="row custom-row">
              @foreach ($products as $product)
                <div class="col-6 col-lg-4">
                  <div class="product-card">
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
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>

            <!-- Pagination -->
            {{ $products->links() }}
          </div>
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

      $.ajax({
        type: "get",
        url: '/add-to-cart/'+productId,
        dataType: "json",
        data: {},
        success: function(data) {
          $('*[data-product-id="'+productId+'"]').replaceWith('<a href="/cart" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Перейти в корзину">Оплатить</a>');
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

    // Sort actions
    $('#actions').change(function() {

      var action = $(this).val();
      var page = $(location).attr('href').split('c/')[1];
      var slug = page.split('?')[0];

      $.ajax({
        type: "get",
        url: '/c/'.page,
        dataType: "json",
        data: {
          "action": action
        },
        success: function(data) {
          $('#products').html(data);
          // location.reload();
        }
      });
    });

    // Filter products
    $('#filter').on('click', 'input', function(e) {

      var optionsId = new Array();

      $('input[name="options_id[]"]:checked').each(function() {
        optionsId.push($(this).val());
      });

      // Value of catalog in href attribute
      var page = $(location).attr('href').split('c/')[1];
      var slug = page.split('?')[0];

      console.log(page, slug);

      $.ajax({
        type: 'get',
        url: '/c/' + slug,
        dataType: 'json',
        data: {
          'options_id': optionsId,
        },
        success: function(data) {
          $('#products').html(data);
        }
      });
    });
  </script>
@endsection
