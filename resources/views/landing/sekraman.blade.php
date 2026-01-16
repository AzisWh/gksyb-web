@extends('layout.main')

@section('hero-title')
    Sakramen Gereja Katolik
@endsection


@section('content')
    <div class="">
        @include('partials.sekraman.hero')
        @include('partials.sekraman.card')
        @include('partials.sekraman.cta')
    </div>
@endsection