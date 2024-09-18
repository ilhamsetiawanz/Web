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
                <button id="BtnModal" class="w-full mt-6 flex justify-center items-center bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600">
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#BtnModal').on('click', function() {
                $.ajax({
                    url: '{{ url('diagnosis/start') }}',
                    type: 'GET',
                    success: function(response) {
                        Swal.fire({
                            title: 'Pertanyaan Diagnosa',
                            text: response.question,
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonText: 'Ya',
                            cancelButtonText: 'Tidak'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                handleAnswer(true);
                            } else {
                                handleAnswer(false);
                            }
                        });
                    }
                });
            });

            function handleAnswer(answer) {
                $.ajax({
                    url: '{{ url('diagnosis/answer') }}',
                    type: 'POST',
                    data: {
                        idgejala: currentQuestionId,
                        value: answer,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.penyakitUnidentified) {
                            Swal.fire('Hasil Diagnosa', 'Penyakit tidak teridentifikasi.', 'info');
                        } else {
                            Swal.fire({
                                title: 'Hasil Diagnosa',
                                html: '<strong>Penyakit:</strong> ' + response.namaPenyakit + '<br>' +
                                      '<strong>Deskripsi:</strong> ' + response.deskripsiPenyakit,
                                icon: 'info'
                            });
                        }
                    }
                });
            }
        });
    </script>
@endsection
