@extends('layouts.dblayouts')

@section('title', 'Data Aturan')

@section('content')
    <div class="card h-full">
        <div class="card-body">
            <div class="flex justify-between">
                <h4 class="text-gray-600 text-lg font-semibold mb-6">Data Aturan</h4>
                @include('components.Admin.button.AddModal')
            </div>
                @include('components.Admin.Aturan.ModalAdd')
                
            
            <div class="relative overflow-x-auto">
                <!-- table -->
                <table class="text-left w-full whitespace-nowrap text-sm">
                    <thead class="text-gray-700">
                        <tr class="font-semibold text-gray-600">
                            <th scope="col" class="p-1">No</th>
                            <th scope="col" class="p-2">Penyakit</th>
                            <th scope="col" class="p-2">Gejala</th>
                            <th scope="col" class="p-4">Tanggal Dibuat/DiUbah</th>
                            <th scope="col" class="p-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rules as $data)
                        <tr class="overflow-hidden">
                            <td class="p-4 font-semibold text-gray-600 ">{{$loop->iteration}}</td>
                            <td class="p-4">
                                @foreach ($dataPenyakit as $penyakit)
                                    @if ($data->KdPenyakit == $penyakit->id)
                                        <span>{{$penyakit->NamaPenyakit}}</span>
                                    @endif
                                @endforeach
                            </td>
                            <td class="p-4">
                                @foreach ($dataGejala as $gejala)
                                    @if ($data->KdGejala == $gejala->id)
                                        <span>{{$gejala->name}}</span>
                                    @endif
                                @endforeach
                            </td>                           
                            <td class="p-2">
                                <span class="font-semibold text-base text-gray-600">
                                    {{ \Carbon\Carbon::parse($data->updated_at)->format('D M Y') }}
                                </span> 
                            </td>
                            <td class="p-4">
                                <div class="flex gap-2">
                                    @include('components.Admin.button.EditModal', ['data' => $data])
                                    @include('components.Admin.Gejala.DeleteGejala', ['data' => $data])
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="flex justify-between mt-3">
                @if ($rules->onFirstPage())
                    <span class="material-symbols-outlined text-gray-600">
                        arrow_back
                    </span>
                @else
                    <a href="{{ $rules->previousPageUrl() }}">
                        <button>
                            <span class="material-symbols-outlined">
                                arrow_back
                            </span>
                        </button>
                    </a>
                @endif
                @if ($rules->hasMorePages())
                    <a href="{{ $rules->nextPageUrl() }}">
                        <button>
                            <span class="material-symbols-outlined">
                                arrow_forward
                            </span>
                        </button>
                    </a>
                @else
                    <span class="material-symbols-outlined text-gray-600">
                        arrow_forward
                    </span>
                @endif
            </div>									
        </div>
    </div>
@endsection
