@extends('layouts.auth')

@section('title', 'Sign In')

@section('auth')
    <div class="flex flex-col w-full  overflow-hidden relative min-h-screen radial-gradient items-center justify-center g-0 px-4">
                        
        <div class="justify-center items-center w-full card lg:flex max-w-md ">
            <div class=" w-full card-body">
                    <a href="/" class="py-4 block text-center font-bold text-2xl">TamanSehat</a>
                    <p class="mb-4 text-gray-500 text-sm text-center">Diagnosa Penyakit Tanaman Cabai Anda Sekarang</p>
                <!-- form -->
                <form action="{{ route('processLogin') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="forUsername"
                        class="block text-sm font-semibold mb-2 text-gray-600">Email</label>
                    <input type="email" id="forUsername" name="email"
                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text">
                    </div>
                    <!-- password -->
                    <div class="mb-6">
                        <label for="forPassword"
                        class="block text-sm font-semibold mb-2 text-gray-600">Password</label>
                    <input type="password" id="forPassword" name="password"
                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text">
                    </div>
                    <div class="flex flex-col justify-between">
                        <!-- button -->
                        <div class="grid my-6">
                            <button type="submit" class="btn py-[10px] text-base text-white font-medium hover:bg-blue-700">Sign In</button>
                        </div>

                        <div class="flex justify-center gap-2 items-center">
                            <p class="text-base font-medium text-gray-500">Belum Memiliki Akun?</p>
                            <a href="{{route ('register')}}" class="text-sm font-medium text-blue-600 hover:text-blue-700">Buat Akun</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

</div>
@endsection