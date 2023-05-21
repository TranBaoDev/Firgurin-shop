<style>
    .pull-right {
        /* width: 100%; */
    }
    .pagination {
        width: 100%;
        display: flex;
        justify-content: space-between;
        list-style: none;
        font-size: 1.8rem;
        margin-top: 20px;
        padding: 0;
        align-items: center;
    }
    .pagination li {
        color: black;
        background-color: white;
        box-shadow: 0px 0px 15px rgb(222 222 222);
        width: 35px; height: 35px;
        text-align: center;
        display: flex; justify-content: center;
        align-items: center;
        border-radius: 100px;
        transition: all cubic-bezier(.09,.66,.39,.88) 0.3s;
    }
    .pagination li:hover {
        width: 50px; height: 50px;
        font-weight: bold;
        background-color: rgb(246, 246, 246);
    }
    .pagination li a {
        text-decoration: none;
        color: black;
    }
    .active {
        width: 50px !important; height: 50px !important;
        font-weight: bold;
    }
</style>

@if ($paginator->hasPages())
    <!-- Pagination -->
    <div class="pull-right pagination">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled li-text">
                    <span><i class="fa fa-angle-double-left"></i></span>
                </li>
            @else
                <li class="li-text">
                    <a href="{{ $paginator->previousPageUrl() }}">
                        <span><i class="fa fa-angle-double-left"></i></span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active li-text"><span>{{ $page }}</span></li>
                        @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                            <li class="li-text"><a href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page == $paginator->lastPage() - 1)
                            <li class="disabled li-text"><span><i class="fa fa-ellipsis-h"></i></span></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <span><i class="fa fa-angle-double-right"></i></span>
                    </a>
                </li>
            @else
                <li class="disabled">
                    <span><i class="fa fa-angle-double-right"></i></span>
                </li>
            @endif
        </ul>
    </div>
    <!-- Pagination -->
@endif