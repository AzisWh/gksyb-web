<section class="w-full py-16 fs-style-manrope" data-aos="fade-up">
    <div class="container mx-auto px-4">

        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-semibold text-[#3A0D0D] mb-3">
                Akses Umat
            </h2>
            <p class="text-[#3A0D0D] opacity-80 text-sm md:text-base">
                Kami menyediakan berbagai layanan untuk mendukung kehidupan iman Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 place-items-center">

        @foreach($data as $item)

        @php
            $icon = $item->icon_sakramen
                ? asset('storage/'.$item->icon_sakramen)
                : asset('/assets/doc.png');
        @endphp

        <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition">

            <div class="w-16 h-16 flex items-center justify-center mx-auto rounded-full mb-4"
                style="background-color: #FEF2F2;">
                <img src="{{ $icon }}" class="w-8 h-8" alt="{{ $item->judul_sakramen }}">
            </div>

            <h3 class="text-center text-[#3A0D0D] font-semibold mb-2">
                {{ $item->judul_sakramen }}
            </h3>

            <p class="text-center text-sm text-[#3A0D0D] opacity-70 mb-4">
                {{ $item->deskripsi_singkat }}
            </p>

            <div class="text-center">
                <a href="{{ route('landing.sakramen.detail', $item->id) }}"
                class="text-sm font-semibold"
                style="color:#3A0D0D">
                    Lihat Detail →
                </a>
            </div>

        </div>

        @endforeach

        </div>
    </div>
</section>
