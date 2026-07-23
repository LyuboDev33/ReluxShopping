@if ($paginator->hasPages())
    <nav
        class="shop-pagination d-flex flex-column gap-2 align-items-center justify-content-between"
        aria-label="Странициране"
    >
        <div class="shop-pagination__result small text-muted">
            Показване на
            <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
            до
            <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
            от общо
            <span class="fw-semibold">{{ $paginator->total() }}</span>
            продукта
        </div>

        <ul class="pagination mb-0">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li
                    class="page-item disabled"
                    aria-disabled="true"
                    aria-label="Предишна страница"
                >
                    <span class="page-link" aria-hidden="true">
                        &lsaquo;
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a
                        class="page-link"
                        href="{{ $paginator->previousPageUrl() }}"
                        rel="prev"
                        aria-label="Предишна страница"
                    >
                        &lsaquo;
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)

                {{-- Three Dots Separator --}}
                @if (is_string($element))
                    <li
                        class="page-item disabled"
                        aria-disabled="true"
                    >
                        <span class="page-link">
                            {{ $element }}
                        </span>
                    </li>
                @endif

                {{-- Page Number Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li
                                class="page-item active"
                                aria-current="page"
                            >
                                <span class="page-link">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li class="page-item">
                                <a
                                    class="page-link"
                                    href="{{ $url }}"
                                    aria-label="Страница {{ $page }}"
                                >
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif

            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a
                        class="page-link"
                        href="{{ $paginator->nextPageUrl() }}"
                        rel="next"
                        aria-label="Следваща страница"
                    >
                        &rsaquo;
                    </a>
                </li>
            @else
                <li
                    class="page-item disabled"
                    aria-disabled="true"
                    aria-label="Следваща страница"
                >
                    <span class="page-link" aria-hidden="true">
                        &rsaquo;
                    </span>
                </li>
            @endif

        </ul>
    </nav>
@endif
