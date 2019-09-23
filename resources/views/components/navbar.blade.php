<ul class="navbar__wrapper">
  <li class="navbar__element"><a href="#" class="navbar__link flex">Blog</a></li>
  <li class="navbar__element"><a href="#" class="navbar__link flex">Contacts</a></li>
  @guest
    <li class="navbar__element"><a class="navbar__link flex" href="{{ route('login') }}">{{ __('Login') }}</a></li>
    <li class="navbar__element"><a class="navbar__link flex" href="{{ route('register') }}">{{ __('Register') }}</a></li>
  @endguest
</ul>