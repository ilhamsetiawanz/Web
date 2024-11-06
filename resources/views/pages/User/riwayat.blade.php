@extends('layouts.weblayouts')
@section('title', 'Riwayat')
@section('body')
    <div class="mt-5 mb-6">
      <h3 class="text-2xl font-bold">
        Laporan Hasil Diagnosa
      </h3>
    </div>
    <div class="bg-white rounded">
        <div class="flex justify-end items-center">
            <a href="{{ route('riwayat.downloadPdf') }}">
                <button class="px-4 py-2 mt-4 mr-5 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                    <span class="material-symbols-outlined">
                        download
                    </span>
                </button>
            </a>    
        </div>        
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
                  <!-- Pagination Controls -->
                  <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6 mt-4">
                    <div class="flex flex-1 justify-between sm:hidden">
                      <button id="prevPageMobile" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</button>
                      <button id="nextPageMobile" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</button>
                    </div>
                    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                      <div>
                        <p class="text-sm text-gray-700">
                          Showing <span id="itemsFrom" class="font-medium">1</span> to <span id="itemsTo" class="font-medium">10</span> of
                          <span id="totalItems" class="font-medium">0</span> results
                        </p>
                      </div>
                      <div>
                        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                          <button id="prevPage" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                            </svg>
                          </button>
                          <div id="pageNumbers" class="flex">
                            <!-- Page numbers will be inserted here -->
                          </div>
                          <button id="nextPage" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </nav>
                      </div>
                    </div>
                  </div>
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
  
  let currentPage = 1;
  let totalPages = 1;
  let itemsPerPage = 10;
  
  function loadData(page = 1) {
    $.ajax({
      url: "{{ route('history.get') }}",
      method: 'GET',
      data: {
        page: page,
        per_page: itemsPerPage
      },
      success: function(response){
        if(response.status === 'success'){
          var laporan = response.data.laporan.data;
          var penyakit = response.data.penyakit;
          var tableBody = $('#reportTableBody');
          tableBody.empty();
          
          // Calculate starting index for the current page
          const startIndex = (page - 1) * itemsPerPage;
          
          laporan.forEach((item, index) => {
            var row = `
              <tr>
                <td class="px-6 py-4">${startIndex + index + 1}</td>
                <td class="px-6 py-4">${moment(item.created_at).format('dddd, D MMMM YYYY')}</td>
                <td class="px-6 py-4">
                  ${penyakit.find(p => p.id === item.id_penyakit)?.NamaPenyakit || 'Tidak diketahui'}
                </td>
                <td class="px-6 py-4">
                  <a href="/profile/hasil-diagnosa/details/${item.id}">
                    <button class="flex items-center border border-blue-500 hover:border-blue-700 text-blue-500 hover:text-blue-700 font-bold py-2 px-4 rounded transition duration-300">
                      <span class="material-symbols-outlined">
                        visibility
                      </span>
                    </button>  
                  </a>
                </td>
              </tr>
            `;

            tableBody.append(row);
          });

          // Update pagination info
          totalPages = Math.ceil(response.data.laporan.total / itemsPerPage);
          updatePaginationControls();
          updatePaginationInfo(response.data.laporan);
        } else {
          alert('Gagal mengambil data history');
        }
      },
      error: function(xhr, status, error){
        console.error(error);
        alert('Terjadi kesalahan saat mengambil data');
      }
    });
  }

  function updatePaginationControls() {
    const pageNumbers = $('#pageNumbers');
    pageNumbers.empty();
    
    // Determine range of pages to show
    let startPage = Math.max(1, currentPage - 2);
    let endPage = Math.min(totalPages, currentPage + 2);
    
    // Always show first page
    if (startPage > 1) {
      pageNumbers.append(createPageButton(1));
      if (startPage > 2) {
        pageNumbers.append('<span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>');
      }
    }
    
    // Show page numbers
    for (let i = startPage; i <= endPage; i++) {
      pageNumbers.append(createPageButton(i));
    }
    
    // Always show last page
    if (endPage < totalPages) {
      if (endPage < totalPages - 1) {
        pageNumbers.append('<span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>');
      }
      pageNumbers.append(createPageButton(totalPages));
    }
    
    // Update button states
    $('#prevPage, #prevPageMobile').prop('disabled', currentPage === 1);
    $('#nextPage, #nextPageMobile').prop('disabled', currentPage === totalPages);
  }

  function createPageButton(pageNum) {
    const isActive = pageNum === currentPage;
    return $(`<button class="relative inline-flex items-center px-4 py-2 text-sm font-semibold ${isActive ? 'bg-indigo-600 text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600' : 'text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0'}" ${isActive ? 'aria-current="page"' : ''}>${pageNum}</button>`)
      .on('click', function() {
        if (currentPage !== pageNum) {
          currentPage = pageNum;
          loadData(currentPage);
        }
      });
  }

  function updatePaginationInfo(paginationData) {
    const from = ((currentPage - 1) * itemsPerPage) + 1;
    const to = Math.min(currentPage * itemsPerPage, paginationData.total);
    const total = paginationData.total;
    
    $('#itemsFrom').text(from);
    $('#itemsTo').text(to);
    $('#totalItems').text(total);
  }

  // Event handlers for next/previous buttons
  $('#nextPage, #nextPageMobile').on('click', function() {
    if (currentPage < totalPages) {
      currentPage++;
      loadData(currentPage);
    }
  });

  $('#prevPage, #prevPageMobile').on('click', function() {
    if (currentPage > 1) {
      currentPage--;
      loadData(currentPage);
    }
  });

  // Initial load
  loadData();
});
</script>
@endpush