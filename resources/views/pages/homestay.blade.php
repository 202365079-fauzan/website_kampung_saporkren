@php
$meta = config('saporkren.siteMeta');
@endphp

<x-app-layout>
    <main id="main-content" class="page-hero" style="background-image: url('{{ asset('assets/homestay/homestaybg.png') }}');" x-data="{ activeModal: null }" x-init="$watch('activeModal', val => { if(val) { document.body.classList.add('modal-open'); } else { document.body.classList.remove('modal-open'); } })">
        <div class="page-hero-overlay-h"></div>
        <div class="page-hero-overlay-v"></div>
        
        <div class="container page-hero-inner">
            <!-- Header section -->
            <div class="page-header">
                <span class="hero-badge">Homestay</span>
                <h1 class="hero-title subpage-title">
                    Daftar Homestay di Kampung Saporkren
                </h1>
                <p class="hero-text">
                    Nikmati suasana tenang penginapan tepi pantai yang dikelola langsung oleh warga lokal. Tempat istirahat yang nyaman dengan pemandangan laut yang asri dan keramahan alami khas Raja Ampat.
                </p>
                
                <div class="cta-buttons">
                    <a href="/contact" class="btn btn-primary">
                        <span>Reservasi Homestay</span>
                        <svg aria-hidden="true" style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

            <!-- Session Alert Message -->
            @if(session('success'))
                <div style="margin-bottom: 2rem; padding: 1rem 1.5rem; background: #dcfce7; border: 1px solid #86efac; border-radius: 1rem; color: #166534; display: flex; align-items: center; gap: 0.75rem; font-weight: 600; box-shadow: var(--shadow-sm);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 1.5rem; height: 1.5rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div style="margin-bottom: 2rem; padding: 1rem 1.5rem; background: #fef2f2; border: 1px solid #fca5a5; border-radius: 1rem; color: #991b1b; display: flex; align-items: center; gap: 0.75rem; font-weight: 600; box-shadow: var(--shadow-sm);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 1.5rem; height: 1.5rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" /></svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif


            <!-- 1. Daftar Homestay -->
            <section class="py-8">
                <div class="grid grid-cols-4 card-padded-lg" style="background: white; border-radius: var(--radius-2xl); overflow: hidden; box-shadow: var(--shadow-sm); border: 1px solid var(--color-gray-200); margin-bottom: 3rem;">
                    @foreach ($homestays as $home)
                        <article class="card" style="display: flex; flex-direction: column; overflow: hidden; background: white; border: 1px solid var(--color-gray-200);">
                            @php
                                $imageSrc = asset('assets/homestay/Mambefor.jpg');
                                if (!empty($home->image)) {
                                    if (Str::startsWith($home->image, 'http')) {
                                        $imageSrc = $home->image;
                                    } elseif (Str::startsWith($home->image, 'storage/')) {
                                        $imageSrc = asset($home->image);
                                    } else {
                                        $imageSrc = asset('storage/' . $home->image);
                                    }
                                }
                            @endphp
                            <div class="card-image-wrap card-img-wrap" style="position: relative;">
                                <img src="{{ $imageSrc }}" alt="{{ $home->name }}" class="card-image card-img" loading="lazy" decoding="async" onerror="this.onerror=null;this.src='{{ asset('assets/homestay/Mambefor.jpg') }}';" />

                                <!-- Rating Badge overlay -->
                                <div style="position: absolute; top: 0.75rem; right: 0.75rem;">
                                    @if($home->reviews_count > 0)
                                        <div class="rating-badge" style="box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
                                            <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                            <span>{{ number_format($home->average_rating, 1) }}</span>
                                            <span class="rating-count">({{ $home->reviews_count }})</span>
                                        </div>
                                    @else
                                        <div class="rating-badge" style="background: rgba(255,255,255,0.9); border-color: #e2e8f0; color: #64748b; backdrop-filter: blur(4px);">
                                            <span>⭐ Baru</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="card-content card-body" style="display: flex; flex-direction: column; flex-grow: 1;">
                                <div style="display: flex; align-items: start; justify-content: space-between; gap: 0.5rem; margin-bottom: 0.5rem;">
                                    <h3 class="card-title" style="font-size: 1.35rem; font-weight: 700; color: var(--color-dark); margin: 0;">{{ $home->name }}</h3>
                                </div>
                                <p class="card-text" style="font-size: 0.875rem; color: var(--color-gray-600); margin-bottom: 1.25rem; line-height: 1.5;">{{ !empty($home->short_description) ? $home->short_description : '' }}</p>

                                <div style="display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 1.25rem; font-size: 0.85rem;">
                                    <div style="background: var(--color-gray-50); padding: 0.6rem 0.8rem; border-radius: 0.5rem; border: 1px solid var(--color-gray-200); display: flex; flex-direction: column; gap: 0.25rem;">
                                        <span style="font-weight: 600; color: var(--color-dark);">Pemilik</span>
                                        <span style="color: var(--color-gray-600);">{{ $home->owner ?? '-' }}</span>
                                    </div>
                                    <div style="background: var(--color-gray-50); padding: 0.6rem 0.8rem; border-radius: 0.5rem; border: 1px solid var(--color-gray-200); display: flex; flex-direction: column; gap: 0.25rem;">
                                        <span style="font-weight: 600; color: var(--color-dark);">Harga</span>
                                        <span style="font-weight: 700; color: var(--color-ocean);">
                                            @if(is_numeric($home->price) && $home->price > 0)
                                                Rp {{ number_format((float)$home->price, 0, ',', '.') }} / Orang + Makan
                                            @else
                                                {{ $home->price ?? 'Hubungi Pemilik' }}
                                            @endif
                                        </span>
                                    </div>
                                    <div style="background: var(--color-gray-50); padding: 0.6rem 0.8rem; border-radius: 0.5rem; border: 1px solid var(--color-gray-200); display: flex; flex-direction: column; gap: 0.25rem;">
                                        <span style="font-weight: 600; color: var(--color-dark);">Kapasitas</span>
                                        <span style="color: var(--color-gray-600);">{{ !empty($home->capacity) ? $home->capacity : '-' }} Orang</span>
                                    </div>
                                    <div style="background: var(--color-gray-50); padding: 0.6rem 0.8rem; border-radius: 0.5rem; border: 1px solid var(--color-gray-200); display: flex; flex-direction: column; gap: 0.25rem;">
                                        <span style="font-weight: 600; color: var(--color-dark);">Fasilitas</span>
                                        <span style="color: var(--color-gray-600); line-height: 1.4;">{{ !empty($home->facilities) ? (is_array($home->facilities) ? implode(', ', $home->facilities) : $home->facilities) : '-' }}</span>
                                    </div>
                                </div>

                                <div class="mt-auto" style="display: flex; flex-direction: column; gap: 0.5rem;">
                                    <!-- Trigger Review Modal -->
                                    <button type="button" class="btn-review-trigger" @click="activeModal = {{ $home->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.1rem; height: 1.1rem; color: #f59e0b;"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385c.116.488-.415.87-.837.604l-4.73-3.008a.563.563 0 00-.594 0l-4.73 3.008c-.422.266-.953-.116-.837-.604l1.285-5.385a.563.563 0 00-.182-.557l-4.204-3.602c-.38-.325-.178-.948.32-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" /></svg>
                                        <span>Lihat & Tulis Ulasan ({{ $home->reviews_count }})</span>
                                    </button>

                                    @if($home->maps_link)
                                        <a href="{{ $home->maps_link }}" target="_blank" rel="noreferrer" class="btn btn-secondary" style="width: 100%; justify-content: center; font-size: 0.875rem;">
                                            <svg aria-hidden="true" style="width: 1.25rem; height: 1.25rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"></path></svg>
                                            Petunjuk Lokasi Maps
                                        </a>
                                    @else
                                        <a href="/contact" class="btn btn-secondary" style="width: 100%; justify-content: center; font-size: 0.875rem;">
                                            <svg aria-hidden="true" style="width: 1.25rem; height: 1.25rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                            Hubungi Pemilik
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </article>                        <!-- Review Modal for each Homestay -->
                        <template x-teleport="body">
                            <div x-show="activeModal === {{ $home->id }}" class="review-modal-backdrop" style="display: none;" @keydown.escape.window="activeModal = null">
                                <div class="review-modal-card" @click.outside="activeModal = null">
                                    <div class="review-modal-header">
                                        <div>
                                            <h3 class="review-modal-title">Ulasan & Rating: {{ $home->name }}</h3>
                                            <p style="font-size: 0.8rem; color: var(--color-gray-500); margin-top: 0.15rem;">Bagikan kesan dan pengalaman Anda menginap di sini</p>
                                        </div>
                                        <button type="button" class="review-modal-close" @click="activeModal = null">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 1.5rem; height: 1.5rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                        </button>
                                    </div>

                                    <div class="review-modal-body">
                                        <!-- Mini Homestay Header Card -->
                                        <div style="display: flex; align-items: center; gap: 1rem; padding: 0.85rem 1rem; background: var(--color-gray-50); border: 1px solid var(--color-gray-200); border-radius: 1rem;">
                                            <img src="{{ $imageSrc }}" alt="{{ $home->name }}" style="width: 4rem; height: 4rem; border-radius: 0.6rem; object-fit: cover; border: 1px solid var(--color-gray-200);" />
                                            <div style="flex-grow: 1;">
                                                <div style="display: flex; align-items: center; justify-content: space-between;">
                                                    <h4 style="font-size: 1.05rem; font-weight: 700; color: var(--color-dark); margin: 0;">{{ $home->name }}</h4>
                                                    <span style="font-weight: 700; font-size: 0.95rem; color: var(--color-ocean);">
                                                        @if(is_numeric($home->price) && $home->price > 0)
                                                            Rp {{ number_format((float)$home->price, 0, ',', '.') }} / Malam
                                                        @else
                                                            {{ $home->price ?? 'Hubungi Pemilik' }}
                                                        @endif
                                                    </span>
                                                </div>
                                                <div style="display: flex; align-items: center; gap: 1rem; margin-top: 0.25rem; font-size: 0.8rem; color: var(--color-gray-600);">
                                                    <span>Pemilik: <strong>{{ $home->owner ?? '-' }}</strong></span>
                                                    <span>Kapasitas: <strong>{{ $home->capacity ?? '-' }} Orang</strong></span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Summary Header -->
                                        <div style="background: linear-gradient(135deg, #e0f2fe, #f0fdf4); border: 1px solid #bae6fd; border-radius: 1rem; padding: 1.25rem; display: flex; align-items: center; justify-content: space-between;">
                                            <div>
                                                <span style="font-size: 0.8rem; font-weight: 600; color: var(--color-gray-600); text-transform: uppercase; letter-spacing: 0.05em;">Rating Rata-Rata</span>
                                                <div style="display: flex; align-items: baseline; gap: 0.5rem; margin-top: 0.25rem;">
                                                    <span style="font-size: 2.25rem; font-weight: 800; color: var(--color-dark);">{{ number_format($home->average_rating, 1) }}</span>
                                                    <span style="font-size: 1rem; color: var(--color-gray-500);">/ 5.0</span>
                                                </div>
                                            </div>
                                            <div style="text-align: right;">
                                                <div style="display: flex; gap: 0.2rem; justify-content: flex-end; margin-bottom: 0.25rem;">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <svg style="width: 1.25rem; height: 1.25rem; fill: {{ $i <= round($home->average_rating) ? '#fadb14' : '#cbd5e1' }};" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                                    @endfor
                                                </div>
                                                <span style="font-size: 0.85rem; font-weight: 600; color: var(--color-ocean-dark);">{{ $home->reviews_count }} Ulasan Pengunjung</span>
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
                                                <input type="hidden" name="type" value="homestay">
                                                <input type="hidden" name="id" value="{{ $home->id }}">
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
                                                    <label for="name-hs-{{ $home->id }}" style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 0.35rem;">Nama Lengkap:</label>
                                                    <input type="text" id="name-hs-{{ $home->id }}" name="name" required placeholder="Masukkan nama Anda" style="width: 100%; padding: 0.65rem 0.9rem; border-radius: 0.5rem; border: 1px solid var(--color-gray-300); font-size: 0.875rem; font-family: inherit;">
                                                </div>

                                                <div>
                                                    <label for="comment-hs-{{ $home->id }}" style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 0.35rem;">Komentar Ulasan:</label>
                                                    <textarea id="comment-hs-{{ $home->id }}" name="comment" rows="3" required placeholder="Ceritakan pengalaman Anda menginap di homestay ini..." style="width: 100%; padding: 0.65rem 0.9rem; border-radius: 0.5rem; border: 1px solid var(--color-gray-300); font-size: 0.875rem; font-family: inherit; resize: vertical;"></textarea>
                                                </div>

                                                <button type="submit" class="btn btn-primary" style="align-self: flex-start; padding: 0.65rem 1.5rem; font-size: 0.875rem;">
                                                    <span>Kirim Ulasan</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 1rem; height: 1rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" /></svg>
                                                </button>
                                            </form>
                                        </div>

                                        <!-- Daftar Ulasan Sebelumnya -->
                                        <div>
                                            <h4 style="font-size: 1.05rem; font-weight: 700; color: var(--color-dark); margin-bottom: 1rem;">Ulasan Pengunjung ({{ $home->reviews_count }})</h4>
                                            
                                            @forelse($home->reviews as $rev)
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
                                                    <p style="font-size: 0.875rem; color: var(--color-gray-500); margin: 0;">Belum ada ulasan untuk homestay ini. Jadilah yang pertama memberikan ulasan!</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>  @endforeach
                </div>
            </section>

            <!-- 2. Alasan Menginap -->
            <section class="py-8">
                <div class="card card-padded-lg">
                    <div class="section-header">
                        <span class="hero-badge">Keuntungan Akomodasi</span>
                        <h2 class="section-title section-title-sm">Alasan Menginap di Kampung Saporkren</h2>
                        <p class="section-desc">Rasakan pengalaman otentik menginap yang menyatukan kenyamanan liburan dengan kehangatan masyarakat lokal.</p>
                    </div>

                    <div class="grid grid-cols-3" style="gap: 2rem;">
                        <div class="feature-card">
                            <div style="height: 3rem; width: 3rem; border-radius: 9999px; background-color: var(--color-ocean); color: white; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.5rem; height: 1.5rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
                            </div>
                            <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--color-dark); margin-bottom: 0.5rem;">Suasana Asri & Pesisir Alami</h3>
                            <p style="font-size: 0.875rem; color: var(--color-gray-600); line-height: 1.6;">Lokasi homestay berada di tepi pantai berpasir halus dan dekat dengan rimbunnya hutan Waigeo, memberikan kesegaran udara alami sepanjang hari.</p>
                        </div>

                        <div class="feature-card">
                            <div style="height: 3rem; width: 3rem; border-radius: 9999px; background-color: var(--color-tropical); color: white; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.5rem; height: 1.5rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" /></svg>
                            </div>
                            <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--color-dark); margin-bottom: 0.5rem;">Keramahan Warga & Kuliner Khas</h3>
                            <p style="font-size: 0.875rem; color: var(--color-gray-600); line-height: 1.6;">Interaksi hangat dengan keluarga pemilik homestay serta kesepakatan santap kuliner olahan masakan rumah khas Papua yang menggugah selera.</p>
                        </div>

                        <div class="feature-card">
                            <div style="height: 3rem; width: 3rem; border-radius: 9999px; background-color: #f97316; color: white; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.5rem; height: 1.5rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.5M4.5 21V10.5" /></svg>
                            </div>
                            <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--color-dark); margin-bottom: 0.5rem;">Akses Mudah ke Titik Wisata</h3>
                            <p style="font-size: 0.875rem; color: var(--color-gray-600); line-height: 1.6;">Posisi homestay berada dekat dermaga keberangkatan perahu jelajah pulau dan pintu masuk rute pengamatan burung Cenderawasih.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</x-app-layout>
