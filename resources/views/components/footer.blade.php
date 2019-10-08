<footer class="bg__black color__white">

  @include('css.footerCSS')

  <div class="container">
    <div class="footer-block">
      <ul class="footer-menu-list">
        <li class="footer-menu-item"><strong>{{ trans('main.categories') }}:</strong></li>
        @foreach(App\Models\Category::all() as $category)
          <li class="footer-menu-item">
            <a href="{{ route('category.posts', ['category' => $category]) }}" class="color__white">
              {{ $category->name }}
            </a>
          </li>
        @endforeach
      </ul>
    </div>

    <div class="footer-block footer-navigation">
      <ul class="footer-menu-list">
        <li class="footer-menu-item">
          <a href="{{ route('posts.index') }}" class="color__white">{{ trans('main.links.blog') }}</a>
        </li>
        <li class="footer-menu-item">
          <a href="#" class="color__white">{{ trans('main.links.contacts') }}</a>
        </li>
      </ul>
      <div class="footer-tagline">
        <div class="site-info">
          © {{ date("Y") }} <a href="https://devs.ltd" target="_blank">DevStation Limited</a> -
          {{ trans('main.company.title') }}
        </div>
      </div>
    </div>
  </div>
</footer>
