class DiagnosisModal {
    constructor(csrfToken) {
        this.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
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

    // Mengirim seluruh gejala yang dipilih dalam satu permintaan
    async ajaxRequestToDiagnosis(selectedGejala) {
        return $.ajax({
            url: "/diagnosis",
            type: "POST",
            data: {
                _token: this.csrfToken,
                gejalaList: selectedGejala
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
            text: 'Sistem ini memiliki keterbatasan dalam cakupan data penyakit tanaman cabai...',
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
        const groupedGejala = this.gejala.reduce((acc, item) => {
            if (!acc[item.jenis_gejala]) {
                acc[item.jenis_gejala] = [];
            }
            acc[item.jenis_gejala].push(item);
            return acc;
        }, {});

        // Membuat konten modal
        let htmlContent = '<div class="h-full overflow-y-auto px-4">';
        for (const [jenisGejala, gejalaList] of Object.entries(groupedGejala)) {
            htmlContent += `
                <div class="mb-4">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">${jenisGejala}</h3>
                    ${gejalaList.map(item => `
                        <div class="mb-4 pb-4 border-b border-gray-200">
                            <label class="flex items-center mb-2">
                                <input type="checkbox" name="gejala" value="${item.id}" class="form-checkbox h-5 w-5 text-green-600">
                                <span class="ml-2 text-gray-700">${item.name}</span>
                            </label>
                        </div>
                    `).join('')}
                </div>
            `;
        }
        
        htmlContent += '</div>';

        // Menampilkan modal dalam full screen
        const { value: selectedGejala, dismiss: dismissReason } = await Swal.fire({
            title: 'Pilih Gejala Yang Dialami',
            html: htmlContent,
            showCancelButton: true,
            confirmButtonText: 'Diagnosa',
            cancelButtonText: 'Batal',
            preConfirm: () => {
                return Array.from(document.querySelectorAll('input[name="gejala"]:checked')).map(cb => cb.value);
            },
            customClass: {
                popup: 'full-screen-modal' // Kelas custom untuk modal full screen
            },
        });

        if (dismissReason) return;

        if (selectedGejala.length === 0) {
            await Swal.fire({
                title: 'Error',
                text: 'Pilih setidaknya satu gejala',
                icon: 'error',
            });
            return;
        }

        this.currentStep = 'processing';
        await this.showProcessingModal(selectedGejala);
    }

    async showProcessingModal(selectedGejala) {
        const processHtml = `
            <div id="processingStatus" class="text-lg text-gray-700 mb-4">Memulai diagnosis...</div>
        `;

        Swal.fire({
            title: 'Memproses Diagnosis',
            html: processHtml,
            showConfirmButton: false,
            allowOutsideClick: false,
            customClass: {
                popup: 'full-screen-modal' // Kelas custom untuk modal full screen
            },
        });

        try {
            const finalResponse = await this.ajaxRequestToDiagnosis(selectedGejala);
            await Swal.close();
            return this.getPenyakitFromDiagnose(finalResponse, true);
        } catch (error) {
            await this.swalError(error.responseJSON ?? error);
        }
    }

    getPenyakitFromDiagnose(response, success) {
        if (success) {
            if (response.idDiagnosis !== null) {
                window.location.href = `/profile/hasil-diagnosa/details/${response.idDiagnosis}`;
            } else {
                Swal.fire({
                    title: 'Penyakit Tidak Teridentifikasi',
                    text: 'Tidak dapat mengidentifikasi penyakit berdasarkan gejala yang diberikan.',
                    icon: 'warning',
                });
            }
        } else {
            Swal.fire({
                title: 'Error',
                text: 'Terjadi kesalahan dalam proses diagnosis. Silakan coba lagi.',
                icon: 'error',
            });
        }
    }
}

// Menambahkan CSS untuk modal full screen
const style = document.createElement('style');
style.innerHTML = `
    .full-screen-modal {
        width: 100%; /* Atur lebar modal ke 100% */
        height: 100%; /* Atur tinggi modal ke 100% */
        max-width: none; /* Hilangkan batasan lebar maksimum */
        max-height: none; /* Hilangkan batasan tinggi maksimum */
        border-radius: 0; /* Hilangkan sudut modal */
        padding: 0; /* Hilangkan padding default */
    }
    .swal2-popup {
        display: flex; /* Menggunakan flexbox untuk konten di dalam modal */
        align-items: center; /* Vertikal center */
        justify-content: center; /* Horizontal center */
    }
    .swal2-content {
        width: 100%; /* Atur lebar konten ke 100% */
        height: 100%; /* Atur tinggi konten ke 100% */
        overflow-y: auto; /* Tambahkan scroll jika konten melebihi tinggi */
        padding: 20px; /* Tambahkan padding ke konten */
    }
`;
document.head.appendChild(style);

$(document).ready(function() {
    const csrfToken = "{{ csrf_token() }}";
    const diagnosisModal = new DiagnosisModal(csrfToken);

    $('#btn-diagnosis').on('click', function () {
        diagnosisModal.showModal();
    });
});
