@extends('layout.main')

@section('hero-title')
    Teks Misa Perayaan Ekaristi
@endsection

@section('content')

    <div class="fs-style-manrope p-5">
        <div class="flex flex-col gap-2 justify-center items-center text-center py-6" >
            <h1 class="text-4xl font-bold">Panduan Online Perayaan Ekaristi Gereja </br> Santo Yusup Bintaran</h1>
            <p>Panduan ini disusun untuk membantu umat mengikuti Perayaan Ekaristi dengan penuh penghayatan, tata liturgi yang benar, serta kesadaran akan kehadiran Allah dalam doa. </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 place-items-center">

            @foreach($data as $item)


            <a href="{{ route('landing.download.panduan-ekaristi', $item->id) }}" target="_blank">
                <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-sm hover:shadow-md transition">
                    <div class="w-16 h-16 flex items-center justify-center mx-auto rounded-full mb-4"
                        style="background-color: #FEF2F2;">
                        <img src="{{ asset('sidebaricon/doc.png') }}" class="w-8 h-8" alt="icon">
                    </div>

                    <h3 class="text-center text-[#3A0D0D] font-semibold mb-2">
                        {{ $item->nama_perayaan }}
                    </h3>

                    <p class="text-center text-sm text-[#3A0D0D] opacity-70 mb-4">
                        {{ $item->ket_perayaan }}
                    </p>

                </div>
            </a>

            @endforeach

        </div>
    </div>

    <div class="mt-5">
        @include('partials.sejarah.terhubung')
    </div>
@endsection
