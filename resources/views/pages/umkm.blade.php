@php
$meta = config('saporkren.siteMeta');
@endphp

<x-app-layout>
    <main id="main-content" class="page-hero" style="background-image: url('{{ asset('assets/umkm/umkmbg.png') }}');" x-data="{ activeModal: null, previewImg: null, previewTitle: '' }" x-init="$watch('activeModal', val => { if(val || previewImg) { document.body.classList.add('modal-open'); } else { document.body.classList.remove('modal-open'); } }); $watch('previewImg', val => { if(val || activeModal) { document.body.classList.add('modal-open'); } else { document.body.classList.remove('modal-open'); } })">
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
                    Dukung perekonomian warga lokal dengan membawa pulang hasil karya tangan khas Papua serta aneka produk makanan olahan Kampung Saporkren.
                </p>
                
                <div class="cta-buttons">
                    <a href="/contact" class="btn btn-primary">
                        <span>Pesan Produk</span>
                        <svg aria-hidden="true" style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

            <!-- Session Alert Message -->
            @if(session('success'))
                <div style="margin-bottom: 2rem; padding: 1rem 1.5rem; background: #dcfce7; border: 1px solid #86efac; border-radius: 1rem; color: #166534; display: flex; align-items: center; gap: 0.75rem; font-weight: 600; box-shadow: var(--shadow-sm); animation: fadeIn 0.3s ease;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 1.5rem; height: 1.5rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div style="margin-bottom: 2rem; padding: 1rem 1.5rem; background: #fef2f2; border: 1px solid #fca5a5; border-radius: 1rem; color: #991b1b; display: flex; align-items: center; gap: 0.75rem; font-weight: 600; box-shadow: var(--shadow-sm); animation: fadeIn 0.3s ease;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 1.5rem; height: 1.5rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" /></svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif


            <!-- SECTION 1: KERAJINAN TANGAN -->
            <section class="py-8">
                <div class="card card-padded-lg" style="margin-bottom: 3rem;">
                    <div class="section-header">
                        <span class="hero-badge" style="background-color: var(--color-tropical); color: white;">Kerajinan Tangan</span>
                        <h2 class="section-title section-title-sm">Kerajinan Tangan Khas Papua</h2>
                        <p class="section-desc">Hasil rajutan kayu alami dan suvenir tradisional buatan tangan perajin lokal Saporkren.</p>
                    </div>

                    <div class="grid grid-cols-4" style="gap: 1.5rem;">
                        @forelse ($kerajinanProducts as $product)
                            @php
                                $imageSrc = asset('assets/umkm/noken.jpeg');
                                if (!empty($product->image)) {
                                    if (Str::startsWith($product->image, 'http')) {
                                        $imageSrc = $product->image;
                                    } elseif (Str::startsWith($product->image, 'storage/')) {
                                        $imageSrc = asset($product->image);
                                    } else {
                                        $imageSrc = asset('storage/' . $product->image);
                                    }
                                }
                            @endphp

                            <article class="product-article">
                                <div class="card-img-wrap-sm" style="overflow: hidden; background: var(--color-gray-100); aspect-ratio: 1 / 1; cursor: pointer;" @click="previewImg = '{{ $imageSrc }}'; previewTitle = '{{ e($product->name) }}'" title="Klik untuk lihat gambar {{ $product->name }}">
                                    <img src="{{ $imageSrc }}" alt="{{ $product->name }}" class="card-img" loading="lazy" decoding="async" onerror="this.onerror=null;this.src='{{ asset('assets/umkm/noken.jpeg') }}';" style="width: 100%; height: 100%; object-fit: cover;" />
                                </div>
                                
                                <div class="card-body" style="display: flex; flex-direction: column; flex-grow: 1; padding: 1.25rem; gap: 0.65rem;">
                                    <!-- Baris 1: Kategori Produk (Jenis UMKM) -->
                                    <div>
                                        <span class="category-label" style="display: inline-block; background: var(--color-tropical-light); color: var(--color-tropical-dark); padding: 0.3rem 0.75rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.03em;">
                                            {{ $product->category }}
                                        </span>
                                    </div>

                                    <!-- Baris 2: Rating Bintang (Baris terpisah) -->
                                    <div style="display: flex; align-items: center;">
                                        @if($product->reviews_count > 0)
                                            <div class="rating-badge" style="display: inline-flex; align-items: center; gap: 0.35rem; padding: 0.25rem 0.65rem; border-radius: 9999px; background-color: #fffbe6; border: 1px solid #ffe58f; font-size: 0.8rem; font-weight: 700; color: #d48806;">
                                                <svg viewBox="0 0 20 20" style="width: 0.9rem; height: 0.9rem; fill: #fadb14;"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                                <span>{{ number_format($product->average_rating, 1) }}</span>
                                                <span style="color: var(--color-gray-500); font-weight: 500; font-size: 0.75rem;">({{ $product->reviews_count }} ulasan)</span>
                                            </div>
                                        @else
                                            <div style="display: inline-flex; align-items: center; gap: 0.35rem; font-size: 0.775rem; color: var(--color-gray-500); font-weight: 500;">
                                                <span>⭐ Baru</span>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Nama & Deskripsi Produk -->
                                    <div>
                                        <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--color-dark); margin: 0 0 0.35rem 0; line-height: 1.35;">{{ $product->name }}</h3>
                                        <p style="font-size: 0.85rem; line-height: 1.45; color: var(--color-gray-600); margin: 0; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 2.45rem;">{{ $product->description }}</p>
                                    </div>
                                    
                                    <!-- Kotak Info Detail: Harga & Perajin (Masing-masing baris tersendiri) -->
                                    <div style="margin-top: auto; padding: 0.75rem 0.9rem; background: var(--color-gray-50); border: 1px solid var(--color-gray-200); border-radius: 0.85rem; display: flex; flex-direction: column; gap: 0.45rem;">
                                        <!-- Baris 1 Info: Harga -->
                                        <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px dashed var(--color-gray-200); padding-bottom: 0.4rem;">
                                            <span style="font-size: 0.78rem; color: var(--color-gray-500); font-weight: 500;">Harga:</span>
                                            <span style="font-weight: 800; font-size: 1.05rem; color: var(--color-ocean-dark);">Rp {{ is_numeric($product->price) ? number_format((float)$product->price, 0, ',', '.') : $product->price }}</span>
                                        </div>
                                        <!-- Baris 2 Info: Perajin -->
                                        <div style="display: flex; align-items: center; justify-content: space-between;">
                                            <span style="font-size: 0.78rem; color: var(--color-gray-500); font-weight: 500;">Perajin:</span>
                                            <span style="font-size: 0.85rem; font-weight: 700; color: var(--color-dark);">{{ $product->maker ?? 'Warga Saporkren' }}</span>
                                        </div>
                                    </div>

                                    <!-- Trigger Review Modal -->
                                    <button type="button" class="btn-review-trigger" @click="activeModal = {{ $product->id }}" style="margin-top: 0;">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.1rem; height: 1.1rem; color: #f59e0b;"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385c.116.488-.415.87-.837.604l-4.73-3.008a.563.563 0 00-.594 0l-4.73 3.008c-.422.266-.953-.116-.837-.604l1.285-5.385a.563.563 0 00-.182-.557l-4.204-3.602c-.38-.325-.178-.948.32-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" /></svg>
                                        <span>Lihat & Tulis Ulasan ({{ $product->reviews_count }})</span>
                                    </button>
                                </div>
                            </article>

                            <!-- Modal Review Kerajinan -->
                            <template x-teleport="body">
                                <div x-show="activeModal === {{ $product->id }}" class="review-modal-backdrop" style="display: none;" @keydown.escape.window="activeModal = null">
                                    <div class="review-modal-card" @click.outside="activeModal = null">
                                        <div class="review-modal-header">
                                            <div>
                                                <h3 class="review-modal-title">Ulasan & Rating: {{ $product->name }}</h3>
                                                <p style="font-size: 0.8rem; color: var(--color-gray-500); margin-top: 0.15rem;">Bagikan ulasan dan pengalaman Anda membeli produk kerajinan ini</p>
                                            </div>
                                            <button type="button" class="review-modal-close" @click="activeModal = null">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 1.5rem; height: 1.5rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                            </button>
                                        </div>

                                        <div class="review-modal-body">
                                            <!-- Mini Product Header Card -->
                                            <div style="display: flex; align-items: center; gap: 1rem; padding: 0.85rem 1rem; background: var(--color-gray-50); border: 1px solid var(--color-gray-200); border-radius: 1rem;">
                                                <img src="{{ $imageSrc }}" alt="{{ $product->name }}" style="width: 4rem; height: 4rem; border-radius: 0.6rem; object-fit: cover; border: 1px solid var(--color-gray-200);" />
                                                <div style="flex-grow: 1;">
                                                    <div style="display: flex; align-items: center; justify-content: space-between;">
                                                        <h4 style="font-size: 1.05rem; font-weight: 700; color: var(--color-dark); margin: 0;">{{ $product->name }}</h4>
                                                        <span style="font-weight: 700; font-size: 0.95rem; color: var(--color-ocean);">Rp {{ is_numeric($product->price) ? number_format((float)$product->price, 0, ',', '.') : $product->price }}</span>
                                                    </div>
                                                    <div style="display: flex; align-items: center; gap: 1rem; margin-top: 0.25rem; font-size: 0.8rem; color: var(--color-gray-600);">
                                                        <span>Kategori: <strong>{{ $product->category }}</strong></span>
                                                        <span>Perajin: <strong>{{ $product->maker ?? 'Warga Saporkren' }}</strong></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Rating Summary Header -->
                                            <div style="background: linear-gradient(135deg, #e0f2fe, #f0fdf4); border: 1px solid #bae6fd; border-radius: 1rem; padding: 1.25rem; display: flex; align-items: center; justify-content: space-between;">
                                                <div>
                                                    <span style="font-size: 0.8rem; font-weight: 600; color: var(--color-gray-600); text-transform: uppercase; letter-spacing: 0.05em;">Rating Rata-Rata</span>
                                                    <div style="display: flex; align-items: baseline; gap: 0.5rem; margin-top: 0.25rem;">
                                                        <span style="font-size: 2.25rem; font-weight: 800; color: var(--color-dark);">{{ number_format($product->average_rating, 1) }}</span>
                                                        <span style="font-size: 1rem; color: var(--color-gray-500);">/ 5.0</span>
                                                    </div>
                                                </div>
                                                <div style="text-align: right;">
                                                    <div style="display: flex; gap: 0.2rem; justify-content: flex-end; margin-bottom: 0.25rem;">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <svg style="width: 1.25rem; height: 1.25rem; fill: {{ $i <= round($product->average_rating) ? '#fadb14' : '#cbd5e1' }};" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                                        @endfor
                                                    </div>
                                                    <span style="font-size: 0.85rem; font-weight: 600; color: var(--color-ocean-dark);">{{ $product->reviews_count }} Ulasan Pengunjung</span>
                                                </div>
                                            </div>

                                            <!-- Form Tulis Ulasan -->
                                            <div style="background: white; border: 1px solid var(--color-gray-200); border-radius: 1.25rem; padding: 1.5rem;" x-data="{ rating: 5, hoverRating: 5 }">
                                                <h4 style="font-size: 1.05rem; font-weight: 700; color: var(--color-dark); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.25rem; height: 1.25rem; color: var(--color-ocean);"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" /></svg>
                                                    Tulis Ulasan Anda
                                                </h4>

                                                <form action="{{ route('reviews.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 1rem;">
                                                    @csrf
                                                    <input type="hidden" name="type" value="umkm">
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <input type="hidden" name="rating" :value="rating">

                                                    <div>
                                                        <label style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 0.35rem;">Pilih Rating Bintang:</label>
                                                        <div class="star-selector">
                                                            <template x-for="star in 5" :key="star">
                                                                <button type="button" class="star-btn" @click="rating = star" @mouseenter="hoverRating = star" @mouseleave="hoverRating = rating">
                                                                    <svg class="star-icon" :class="{ 'active': star <= hoverRating }" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                                                </button>
                                                            </template>
                                                            <span style="margin-left: 0.6rem; font-size: 0.875rem; font-weight: 700; color: #d48806;" x-text="hoverRating === 1 ? '1 Bintang (Kurang)' : (hoverRating === 2 ? '2 Bintang (Cukup)' : (hoverRating === 3 ? '3 Bintang (Bagus)' : (hoverRating === 4 ? '4 Bintang (Sangat Bagus)' : '5 Bintang (Sangat Memuaskan!)')))"></span>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <label for="name-umkm-{{ $product->id }}" style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 0.35rem;">Nama Lengkap:</label>
                                                        <input type="text" id="name-umkm-{{ $product->id }}" name="name" required placeholder="Masukkan nama Anda" style="width: 100%; padding: 0.65rem 0.9rem; border-radius: 0.5rem; border: 1px solid var(--color-gray-300); font-size: 0.875rem; font-family: inherit;">
                                                    </div>

                                                    <div>
                                                        <label for="comment-umkm-{{ $product->id }}" style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 0.35rem;">Komentar Ulasan:</label>
                                                        <textarea id="comment-umkm-{{ $product->id }}" name="comment" rows="3" required placeholder="Ceritakan pengalaman dan pendapat Anda..." style="width: 100%; padding: 0.65rem 0.9rem; border-radius: 0.5rem; border: 1px solid var(--color-gray-300); font-size: 0.875rem; font-family: inherit; resize: vertical;"></textarea>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary" style="align-self: flex-start; padding: 0.65rem 1.5rem; font-size: 0.875rem;">
                                                        <span>Kirim Ulasan</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 1rem; height: 1rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" /></svg>
                                                    </button>
                                                </form>
                                            </div>

                                            <!-- Daftar Ulasan Produk -->
                                            <div>
                                                <h4 style="font-size: 1.05rem; font-weight: 700; color: var(--color-dark); margin-bottom: 1rem;">Ulasan Pengunjung ({{ $product->reviews_count }})</h4>
                                                
                                                @forelse($product->reviews as $rev)
                                                    <div class="review-item-card" style="margin-bottom: 0.85rem;">
                                                        <div style="display: flex; align-items: center; justify-content: space-between;">
                                                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                                <div class="review-avatar-badge">
                                                                    {{ strtoupper(substr($rev->name, 0, 1)) }}
                                                                </div>
                                                                <div>
                                                                    <span style="font-weight: 700; font-size: 0.95rem; color: var(--color-dark); display: block;">{{ $rev->name }}</span>
                                                                    <span style="font-size: 0.75rem; color: var(--color-gray-500);">{{ $rev->created_at->diffForHumans() }}</span>
                                                                </div>
                                                            </div>
                                                            <div style="display: flex; gap: 0.15rem;">
                                                                @for($s = 1; $s <= 5; $s++)
                                                                    <svg style="width: 1rem; height: 1rem; fill: {{ $s <= $rev->rating ? '#fadb14' : '#cbd5e1' }};" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                        <p style="font-size: 0.875rem; color: var(--color-gray-700); line-height: 1.5; margin-top: 0.25rem;">
                                                            "{{ $rev->comment }}"
                                                        </p>

                                                        @if(!empty($rev->admin_reply))
                                                            <div style="margin-top: 0.65rem; padding: 0.75rem 1rem; background: #f0fdf4; border-left: 3px solid var(--color-tropical); border-radius: 0.5rem;">
                                                                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.25rem;">
                                                                    <span style="font-size: 0.8rem; font-weight: 700; color: var(--color-tropical-dark); display: flex; align-items: center; gap: 0.35rem;">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 0.9rem; height: 0.9rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                                        Balasan Pengelola Saporkren
                                                                    </span>
                                                                    @if($rev->replied_at)
                                                                        <span style="font-size: 0.7rem; color: var(--color-gray-500);">{{ $rev->replied_at->diffForHumans() }}</span>
                                                                    @endif
                                                                </div>
                                                                <p style="font-size: 0.825rem; color: var(--color-gray-700); margin: 0; line-height: 1.45;">
                                                                    {{ $rev->admin_reply }}
                                                                </p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @empty
                                                    <div style="text-align: center; padding: 2rem; background: var(--color-gray-50); border-radius: 1rem; border: 1px dashed var(--color-gray-300);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 2.5rem; height: 2.5rem; color: var(--color-gray-400); margin: 0 auto 0.5rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3.75h9m-9 3.75h5.25M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                        <p style="font-size: 0.875rem; color: var(--color-gray-500); margin: 0;">Belum ada ulasan untuk produk ini. Jadilah yang pertama memberikan ulasan!</p>
                                                    </div>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
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
                        <span class="hero-badge" style="background-color: #f97316; color: white;">Makanan Olahan</span>
                        <h2 class="section-title section-title-sm">Makanan Olahan Khas Saporkren</h2>
                        <p class="section-desc">Camilan dan makanan olahan buatan ibu-ibu Kampung Saporkren.</p>
                    </div>

                    <div class="grid grid-cols-4" style="gap: 1.5rem;">
                        @forelse ($makananProducts as $product)
                            @php
                                $makananImgSrc = asset('assets/umkm/noken.jpeg');
                                if (!empty($product->image)) {
                                    if (Str::startsWith($product->image, 'http')) {
                                        $makananImgSrc = $product->image;
                                    } elseif (Str::startsWith($product->image, 'storage/')) {
                                        $makananImgSrc = asset($product->image);
                                    } else {
                                        $makananImgSrc = asset('storage/' . $product->image);
                                    }
                                }
                            @endphp

                            <article class="product-article">
                                <div class="card-img-wrap-sm" style="overflow: hidden; background: var(--color-gray-100); aspect-ratio: 1 / 1; cursor: pointer;" @click="previewImg = '{{ $makananImgSrc }}'; previewTitle = '{{ e($product->name) }}'" title="Klik untuk lihat gambar {{ $product->name }}">
                                    <img src="{{ $makananImgSrc }}" alt="{{ $product->name }}" class="card-img" loading="lazy" decoding="async" onerror="this.onerror=null;this.src='{{ asset('assets/umkm/noken.jpeg') }}';" style="width: 100%; height: 100%; object-fit: cover;" />
                                </div>

                                <div class="card-body" style="display: flex; flex-direction: column; flex-grow: 1; padding: 1.25rem; gap: 0.65rem;">
                                    <!-- Baris 1: Kategori Produk (Jenis UMKM) -->
                                    <div>
                                        <span class="category-label" style="display: inline-block; background: #fff7ed; color: #ea580c; border: 1px solid #ffedd5; padding: 0.3rem 0.75rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.03em;">
                                            {{ $product->category }}
                                        </span>
                                    </div>

                                    <!-- Baris 2: Rating Bintang (Baris terpisah) -->
                                    <div style="display: flex; align-items: center;">
                                        @if($product->reviews_count > 0)
                                            <div class="rating-badge" style="display: inline-flex; align-items: center; gap: 0.35rem; padding: 0.25rem 0.65rem; border-radius: 9999px; background-color: #fffbe6; border: 1px solid #ffe58f; font-size: 0.8rem; font-weight: 700; color: #d48806;">
                                                <svg viewBox="0 0 20 20" style="width: 0.9rem; height: 0.9rem; fill: #fadb14;"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                                <span>{{ number_format($product->average_rating, 1) }}</span>
                                                <span style="color: var(--color-gray-500); font-weight: 500; font-size: 0.75rem;">({{ $product->reviews_count }} ulasan)</span>
                                            </div>
                                        @else
                                            <div style="display: inline-flex; align-items: center; gap: 0.35rem; font-size: 0.775rem; color: var(--color-gray-500); font-weight: 500;">
                                                <span>⭐ Baru</span>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Nama & Deskripsi Produk -->
                                    <div>
                                        <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--color-dark); margin: 0 0 0.35rem 0; line-height: 1.35;">{{ $product->name }}</h3>
                                        <p style="font-size: 0.85rem; line-height: 1.45; color: var(--color-gray-600); margin: 0; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 2.45rem;">{{ $product->description }}</p>
                                    </div>
                                    
                                    <!-- Kotak Info Detail: Harga & Produsen (Masing-masing baris tersendiri) -->
                                    <div style="margin-top: auto; padding: 0.75rem 0.9rem; background: var(--color-gray-50); border: 1px solid var(--color-gray-200); border-radius: 0.85rem; display: flex; flex-direction: column; gap: 0.45rem;">
                                        <!-- Baris 1 Info: Harga -->
                                        <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px dashed var(--color-gray-200); padding-bottom: 0.4rem;">
                                            <span style="font-size: 0.78rem; color: var(--color-gray-500); font-weight: 500;">Harga:</span>
                                            <span style="font-weight: 800; font-size: 1.05rem; color: var(--color-ocean-dark);">Rp {{ is_numeric($product->price) ? number_format((float)$product->price, 0, ',', '.') : $product->price }}</span>
                                        </div>
                                        <!-- Baris 2 Info: Produsen -->
                                        <div style="display: flex; align-items: center; justify-content: space-between;">
                                            <span style="font-size: 0.78rem; color: var(--color-gray-500); font-weight: 500;">Produsen:</span>
                                            <span style="font-size: 0.85rem; font-weight: 700; color: var(--color-dark);">{{ $product->maker ?? 'Kelompok Tani Saporkren' }}</span>
                                        </div>
                                    </div>

                                    <!-- Trigger Review Modal -->
                                    <button type="button" class="btn-review-trigger" @click="activeModal = {{ $product->id }}" style="margin-top: 0;">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.1rem; height: 1.1rem; color: #f59e0b;"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385c.116.488-.415.87-.837.604l-4.73-3.008a.563.563 0 00-.594 0l-4.73 3.008c-.422.266-.953-.116-.837-.604l1.285-5.385a.563.563 0 00-.182-.557l-4.204-3.602c-.38-.325-.178-.948.32-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" /></svg>
                                        <span>Lihat & Tulis Ulasan ({{ $product->reviews_count }})</span>
                                    </button>
                                </div>
                            </article>

                            <!-- Modal Review Makanan -->
                            <template x-teleport="body">
                                <div x-show="activeModal === {{ $product->id }}" class="review-modal-backdrop" style="display: none;" @keydown.escape.window="activeModal = null">
                                    <div class="review-modal-card" @click.outside="activeModal = null">
                                        <div class="review-modal-header">
                                            <div>
                                                <h3 class="review-modal-title">Ulasan & Rating: {{ $product->name }}</h3>
                                                <p style="font-size: 0.8rem; color: var(--color-gray-500); margin-top: 0.15rem;">Bagikan ulasan dan pengalaman Anda tentang produk makanan ini</p>
                                            </div>
                                            <button type="button" class="review-modal-close" @click="activeModal = null">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 1.5rem; height: 1.5rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                            </button>
                                        </div>

                                        <div class="review-modal-body">
                                            <!-- Mini Product Header Card -->
                                            <div style="display: flex; align-items: center; gap: 1rem; padding: 0.85rem 1rem; background: var(--color-gray-50); border: 1px solid var(--color-gray-200); border-radius: 1rem;">
                                                <img src="{{ $makananImgSrc }}" alt="{{ $product->name }}" style="width: 4rem; height: 4rem; border-radius: 0.6rem; object-fit: cover; border: 1px solid var(--color-gray-200);" />
                                                <div style="flex-grow: 1;">
                                                    <div style="display: flex; align-items: center; justify-content: space-between;">
                                                        <h4 style="font-size: 1.05rem; font-weight: 700; color: var(--color-dark); margin: 0;">{{ $product->name }}</h4>
                                                        <span style="font-weight: 700; font-size: 0.95rem; color: var(--color-ocean);">Rp {{ is_numeric($product->price) ? number_format((float)$product->price, 0, ',', '.') : $product->price }}</span>
                                                    </div>
                                                    <div style="display: flex; align-items: center; gap: 1rem; margin-top: 0.25rem; font-size: 0.8rem; color: var(--color-gray-600);">
                                                        <span>Kategori: <strong>{{ $product->category }}</strong></span>
                                                        <span>Produsen: <strong>{{ $product->maker ?? 'Kelompok Tani Saporkren' }}</strong></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Rating Summary Header -->
                                            <div style="background: linear-gradient(135deg, #e0f2fe, #f0fdf4); border: 1px solid #bae6fd; border-radius: 1rem; padding: 1.25rem; display: flex; align-items: center; justify-content: space-between;">
                                                <div>
                                                    <span style="font-size: 0.8rem; font-weight: 600; color: var(--color-gray-600); text-transform: uppercase; letter-spacing: 0.05em;">Rating Rata-Rata</span>
                                                    <div style="display: flex; align-items: baseline; gap: 0.5rem; margin-top: 0.25rem;">
                                                        <span style="font-size: 2.25rem; font-weight: 800; color: var(--color-dark);">{{ number_format($product->average_rating, 1) }}</span>
                                                        <span style="font-size: 1rem; color: var(--color-gray-500);">/ 5.0</span>
                                                    </div>
                                                </div>
                                                <div style="text-align: right;">
                                                    <div style="display: flex; gap: 0.2rem; justify-content: flex-end; margin-bottom: 0.25rem;">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <svg style="width: 1.25rem; height: 1.25rem; fill: {{ $i <= round($product->average_rating) ? '#fadb14' : '#cbd5e1' }};" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                                        @endfor
                                                    </div>
                                                    <span style="font-size: 0.85rem; font-weight: 600; color: var(--color-ocean-dark);">{{ $product->reviews_count }} Ulasan Pengunjung</span>
                                                </div>
                                            </div>

                                            <!-- Form Tulis Ulasan -->
                                            <div style="background: white; border: 1px solid var(--color-gray-200); border-radius: 1.25rem; padding: 1.5rem;" x-data="{ rating: 5, hoverRating: 5 }">
                                                <h4 style="font-size: 1.05rem; font-weight: 700; color: var(--color-dark); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.25rem; height: 1.25rem; color: var(--color-ocean);"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" /></svg>
                                                    Tulis Ulasan Anda
                                                </h4>

                                                <form action="{{ route('reviews.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 1rem;">
                                                    @csrf
                                                    <input type="hidden" name="type" value="umkm">
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <input type="hidden" name="rating" :value="rating">

                                                    <div>
                                                        <label style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 0.35rem;">Pilih Rating Bintang:</label>
                                                        <div class="star-selector">
                                                            <template x-for="star in 5" :key="star">
                                                                <button type="button" class="star-btn" @click="rating = star" @mouseenter="hoverRating = star" @mouseleave="hoverRating = rating">
                                                                    <svg class="star-icon" :class="{ 'active': star <= hoverRating }" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                                                </button>
                                                            </template>
                                                            <span style="margin-left: 0.6rem; font-size: 0.875rem; font-weight: 700; color: #d48806;" x-text="hoverRating === 1 ? '1 Bintang (Kurang)' : (hoverRating === 2 ? '2 Bintang (Cukup)' : (hoverRating === 3 ? '3 Bintang (Bagus)' : (hoverRating === 4 ? '4 Bintang (Sangat Bagus)' : '5 Bintang (Sangat Memuaskan!)')))"></span>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <label for="name-mk-{{ $product->id }}" style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 0.35rem;">Nama Lengkap:</label>
                                                        <input type="text" id="name-mk-{{ $product->id }}" name="name" required placeholder="Masukkan nama Anda" style="width: 100%; padding: 0.65rem 0.9rem; border-radius: 0.5rem; border: 1px solid var(--color-gray-300); font-size: 0.875rem; font-family: inherit;">
                                                    </div>

                                                    <div>
                                                        <label for="comment-mk-{{ $product->id }}" style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 0.35rem;">Komentar Ulasan:</label>
                                                        <textarea id="comment-mk-{{ $product->id }}" name="comment" rows="3" required placeholder="Ceritakan pengalaman dan pendapat Anda..." style="width: 100%; padding: 0.65rem 0.9rem; border-radius: 0.5rem; border: 1px solid var(--color-gray-300); font-size: 0.875rem; font-family: inherit; resize: vertical;"></textarea>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary" style="align-self: flex-start; padding: 0.65rem 1.5rem; font-size: 0.875rem;">
                                                        <span>Kirim Ulasan</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 1rem; height: 1rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" /></svg>
                                                    </button>
                                                </form>
                                            </div>

                                            <!-- Daftar Ulasan Produk -->
                                            <div>
                                                <h4 style="font-size: 1.05rem; font-weight: 700; color: var(--color-dark); margin-bottom: 1rem;">Ulasan Pengunjung ({{ $product->reviews_count }})</h4>
                                                
                                                @forelse($product->reviews as $rev)
                                                    <div class="review-item-card" style="margin-bottom: 0.85rem;">
                                                        <div style="display: flex; align-items: center; justify-content: space-between;">
                                                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                                <div class="review-avatar-badge">
                                                                    {{ strtoupper(substr($rev->name, 0, 1)) }}
                                                                </div>
                                                                <div>
                                                                    <span style="font-weight: 700; font-size: 0.95rem; color: var(--color-dark); display: block;">{{ $rev->name }}</span>
                                                                    <span style="font-size: 0.75rem; color: var(--color-gray-500);">{{ $rev->created_at->diffForHumans() }}</span>
                                                                </div>
                                                            </div>
                                                            <div style="display: flex; gap: 0.15rem;">
                                                                @for($s = 1; $s <= 5; $s++)
                                                                    <svg style="width: 1rem; height: 1rem; fill: {{ $s <= $rev->rating ? '#fadb14' : '#cbd5e1' }};" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                        <p style="font-size: 0.875rem; color: var(--color-gray-700); line-height: 1.5; margin-top: 0.25rem;">
                                                            "{{ $rev->comment }}"
                                                        </p>

                                                        @if(!empty($rev->admin_reply))
                                                            <div style="margin-top: 0.65rem; padding: 0.75rem 1rem; background: #f0fdf4; border-left: 3px solid var(--color-tropical); border-radius: 0.5rem;">
                                                                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.25rem;">
                                                                    <span style="font-size: 0.8rem; font-weight: 700; color: var(--color-tropical-dark); display: flex; align-items: center; gap: 0.35rem;">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 0.9rem; height: 0.9rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                                        Balasan Pengelola Saporkren
                                                                    </span>
                                                                    @if($rev->replied_at)
                                                                        <span style="font-size: 0.7rem; color: var(--color-gray-500);">{{ $rev->replied_at->diffForHumans() }}</span>
                                                                    @endif
                                                                </div>
                                                                <p style="font-size: 0.825rem; color: var(--color-gray-700); margin: 0; line-height: 1.45;">
                                                                    {{ $rev->admin_reply }}
                                                                </p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @empty
                                                    <div style="text-align: center; padding: 2rem; background: var(--color-gray-50); border-radius: 1rem; border: 1px dashed var(--color-gray-300);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 2.5rem; height: 2.5rem; color: var(--color-gray-400); margin: 0 auto 0.5rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3.75h9m-9 3.75h5.25M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                        <p style="font-size: 0.875rem; color: var(--color-gray-500); margin: 0;">Belum ada ulasan untuk produk ini. Jadilah yang pertama memberikan ulasan!</p>
                                                    </div>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        @empty
                            <p style="color: var(--color-gray-500);">Produk makanan belum tersedia.</p>
                        @endforelse
                    </div>
                </div>
            </section>
        </div>

        <!-- Modal Image Preview Lightbox -->
        <template x-teleport="body">
            <div x-show="previewImg" 
                 class="review-modal-backdrop" 
                 style="display: none; z-index: 9999; background: rgba(0, 0, 0, 0.88); backdrop-filter: blur(8px); cursor: pointer;" 
                 @click="previewImg = null"
                 @keydown.escape.window="previewImg = null">
                
                <div style="position: relative; max-width: min(520px, 85vw); max-height: 80vh; display: flex; flex-direction: column; align-items: center; justify-content: center; margin: auto; cursor: default;" @click.stop>
                    <button type="button" 
                            @click="previewImg = null" 
                            style="position: absolute; top: -3rem; right: 0; background: rgba(255, 255, 255, 0.25); border: none; color: white; padding: 0.5rem; border-radius: 9999px; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: background 0.2s;"
                            onmouseover="this.style.background='rgba(255,255,255,0.45)'"
                            onmouseout="this.style.background='rgba(255,255,255,0.25)'"
                            title="Tutup Pratinjau (Esc)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" style="width: 1.5rem; height: 1.5rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>

                    <img :src="previewImg" :alt="previewTitle" style="max-width: 100%; max-height: 55vh; border-radius: 1rem; object-fit: contain; box-shadow: 0 20px 40px -10px rgba(0,0,0,0.6); border: 2px solid rgba(255, 255, 255, 0.15);" />
                    
                    <div style="margin-top: 1rem; background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(12px); color: white; padding: 0.5rem 1.25rem; border-radius: 9999px; font-weight: 700; font-size: 0.9rem; border: 1px solid rgba(255,255,255,0.2); box-shadow: var(--shadow-lg); text-align: center;">
                        <span x-text="previewTitle"></span>
                    </div>
                </div>
            </div>
        </template>
    </main>
</x-app-layout>
