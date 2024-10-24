@extends('layouts.weblayouts')
@section('title', 'Diagnosa')
@section('body')
    <div class="mb-10">
        <h2 class="text-2xl font-bold mb-4 xl:text-3xl">Diagnosis</h2>
        <div class="w-full bg-white p-5 rounded">
            <p class="xl:text-lg capitalize text-base">
                Proses diagnosa penyakit tanaman cabai pada sistem ini menggunakan metode forward chaining.
                Metode ini merupakan salah satu metode yang digunakan dalam sistem pengetahuan untuk menentukan penyebab penyakit tanaman cabai berdasarkan gejala yang menyebabkan penyakit tersebut.
                <span class="italic">Hasil dari sistem ini memerlukan pengujian yang lebih mendalam</span>
            </p>
            @if (Auth::check())
                <button id="btn-diagnosis" class="w-full mt-6 flex justify-center items-center bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600">
                    <span class="material-symbols-outlined">digital_wellbeing</span>
                    <span class="ml-2">Mulai Diagnosa Sekarang</span>
                </button>
            @else
                <a href="{{ route('login') }}" class="w-full mt-6 flex justify-center items-center bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600">
                    <span class="material-symbols-outlined">digital_wellbeing</span>
                    <span class="ml-2">Mulai Diagnosa Sekarang</span>
                </a>        
            @endif
        </div>
    </div>
    <div>
        <h2 class="text-2xl font-bold mb-4 xl:text-3xl">Jenis Penyakit Tanaman Cabai</h2>
        <div>
            @include('components.User.cardPenyakit')
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js/diagnosis.js')}}"></script>

<style>
.swal-fullscreen-modal {
    padding: 0 !important;
}

.swal-fullscreen-modal .swal2-popup {
    border-radius: 0 !important;
}
</style>
@endpush