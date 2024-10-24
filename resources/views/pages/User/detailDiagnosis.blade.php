@extends('layouts.weblayouts')
@section('title', 'Detail Diagnosa')
@section('body')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Header dengan tombol kembali -->
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold text-gray-800">Detail Hasil Diagnosa</h1>
                <a href="{{ route('profile') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition duration-300">
                    <span class="material-symbols-outlined mr-2">arrow_back</span>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">
            @php
                $diagnosisPenyakit = $penyakit->first(function($item) use ($report) {
                    return $report->id_penyakit == $item->id;
                });
                
                // Parse answer_log JSON
                $selectedSymptoms = [];
                if ($report->answer_log) {
                    $answers = json_decode($report->answer_log, true);
                    if ($answers) {
                        foreach ($answers as $id => $value) {
                            if ($value === true || $value === "true") {
                                $selectedSymptoms[] = $id;
                            }
                        }
                    }
                }
            @endphp

            @if ($diagnosisPenyakit)
                <div class="space-y-6">
                    <!-- Gambar dan Nama Penyakit -->
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="w-full md:w-1/3">
                            @if($diagnosisPenyakit->image)
                                <img 
                                    src="{{ $diagnosisPenyakit->image }}" 
                                    alt="{{ $diagnosisPenyakit->NamaPenyakit }}"
                                    class="w-full h-auto rounded-lg shadow-md object-cover"
                                >
                            @else
                                <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <span class="text-gray-400">Tidak ada gambar</span>
                                </div>
                            @endif
                        </div>
                        
                        <div class="w-full md:w-2/3">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">
                                {{ $diagnosisPenyakit->NamaPenyakit }}
                            </h2>
                            
                            <!-- Tanggal Diagnosa -->
                            <div class="mb-4 text-sm text-gray-600">
                                <span class="font-medium">Tanggal Diagnosa:</span> 
                                {{ \Carbon\Carbon::parse($report->created_at)->format('d F Y') }}
                            </div>

                            <!-- Informasi Detail -->
                            <div class="space-y-4">
                                @if($diagnosisPenyakit->reason)
                                    <div class="bg-blue-50 p-4 rounded-lg">
                                        <h3 class="font-semibold text-blue-800 mb-2">Penjelasan</h3>
                                        <p class="text-blue-700">
                                            {{ $diagnosisPenyakit->reason }}
                                        </p>
                                    </div>
                                @endif

                                @if($diagnosisPenyakit->solution)
                                    <div class="bg-green-50 p-4 rounded-lg">
                                        <h3 class="font-semibold text-green-800 mb-2">Solusi</h3>
                                        <p class="text-green-700">
                                            {{ $diagnosisPenyakit->solution }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Error State -->
                <div class="text-center py-8">
                    <div class="bg-red-50 rounded-lg p-6">
                        <span class="material-symbols-outlined text-red-500 text-4xl mb-2">
                            error
                        </span>
                        <h2 class="text-xl font-semibold text-red-700 mb-2">Penyakit Tidak Teridentifikasi</h2>
                        <p class="text-red-600 mb-4">Berdasarkan gejala yang dipilih, sistem tidak dapat mengidentifikasi penyakit yang sesuai.</p>
                    </div>
                </div>
            @endif

            <!-- Tabel Gejala yang Dipilih -->
            <div class="mt-8">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Gejala Yang Dipilih</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Gejala
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Jenis Gejala
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if(count($selectedSymptoms) > 0)
                                @foreach($gejala as $index => $item)
                                    @if(in_array($item->id, $selectedSymptoms))
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-normal text-sm text-gray-900">
                                                {{ $item->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $item->jenis_gejala }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">
                                        Tidak ada gejala yang dipilih
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection