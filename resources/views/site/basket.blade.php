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

      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="user">
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