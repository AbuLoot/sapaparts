@extends('layout')

@section('content')

  <main class="container main">

    <ol class="breadcrumb">
      <li><a href="/">Главная</a></li>
      <li class="active">Поиск по сайту</li>
    </ol>

    <h1>Поиск по сайту</h1>

    <div class="row">
      <div class="col-md-9">

        <?php $items = session('items'); ?>

        <!-- Catalog -->
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
                  <a href="/basket" class="btn btn-cart btn-success" data-toggle="tooltip" data-placement="top" title="Перейти в корзину">Оформить <span class="glyphicon glyphicon-shopping-cart"></span></a>
                @else
                  <button class="btn btn-cart btn-danger" id="add-to-cart" data-id="{{ $product->id }}"><span class="glyphicon glyphicon-shopping-cart"></span> В корзину</button>
                @endif
                <button type="button" class="btn btn-like btn-default"><span class="glyphicon glyphicon-heart"></span></button>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

  </main>

@endsection
