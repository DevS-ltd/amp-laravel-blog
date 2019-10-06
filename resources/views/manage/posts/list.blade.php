@extends('adminlte::page')

@section('title', trans('manage.posts.titles.list'))

@section('content_header')
  <h1>{{ trans('manage.posts.titles.list') }}</h1>
@stop

@section('content')
  @if (session('message'))
    <div class="alert alert-success" role="alert">
      {{ session('message') }}
    </div>
  @endif
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">{{ trans('manage.posts.titles.myPosts') }}</h3>
          <a href="{{ route('manage.posts.create') }}" class="btn btn-primary btn-sm">
            {{ trans('manage.general.new') }} {{ trans('manage.posts.name.singular') }}
          </a>
        </div>
        <div class="box-body">
          <div class="dataTables_wrapper form-inline">
            <div class="row">
              <div class="col-sm-6">
                <div class="dataTables_length">
                  <label>{{ trans('manage.general.show') }} <select name="per_page"
                                                                    class="form-control input-sm"
                                                                    onchange="updatePerPage(event)">
                      <option value="10" @if(app('request')->input('per_page') === '10') selected @endif>10</option>
                      <option value="25" @if(app('request')->input('per_page') === '25') selected @endif>25</option>
                      <option value="50" @if(app('request')->input('per_page') === '50') selected @endif>50</option>
                      <option value="100" @if(app('request')->input('per_page') === '100') selected @endif>100</option>
                    </select> {{ trans('manage.general.entries') }}
                  </label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="dataTables_filter">
                  <form onsubmit="updateFilter(event)">
                    <label>{{ trans('manage.general.search') }}:
                      <input id="filter"
                             class="form-control input-sm"
                             value="{{ app('request')->input('filter.title') }}">
                    </label>
                  </form>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-bordered table-striped dataTable">
                  <thead>
                  <tr role="row">
                    <th class="@if(!!app('request')->input('sort'))
                    @if(app('request')->input('sort') === 'id')
                        sorting_asc
                      @elseif(app('request')->input('sort') === '-id')
                        sorting_desc
                      @else
                        sorting
                      @endif
                    @else
                        sorting_desc
                    @endif" onClick="sortData('id')">
                      {{ trans('manage.posts.fields.id') }}
                    </th>
                    <th class="@if(app('request')->input('sort') === 'title')
                        sorting_asc
                      @elseif(app('request')->input('sort') === '-title')
                        sorting_desc
                      @else
                        sorting
                      @endif" onClick="sortData('title')">
                      {{ trans('manage.posts.fields.title') }}
                    </th>
                    <th>{{ trans('manage.posts.fields.published') }}</th>
                    <th>{{ trans('manage.posts.fields.createdAt') }}</th>
                    <th>{{ trans('manage.general.actions') }}</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($posts as $post)
                    <tr role="row">
                      <td>{{ $post->id }}</td>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->published ? 'Yes' : 'No' }}</td>
                      <td>{{ $post->created_at }}</td>
                      <td>
                        <a href="{{ route('manage.posts.edit', ['id' => $post->id]) }}">
                          <i class="fa fa-fw fa-edit"></i>
                        </a>
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}"
                           target="_blank">
                          <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('manage.posts.destroy', ['id' => $post->id]) }}"
                           onclick="event.preventDefault();$('#remove-modal-{{ $post->id }}').modal('show');">
                          <i class="fa fa-trash"></i>
                        </a>
                        <form id="remove-form-{{ $post->id }}"
                              action="{{ route('manage.posts.destroy', ['id' => $post->id]) }}"
                              method="POST"
                              style="display: none;">
                          @csrf
                          @method('DELETE')
                        </form>
                        @include('components.modal', [
                          'id' => "remove-modal-{$post->id}",
                          'header' => '<h4 class="modal-title">'.trans('manage.posts.modals.delete.title').'</h4>',
                          'body' => '<p>'.trans('manage.posts.modals.delete.body').'</p>',
                          'confirmButton' => "<button type='button'
                                        class='btn btn-danger'
                                        onclick='document.getElementById(\"remove-form-{$post->id}\").submit();'
                                      >".trans('manage.posts.modals.delete.button')."</button>",
                        ])
                      </td>
                    </tr>
                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>{{ trans('manage.posts.fields.id') }}</th>
                    <th>{{ trans('manage.posts.fields.title') }}</th>
                    <th>{{ trans('manage.posts.fields.published') }}</th>
                    <th>{{ trans('manage.posts.fields.createdAt') }}</th>
                    <th>{{ trans('manage.general.actions') }}</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
                <div class="dataTables_info">
                  {{ trans('manage.general.showing') }} {{ $posts->firstItem() }} {{ trans('manage.general.to') }}
                  {{ $posts->lastItem() }} {{ trans('manage.general.of') }} {{ $posts->total() }}
                  {{ trans('manage.general.entries') }}
                </div>
              </div>
              <div class="col-sm-7">
                <div class="dataTables_paginate">
                  {{ $posts->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <form action="{{ route('manage.posts.index') }}"
        id="search-form"
        style="display: none;">
  </form>
@endsection

@push('js')
  <script>
    const urlParams = parseQueryString();
    const form = document.querySelector('#search-form');

    function sortData(sorting) {
      if (urlParams.sort === sorting) sorting = `-${sorting}`;

      urlParams.sort = sorting;

      updateSearchParams();
    }

    function updatePerPage(e) {
      urlParams.per_page = e.target.value;

      delete urlParams.page;

      updateSearchParams();
    }

    function updateFilter(e) {
      e.preventDefault();

      const filter = document.querySelector('#filter').value;
      if (filter === '') {
        delete urlParams['filter[title]'];
      } else {
        urlParams['filter[title]'] = filter;
      }

      delete urlParams.page;

      updateSearchParams();
    }

    function updateSearchParams() {
      form.innerHTML = '';

      for (let param of Object.keys(urlParams)) {
        const input = document.createElement('input');

        input.setAttribute('name', param);
        input.setAttribute('value', urlParams[param]);

        form.appendChild(input);
      }

      form.submit()
    }

    function parseQueryString(url = window.location.href) {
      return url.slice(url.indexOf('?') + 1)
        .match(/[\w\d%\-!.~'()\*]+=[\w\d%\-!.~'()\*]+/g)
        .map(s => s.split('=').map(decodeURIComponent))
        .reduce((obj, [key, value]) => Object.assign(obj, {[key]: value}), {});
    }
  </script>
@endpush
