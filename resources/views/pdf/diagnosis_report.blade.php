<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Hasil Diagnosa</title>
    <style>
        /* Styling untuk PDF */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #fff;
        }
        
        h1 {
            font-size: 20px;
            color: #333;
            text-align: center;
        }

        p {
            font-size: 12px;
            color: #555;
            margin: 10px 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .header {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #f4f4f4;
            color: #333;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 10px;
            color: #888;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Laporan Hasil Diagnosa</h1>
            <p><strong>Nama Pengguna:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>

        <!-- Tabel Diagnosis -->
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Diagnosa</th>
                    <th>Penyakit Teridentifikasi</th>
                    <th>Gejala Teridentifikasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diagnosisData as $index => $diagnosis)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($diagnosis->created_at)->format('d F Y') }}</td>
                        <td class="p-4">
                            @php
                                $found = false;
                            @endphp
                            
                            @foreach ($penyakit as $teridentifikasi)
                                @if ($diagnosis->id_penyakit == $teridentifikasi->id)
                                    <span>{{ $teridentifikasi->NamaPenyakit }}</span>
                                    @php
                                        $found = true;
                                        break;
                                    @endphp
                                @elseif ($diagnosis->id_penyakit == null)
                                    <span>Penyakit Tidak Diketahui</span>
                                    @php
                                        $found = true;
                                        break;
                                    @endphp
                                @endif
                            @endforeach
                            
                            @if (!$found)
                                <span>Penyakit Tidak Teridentifikasi</span>
                            @endif
                        </td>
                        
                        <!-- Menampilkan Gejala -->
                        <td class="p-4">
                            @php
                                $foundGejala = false;
                                $answerLog = json_decode($diagnosis->answer_log, true); // Mengubah JSON menjadi array
                            @endphp
                            
                            @foreach ($gejala as $gejalaItem)
                                @if (isset($answerLog[$gejalaItem->id]) && $answerLog[$gejalaItem->id] == true)
                                    <span>{{ $gejalaItem->name }}</span>
                                    @php
                                        $foundGejala = true;
                                    @endphp
                                    @if (!$loop->last)
                                        <span>, </span> <!-- Tambahkan koma antara gejala jika ada lebih dari satu -->
                                    @endif
                                @endif
                            @endforeach

                            @if (!$foundGejala)
                                <span>Gejala Tidak Teridentifikasi</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Footer -->
        <div class="footer">
            <p>Tanggal Download: {{ \Carbon\Carbon::now()->format('d F Y H:i:s') }}</p>
        </div>
    </div>

</body>
</html>
