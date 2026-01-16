@extends('layout.admin')

@section('title', 'Perayaan Ekaristi')

@section('content')
    <div class="flex flex-col justify-start text-left fs-style-manrope py-4">
        <h1 class="text-lg">Panduan Perayaan Ekaristi</h1>
        <p class="text-sm">Kelola dokumen panduan tata cara Perayaan Ekaristi untuk berbagai perayaan liturgi</p>
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
                Semua Panduan
            </button>

            <button
                @click="tab = 'tambah'"
                :class="tab === 'tambah' ? 'border-[#3E0703] text-[#3E0703]' : 'text-gray-500'"
                class="px-6 py-3 text-sm font-medium transition border-b-2"
            >
                Tambah Panduan
            </button>

        </div>

        <div class="p-6">
            <div x-show="tab === 'semua'" x-transition>
                @include('admin.pages.ekaristi.semua')
            </div>

            <div x-show="tab === 'tambah'" x-transition>
                @include('admin.pages.ekaristi.tambah')
            </div>

        </div>
    </div>
@endsection

