@php
$meta = config('saporkren.siteMeta');
@endphp

<x-app-layout>
    <main id="main-content" style="background-image: url('{{ asset('assets/umkm/umkmbg.png') }}'); background-size: cover; background-position: center; background-attachment: fixed; position: relative; padding-bottom: 5rem;">
        <div style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(255,255,255,0.95) 0%, rgba(255,255,255,0.85) 10%, rgba(255,255,255,0.6) 30%, rgba(255,255,255,0) 60%); pointer-events: none;"></div>
        <div style="position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.6) 25%, rgba(255,255,255,1) 35%); pointer-events: none;"></div>
        
        <div class="container" style="position: relative; z-index: 10; padding-top: 8rem;">
            <!-- Header section -->
            <div style="max-width: 800px; margin-bottom: 4rem;">
                <span class="hero-badge" style="margin-bottom: 1rem;">Ekonomi Kreatif UMKM</span>
                <h1 class="hero-title" style="text-align: left; font-size: clamp(2.25rem, 5vw, 3.25rem);">
                    Produk UMKM Lokal Kampung Saporkren
                </h1>
                <p class="hero-text" style="text-align: left; font-size: 1.125rem; color: var(--color-gray-600);">
                    Dukung perekonomian warga lokal dengan membawa pulang hasil karya tangan autentik khas Papua serta aneka produk makanan olahan hasil laut Kampung Saporkren.
                </p>
                
                <div style="margin-top: 2rem; display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="/contact" class="btn btn-primary">
                        <span>Pesan / Hubungi Penjual</span>
                        <svg aria-hidden="true" style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

            <!-- SECTION 1: KERAJINAN -->
            <section class="py-8">
                <div class="card card-padded-lg" style="margin-bottom: 3rem;">
                    <div style="margin-bottom: 2rem;">
                        <span class="hero-badge" style="background-color: var(--color-tropical); color: white;">Kerajinan Tangan & Souvenir</span>
                        <h2 class="section-title" style="font-size: 2rem; margin-top: 0.75rem;">Kerajinan Tangan & Souvenir Khas Papua</h2>
                        <p style="color: var(--color-gray-500); margin-top: 0.25rem;">Hasil rajutan kayu alami dan suvenir tradisional buatan tangan perajin lokal Saporkren.</p>
                    </div>

                    <div class="grid grid-cols-3" style="gap: 2rem;">
                        @forelse ($kerajinanProducts as $product)
                            <article style="border: 1px solid var(--color-gray-200); border-radius: 1.5rem; display: flex; flex-direction: column; overflow: hidden; background: white; box-shadow: var(--shadow-sm);">
                                @if ($product->image)
                                    <div style="height: 200px; width: 100%; overflow: hidden; position: relative;">
                                        @if(Str::startsWith($product->image, 'http'))
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover;" />
                                        @else
                                            <img src="{{ asset(Str::startsWith($product->image, 'storage/') ? $product->image : 'storage/'.$product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='{{ asset($product->image) }}'" />
                                        @endif
                                    </div>
                                @else
                                    <div style="height: 180px; width: 100%; background: var(--color-gray-100); display: flex; align-items: center; justify-content: center; color: var(--color-gray-400);">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 3rem; height: 3rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                                    </div>
                                @endif
                                
                                <div style="padding: 1.5rem; display: flex; flex-direction: column; flex: 1;">
                                    <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.15em; color: var(--color-tropical);">
                                        {{ $product->category }}
                                    </span>
                                    <h3 style="margin-top: 0.5rem; font-size: 1.35rem; font-weight: 700; color: var(--color-dark);">{{ $product->name }}</h3>
                                    <p style="margin-top: 0.75rem; font-size: 0.875rem; line-height: 1.5; color: var(--color-gray-600); flex-grow: 1;">{{ $product->description }}</p>
                                    
                                    <div style="margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--color-gray-100); display: flex; justify-content: space-between; align-items: center;">
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
                    <div style="margin-bottom: 2rem;">
                        <span class="hero-badge" style="background-color: #f97316; color: white;">Makanan & Kuliner Olahan</span>
                        <h2 class="section-title" style="font-size: 2rem; margin-top: 0.75rem;">Kuliner & Makanan Olahan Khas Saporkren</h2>
                        <p style="color: var(--color-gray-500); margin-top: 0.25rem;">Camilan dan makanan olahan hasil laut gurih buatan ibu-ibu kelompok tani & nelayan Kampung Saporkren.</p>
                    </div>

                    <div class="grid grid-cols-3" style="gap: 2rem;">
                        @forelse ($makananProducts as $product)
                            <article style="border: 1px solid var(--color-gray-200); border-radius: 1.5rem; display: flex; flex-direction: column; overflow: hidden; background: white; box-shadow: var(--shadow-sm);">
                                @if ($product->image)
                                    <div style="height: 200px; width: 100%; overflow: hidden; position: relative;">
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
                                
                                <div style="padding: 1.5rem; display: flex; flex-direction: column; flex: 1;">
                                    <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.15em; color: #f97316;">
                                        {{ $product->category }}
                                    </span>
                                    <h3 style="margin-top: 0.5rem; font-size: 1.35rem; font-weight: 700; color: var(--color-dark);">{{ $product->name }}</h3>
                                    <p style="margin-top: 0.75rem; font-size: 0.875rem; line-height: 1.5; color: var(--color-gray-600); flex-grow: 1;">{{ $product->description }}</p>
                                    
                                    <div style="margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--color-gray-100); display: flex; justify-content: space-between; align-items: center;">
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
