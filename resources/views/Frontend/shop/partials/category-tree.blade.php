@php
    $hasChildren = ! empty($node['children']);
    $isActive = ($activeSlug ?? null) === $node['slug'];
@endphp

<li class="shop-category__item {{ $isActive ? 'active open' : '' }}">
    <div class="shop-category__row">
        <a href="{{ route('shop.category', $node['slug']) }}">
            {{ $node['name'] }}
        </a>

        @if ($hasChildren)
            <button
                type="button"
                class="category-toggle"
                aria-label="Toggle {{ $node['name'] }}"
                aria-expanded="{{ $isActive ? 'true' : 'false' }}"
            >
                <i class="fa-solid fa-chevron-down"></i>
            </button>
        @endif
    </div>

    @if ($hasChildren)
        <ul class="shop-category__sublist">
            @foreach ($node['children'] as $child)
                @include('Frontend.shop.partials.category-tree', [
                    'node' => $child,
                    'activeSlug' => $activeSlug ?? null,
                ])
            @endforeach
        </ul>
    @endif
</li>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const categoryTree = document.querySelector('.shop-category__tree');

        if (!categoryTree) {
            return;
        }

        // Close everything except the active category.
        categoryTree
            .querySelectorAll('.shop-category__item:not(.active)')
            .forEach(function (item) {
                item.classList.remove('open');
            });

        // Keep the active category open and open all of its parents.
        const activeItem = categoryTree.querySelector('.shop-category__item.active');

        if (activeItem) {
            activeItem.classList.add('open');

            const activeToggle = activeItem.querySelector(
                ':scope > .shop-category__row > .category-toggle'
            );

            if (activeToggle) {
                activeToggle.setAttribute('aria-expanded', 'true');
            }

            let parentItem = activeItem.parentElement.closest('.shop-category__item');

            while (parentItem) {
                parentItem.classList.add('open');

                const parentToggle = parentItem.querySelector(
                    ':scope > .shop-category__row > .category-toggle'
                );

                if (parentToggle) {
                    parentToggle.setAttribute('aria-expanded', 'true');
                }

                parentItem = parentItem.parentElement.closest('.shop-category__item');
            }
        }

        categoryTree.addEventListener('click', function (event) {
            const button = event.target.closest('.category-toggle');

            if (!button) {
                return;
            }

            const currentItem = button.closest('.shop-category__item');
            const parentList = currentItem.parentElement;
            const willOpen = !currentItem.classList.contains('open');

            Array.from(parentList.children).forEach(function (sibling) {
                if (
                    sibling !== currentItem &&
                    sibling.classList.contains('shop-category__item')
                ) {
                    sibling.classList.remove('open');

                    const siblingToggle = sibling.querySelector(
                        ':scope > .shop-category__row > .category-toggle'
                    );

                    if (siblingToggle) {
                        siblingToggle.setAttribute('aria-expanded', 'false');
                    }
                }
            });

            currentItem.classList.toggle('open', willOpen);
            button.setAttribute('aria-expanded', String(willOpen));
        });
    });
</script>
