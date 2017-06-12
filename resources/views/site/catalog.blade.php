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
          @include('site.products-render')
        </div>
      </div>

      <!-- Options -->
      <aside class="options-app col-md-3">

        <h4>Фильтр</h4>
        <form action="/filter-products" method="get" id="filter">
          @foreach ($options as $option)
            <div class="checkbox">
              <label><input type="checkbox" name="options_id[]" value="{{ $option->id }}"> {{ $option->title }}</label>
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

    $('button#add-to-basket').click(function(e){
      e.preventDefault();

      var productId = $(this).data("basket-id");

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
    });

    // Toggle Favorites
    $('.thumbnail').on('click', '#toggle-favorite', function(e){
      e.preventDefault();

      var productId = $(this).data("favorite-id");

      if (productId != '') {
        $.ajax({
          type: "get",
          url: '/toggle-favorite/'+productId,
          dataType: "json",
          data: {},
          success: function(data) {
            $('*[data-favorite-id="'+productId+'"]').replaceWith('<button type="button" class="btn btn-like btn-default" id="toggle-favorite" data-favorite-id="'+data.id+'"><span class="glyphicon glyphicon-heart '+data.cssClass+'"></span></button>');
          }
        });
      } else {
        alert("Ошибка сервера");
      }
    });
  </script>

  <script>
    // Filter products
    $('#filter').on('click', 'input', function() {

      var optionsId = new Array();
      var page = $(location).attr('href').split('catalog')[1];

      $('input[name="options_id[]"]:checked').each(function() {
        optionsId.push($(this).val());
      });

      localStorage.setItem("optionsId", JSON.stringify(optionsId));

      if (optionsId.length > 0) {
        $.ajax({
          type: "get",
          url: '/catalog' + page,
          dataType: "json",
          data: {
            "options_id": optionsId
          },
          success: function(data) {
            $('#products').html(data);
          }
        });
      } else {
        alert("Ошибка сервера");
      }
    });

    // Pagination
    // $(window).on('hashchange',function(){
      // page = window.location.hash.replace('#', '');

      // getProducts(page);
    // });

    $(document).on('click', '.pagination a', function(e){
      e.preventDefault();
      var page = $(this).attr('href').split('catalog')[1];

      if (localStorage.getItem("optionsId") === 'null') {
        var optionsId = new Array();
      } else {
        var optionsId = JSON.parse(localStorage.getItem("optionsId"));
      }

      getProducts(page, optionsId);
      // location.hash = page;
    });

    function getProducts(page, optionsId) {
      $.ajax({
        url : '/catalog' + page,
        dataType: 'json',
        data: {
          'options_id': optionsId
        }
      }).done(function (data) {
        $('#products').html(data);
        $('html, body').animate({ scrollTop: $('#catalog').offset().top }, 1000);
        // location.hash = page;
      }).fail(function () {
        alert('Продукты не загрузились');
      });
    }
  </script>
@endsection
