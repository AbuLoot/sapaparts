@extends('layout')

@section('content')

    <!-- Slides -->
    <section id="carousel-trucks" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-trucks" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-trucks" data-slide-to="1"></li>
      </ol>

      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="img/bg1.png" class="center-block" alt="...">
          <div class="carousel-caption">
            <h1>Магазин запчастей "SapaParts" в Казахстане</h1>
            <p class="short-description"></p>
            <img src="img/arrow-down.png" class="arrow-down">
          </div>
        </div>
        <div class="item">
          <img src="img/bg3.png" class="center-block" alt="...">
          <div class="carousel-caption">
            <h1>Магазин запчастей "SapaParts" в Казахстане</h1>
            <p class="short-description"></p>
            <img src="img/arrow-down.png" class="arrow-down">
          </div>
        </div>
      </div>
    </section>

    <!-- New products -->
    <section class="new-products">
      <div class="container">

        <h2>Новые товары</h2>

        <article id="new_products" class="carousel slide" data-ride="carousel" data-interval="false">
          <div class="carousel-inner" role="listbox">

            <!-- Carousel control -->
            <div class="products-control" role="group" aria-label="...">
              <a class="left-arrow" href="#new_products" data-slide="prev"><span class="glyphicon glyphicon-menu-left"></span></a>
              <a class="right-arrow" href="#new_products" data-slide="next"><span class="glyphicon glyphicon-menu-right"></span></a>
            </div>

            <?php $items = session('items'); ?>
            <?php $favorites = session('favorites'); ?>

            @foreach ($new_products->chunk(4) as $key => $chunk)
              <div class="item @if($key == '0') active @endif">
                <div class="row">
                  @foreach ($chunk as $new_product)
                    <div class="col-sm-3 col-md-3 col-xs-6">
                      <div class="thumbnail">
                        <a href="/goods/{{ $new_product->id.'-'.$new_product->slug }}">
                          <img class="img-responsive center-block" src="/img/products/{{ $new_product->path.'/'.$new_product->image }}" alt="...">
                        </a>
                        <div class="caption">
                          <h5><a href="/goods/{{ $new_product->id.'-'.$new_product->slug }}">{{ $new_product->title }}</a></h5>
                          <p>Код: {{ $new_product->barcode }}</p>
                          <p>OEM: {{ $new_product->oem }}</p>
                          <p>Цена: {{ $new_product->price }} 〒</p>
                        </div>
                        @if (is_array($items) AND in_array($new_product->id, $items['products_id']))
                          <a href="/basket" class="btn btn-basket btn-success" data-toggle="tooltip" data-placement="top" title="Перейти в корзину"><span class="glyphicon glyphicon-shopping-cart"></span> Оформить</a>
                        @else
                          <button class="btn btn-basket btn-default" data-basket-id="{{ $new_product->id }}" onclick="addToBasket(this);"><span class="glyphicon glyphicon-shopping-cart"></span> В корзину</button>
                        @endif

                        @if (is_array($favorites) AND in_array($new_product->id, $favorites['products_id']))
                          <button type="button" class="btn btn-like btn-default" data-favorite-id="{{ $new_product->id }}" onclick="toggleFavorite(this);"><span class="glyphicon glyphicon-heart text-success"></span></button>
                        @else
                          <button type="button" class="btn btn-like btn-default" data-favorite-id="{{ $new_product->id }}" onclick="toggleFavorite(this);"><span class="glyphicon glyphicon-heart"></span></button>
                        @endif
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            @endforeach
          </div>
        </article>
      </div>
    </section>

    <!-- Brands -->
    <section class="brands">
      <div class="container">
        <h2>Партнеры</h2>
        <ul class="brands-logo nav-justified list-unstyled">
          @foreach ($companies as $company)
            <li><a href="#"><img src="/img/companies/{{ $company->logo }}" class="center-block img-responsive"></a><br></li>
          @endforeach
        </ul>
      </div>
    </section>

    <!-- Last products -->
    <section class="last-products">
      <div class="container">

        <h3 class="h2">Актуальные товары</h3>

        <article id="top_products" class="carousel slide" data-ride="carousel" data-interval="false">
          <div class="carousel-inner" role="listbox">

            <!-- Carousel control -->
            <div class="products-control" role="group" aria-label="...">
              <a class="left-arrow" href="#top_products" data-slide="prev"><span class="glyphicon glyphicon-menu-left"></span></a>
              <a class="right-arrow" href="#top_products" data-slide="next"><span class="glyphicon glyphicon-menu-right"></span></a>
            </div>

            @foreach ($top_products->chunk(4) as $key => $chunk)
              <div class="item @if($key == '0') active @endif">
                <div class="row">
                  @foreach ($chunk as $last_product)
                    <div class="col-sm-3 col-md-3 col-xs-6">
                      <div class="thumbnail">
                        <a href="/goods/{{ $last_product->id.'-'.$last_product->slug }}">
                          <img class="img-responsive center-block" src="/img/products/{{ $last_product->path.'/'.$last_product->image }}" alt="...">
                        </a>
                        <div class="caption">
                          <h5><a href="/goods/{{ $last_product->id.'-'.$last_product->slug }}">{{ $last_product->title }}</a></h5>
                          <p>Код: {{ $last_product->barcode }}</p>
                          <p>OEM: {{ $last_product->oem }}</p>
                          <p>Цена: {{ $last_product->price }} 〒</p>
                        </div>
                        @if (is_array($items) AND in_array($last_product->id, $items['products_id']))
                          <a href="/basket" class="btn btn-basket btn-success" data-toggle="tooltip" data-placement="top" title="Перейти в корзину"><span class="glyphicon glyphicon-shopping-cart"></span> Оформить</a>
                        @else
                          <button class="btn btn-basket btn-default" data-basket-id="{{ $last_product->id }}" onclick="addToBasket(this);"><span class="glyphicon glyphicon-shopping-cart"></span> В корзину</button>
                        @endif

                        @if (is_array($favorites) AND in_array($last_product->id, $favorites['products_id']))
                          <button type="button" class="btn btn-like btn-default" data-favorite-id="{{ $last_product->id }}" onclick="toggleFavorite(this);"><span class="glyphicon glyphicon-heart text-success"></span></button>
                        @else
                          <button type="button" class="btn btn-like btn-default" data-favorite-id="{{ $last_product->id }}" onclick="toggleFavorite(this);"><span class="glyphicon glyphicon-heart"></span></button>
                        @endif
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            @endforeach
          </div>
        </article>
      </div>
    </section>

@endsection

@section('scripts')
  <script>
    function addToBasket(i) {
      var productId = $(i).data("basket-id");

      if (productId != '') {
        $.ajax({
          type: "get",
          url: '/add-to-basket/'+productId,
          dataType: "json",
          data: {},
          success: function(data) {
            $('*[data-basket-id="'+productId+'"]').replaceWith('<a href="/basket" class="btn btn-basket btn-success" data-toggle="tooltip" data-placement="top" title="Перейти в корзину"><span class="glyphicon glyphicon-shopping-cart"></span> Оформить</a>');
            $('#count-items').text(data.countItems);
            alert('Товар добавлен в корзину');
          }
        });
      } else {
        alert("Ошибка сервера");
      }
    }

    function toggleFavorite (f) {
      var productId = $(f).data("favorite-id");

      if (productId != '') {
        $.ajax({
          type: "get",
          url: '/toggle-favorite/'+productId,
          dataType: "json",
          data: {},
          success: function(data) {
            $('*[data-favorite-id="'+productId+'"]').replaceWith('<button type="button" class="btn btn-like btn-default" data-favorite-id="'+data.id+'" onclick="toggleFavorite(this);"><span class="glyphicon glyphicon-heart '+data.cssClass+'"></span></button>');
          }
        });
      } else {
        alert("Ошибка сервера");
      }
    }
  </script>
@endsection
