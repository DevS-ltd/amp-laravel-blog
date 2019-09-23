<header class="bg__black">

  @include('css.headerCSS')

  <div class="container">
    <div class="header__wrapper flex">
      <div class="burger__button color__white" on="tap:header-sidebar.toggle" tabindex="0">☰</div>

      <div class="logo__wrapper flex content__center">
        <a class="brand__link color__white" href="{{ url('/') }}">
          {{ config('app.name') }}
        </a>
      </div>

      <div class="header-sidebar">
        @include('components.social')

        @include('components.navbar')

        @include('components.profileNavbar')

        @include('components.searchForm')
      </div>
    </div>
  </div>
  <!-- Start Sidebar -->
  <amp-sidebar id="header-sidebar" class="sidebar" layout="nodisplay">
    <div class="container">
      <div class="sidebar__wrapper flex direction__column">

        <div class="flex justify__end">
          @include('components.profileNavbar')
          <div class="burger__button color__black" on="tap:header-sidebar.toggle">✕</div>
        </div>

        @include('components.searchForm')

        @include('components.navbar')

        @include('components.social')

      </div>
    </div>
  </amp-sidebar>
  <!-- End Sidebar -->
</header>