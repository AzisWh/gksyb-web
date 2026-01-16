@extends('layout.admin')

@section('title', 'Dokumen Paroki')

@section('content')
<div class="flex flex-col justify-start text-left fs-style-manrope py-4">
    <h1 class="text-lg">Dokumen Paroki</h1>
    <p class="text-sm">Kelola dan simpan dokumen penting Paroki Bintaran</p>
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
            Semua Dokumen
        </button>

        <button
            @click="tab = 'tambah'"
            :class="tab === 'tambah' ? 'border-[#3E0703] text-[#3E0703]' : 'text-gray-500'"
            class="px-6 py-3 text-sm font-medium transition border-b-2"
        >
            Tambah Dokumen
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
            @include('admin.pages.dokparoki.semua')
        </div>

        <div x-show="tab === 'tambah'" x-transition>
            @include('admin.pages.dokparoki.tambah')
        </div>

        <div x-show="tab === 'kategori'" x-transition>
            @include('admin.pages.dokparoki.kategori')
        </div>
    </div>
</div>
@endsection
