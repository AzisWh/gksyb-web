<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>GK - Santo Yusup Bintaran</title>

    
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/carousels.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-clr-dominant">

@include('sweetalert::alert')
@include('components.navbar')

<section class="hero-section relative min-h-[65vh] overflow-hidden" data-aos="fade-up">
    <div class="hero-overlay absolute inset-0 bg-[rgba(var(--clr-secondary-rgb),0.85)] mix-blend-multiply"></div>

    <div class="hero-inner relative z-10 flex items-center justify-center min-h-[inherit] w-full">
        <div class="hero-content text-center text-light max-w-250 text-white md:px-0 px-4">

            @hasSection('hero-subtitle')
                <p class="hero-subtitle mb-2 fs-style-manrope uppercase tracking-widest opacity-85 md:text-sm text-4xl">
                    @yield('hero-subtitle')
                </p>
            @endif

            <h1 class="hero-title fs-style-literata text-4xl md:text-5xl  font-semibold leading-tight max-w-225 mx-auto">
                @yield('hero-title')
            </h1>

            @hasSection('hero-desc')
                <p class="hero-desc mt-3 fs-style-manrope text-base md:text-lg leading-relaxed opacity-90">
                    @yield('hero-desc')
                </p>
            @endif

            @hasSection('hero-action')
                <div class="mt-4">
                    @yield('hero-action')
                </div>
            @endif

        </div>
    </div>
</section>

<main class="">
    @yield('content')
</main>

@include('components.footer')

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
