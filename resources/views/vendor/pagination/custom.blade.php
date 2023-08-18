<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-start">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="fi-rs-arrow-small-left"></i></a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fi-rs-arrow-small-left"></i></a>
            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><a class="page-link" href="#">{{ $element }}</a></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fi-rs-arrow-small-right"></i></a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="fi-rs-arrow-small-right"></i></a>
            </li>
        @endif
    </ul>
</nav>
