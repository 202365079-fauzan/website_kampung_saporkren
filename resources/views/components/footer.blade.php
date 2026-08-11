@php
$navItems = config('saporkren.navigationItems');
$brand = config('saporkren.siteMeta.brand');
$tagline = config('saporkren.siteMeta.tagline');
$location = config('saporkren.siteMeta.location');
$whatsapp = config('saporkren.siteMeta.whatsapp');
$instagram = config('saporkren.siteMeta.instagram');
$mapsUrl = config('saporkren.siteMeta.mapsUrl');
@endphp

<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div>
                <div class="footer-brand" style="display: flex; align-items: center; gap: 0.85rem; margin-bottom: 1.25rem;">
                    <img src="{{ asset('assets/logo-kampung.png') }}" alt="Logo Kampung Saporkren" class="no-preview" style="width: 48px; height: 48px; border-radius: 9999px; object-fit: contain; background: white; padding: 3px; box-shadow: var(--shadow-sm);" />
                    <div class="flex-col">
                        <span class="footer-brand-text">{{ $brand }}</span>
                        <span style="font-size: 0.875rem; color: var(--color-gray-500);">{{ $tagline }}</span>
                    </div>
                </div>
                <p class="footer-text">
                    Media promosi resmi Kampung Saporkren untuk memperkenalkan pesona alam, budaya,
                    pemandu lokal, dan UMKM dalam pengalaman digital yang modern.
                </p>
                <div style="display: flex; align-items: flex-start; gap: 0.5rem; color: var(--color-gray-500); font-size: 0.875rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.25rem; height: 1.25rem; color: var(--color-ocean);">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                    </svg>
                    <span>{{ $location }}</span>
                </div>
            </div>



            <div>
                <h2 class="footer-title ">Kontak</h2>
                <div style="display: flex; flex-direction: column; gap: 1rem; color: var(--color-gray-500); font-size: 0.875rem;">
                    <p>WhatsApp: 0812-4676-8290</p>
                    <a href="{{ $mapsUrl }}" target="_blank" rel="noreferrer" style="display: inline-flex; align-items: center; gap: 0.5rem; font-weight: 600; color: var(--color-ocean);">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.25rem; height: 1.25rem;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                        Lihat lokasi peta
                    </a>
                    
                    <div style="margin-top: 0.5rem;">
                        <img src="{{ asset('assets/logo-kkn.jpeg') }}" alt="Logo KKN" class="no-preview" style="width: 75px; height: 75px; border-radius: 9999px; object-fit: contain; background: white; padding: 4px; box-shadow: var(--shadow-md); border: 2px solid var(--color-gray-200); transition: transform 0.3s ease; cursor: default;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" />
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>Copyright © {{ date('Y') }} {{ $brand }}. All rights reserved.</p>
            <p>KKN Tematik Teknik Informatika, Universitas Papua</p>
        </div>
    </div>
</footer>
