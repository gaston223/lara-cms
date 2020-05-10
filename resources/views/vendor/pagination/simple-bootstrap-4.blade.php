{{--@if ($paginator->hasPages())--}}
{{--    <nav>--}}
{{--        <ul class="pagination">--}}
{{--            --}}{{-- Previous Page Link --}}
{{--            @if ($paginator->onFirstPage())--}}
{{--                <li class="page-item disabled" aria-disabled="true">--}}
{{--                    <span class="page-link">@lang('pagination.previous')</span>--}}
{{--                </li>--}}
{{--            @else--}}
{{--                <li class="page-item">--}}
{{--                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>--}}
{{--                </li>--}}
{{--            @endif--}}

{{--            --}}{{-- Next Page Link --}}
{{--            @if ($paginator->hasMorePages())--}}
{{--                <li class="page-item">--}}
{{--                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>--}}
{{--                </li>--}}
{{--            @else--}}
{{--                <li class="page-item disabled" aria-disabled="true">--}}
{{--                    <span class="page-link">@lang('pagination.next')</span>--}}
{{--                </li>--}}
{{--            @endif--}}
{{--        </ul>--}}
{{--    </nav>--}}
{{--@endif--}}

@if ($paginator->hasPages())
<nav class="pgn">
    <ul>
        @if ($paginator->onFirstPage())
        <li><a class="pgn__prev btn inactive">Prev</a></li>Précédent
        @else
            <li><a class="pgn__prev btn" href="{{ $paginator->previousPageUrl() }}#s-content">Prev</a></li>Précédent
        @endif
            <li><span class="pgn__num dots">…</span></li>
        @if ($paginator->hasMorePages())
                <li><a class="pgn__next" href="{{ $paginator->nextPageUrl() }}#s-content">Next</a></li>Suivant
        @else
                <li><a class="pgn__next inactive" >Next</a></li>Suivant
        @endif
    </ul>
</nav>
@endif
