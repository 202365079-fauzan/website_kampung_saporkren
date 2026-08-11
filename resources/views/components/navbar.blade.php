@php
$navItems = config('saporkren.navigationItems');
$brand = config('saporkren.siteMeta.brand');
$location = config('saporkren.siteMeta.location');
$whatsapp = config('saporkren.siteMeta.whatsapp');
@endphp

<header class="navbar" x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 18)" :class="{ 'scrolled': scrolled }">
    <div class="container">
        <a href="/" class="nav-brand" style="display: flex; align-items: center; gap: 0.75rem;">
            <img src="{{ asset('assets/logo-kampung.png') }}" alt="Logo Kampung Saporkren" class="no-preview" style="width: 40px; height: 40px; border-radius: 9999px; object-fit: contain; background: white; padding: 2px; box-shadow: var(--shadow-sm);" />
            <div class="flex-col">
                <span class="nav-brand-text">{{ $brand }}</span>
                <span style="font-size: 0.75rem; color: var(--color-gray-500); line-height: 1;">{{ $location }}</span>
            </div>
        </a>
        <nav class="nav-links">
            @foreach($navItems as $item)
                @php
                    $isActive = request()->is(ltrim($item['path'], '/')) || (request()->is(ltrim($item['path'], '/').'/*') && $item['path'] !== '/');
                @endphp
                <a href="{{ $item['path'] }}" class="nav-link {{ $isActive ? 'active' : '' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <button @click="open = !open" type="button" class="mobile-menu-btn" aria-label="Toggle menu">
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.5rem; height: 1.5rem;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
            </svg>
            <svg x-show="open" style="display: none; width: 1.5rem; height: 1.5rem;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="mobile-menu" :class="{ 'active': open }" x-show="open" style="display: none;">
            @foreach($navItems as $item)
                @php
                    $isActive = request()->is(ltrim($item['path'], '/')) || (request()->is(ltrim($item['path'], '/').'/*') && $item['path'] !== '/');
                @endphp
                <a href="{{ $item['path'] }}" class="nav-link {{ $isActive ? 'active' : '' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>
    </div>
</header>
