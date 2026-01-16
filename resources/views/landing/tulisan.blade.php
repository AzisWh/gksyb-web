@extends('layout.main')

@section('hero-title')
    Tulisan Bintaran
@endsection

@section('hero-desc')
    Kumpulan tulisan yang menghadirkan informasi, inspirasi, dan refleksi iman umat Gereja Santo Yusup Bintaran.
@endsection

@section('content')
    <div class="">
        @include('partials.tulisan.hero')
        @include('partials.tulisan.kegiatan')
        @include('partials.tulisan.semua')
    </div>
@endsection