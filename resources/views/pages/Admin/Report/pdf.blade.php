<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Hasil Diagnosa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #fff;
        }

        h1 {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }

        table th, table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: justify;
            vertical-align: middle;
        }

        table th {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>DATA HASIL DIAGNOSA PENYAKIT TANAMAN CABAI</h1>
    <table>
        <thead>
            <tr>
                <th>NO</th>
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
                    <td>
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
                    <td>
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
                                    <span>, </span>
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
</body>
</html>
