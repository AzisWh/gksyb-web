@extends('layout.admin')

@section('title', 'Dashboard Sekre')

@section('content')

<div class="flex flex-col justify-start text-left fs-style-manrope py-4">
    <h1 class="text-lg">Pengaturan Website</h1>
    <p class="text-sm">Kelola pengaturan umum website paroki</p>
</div>
<div 
    x-data="{ tab: 'semua' }"
    class="bg-white border border-gray-200 shadow rounded-xl"
>
    <div class="flex border-b">
        <button
            @click="tab = 'identitas'"
            :class="tab === 'identitas' ? 'border-[#3E0703] text-[#3E0703]' : 'text-gray-500'"
            class="px-6 py-3 text-sm font-medium transition border-b-2"
        >
            Identitas Website
        </button>

        <button
            @click="tab = 'kontak'"
            :class="tab === 'kontak' ? 'border-[#3E0703] text-[#3E0703]' : 'text-gray-500'"
            class="px-6 py-3 text-sm font-medium transition border-b-2"
        >
            Kontak & Jam Pelayanan
        </button>

        <button
            @click="tab = 'medsos'"
            :class="tab === 'medsos' ? 'border-[#3E0703] text-[#3E0703]' : 'text-gray-500'"
            class="px-6 py-3 text-sm font-medium transition border-b-2"
        >
            Media Sosial
        </button>
        <button
            @click="tab = 'seo'"
            :class="tab === 'seo' ? 'border-[#3E0703] text-[#3E0703]' : 'text-gray-500'"
            class="px-6 py-3 text-sm font-medium transition border-b-2"
        >
            SEO & Meta Tags
        </button>
    </div>

    <div class="p-6">
        <div x-show="tab === 'identitas'" x-transition>
            @include('admin.pages.settings.identitas')
        </div>

        <div x-show="tab === 'kontak'" x-transition>
            @include('admin.pages.settings.kontak')
        </div>

        <div x-show="tab === 'medsos'" x-transition>
            @include('admin.pages.settings.medsos')
        </div>

        <div x-show="tab === 'seo'" x-transition>
            @include('admin.pages.settings.seo')
        </div>
    </div>
</div>
@endsection
