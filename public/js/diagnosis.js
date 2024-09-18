$(document).ready(function () {
    // Fungsi untuk membuka modal pertanyaan
    function openQuestionModal(question) {
        $('#questionText').text(question);
        $('#ModalDiagnosis').removeClass('hidden');
    }

    // Fungsi untuk menutup modal
    function closeModal() {
        $('#ModalDiagnosis').addClass('hidden');
        $('#ModalHasil').addClass('hidden');
    }

    // Fungsi untuk menampilkan hasil
    function showResult(result) {
        $('#hasilText').html(result);
        $('#ModalHasil').removeClass('hidden');
    }

    // Event listener untuk membuka modal diagnosa
    $('#BtnModal').on('click', function () {
        $.ajax({
            url: '/diagnosis/question',
            type: 'GET',
            data: { idgejala: 1 }, // Mulai dengan gejala ID 1
            success: function (data) {
                openQuestionModal(data.question);
            },
            error: function () {
                alert('Terjadi kesalahan saat mengambil pertanyaan.');
            }
        });
    });

    // Event listener untuk tombol di modal pertanyaan
    $('#BtnYes').on('click', function () {
        $.ajax({
            url: '/diagnosis/submit',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                idgejala: 1,
                value: true
            },
            success: function (data) {
                if (data.penyakitUnidentified) {
                    showResult('Penyakit tidak teridentifikasi.');
                } else if (data.idPenyakit) {
                    showResult('Penyakit teridentifikasi: ' + data.namaPenyakit + '<br>' + data.deskripsiPenyakit);
                } else {
                    // Ambil pertanyaan berikutnya jika ada
                    $.ajax({
                        url: '/diagnosis/question',
                        type: 'GET',
                        data: { idgejala: data.nextGejalaId },
                        success: function (nextData) {
                            openQuestionModal(nextData.question);
                        },
                        error: function () {
                            alert('Terjadi kesalahan saat mengambil pertanyaan berikutnya.');
                        }
                    });
                }
            },
            error: function () {
                alert('Terjadi kesalahan saat mengirim jawaban.');
            }
        });
    });

    $('#BtnNo').on('click', function () {
        $.ajax({
            url: '/diagnosis/submit',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                idgejala: 1,
                value: false
            },
            success: function (data) {
                if (data.penyakitUnidentified) {
                    showResult('Penyakit tidak teridentifikasi.');
                } else if (data.idPenyakit) {
                    showResult('Penyakit teridentifikasi: ' + data.namaPenyakit + '<br>' + data.deskripsiPenyakit);
                } else {
                    // Ambil pertanyaan berikutnya jika ada
                    $.ajax({
                        url: '/diagnosis/question',
                        type: 'GET',
                        data: { idgejala: data.nextGejalaId },
                        success: function (nextData) {
                            openQuestionModal(nextData.question);
                        },
                        error: function () {
                            alert('Terjadi kesalahan saat mengambil pertanyaan berikutnya.');
                        }
                    });
                }
            },
            error: function () {
                alert('Terjadi kesalahan saat mengirim jawaban.');
            }
        });
    });

    // Event listener untuk menutup modal
    $('#BtnClose').on('click', closeModal);
    $('#BtnCloseHasil').on('click', closeModal);
});
