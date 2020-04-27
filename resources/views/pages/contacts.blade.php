@extends('layout')

@section('meta_title', (!empty($page->meta_title)) ? $page->meta_title : $page->title)

@section('meta_description', (!empty($page->meta_description)) ? $page->meta_description : $page->title)

@section('head')

@endsection

@section('content')
  <div class="site__body">
    <div class="page-header">
      <div class="page-header__container container">
        <br>
        <div class="page-header__title">
          <h1>{{ $page->title }}</h1>
        </div>
      </div>
    </div>
    <div class="block">
      <div class="container">
        <div class="card mb-0">
          <div class="card-body contact-us">
            <div class="contact-us__container">
              <div class="row">
                <div class="col-12 col-lg-6 pb-4 pb-lg-0">
                  <h4 class="contact-us__header card-title">Наши контакты</h4>
                  <div class="contact-us__address">
                    {!! $page->content !!}
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <h4 class="contact-us__header card-title">Форма для сообщения</h4>
                  <form action="/send-app" name="contact" method="post">
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="form-name">Ваше ФИО</label>
                        <input type="text" name="name" class="form-control" id="form-name" minlength="2" maxlength="40" autocomplete="off" placeholder="Ваше ФИО" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="form-email">Email</label>
                        <input type="email" name="email" class="form-control" id="form-email" autocomplete="off" placeholder="Ваше Email" rrequired>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="form-number">Номер телефона</label>
                      <input type="tel" id="form-number" class="form-control" pattern="(\+?\d[- .]*){7,13}" name="phone" minlength="5" maxlength="20" placeholder="Номер телефона" required>
                    </div>
                    <div class="form-group">
                      <label for="form-message">Текст</label>
                      <textarea id="form-message" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
