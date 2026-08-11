<x-app-layout>
    <x-hero />

    <!-- Tentang Kampung -->
    <section class="section-padding">
        <div class="container">
            <div class="grid grid-cols-2" style="align-items: center; gap: 3.5rem;">
                <div>
                    <span class="hero-badge">Tentang Kampung Saporkren</span>
                    <h2 class="section-title">
                        Harmoni Alam Pesisir & Keanekaragaman Hayati Raja Ampat
                    </h2>
                    <div style="margin-top: 1.25rem; color: var(--color-gray-600); line-height: 1.65; font-size: 0.95rem;">
                        <p style="text-align: justify; margin-bottom: 1rem;">
                            Selamat datang di <strong>Kampung Saporkren</strong>, sebuah kampung wisata pesisir di Distrik Waigeo Selatan, Kabupaten Raja Ampat. Terkenal akan keasrian hutan tropis dan kekayaan lautnya, Saporkren menjadi salah satu destinasi ekowisata terbaik untuk menyaksikan keajaiban alam Papua.
                        </p>
                        <p style="text-align: justify;">
                            Dari riuh tarian burung Cenderawasih di tajuk hutan hingga kejernihan terumbu karang yang kaya akan kehidupan bahari, masyarakat lokal Kampung Saporkren siap menyambut kunjungan Anda dengan kearifan adat dan keramahan yang hangat.
                        </p>
                    </div>
                </div>

                <div class="card" style="padding: 0.75rem;">
                    <img src="{{ asset('assets/bird/Wilson.jpeg') }}" alt="Keindahan Alam Kampung Saporkren" style="width: 100%; height: 380px; border-radius: 1.25rem; object-fit: cover;" loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </section>

    <!-- 3 Pintu Utama Jelajahi Wisata -->
    <section class="section-padding" style="background-color: var(--color-gray-100);">
        <div class="container">
            <div style="margin-bottom: 3rem; text-align: center; max-width: 700px; margin-left: auto; margin-right: auto;">
                <span class="hero-badge">Jelajahi Wisata</span>
                <h2 class="section-title">Tiga Pintu Utama Menjelajahi Kampung Saporkren</h2>
                <p class="section-subtitle">Temukan pengalaman liburan yang berkesan melalui tiga layanan unggulan Kampung Saporkren.</p>
            </div>

            <div class="grid grid-cols-3" style="gap: 2rem;">
                <!-- 1. Tour Guide -->
                <article class="card" style="display: flex; flex-direction: column;">
                    <div class="card-content" style="flex: 1; display: flex; flex-direction: column; padding: 2rem;">
                        <div style="height: 0.4rem; width: 3.5rem; border-radius: 9999px; background-color: var(--color-ocean); margin-bottom: 1.25rem;" aria-hidden="true"></div>
                        <h3 style="font-size: 1.35rem; font-weight: 700; margin-bottom: 0.75rem; color: var(--color-dark);">Tour Guide Lokal</h3>
                        <p class="card-text" style="color: var(--color-gray-600); margin-bottom: 1.5rem; font-size: 0.9rem; line-height: 1.6;">Jelajahi spot-spot eksotis Raja Ampat bersama pemandu lokal berpengalaman yang mengenal rute alam dan cerita budaya setempat.</p>
                        <ul style="list-style: none; display: flex; flex-direction: column; gap: 0.6rem; font-size: 0.875rem; color: var(--color-gray-600); margin-bottom: 2rem;">
                            <li class="list-bullet-item"><span class="bullet-dot"></span><span>Pemandu Asli Kampung Saporkren</span></li>
                            <li class="list-bullet-item"><span class="bullet-dot"></span><span>Paket Tour 5 Pulau & Snorkeling</span></li>
                            <li class="list-bullet-item"><span class="bullet-dot"></span><span>Bahasa Indonesia & English</span></li>
                        </ul>
                        <div class="mt-auto">
                            <a href="/tour-guide" class="btn btn-primary" style="width: 100%; justify-content: center;">Lihat Tour Guide &rarr;</a>
                        </div>
                    </div>
                </article>

                <!-- 2. Bird Watching -->
                <article class="card" style="display: flex; flex-direction: column;">
                    <div class="card-content" style="flex: 1; display: flex; flex-direction: column; padding: 2rem;">
                        <div style="height: 0.4rem; width: 3.5rem; border-radius: 9999px; background-color: var(--color-tropical); margin-bottom: 1.25rem;" aria-hidden="true"></div>
                        <h3 style="font-size: 1.35rem; font-weight: 700; margin-bottom: 0.75rem; color: var(--color-dark);">Bird Watching</h3>
                        <p class="card-text" style="color: var(--color-gray-600); margin-bottom: 1.5rem; font-size: 0.9rem; line-height: 1.6;">Saksikan langsung pesona burung Cenderawasih endemik Papua di dalam hutan konservasi Saporkren yang terjaga kelestariannya.</p>
                        <ul style="list-style: none; display: flex; flex-direction: column; gap: 0.6rem; font-size: 0.875rem; color: var(--color-gray-600); margin-bottom: 2rem;">
                            <li class="list-bullet-item"><span class="bullet-dot"></span><span>Spot Cenderawasih Merah & Botak</span></li>
                            <li class="list-bullet-item"><span class="bullet-dot"></span><span>Paket Pengamatan Pagi & Full Day</span></li>
                            <li class="list-bullet-item"><span class="bullet-dot"></span><span>Etika Ekowisata Ramah Satwa</span></li>
                        </ul>
                        <div class="mt-auto">
                            <a href="/bird-watching" class="btn btn-primary" style="width: 100%; justify-content: center; background-color: var(--color-tropical);">Lihat Bird Watching &rarr;</a>
                        </div>
                    </div>
                </article>

                <!-- 3. UMKM Lokal -->
                <article class="card" style="display: flex; flex-direction: column;">
                    <div class="card-content" style="flex: 1; display: flex; flex-direction: column; padding: 2rem;">
                        <div style="height: 0.4rem; width: 3.5rem; border-radius: 9999px; background-color: #f97316; margin-bottom: 1.25rem;" aria-hidden="true"></div>
                        <h3 style="font-size: 1.35rem; font-weight: 700; margin-bottom: 0.75rem; color: var(--color-dark);">UMKM Lokal</h3>
                        <p class="card-text" style="color: var(--color-gray-600); margin-bottom: 1.5rem; font-size: 0.9rem; line-height: 1.6;">Dukung ekonomi warga dengan membawa pulang hasil kerajinan rajut khas Papua serta produk kuliner olahan olahan laut berkualitas.</p>
                        <ul style="list-style: none; display: flex; flex-direction: column; gap: 0.6rem; font-size: 0.875rem; color: var(--color-gray-600); margin-bottom: 2rem;">
                            <li class="list-bullet-item"><span class="bullet-dot"></span><span>Noken Rajut Alami Papua</span></li>
                            <li class="list-bullet-item"><span class="bullet-dot"></span><span>Kuliner Olahan Hasil Laut Segar</span></li>
                            <li class="list-bullet-item"><span class="bullet-dot"></span><span>Langsung dari Perajin & Warga</span></li>
                        </ul>
                        <div class="mt-auto">
                            <a href="/umkm" class="btn btn-primary" style="width: 100%; justify-content: center; background-color: #f97316;">Lihat Produk UMKM &rarr;</a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Lokasi -->
    <section class="section-padding">
        <div class="container">
            <div class="grid grid-cols-2" style="align-items: center; gap: 3.5rem;">
                <div>
                    <div style="margin-bottom: 1.5rem;">
                        <span class="hero-badge">Lokasi Kampung</span>
                        <h2 class="section-title">Lokasi Strategis & Akses Mudah</h2>
                        <p style="color: var(--color-gray-600); margin-top: 0.75rem; line-height: 1.65; font-size: 0.95rem;">
                            Kampung Saporkren berlokasi di Distrik Waigeo Selatan, Raja Ampat, Papua Barat Daya. Terletak dekat dengan pusat koordinasi penerbangan dan pelabuhan utama di Waisai, menjadikannya gerbang ideal perjalanan eksplorasi Anda.
                        </p>
                    </div>

                    <div class="card" style="padding: 1.5rem; margin-bottom: 1.5rem; border-left: 4px solid var(--color-ocean);">
                        <p class="category-label">Alamat Resmi</p>
                        <p style="margin-top: 0.35rem; font-size: 1rem; font-weight: 600; color: var(--color-dark);">Kampung Saporkren, Distrik Waigeo Selatan</p>
                        <p style="font-size: 0.875rem; color: var(--color-gray-600);">Kabupaten Raja Ampat, Papua Barat Daya</p>
                    </div>

                    <div>
                        <a href="/contact" class="btn btn-primary">
                            Hubungi Kami &rarr;
                        </a>
                    </div>
                </div>

                <div class="card" style="padding: 0.75rem;">
                    <iframe title="Peta lokasi Kampung Saporkren" src="https://www.google.com/maps?q=Kampung+Saporkren+Raja+Ampat&output=embed" style="height: 400px; width: 100%; border-radius: 1.2rem; border: 0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
