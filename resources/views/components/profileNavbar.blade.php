@auth
  <amp-accordion class="sidebar-profile__wrapper" animate>
    <section>
      <div class="sidebar-profile__data">
        <div class="flex align__center">
          <amp-img class="avatar"
                   src="{{ auth()->user()->avatar }}"
                   width="40"
                   height="40"
                   layout="responsive">
            <div fallback>{{ auth()->user()->name[0] }}</div>
          </amp-img>
          <div class="username">{{ auth()->user()->name }}</div>
        </div>
      </div>
      <div>
        <a class="dropdown-item" href="#">
          {{ __('Profile') }}
        </a>
        <a class="dropdown-item"
           href="{{ route('logout') }}"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </section>
  </amp-accordion>
@endauth
