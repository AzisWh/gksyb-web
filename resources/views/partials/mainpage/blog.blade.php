<section class="w-full py-16 fs-style-manrope" data-aos="fade-up">
    <div class="container mx-auto px-4">

        <!-- Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-semibold text-[#3A0D0D] mb-3">
                Tulisan Bintaran Terbaru
            </h2>
            <p class="text-[#3A0D0D] opacity-80 text-sm md:text-base">
                Kumpulan tulisan yang menghadirkan informasi, inspirasi, dan refleksi iman umat Gereja Santo Yusup Bintaran.
            </p>
        </div>

        @php
            $besar = $bintaran[0] ?? null;
            $kecil1 = $bintaran[1] ?? null;
            $kecil2 = $bintaran[2] ?? null;

            function warnaKategori($nama) {
                $n = strtolower($nama ?? '');
                if(str_contains($n, 'warta')) return 'bg-purple-100 text-purple-800';
                if(str_contains($n, 'katekese')) return 'bg-green-100 text-green-700';
                if(str_contains($n, 'berita')) return 'bg-yellow-100 text-yellow-700';
                return 'bg-gray-100 text-gray-700';
            }
        @endphp

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- ========== CARD BESAR ========== --}}
            <div class="lg:col-span-2">
            @if($besar)
                <div>
                    <img
                        src="{{ $besar->image 
                                ? asset('storage/BintaranImage/'.$besar->image) 
                                : asset('/assets/ekm.png') }}"
                        class="w-full h-64 md:h-80 object-cover rounded-xl mb-4"
                        onerror="this.src='{{ asset('/assets/ekm.png') }}'"
                        alt="Artikel">

                    <div class="flex items-center gap-3 mb-2">
                        <span class="px-3 py-1 text-xs rounded-full {{ warnaKategori($besar->kategoriBintaran->nama_kategori ?? '') }}">
                            {{ $besar->kategoriBintaran->nama_kategori ?? 'Umum' }}
                        </span>

                        <span class="text-sm text-gray-500">
                            {{ $besar->created_at->format('d M Y') }}
                        </span>
                    </div>

                    <h3 class="text-xl md:text-2xl font-semibold text-[#3A0D0D] mb-2">
                        {{ $besar->judul_tulisan }}
                    </h3>

                    <p class="text-sm text-[#3A0D0D] opacity-70 mb-4">
                        {{ $besar->ringkasan }}
                    </p>

                    <a href="#"
                    class="inline-flex items-center gap-2 text-[#3A0D0D] font-semibold hover:underline">
                        Baca Selengkapnya
                        <span>↗</span>
                    </a>
                </div>
            @else
                <p class="text-center text-gray-500">Belum ada tulisan</p>
            @endif
            </div>

            {{-- ========== CARD KECIL ========== --}}
            <div class="flex flex-col gap-6">

                {{-- KECIL 1 --}}
                @if($kecil1)
                <div>
                    <img src="{{ $kecil1->image 
                                ? asset('storage/BintaranImage/'.$kecil1->image) 
                                : asset('/assets/ekm.png') }}"
                        onerror="this.src='{{ asset('/assets/ekm.png') }}'"
                        class="w-full h-40 object-cover rounded-xl mb-4">

                    <div class="flex items-center gap-3 mb-2">
                        <span class="px-3 py-1 text-xs rounded-full {{ warnaKategori($kecil1->kategoriBintaran->nama_kategori ?? '') }}">
                            {{ $kecil1->kategoriBintaran->nama_kategori ?? 'Umum' }}
                        </span>

                        <span class="text-sm text-gray-500">
                            {{ $kecil1->created_at->format('d M Y') }}
                        </span>
                    </div>

                    <h4 class="text-lg font-semibold text-[#3A0D0D] mb-2">
                        {{ $kecil1->judul_tulisan }}
                    </h4>

                    <p class="text-sm text-[#3A0D0D] opacity-70 mb-4 line-clamp-3">
                        {{ $kecil1->ringkasan }}
                    </p>

                    <a href="#" class="inline-flex items-center gap-2 text-[#3A0D0D] font-semibold hover:underline">
                        Baca Selengkapnya ↗
                    </a>
                </div>
                @endif

                {{-- KECIL 2 --}}
                @if($kecil2)
                <div>
                    <img
                        src="{{ $kecil2->image 
                                ? asset('storage/BintaranImage/'.$kecil2->image) 
                                : asset('/assets/ekm.png') }}"
                        class="w-full h-40 object-cover rounded-xl mb-4"
                        onerror="this.src='{{ asset('/assets/ekm.png') }}'">

                    <div class="flex items-center gap-3 mb-2">
                        <span class="px-3 py-1 text-xs rounded-full {{ warnaKategori($kecil2->kategoriBintaran->nama_kategori ?? '') }}">
                            {{ $kecil2->kategoriBintaran->nama_kategori ?? 'Umum' }}
                        </span>

                        <span class="text-sm text-gray-500">
                            {{ $kecil2->created_at->format('d M Y') }}
                        </span>
                    </div>

                    <h4 class="text-lg font-semibold text-[#3A0D0D] mb-2">
                        {{ $kecil2->judul_tulisan }}
                    </h4>

                    <p class="text-sm text-[#3A0D0D] opacity-70 mb-4 line-clamp-3">
                        {{ $kecil2->ringkasan }}
                    </p>

                    <a href="#" class="inline-flex items-center gap-2 text-[#3A0D0D] font-semibold hover:underline">
                        Baca Selengkapnya ↗
                    </a>
                </div>
                @endif

            </div>
        </div>

        <!-- Button -->
        <div class="text-center mt-12">
            <a href="#"
            class="px-6 py-3 rounded-full text-white font-semibold transition"
            style="background-color:#8B2C2C;">
                Lihat Tulisan Bintaran
            </a>
        </div>

    </div>
</section>
