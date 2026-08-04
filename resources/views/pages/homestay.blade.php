@php
$meta = config('saporkren.siteMeta');
@endphp

<x-app-layout>
    <main id="main-content" style="background-image: url('{{ asset('assets/homestay/homestaybg.png') }}'); background-size: cover; background-position: center; background-attachment: fixed; position: relative; padding-bottom: 5rem;">
        <div style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(255,255,255,0.95) 0%, rgba(255,255,255,0.85) 10%, rgba(255,255,255,0.6) 30%, rgba(255,255,255,0) 60%); pointer-events: none;"></div>
        <div style="position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.6) 25%, rgba(255,255,255,1) 35%); pointer-events: none;"></div>
        
        <div class="container" style="position: relative; z-index: 10; padding-top: 8rem;">
            <!-- Header section -->
            <div style="max-width: 800px; margin-bottom: 4rem;">
                <span class="hero-badge" style="margin-bottom: 1rem;">Homestay</span>
                <h1 class="hero-title" style="text-align: left; font-size: clamp(2.25rem, 5vw, 3.25rem);">
                    Daftar Homestay di Kampung Saporkren
                </h1>
                <p class="hero-text" style="text-align: left; font-size: 1.125rem; color: var(--color-gray-600);">
                    Nikmati suasana tenang penginapan tepi pantai yang dikelola langsung oleh warga lokal. Tempat istirahat yang nyaman dengan pemandangan laut yang asri dan keramahan alami khas Raja Ampat.
                </p>
                
                <div style="margin-top: 2rem; display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="/contact" class="btn btn-primary">
                        <span>Reservasi Homestay</span>
                        <svg aria-hidden="true" style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

            <!-- 1. Daftar Homestay -->
            <section class="py-8">
                <div class="grid grid-cols-4 card-padded-lg" style="background: white; border-radius: var(--radius-2xl); overflow: hidden; box-shadow: var(--shadow-sm); border: 1px solid var(--color-gray-200); margin-bottom: 3rem;">
                    @foreach ($homestays as $home)
                        <article class="card" style="display: flex; flex-direction: column; overflow: hidden; background: white; border: 1px solid var(--color-gray-200);">
                            <div class="card-image-wrap" style="height: 220px; overflow: hidden; position: relative;">
                                @if(Str::startsWith($home->main_photo, 'http'))
                                    <img src="{{ $home->main_photo }}" alt="{{ $home->name }}" class="card-image" style="width: 100%; height: 100%; object-fit: cover;" />
                                @else
                                    <img src="{{ asset(Str::startsWith($home->main_photo, 'storage/') ? $home->main_photo : 'storage/'.$home->main_photo) }}" alt="{{ $home->name }}" class="card-image" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='{{ asset($home->main_photo) }}'" />
                                @endif
                            </div>

                            <div class="card-content" style="padding: 1.5rem; flex: 1; display: flex; flex-direction: column;">
                                <h3 class="card-title" style="font-size: 1.35rem; font-weight: 700; color: var(--color-dark); margin-bottom: 0.5rem;">{{ $home->name }}</h3>
                                <p class="card-text" style="font-size: 0.875rem; color: var(--color-gray-600); margin-bottom: 1.25rem; line-height: 1.5;">{{ !empty($home->short_description) ? $home->short_description : '-' }}</p>

                                <div style="display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 1.5rem; font-size: 0.85rem;">
                                    <div style="background: var(--color-gray-50); padding: 0.6rem 0.8rem; border-radius: 0.5rem; border: 1px solid var(--color-gray-200); display: flex; flex-direction: column; gap: 0.25rem;">
                                        <span style="font-weight: 600; color: var(--color-dark);">Pemilik</span>
                                        <span style="color: var(--color-gray-600);">{{ $home->owner ?? '-' }}</span>
                                    </div>
                                    <div style="background: var(--color-gray-50); padding: 0.6rem 0.8rem; border-radius: 0.5rem; border: 1px solid var(--color-gray-200); display: flex; flex-direction: column; gap: 0.25rem;">
                                        <span style="font-weight: 600; color: var(--color-dark);">Harga</span>
                                        <span style="font-weight: 700; color: var(--color-ocean);">
                                            @if(is_numeric($home->price) && $home->price > 0)
                                                Rp {{ number_format((float)$home->price, 0, ',', '.') }} / Malam
                                            @else
                                                {{ $home->price ?? 'Hubungi Pemilik' }}
                                            @endif
                                        </span>
                                    </div>
                                    <div style="background: var(--color-gray-50); padding: 0.6rem 0.8rem; border-radius: 0.5rem; border: 1px solid var(--color-gray-200); display: flex; flex-direction: column; gap: 0.25rem;">
                                        <span style="font-weight: 600; color: var(--color-dark);">Kapasitas</span>
                                        <span style="color: var(--color-gray-600);">{{ !empty($home->capacity) ? $home->capacity : '-' }}</span>
                                    </div>
                                    <div style="background: var(--color-gray-50); padding: 0.6rem 0.8rem; border-radius: 0.5rem; border: 1px solid var(--color-gray-200); display: flex; flex-direction: column; gap: 0.25rem;">
                                        <span style="font-weight: 600; color: var(--color-dark);">Fasilitas</span>
                                        <span style="color: var(--color-gray-600); line-height: 1.4;">{{ !empty($home->facilities) ? (is_array($home->facilities) ? implode(', ', $home->facilities) : $home->facilities) : '-' }}</span>
                                    </div>
                                </div>

                                <div style="margin-top: auto;">
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
                        </article>
                    @endforeach
                </div>
            </section>

            <!-- 2. Alasan Menginap -->
            <section class="py-8">
                <div class="card card-padded-lg">
                    <div style="margin-bottom: 2rem;">
                        <span class="hero-badge">Keuntungan Akomodasi</span>
                        <h2 class="section-title" style="font-size: 2rem; margin-top: 0.75rem;">Alasan Menginap di Kampung Saporkren</h2>
                        <p style="color: var(--color-gray-500); margin-top: 0.25rem;">Rasakan pengalaman otentik menginap yang menyatukan kenyamanan liburan dengan kehangatan masyarakat lokal.</p>
                    </div>

                    <div class="grid grid-cols-3" style="gap: 2rem;">
                        <div style="background: var(--color-gray-50); padding: 1.75rem; border-radius: 1.25rem; border: 1px solid var(--color-gray-200);">
                            <div style="height: 3rem; width: 3rem; border-radius: 9999px; background-color: var(--color-ocean); color: white; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.5rem; height: 1.5rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
                            </div>
                            <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--color-dark); margin-bottom: 0.5rem;">Suasana Asri & Pesisir Alami</h3>
                            <p style="font-size: 0.875rem; color: var(--color-gray-600); line-height: 1.6;">Lokasi homestay berada di tepi pantai berpasir halus dan dekat dengan rimbunnya hutan Waigeo, memberikan kesegaran udara alami sepanjang hari.</p>
                        </div>

                        <div style="background: var(--color-gray-50); padding: 1.75rem; border-radius: 1.25rem; border: 1px solid var(--color-gray-200);">
                            <div style="height: 3rem; width: 3rem; border-radius: 9999px; background-color: var(--color-tropical); color: white; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.5rem; height: 1.5rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" /></svg>
                            </div>
                            <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--color-dark); margin-bottom: 0.5rem;">Keramahan Warga & Kuliner Khas</h3>
                            <p style="font-size: 0.875rem; color: var(--color-gray-600); line-height: 1.6;">Interaksi hangat dengan keluarga pemilik homestay serta kesepakatan santap kuliner olahan masakan rumah khas Papua yang menggugah selera.</p>
                        </div>

                        <div style="background: var(--color-gray-50); padding: 1.75rem; border-radius: 1.25rem; border: 1px solid var(--color-gray-200);">
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
