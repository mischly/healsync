@if ($paginator->hasPages())
    <nav>
        <ul class="pagination pagination-custom justify-content-center">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link rounded-pill px-3">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link rounded-pill px-3" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link rounded-pill px-3">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link rounded-pill px-3">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link rounded-pill px-3" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link rounded-pill px-3" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link rounded-pill px-3">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
