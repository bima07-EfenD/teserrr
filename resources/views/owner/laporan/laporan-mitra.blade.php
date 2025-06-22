@extends('layouts.owner')

@section('title', 'Laporan Mitra: ' . $mitra->nama_lengkap)

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-blue-50 to-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-8xl mx-auto">
            <!-- Header Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-4">
                <div class="relative h-28 bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center px-4 sm:px-8">
                    <div class="absolute inset-0 opacity-20">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="h-full w-full">
                            <path fill="#fff" fill-opacity="0.2" d="M25,30 L75,30 L75,70 L25,70 Z" />
                            <path fill="#fff" fill-opacity="0.2" d="M40,15 L60,15 L60,85 L40,85 Z" />
                            <circle cx="50" cy="50" r="20" fill="#fff" fill-opacity="0.3" />
                        </svg>
                    </div>
                    <div class="relative z-10">
                        <h1 class="text-2xl sm:text-3xl font-bold text-white mb-1">Laporan Mitra: {{ $mitra->nama_lengkap }}</h1>
                        <div class="text-blue-100 flex flex-wrap items-center gap-x-3 gap-y-1">
                            <span>Email: {{ $mitra->email }}</span>
                            <span class="hidden sm:inline">|</span>
                            <span>Kab: {{ $mitra->kabupaten->nama }}</span>
                            <span class="hidden sm:inline">|</span>
                            <span>Kec: {{ $mitra->kecamatan->nama ?? '-' }}</span>
                            <span class="hidden sm:inline">|</span>
                            <span>Desa: {{ $mitra->desa->nama ?? '-' }}</span>
                        </div>
                    </div>
                </div>

                <div
                    class="flex items-center justify-between px-4 sm:px-8 py-4 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-blue-100">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full flex items-center justify-center bg-blue-100 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <span class="ml-3 text-blue-800 font-medium">Daftar Laporan</span>
                    </div>
                    <a href="{{ route('owner.laporan.index') }}"
                        class="group flex items-center text-blue-700 hover:text-blue-900 transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-2 group-hover:-translate-x-1 transition-transform duration-200" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Daftar Mitra
                    </a>
                </div>
            </div>
            </div>
            <!-- Form Pencarian -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-4">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Cari Laporan
                    </h3>
                    <form id="searchForm" class="space-y-4">
                        <div>
                            <label for="searchInput" class="block text-sm font-medium text-gray-700 mb-2">Kata Kunci</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <input type="text" id="searchInput" name="search" value="{{ request('search') }}"
                                    class="block w-full pl-10 px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-200 focus:ring-2 transition"
                                    placeholder="Cari berdasarkan judul atau isi laporan...">
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-3 pt-2">
                            <button type="submit" class="flex-1 px-6 py-3 rounded-xl text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 font-medium shadow-md transition-all duration-200 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Cari Laporan
                            </button>
                            <button type="reset" id="resetButton"
                                class="flex-1 px-6 py-3 rounded-xl text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 font-medium shadow-sm transition-colors duration-200 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Form Filter -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-4">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z" />
                        </svg>
                        Filter Berdasarkan Periode
                    </h3>
                    <form method="GET" action="" class="space-y-4">
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        <div class="flex flex-col sm:flex-row gap-4">
                            <div class="flex-1">
                                <label for="filterBulan" class="block text-sm font-medium text-gray-700 mb-2">Bulan</label>
                                <select name="bulan" id="filterBulan" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3" onchange="this.form.submit()">
                                    <option value="">Semua Bulan</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}" @if(request('bulan') == $i) selected @endif>{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="flex-1">
                                <label for="filterTahun" class="block text-sm font-medium text-gray-700 mb-2">Tahun</label>
                                <select name="tahun" id="filterTahun" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3" onchange="this.form.submit()">
                                    <option value="">Semua Tahun</option>
                                    @for ($y = now()->year; $y >= now()->year - 5; $y--)
                                        <option value="{{ $y }}" @if(request('tahun') == $y) selected @endif>{{ $y }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('owner.laporan.laporan-mitra', $mitra) }}" class="px-6 py-3 rounded-xl text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 font-medium shadow-sm transition-colors duration-200 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Reset Filter
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Daftar Laporan -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-4">
                <!-- Desktop Table View -->
                <div class="hidden md:block overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Judul</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="laporanList">
                            @include('components.laporan._list', ['laporans' => $laporans, 'start_index' => $laporans->firstItem()])
                        </tbody>
                    </table>
                </div>

                <!-- Mobile Card View -->
                <div class="md:hidden">
                    <div id="laporanListMobile" class="p-4 space-y-4">
                        @forelse($laporans as $laporan)
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                                <div class="flex items-start justify-between mb-3">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $laporan->judul }}</h3>
                                        <p class="text-sm text-gray-600">
                                            @if($laporan->template === 'Kegiatan Lainnya')
                                                {{ $laporan->kegiatan_lainnya }}
                                            @elseif($laporan->template === 'Panen Buah')
                                                Berhasil memanen {{ number_format($laporan->panen_buah ?? 0, 2) }} kg
                                            @else
                                                {{ $laporan->template }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="flex items-center space-x-2 ml-4">
                                        <a href="{{ route('owner.laporan.show', $laporan) }}"
                                            class="p-2 text-blue-600 hover:text-blue-900 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('owner.laporan.edit', $laporan) }}"
                                            class="p-2 text-yellow-600 hover:text-yellow-900 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    @if ($laporan->tanggal_laporan)
                                        {{ $laporan->tanggal_laporan->translatedFormat('l, j F Y') }}
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <h3 class="text-lg font-medium text-gray-900 mb-1">Belum ada laporan</h3>
                                <p class="text-gray-500">Belum ada laporan yang dibuat untuk mitra ini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="mt-8" id="paginationContainer">
                {{ $laporans->links() }}
            </div>
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
            const resetButton = document.getElementById('resetButton');
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

            // Add click event listener for reset button
            resetButton.addEventListener('click', function() {
                searchInput.value = ''; // Clear the search input
                performSearch(); // Perform search to load all data
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

                fetch(`{{ route('owner.laporan.laporan-mitra', $mitra) }}?search=${encodeURIComponent(searchTerm)}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        laporanList.innerHTML = data.html;
                        paginationContainer.innerHTML = data.pagination;
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
