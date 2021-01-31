<ul class="suggestions__list">
  @foreach ($products as $product)
    <li class="suggestions__item">
      <a class="suggestions__item-link" href="/p/{{ $product->id.'-'.$product->slug }}">
        <div class="suggestions__item-image">
          @if ($product->images == true)
            <?php $images = unserialize($product->images); ?>
            <img src="/img/products/{{ $product->path.'/'.$images[0]['mini_image'] }}">
          @else
            <img src="/img/no-image-mini.png">
          @endif
        </div>
        <div class="suggestions__item-info">
          <div class="suggestions__item-name">{{ $product->title }}</div>
          <div class="suggestions__item-meta">КОД: {{ $product->barcode }}, OEM: {{ $product->oem }}</div>
        </div>
        <div class="suggestions__item-price">{{ $product->price }}〒</div>
      </a>
    </li>
  @endforeach
</ul>