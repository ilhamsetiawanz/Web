<div class="container mx-auto mt-4">
    <div class="border-b border-gray-200 overflow-x-auto">
        <nav class="flex flex-nowrap space-x-4">
            @foreach ($penyakits as $data)
                <button onclick="openTab(event, 'tab-{{ $data->id }}')" class="tab-link px-4 py-2 text-sm font-medium text-gray-500 whitespace-nowrap">{{ $data->NamaPenyakit }}</button>
            @endforeach
        </nav>
    </div>
</div>

<!-- Tab Content -->
<div class="container mx-auto mt-6">
    @foreach ($penyakits as $data)
    <div id="tab-{{ $data->id }}" class="tab-content p-6 bg-white rounded shadow hidden">
        <h2 class="text-2xl font-bold mb-4">Penyebab Penyakit</h2>
        <p class="mb-4">{{ $data->reason }}</p>
        <h3 class="text-xl font-bold mb-2">Solusi Penyakit</h3>
        <div class="pl-6">
            <p>
                {{$data->solution}}
            </p>
        </div>
        <img src="path-to-image.jpg" alt="Tanaman dengan {{ $data->NamaPenyakit }}" class="mt-4 rounded shadow w-1/2">
    </div>
    @endforeach
</div>

<!-- JavaScript untuk Mengontrol Tab -->
<script>
    function openTab(evt, tabName) {
        // Sembunyikan semua konten tab
        var tabContent = document.getElementsByClassName("tab-content");
        for (var i = 0; i < tabContent.length; i++) {
            tabContent[i].style.display = "none";
            tabContent[i].classList.add('hidden');
        }

        // Hapus class aktif dari semua tab link
        var tabLinks = document.getElementsByClassName("tab-link");
        for (var i = 0; i < tabLinks.length; i++) {
            tabLinks[i].classList.remove("border-green-700", "text-green-700");
            tabLinks[i].classList.add("text-gray-500");
        }

        // Tampilkan konten tab yang dipilih dan tambahkan class aktif ke tab link yang diklik
        document.getElementById(tabName).style.display = "block";
        document.getElementById(tabName).classList.remove('hidden');
        evt.currentTarget.classList.add("border-green-700", "text-green-700");
    }

    // Tampilkan tab pertama secara default
    document.addEventListener('DOMContentLoaded', function() {
        const firstTab = document.querySelector('.tab-link');
        if (firstTab) firstTab.click();
    });
</script>
