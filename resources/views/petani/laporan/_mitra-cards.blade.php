@forelse($mitras as $mitra)
    <a href="{{ route('petani.laporan.create', ['mitra_id' => $mitra->id]) }}"
        class="block bg-blue-50 rounded-lg shadow hover:shadow-md transition duration-200 border border-blue-300 relative">
        <span class="absolute top-0 right-0 m-2 bg-blue-600 text-white text-xs px-2 py-1 rounded">Pilih Mitra</span>
        <div class="p-6">
            <div class="flex mb-4 flex-col">
                <h3 class="text-lg font-semibold text-blue-900 truncate">
                    <i class="fas fa-user-friends mr-2"></i>{{ $mitra->nama_lengkap }}
                </h3>
                <p class="text-sm text-blue-700 truncate">
                    {{ $mitra->email }}
                </p>
            </div>
            <div class="text-sm text-blue-800">
                <div class="flex items-center mb-2">
                    <i class="fas fa-map-marker-alt text-blue-400 mr-2"></i>
                    <span>Kab. {{ $mitra->kabupaten->nama }}</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-phone text-blue-400 mr-2"></i>
                    <span>{{ $mitra->telepon }}</span>
                </div>
            </div>
        </div>
    </a>
@empty
    <div class="col-span-full">
        <div class="bg-white rounded-lg shadow-lg p-6 text-center text-gray-500">
            Tidak ada mitra yang ditemukan
        </div>
    </div>
@endforelse 

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchMitraInput = document.getElementById('searchMitraInput');
    const mitraList = document.getElementById('mitraList');
    let searchTimeout;

    // Fungsi untuk melakukan pencarian mitra
    function performMitraSearch() {
        const searchTerm = searchMitraInput.value.trim();

        fetch(`{{ route('petani.laporan.search-mitra-select') }}?search=${encodeURIComponent(searchTerm)}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            mitraList.innerHTML = data.html;
        })
        .catch(error => {
            console.error('Error:', error);
            mitraList.innerHTML = `
                <div class="col-span-full">
                    <div class="bg-white rounded-lg shadow-lg p-6 text-center text-red-500">
                        Terjadi kesalahan saat melakukan pencarian
                    </div>
                </div>
            `;
        });
    }

    // Event listener untuk input pencarian mitra
    if (searchMitraInput) {
        searchMitraInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(performMitraSearch, 500);
        });
    }
});
</script>
@endpush 