@if ($paginator->hasPages())
    <ul class="pagination">
        <li class="{{ $paginator->onFirstPage() ? 'disabled' : '' }}">
            <a href="{{ $paginator->onFirstPage() ? 'javascript:void(0)' : $paginator->previousPageUrl() }}">&laquo;</a>
        </li>

        @foreach (range(1, $paginator->lastPage()) as $page)
            <li class="{{ $page === $paginator->currentPage() ? 'active' : '' }}">
                <a href="{{ $paginator->url($page) }}">{{ $page }}</a>
            </li>
        @endforeach

        <li class="{{ $paginator->hasMorePages() ? '' : 'disabled' }}">
            <a href="{{ $paginator->hasMorePages() ? $paginator->nextPageUrl() : 'javascript:void(0)' }}">&raquo;</a>
        </li>
    </ul>
@endif
