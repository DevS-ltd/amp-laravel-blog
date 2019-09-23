@extends('layouts.app')

@section('content')
  @include('css.authCSS')
  <div class="container">
    <div class="flex content__center auth-form__wrapper">
      <div class="card">
        <div class="card__header">{{ __('Reset Password') }}</div>

        <div class="card__body">
          <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form__group @error('email') is-invalid @enderror">
              <label for="email">{{ __('E-Mail Address') }}</label>
              <input id="email" type="email" class="form__control" name="email"
                     value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form__group @error('password') is-invalid @enderror">
              <label for="password">{{ __('Password') }}</label>
              <input id="password" type="password" class="form__control"
                     name="password" required autocomplete="new-password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form__group @error('password') is-invalid @enderror">
              <label for="password-confirm">{{ __('Confirm Password') }}</label>
              <input id="password-confirm" type="password" class="form__control"
                     name="password_confirmation" required autocomplete="current-password">
            </div>

            <div class="form-group row mb-0">
              <button type="submit" class="btn btn__primary">
                {{ __('Reset Password') }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
