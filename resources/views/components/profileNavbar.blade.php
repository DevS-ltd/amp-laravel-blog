@auth
  @php
    $avatar = auth()->user()->getMedia(\App\Models\User::AVATAR)->first()
  @endphp
  <amp-accordion class="sidebar-profile__wrapper" animate>
    <section>
      <div class="sidebar-profile__data">
        <div class="flex align__center">
          <amp-img class="avatar"
                   src="{{ $avatar ? $avatar->getUrl() : '' }}"
                   width="40"
                   height="40"
                   layout="responsive">
            <div fallback>{{ auth()->user()->name[0] }}</div>
          </amp-img>
          <div class="username">{{ auth()->user()->name }}</div>
        </div>
      </div>
      <div>
        <a class="dropdown-item" href="{{ route('manage.posts.index') }}">
          {{ trans('main.links.myPosts') }}
        </a>
        <a class="dropdown-item" href="{{ route('manage.profile.edit') }}">
          {{ trans('main.links.profile') }}
        </a>
        <a class="dropdown-item"
           href="{{ route('logout') }}"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          {{ trans('main.links.logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </section>
  </amp-accordion>
@endauth
