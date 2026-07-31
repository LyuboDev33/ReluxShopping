@props([
    'width' => 120,
    'mobileWidth' => 90,
])

<a href="/">
    <img
        class="d-none d-md-block rounded-pill"
        width="{{ $width }}"
        src="{{ asset('/assets/img/logo-relux.png') }}?v={{ time() }}"
        alt="Relux Logo"
    >

    <img
        class="d-block d-md-none rounded-pill"
        width="{{ $mobileWidth }}"
        src="{{ asset('/assets/img/logo-relux.png') }}?v={{ time() }}"
        alt="Relux Logo"
    >
</a>
