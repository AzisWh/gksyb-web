@extends('layout.main')

@section('hero-title')
    Dokumen Gereja
@endsection

@section('content')

    <div class="fs-style-manrope p-5" data-aos="fade-up">
        <div class="flex flex-col gap-2 justify-center items-center text-center py-6" >
            <h1 class="text-4xl font-bold">Dokumen, Panduan Sakramen, dan Formulir</h1>
            <p>Unduh panduan dan formulir resmi untuk berbagai pelayanan sakramen di Gereja St. Yusup Bintaran.</p>
        </div>

        <section  class="max-w-4xl mx-auto px-6 py-12">

            <div class="space-y-4">

                @forelse($data as $index => $item)

                    <div class="relative border-b border-[var(--clr-secondary)]/20">
                        <input type="checkbox" id="doc_{{ $index }}" class="peer hidden">

                        <label for="doc_{{ $index }}"
                            class="flex justify-between items-center cursor-pointer py-4 pr-10 font-semibold text-[var(--clr-secondary)]">
                            
                            <div>
                                <p>{{ $item->judul_dokumen }}</p>
                                <p class="text-xs opacity-70">
                                    {{ $item->kategori->nama_kategori ?? '-' }}
                                </p>
                            </div>

                            <span class="transition peer-checked:rotate-180">⌄</span>
                        </label>

                        <!-- ACCORDION CONTENT -->
                        <div class="max-h-0 overflow-hidden transition-all duration-300 peer-checked:max-h-[1200px]">

                            <div class="pb-6 text-sm space-y-4 text-[var(--clr-secondary)]">

                                @if($item->keterangan)
                                    <p>{{ $item->keterangan }}</p>
                                @endif

                                <!-- PDF PREVIEW -->
                                <div class="w-full border rounded overflow-hidden">
                                    <iframe
                                        src="{{ asset('storage/DokParoki/' . $item->file) }}"
                                        class="w-full h-[500px]"
                                        loading="lazy">
                                    </iframe>
                                </div>

                                <!-- DOWNLOAD -->
                                <a href="{{ asset('storage/DokParoki/' . $item->file) }}"
                                target="_blank"
                                class="inline-block px-4 py-2 text-sm rounded bg-[var(--clr-secondary)] text-white">
                                    ⬇ Download Dokumen
                                </a>

                            </div>
                        </div>
                    </div>

                @empty
                    <p class="text-center opacity-70">
                        Belum ada dokumen tersedia
                    </p>
                @endforelse

            </div>

        </section>
    </div>

    <div class="mt-5">
        @include('partials.sejarah.terhubung')
    </div>
@endsection
