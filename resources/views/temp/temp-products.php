
        @foreach($mode_new->products->where('status', 1)->take(8) as $new_product)
          <div class="col-6 col-lg-3">
            <div class="product-card ">
              @foreach($new_product->modes as $m)
                <div class="product-card__badges-list">
                  @if(in_array($m->slug, ['recommend', 'new', 'best-price', 'stock', 'plus-gift']))
                    <div class="product-card__badge product-card__badge--{{ $m->slug }}">{{ $m->title }}</div>
                  @endif
                </div>
              @endforeach
              <div class="product-card__image">
                <a href="/p/{{ $new_product->id.'-'.$new_product->slug }}"><img src="/img/products/{{ $new_product->path.'/'.$new_product->image }}" alt="{{ $new_product->title }}"></a>
              </div>
              <div class="product-card__info">
                <div class="product-card__name">
                  <a href="/p/{{ $new_product->id.'-'.$new_product->slug }}">{{ $new_product->title }}</a>
                </div>
              </div>
              <div class="product-card__actions">
                <div class="product-card__prices">{{ $new_product->price }}</div>
                <div class="product-card__buttons">
                  @if (is_array($items) AND isset($items['products_id'][$new_product->id]))
                    <a href="/cart" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Перейти в корзину">Оплатить</a>
                  @else
                    <button class="btn btn-primary btn-sm" type="button" data-product-id="{{ $new_product->id }}" onclick="addToCart(this);" title="Добавить в корзину">В корзину</button>
                  @endif

                  <button class="btn btn-light btn-sm d-none d-sm-block <?php if(is_array($favorite) AND in_array($new_product->id, $favorite['products_id'])) echo 'btn-liked'; ?>" type="button" data-favourite-id="{{ $new_product->id }}" onclick="toggleFavourite(this);">
                    <svg width="16px" height="16px"><use xlink:href="/img/sprite.svg#wishlist-16"></use></svg>
                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        @endforeach