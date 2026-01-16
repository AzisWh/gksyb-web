@extends('layout.admin')

@section('content')
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
            Semua Jadwal
        </button>

        <button
            @click="tab = 'tambah'"
            :class="tab === 'tambah' ? 'border-[#3E0703] text-[#3E0703]' : 'text-gray-500'"
            class="px-6 py-3 text-sm font-medium transition border-b-2"
        >
            Tambah Jadwal
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
            @include('admin.pages.jadwal.semua')
        </div>

        <div x-show="tab === 'tambah'" x-transition>
            @include('admin.pages.jadwal.tambah')
        </div>

        <div x-show="tab === 'kategori'" x-transition>
            @include('admin.pages.jadwal.kategori')
        </div>
    </div>
</div>
@endsection
