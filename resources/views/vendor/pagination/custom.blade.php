@if ($paginator->hasPages())
    <div class="flex items-center justify-between">
        <div class="text-sm text-gray-700">
            <p>
                Showing
                <span class="font-medium">{{ $paginator->firstItem() }}</span>
                to
                <span class="font-medium">{{ $paginator->lastItem() }}</span>
                of
                <span class="font-medium">{{ $paginator->total() }}</span>
                results
            </p>
        </div>

        <nav class="relative z-0 inline-flex shadow-sm -space-x-px" aria-label="Pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span aria-disabled="true" aria-label="Previous" class="relative inline-flex items-center px-3 py-2 rounded-l-md bg-gray-200 text-gray-500 border">
                    ‹
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-3 py-2 rounded-l-md bg-white border text-gray-700 hover:bg-indigo-50" aria-label="Previous">
                    ‹
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="relative inline-flex items-center px-3 py-2 bg-white border text-gray-700">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page" class="relative inline-flex items-center px-4 py-2 bg-indigo-600 border text-white">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 bg-white border text-gray-700 hover:bg-indigo-50">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-3 py-2 rounded-r-md bg-white border text-gray-700 hover:bg-indigo-50" aria-label="Next">
                    ›
                </a>
            @else
                <span aria-disabled="true" aria-label="Next" class="relative inline-flex items-center px-3 py-2 rounded-r-md bg-gray-200 text-gray-500 border">
                    ›
                </span>
            @endif
        </nav>
    </div>
@endif
