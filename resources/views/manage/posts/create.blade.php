@extends('adminlte::page')

@section('title', trans('manage.posts.titles.create'))

@section('content_header')
  <h1>{{ trans('manage.posts.titles.create') }}</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <form method="POST" action="{{ route('manage.posts.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="box-body">
            <div class="row">
              <div class="col-sm-6 col-md-8 col-lg-9">

                <div class="form-group @error('title') has-error @enderror">
                  <label for="title">{{ trans('manage.posts.fields.title') }}</label>
                  <input name="title"
                         id="title"
                         value="{{ old('title') }}"
                         class="form-control"
                         required>
                  @error('title')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group @error('annotation') has-error @enderror">
                  <label for="annotation">{{ trans('manage.posts.fields.annotation') }}</label>
                  <textarea name="annotation"
                            id="annotation"
                            class="form-control"
                            rows="3"
                            required>{{ old('annotation') }}</textarea>
                  @error('annotation')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group @error('content') has-error @enderror">
                  <label for="content">{{ trans('manage.posts.fields.content') }}</label>
                  <textarea name="content" id="content">{{ old('content') }}</textarea>
                  @error('content')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group @error('categories') has-error @enderror">
                  <label for="categories">{{ trans('manage.posts.fields.categories') }}</label>
                  <select name="categories[]" id="categories" class="form-control" multiple required>
                    @foreach(\App\Models\Category::all() as $category)
                      <option @if(in_array($category->id, old("categories") ?: [])) selected @endif
                              value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                  @error('categories')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group @error('published') has-error @enderror">
                  <div class="checkbox">
                    <label for="published">
                      <input name="published"
                             id="published"
                             value="1"
                             type="checkbox"
                             {{ old('published') ?: 'checked' }}> {{ trans('manage.posts.fields.published') }}
                    </label>
                  </div>
                  @error('published')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class='form-group @foreach ($errors->getMessages() as $key => $error)
                @if (\Illuminate\Support\Str::startsWith($key, 'images')) has-error @endif @endforeach'>
                  <label for="images">{{ trans('manage.posts.fields.images') }}</label>
                  <input name="images[]" id="images" type="file" accept="image/*" multiple>
                    @foreach ($errors->getMessages() as $key => $error)
                      @if (\Illuminate\Support\Str::startsWith($key, 'images'))
                        <span class="help-block">{{ $error[0] }}</span>
                      @endif
                    @endforeach
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">{{ trans('manage.general.create') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
  <script>
    CKEDITOR.replace('content', {
      filebrowserUploadUrl: "{{route('manage.upload.ckeditor-image', ['_token' => csrf_token() ])}}",
      filebrowserUploadMethod: 'form'
    });
  </script>
@endpush
