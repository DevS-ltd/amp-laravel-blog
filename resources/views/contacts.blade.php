@extends('layouts.app')

@section('content')
  @include('css.contactsCSS')

  <div class="container">
    <div class="contacts-wrapper">
      <h1>{{ trans('main.links.contacts') }}</h1>

      @if($contacts['website'])
        <h2>{{ trans('main.developedBy') }}</h2>
        <div class="email">
          <a href="{{ $contacts['website'] }}" target="_blank">DevStation Limited</a>
        </div>
      @endif

      <h2>{{ trans('main.direct') }}</h2>
      <div class="contacts flex">
        @include('components.social')
      </div>
    </div>
  </div>

@endsection