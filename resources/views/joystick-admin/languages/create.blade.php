@extends('joystick-admin.layout')

@section('content')
  <h2 class="page-header">Создание</h2>

  @include('joystick-admin.partials.alerts')

  <p class="text-right">
    <a href="/admin/languages" class="btn btn-primary btn-sm">Назад</a>
  </p>
  <form action="{{ route('languages.store') }}" method="post">
    {!! csrf_field() !!}
    <div class="form-group">
      <label for="title">Заголовок</label>
      <input type="text" class="form-control" id="title" name="title" maxlength="80" value="{{ (old('title')) ? old('title') : '' }}" required>
    </div>
    <div class="form-group">
      <label for="slug">Slug</label>
      <input type="text" class="form-control" id="slug" name="slug" maxlength="80" value="{{ (old('slug')) ? old('slug') : '' }}">
    </div>
    <div class="form-group">
      <label for="sort_id">Номер</label>
      <input type="text" class="form-control" id="sort_id" name="sort_id" value="{{ (old('sort_id')) ? old('sort_id') : NULL }}">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Создать</button>
    </div>
  </form>
@endsection
