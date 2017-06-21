@extends('joystick-admin.layout')

@section('content')
  <h2 class="page-header">Редактирование</h2>

  @include('joystick-admin.partials.alerts')

  <p class="text-right">
    <a href="/admin/orders" class="btn btn-primary btn-sm">Назад</a>
  </p>
  <form action="{{ route('orders.update', $order->id) }}" method="post">
    <input type="hidden" name="_method" value="PUT">
    {!! csrf_field() !!}

    <div class="form-group">
      <label for="name">Имя:</label>
      <input type="text" class="form-control" name="name" id="name" minlength="2" maxlength="60" value="{{ $order->name }}" required>
    </div>
    <div class="form-group">
      <label for="phone">Номера телефона</label>
      <input type="text" class="form-control" id="phone" name="phone" value="{{ (old('phone')) ? old('phone') : $order->phone }}">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" id="email" minlength="8" maxlength="60" value="{{ $order->email }}" required>
    </div>
    <div class="form-group">
      <label for="company_name">Название компаний</label>
      <textarea class="form-control" id="company_name" name="company_name" rows="5">{{ (old('company_name')) ? old('company_name') : $order->company_name }}</textarea>
    </div>
    <div class="form-group">
      <label for="data_1">Данные 1</label>
      <input type="text" class="form-control" id="data_1" name="data_1" value="{{ (old('data_1')) ? old('data_1') : $order->data_1 }}">
    </div>
    <div class="form-group">
      <label for="data_2">Данные 2</label>
      <input type="text" class="form-control" id="data_2" name="data_2" value="{{ (old('data_2')) ? old('data_2') : $order->data_2 }}">
    </div>
    <div class="form-group">
      <label for="data_3">Данные 3</label>
      <input type="text" class="form-control" id="data_3" name="data_3" value="{{ (old('data_3')) ? old('data_3') : $order->data_3 }}">
    </div>
    <div class="form-group">
      <label for="countries">Страны</label>
      <select id="country_id" name="country_id" class="form-control" required>
        <option value=""></option>
      </select>
    </div>
    <div class="form-group">
      <label for="legal_address">Юридический адрес</label>
      <input type="text" class="form-control" id="legal_address" name="legal_address" value="{{ (old('legal_address')) ? old('legal_address') : $order->legal_address }}">
    </div>
    <div class="form-group">
      <label for="address">Адрес</label>
      <input type="text" class="form-control" id="address" name="address" value="{{ (old('address')) ? old('address') : $order->address }}">
    </div>
    <div class="form-group">
      <label for="count">Количество товаров</label>
      <input type="text" class="form-control" id="count" name="count" value="{{ (old('count')) ? old('count') : $order->count }}">
    </div>
    <div class="form-group">
      <label for="price">Цена</label>
      <input type="text" class="form-control" id="price" name="price" value="{{ (old('price')) ? old('price') : $order->price }}">
    </div>
    <div class="form-group">
      <label for="amount">Сумма</label>
      <input type="text" class="form-control" id="amount" name="amount" value="{{ (old('amount')) ? old('amount') : $order->amount }}">
    </div>
    <div class="form-group">
      <label for="delivery">Способ доставки:</label>

    </div>
    <div class="form-group">
      <label for="payment_type">Способ оплаты:</label>

    </div>
    <div class="form-group">
      <label for="lang">Язык</label>
      <select id="lang" name="lang" class="form-control" required>
        <option value=""></option>
      </select>
    </div>
    <div class="form-group">
      <label for="status">Статус:</label>
      <label>
        <input type="checkbox" id="status" name="status" @if ($order->status == 1) checked @endif> Активен
      </label>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Изменить</button>
    </div>
  </form>
@endsection
