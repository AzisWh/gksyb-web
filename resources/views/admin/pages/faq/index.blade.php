@extends('layout.admin')

@section('title', 'FAQ Management')

@section('content')

<div class="flex flex-col justify-start text-left fs-style-manrope py-4">
    <h1 class="text-lg">Soal Sering Ditanya (FAQ)</h1>
    <p class="text-sm">Kelola pertanyaan yang sering ditanyakan oleh umat</p>
</div>
<div 
    x-data="{ tab: 'semua' }"
    class="bg-white border border-gray-200 shadow rounded-xl"
>
    <div class="flex border-b">
        <button
            @click="tab = 'semua'"
            :class="tab === 'semua' ? 'border-[#3E0703] text-[#3E0703]' : 'text-gray-500'"
            class="px-6 py-3 text-sm font-medium transition border-b-2"
        >
            Semua Pertanyaan
        </button>

        <button
            @click="tab = 'tambah'"
            :class="tab === 'tambah' ? 'border-[#3E0703] text-[#3E0703]' : 'text-gray-500'"
            class="px-6 py-3 text-sm font-medium transition border-b-2"
        >
            Tambah Pertanyaan
        </button>

        <button
            @click="tab = 'kategori'"
            :class="tab === 'kategori' ? 'border-[#3E0703] text-[#3E0703]' : 'text-gray-500'"
            class="px-6 py-3 text-sm font-medium transition border-b-2"
        >
            Kelola Kategori
        </button>
    </div>

    <div class="p-6">
        <div x-show="tab === 'semua'" x-transition>
            @include('admin.pages.faq.semua')
        </div>

        <div x-show="tab === 'tambah'" x-transition>
            @include('admin.pages.faq.tambah')
        </div>

        <div x-show="tab === 'kategori'" x-transition>
            @include('admin.pages.faq.kategori')
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        function toggleFaq(id) {
            const content = document.getElementById('content-' + id)
            const icon = document.getElementById('icon-' + id)

            content.classList.toggle('hidden')
            icon.classList.toggle('rotate-180')
        }
    </script>
@endpush