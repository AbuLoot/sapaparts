@extends('layout')

@section('meta_title', 'Поиск')

@section('meta_description', 'Поиск')

@section('head')

@endsection

@section('content')

  <?php $items = session('items'); ?>
  <?php $favorite = session('favorite'); ?>

  <div class="site__body">
    <br>
    <div class="page-header__container container">
      <div class="page-header__title">
        <h1>Результат по запросу <b>"{{ $text }}"</b></h1>
      </div>
    </div>
    <!-- Products 1 -->
    <div class="container">
      <div class="row custom-row">
        @foreach ($products as $product)
          <div class="col-6 col-lg-3">
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

        <!-- Pagination -->
        {{ $products->links() }}
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
  </script>
@endsection