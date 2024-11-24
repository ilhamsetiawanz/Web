@extends('layouts.dblayouts')

@section('title', 'Laporan')

@section('content')
    <div class="card h-full">
        <div class="card-body">
            <div class="flex justify-between">
                <h4 class="text-gray-600 text-lg font-semibold mb-6">Laporan Diagnosa</h4>
                <a href="{{ route('pdf') }}">
                    <button class="px-4 py-2 mt-4 mr-5 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                        <span class="material-symbols-outlined">
                            download
                        </span>
                    </button>
                </a> 
            </div>
                {{-- @include('components.Admin.Gejala.ModalAdd') --}}
                {{-- @foreach ($gejala as $data) --}}
                    {{-- @include('components.Admin.Gejala.ModalEdit', ['data' => $data]) --}}
                    {{-- @include('components.Admin.Gejala.DeleteModal', ['data' => $data]) --}}
                {{-- @endforeach --}}
            
            <div class="relative overflow-x-auto">
                <!-- table -->
                <table class="text-left w-full whitespace-nowrap text-sm">
                    <thead class="text-gray-700">
                        <tr class="font-semibold text-gray-600">
                            <th scope="col" class="p-1">No</th>
                            <th scope="col" class="p-2">Petani</th>
                            <th scope="col" class="p-4">Penyakit Yang Teridentifikasi</th>
                            <th scope="col" class="p-4">Tanggal Diagnosa</th>
                            <th scope="col" class="p-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporan as $data)
                        <tr class="overflow-hidden">
                            <td class="p-4 font-semibold text-gray-600 ">{{$loop->iteration}}</td>
                            <td class="p-4">
                                @foreach ($pengguna as $petani)
                                    @if ($data->user_id == $petani->id)
                                        <span>
                                            {{$petani->name}}
                                        </span>
                                    @endif
                                @endforeach
                            </td>
                            <td class="p-4">
                                @php
                                    $found = false;
                                @endphp
                                
                                @foreach ($penyakit as $teridentifikasi)
                                    @if ($data->id_penyakit == $teridentifikasi->id)
                                        <span>{{$teridentifikasi->NamaPenyakit}}</span>
                                        @php
                                            $found = true;
                                            break; // keluar dari loop karena sudah ditemukan
                                        @endphp
                                    @elseif ($data->id_penyakit == null)
                                        <span>Penyakit Tidak Diketahui</span>
                                        @php
                                            $found = true;
                                            break; // keluar dari loop karena id_penyakit kosong
                                        @endphp
                                    @endif
                                @endforeach
                                
                                @if (!$found)
                                    <span>Penyakit Tidak Teridentifikasi</span>
                                @endif
                            
                            </td>
                            <td class="p-4">
                                <span class="font-semibold text-base text-gray-600">
                                    {{ \Carbon\Carbon::parse($data->updated_at)->format('D M Y') }}
                                </span>
                                
                            </td>
                            <td class="p-4">
                                <div class="flex gap-2">
                                    {{-- @include('components.Admin.button.EditModal', ['data' => $data])
                                    @include('components.Admin.Gejala.DeleteGejala', ['data' => $data]) --}}
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>									
        </div>
        <!-- Pagination -->
        <div class="flex justify-between p-4">
            <div>
                @if ($laporan->onFirstPage())
                    <button class="bg-gray-300 text-gray-600 py-2 px-4 rounded-lg flex items-center gap-1" disabled>
                        <span class="material-symbols-outlined">
                            arrow_back
                        </span>
                        <span>Previous</span>
                    </button>
                @else
                    <a href="{{ $laporan->previousPageUrl() }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg flex items-center gap-1 transition duration-300">
                        <span class="material-symbols-outlined">
                            arrow_back
                        </span>
                        <span>Previous</span>
                    </a>
                @endif
            </div>

            <div class="flex items-center gap-2 text-gray-600">
                <span>Page {{ $laporan->currentPage() }} of {{ $laporan->lastPage() }}</span>
                <span>|</span>
                <span>Total: {{ $laporan->total() }} data</span>
            </div>

            <div>
                @if ($laporan->hasMorePages())
                    <a href="{{ $laporan->nextPageUrl() }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg flex items-center gap-1 transition duration-300">
                        <span>Next</span>
                        <span class="material-symbols-outlined">
                        arrow_forward
                        </span>
                    </a>
                @else
                    <button class="bg-gray-300 text-gray-600 py-2 px-4 rounded-lg flex items-center gap-1" disabled>
                        <span>Next</span>
                        <span class="material-symbols-outlined">
                        arrow_forward
                        </span>
                    </button>
                @endif
            </div>
        </div>
    </div>
@endsection
