@extends('layout.main')

@section('hero-subtitle')
    Selamat Datang di
@endsection

@section('hero-title')
    {{ $data->nama_gereja ?? 'Gereja Santo Yusup Bintaran' }}
@endsection

@section('hero-desc')
    Menapak dari masa kolonial, Gereja Santo Yusup Bintaran menjadi simbol spiritual dan sejarah. Perpaduan arsitektur Belanda dan nuansa Jawa menjadikannya ruang doa sekaligus lambang kebersamaan umat.
@endsection

@section('hero-action')
    <a href="{{ route('landing.sejarah') }}" class="btn-accent">
        Titik Sejarah
    </a>
@endsection

@section('content')
    <div class="">
        @include('partials.mainpage.hero')
        @include('partials.mainpage.jadwal')
        @include('partials.mainpage.kegiatan')
        @include('partials.mainpage.medsos')
        @include('partials.mainpage.aksesumat')
        @include('partials.mainpage.blog')
        @include('partials.mainpage.terhubung')
    </div>
@endsection