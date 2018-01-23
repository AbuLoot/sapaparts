@extends('layout')

@section('title_description', $page->title_description)

@section('meta_description', $page->meta_description)

@section('content')

  <main class="container main">

    <ol class="breadcrumb">
      <li><a href="/">Главная</a></li>
      <li class="active">{{ $page->title }}</li>
    </ol>

    <div class="row">
      <section class="col-md-offset-2 col-md-8">

        <h1 class="text-center">{{ $page->title }}</h1><br>

        {!! $page->content !!}

        <ul class="list-unstyled">
          @foreach ($files as $file)
            <li><a href="/{{ $file }}" class="h4" target="_blank"><span class="glyphicon glyphicon-file"></span> {{ $file }}</a></li><br>
          @endforeach
        </ul>

      </section>
    </div>
  </main>

@endsection