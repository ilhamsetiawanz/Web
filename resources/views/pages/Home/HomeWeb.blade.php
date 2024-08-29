@extends('layouts.weblayouts')

@section('title', 'Home')

@section('heroJumbotron')
    @include('components.Jumbotron')
@endsection

@section('body')
    <!-- Large Card After Jumbotron -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-6">
        <img src="large-card-image.jpg" alt="Main Article" class="w-full h-64 object-cover">
        <div class="p-6">
            <h2 class="text-2xl font-bold">Long Established</h2>
            <p class="text-gray-600 mt-2">It is a long established fact that a reader will be distracted by the readable content...</p>
            <div class="mt-4 text-gray-500">May 20th 2020</div>
            <a href="#" class="mt-2 inline-block text-blue-500 hover:underline">Read more</a>
        </div>
    </div>

    <!-- Grid with 3 Small Cards and 1 Large Card -->
    <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <img src="article1.jpg" alt="Article" class="w-full h-32 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-bold">Long Established</h3>
                <p class="text-gray-600 mt-2">It is a long established fact that a reader will be distracted...</p>
                <div class="mt-4 text-gray-500">May 20th 2020</div>
                <a href="#" class="mt-2 inline-block text-blue-500 hover:underline">Read more</a>
            </div>
        </div>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <img src="article2.jpg" alt="Article" class="w-full h-32 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-bold">Long Established</h3>
                <p class="text-gray-600 mt-2">It is a long established fact that a reader will be distracted...</p>
                <div class="mt-4 text-gray-500">May 20th 2020</div>
                <a href="#" class="mt-2 inline-block text-blue-500 hover:underline">Read more</a>
            </div>
        </div>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <img src="article3.jpg" alt="Article" class="w-full h-32 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-bold">Long Established</h3>
                <p class="text-gray-600 mt-2">It is a long established fact that a reader will be distracted...</p>
                <div class="mt-4 text-gray-500">May 20th 2020</div>
                <a href="#" class="mt-2 inline-block text-blue-500 hover:underline">Read more</a>
            </div>
        </div>
    </div>

    <!-- Single Large Card Below -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden mt-6">
        <img src="large-article-image.jpg" alt="Large Article" class="w-full h-64 object-cover">
        <div class="p-6">
            <h2 class="text-2xl font-bold">What is Lorem Ipsum?</h2>
            <p class="text-gray-600 mt-2">It is a long established fact that a reader will be distracted by the readable content...</p>
            <div class="mt-4 text-gray-500">May 20th 2020</div>
            <a href="#" class="mt-2 inline-block text-blue-500 hover:underline">Read more</a>
        </div>
    </div>
@endsection