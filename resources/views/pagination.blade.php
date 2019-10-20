@if ($paginator->hasPages())
    <div class="flex items-center justify-center mt-12">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="bg-white rounded-sm rounded-r-none border border-r-0 px-3 py-2 cursor-not-allowed no-underline">&laquo;</span>
        @else
            <a class="bg-white rounded-sm rounded-r-none border-t border-b border-l px-3 py-2 hover:bg-gray-200 no-underline" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                &laquo;
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="border-t border-b border-l px-3 py-2 bg-white cursor-not-allowed no-underline">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="border-t border-b border-l px-3 py-2 bg-gray-200 no-underline">{{ $page }}</span>
                    @else
                        <a class="border-t border-b border-l px-3 py-2 bg-white hover:bg-gray-200 no-underline" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="rounded-sm rounded-l-none border px-3 py-2 bg-white hover:bg-gray-200 no-underline" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
        @else
            <span class="rounded-sm rounded-l-none border px-3 py-2 bg-white hover:bg-gray-200 no-underline cursor-not-allowed">&raquo;</span>
        @endif
    </div>
@endif