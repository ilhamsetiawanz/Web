@extends('layouts.auth')

@section('title', 'Register')

@section('auth')
<div class="flex flex-col w-full overflow-hidden relative min-h-screen radial-gradient items-center justify-center g-0 px-4">
    <div class="justify-center items-center w-full card lg:flex max-w-md">
        <div class="w-full card-body">
            <a href="/" class="py-4 block text-center font-bold text-2xl">TamanSehat</a>
            <p class="mb-4 text-gray-500 text-sm text-center">Diagnosa Penyakit Tanaman Cabai Anda Sekarang</p>
            <!-- form -->
            <form action="{{ route('processRegister') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold mb-2 text-gray-600">Name</label>
                    <input type="text" id="name" name="name" required
                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-semibold mb-2 text-gray-600">Email</label>
                    <input type="email" id="email" name="email" required
                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-semibold mb-2 text-gray-600">Password</label>
                    <input type="password" id="password" name="password" required
                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-semibold mb-2 text-gray-600">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
                </div>
                <div class="flex flex-col justify-between">
                    <div class="grid my-6">
                        <button type="submit" class="btn py-[10px] text-base text-white font-medium hover:bg-blue-700">Register</button>
                    </div>
                    <div class="flex justify-center gap-2 items-center">
                        <p class="text-base font-medium text-gray-500">Already have an account?</p>
                        <a href="{{ route('login') }}" class="text-sm font-medium text-blue-600 hover:text-blue-700">Sign in</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection