<div class="widget">
  @if (session('message'))
    <div class="alert alert-success" role="alert">
      {{ session('message') }}
    </div>
  @endif
  @error('email')
    <div class="alert alert-danger" role="alert">
      <strong>{{ $message }}</strong>
    </div>
  @enderror
  <div class="subscribe-widget">
    <h2 class="widget-header">Our Creative Newsletter</h2>
    <p class="widget-description">Subscribe to our popular newsletter and get the latest web design news and resources directly in your inbox.</p>
    <form action="{{ route('subscribe') }}" method="post">
      @csrf
      <input type="email" name="email" class="widget-input" placeholder="your.email@address.com" required>
      <input type="submit" value="Subscribe" name="subscribe" class="widget-button">
    </form>
  </div>
</div>