@extends('adminlte::page')

@section('title', trans('manage.posts.titles.update'))

@section('content_header')
  <h1>{{ trans('manage.posts.titles.update') }}</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <form method="POST" action="{{ route('manage.posts.update', ['post' => $post->id]) }}" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="box-body">
            <div class="row">
              <div class="col-sm-6 col-md-8 col-lg-9">

                <div class="form-group @error('title') has-error @enderror">
                  <label for="title">{{ trans('manage.posts.fields.title') }}</label>
                  <input name="title"
                         id="title"
                         value="{{ $post->title }}"
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
                            required>{{ $post->annotation }}</textarea>
                  @error('annotation')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group @error('content') has-error @enderror">
                  <label for="content">{{ trans('manage.posts.fields.content') }}</label>
                  <textarea name="content" id="content">{{ $post->content }}</textarea>
                  @error('content')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group @error('categories') has-error @enderror">
                  <label for="categories">{{ trans('manage.posts.fields.categories') }}</label>
                  <select name="categories[]" id="categories" class="form-control" multiple required>
                    @foreach(\App\Models\Category::all() as $category)
                      <option @if($post->categories->where('id', $category->id)->first()) selected @endif
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
                             {{ $post->published ? 'checked' : '' }}> {{ trans('manage.posts.fields.published') }}
                    </label>
                  </div>
                  @error('published')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class='form-group @foreach ($errors->getMessages() as $key => $error)
                @if (\Illuminate\Support\Str::startsWith($key, 'images')) has-error @break @endif @endforeach'>
                  <label for="images">{{ trans('manage.posts.fields.images') }}</label>
                  <input name="images[]" id="images" type="file" accept="image/*" multiple>
                    @foreach ($errors->getMessages() as $key => $error)
                      @if (\Illuminate\Support\Str::startsWith($key, 'images'))
                        <span class="help-block">{{ $error[0] }}</span>
                      @endif
                    @endforeach
                </div>

                @foreach($post->getMedia(App\Models\Post::PREVIEW) as $media)
                  <div class="margin-bottom" id="media-{{ $media->id }}">
                    <p>
                      <img src="{{ $media->getUrl() }}"
                           alt="{{ $post->title }}"
                           class="img-responsive img-thumbnail">
                    </p>
                    <button type="button"
                            class="btn btn-sm btn-danger"
                            data-toggle="modal"
                            data-target="#delete-modal-media-{{ $media->id }}">
                      {{ trans('manage.general.delete') }}
                    </button>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">{{ trans('manage.general.update') }}</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">
              {{ trans('manage.general.delete') }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @include('components.modal', [
    'id' => 'delete-modal',
    'header' => '<h4 class="modal-title">'.trans('manage.posts.modals.delete.title').'</h4>',
    'body' => '<p>'.trans('manage.posts.modals.delete.body').'</p>',
    'confirmButton' => '<button type="button"
                  class="btn btn-danger"
                  onclick="document.getElementById(\'remove-form\').submit();"
          >'.trans('manage.posts.modals.delete.button').'</button>',
  ])

  <form action="{{ route('manage.posts.destroy', ['post' => $post->id]) }}"
        method="POST"
        id="remove-form"
        style="display: none">
    @csrf
    @method('DELETE')
  </form>
  @foreach($post->getMedia(App\Models\Post::PREVIEW) as $media)
    @include('components.modal', [
      'id' => "delete-modal-media-{$media->id}",
      'header' => '<h4 class="modal-title">'.trans('manage.posts.modals.imageDelete.title').'</h4>',
      'body' => '<p>'.trans('manage.posts.modals.imageDelete.body').'</p>',
      'confirmButton' => "<button type='button'
                    class='btn btn-danger'
                    onclick='deleteMedia({$media->id})'
            >".trans('manage.posts.modals.imageDelete.button')."</button>",
    ])
  @endforeach
@endsection

@push('js')
  <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
  <script>
    CKEDITOR.replace('content', {
      filebrowserUploadUrl: "{{route('manage.upload.ckeditor-image', ['_token' => csrf_token() ])}}",
      filebrowserUploadMethod: 'form'
    });

    function deleteMedia(media) {
      $.ajax({
        url: "{{ route('manage.delete.media', [
          'media' => 'replace-data']) }}".replace('replace-data', media),
        method: 'delete',
        data: {
          _token: '{{ csrf_token() }}',
        },
        success: ({message}) => {
          $(`#delete-modal-media-${media}`).modal('hide');
          $(`#media-${media}`).remove();
          alert(message);
        }
      })
    }
  </script>
@endpush
