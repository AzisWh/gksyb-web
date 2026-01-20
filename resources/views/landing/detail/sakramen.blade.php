@extends('layout.main')

@section('hero-title')
    {{ $sakramen->judul_sakramen ?? 'Detail Sakramen' }}
@endsection

@section('content')

@php

    $rawSlides = $sakramen->gambar_slide ?? [];

    if (is_string($rawSlides)) {
        $rawSlides = json_decode($rawSlides, true);
    }

    $slides = [];

    if (is_array($rawSlides)) {
        foreach ($rawSlides as $item) {
            if (is_array($item)) {
                $slides[] = $item['path']
                    ?? $item['name']
                    ?? $item['file']
                    ?? null;
            } else {
                $slides[] = $item;
            }
        }
    }

    $slides = array_values(array_filter($slides));
@endphp


<section class="w-full py-16">
    <div class="container mx-auto px-4 max-w-4xl">

        <a href="{{ route('landing.sekraman') }}"
           class="text-sm mb-4 inline-block"
           style="color:#3A0D0D">
            ← Kembali
        </a>

        <div class="prose max-w-none mt-6 text-center">
            {!! $sakramen->deskripsi_singkat !!}
        </div>

        <div class="relative">

            @if(count($slides))
                <img
                    id="slideImg"
                    src="{{ asset('storage/'.$slides[0]) }}"
                    class="w-full rounded-xl object-cover"
                    style="height:450px"
                >
            @else
                <div class="w-full h-[450px] bg-gray-200 rounded-xl
                            flex items-center justify-center text-gray-500">
                    Tidak ada gambar
                </div>
            @endif

            @if(count($slides) > 1)
                <button onclick="prevSlide()"
                        class="absolute left-3 top-1/2 -translate-y-1/2
                               px-3 py-2 rounded"
                        style="background:#3A0D0D;color:white">
                    ‹
                </button>

                <button onclick="nextSlide()"
                        class="absolute right-3 top-1/2 -translate-y-1/2
                               px-3 py-2 rounded"
                        style="background:#3A0D0D;color:white">
                    ›
                </button>
            @endif
        </div>

        @if(count($slides) > 1)
            <div class="flex gap-2 mt-3 overflow-auto">
                @foreach($slides as $i => $img)
                    <img
                        onclick="setSlide({{ $i }})"
                        src="{{ asset('storage/'.$img) }}"
                        class="w-24 h-20 object-cover rounded cursor-pointer
                               border border-[#3A0D0D]"
                    >
                @endforeach
            </div>
        @endif

        <div class="prose max-w-none mt-6 text-center">
            {!! $sakramen->deskripsi_lengkap !!}
        </div>

    </div>
</section>


<script>
    const slides = @json($slides);
    let index = 0;

    function render() {
        if (!slides.length) return;
        document.getElementById('slideImg').src =
            '/storage/' + slides[index];
    }

    function nextSlide() {
        index = (index + 1) % slides.length;
        render();
    }

    function prevSlide() {
        index = (index - 1 + slides.length) % slides.length;
        render();
    }

    function setSlide(i) {
        index = i;
        render();
    }
</script>

@endsection
