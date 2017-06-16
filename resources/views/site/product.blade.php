@extends('layout')

@section('title_description', $product->title_description)

@section('meta_description', $product->meta_description)

@section('content')

  <main class="container main">

    <ol class="breadcrumb">
      <li><a href="/">Главная</a></li>
      <li><a href="/catalog/{{ $product->category->slug }}">{{ $product->category->title }}</a></li>
      <li class="active">{{ $product->title }}</li>
    </ol>

    <div class="row">
      <section class="col-sm-1 col-md-1">
        <ol class="list-unstyled">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active">
            <a href="#" class="thumbnail">
              <img src="/img/no-image-mini.png" class="img-responsive">
            </a>
          </li>
          <li data-target="#carousel-example-generic" data-slide-to="1">
            <a href="#" class="thumbnail">
              <img src="/img/1.jpg" class="img-responsive">
            </a>
          </li>
          <li data-target="#carousel-example-generic" data-slide-to="2">
            <a href="#" class="thumbnail">
              <img src="/img/2.jpg" class="img-responsive">
            </a>
          </li>
          <li data-target="#carousel-example-generic" data-slide-to="3">
            <a href="#" class="thumbnail">
              <img src="/img/sapaparts.png" class="img-responsive">
            </a>
          </li>
        </ol>
      </section>
      <section class="col-sm-5 col-md-5">
        <div id="carousel-example-generic" class="carousel" data-ride="carousel" data-interval="false">
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <div class="thumbnail">
                <img src="/img/no-image-big.png" class="img-responsive">
              </div>
            </div>
            <div class="item">
              <div class="thumbnail">
                <img src="/img/1.jpg" class="img-responsive">
              </div>
            </div>
            <div class="item">
              <div class="thumbnail">
                <img src="/img/2.jpg" class="img-responsive">
              </div>
            </div>
            <div class="item">
              <div class="thumbnail">
                <img src="/img/sapaparts.png" class="img-responsive">
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="col-sm-6 col-md-6">
        <h1>{{ $product->title }}</h1>
        <table class="table">
          <tbody>
            <tr>
              <td>Код товара:</td>
              <td>{{ $product->barcode }}</td>
            </tr>
            <tr>
              <td>OEM:</td>
              <td>{{ $product->oem }}</td>
            </tr>
            <tr>
              <td>Применение:</td>
              <td></td>
            </tr>
            <tr>
              <td>Объем:</td>
              <td>{{ $product->capacity }}</td>
            </tr>
            <tr>
              <td>Вес:</td>
              <td>{{ $product->weight }}</td>
            </tr>
            <tr>
              <td>Доступность:</td>
              <td>Предзаказ</td>
            </tr>
          </tbody>
        </table>

        <h2>{{ $product->price }} 〒</h2>

        <?php $items = session('items'); ?>

        @if(is_array($items) AND in_array($product->id, $items['products_id']))
          <a href="/basket" class="btn btn-basket btn-success" data-toggle="tooltip" data-placement="top" title="Перейти в корзину"><span class="glyphicon glyphicon-shopping-cart"></span> Оформить</a>
        @else
          <button class="btn btn-basket btn-danger" id="add-to-basket" data-id="{{ $product->id }}"><span class="glyphicon glyphicon-shopping-cart"></span> В корзину</button>
        @endif
      </section>
      <div class="clearfix"></div>

      <section class="col-md-6">
        <h3>Описание</h3>
        {{ $product->description }}
      </section>
      <section class="col-md-6">
        <h3>Характеристика</h3>
        {{ $product->charasteristic }}
      </section>

      <!-- Reviews -->
      <section class="col-md-12"><br>
        <h3>Отзывы</h3>
        <div class="media"><hr>
          <div class="media-body">
            <div>
              <span class="glyphicon glyphicon-star text-warning"></span>
              <span class="glyphicon glyphicon-star text-warning"></span>
              <span class="glyphicon glyphicon-star text-warning"></span>
              <span class="glyphicon glyphicon-star text-warning"></span>
              <span class="glyphicon glyphicon-star text-muted"></span>
            </div>
            <h4 class="media-heading">Middle aligned media</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
        </div>
        <div class="media"><hr>
          <div class="media-body">
            <div>
              <span class="glyphicon glyphicon-star text-warning"></span>
              <span class="glyphicon glyphicon-star text-warning"></span>
              <span class="glyphicon glyphicon-star text-warning"></span>
              <span class="glyphicon glyphicon-star text-warning"></span>
              <span class="glyphicon glyphicon-star text-warning"></span>
            </div>
            <h4 class="media-heading">Middle aligned media</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
        </div>
        <hr>
      </section>

      <form class="col-md-6">
        <h3>Добавьте отзыв о товаре</h3>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Введите имя">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Введите email">
        </div>
        <div class="form-group">
          <select class="form-control">
            <option>1 звезда</option>
            <option>2 звезды</option>
            <option>3 звезды</option>
            <option>4 звезды</option>
            <option>5 звезд</option>
          </select>
        </div>
        <div class="form-group">
          <textarea class="form-control" rows="3" placeholder="Комментарий"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Добавить</button>
      </form>
    </div>
  </main>

@endsection

@section('scripts')
  <script>
    function addToBasket(i) {

      var productId = $(this).data("id");

      if (productId != '') {
        $.ajax({
          type: "get",
          url: '/add-to-basket/'+productId,
          dataType: "json",
          data: {},
          success: function(data) {
            console.log(data);
            $('*[data-id="'+productId+'"]').replaceWith('<a href="/basket" class="btn btn-basket btn-success" data-toggle="tooltip" data-placement="top" title="Перейти в корзину"><span class="glyphicon glyphicon-shopping-cart"></span> Оформить</a>');
            $('#count-items').text(data.countItems);
            alert('Товар добавлен в корзину');
          }
        });
      } else {
        alert("Ошибка сервера");
      }
    };

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
@endsection
