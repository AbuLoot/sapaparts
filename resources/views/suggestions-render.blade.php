<ul class="suggestions__list">
  @foreach ($products as $product)
    <li class="suggestions__item">
      <a class="suggestions__item-link" href="/p/{{ $product->id.'-'.$product->slug }}">
        <div class="suggestions__item-image">
          <img src="/img/products/{{ $product->path.'/'.$product->image }}">
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