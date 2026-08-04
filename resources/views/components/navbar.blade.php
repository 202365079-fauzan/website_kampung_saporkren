@php
$navItems = config('saporkren.navigationItems');
$brand = config('saporkren.siteMeta.brand');
$location = config('saporkren.siteMeta.location');
$whatsapp = config('saporkren.siteMeta.whatsapp');
@endphp

<header class="navbar" x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 18)" :class="{ 'scrolled': scrolled }">
    <div class="container">
        <a href="/" class="nav-brand">
            <span class="nav-brand-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456z" />
                </svg>
            </span>
            <div style="display: flex; flex-direction: column;">
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
