@if ($paginator->hasPages())
    <ul class="pagination pagination-rounded justify-content-center mt-4">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><a href="javascript:;" wire:click="previousPage" class="page-link ">Prev</a></li>
        @else
        <li class="page-item"><a href="javascript:;" wire:click="previousPage" rel="prev" class="page-link text-dark border-dark">Prev</a></li>
        @endif

        {{-- Pagination Element Here --}}
        @foreach ($elements as $element)
            {{-- Make dots here --}}
            @if (is_string($element))
                <li class="page-item disabled"><a class="page-link bg-dark"><span>{{ $element }}</span></a></li>
            @endif

            {{-- Links array Here --}}
            @if (is_array($element))
                @foreach ($element as $page=>$url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active " aria-current="page"><a href="javascript:;" wire:click="gotoPage({{$page}})" class="page-link bg-dark border-dark"><span>{{ $page }}</span></a></li>
                    @else
                    <li class="page-item"><a href="javascript:;" wire:click="gotoPage({{$page}})" class="page-link text-dark border-dark">{{$page}}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item "><a href="javascript:;" wire:click="nextPage" class="page-link text-dark border-dark">Next</a></li>
        @else
          <li class="page-item disabled"><a href="javascript:;" class="page-link">Next</a></li>
        @endif
    </ul>
@endif

