<form class="search-form flex" action="{{ route('posts.index') }}" method="GET">
  <input class="search__input form__control" name="filter[title]" placeholder="Search posts">
  <input class="search__button btn btn__primary" type="submit" value="Search">
</form>