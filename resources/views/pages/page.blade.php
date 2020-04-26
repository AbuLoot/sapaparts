@extends('layout')

@section('meta_title', $page->meta_title ?? $page->title)

@section('meta_description', $page->meta_description ?? $page->title)

@section('head')

@endsection

@section('content')

  <div class="site__body">
    <div class="block about-us">
      <div class="about-us__image"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-xl-10">
            <div class="about-us__body">
              <h1 class="about-us__title">{{ $page->title }}</h1>
              <div class="typography">
                {!! $page->content !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection


@section('scripts')

@endsection