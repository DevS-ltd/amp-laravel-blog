@extends('layouts.app')

@section('content')
  @include('css.authCSS')
  <div class="container">
    <div class="flex content__center auth-form__wrapper">
      <div class="card">
        <div class="card__header">{{ __('Register') }}</div>

        <div class="card__body">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form__group @error('name') is-invalid @enderror">
              <label for="name">{{ __('Name') }}</label>
              <input id="name" type="text" class="form__control" name="name"
                     value="{{ old('name') }}" required autocomplete="name" autofocus>
              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form__group @error('email') is-invalid @enderror">
              <label for="email">{{ __('E-Mail Address') }}</label>
              <input id="email" type="email" class="form__control" name="email"
                     value="{{ old('email') }}" required autocomplete="email">
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

            <div class="form__group @error('password') is-invalid @enderror">
              <label for="password-confirm">{{ __('Confirm Password') }}</label>
              <input id="password-confirm" type="password" class="form__control"
                     name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn__primary">
                {{ __('Register') }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
