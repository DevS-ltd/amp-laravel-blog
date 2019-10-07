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
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        @include('manage.profile.forms.userData')
      </div>
    </div>
  </div>
@endsection
