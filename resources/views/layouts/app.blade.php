<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('saporkren.seoDefaults.title', 'Kampung Saporkren') }}</title>

        <!-- Favicon / Logo Kampung -->
        <link rel="icon" type="image/png" href="{{ asset('assets/logo-kampung.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('assets/logo-kampung.png') }}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        
        <!-- Scripts -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body>
        <div class="app-shell"
             x-data="{ globalPreviewImg: null, globalPreviewTitle: '' }"
             @open-img-preview.window="globalPreviewImg = $event.detail.src; globalPreviewTitle = $event.detail.title"
             x-init="$watch('globalPreviewImg', val => { if(val) { document.body.classList.add('modal-open'); } else { document.body.classList.remove('modal-open'); } })">
            
            <a href="#main-content" class="skip-link">
                Lewati ke konten utama
            </a>

            <div class="layout-backdrop" aria-hidden="true"></div>

            <div class="main-wrapper">
                <x-navbar />
                
                <main id="main-content">
                    {{ $slot }}
                </main>
                
                <x-footer />
            </div>

            <!-- Global Image Lightbox Preview Modal -->
            <template x-teleport="body">
                <div x-show="globalPreviewImg" 
                     class="review-modal-backdrop" 
                     style="display: none; z-index: 99999; background: rgba(0, 0, 0, 0.88); backdrop-filter: blur(8px); cursor: pointer;" 
                     @click="globalPreviewImg = null"
                     @keydown.escape.window="globalPreviewImg = null">
                    
                    <div style="position: relative; max-width: min(520px, 85vw); max-height: 80vh; display: flex; flex-direction: column; align-items: center; justify-content: center; margin: auto; cursor: default;" @click.stop>
                        <button type="button" 
                                @click="globalPreviewImg = null" 
                                style="position: absolute; top: -3rem; right: 0; background: rgba(255, 255, 255, 0.25); border: none; color: white; padding: 0.5rem; border-radius: 9999px; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: background 0.2s;"
                                onmouseover="this.style.background='rgba(255,255,255,0.45)'"
                                onmouseout="this.style.background='rgba(255,255,255,0.25)'"
                                title="Tutup Pratinjau (Esc)">
                            <svg xmlns="http://www.w3.org/  2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" style="width: 1.5rem; height: 1.5rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>

                        <img :src="globalPreviewImg" :alt="globalPreviewTitle" style="max-width: 100%; max-height: 55vh; border-radius: 1rem; object-fit: contain; box-shadow: 0 20px 40px -10px rgba(0,0,0,0.6); border: 2px solid rgba(255, 255, 255, 0.15);" />
                        
                        <div x-show="globalPreviewTitle" style="margin-top: 1rem; background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(12px); color: white; padding: 0.5rem 1.25rem; border-radius: 9999px; font-weight: 700; font-size: 0.9rem; border: 1px solid rgba(255,255,255,0.2); box-shadow: var(--shadow-lg); text-align: center;">
                            <span x-text="globalPreviewTitle"></span>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.addEventListener('click', function(e) {
                    const img = e.target.closest('img');
                    if (!img) return;
                    
                    // Exclude videos, backgrounds, explicit no-preview elements, logos, icons or buttons
                    const srcAttr = img.getAttribute('src') || '';
                    if (img.classList.contains('no-preview') || 
                        img.closest('.no-preview') || 
                        img.closest('[data-no-preview]') || 
                        srcAttr.includes('logo') ||
                        img.closest('video') || 
                        img.closest('.review-modal-backdrop') ||
                        img.closest('.nav-brand') ||
                        img.closest('button')) {
                        return;
                    }

                    const src = img.getAttribute('src');
                    if (!src) return;

                    const title = img.getAttribute('alt') || '';
                    window.dispatchEvent(new CustomEvent('open-img-preview', {
                        detail: { src: src, title: title }
                    }));
                });
            });
        </script>
    </body>
</html>
