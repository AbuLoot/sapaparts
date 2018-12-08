
    <!-- Recent products -->
    <section class="row">
      <div class="container">

        <h2>Похожие товары</h2>
        @foreach($recent_products as $recent_product)
          <div class="col-sm-3 col-md-3 col-xs-6">
            <div class="thumbnail">
              <a href="/goods/{{ $recent_product->id.'-'.$recent_product->slug }}">
                <img class="img-responsive center-block" src="/img/products/{{ $recent_product->path.'/'.$recent_product->image }}" alt="...">
              </a>
              <div class="caption">
                <h5><a href="/goods/{{ $recent_product->id.'-'.$recent_product->slug }}">{{ $recent_product->title }}</a></h5>
                <p>Код: {{ $recent_product->barcode }}</p>
                <p>OEM: {{ $recent_product->oem }}</p>
                <p>Цена: {{ $recent_product->price }} 〒</p>
              </div>
              @if (is_array($items) AND in_array($recent_product->id, $items['products_id']))
                <a href="/basket" class="btn btn-basket btn-success" data-toggle="tooltip" data-placement="top" title="Перейти в корзину"><span class="glyphicon glyphicon-shopping-cart"></span> Оформить</a>
              @else
                <button class="btn btn-basket btn-default" data-basket-id="{{ $recent_product->id }}" onclick="addToBasket(this);"><span class="glyphicon glyphicon-shopping-cart"></span> В корзину</button>
              @endif

              @if (is_array($favorites) AND in_array($recent_product->id, $favorites['products_id']))
                <button type="button" class="btn btn-like btn-default" data-favorite-id="{{ $recent_product->id }}" onclick="toggleFavorite(this);"><span class="glyphicon glyphicon-heart text-success"></span></button>
              @else
                <button type="button" class="btn btn-like btn-default" data-favorite-id="{{ $recent_product->id }}" onclick="toggleFavorite(this);"><span class="glyphicon glyphicon-heart"></span></button>
              @endif
            </div>
          </div>
        @endforeach

      </div>
    </section>