<div>
  <div>
    <button id="BtnModalEdit{{$data->id}}" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-cyan-500 text-cyan-500 hover:border-cyan-500 hover:text-white hover:bg-cyan-500">
      <span class="material-symbols-outlined">
        edit
      </span>
    </button>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
  // Ambil semua tombol modal
  const modalButtons = document.querySelectorAll('[id^="BtnModalEdit"]');

  modalButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Ambil ID modal yang sesuai
      const modalId = button.id.replace('BtnModalEdit', 'ModalControlEdit');
      const modal = document.getElementById(modalId);

      if (modal) {
        modal.classList.remove('hidden');
      }
    });
  });

  // Ambil semua tombol close modal
  const closeButtons = document.querySelectorAll('[id^="BtnCloseEdit"]');

  closeButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Ambil ID modal yang sesuai
      const modalId = button.id.replace('BtnCloseEdit', 'ModalControlEdit');
      const modal = document.getElementById(modalId);

      if (modal) {
        modal.classList.add('hidden');
      }
    });
  });
});

</script>