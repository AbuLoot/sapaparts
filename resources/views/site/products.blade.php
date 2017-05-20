
<?php $items = session('items'); ?>
<?php $favorites = session('favorites'); ?>

<div class="row">
  @foreach ($products as $product)
    <div class="col-sm-4 col-md-4 col-xs-6">
      <div class="thumbnail">
        <a href="/goods/{{ $product->id.'-'.$product->slug }}">
          <img class="img-responsive center-block" src="/img/products/{{ $product->path.'/'.$product->image }}" alt="...">
        </a>
        <div class="caption">
          <h5><a href="/goods/{{ $product->id.'-'.$product->slug }}">{{ $product->title }}</a></h5>
          <p>Код: {{ $product->barcode }}</p>
          <p>OEM: {{ $product->oem }}</p>
          <p>Цена: {{ $product->price }} 〒</p>
        </div>
        @if(is_array($items) AND in_array($product->id, $items['products_id']))
          <a href="/basket" class="btn btn-basket btn-success" data-toggle="tooltip" data-placement="top" title="Перейти в корзину"><span class="glyphicon glyphicon-shopping-cart"></span> Оформить</a>
        @else
          <button class="btn btn-basket btn-danger" id="add-to-basket" data-basket-id="{{ $product->id }}"><span class="glyphicon glyphicon-shopping-cart"></span> В корзину</button>
        @endif

        @if(is_array($favorites) AND in_array($product->id, $favorites['products_id']))
          <button type="button" class="btn btn-like btn-default" id="toggle-favorite" data-favorite-id="{{ $product->id }}"><span class="glyphicon glyphicon-heart text-success"></span></button>
        @else
          <button type="button" class="btn btn-like btn-default" id="toggle-favorite" data-favorite-id="{{ $product->id }}"><span class="glyphicon glyphicon-heart"></span></button>
        @endif
      </div>
    </div>
  @endforeach
</div>

<!-- Pagination -->
<nav class="text-center" aria-label="Page navigation">
  {{ $products->links() }}
</nav>