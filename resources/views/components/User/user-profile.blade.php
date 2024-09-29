<div class="bg-[#18181B] w-full h-80 flex flex-col justify-center items-center gap-5 p-10">
    <img src="{{ asset('img/userplaceholder.png') }}" alt="profile-icon" class="rounded-full w-40 h-40">
    <h2 class="text-white font-bold text-2xl">
        {{ Auth::user()->name }}
    </h2>
    <div class="text-white text-center">
        <p>Total Diagnosa: <span id="totalDiagnosa">0</span></p>
        <p>Tier: <span id="userTier">Petani Pemula</span></p>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    $.ajax({
        url: "{{ route('history.get') }}",
        method: 'GET',
        success: function(response) {
            if (response.status === 'success') {
                const totalLaporan = response.data.totalLaporan;
                $('#totalDiagnosa').text(totalLaporan);
                
                let tier = 'Petani Pemula';
                if (totalLaporan > 100) {
                    tier = 'Petani Ahli';
                } else if (totalLaporan > 25) {
                    tier = 'Petani Terampil';
                }
                $('#userTier').text(tier);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching user data:', error);
        }
    });
});
</script>