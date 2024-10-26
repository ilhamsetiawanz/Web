class DiagnosisModal {
    constructor(csrfToken) {
        this.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        this.gejala = [];
        this.currentStep = 'gejala'; // 'gejala' or 'processing'
    }

    // Fetch gejala list from the server
    async ajaxGetGejala() {
        return $.ajax({
            url: '/get-gejala',
            method: 'GET',
            dataType: 'json',
        });
    }

    // Send selected gejala to server for diagnosis processing
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

    // Error handling using SweetAlert2
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

    // Show modal dialog before diagnosis starts
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
            // Fetch list of gejala (symptoms)
            this.gejala = await this.ajaxGetGejala();
            await this.showGejalaModal();
        } catch (error) {
            await this.swalError(error.responseJSON ?? error);
        }
    }

    // Updated method to show modal for selecting gejala
    async showGejalaModal() {
        // Group gejala by jenis_gejala
        const groupedGejala = this.gejala.reduce((acc, item) => {
            if (!acc[item.jenis_gejala]) {
                acc[item.jenis_gejala] = [];
            }
            acc[item.jenis_gejala].push(item);
            return acc;
        }, {});

        let htmlContent = '<div class="h-[80vh] overflow-y-auto px-4">';
        
        for (const [jenisGejala, gejalaList] of Object.entries(groupedGejala)) {
            htmlContent += `
                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">${jenisGejala}</h3>
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

        const { value: selectedGejala, dismiss: dismissReason } = await Swal.fire({
            title: 'Pilih Gejala Yang Dialami',
            html: htmlContent,
            showCancelButton: true,
            confirmButtonText: 'Diagnosa',
            cancelButtonText: 'Batal',
            customClass: {
                container: 'swal-fullscreen-modal',
                popup: 'w-full h-full m-0',
                htmlContainer: 'h-[calc(100%-200px)]',
                title: 'text-2xl font-bold text-gray-800 mb-4',
                confirmButton: 'bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded',
                cancelButton: 'bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded ml-2'
            },
            preConfirm: () => {
                return Array.from(document.querySelectorAll('input[name="gejala"]:checked')).map(cb => cb.value);
            }
        });

        if (dismissReason) return;

        if (selectedGejala.length === 0) {
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

        // Proceed to the next step: processing diagnosis
        this.currentStep = 'processing';
        await this.showProcessingModal(selectedGejala);
    }

    // Show processing modal as gejala are being diagnosed
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
                // Update status in modal
                document.getElementById('processingStatus').textContent = `Memproses gejala ${index + 1} dari ${selectedGejala.length}...`;
                
                // Make request to server for diagnosis
                const response = await this.ajaxRequestToDiagnosis(idGejala, true);
                finalResponse = response;

                // If a disease is identified or the system cannot identify any disease
                if (response.idPenyakit !== null || response.penyakitUnidentified === true) {
                    break;
                }
            } catch (error) {
                await this.swalError(error.responseJSON ?? error);
                return;
            }
        }

        // If still processing, close modal and show diagnosis result
        if (this.currentStep === 'processing') {
            await Swal.close();
            return this.getPenyakitFromDiagnose(finalResponse, true);
        }
    }

    // Display the diagnosis result
    getPenyakitFromDiagnose(response, success) {
        if (success) {
            if (response.idDiagnosis !== null) {
                // Redirect user to the diagnosis detail page after a successful diagnosis
                window.location.href = `/profile/hasil-diagnosa/details/${response.idDiagnosis}`;
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

    // Show modal when user clicks the "Mulai Diagnosa Sekarang" button
    $('#btn-diagnosis').on('click', function () {
        diagnosisModal.showModal();
    });
});