@php
$meta = config('saporkren.siteMeta');
@endphp

<x-app-layout>
    <main id="main-content" class="page-hero" style="background-image: url('{{ asset('assets/umkm/umkmbg.png') }}');">
        <div class="page-hero-overlay-h"></div>
        <div class="page-hero-overlay-v"></div>
        
        <div class="container page-hero-inner">
            <!-- Header section -->
            <div class="page-header">
                <span class="hero-badge">Ekonomi Kreatif UMKM</span>
                <h1 class="hero-title subpage-title">
                    Produk UMKM Lokal Kampung Saporkren
                </h1>
                <p class="hero-text">
                    Dukung perekonomian warga lokal dengan membawa pulang hasil karya tangan autentik khas Papua serta aneka produk makanan olahan hasil laut Kampung Saporkren.
                </p>
                
                <div class="cta-buttons">
                    <a href="/contact" class="btn btn-primary">
                        <span>Pesan / Hubungi Penjual</span>
                        <svg aria-hidden="true" style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

            <!-- SECTION 1: KERAJINAN -->
            <section class="py-8">
                <div class="card card-padded-lg" style="margin-bottom: 3rem;">
                    <div class="section-header">
                        <span class="hero-badge" style="background-color: var(--color-tropical); color: white;">Kerajinan Tangan & Souvenir</span>
                        <h2 class="section-title section-title-sm">Kerajinan Tangan & Souvenir Khas Papua</h2>
                        <p class="section-desc">Hasil rajutan kayu alami dan suvenir tradisional buatan tangan perajin lokal Saporkren.</p>
                    </div>

                    <div class="grid grid-cols-3" style="gap: 2rem;">
                        @forelse ($kerajinanProducts as $product)
                            <article class="product-article">
                                @if ($product->image)
                                    <div class="card-img-wrap-sm">
                                        @if(Str::startsWith($product->image, 'http'))
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="card-img" />
                                        @else
                                            <img src="{{ asset(Str::startsWith($product->image, 'storage/') ? $product->image : 'storage/'.$product->image) }}" alt="{{ $product->name }}" class="card-img" onerror="this.src='{{ asset($product->image) }}'" />
                                        @endif
                                    </div>
                                @else
                                    <div style="height: 180px; width: 100%; background: var(--color-gray-100); display: flex; align-items: center; justify-content: center; color: var(--color-gray-400);">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                                    </div>
                                @endif
                                
                                <div class="card-body">
                                    <span class="category-label">
                                        {{ $product->category }}
                                    </span>
                                    <h3 style="margin-top: 0.5rem; font-size: 1.35rem; font-weight: 700; color: var(--color-dark);">{{ $product->name }}</h3>
                                    <p style="margin-top: 0.75rem; font-size: 0.875rem; line-height: 1.5; color: var(--color-gray-600); flex-grow: 1;">{{ $product->description }}</p>
                                    
                                    <div class="card-footer-split">
                                        <div>
                                            <span style="font-size: 0.75rem; color: var(--color-gray-500); display: block;">Harga:</span>
                                            <span style="font-weight: 700; font-size: 1.1rem; color: var(--color-ocean);">Rp {{ is_numeric($product->price) ? number_format((float)$product->price, 0, ',', '.') : $product->price }}</span>
                                        </div>
                                        <div style="text-align: right;">
                                            <span style="font-size: 0.75rem; color: var(--color-gray-500); display: block;">Perajin:</span>
                                            <span style="font-size: 0.85rem; font-weight: 600; color: var(--color-dark);">{{ $product->maker ?? 'Warga Saporkren' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <p style="color: var(--color-gray-500);">Produk kerajinan belum tersedia.</p>
                        @endforelse
                    </div>
                </div>
            </section>

            <!-- SECTION 2: MAKANAN & KULINER OLAHAN -->
            <section class="py-8">
                <div class="card card-padded-lg">
                    <div class="section-header">
                        <span class="hero-badge" style="background-color: #f97316; color: white;">Makanan & Kuliner Olahan</span>
                        <h2 class="section-title section-title-sm">Kuliner & Makanan Olahan Khas Saporkren</h2>
                        <p class="section-desc">Camilan dan makanan olahan hasil laut gurih buatan ibu-ibu kelompok tani & nelayan Kampung Saporkren.</p>
                    </div>

                    <div class="grid grid-cols-3" style="gap: 2rem;">
                        @forelse ($makananProducts as $product)
                            <article class="product-article">
                                @if ($product->image)
                                    <div class="card-img-wrap-sm">
                                        @if(Str::startsWith($product->image, 'http'))
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover;" />
                                        @else
                                            <img src="{{ asset(Str::startsWith($product->image, 'storage/') ? $product->image : 'storage/'.$product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='{{ asset($product->image) }}'" />
                                        @endif
                                    </div>
                                @else
                                    <div style="height: 180px; width: 100%; background: var(--color-gray-100); display: flex; align-items: center; justify-content: center; color: var(--color-gray-400);">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m-0.001 0A11.959 11.959 0 0112 18c-3.187 0-6.096-1.241-8.25-3.266M3.284 14.253A8.959 8.959 0 013 12c0-.778.099-1.533.284-2.253" /></svg>
                                    </div>
                                @endif
                                
                                <div class="card-body">
                                    <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.15em; color: #f97316;">
                                        {{ $product->category }}
                                    </span>
                                    <h3 style="margin-top: 0.5rem; font-size: 1.35rem; font-weight: 700; color: var(--color-dark);">{{ $product->name }}</h3>
                                    <p style="margin-top: 0.75rem; font-size: 0.875rem; line-height: 1.5; color: var(--color-gray-600); flex-grow: 1;">{{ $product->description }}</p>
                                    
                                    <div class="card-footer-split">
                                        <div>
                                            <span style="font-size: 0.75rem; color: var(--color-gray-500); display: block;">Harga:</span>
                                            <span style="font-weight: 700; font-size: 1.1rem; color: var(--color-ocean);">Rp {{ is_numeric($product->price) ? number_format((float)$product->price, 0, ',', '.') : $product->price }}</span>
                                        </div>
                                        <div style="text-align: right;">
                                            <span style="font-size: 0.75rem; color: var(--color-gray-500); display: block;">Produsen:</span>
                                            <span style="font-size: 0.85rem; font-weight: 600; color: var(--color-dark);">{{ $product->maker ?? 'Kelompok Tani Saporkren' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <p style="color: var(--color-gray-500);">Produk makanan belum tersedia.</p>
                        @endforelse
                    </div>
                </div>
            </section>
        </div>
    </main>
</x-app-layout>
