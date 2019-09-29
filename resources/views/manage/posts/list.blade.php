@extends('adminlte::page')

@section('title', 'Posts List')

@section('content_header')
  <h1>Posts List</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">My Posts</h3>
          <a href="{{ route('manage.posts.create') }}" class="btn btn-primary btn-sm">New Post</a>
        </div>
        <div class="box-body">
          <div class="dataTables_wrapper form-inline">
            <div class="row">
              <div class="col-sm-6">
                <div class="dataTables_length">
                  <label>Show <select name="per_page"
                                      class="form-control input-sm"
                                      onchange="updatePerPage(event)">
                      <option value="10" @if(app('request')->input('per_page') === '10') selected @endif>10</option>
                      <option value="25" @if(app('request')->input('per_page') === '25') selected @endif>25</option>
                      <option value="50" @if(app('request')->input('per_page') === '50') selected @endif>50</option>
                      <option value="100" @if(app('request')->input('per_page') === '100') selected @endif>100</option>
                    </select> entries
                  </label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="dataTables_filter">
                  <form onsubmit="updateFilter(event)">
                    <label>Search:
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
                      Id
                    </th>
                    <th class="@if(app('request')->input('sort') === 'title')
                        sorting_asc
                      @elseif(app('request')->input('sort') === '-title')
                        sorting_desc
                      @else
                        sorting
                      @endif" onClick="sortData('title')">
                      Title
                    </th>
                    <th>Published</th>
                    <th>Created At</th>
                    <th>Actions</th>
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
                        <a href="{{ route('manage.posts.destroy', ['id' => $post->id]) }}"
                           onclick="event.preventDefault();document.getElementById('remove-form-{{ $post->id }}').submit();">
                          <i class="fa fa-trash"></i>
                        </a>
                        <form id="remove-form-{{ $post->id }}"
                              action="{{ route('manage.posts.destroy', ['id' => $post->id]) }}"
                              method="POST"
                              style="display: none;">
                          @csrf
                          @method('DELETE')
                        </form>
                      </td>
                    </tr>
                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Published</th>
                    <th>Created At</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
                <div class="dataTables_info">
                  Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }} entries
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

      for (let param of Object.keys(urlParams) ) {
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
