@if ($paginator->hasPages())
  <ul class="pagination">
    @if ($paginator->onFirstPage() === false)
      <li>
        <a href="{{ $paginator->previousPageUrl() }}" class="pagination-link">&lsaquo;</a>
      </li>
    @endif

    @foreach ($elements as $element)
      @if (is_string($element))
        <li class="pagination-disabled"><span>{{ $element }}</span></li>
      @endif

      @if (is_array($element))
        @foreach ($element as $page => $url)
          @if ($page == $paginator->currentPage())
            <li class="pagination-active"><span>{{ $page }}</span></li>
          @else
            <li><a href="{{ $url }}" class="pagination-link">{{ $page }}</a></li>
          @endif
        @endforeach
      @endif
    @endforeach

    @if ($paginator->hasMorePages())
      <li>
        <a href="{{ $paginator->nextPageUrl() }}" class="pagination-link">&rsaquo;</a>
      </li>
    @endif
  </ul>
@endif
