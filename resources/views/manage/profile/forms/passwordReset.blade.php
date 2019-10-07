<form method="POST" action="{{ route('manage.profile.password.update') }}">
  @csrf
  <div class="box-body">

    <div class="form-group @error('old_password') has-error @enderror">
      <label for="old-password">{{ trans('manage.profile.fields.oldPassword') }}</label>
      <input name="old_password"
             type="password"
             id="old-password"
             class="form-control"
             required>
      @error('old_password')
        <span class="help-block">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group @error('password') has-error @enderror">
      <label for="password">{{ trans('manage.profile.fields.newPassword') }}</label>
      <input name="password"
             type="password"
             id="password"
             class="form-control"
             required>
      @error('password')
        <span class="help-block">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group @error('password_confirmation') has-error @enderror">
      <label for="password-confirm">{{ trans('manage.profile.fields.confirmPassword') }}</label>
      <input name="password_confirmation"
             type="password"
             id="password-confirm"
             class="form-control"
             required>
      @error('password_confirmation')
        <span class="help-block">{{ $message }}</span>
      @enderror
    </div>

  </div>
  <div class="box-footer">
    <button type="submit" class="btn btn-primary">{{ trans('manage.general.update') }}</button>
  </div>
</form>