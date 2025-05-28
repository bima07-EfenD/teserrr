@extends('layouts.petani')

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
                    <a href="{{ route('petani.mitra.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-xl shadow-md transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Ajukan Mitra Baru
                    </a>
                </div>
            </div>

            <!-- Form Pencarian -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-4">
                <div class="p-6">
                    <form id="filterForm" class="flex flex-col md:flex-row gap-4 items-end">
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
                        <div class="w-full md:w-48">
                            <label for="kabupatenFilter"
                                class="block text-sm font-medium text-gray-700 mb-1">Kabupaten</label>
                            <select name="kabupaten" id="kabupatenFilter"
                                class="block w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-200 focus:ring-2 transition">
                                <option value="">Semua Kabupaten</option>
                                @foreach ($kabupatenList as $kabupaten)
                                    <option value="{{ $kabupaten }}" @if (request('kabupaten') == $kabupaten) selected @endif>
                                        {{ $kabupaten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full md:w-48">
                            <label for="statusFilter" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status" id="statusFilter"
                                class="block w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-200 focus:ring-2 transition">
                                <option value="">Semua Status</option>
                                <option value="menunggu" @if (request('status') == 'menunggu') selected @endif>Menunggu</option>
                                <option value="disetujui" @if (request('status') == 'disetujui') selected @endif>Disetujui
                                </option>
                                <option value="ditolak" @if (request('status') == 'ditolak') selected @endif>Ditolak</option>
                            </select>
                        </div>
                        <div class="flex gap-2">
                            <button type="submit"
                                class="w-full md:w-auto bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-2 rounded-xl hover:from-blue-700 hover:to-indigo-700 shadow-md transition-all duration-200 inline-flex items-center justify-center">
                                Cari
                            </button>
                            <button type="reset"
                                class="w-full md:w-auto bg-gray-100 text-gray-700 px-6 py-2 rounded-xl hover:bg-gray-200 inline-flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tabel Data -->
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
                                    Email</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Telepon</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kabupaten</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="mitraTableBody">
                            @forelse($mitras as $index => $mitra)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $mitras->firstItem() + $index }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            {{-- <div class="h-10 w-10 flex-shrink-0">
                                        <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-100 to-indigo-100 flex items-center justify-center text-blue-600 font-semibold">
                                            {{ strtoupper(substr($mitra->nama_lengkap, 0, 1)) }}
                                        </div>
                                    </div> --}}
                                            <div class="text-sm font-medium text-gray-900">{{ $mitra->nama_lengkap }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $mitra->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $mitra->telepon }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $mitra->kabupaten->nama }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if ($mitra->status == 'menunggu') bg-yellow-100 text-yellow-800
                                    @elseif($mitra->status == 'disetujui') bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800 @endif">
                                            {{ ucfirst($mitra->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('petani.mitra.show', $mitra->id) }}"
                                            class="text-blue-600 hover:text-blue-900 transition-colors duration-200 inline-flex items-center">
                                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                        Tidak ada data mitra
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $mitras->links() }}
            </div>
        </div>
    </div>

    @push('scripts')
        <!-- SweetAlert2 CDN -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            // Cek jika ada session success
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000
                });
            @endif

            // Cek jika ada error
            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi kesalahan saat memproses data!',
                    footer: '<ul class="text-left">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>'
                });
            @endif

            document.addEventListener('DOMContentLoaded', function() {
                const filterForm = document.getElementById('filterForm');
                const searchInput = document.getElementById('searchInput');
                const kabupatenFilter = document.getElementById('kabupatenFilter');
                const statusFilter = document.getElementById('statusFilter');
                const mitraTableBody = document.getElementById('mitraTableBody');

                // Function to filter table rows
                function filterTable() {
                    const searchTerm = searchInput.value.toLowerCase();
                    const kabupaten = kabupatenFilter.value.toLowerCase();
                    const status = statusFilter.value.toLowerCase();

                    const rows = mitraTableBody.getElementsByTagName('tr');

                    Array.from(rows).forEach(row => {
                        if (row.cells.length < 2) return; // Skip empty state row

                        const nama = row.cells[1].textContent.toLowerCase();
                        const email = row.cells[2].textContent.toLowerCase();
                        const telepon = row.cells[3].textContent.toLowerCase();
                        const rowKabupaten = row.cells[4].textContent.toLowerCase();
                        const rowStatus = row.cells[5].textContent.toLowerCase();

                        const matchesSearch = nama.includes(searchTerm) ||
                            email.includes(searchTerm) ||
                            telepon.includes(searchTerm);
                        const matchesKabupaten = kabupaten === '' || rowKabupaten.includes(kabupaten);
                        const matchesStatus = status === '' || rowStatus.includes(status);

                        row.style.display = matchesSearch && matchesKabupaten && matchesStatus ? '' : 'none';
                    });
                }

                // Event listeners
                filterForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    filterTable();
                });

                filterForm.addEventListener('reset', function() {
                    setTimeout(() => {
                        Array.from(mitraTableBody.getElementsByTagName('tr')).forEach(row => {
                            row.style.display = '';
                        });
                    }, 0);
                });
            });
        </script>
    @endpush
@endsection
