<form method="POST" action="{{ route('manage.profile.update') }}" enctype="multipart/form-data">
  @csrf
  <div class="box-body">
    <div class="form-group @error('avatar') has-error @enderror">
      <label for="avatar">{{ trans('manage.profile.fields.avatar') }}</label>
      @if ($user->hasMedia(\App\Models\User::AVATAR))
        @php
          $avatar = $user->getMedia(\App\Models\User::AVATAR)->first();
        @endphp
        <div id="avatar-wrapper">
          <div class="box-body">
            <img src="{{ $avatar->getUrl() }}"
                 alt="User avatar"
                 class="img-circle"
                 width="100">
          </div>
          <button type="button"
                  class="btn btn-sm btn-danger"
                  data-toggle="modal"
                  data-target="#delete-modal-avatar">
            {{ trans('manage.general.delete') }}
          </button>
          @include('components.modal', [
            'id' => 'delete-modal-avatar',
            'header' => '<h4 class="modal-title">'.trans('manage.profile.modals.avatar.title').'</h4>',
            'body' => '<p>'.trans('manage.profile.modals.avatar.body').'</p>',
            'confirmButton' => "<button type='button'
                          class='btn btn-danger'
                          onclick='deleteAvatar()'
                  >".trans('manage.profile.modals.avatar.button')."</button>",
          ])
        </div>

        @push('js')
          <script>
            function deleteAvatar() {
              $.ajax({
                url: "{{ route('manage.delete.media', [
            'media' => 'replace-data']) }}".replace('replace-data', {{ $avatar->id }}),
                method: 'delete',
                data: {
                  _token: '{{ csrf_token() }}',
                },
                success: () => {
                  $('#delete-modal-avatar').on('hide.bs.modal', function (e) {
                    $('#avatar-wrapper').html(`<input type="file"
               name="avatar"
               id="avatar"
               accept="image/*">`);
                  });
                  $('#delete-modal-avatar').modal('hide');
                }
              })
            }
          </script>
        @endpush
      @else
        <input type="file"
               name="avatar"
               id="avatar"
               accept="image/*">
      @endif
      @error('avatar')
        <span class="help-block">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group @error('name') has-error @enderror">
      <label for="name">{{ trans('manage.profile.fields.name') }}</label>
      <input name="name"
             id="name"
             value="{{ $user->name }}"
             class="form-control"
             required>
      @error('name')
        <span class="help-block">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group @if(auth()->user()->hasVerifiedEmail() === false) has-error @endif">
      <label for="email">{{ trans('manage.profile.fields.email') }}</label>
      <input name="email"
             id="email"
             value="{{ $user->email }}"
             class="form-control"
             readonly>
      @if(auth()->user()->hasVerifiedEmail() === false)
        <span class="help-block">
          {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('Verify Your Email Address. If you did not receive the email') }},
          <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
        </span>
      @endif
    </div>

  </div>
  <div class="box-footer">
    <button type="submit" class="btn btn-primary">{{ trans('manage.general.update') }}</button>
  </div>
</form>
