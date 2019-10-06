@extends('layouts.app')

@section('content')
  @include('css.postsCSS')

  <div class="container">
    <div class="row">
      <div class="posts-wrapper">
        <div class="post">
          <div class="bg-white">
            @if($post->user_id === auth()->id())
              <a href="{{ route('manage.posts.edit', ['post' => $post->id]) }}">Edit post</a>
            @endif
            <div class="post-image-wrapper">
              @if($post->getMedia(App\Models\Post::PREVIEW)->count() > 0)
                <amp-carousel height="92"
                              width="288"
                              layout="responsive"
                              type="slides">
                  @foreach($post->getMedia(App\Models\Post::PREVIEW) as $media)
                    <amp-img src="{{ $media->getUrl() }}"
                             class="carousel-item"
                             on="tap:lightbox-{{ $media->id }}"
                             role="button"
                             height="92"
                             width="288"
                             layout="responsive"
                             alt="{{ $post->title }}">
                      <div fallback>{{ trans('main.notExist') }}</div>
                      <amp-image-lightbox id="lightbox-{{ $media->id }}" layout="nodisplay"></amp-image-lightbox>
                      <div class="post-categories">
                        @foreach($post->categories as $category)
                          <a href="{{ route('category.posts', ['category' => $category->id]) }}"
                             class="post-categories-link"
                             on="tap">
                            {{ $category->name }}
                          </a>
                        @endforeach
                      </div>
                    </amp-img>
                  @endforeach
                </amp-carousel>
              @endif
            </div>
            <div class="post-content">
              <h3 class="post-title">
                {{ $post->title }}
              </h3>
              <div class="post-description">
                {{ trans('main.writtenBy') }}
                <a href="{{ route('author.posts', ['author' => $post->user_id]) }}"
                   class="post-description-link">{{ $post->author->name }}</a>
                {{ trans('main.on') }} {{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y') }}
              </div>
              <div class="post-content">
                {!! $post->content !!}
              </div>
            </div>
          </div>
        </div>

        @include('widgets.subscribe')

      </div>
    </div>
  </div>
@endsection