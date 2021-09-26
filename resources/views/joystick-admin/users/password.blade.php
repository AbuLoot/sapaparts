@extends('joystick-admin.layout')

@section('content')
  <h2 class="page-header">Редактирование</h2>

  @include('joystick-admin.partials.alerts')

  <p class="text-right">
    <a href="/admin/users" class="btn btn-primary btn-sm">Назад</a>
  </p>
  <form method="POST" action="/admin/users/password/{{ $user->id }}">
    <input type="hidden" name="_method" value="PUT">
    @csrf

    <div class="form-group">
      <label for="email">{{ __('E-Mail') }}:</label>
      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

      @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group">
      <label for="password">{{ __('Password') }}:</label>
      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

      @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group">
      <label for="password-confirm">{{ __('Confirm Password') }}:</label>
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
    </div>
  </form>

@endsection
