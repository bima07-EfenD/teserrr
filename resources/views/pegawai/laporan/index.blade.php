@extends('layouts.pegawai')

@section('title', 'Daftar Laporan')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-blue-50 to-white py-4 px-4 sm:px-6 lg:px-8">
        <div class="max-w-8xl mx-auto">
            <!-- Header Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
                <div class="relative h-28 bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center px-8">
                    <div class="absolute inset-0 opacity-20">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="h-full w-full">
                            <path fill="#fff" fill-opacity="0.2" d="M25,30 L75,30 L75,70 L25,70 Z" />
                            <path fill="#fff" fill-opacity="0.2" d="M40,15 L60,15 L60,85 L40,85 Z" />
                            <circle cx="50" cy="50" r="20" fill="#fff" fill-opacity="0.3" />
                        </svg>
                    </div>
                    <div class="relative z-10">
                        <h1 class="text-3xl font-bold text-white">
                            @if (request('mitra_id'))
                                Laporan {{ $selectedMitra->nama_lengkap }}
                            @else
                                Daftar Laporan
                            @endif
                        </h1>
                        <p class="text-blue-100 mt-1">
                            @if (request('mitra_id'))
                                Kelola laporan untuk mitra ini
                            @else
                                Pilih mitra untuk melihat atau membuat laporan
                            @endif
                        </p>
                    </div>
                </div>

                <div
                    class="flex items-center justify-between px-8 py-4 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-blue-100">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full flex items-center justify-center bg-blue-100 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <span class="ml-3 text-blue-800 font-medium">
                            @if (request('mitra_id'))
                                Daftar Laporan Mitra
                            @else
                                Pilih Mitra
                            @endif
                        </span>
                    </div>
                    @if (request('mitra_id'))
                        <a href="{{ route('pegawai.laporan.index') }}"
                            class="group flex items-center text-blue-700 hover:text-blue-900 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mr-2 group-hover:-translate-x-1 transition-transform duration-200"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali ke Daftar Mitra
                        </a>
                    @else
                        <a href="{{ route('pegawai.laporan.select-mitra') }}"
                            class="group flex items-center px-6 py-3 rounded-xl text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 font-medium shadow-md transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah Laporan Baru
                        </a>
                    @endif
                </div>
            </div>

            @if (!request('mitra_id'))
                <!-- Pencarian Mitra -->
                <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                    <form id="searchForm" class="flex flex-col md:flex-row gap-4 items-end">
                        <div class="flex-1">
                            <label for="searchInput" class="block text-sm font-medium text-gray-700 mb-1">Cari Mitra</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Cari
                            </button>
                            <button type="button" id="resetButton"
                                class="px-6 py-3 rounded-xl text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 font-medium shadow-sm transition-colors duration-200 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
                <!-- Daftar Mitra -->
                <div id="mitraList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($mitras as $mitra)
                        <a href="{{ route('pegawai.laporan.laporan-mitra', $mitra) }}"
                            class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-200 overflow-hidden">
                            <div class="p-6">
                                <div class="flex items-center mb-4">
                                    <div
                                        class="h-12 w-12 rounded-full bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3
                                            class="text-lg font-semibold text-gray-900 group-hover:text-blue-600 transition-colors duration-200">
                                            {{ $mitra->nama_lengkap }}
                                        </h3>
                                        <p class="text-sm text-gray-500">{{ $mitra->email }}</p>
                                    </div>
                                </div>
                                <div class="space-y-2 text-sm text-gray-600">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span>Kab. {{ $mitra->kabupaten->nama }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                                        </svg>
                                        <span>Luas: {{ $mitra->luas_lahan }} m²</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-full">
                            <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
                                <div class="mx-auto w-24 h-24 text-gray-400 mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada mitra</h3>
                                <p class="text-gray-500">Saat ini belum ada mitra yang terdaftar dalam sistem.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination untuk Mitra -->
                @if($mitras->hasPages())
                <div class="mt-8">
                    {{ $mitras->links() }}
                </div>
                @endif
            @else
                <!-- Filter dan Pencarian -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
                    <div class="p-6">
                        <form id="searchForm" class="flex flex-col md:flex-row gap-4 items-end">
                            <div class="flex-1">
                                <label for="searchInput" class="block text-sm font-medium text-gray-700 mb-1">Cari
                                    Laporan</label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="searchInput" name="search"
                                        value="{{ request('search') }}"
                                        class="block w-full pl-10 px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-200 focus:ring-2 transition"
                                        placeholder="Cari berdasarkan judul atau isi laporan...">
                                </div>
                            </div>

                            <div class="w-full md:w-64">
                                <label for="statusFilter" class="block text-sm font-medium text-gray-700 mb-1">Filter
                                    Status</label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                        </svg>
                                    </div>
                                    <select id="statusFilter" name="status"
                                        class="block w-full pl-10 px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-200 focus:ring-2 transition">
                                        <option value="">Semua Status</option>
                                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft
                                        </option>
                                        <option value="submitted"
                                            {{ request('status') == 'submitted' ? 'selected' : '' }}>Submitted</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <button type="submit"
                                    class="px-6 py-3 rounded-xl text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 font-medium shadow-md transition-all duration-200 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                    Cari
                                </button>
                                <button type="button" id="resetButton"
                                    class="px-6 py-3 rounded-xl text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 font-medium shadow-sm transition-colors duration-200 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                    Reset
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Daftar Laporan -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        No</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Judul</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tanggal</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200" id="laporanList">
                                @include('components.laporan._list', ['laporans' => $laporans, 'start_index' => $laporans->firstItem()])
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="mt-8" id="paginationContainer">
                    {{ $laporans->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchForm = document.getElementById('searchForm');
            const searchInput = document.getElementById('searchInput');
            const laporanList = document.getElementById('laporanList');
            const paginationContainer = document.getElementById('paginationContainer');
            let searchTimeout;

            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                performSearch();
            });

            // Add input event listener for real-time search
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(performSearch, 500);
            });

            function performSearch() {
                const searchTerm = searchInput.value.trim();

                // Show loading state
                laporanList.innerHTML = `
                    <tr>
                        <td colspan="5" class="px-6 py-4">
                            <div class="flex justify-center items-center">
                                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                                <span class="ml-2 text-gray-600">Mencari laporan...</span>
                            </div>
                        </td>
                    </tr>
                `;

                fetch(`{{ route('pegawai.laporan.search') }}?search=${encodeURIComponent(searchTerm)}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    laporanList.innerHTML = data.html;
                    if (data.pagination) {
                        paginationContainer.innerHTML = data.pagination;
                    } else {
                        paginationContainer.innerHTML = '';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    laporanList.innerHTML = `
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                Terjadi kesalahan saat melakukan pencarian
                            </td>
                        </tr>
                    `;
                    paginationContainer.innerHTML = '';
                });
            }
        });
    </script>
@endpush
