@extends('layout')

@section('meta_title', 'Корзина')

@section('meta_description', 'Корзина')

@section('head')

@endsection

@section('content')

  <?php $items = session('items'); ?>

  <div class="site__body">
    <div class="page-header">
      <div class="page-header__container container">
        <br>
        <div class="page-header__title">
          <h1>Корзина</h1>
        </div>
      </div>
    </div>
    <div class="cart block">
      <div class="container">
        @if ($products->count() > 0)
          <table class="cart__table cart-table">
            <thead class="cart-table__head">
              <tr class="cart-table__row">
                <th class="cart-table__column cart-table__column--image">Картинка</th>
                <th class="cart-table__column cart-table__column--product">Продукт</th>
                <th class="cart-table__column cart-table__column--price">Цена</th>
                <th class="cart-table__column cart-table__column--quantity">Количество</th>
                <th class="cart-table__column cart-table__column--total">Сумма</th>
                <th class="cart-table__column cart-table__column--remove"></th>
              </tr>
            </thead>
            <tbody class="cart-table__body">
              @foreach ($products as $product)
                <tr class="cart-table__row">
                  <td class="cart-table__column cart-table__column--image">
                    <a href="/p/{{ $product->slug }}"><img src="/img/products/{{ $product->path.'/'.$product->image }}"></a>
                  </td>
                  <td class="cart-table__column cart-table__column--product">
                    <a href="/p/{{ $product->slug }}" class="cart-table__product-name">{{ $product->title }}</a>
                    <ul class="cart-table__options">
                      <li>Код товара: {{ $product->barcode }}</li>
                      <li>Производитель: 
                        @foreach($product->options as $option)
                          {{ $option->title }}
                        @endforeach
                      </li>
                    </ul>
                  </td>
                  <td class="cart-table__column cart-table__column--price" data-title="Price">{{ $product->price }}〒</td>
                  <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                    <div class="input-number">
                      <input class="form-control input-number__input" name="quantity[{{ $product->id }}]" type="number" min="1" value="{{ $items['products_id'][$product->id]['quantity'] }}">
                      <div class="input-number__add"></div>
                      <div class="input-number__sub"></div>
                    </div>
                  </td>
                  <td class="cart-table__column cart-table__column--total" data-title="Total">{{ ($product->price * $items['products_id'][$product->id]['quantity']) }}〒</td>
                  <td class="cart-table__column cart-table__column--remove">
                    <a href="/destroy-from-cart/{{ $product->id }}" class="btn btn-light btn-sm btn-svg-icon" onclick="return confirm('Удалить запись?')">
                      <svg width="12px" height="12px"><use xlink:href="images/sprite.svg#cross-12"></use></svg>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="cart__actions">
            <form class="cart__coupon-form">
              <label for="input-coupon-code" class="sr-only">Password</label>
              <input type="text" class="form-control" id="input-coupon-code" placeholder="Coupon Code">
              <button type="submit" class="btn btn-primary">Apply Coupon</button>
            </form>
            <div class="cart__buttons">
              <a href="index.html" class="btn btn-light">Continue Shopping</a>
              <a href="" class="btn btn-primary cart__update-button">Update Cart</a>
            </div>
          </div>
          <div class="row justify-content-end pt-5">
            <div class="col-12 col-md-7 col-lg-6 col-xl-5">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Cart Totals</h3>
                  <table class="cart__totals">
                    <thead class="cart__totals-header">
                      <tr>
                        <th>Subtotal</th>
                        <td>$5,877.00</td>
                      </tr>
                    </thead>
                    <tbody class="cart__totals-body">
                      <tr>
                        <th>Shipping</th>
                        <td>
                          $25.00
                          <div class="cart__calc-shipping"><a href="#">Calculate Shipping</a></div>
                        </td>
                      </tr>
                      <tr>
                        <th>Tax</th>
                        <td>
                          $0.00
                        </td>
                      </tr>
                    </tbody>
                    <tfoot class="cart__totals-footer">
                      <tr>
                        <th>Total</th>
                        <td>$5,902.00</td>
                      </tr>
                    </tfoot>
                  </table>
                  <a class="btn btn-primary btn-xl btn-block cart__checkout-button" href="checkout.html">Proceed to checkout</a>
                </div>
              </div>
            </div>
          </div>
        @else
          <h2>Корзина пуста</h2>
          <p><a href="/" class="btn btn-primary btn-lg">Перейти к покупкам</a></p>
        @endif
      </div>
    </div>
  </div>

@endsection


@section('scripts')
  <script>

  </script>
@endsection