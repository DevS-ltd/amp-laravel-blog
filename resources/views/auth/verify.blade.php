@extends('layouts.app')

@section('content')
  @include('css.authCSS')
  <div class="container">
    <div class="flex content__center auth-form__wrapper">
      <div class="card">
        <div class="card__header">{{ __('Verify Your Email Address') }}</div>

        <div class="card__body">
          @if (session('resent'))
            <div class="alert alert-success" role="alert">
              {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
          @endif

          {{ __('Before proceeding, please check your email for a verification link.') }}
          {{ __('If you did not receive the email') }}, <a
              href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
        </div>
      </div>
    </div>
  </div>
@endsection
