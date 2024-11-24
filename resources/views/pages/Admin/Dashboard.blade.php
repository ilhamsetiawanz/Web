@extends('layouts.dblayouts')

@section('title', 'Dashboard')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Dashboard</h1>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
    <!-- Card 1 -->
    <div class="card h-full bg-white rounded-lg shadow-md p-4">
        <div class="flex items-center gap-4">
            <div class="bg-blue-100 p-3 rounded-full">
                <span class="material-symbols-outlined text-blue">
                    report
                </span> 
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Total Laporan</h3>
                <p class="font-semibold text-xl">{{ $report }}</p>
            </div>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="card h-full bg-white rounded-lg shadow-md p-4">
        <div class="flex items-center gap-4">
            <div class="bg-green-100 p-3 rounded-full">
                <span class="material-symbols-outlined text-green-600">
                    people
                </span> 
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Total Pengguna</h3>
                <p class="font-semibold text-xl">{{ $user }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
