@extends('layouts.dblayouts')

@section('title', 'Laporan')

@section('content')
    <div class="card h-full">
        <div class="card-body">
            <div class="flex justify-between">
                <h4 class="text-gray-600 text-lg font-semibold mb-6">Laporan Diagnosa</h4>
                {{-- @include('components.Admin.button.AddModal') --}}
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
                                @foreach ($penyakit as $teridentifikasi)
                                    @if ($data->id_penyakit == $teridentifikasi->id)
                                        <span>
                                            {{$teridentifikasi->NamaPenyakit}}
                                        </span>                                        
                                    @endif
                                @endforeach
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
    </div>
@endsection
