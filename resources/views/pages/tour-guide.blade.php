@php
$meta = config('saporkren.siteMeta');
@endphp

<x-app-layout>
    <main id="main-content" class="page-hero" style="background-image: url('{{ asset('assets/tour-guides/kampung-saporkren-bg.png') }}');">
        <div class="page-hero-overlay-h"></div>
        <div class="page-hero-overlay-v"></div>
        
        <div class="container page-hero-inner">
            <!-- Header section -->
            <div class="page-header">
                <span class="hero-badge">Tour Guide Lokal</span>
                <h1 class="hero-title subpage-title">
                    Pemandu Lokal Berpengalaman Kampung Saporkren
                </h1>
                <p class="hero-text">
                    Nikmati perjalanan aman, nyaman, dan bermakna bersama warga lokal asli Saporkren yang menguasai navigasi perairan, lokasi pengamatan satwa, dan sejarah kebudayaan Raja Ampat.
                </p>
                
                <div class="cta-buttons">
                    <a href="/contact" class="btn btn-primary">
                        <span>Pesan Tour Guide</span>
                        <svg aria-hidden="true" style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

            <!-- 1. Daftar Profil Tour Guide Lokal -->
            <section class="py-8">
                <div class="card-padded-lg" style="background: white; border-radius: var(--radius-2xl); overflow: hidden; box-shadow: var(--shadow-sm); border: 1px solid var(--color-gray-200); margin-bottom: 3rem;">
                    <div class="section-header">
                        <span class="hero-badge">Tim Pemandu</span>
                        <h2 class="section-title section-title-sm">Daftar Profil Tour Guide Lokal</h2>
                        <p class="section-desc">Setiap pemandu dilengkapi pengalaman lapangan dan pengetahuan navigasi yang teruji.</p>
                    </div>

                    <div class="grid grid-cols-3" style="gap: 2rem;">
                        @foreach ($tourGuides as $guide)
                            <article style="border: 1px solid var(--color-gray-200); border-radius: 1.5rem; padding: 1.25rem; display: flex; flex-direction: column; height: 100%; background: white; box-shadow: var(--shadow-sm);">
                                <h3 style="font-size: 1.35rem; font-weight: 700; color: var(--color-dark); margin-bottom: 0.75rem;">
                                    {{ $guide->name }}
                                </h3>

                                <p style="color: var(--color-gray-600); font-size: 0.9rem; line-height: 1.6; margin-bottom: 1.5rem;">{{ $guide->description }}</p>

                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem; margin-top: auto;">
                                    <div class="info-cell" style="word-break: break-word;">
                                        <p class="meta-label">Spesialisasi</p>
                                        <p style="font-size: 0.85rem; color: var(--color-dark); margin-top: 0.25rem; font-weight: 500;">{{ $guide->specialty }}</p>
                                    </div>
                                    <div class="info-cell" style="word-break: break-word;">
                                        <p class="meta-label">Bahasa</p>
                                        <p style="font-size: 0.85rem; color: var(--color-dark); margin-top: 0.25rem; font-weight: 500;">{{ $guide->languages }}</p>
                                    </div>
                                    <div class="info-cell" style="word-break: break-word;">
                                        <p class="meta-label">Pengalaman</p>
                                        <p style="font-size: 0.85rem; color: var(--color-dark); margin-top: 0.25rem; font-weight: 500;">{{ $guide->experience }}</p>
                                    </div>
                                    <div class="info-cell" style="word-break: break-word;">
                                        <p class="meta-label">Transportasi</p>
                                        <p style="font-size: 0.85rem; color: var(--color-dark); margin-top: 0.25rem; font-weight: 500;">{{ $guide->transport }}</p>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- 2. Alasan Pilih Tour Guide Lokal -->
            <section class="py-8">
                <div class="card-padded-lg" style="background: white; border-radius: var(--radius-2xl); overflow: hidden; box-shadow: var(--shadow-sm); border: 1px solid var(--color-gray-200); margin-bottom: 3rem;">
                    <div class="grid grid-cols-2" style="align-items: center; gap: 3.5rem;">
                        <div>
                            <span class="hero-badge">Mengapa Pemandu Lokal?</span>
                            <h2 class="section-title section-title-sm">
                                Keunggulan Memilih Tour Guide Asli Kampung Saporkren
                            </h2>
                            <p style="color: var(--color-gray-600); font-size: 0.95rem; margin-top: 0.75rem; line-height: 1.65;">
                                Memilih pemandu lokal memastikan petualangan Anda di Raja Ampat berjalan lancar, aman, dan otentik. Pemandu kami tidak hanya memandu jalan, tetapi juga membuka wawasan mengenai kebudayaan dan konservasi alam Papua.
                            </p>
                            
                            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap; margin-top: 1.5rem;">
                                <span style="border: 1px solid var(--color-ocean); color: var(--color-ocean); padding: 0.5rem 1.25rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 600;">Navigasi Laut Andal</span>
                                <span style="border: 1px solid var(--color-ocean); color: var(--color-ocean); padding: 0.5rem 1.25rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 600;">Paham Cuaca & Gelombang</span>
                            </div>
                        </div>

                        <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                            <div class="highlight-card">
                                <div style="display: flex; align-items: center; gap: 0.75rem; color: var(--color-ocean);">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.5rem; height: 1.5rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                                    <p style="font-size: 1rem; font-weight: 700; color: var(--color-dark);">Pengetahuan Titik Terbaik</p>
                                </div>
                                <p style="margin-top: 0.5rem; font-size: 0.875rem; color: var(--color-gray-600); line-height: 1.6;">
                                    Warga lokal mengetahui sudut-sudut terbaik yang sepi pengunjung untuk menikmati pemandangan laut, serta spot habitat satwa liar.
                                </p>
                            </div>

                            <div class="highlight-card">
                                <div style="display: flex; align-items: center; gap: 0.75rem; color: var(--color-tropical);">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.5rem; height: 1.5rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <p style="font-size: 1rem; font-weight: 700; color: var(--color-dark);">Keamanan & Utamakan Keselamatan</p>
                                </div>
                                <p style="margin-top: 0.5rem; font-size: 0.875rem; color: var(--color-gray-600); line-height: 1.6;">
                                    Seluruh perjalanan didampingi instruksi keselamatan perairan yang ketat dan koordinasi komunikasi antar-pemandu kampung.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 3. Paket Tour Guide -->
            <section class="py-8">
                <div class="card" style="padding: 2.5rem;">
                    
                    <!-- 3a. Paket Island Hopping (1 day - 6 day) -->
                    <div class="section-header">
                        <span class="hero-badge">Pilihan Paket</span>
                        <h2 class="section-title section-title-sm">Paket Island Hopping</h2>
                        <p class="section-desc">Pilihan fleksibel perjalanan eksklusif jelajah pulau-pulau eksotis di Raja Ampat.</p>
                    </div>

                    <div class="grid grid-cols-3" style="gap: 1.75rem;">
                        @foreach ($cardPackages as $pack)
                            @php
                                $islands = is_array($pack->includes) ? ($pack->includes['islands'] ?? []) : [];
                                $items = is_array($pack->includes) ? ($pack->includes['items'] ?? []) : [];
                            @endphp

                            <article style="background: var(--color-gray-50); border-radius: 1.75rem; padding: 2rem; display: flex; flex-direction: column; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                                <h3 style="font-size: 1.5rem; font-weight: 700; color: #1e293b; line-height: 1.25;">
                                    {{ $pack->name }}
                                </h3>
                                
                                @if(!empty($pack->duration))
                                    <div style="margin-top: 0.4rem;">
                                        <span style="font-size: 0.8rem; font-weight: 600; color: #ffffffff; background: #e0f2fe; padding: 0.25rem 0.65rem; border-radius: 0.5rem; display: inline-flex; align-items: center; gap: 0.3rem;">
                                            <span>Durasi: {{ $pack->duration }}</span>
                                        </span>
                                    </div>
                                @endif
                                
                                <div style="margin-top: 1rem; margin-bottom: 0.5rem; background: white; padding: 0.85rem 1rem; border-radius: 1rem; border: 1px solid #e2e8f0; display: flex; flex-direction: column; gap: 0.5rem;">
                                    <div style="display: flex; justify-content: space-between; align-items: center;">
                                        <span style="font-size: 1.15rem; font-weight: 700; color: var(--color-ocean);">
                                            Rp {{ number_format($pack->price, 0, ',', '.') }}
                                        </span>
                                        <span style="font-size: 0.85rem; font-weight: 600; color: #64748b; display: flex; align-items: center; gap: 0.35rem;">
                                            <span>Longboat</span>
                                        </span>
                                    </div>
                                    <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px dashed #e2e8f0; padding-top: 0.4rem;">
                                        <span style="font-size: 1.15rem; font-weight: 700; color: #0284c7;">
                                            @if($pack->price_speedboat)
                                                Rp {{ number_format($pack->price_speedboat, 0, ',', '.') }}
                                            @else
                                                Hubungi Kami
                                            @endif
                                        </span>
                                        <span style="font-size: 0.85rem; font-weight: 600; color: #64748b; display: flex; align-items: center; gap: 0.35rem;">
                                            <span>Speedboat</span>
                                        </span>
                                    </div>
                                </div>
                                
                                @if(!empty($islands))
                                    <div style="margin-top: 1.25rem;">
                                        <p style="font-size: 0.95rem; font-weight: 600; color: #334155; margin-bottom: 0.6rem;">Pulau :</p>
                                        <ul style="list-style: none; display: flex; flex-direction: column; gap: 0.5rem; font-size: 0.9rem; color: #475569;">
                                            @foreach ($islands as $isl)
                                                <li style="display: flex; align-items: flex-start; gap: 0.6rem;">
                                                    <span style="margin-top: 0.45rem; height: 0.5rem; width: 0.5rem; border-radius: 9999px; background-color: #ca8a04; flex-shrink: 0;"></span>
                                                    <span>{{ $isl }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if(!empty($items))
                                    <div style="margin-top: 1.25rem;">
                                        <p style="font-size: 0.95rem; font-weight: 600; color: #334155; margin-bottom: 0.6rem;">Includes :</p>
                                        <ul style="list-style: none; display: flex; flex-direction: column; gap: 0.5rem; font-size: 0.9rem; color: #475569;">
                                            @foreach ($items as $item)
                                                <li style="display: flex; align-items: flex-start; gap: 0.6rem;">
                                                    <span style="margin-top: 0.45rem; height: 0.5rem; width: 0.5rem; border-radius: 9999px; background-color: #ca8a04; flex-shrink: 0;"></span>
                                                    <span>{{ $item }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </article>
                        @endforeach
                    </div>

                    <!-- Tombol Pesan Sekarang Terpusat untuk Section Paket 5 Pulau -->
                    <div style="text-align: center; margin-top: 2.5rem; margin-bottom: 3.5rem;">
                        <a href="/contact" class="btn btn-primary" style="font-size: 1rem; padding: 0.85rem 2.5rem; border-radius: 9999px;">
                            Pesan Sekarang &rarr;
                        </a>
                    </div>


                    <!-- 3c. Paket Snorkeling Trip ke Pulau -->
                    <div style="margin-bottom: 1.5rem; padding-top: 1.5rem; border-top: 1px solid var(--color-gray-200);">
                        <h2 class="section-title section-title-sm">Paket Snorkeling Trip ke Pulau</h2>
                        <p class="section-desc">Rincian daftar harga trip snorkeling resmi (Snorkelling Trip Price List).</p>
                    </div>

                    <div style="overflow-x: auto; border: 1px solid var(--color-gray-200); border-radius: 1rem;">
                        <table style="width: 100%; border-collapse: collapse; background: white;">
                            <thead style="background: #facc15;">
                                <tr>
                                    <th style="padding: 1rem; text-align: center; font-size: 0.9rem; font-weight: 700; color: #1e293b; border-right: 1px solid #e2e8f0; width: 60px;">No</th>
                                    <th style="padding: 1rem; text-align: left; font-size: 0.9rem; font-weight: 700; color: #1e293b; border-right: 1px solid #e2e8f0;">Destinasi</th>
                                    <th style="padding: 1rem; text-align: left; font-size: 0.9rem; font-weight: 700; color: #1e293b; border-right: 1px solid #e2e8f0;">Harga</th>
                                    <th style="padding: 1rem; text-align: center; font-size: 0.9rem; font-weight: 700; color: #1e293b; background-color: #facc15;">Informasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($snorkelingPackages as $idx => $pack)
                                    @php
                                        $infoText = '1 - 4 orang';
                                        if (is_array($pack->includes) && isset($pack->includes['info'])) {
                                            $infoText = $pack->includes['info'];
                                        }
                                    @endphp
                                    <tr style="border-top: 1px solid var(--color-gray-200);">
                                        <td style="padding: 0.85rem 1rem; text-align: center; font-size: 0.9rem; font-weight: 700; color: var(--color-dark); border-right: 1px solid #f1f5f9;">{{ $idx + 1 }}</td>
                                        <td style="padding: 0.85rem 1rem; font-size: 0.95rem; font-weight: 700; color: #1e293b; border-right: 1px solid #f1f5f9;">{{ $pack->name }}</td>
                                        <td style="padding: 0.85rem 1rem; font-size: 0.95rem; font-weight: 700; color: var(--color-ocean); border-right: 1px solid #f1f5f9;">Rp {{ number_format($pack->price, 0, ',', '.') }}</td>
                                        @if($idx === 0)
                                            <td rowspan="{{ count($snorkelingPackages) }}" style="padding: 1rem; text-align: center; font-size: 1rem; font-weight: 700; color: #1e293b; vertical-align: middle;">
                                                1 - 4 orang
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </section>
        </div>
    </main>
</x-app-layout>
