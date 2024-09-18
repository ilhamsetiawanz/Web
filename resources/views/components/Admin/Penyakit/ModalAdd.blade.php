<div id="ModalControl" class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <h3 class="text-center p-5 font-bold">Tambah Data Penyakit</h3>
                <form action="{{ route('add-penyakit') }}" method="POST" enctype="multipart/form-data">
                
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                @csrf
                                <div class="mb-2">
                                    <label for="kode-Penyakit" class="block text-sm font-semibold mb-2 text-gray-600">Kode Penyakit</label>
                                    <input
                                        name="KdPenyakit"
                                        type="text"
                                        id="kode-Penyakit"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                        placeholder="Masukkan kode penyakit"
                                        aria-describedby="kode-penyakit-helper-text"
                                    >
                                </div>
                                <div class="mb-2">
                                    <label for="nama-Penyakit" class="block text-sm font-semibold mb-2 text-gray-600">Nama Penyakit</label>
                                    <input
                                        name="NamaPenyakit"
                                        type="text"
                                        id="nama-Penyakit"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                        placeholder="Masukkan nama penyakit"
                                        aria-describedby="nama-penyakit-helper-text"
                                    >
                                </div>
                                <div class="mb-2">
                                    <label for="nama-Penyakit" class="block text-sm font-semibold mb-2 text-gray-600">Penyebab Penyakit</label>
                                    <input
                                        name="reason"
                                        type="text"
                                        id="penyebab-Penyakit"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                        placeholder="Masukkan penyebab penyakit"
                                        aria-describedby="penyebab-penyakit-helper-text"
                                    >
                                </div>
                                <div class="mb-2">
                                    <label for="solusi-Penyakit" class="block text-sm font-semibold mb-2 text-gray-600">Solusi Penyakit</label>
                                    <input
                                        name="solution"
                                        type="text"
                                        id="solusi-Penyakit"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                        placeholder="Masukkan solusi penyakit"
                                        aria-describedby="solusi-penyakit-helper-text"
                                    >
                                </div>
                                <div>
                                    <label for="gambar-gejala" class="block text-sm font-semibold mt-3 mb-2 text-gray-600">Gambar</label>
                                    <input
                                        accept=".png, .jpg, .jpeg"
                                        name="image"
                                        type="file"
                                        id="gambar-gejala"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
                                        aria-describedby="gambar-gejala-helper-text"
                                    >
                                </div>                                  
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="submit" class="inline-flex w-full justify-center rounded-md px-2 py-1 text-sm font-semibold border border-teal-500 text-teal-500 hover:border-teal-500 hover:text-white hover:bg-teal-500 sm:ml-3 sm:w-auto">Tambah Gejala</button>
                        <button type="button" id="BtnClose" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
