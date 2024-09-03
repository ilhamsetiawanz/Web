<form method="POST" action="{{ route('delete-gejala', $data->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-red-500 text-red-500 hover:border-red-500 hover:text-white hover:bg-red-500">
        <span class="material-symbols-outlined">
            delete
        </span>
    </button>
</form>
