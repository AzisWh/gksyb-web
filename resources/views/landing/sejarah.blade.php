@extends('layout.main')

@section('hero-title')
    Titik Sejarah
@endsection


@section('content')
    <div class="">
        @include('partials.sejarah.carousels')
        @include('partials.sejarah.description')
        @include('partials.sejarah.maps')
        @include('partials.sejarah.terhubung')
    </div>
@endsection