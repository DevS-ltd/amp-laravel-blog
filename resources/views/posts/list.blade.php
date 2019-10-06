@extends('layouts.app')

@section('content')
  @include('css.postsCSS')

  <div class="container">
    <div class="row">
      <div class="posts__wrapper">
        @foreach($posts as $post)
          <div class="post__wrapper">
            <div class="post-image__wrapper">
              @if($post->getMedia(App\Models\Post::PREVIEW)->count() > 0)
                <amp-carousel height="192"
                              width="288"
                              layout="responsive"
                              type="slides">
                  @foreach($post->getMedia(App\Models\Post::PREVIEW) as $key => $media)
                    <amp-img src="{{ $media->getUrl() }}"
                             srcset="@foreach(config('media.conversions') as $i => $item)
                             @if($i) , @endif
                             {{ $media->getUrl($item) }} {{ config('media.image_sizes')[$item]['width'] }}w
                             @endforeach"
                             class="carousel-item"
                             on="tap:lightbox-{{ $media->id }}"
                             role="button"
                             height="192"
                             width="288"
                             layout="responsive"
                             alt="{{ $post->title }}">
                      <div fallback>{{ trans('main.notExist') }}</div>
                      <amp-image-lightbox id="lightbox-{{ $media->id }}" layout="nodisplay"></amp-image-lightbox>
                    </amp-img>
                  @endforeach
                </amp-carousel>
              @endif
            </div>
            <h3 class="post__title">
              <a href="{{ route('posts.show', ['post' => $post->id]) }}"
                 class="post__title-link">
                {{ $post->title }}
              </a>
            </h3>
            <div class="post__description">
              {{ trans('main.writtenBy') }}
              <a href="{{ route('author.posts', ['author' => $post->user_id]) }}"
                 class="post__description-link">{{ $post->author->name }}</a>
              {{ trans('main.on') }} {{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y') }}
            </div>
          </div>
        @endforeach
      </div>
      {{ $posts->links('components.pagination') }}
    </div>
  </div>
@endsection