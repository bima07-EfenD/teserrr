@extends('layouts.pegawai')

@section('title', 'Daftar Mitra')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-blue-50 to-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-8xl mx-auto">
            <!-- Header Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-4">
                <div class="relative h-28 bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center px-8">
                    <div class="absolute inset-0 opacity-20">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="h-full w-full">
                            <path fill="#fff" fill-opacity="0.2" d="M25,30 L75,30 L75,70 L25,70 Z" />
                            <path fill="#fff" fill-opacity="0.2" d="M40,15 L60,15 L60,85 L40,85 Z" />
                            <circle cx="50" cy="50" r="20" fill="#fff" fill-opacity="0.3" />
                        </svg>
                    </div>
                    <div class="relative z-10">
                        <h1 class="text-3xl font-bold text-white mb-1">Daftar Mitra</h1>
                        <p class="text-blue-100">Kelola data mitra petani</p>
                    </div>
                </div>
                <div
                    class="flex items-center justify-between px-8 py-4 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-blue-100">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full flex items-center justify-center bg-blue-100 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <span class="ml-3 text-blue-800 font-medium">Data Mitra</span>
                    </div>
                </div>
            </div>

            <!-- Form Pencarian -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-4">
                <div class="p-6">
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
                                <input type="text" id="searchInput" name="search" value="{{ request('search') }}"
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
                            <a href="{{ route('pegawai.mitra.index') }}"
                                class="px-6 py-3 rounded-xl text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 font-medium shadow-sm transition-colors duration-200 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Reset
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Daftar Mitra -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-4">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Luas Lahan</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kabupaten</th>
                                <th
                                    class="px-6 py-4 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Jumlah Pohon</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="mitraList">
                            @foreach ($mitras as $mitra)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <div
                                                    class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-100 to-indigo-100 flex items-center justify-center text-blue-600 font-semibold">
                                                    {{ strtoupper(substr($mitra->nama_lengkap, 0, 1)) }}
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $mitra->nama_lengkap }}
                                                </div>
                                                <div class="text-sm text-gray-500">{{ $mitra->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $mitra->luas_lahan }} m²</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $mitra->kabupaten->nama }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 text-center">{{ $mitra->jumlah_pohon }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-3">
                                            <a href="{{ route('pegawai.mitra.show', $mitra) }}"
                                                class="text-blue-600 hover:text-blue-900 transition-colors duration-200"
                                                title="Lihat Detail">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            <button type="button"
                                                class="text-indigo-600 hover:text-indigo-900 transition-colors duration-200 openEditJumlahPohonModal"
                                                data-id="{{ $mitra->id }}" data-nama="{{ $mitra->nama_lengkap }}"
                                                data-jumlah="{{ $mitra->jumlah_pohon }}" title="Edit Jumlah Pohon">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-8" id="paginationContainer">
                {{ $mitras->links() }}
            </div>
        </div>
    </div>

    <!-- Modal Edit Jumlah Pohon -->
    <div id="editJumlahPohonModal"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50 flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-lg w-full max-w-md p-8 relative">
            <button type="button" id="closeEditJumlahPohonModal"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <h2 class="text-2xl font-bold mb-2 text-blue-700">Edit Jumlah Pohon</h2>
            <p class="mb-4 text-gray-500" id="modalMitraNama"></p>
            <form id="formEditJumlahPohon" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="modalJumlahPohon" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Pohon
                        Alpukat</label>
                    <input type="number" name="jumlah_pohon" id="modalJumlahPohon" min="1" required
                        class="block w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-200 focus:ring-2 transition"
                        placeholder="Masukkan jumlah pohon">
                </div>
                <div class="flex items-center justify-end space-x-4 pt-2">
                    <button type="button" id="batalEditJumlahPohon"
                        class="px-6 py-3 rounded-xl text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 font-medium shadow-sm transition-colors duration-200">Batal</button>
                    <button type="submit"
                        class="px-6 py-3 rounded-xl text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 font-medium shadow-md transition-all duration-200">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const mitraList = document.getElementById('mitraList');
            const paginationContainer = document.getElementById('paginationContainer');
            let searchTimeout;

            function performSearch() {
                const searchTerm = searchInput.value.trim();
                fetch(`{{ route('pegawai.mitra.index') }}?search=${encodeURIComponent(searchTerm)}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        mitraList.innerHTML = data.html;
                        paginationContainer.innerHTML = data.pagination;
                    });
            }

            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(performSearch, 500);
                });
            }

            // Modal Edit Jumlah Pohon
            const modal = document.getElementById('editJumlahPohonModal');
            const openBtns = document.querySelectorAll('.openEditJumlahPohonModal');
            const closeBtn = document.getElementById('closeEditJumlahPohonModal');
            const batalBtn = document.getElementById('batalEditJumlahPohon');
            const form = document.getElementById('formEditJumlahPohon');
            const jumlahInput = document.getElementById('modalJumlahPohon');
            const namaSpan = document.getElementById('modalMitraNama');

            openBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const nama = this.getAttribute('data-nama');
                    const jumlah = this.getAttribute('data-jumlah');
                    form.action = `/pegawai/mitra/${id}/update-jumlah-pohon`;
                    jumlahInput.value = jumlah;
                    namaSpan.textContent = nama;
                    modal.classList.remove('hidden');
                });
            });
            closeBtn.addEventListener('click', () => modal.classList.add('hidden'));
            batalBtn.addEventListener('click', () => modal.classList.add('hidden'));
            // Optional: close modal on ESC
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') modal.classList.add('hidden');
            });
        });
    </script>
@endpush
