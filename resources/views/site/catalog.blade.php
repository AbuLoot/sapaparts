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

    <div class="row" id="catalog">
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
              <li><a href="#by-rating">По рейтингу</a></li>
              <li><a href="#by-low">Дешевые</a></li>
              <li><a href="#by-high">Дорогие</a></li>
            </ul>
          </div>
        </div>

        <?php $items = session('items'); ?>
        <?php $favorites = session('favorites'); ?>

        <!-- Catalog -->
        <div id="products">
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
                  @if (is_array($items) AND in_array($product->id, $items['products_id']))
                    <a href="/basket" class="btn btn-basket btn-success" data-toggle="tooltip" data-placement="top" title="Перейти в корзину"><span class="glyphicon glyphicon-shopping-cart"></span> Оформить</a>
                  @else
                    <button class="btn btn-basket btn-default" data-basket-id="{{ $product->id }}" onclick="addToBasket(this);"><span class="glyphicon glyphicon-shopping-cart"></span> В корзину</button>
                  @endif

                  @if (is_array($favorites) AND in_array($product->id, $favorites['products_id']))
                    <button type="button" class="btn btn-like btn-default" data-favorite-id="{{ $product->id }}" onclick="toggleFavorite(this);"><span class="glyphicon glyphicon-heart text-success"></span></button>
                  @else
                    <button type="button" class="btn btn-like btn-default" data-favorite-id="{{ $product->id }}" onclick="toggleFavorite(this);"><span class="glyphicon glyphicon-heart"></span></button>
                  @endif
                </div><br>
              </div>
            @endforeach
          </div>

          <!-- Pagination -->
          <nav class="text-center" aria-label="Page navigation">
            {{ $products->links() }}
          </nav>
        </div>
      </div>

      <!-- Options -->
      <aside class="options-app col-md-3">

        <h4>Фильтр</h4>
        <?php $options_id = session('options'); ?>
        <form action="/catalog/{{ $category->slug }}" method="get" id="filter">
          {{ csrf_field() }}
          @foreach ($options as $option)
            <div class="checkbox">
              <label><input type="checkbox" id="o{{ $option->id }}" name="options_id[]" value="{{ $option->id }}" @if(isset($options_id) AND in_array($option->id, $options_id)) checked @endif> {{ $option->title }}</label>
            </div>
          @endforeach
        </form>
      </aside>
    </div>
  </main>
@endsection

@section('scripts')
  <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })

    function addToBasket(i) {
      var productId = $(i).data("basket-id");

      if (productId != '') {
        $.ajax({
          type: "get",
          url: '/add-to-basket/'+productId,
          dataType: "json",
          data: {},
          success: function(data) {
            $('*[data-basket-id="'+productId+'"]').replaceWith('<a href="/basket" class="btn btn-basket btn-success" data-toggle="tooltip" data-placement="top" title="Перейти в корзину"><span class="glyphicon glyphicon-shopping-cart"></span> Оформить</a>');
            $('#count-items').text(data.countItems);
            alert('Товар добавлен в корзину');
          }
        });
      } else {
        alert("Ошибка сервера");
      }
    }

    function toggleFavorite (f) {
      var productId = $(f).data("favorite-id");

      if (productId != '') {
        $.ajax({
          type: "get",
          url: '/toggle-favorite/'+productId,
          dataType: "json",
          data: {},
          success: function(data) {
            $('*[data-favorite-id="'+productId+'"]').replaceWith('<button type="button" class="btn btn-like btn-default" data-favorite-id="'+data.id+'" onclick="toggleFavorite(this);"><span class="glyphicon glyphicon-heart '+data.cssClass+'"></span></button>');
          }
        });
      } else {
        alert("Ошибка сервера");
      }
    }
  </script>
  <script>
    // Filter products
    // $('#filter').on('click', 'input', function(e) {

    //   var optionsId = new Array();
    //   var page = $(location).attr('href').split('catalog')[1];

    //   $('input[name="options_id[]"]:checked').each(function() {
    //     optionsId.push($(this).val());
    //   });

    //   if (optionsId.length > 0) {
    //     $.ajax({
    //       type: "get",
    //       url: '/catalog' + page,
    //       dataType: "json",
    //       data: {
    //         "options_id": optionsId
    //       },
    //       success: function(data) {
    //         $('#products').html(data);
    //       }
    //     });
    //   } else {
    //     $.ajax({
    //       type: "get",
    //       url: '/catalog' + page,
    //       dataType: "json",
    //       success: function(data) {
    //         $('#products').html(data);
    //       }
    //     });
    //   }
    // });


    // Filter products
    $('#filter').on('click', 'input', function(e) {

      var optionsId = new Array();

      $('input[name="options_id[]"]:checked').each(function() {
        optionsId.push($(this).val());
      });

      var page = $(location).attr('href').split('catalog')[1];
      var slug = page.split('?')[0];

      $.ajax({
        type: 'get',
        url: '/catalog' + slug,
        dataType: 'json',
        data: {
          'options_id': optionsId,
        },
        success: function(data) {
          $('#products').html(data);
        }
      });
    });

    // $("body").on('click', '.pagination a', function(e) {
    //   e.preventDefault();
    //   var page = $(this).attr('href').split('catalog')[1];
    //   var optionsId = $('input[name="options_id[]"]:checked').map(function(){
    //         return this.value
    //     }).get();

    //   $.ajax({
    //     url : '/catalog' + page,
    //     dataType: 'json',
    //     data: {
    //       'options_id': optionsId
    //     }
    //   }).done(function (data) {
    //     $('#products').html(data);
    //     $('html, body').animate({ scrollTop: $('#catalog').offset().top }, 1000);
    //   }).fail(function () {
    //     alert('Продукты не загрузились');
    //   });
    // });
  </script>
@endsection
