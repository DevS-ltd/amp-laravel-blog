@extends('layouts.app')

@section('content')
  @include('css.authCSS')
  <div class="container">
    <div class="flex content__center auth-form__wrapper">
      <div class="card">
        <div class="card__header color__white bg__black">{{ __('Reset Password') }}</div>

        <div class="card__body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif

          <form method="POST" action="{{ route('password.email') }}">
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

            <div class="form__group">
              <button type="submit" class="btn btn__primary">
                {{ __('Send Password Reset Link') }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
