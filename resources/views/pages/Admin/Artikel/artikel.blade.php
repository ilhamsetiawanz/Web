@extends('layouts.dblayouts')

@section('title', 'Data Gejala')

@section('content')
    <div class="card h-full">
        <div class="card-body">
            <div class="flex justify-between">
                <h4 class="text-gray-600 text-lg font-semibold mb-6">Artikel Rilisan</h4>
                {{-- @include('components.Admin.button.AddModal') --}}
            </div>
            
            <div class="relative overflow-x-auto">
                <!-- table -->
                <table class="text-left w-full whitespace-nowrap text-sm">
                    <thead class="text-gray-700">
                        <tr class="font-semibold text-gray-600">
                            <th scope="col" class="p-1">No</th>
                            <th scope="col" class="p-2">Judul</th>
                            <th scope="col" class="p-4">Gambar</th>
                            <th scope="col" class="p-4">Tanggal Dibuat/DiUbah</th>
                            {{-- <th scope="col" class="p-4">Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($artikel as $data)
                        <tr class="overflow-hidden">
                            <td class="p-4 font-semibold text-gray-600 ">{{$loop->iteration}}</td>
                            <td class="p-2 w-10">{{$data->judul}}</td>
                            <td class="p-4">
                                <img class="w-40" src="{{$data->image}}"alt="{{$data->name}}">
                            </td>
                            <td class="p-4">
                                <span class="font-semibold text-base text-gray-600">
                                    {{ \Carbon\Carbon::parse($data->Tanggal_Post)->format('D M Y') }}
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
