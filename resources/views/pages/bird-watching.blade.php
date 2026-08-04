@php
$meta = config('saporkren.siteMeta');
$birdingHighlights = config('saporkren.birdingHighlights');
$birdingGearSuggestions = config('saporkren.birdingGearSuggestions');
$birdingWarnings = config('saporkren.birdingWarnings');
@endphp

<x-app-layout>
    <main id="main-content" style="background-image: url('{{ asset('assets/bird/birdwatchingbg.png') }}'); background-size: cover; background-position: center; background-attachment: fixed; position: relative; padding-bottom: 5rem;">
        <div style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(255,255,255,0.95) 0%, rgba(255,255,255,0.85) 10%, rgba(255,255,255,0.6) 30%, rgba(255,255,255,0) 60%); pointer-events: none;"></div>
        <div style="position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.6) 25%, rgba(255,255,255,1) 35%); pointer-events: none;"></div>
        
        <div class="container" style="position: relative; z-index: 10; padding-top: 8rem;">
            <!-- Header section -->
            <div style="max-width: 800px; margin-bottom: 4rem;">
                <span class="hero-badge" style="margin-bottom: 1rem;">Bird Watching & Ekowisata</span>
                <h1 class="hero-title" style="text-align: left; font-size: clamp(2.25rem, 5vw, 3.25rem);">
                    Pengamatan Burung Endemik Papua di Kampung Saporkren
                </h1>
                <p class="hero-text" style="text-align: left; font-size: 1.125rem; color: var(--color-gray-600);">
                    Saksikan pesona keindahan satwa liar eksotis di hutan hujan Waigeo. Dipandu oleh pemandu ekowisata lokal berpengalaman dengan prinsip pengamatan ramah alam dan berkelanjutan.
                </p>
                
                <div style="margin-top: 2rem; display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="/contact" class="btn btn-primary">
                        <span>Pesan Paket Bird Watching</span>
                        <svg aria-hidden="true" style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

            <!-- 1. 3 Buah Card Buat Burung Endemik Saporkren (Database Eloquent) -->
            <section class="py-8">
                <div class="card card-padded-lg" style="margin-bottom: 3rem;">
                    <div style="margin-bottom: 2rem;">
                        <span class="hero-badge">Satwa Endemik Ikonik</span>
                        <h2 class="section-title" style="font-size: 2rem; margin-top: 0.75rem;">3 Burung Endemik Unggulan Kampung Saporkren</h2>
                        <p style="color: var(--color-gray-500); margin-top: 0.25rem;">Tiga spesies burung surga paling dicari peneliti dan pecinta burung dari seluruh dunia.</p>
                    </div>

                    <div class="grid grid-cols-3" style="gap: 2rem;">
                        @foreach ($birdSpeciesList as $spec)
                            @php
                                $localName = is_object($spec) ? $spec->local_name : ($spec['localName'] ?? '');
                                $latinName = is_object($spec) ? $spec->latin_name : ($spec['latinName'] ?? '');
                                $habitat = is_object($spec) ? $spec->habitat : ($spec['habitat'] ?? '');
                                $bestTime = is_object($spec) ? $spec->best_time : ($spec['bestTime'] ?? '');
                                $status = is_object($spec) ? $spec->conservation_status : ($spec['conservationStatus'] ?? 'Endemik Papua');
                                $description = is_object($spec) ? $spec->description : ($spec['description'] ?? '');
                                $image = is_object($spec) ? $spec->image : ($spec['image'] ?? '');
                            @endphp
                            <article style="border: 1px solid var(--color-gray-200); border-radius: 1.5rem; overflow: hidden; display: flex; flex-direction: column; height: 100%; background: white; box-shadow: var(--shadow-sm);">
                                <div style="height: 220px; width: 100%; overflow: hidden; position: relative;">
                                    @if($image)
                                        @if(Str::startsWith($image, 'http'))
                                            <img src="{{ $image }}" alt="{{ $localName }}" style="width: 100%; height: 100%; object-fit: cover;" />
                                        @else
                                            <img src="{{ asset(Str::startsWith($image, 'storage/') ? $image : 'storage/'.$image) }}" alt="{{ $localName }}" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='{{ asset($image) }}'" />
                                        @endif
                                    @endif
                                </div>

                                <div style="padding: 1.5rem; display: flex; flex-direction: column; flex: 1;">
                                    <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.15em; color: var(--color-tropical);">
                                        {{ $status ?? 'Endemik Papua' }}
                                    </span>
                                    <h3 style="margin-top: 0.5rem; font-size: 1.35rem; font-weight: 700; color: var(--color-dark);">{{ $localName }}</h3>
                                    <p style="font-size: 0.875rem; font-style: italic; color: var(--color-ocean); margin-bottom: 0.75rem;">{{ $latinName }}</p>
                                    
                                    <p style="margin-top: 0.75rem; font-size: 0.875rem; line-height: 1.5; color: var(--color-gray-600); margin-bottom: 1.25rem;">{{ $description }}</p>
                                    
                                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; margin-top: auto; font-size: 0.8rem;">
                                        <div style="background: var(--color-gray-50); padding: 0.6rem 0.75rem; border-radius: 0.75rem; border: 1px solid var(--color-gray-200);">
                                            <span style="font-weight: 700; color: var(--color-dark); display: block;">Habitat:</span>
                                            <span style="color: var(--color-gray-600);">{{ $habitat }}</span>
                                        </div>
                                        <div style="background: var(--color-gray-50); padding: 0.6rem 0.75rem; border-radius: 0.75rem; border: 1px solid var(--color-gray-200);">
                                            <span style="font-weight: 700; color: var(--color-dark); display: block;">Waktu Pengamatan:</span>
                                            <span style="color: var(--color-gray-600);">{{ $bestTime }}</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- 2. Paket Bird Watching (dari Database Backend) -->
            <section class="py-8">
                <div class="card card-padded-lg" style="margin-bottom: 3rem;">
                    <div style="margin-bottom: 2rem;">
                        <span class="hero-badge">Pilihan Pengamatan</span>
                        <h2 class="section-title" style="font-size: 2rem; margin-top: 0.75rem;">Paket Bird Watching</h2>
                        <p style="color: var(--color-gray-500); margin-top: 0.25rem;">Pilihan pengalaman mengamati keindahan burung Cenderawasih bersama pemandu lokal.</p>
                    </div>

                    <div class="grid grid-cols-2" style="gap: 2rem;">
                        @foreach ($birdPackages as $pack)
                            <article class="card-padded" style="background: var(--color-gray-50); border: 1px solid var(--color-gray-200); border-radius: 1.5rem; display: flex; flex-direction: column;">
                                <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.15em; color: var(--color-tropical);">{{ $pack->duration }}</span>
                                <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--color-dark); margin-top: 0.5rem;">{{ $pack->name }}</h3>
                                <p style="font-size: 1.25rem; font-weight: 700; color: var(--color-ocean); margin-top: 0.5rem;">Rp {{ number_format($pack->price, 0, ',', '.') }} / Orang</p>
                                
                                <ul style="list-style: none; margin-top: 1.5rem; display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.9rem; color: var(--color-gray-600);">
                                    @if(is_array($pack->includes))
                                        @foreach ($pack->includes as $inc)
                                            <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
                                                <span style="margin-top: 0.4rem; height: 0.5rem; width: 0.5rem; border-radius: 9999px; background-color: var(--color-sand); shrink: 0;"></span>
                                                <span>{{ $inc }}</span>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </article>
                        @endforeach
                    </div>

                    <!-- Tombol Pesan Sekarang Terpusat di Bawah Section Paket Birding -->
                    <div style="text-align: center; margin-top: 2.5rem;">
                        <a href="/contact" class="btn btn-primary" style="font-size: 1rem; padding: 0.85rem 2.5rem; border-radius: 9999px; ">
                            Pesan Sekarang &rarr;
                        </a>
                    </div>
                </div>
            </section>

            <!-- 3. Alasan Birding di Kampung Saporkren -->
            <section class="py-8">
                <div class="card card-padded-lg" style="margin-bottom: 3rem;">
                    <div style="margin-bottom: 2rem;">
                        <span class="hero-badge">Keunggulan Lokasi</span>
                        <h2 class="section-title" style="font-size: 2rem; margin-top: 0.75rem;">Alasan Birding di Kampung Saporkren</h2>
                    </div>

                    <div class="grid grid-cols-3" style="gap: 1.5rem;">
                        @foreach ($birdingHighlights as $idx => $highlight)
                            <div style="background: white; border: 1px solid var(--color-gray-200); padding: 1.5rem; border-radius: 1.25rem; box-shadow: var(--shadow-sm);">
                                <div style="height: 2.5rem; width: 2.5rem; border-radius: 9999px; background: var(--color-ocean); color: white; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 1.1rem; margin-bottom: 1rem;">
                                    {{ $idx + 1 }}
                                </div>
                                <p style="font-size: 0.95rem; color: var(--color-dark); line-height: 1.6; font-weight: 500;">{{ $highlight }}</p>
                            </div>
                        @endforeach
                    </div>

                    <!-- Perlengkapan pendukung -->
                    <div style="margin-top: 2.5rem; padding-top: 2rem; border-top: 1px solid var(--color-gray-200);">
                        <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--color-dark); margin-bottom: 1rem;">Rekomendasi Perlengkapan Pengamatan</h3>
                        <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                            @foreach ($birdingGearSuggestions as $gear)
                                <span style="background: var(--color-gray-50); border: 1px solid var(--color-gray-200); padding: 0.5rem 1rem; border-radius: 9999px; font-size: 0.85rem; color: var(--color-dark); font-weight: 500;">
                                    ✓ {{ $gear }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <!-- 4. Etika & Peringatan Selama Birding -->
            <section class="py-8">
                <div class="card card-padded-lg" style=" border-left: 5px solid #eab308;">
                    <div style="margin-bottom: 1.5rem;">
                        <span class="hero-badge" style="background: #fef08a; color: #854d0e;">Etika & Keselamatan Hutan</span>
                        <h2 class="section-title" style="font-size: 2rem; margin-top: 0.75rem;">Etika dan Peringatan Selama Birding</h2>
                        <p style="color: var(--color-gray-600); margin-top: 0.25rem;">Demi menjaga kelestarian satwa langka dan kenyamanan bersama, wisatawan diwajibkan mematuhi panduan berikut:</p>
                    </div>

                    <div style="display: grid; gap: 1rem;">
                        @foreach ($birdingWarnings as $warning)
                            <div style="background: white; border: 1px solid var(--color-gray-200); padding: 1rem 1.25rem; border-radius: 0.85rem; display: flex; align-items: center; gap: 1rem;">
                                <div style="height: 2rem; width: 2rem; border-radius: 9999px; background: #fef08a; color: #854d0e; display: flex; align-items: center; justify-content: center; font-weight: 700; shrink: 0;">
                                    !
                                </div>
                                <p style="font-size: 0.95rem; color: var(--color-dark); font-weight: 500;">{{ $warning }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </main>
</x-app-layout>
