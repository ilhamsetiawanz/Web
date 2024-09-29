@extends('layouts.weblayouts')
@section('title', 'Profile')
@section('profile-info')
  @include('components.User.user-profile')    
@endsection
@section('body')
    <div class="mt-5 mb-6">
      <h3 class="text-2xl font-bold">
        Laporan Hasil Diangosa
      </h3>
    </div>
    <div class="bg-white rounded">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table
                    id="reportTable"
                    class="min-w-full text-left text-sm text-black text-surface">
                    <thead
                      class="border-b border-neutral-200 font-medium dark:border-white/10">
                      <tr>
                        <th scope="col" class="px-6 py-4">No</th>
                        <th scope="col" class="px-6 py-4">Tanggal Diagnosa</th>
                        <th scope="col" class="px-6 py-4">Penyakit Teridentifikasi</th>
                        <th scope="col" class="px-6 py-4">Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="reportTableBody">
                      <!-- Data akan diisi dengan jQuery -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/id.min.js"></script>
<script>
$(document).ready(function(){
  moment.locale('id');
  // Membuat AJAX request ke server untuk mendapatkan history user
  $.ajax({
    url: "{{ route('history.get') }}",  // Ubah sesuai dengan route yang benar
    method: 'GET',
    success: function(response){
      if(response.status === 'success'){
        var laporan = response.data.laporan.data;
        var penyakit = response.data.penyakit;
        var tableBody = $('#reportTableBody');
        tableBody.empty(); // Kosongkan isi tabel sebelum menambahkan data baru
        
        laporan.forEach((item, index) => {
          var row = `
            <tr>
              <td class="px-6 py-4">${index + 1}</td>
              <td class="px-6 py-4">${moment(item.created_at).format('dddd, D MMMM YYYY')}</td>
              <td class="px-6 py-4">
                ${penyakit.find(p => p.id === item.id_penyakit)?.NamaPenyakit || 'Tidak diketahui'}
              </td>
              <td class="px-6 py-4">
                <button class="flex items-center border border-blue-500 hover:border-blue-700 text-blue-500 hover:text-blue-700 font-bold py-2 px-4 rounded transition duration-300">
                  <span class="material-symbols-outlined">
                    visibility
                  </span>
                </button>

              </td>
            </tr>
          `;
          tableBody.append(row);
        });

        // Handle pagination if needed
        // You may want to add pagination controls here
      } else {
        alert('Gagal mengambil data history');
      }
    },
    error: function(xhr, status, error){
      console.error(error);
      alert('Terjadi kesalahan saat mengambil data');
    }
  });
});
</script>
@endpush
