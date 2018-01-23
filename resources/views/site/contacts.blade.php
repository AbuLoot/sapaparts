@extends('layout')

@section('title_description', $page->title_description)

@section('meta_description', $page->meta_description)

@section('head')

@endsection

@section('content')

  <main class="container main">

    <ol class="breadcrumb">
      <li><a href="/">Главная</a></li>
      <li class="active">{{ $page->title }}</li>
    </ol>

    <div class="row">
      <section class="col-md-offset-2 col-md-8">

        <h1 class="text-center">{{ $page->title }}</h1>

        {!! $page->content !!}

      </section>
    </div>
  </main>

  <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A92e5f31fdbbf7c8031517b5d52b6d604213c5e9aafbb205dd440ec05d44ef7e0&amp;width=100%25&amp;height=500&amp;lang=ru_RU&amp;scroll=false"></script>

@endsection
