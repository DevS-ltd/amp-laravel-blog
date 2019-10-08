<ul class="navbar__wrapper">
  <li class="navbar__element"><a href="{{ route('posts.index') }}" class="navbar__link flex">{{ trans('main.links.blog') }}</a></li>
  <li class="navbar__element"><a href="{{ route('contacts') }}" class="navbar__link flex">{{ trans('main.links.contacts') }}</a></li>
  @guest
    <li class="navbar__element"><a class="navbar__link flex" href="{{ route('login') }}">{{ trans('main.links.login') }}</a></li>
    <li class="navbar__element"><a class="navbar__link flex" href="{{ route('register') }}">{{ trans('main.links.register') }}</a></li>
  @endguest
</ul>