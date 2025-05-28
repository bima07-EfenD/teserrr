@extends('layouts.petani')

@section('title', 'Pilih Mitra')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-blue-50 to-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Card -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
            <div class="relative h-28 bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center px-8">
                <div class="relative z-10">
                    <h1 class="text-3xl font-bold text-white mb-1">Pilih Mitra</h1>
                    <p class="text-blue-100">Pilih mitra untuk membuat laporan baru</p>
                </div>
            </div>
        </div>

        <!-- Form Pencarian -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
            <form id="searchForm" class="flex flex-col md:flex-row gap-4 items-end">
                <div class="flex-1">
                    <label for="searchInput" class="block text-sm font-medium text-gray-700 mb-1">Cari Mitra</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" id="searchInput" name="search"
                            class="block w-full pl-10 px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-200 focus:ring-2 transition"
                            placeholder="Cari berdasarkan nama, email, atau kabupaten...">
                    </div>
                </div>
                <div class="flex gap-2">
                    <button type="submit"
                        class="px-6 py-3 rounded-xl text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 font-medium shadow-md transition-all duration-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Cari
                    </button>
                    <a href="{{ route('petani.laporan.select-mitra') }}"
                        class="px-6 py-3 rounded-xl text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 font-medium shadow-sm transition-colors duration-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- Daftar Mitra -->
        <div id="mitraList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($mitras as $mitra)
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
                        <a href="{{ route('petani.laporan.create', ['mitra_id' => $mitra->id]) }}"
                            class="w-full inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl shadow-md hover:from-blue-700 hover:to-indigo-700 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Pilih Mitra
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8" id="paginationContainer">
            @if($mitras instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $mitras->links() }}
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('searchForm');
    const searchInput = document.getElementById('searchInput');
    const mitraList = document.getElementById('mitraList');
    const paginationContainer = document.getElementById('paginationContainer');

    searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        performSearch();
    });

    function performSearch() {
        const searchTerm = searchInput.value.trim();
        fetch(`{{ route('petani.laporan.search-mitra-select') }}?search=${encodeURIComponent(searchTerm)}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            mitraList.innerHTML = data.html;
            if (data.pagination) {
                paginationContainer.innerHTML = data.pagination;
            } else {
                paginationContainer.innerHTML = '';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            mitraList.innerHTML = `
                <div class=\"col-span-full\">\n                    <div class=\"bg-white rounded-2xl shadow-lg p-6 text-center text-gray-500\">\n                        Terjadi kesalahan saat melakukan pencarian\n                    </div>\n                </div>\n            `;
            paginationContainer.innerHTML = '';
        });
    }
});
</script>
@endpush
