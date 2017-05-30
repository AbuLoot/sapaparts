@extends('layout')

@section('content')

  <main class="container main">

    <ol class="breadcrumb">
      <li><a href="/">Главная</a></li>
      <li class="active">Корзина</li>
    </ol>

    <h1>Корзина <small>Оформление заказа</small></h1>

    <div>
      <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#user" aria-controls="user" role="tab" data-toggle="tab">User</a></li>
        <li><a href="#company" aria-controls="company" role="tab" data-toggle="tab">Company</a></li>
      </ul>

      <div class="tab-content well">
        <div role="tabpanel" class="tab-pane active" id="user">
          <form action="/order" method="post" class="" id="order-form">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name">Имя</label>
              <input type="text" class="form-control" placeholder="Имя *" name="name" id="name" value="{{ old('name') }}" minlength="2" maxlength="40" required>
              @if ($errors->has('name'))
                <span class="help-block text-danger">{{ $errors->first('name') }}</span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
              <label for="phone">Телефона</label>
              <input type="tel" class="form-control" placeholder="Телефона *" name="phone" id="phone" value="{{ old('phone') }}" minlength="5" maxlength="20" required>
              @if ($errors->has('phone'))
                <span class="help-block text-danger">{{ $errors->first('phone') }}</span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email">Email</label>
              <input type="email" class="form-control" placeholder="Email *" name="email" id="email" value="{{ old('email') }}" required>
              @if ($errors->has('email'))
                <span class="help-block text-danger">{{ $errors->first('email') }}</span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
              <label for="address">Адрес</label>
              <input type="text" class="form-control" placeholder="Адрес *" name="address" id="address" value="{{ old('address') }}" minlength="2" maxlength="40" required>
              @if ($errors->has('address'))
                <span class="help-block text-danger">{{ $errors->first('address') }}</span>
              @endif
            </div>

            <p>Итого: <b>{{ $products->sum('price') }} ₸</b></p>
            <button type="submit" class="btn btn-primary text-uppercase">Заказать</button>
          </form>
        </div>

        <div role="tabpanel" class="tab-pane" id="company">
          <form class="form-inline">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" placeholder="Jane Doe">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="jane.doe@example.com">
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-condensed">
        <thead>
          <tr class="active">
            <td>Название</td>
            <td>Цена</td>
            <td>Количество</td>
            <td>Сумма</td>
            <td class="text-right">Действие</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
            <tr>
              <td>
                <img src="/img/products/{{ $product->path.'/'.$product->image }}" style="width:80px;height:80px;">
                <a href="/goods/{{ $product->id.'/'.$product->slug }}">{{ $product->title }}</a>
              </td>
              <td>{{ $product->price }}</td>
              <td><input type="number" class="form-control" name="count" value="1"></td>
              <td>{{ $product->sum }}</td>
              <td class="text-right">
                <form method="POST" action="/basket/{{ $product->id }}" accept-charset="UTF-8" class="btn-delete">
                  <input name="_method" type="hidden" value="DELETE">
                  <input name="_token" type="hidden" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-link btn-xs" onclick="return confirm('Удалить запись?')">
                    <span class="glyphicon glyphicon-remove"></span>
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @if ($products->count() > 0)
      <h4 class="text-right"><a href="/clear-basket">Очистить корзину?</a></h4>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>Итого: <b>{{ $products->sum('price') }} ₸</b></p>
          <a href="/order" class="btn btn-primary text-uppercase">Оформить заказ</a>
        </div>
      </div>
    @endif
  </main>

@endsection