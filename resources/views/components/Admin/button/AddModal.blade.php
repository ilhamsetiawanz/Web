<div>
  <div>
      <button id="BtnModal" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-blue-600 text-blue-600 hover:border-blue-600 hover:text-white hover:bg-blue-600">
          <span class="material-symbols-outlined">
              add
          </span>
      </button>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const modalButton = document.getElementById('BtnModal'); // Button untuk membuka modal
    const modal = document.getElementById('ModalControl'); // Modal yang akan ditampilkan
    const closeButton = document.getElementById('BtnClose'); // Button untuk menutup modal

    // Fungsi untuk membuka modal
    function openModal() {
      modal.classList.remove('hidden');
    }

    // Fungsi untuk menutup modal
    function closeModal() {
      modal.classList.add('hidden');
    }

    // Tambahkan event listener ke button untuk membuka modal
    modalButton.addEventListener('click', openModal);

    // Tambahkan event listener ke button untuk menutup modal
    closeButton.addEventListener('click', closeModal);
  });
</script>
