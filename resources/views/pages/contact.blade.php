@php
$meta = config('saporkren.siteMeta');
$contactChannels = config('saporkren.contactChannels');
@endphp

<x-app-layout>
    <main id="main-content" style="padding: 8rem 0 5rem; background-color: var(--color-gray-50); min-height: 100vh;">
        <div class="container">
            <div class="grid grid-cols-2" style="align-items: flex-start; gap: 4rem;">
                <div style="max-width: 600px;">
                    <span class="hero-badge" style="margin-bottom: 1.5rem;">Kontak & Informasi</span>
                    <h1 class="hero-title subpage-title">
                        Hubungi Pengelola Ekowisata Kampung Saporkren
                    </h1>
                    <p class="hero-text" style="line-height: 1.7;">
                        Punya pertanyaan mengenai reservasi homestay, reservasi pemandu jelajah pulau, atau kunjungan pengamatan burung? Tim pengelola Kampung Saporkren siap menyambut dan membantu perjalanan liburan Anda.
                    </p>
                    
                    <div class="cta-buttons" style="margin-top: 2.5rem;">
                        <a href="{{ $meta['whatsapp'] }}" target="_blank" rel="noreferrer" class="btn btn-primary">
                            <span>Hubungi via WhatsApp</span>
                            <svg aria-hidden="true" style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                        <a href="/" class="btn btn-secondary">
                            <span>Kembali ke Beranda</span>
                        </a>
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                    @foreach ($contactChannels as $channel)
                        <article class="card card-padded" style=" border-left: 4px solid var(--color-ocean);">
                            <p class="category-label" style="letter-spacing: 0.25em;">
                                {{ $channel['label'] }}
                            </p>
                            <h2 style="margin-top: 0.5rem; font-size: 1.5rem; font-weight: 700; color: var(--color-dark);">{{ $channel['value'] }}</h2>
                            
                            <ul style="margin-top: 1rem; display: flex; flex-direction: column; gap: 0.5rem; font-size: 0.9rem; color: var(--color-gray-600); list-style: none;">
                                @if (isset($channel['href1']))
                                    <li class="list-bullet-item">
                                        <span class="bullet-dot" aria-hidden="true"></span>
                                        <span>{{ $channel['href1'] }}</span>
                                    </li>
                                @endif
                                @if (isset($channel['href']))
                                    <li class="list-bullet-item">
                                        <span class="bullet-dot" aria-hidden="true"></span>
                                        <a href="{{ $channel['href'] }}" target="_blank" rel="noreferrer" style="color: var(--color-ocean); font-weight: 600; text-decoration: underline;">
                                            Buka {{ $channel['label'] }} &rarr;
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
