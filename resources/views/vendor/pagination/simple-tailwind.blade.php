{{-- text-red-600 text-lg font-bold py-1 px-4 self-end absolute m-4 border-2 border-red-600 rounded-3xl --}}
@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="hidden">
                {!! __('Anterior') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class=" mx-1 px-4 py-2 text-sm font-bold text-gray-600 border-gray-600 border-2 cursor-default rounded-3xl hover:text-black focus:outline-none focus:ring ring-gray-4 focus:border-gray-500transition ease-in-out duration-150">
                {!! __('Anterior') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-4 py-2  mx-1 text-sm font-bold text-gray-600 border-gray-600 border-2 cursor-default rounded-3xl hover:text-black focus:outline-none focus:ring ring-gray-4 focus:border-gray-500transition ease-in-out duration-150">
                {!! __('Siguiente') !!}
            </a>
        @else
            <span class="hidden">
                {!! __('Siguiente') !!}
            </span>
        @endif
    </nav>
@endif
