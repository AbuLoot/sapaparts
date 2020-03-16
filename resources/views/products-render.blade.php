<?php $items = session('items'); ?>
<?php $favorites = session('favorites'); ?>

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
  @endforeach
</div>

<!-- Pagination -->
{{ $products->links() }}