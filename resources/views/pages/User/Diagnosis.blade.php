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
<script>
    class DiagnosisModal {
        constructor(assetStorageGejala, csrfToken) {
            this.assetStorageGejala = assetStorageGejala;
            this.csrfToken = csrfToken;
        }

        async ajaxGetGejala() {
            return $.ajax({
                url: '/get-gejala',
                method: 'GET',
                dataType: 'json',
            });
        }

        async ajaxGetAturanWithNextGejala() {
            return $.ajax({
                url: '/get-aturan-with-next-gejala',
                method: 'GET',
            });
        }

        async ajaxRequestToDiagnosis(element, jawaban) {
            return $.ajax({
                url: "/diagnosis",
                type: "POST",
                data: {
                    _token: this.csrfToken,
                    idGejala: element,
                    value: jawaban
                },
            });
        }

        swalError = async (error) => {
            const result = await Swal.mixin({
                title: 'Terjadi kesalahan',
                text: error.message,
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Muat Ulang',
                cancelButtonText: 'Tutup',
                reverseButtons: true
            }).fire();

            if (result.isConfirmed) {
                window.location.reload();
            }
        };

        async showModal() {
            const swalBeforeDiagnosis = await Swal.fire({
                title: 'Catatan',
                text: 'Sistem ini memiliki keterbatasan dalam cakupan data penyakit tanaman cabai, sehingga tidak semua penyakit dapat didiagnosis. Hanya penyakit yang terdapat dalam daftar penyakit yang dapat didiagnosis. Apakah Anda ingin melanjutkan proses diagnosis?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Lanjutkan',
                cancelButtonText: 'Batal',
                reverseButtons: true
            });

            if (!swalBeforeDiagnosis.isConfirmed) return;

            // Swal mohon tunggu
            Swal.fire({
                title: 'Mohon tunggu',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                },
            });

            try {
                const gejala = await this.ajaxGetGejala();
                const aturan = await this.ajaxGetAturanWithNextGejala();

                let isClosed = false;

                for (let i = 0; i < gejala.length; i++) {
                    let element = gejala[i];

                    const { value: jawaban, dismiss: dismissReason } = await Swal.fire({
                        title: 'Pertanyaan ' + (i + 1),
                        imageUrl: `${this.assetStorageGejala}/${element.image}`,
                        imageHeight: '300px',
                        imageAlt: `Gambar Gejala ${element.name}`,
                        text: 'Apakah ' + element.name + '?',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ya',
                        showDenyButton: true,
                        denyButtonColor: '#d33',
                        denyButtonText: 'Tidak',
                        showCloseButton: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        reverseButtons: true,
                    });

                    if (dismissReason === Swal.DismissReason.close) {
                        isClosed = true;
                        break;
                    }

                    try {
                        const response = await this.ajaxRequestToDiagnosis(element.id, jawaban);

                        if (response.idPenyakit != null || response.penyakitUnidentified === true) {
                            await Swal.close();
                            return getPenyakitFromDiagnose(response, true);
                        }

                        if (!jawaban) {
                            for (const [key, value] of Object.entries(aturan)) {
                                for (const [key2, value2] of Object.entries(value)) {
                                    if (key2 == element.id) {
                                        if (value2 == null) {
                                            await Swal.close();
                                            return getPenyakitFromDiagnose(response, true);
                                        }

                                        i = value2 - 2;
                                        break;
                                    }
                                }
                            }
                        }
                    } catch (error) {
                        await this.swalError(error.responseJSON ?? error);
                    }
                }
            } catch (error) {
                await this.swalError(error.responseJSON ?? error);
            }
        }
    }

    // Tambahkan definisi getPenyakitFromDiagnose
    function getPenyakitFromDiagnose(response, success) {
    if (success) {
        if (response.idPenyakit !== null) {
            // Jika penyakit teridentifikasi
            Swal.fire({
                title: 'Penyakit Teridentifikasi',
                text: 'Penyakit yang teridentifikasi adalah: ' + response.idPenyakit, // Menampilkan nama penyakit
                icon: 'success',
            });
            console.log(response)

        } else {
            // Jika penyakit tidak dapat diidentifikasi
            Swal.fire({
                title: 'Penyakit Tidak Teridentifikasi',
                text: 'Tidak dapat mengidentifikasi penyakit berdasarkan gejala yang diberikan.',
                icon: 'warning',
            });
        }
    } else {
        // Jika terjadi error dalam proses diagnosis
        Swal.fire({
            title: 'Error',
            text: 'Terjadi kesalahan dalam proses diagnosis. Silakan coba lagi.',
            icon: 'error',
        });
    }
}


    // Instantiate and bind the modal to the button
    $(document).ready(function() {
        const assetStorageGejala = "{{ asset('path_to_your_gejala_images') }}"; // Update with the correct path
        const csrfToken = "{{ csrf_token() }}";
        const diagnosisModal = new DiagnosisModal(assetStorageGejala, csrfToken);

        $('#btn-diagnosis').on('click', function () {
            diagnosisModal.showModal();
        });
    });
</script>
@endpush
