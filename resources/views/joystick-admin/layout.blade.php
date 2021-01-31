<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Joystick Admin</title>
    <meta name="description" content="Joystick Admin">
    <meta name="author" content="issayev.adilet@gmail.com">
    <link rel="icon" href="/joystick/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="/joystick/favicon.png" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/joystick/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/joystick/css/admin.css" rel="stylesheet">
    @yield('head')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" id="sidebarCollapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand text-uppercase" href="/admin"><i class="material-icons text-primary">sports_esports</i> <b>Joystick</b></a>
        </div>

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <i class="material-icons md-18">person_outline</i> {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Выйти') }} </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-7 col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li @if (Request::is('admin/pages*')) class="active" @endif><a href="/admin/pages"><i class="material-icons md-18">content_copy</i> Страницы</a></li>
            <li @if (Request::is('admin/news*')) class="active" @endif><a href="/admin/news"><i class="material-icons md-18">create</i> Новости</a></li>
            <li @if (Request::is('admin/section*')) class="active" @endif> <a href="/admin/section"><i class="material-icons md-18">dashboard</i> Разделы</a> </li>
            <li @if (Request::is('admin/categories*')) class="active" @endif><a href="/admin/categories"><i class="material-icons md-18">list</i> Категории</a></li>
            <li @if (Request::is('admin/products*')) class="active" @endif><a href="/admin/products"><i class="material-icons md-18">store</i> Продукты</a></li>
            <li @if (Request::is('admin/frame-filemanager*')) class="active" @endif><a href="/admin/frame-filemanager"><i class="material-icons md-18">folder</i> Файловый менеджер</a></li>
            <li @if (Request::is('admin/slide*')) class="active" @endif><a href="/admin/slide"><i class="material-icons md-18">collections</i> Слайд</a></li>
            <li @if (Request::is('admin/modes*')) class="active" @endif><a href="/admin/modes"><i class="material-icons md-18">style</i> Режимы</a></li>
            <li @if (Request::is('admin/options*')) class="active" @endif><a href="/admin/options"><i class="material-icons md-18">label_outline</i> Опции</a></li>
            <li @if (Request::is('admin/orders*')) class="active" @endif><a href="/admin/orders"><i class="material-icons md-18">shopping_cart</i> Заказы</a></li>
            <li @if (Request::is('admin/apps*')) class="active" @endif><a href="/admin/apps"><i class="material-icons md-18">send</i> Заявки</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li @if (Request::is('admin/companies*')) class="active" @endif><a href="/admin/companies"><i class="material-icons md-18">business</i> Компании</a></li>
            <li @if (Request::is('admin/countries*')) class="active" @endif><a href="/admin/countries"><i class="material-icons md-18">map</i> Страны</a></li>
            <li @if (Request::is('admin/cities*')) class="active" @endif><a href="/admin/cities"><i class="material-icons md-18">place</i> Города</a></li>
            <li @if (Request::is('admin/languages*')) class="active" @endif><a href="/admin/languages"><i class="material-icons md-18">language</i> Языки</a></li>
            <li @if (Request::is('admin/users*')) class="active" @endif><a href="/admin/users"><i class="material-icons md-18">people_outline</i> Пользователи</a></li>
            <li @if (Request::is('admin/roles*')) class="active" @endif><a href="/admin/roles"><i class="material-icons md-18">accessibility</i> Роли</a></li>
            <li @if (Request::is('admin/permissions*')) class="active" @endif><a href="/admin/permissions"><i class="material-icons md-18">lock_open</i> Права доступа</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons md-18">exit_to_app</i> Выйти</a>
            </li>
          </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          @yield('content')
        </div>
      </div>
    </div>

    <script src="/joystick/js/jquery.min.js"></script>
    <script src="/joystick/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
          $('.sidebar').toggleClass('active');
        });

        $('.main').on('click', function () {
          $('.sidebar').removeClass('active');
        });
      });
    </script>
    @yield('scripts')
  </body>
</html>
