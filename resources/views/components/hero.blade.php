@php
$location = config('saporkren.siteMeta.location');
@endphp

<section class="hero" style="padding: 0; min-height: 100vh; display: flex; align-items: center; justify-content: center; position: relative;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; overflow: hidden;">
        <video style="width: 100%; height: 100%; object-fit: cover; background: black;" autoplay loop muted playsinline preload="auto" poster="{{ asset('assets/bird/Wilson.jpeg') }}" disablepictureinpicture controlslist="nodownload nofullscreen noremoteplayback" src="{{ asset('assets/video kampung.mp4') }}"></video>
        <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(6,20,32,0.28) 0%, rgba(6,20,32,0.38) 38%, rgba(6,20,32,0.72) 100%); z-index: 1;"></div>
    </div>

    <div class="container" style="position: relative; z-index: 10;">
        <div class="hero-content" style="padding-top: 5rem; text-align: center;">
            <p style="font-size: 0.875rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.25em; color: rgba(255,255,255,0.9); margin-bottom: 1rem;">
                Official Tourism Portal
            </p>

            <h1 style="color: white; margin-bottom: 1.5rem; line-height: 1.15; letter-spacing: -0.03em;">
                <span class="hero-welcome">Selamat Datang di</span>
                <span class="hero-brand">
                    Kampung Saporkren
                </span>
            </h1>

            <p class="hero-desc" style="font-size: clamp(0.9rem, 2.5vw, 1.15rem); color: rgba(255,255,255,0.9); margin-bottom: 2.25rem; max-width: 620px; margin-left: auto; margin-right: auto; line-height: 1.65;">
                Nikmati keindahan alam, keanekaragaman hayati, budaya autentik,<br class="hidden sm:inline"> dan pengalaman tak terlupakan di Raja Ampat.
            </p>

            <div class="hero-buttons" style="display: flex; justify-content: center; gap: 1rem;">
                <a href="/contact" class="btn btn-lg" style="background-color: white; color: var(--color-dark); font-weight: 700;">
                    <span>Hubungi Kami</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.25rem; height: 1.25rem;">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

            <div style="margin-top: 3rem; display: inline-flex; align-items: center; gap: 0.6rem; border: 1px solid rgba(255,255,255,0.25); background: rgba(255,255,255,0.12); padding: 0.5rem 1.25rem; border-radius: 9999px; color: white; font-size: 0.875rem; font-weight: 500; backdrop-filter: blur(8px);">
                <span style="height: 0.5rem; width: 0.5rem; border-radius: 9999px; background-color: var(--color-sand);" aria-hidden="true"></span>
                {{ $location }}
            </div>
        </div>
    </div>
</section>
