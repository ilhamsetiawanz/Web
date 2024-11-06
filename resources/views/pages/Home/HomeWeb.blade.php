@extends('layouts.weblayouts')

@section('title', 'Home')

@section('heroJumbotron')
    @include('components.Jumbotron')
@endsection

@section('body')
<div>
    <h2 class="text-2xl font-bold mb-4 xl:text-3xl">Jenis Penyakit Tanaman Cabai</h2>
    <div>
        @include('components.User.cardPenyakit')
    </div>
</div>
@endsection