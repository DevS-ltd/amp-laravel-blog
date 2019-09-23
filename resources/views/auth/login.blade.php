@extends('layouts.app')


@section('content')
  @include('css.authCSS')
  <div class="container">
    <div class="flex content__center auth-form__wrapper">
      <div class="card">
        <div class="card__header color__white bg__black">{{ __('Login') }}</div>

        <div class="card__body">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form__group @error('email') is-invalid @enderror">
              <label for="email">{{ __('E-Mail Address') }}</label>
              <input id="email" type="email" class="form__control" name="email"
                     value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form__group @error('password') is-invalid @enderror">
              <label for="password">{{ __('Password') }}</label>
              <input id="password" type="password" class="form__control"
                     name="password" required autocomplete="current-password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form__group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember"
                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }}
                </label>
              </div>
            </div>

            <div class="form__group">
              <button type="submit" class="btn btn__primary">
                {{ __('Login') }}
              </button>

              @if (Route::has('password.request'))
                <a class="btn btn__link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a>
              @endif
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
