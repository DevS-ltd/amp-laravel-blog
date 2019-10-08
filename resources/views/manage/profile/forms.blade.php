@extends('adminlte::page')

@section('title', trans('manage.profile.title'))

@section('content_header')
  <h1>{{ trans('manage.profile.title') }}</h1>
@stop

@section('content')
  @if (session('message'))
    <div class="alert alert-success" role="alert">
      {{ session('message') }}
    </div>
  @endif
  @if (session('resent'))
    <div class="alert alert-success" role="alert">
      {{ __('A fresh verification link has been sent to your email address.') }}
    </div>
  @endif
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        @include('manage.profile.forms.userData')
      </div>
    </div>
    <div class="col-md-12">
      <div class="box box-primary">
        @include('manage.profile.forms.passwordReset')
      </div>
    </div>
  </div>
@endsection
