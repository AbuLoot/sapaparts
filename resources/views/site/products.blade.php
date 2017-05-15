@extends('layout')

@section('title_description', $category->title_description)

@section('meta_description', $category->meta_description)

@section('content')

  <main class="container main">

    <ol class="breadcrumb">
      <li><a href="/">Главная</a></li>
      <li class="active">{{ $category->title }}</li>
    </ol>

    <h1>{{ $category->title }} <small>{{ $category->title_description }}</small></h1>
    <hr>

    <div class="row">
      <div class="col-md-9">

        <!-- Sort panel -->
        <div class="sort">
          <span>
            <span class="sort-view-title hidden-xs">Вид: </span>
            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Сетка"><span class="glyphicon glyphicon-th"></span></button>
            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Список"><span class="glyphicon glyphicon-th-list"></span></button>
          </span>

          <div class="dropdown pull-right">
            Показать:
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownSort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              По рейтингу <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownSort">
              <li><a href="#">По рейтингу</a></li>
              <li><a href="#">Дешевые</a></li>
              <li><a href="#">Дорогие</a></li>
            </ul>
          </div>
        </div>

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

        <!-- Pagination -->
        <nav class="text-center" aria-label="Page navigation">
          {{ $products->links() }}
        </nav>
      </div>

      <!-- Options -->
      <aside class="options-app col-md-3">

        <h4>Фильтр</h4>
        @foreach ($options as $option)
          <div class="checkbox">
            <label><input type="checkbox" value=""> {{ $option->title }}</label>
          </div>
        @endforeach
      </aside>
    </div>
  </main>

@endsection

@section('scripts')
  <script>
    $('button#add-to-cart').click(function(e){
      e.preventDefault();

      var productId = $(this).data("id");

      if (productId != '') {
        $.ajax({
          type: "get",
          url: '/cart/'+productId,
          dataType: "json",
          data: {},
          success: function(data) {
            console.log(data);
            $('*[data-id="'+productId+'"]').replaceWith('<a href="/basket" class="btn btn-cart btn-success" data-toggle="tooltip" data-placement="top" title="Перейти в корзину">Оформить <span class="glyphicon glyphicon-shopping-cart"></span></a>');
            $('#count-items').text(data.countItems);
            alert('Товар добавлен в корзину');
          }
        });
      } else {
        alert("Ошибка сервера");
      }
    });

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
@endsection
