@forelse($mitras as $mitra)
<div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
        <div class="p-6">
        <div class="flex items-center mb-4">
            <div class="h-12 w-12 rounded-full bg-gradient-to-r from-blue-100 to-indigo-100 flex items-center justify-center text-blue-600 font-semibold text-lg">
                {{ strtoupper(substr($mitra->nama_lengkap, 0, 1)) }}
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-900">{{ $mitra->nama_lengkap }}</h3>
                <p class="text-sm text-gray-500">{{ $mitra->email }}</p>
            </div>
        </div>
        <div class="space-y-3">
            <div class="flex items-center text-sm text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                {{ $mitra->telepon }}
                </div>
            <div class="flex items-center text-sm text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                {{ $mitra->kabupaten->nama }}
                </div>
            <div class="flex items-center text-sm text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                {{ $mitra->jumlah_pohon }} Pohon
            </div>
        </div>
        <div class="mt-6">
            <a href="{{ route('pegawai.laporan.create', ['mitra_id' => $mitra->id]) }}"
                class="w-full inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl shadow-md hover:from-blue-700 hover:to-indigo-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Pilih Mitra
            </a>
        </div>
    </div>
</div>
@empty
    <div class="col-span-full">
    <div class="bg-white rounded-2xl shadow-lg p-6 text-center text-gray-500">
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

        fetch(`{{ route('pegawai.laporan.search-mitra-select') }}?search=${encodeURIComponent(searchTerm)}`, {
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
