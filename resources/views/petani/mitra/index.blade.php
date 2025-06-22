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
                        class="inline-flex items-center px-3 py-1 md:px-4 md:py-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-xl shadow-md transition-all duration-200 text-sm md:text-base">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Ajukan Mitra Baru
                    </a>
                </div>
            </div>

            <!-- Filter dan Pencarian -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                <form action="{{ route('petani.mitra.index') }}" method="GET"
                    class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Cari</label>
                        <input type="text" name="search" id="search" value="{{ request('search') }}"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Cari nama atau email...">
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" id="status"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Semua Status</option>
                            <option value="menunggu" {{ request('status') == 'menunggu' ? 'selected' : '' }}>Menunggu
                            </option>
                            <option value="disetujui" {{ request('status') == 'disetujui' ? 'selected' : '' }}>Disetujui
                            </option>
                            <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>
                    <div>
                        <label for="kabupaten" class="block text-sm font-medium text-gray-700 mb-1">Kabupaten</label>
                        <select name="kabupaten" id="kabupaten"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Semua Kabupaten</option>
                            @foreach ($kabupatenList as $kabupaten)
                                <option value="{{ $kabupaten }}"
                                    {{ request('kabupaten') == $kabupaten ? 'selected' : '' }}>
                                    {{ $kabupaten }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button type="submit"
                            class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                            Cari
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabel Mitra -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <!-- Desktop Table View -->
                <div class="hidden md:block overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Luas Lahan
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kabupaten
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal Daftar
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($mitras as $index => $mitra)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $mitras->firstItem() + $index }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex flex-col">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $mitra->nama_lengkap }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $mitra->user->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ number_format($mitra->luas_lahan) }} m²</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $mitra->kabupaten->nama }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                            @if ($mitra->status == 'disetujui') bg-green-100 text-green-800
                                            @elseif($mitra->status == 'menunggu') bg-yellow-100 text-yellow-800
                                            @else bg-red-100 text-red-800 @endif">
                                            {{ ucfirst($mitra->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $mitra->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <div class="flex items-center justify-end space-x-3">
                                            <a href="{{ route('petani.mitra.show', $mitra->id) }}"
                                                class="text-blue-600 hover:text-blue-900">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                        </div>
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

                <!-- Mobile Card View -->
                <div class="md:hidden">
                    <div class="p-4 space-y-4">
                        @forelse($mitras as $index => $mitra)
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                                <div class="flex items-start justify-between mb-3">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $mitra->nama_lengkap }}</h3>
                                        <p class="text-sm text-gray-600">
                                            Petani: {{ $mitra->user->name }}
                                        </p>
                                    </div>
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                        @if ($mitra->status == 'disetujui') bg-green-100 text-green-800
                                        @elseif($mitra->status == 'menunggu') bg-yellow-100 text-yellow-800
                                        @else bg-red-100 text-red-800 @endif">
                                        {{ ucfirst($mitra->status) }}
                                    </span>
                                </div>
                                <div class="space-y-2 text-sm text-gray-700">
                                    <p><span class="font-medium">Luas Lahan:</span> {{ number_format($mitra->luas_lahan) }} m²</p>
                                    <p><span class="font-medium">Kabupaten:</span> {{ $mitra->kabupaten->nama }}</p>
                                    <p><span class="font-medium">Tanggal Daftar:</span> {{ $mitra->created_at->format('d M Y') }}</p>
                                </div>
                                <div class="border-t border-gray-200 mt-4 pt-3 flex items-center justify-end space-x-3">
                                    <a href="{{ route('petani.mitra.show', $mitra->id) }}"
                                        class="p-2 text-blue-600 hover:text-blue-900 transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <p class="text-gray-500">Tidak ada data mitra</p>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                    {{ $mitras->links() }}
                </div>
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
                    confirmButtonText: 'OK'
                });
            @endif

            // Cek jika ada session error
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '{{ session('error') }}',
                    confirmButtonText: 'OK'
                });
            @endif
        </script>
    @endpush
@endsection
