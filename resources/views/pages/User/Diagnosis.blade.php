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
    constructor(csrfToken) {
        this.csrfToken = csrfToken;
        this.gejala = [];
        this.currentStep = 'gejala'; // 'gejala' or 'processing'
    }

    async ajaxGetGejala() {
        return $.ajax({
            url: '/get-gejala',
            method: 'GET',
            dataType: 'json',
        });
    }

    async ajaxRequestToDiagnosis(idGejala, value) {
        return $.ajax({
            url: "/diagnosis",
            type: "POST",
            data: {
                _token: this.csrfToken,
                idGejala: idGejala,
                value: value
            },
        });
    }

    swalError = async (error) => {
        const result = await Swal.fire({
            title: 'Terjadi kesalahan',
            text: error.message,
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Muat Ulang',
            cancelButtonText: 'Tutup',
            reverseButtons: true
        });

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

        try {
            this.gejala = await this.ajaxGetGejala();
            await this.showGejalaModal();
        } catch (error) {
            await this.swalError(error.responseJSON ?? error);
        }
    }

    async showGejalaModal() {
        let htmlContent = '<div class="max-h-[60vh] overflow-y-auto px-4">';
        this.gejala.forEach((item, index) => {
            htmlContent += `
                <div class="mb-4 pb-4 border-b border-gray-200">
                    <label class="flex items-center mb-2">
                        <input type="checkbox" name="gejala" value="${item.id}" class="form-checkbox h-5 w-5 text-green-600">
                        <span class="ml-2 text-gray-700">${item.name}</span>
                    </label>
                </div>
            `;
        });
        htmlContent += '</div>';

        const { value: formValues, dismiss: dismissReason } = await Swal.fire({
            title: 'Pilih Gejala Yang Dialami',
            html: htmlContent,
            showCancelButton: true,
            confirmButtonText: 'Diagnosa',
            cancelButtonText: 'Batal',
            customClass: {
                container: 'swal-large-modal',
                popup: 'w-full max-w-4xl',
                title: 'text-2xl font-bold text-gray-800 mb-4',
                confirmButton: 'bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded',
                cancelButton: 'bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded ml-2'
            },
            preConfirm: () => {
                return Array.from(document.querySelectorAll('input[name="gejala"]:checked')).map(cb => cb.value);
            }
        });

        if (dismissReason) return;

        if (formValues.length === 0) {
            await Swal.fire({
                title: 'Error',
                text: 'Pilih setidaknya satu gejala',
                icon: 'error',
                customClass: {
                    popup: 'w-full max-w-md'
                }
            });
            return;
        }

        this.currentStep = 'processing';
        await this.showProcessingModal(formValues);
    }

    async showProcessingModal(selectedGejala) {
        const processHtml = `
            <div id="processingStatus" class="text-lg text-gray-700 mb-4">Memulai diagnosis...</div>
            <div class="mt-4">
                <button id="backButton" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Kembali</button>
            </div>
        `;

        Swal.fire({
            title: 'Memproses Diagnosis',
            html: processHtml,
            showConfirmButton: false,
            showCancelButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false,
            customClass: {
                container: 'swal-large-modal',
                popup: 'w-full max-w-2xl',
                title: 'text-2xl font-bold text-gray-800 mb-4'
            },
            didOpen: () => {
                document.getElementById('backButton').addEventListener('click', () => {
                    this.currentStep = 'gejala';
                    Swal.close();
                    this.showGejalaModal();
                });
            }
        });

        let finalResponse = null;

        for (const [index, idGejala] of selectedGejala.entries()) {
            try {
                document.getElementById('processingStatus').textContent = `Memproses gejala ${index + 1} dari ${selectedGejala.length}...`;
                const response = await this.ajaxRequestToDiagnosis(idGejala, true);
                finalResponse = response;

                if (response.idPenyakit !== null || response.penyakitUnidentified === true) {
                    break;
                }
            } catch (error) {
                await this.swalError(error.responseJSON ?? error);
                return;
            }
        }

        if (this.currentStep === 'processing') {
            await Swal.close();
            return this.getPenyakitFromDiagnose(finalResponse, true);
        }
    }

    getPenyakitFromDiagnose(response, success) {
        if (success) {
            if (response.idPenyakit !== null) {
                Swal.fire({
                    title: 'Penyakit Teridentifikasi',
                    text: 'Penyakit yang teridentifikasi dengan Kode Penyakit: P' + response.idPenyakit.id,
                    icon: 'success',
                    customClass: {
                        popup: 'w-full max-w-xl'
                    }
                });
                console.log(response);
            } else {
                Swal.fire({
                    title: 'Penyakit Tidak Teridentifikasi',
                    text: 'Tidak dapat mengidentifikasi penyakit berdasarkan gejala yang diberikan.',
                    icon: 'warning',
                    customClass: {
                        popup: 'w-full max-w-xl'
                    }
                });
            }
        } else {
            Swal.fire({
                title: 'Error',
                text: 'Terjadi kesalahan dalam proses diagnosis. Silakan coba lagi.',
                icon: 'error',
                customClass: {
                    popup: 'w-full max-w-xl'
                }
            });
        }
    }
}

$(document).ready(function() {
    const csrfToken = "{{ csrf_token() }}";
    const diagnosisModal = new DiagnosisModal(csrfToken);

    $('#btn-diagnosis').on('click', function () {
        diagnosisModal.showModal();
    });
});
</script>
@endpush