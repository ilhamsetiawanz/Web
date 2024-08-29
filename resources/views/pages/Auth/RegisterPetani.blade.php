<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Daftar Sebagai Petani</title>
</head>
<body class="bg-gray-100">
  <div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6 text-center">Registration Form</h1>
    <form method="POST" enctype="multipart/form-data" class="w-full max-w-4xl mx-auto bg-white p-8 rounded-md shadow-md">
      @csrf
      <!-- Data Diri Petani -->
      {{-- <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div>
          <label class="block text-gray-700 text-sm font-bold mb-2" for="NamaPetani">Nama Petani</label>
          <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
            type="text" id="NamaPetani" name="NamaPetani" placeholder="John Doe">
        </div>
        <div>
          <label class="block text-gray-700 text-sm font-bold mb-2" for="AlamatPetani">Alamat Petani</label>
          <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
            type="text" id="AlamatPetani" name="AlamatPetani" placeholder="1234 Main St">
        </div>
        <div>
          <label class="block text-gray-700 text-sm font-bold mb-2" for="NoHpPetani">No HP Petani</label>
          <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
            type="text" id="NoHpPetani" name="NoHpPetani" placeholder="08123456789">
        </div>
        <div>
          <label class="block text-gray-700 text-sm font-bold mb-2" for="image">Foto</label>
          <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
            type="file" id="image" name="image">
        </div>
      </div> --}}

      <!-- Tentang Akun -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div>
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
          <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
            type="text" id="name" name="name" placeholder="John Doe">
        </div>
        <div>
          <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
          <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
            type="email" id="email" name="email" placeholder="john@example.com">
        </div>
        <div>
          <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
          <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
            type="password" id="password" name="password" placeholder="********">
        </div>
        {{-- <div>
          <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm-password">Confirm Password</label>
          <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
            type="password" id="confirm-password" name="confirm-password" placeholder="********">
        </div> --}}
      </div>

      <button
        class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
        type="submit">Register</button>
    </form>
  </div>
</body>
</html>
