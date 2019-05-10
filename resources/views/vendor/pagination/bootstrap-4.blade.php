@if ($paginator->hasPages())
    <nav class="navigation align-center" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            {{-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">&lsaquo;</span>
            </li> --}}
        @else
            {{-- <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a> --}}
            <a href="{{ $paginator->previousPageUrl() }}" class="page-numbers bg-border-color"><span><</span></a>
            
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            {{-- @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif --}}

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="page-numbers bg-border-color current"><span>{{ $page }}</span></a>
                    @else
                        <a href="{{ $url }}" class="page-numbers bg-border-color"><span>{{ $page }}</span></a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="page-numbers bg-border-color"><span>></span></a>
        
        @endif
    </nav>
@endif
