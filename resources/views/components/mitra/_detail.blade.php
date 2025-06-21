@extends('layouts.' . Auth::user()->role)

@section('title', 'Detail Mitra')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-blue-50 to-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
                <div class="relative h-32 bg-gradient-to-r from-blue-600 to-indigo-600">
                    <div class="absolute inset-0 bg-black opacity-10"></div>
                    <div class="relative h-full flex items-center px-8">
                        <div class="flex-1">
                            <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-white mb-2">{{ $mitra->nama_lengkap }}
                            </h1>
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="px-3 py-1 bg-white bg-opacity-20 rounded-full text-white text-xs md:text-sm">
                                    Status: {{ ucfirst($mitra->status) }}
                                </span>
                                <span class="px-3 py-1 bg-white bg-opacity-20 rounded-full text-white text-xs md:text-sm">
                                    ID: {{ $mitra->id }}
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <a href="{{ route(Auth::user()->role . '.mitra.index') }}"
                                class="inline-flex items-center px-4 py-2 bg-white bg-opacity-20 hover:bg-opacity-30 text-white text-sm md:text-base rounded-lg transition duration-200">
                                <svg class="w-5 h-5 mr-2 md:mr-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                <span class="hidden md:inline">Kembali</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column - Main Information -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Profile Information -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-semibold text-gray-900">Informasi Profil</h2>
                            <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Nama Lengkap</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ $mitra->nama_lengkap }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Email</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ $mitra->email }}</p>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Telepon</label>
                                    <div class="mt-1 flex items-center space-x-2">
                                        <p class="text-sm text-gray-900" id="phoneNumber">{{ $mitra->telepon }}</p>

                                        <button id="copyPhoneButton"
                                            class="text-blue-600 hover:text-blue-800 transition-colors duration-200"
                                            title="Salin nomor telepon">
                                            <svg id="iconCopy" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                                            </svg>
                                            <svg id="iconCheck" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Land Information -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-semibold text-gray-900">Informasi Lahan</h2>
                            <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Luas Lahan</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ number_format($mitra->luas_lahan) }}
                                        m<sup>2</sup></p>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Jumlah Pohon Alpukat</label>
                                    <div class="mt-1 flex items-center justify-between">
                                        <p class="text-sm text-gray-900">
                                            {{ number_format($mitra->jumlah_pohon ?? ($mitra->pohon ?? 0)) }} pohon</p>
                                        @if (Auth::user()->role === 'pegawai')
                                            <button type="button" id="editJumlahPohonBtn" data-id="{{ $mitra->id }}"
                                                data-nama="{{ $mitra->nama_lengkap }}"
                                                data-jumlah="{{ $mitra->jumlah_pohon ?? $mitra->pohon }}"
                                                class="text-indigo-600 hover:text-indigo-900 transition-colors duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Address Information -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-semibold text-gray-900">Alamat</h2>
                            <div class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Provinsi</label>
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{ $mitra->provinsi->nama ?? ($mitra->provinsi ?? '-') }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Kabupaten</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ $mitra->kabupaten->nama ?? '-' }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Kecamatan</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ $mitra->kecamatan->nama ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Desa</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ $mitra->desa->nama ?? '-' }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Alamat Detail</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ $mitra->alamat_detail }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Media and Documents -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Media -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <div class="flex items-center justify-between mb-6">
                                <h2 class="text-xl font-semibold text-gray-900">Media Lahan</h2>
                                <div class="h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                            @php
                                $mediaExtension = pathinfo($mitra->media_lahan, PATHINFO_EXTENSION);
                                $isVideo = in_array(strtolower($mediaExtension), ['mp4', 'mov']);
                            @endphp
                            @if ($isVideo)
                                <div class="relative group cursor-pointer"
                                    onclick="openMediaModal('{{ asset('storage/' . $mitra->media_lahan) }}', 'video')">
                                    <video class="w-full rounded-lg shadow video-modal-player">
                                        <source src="{{ asset('storage/' . $mitra->media_lahan) }}"
                                            type="video/{{ $mediaExtension }}">
                                        Browser Anda tidak mendukung pemutaran video.
                                    </video>
                                    <div
                                        class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </div>
                                </div>
                            @else
                                <div class="relative group cursor-pointer"
                                    onclick="openMediaModal('{{ asset('storage/' . $mitra->media_lahan) }}', 'image')">
                                    <img src="{{ asset('storage/' . $mitra->media_lahan) }}" alt="Foto Lahan"
                                        class="w-full rounded-lg shadow object-cover">
                                    <div
                                        class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Documents -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <div class="flex items-center justify-between mb-6">
                                <h2 class="text-xl font-semibold text-gray-900">Dokumen</h2>
                                <div class="h-10 w-10 rounded-full bg-red-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-2">Surat Tanah</label>
                                    @if ($mitra->surat_tanah)
                                        <a href="{{ asset('storage/' . $mitra->surat_tanah) }}" target="_blank"
                                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl shadow-md hover:from-blue-700 hover:to-indigo-700 transition">
                                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586L7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" />
                                            </svg>
                                            Lihat Surat Tanah
                                        </a>
                                    @else
                                        <p class="text-sm text-gray-500">Tidak ada file</p>
                                    @endif
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-2">Kontrak Kemitraan</label>
                                    @if ($mitra->kontrak)
                                        <a href="{{ asset('storage/' . $mitra->kontrak) }}" target="_blank"
                                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl shadow-md hover:from-blue-700 hover:to-indigo-700 transition">
                                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586L7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" />
                                            </svg>
                                            Lihat Kontrak
                                        </a>
                                    @else
                                        <p class="text-sm text-gray-500">Tidak ada file</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Map and Actions -->
                <div class="space-y-6">
                    <!-- Map -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-semibold text-gray-900">Lokasi Lahan</h2>
                            <a href="https://www.google.com/maps?q={{ $mitra->latitude }},{{ $mitra->longitude }}"
                                target="_blank"
                                class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl shadow-md hover:from-blue-700 hover:to-indigo-700 transition">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                                Buka di Google Maps
                            </a>
                        </div>
                        <div class="w-full h-96 rounded-lg shadow overflow-hidden">
                            <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0"
                                marginwidth="0"
                                src="https://maps.google.com/maps?q={{ $mitra->latitude }},{{ $mitra->longitude }}&z=15&output=embed">
                            </iframe>
                        </div>
                    </div>

                    <!-- Actions (Owner Only) -->
                    @if (Auth::user()->role === 'owner')
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <div class="flex items-center justify-between mb-6">
                                <h2 class="text-xl font-semibold text-gray-900">Aksi</h2>
                                <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <button type="button"
                                    onclick="openEditModal({{ $mitra->id }}, '{{ $mitra->nama_lengkap }}', '{{ $mitra->status }}')"
                                    class="w-full flex items-center justify-center px-4 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl shadow-md hover:from-blue-700 hover:to-indigo-700 transition">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Ubah Status
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Jumlah Pohon (Pegawai Only) -->
    @if (Auth::user()->role === 'pegawai')
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
    @endif

    <!-- Modal Edit Status (Owner Only) -->
    @if (Auth::user()->role === 'owner')
        <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Ubah Status Mitra</h3>
                    <form id="editForm" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="space-y-4">
                            <div>
                                <label for="edit_nama_lengkap" class="block text-sm font-medium text-gray-700">Nama
                                    Mitra</label>
                                <input type="text" id="edit_nama_lengkap" readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 bg-gray-50 shadow-sm">
                            </div>
                            <div>
                                <label for="edit_status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" id="edit_status" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="menunggu">Menunggu</option>
                                    <option value="disetujui">Disetujui</option>
                                    <option value="ditolak">Ditolak</option>
                                    <option value="nonaktif">Nonaktif</option>
                                </select>
                            </div>
                            <div id="penolakanFields" class="hidden space-y-4">
                                <div>
                                    <label for="alasan_penolakan" class="block text-sm font-medium text-gray-700">Alasan</label>
                                    <select name="alasan_penolakan" id="alasan_penolakan"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                                        <option value="">-- Pilih Alasan --</option>
                                        <!-- Options for ditolak -->
                                        <optgroup label="Alasan Penolakan" class="penolakan-options hidden">
                                            <option value="Data tidak valid">Data tidak valid</option>
                                            <option value="Dokumen tidak lengkap">Dokumen tidak lengkap</option>
                                            <option value="Tidak memenuhi syarat">Tidak memenuhi syarat</option>
                                        </optgroup>
                                        <!-- Options for nonaktif -->
                                        <optgroup label="Alasan Penonaktifan" class="nonaktif-options hidden">
                                            <option value="Melanggar kontrak">Melanggar kontrak</option>
                                            <option value="Mitra mengundurkan diri">Mitra mengundurkan diri</option>
                                            <option value="Melakukan kesalahan">Melakukan kesalahan</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div>
                                    <label for="deskripsi_penolakan" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                    <textarea name="deskripsi_penolakan" id="deskripsi_penolakan" rows="3"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                                        placeholder="Tuliskan deskripsi..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex justify-end space-x-3">
                            <button type="button" onclick="closeEditModal()"
                                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
                                Batal
                            </button>
                            <button type="submit" id="submitButton"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Loading Overlay -->
        <div id="loadingOverlay" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="flex flex-col items-center justify-center p-4">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mb-4"></div>
                    <p class="text-lg font-medium text-gray-900 mb-2">Mengubah Status Mitra</p>
                    <p class="text-sm text-gray-600 text-center">Mohon tunggu sebentar, sedang mengirim notifikasi email...</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Media Preview Modal -->
    <div id="mediaModal" class="fixed inset-0 bg-black bg-opacity-75 hidden z-50 flex items-center justify-center">
        <div id="modalInnerWrapper" class="relative w-full max-w-4xl mx-4">
            <button type="button" onclick="closeMediaModal()" class="absolute -top-12 right-0 text-white hover:text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div id="mediaContent" class="bg-white rounded-lg overflow-hidden">
                <div id="mediaPreview" class="w-full">
                    <!-- Content will be dynamically inserted here -->
                </div>
                <div class="p-4 bg-white flex justify-between items-center">
                    <button type="button" onclick="closeMediaModal()"
                        class="px-4 py-2 text-gray-700 hover:text-gray-900">
                        Tutup
                    </button>
                    <a id="downloadMediaBtn" href="#" download
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Download
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Mapbox & Wilayah Script --}}
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css"
        type="text/css">
    <style>
        #map {
            width: 100%;
            height: 260px;
            z-index: 10;
            position: relative;
        }

        .mapboxgl-ctrl-top-right,
        .mapboxgl-ctrl-bottom-right,
        .mapboxgl-ctrl-top-left,
        .mapboxgl-ctrl-bottom-left {
            z-index: 1000;
        }

        .mapboxgl-ctrl-group {
            z-index: 10000;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .map-style-btn-container {
            z-index: 20;
        }

        .geocoder {
            position: relative;
            z-index: 1000;
        }

        /* Style for video player in modal to ensure interactivity */
        .video-modal-player {
            position: relative;
            pointer-events: auto; /* Ensure clicks are not blocked */
            touch-action: auto; /* Ensures touch gestures (like seeking) are responsive */
            user-select: auto; /* Prevents text selection from interfering with dragging */
        }
    </style>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js'></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <script>
        function copyPhoneNumber() {
            const phone = document.getElementById('phoneNumber');
            if (!phone) {
                console.error('Elemen dengan ID "phoneNumber" tidak ditemukan.');
                return;
            }
            const phoneNumberText = phone.innerText;
            navigator.clipboard.writeText(phoneNumberText)
                .then(function() {
                    console.log('Nomor telepon berhasil disalin!');
                    const iconCopy = document.getElementById('iconCopy');
                    const iconCheck = document.getElementById('iconCheck');

                    if (iconCopy && iconCheck) {
                        iconCopy.classList.add('hidden');
                        iconCheck.classList.remove('hidden');
                        setTimeout(() => {
                            iconCopy.classList.remove('hidden');
                            iconCheck.classList.add('hidden');
                        }, 5000); // 5 seconds
                    } else {
                        console.warn('Ikon salin/centang tidak ditemukan.');
                    }
                })
                .catch(function(err) {
                    console.error('Gagal menyalin nomor telepon:', err);
                    alert(
                        'Gagal menyalin nomor telepon. Pastikan browser Anda mendukung fitur ini dan izinkan akses clipboard.');
                });
        }
        window.copyPhoneNumber = copyPhoneNumber;

        document.addEventListener('DOMContentLoaded', function() {
            // Script for copy phone number
            const copyPhoneButton = document.getElementById('copyPhoneButton');
            if (copyPhoneButton) {
                copyPhoneButton.addEventListener('click', copyPhoneNumber);
            }

            // Script for Edit Jumlah Pohon Modal (Pegawai Only)
            @if (Auth::user()->role === 'pegawai')
                const editJumlahPohonModal = document.getElementById('editJumlahPohonModal');
                const closeEditJumlahPohonBtn = document.getElementById('closeEditJumlahPohonModal');
                const batalEditJumlahPohonBtn = document.getElementById('batalEditJumlahPohon');
                const formEditJumlahPohon = document.getElementById('formEditJumlahPohon');
                const modalJumlahPohonInput = document.getElementById('modalJumlahPohon');
                const modalMitraNamaSpan = document.getElementById('modalMitraNama');
                const editJumlahPohonButton = document.getElementById('editJumlahPohonBtn');

                if (editJumlahPohonButton) {
                    console.log('Tombol edit jumlah pohon ditemukan.');
                    editJumlahPohonButton.addEventListener('click', function() {
                        const id = this.dataset.id;
                        const nama = this.dataset.nama;
                        const jumlah = this.dataset.jumlah;
                        console.log('Tombol edit jumlah pohon diklik. ID:', id, ', Nama:', nama,
                            ', Jumlah:', jumlah);
                        window.openEditJumlahPohonModal(id, nama, jumlah);
                    });
                } else {
                    console.warn('Tombol edit jumlah pohon TIDAK ditemukan.');
                }

                window.openEditJumlahPohonModal = function(id, nama, jumlah) {
                    console.log('Fungsi openEditJumlahPohonModal dipanggil dengan ID:', id, ', Nama:', nama,
                        ', Jumlah:', jumlah);
                    formEditJumlahPohon.action = `/{{ Auth::user()->role }}/mitra/${id}/update-jumlah-pohon`;
                    modalJumlahPohonInput.value = jumlah;
                    modalMitraNamaSpan.textContent = nama;
                    editJumlahPohonModal.classList.remove('hidden');
                };

                if (closeEditJumlahPohonBtn) {
                    closeEditJumlahPohonBtn.addEventListener('click', () => {
                        editJumlahPohonModal.classList.add('hidden');
                        console.log('Modal edit jumlah pohon ditutup via tombol close.');
                    });
                }
                if (batalEditJumlahPohonBtn) {
                    batalEditJumlahPohonBtn.addEventListener('click', () => {
                        editJumlahPohonModal.classList.add('hidden');
                        console.log('Modal edit jumlah pohon ditutup via tombol batal.');
                    });
                }
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && !editJumlahPohonModal.classList.contains('hidden')) {
                        editJumlahPohonModal.classList.add('hidden');
                        console.log('Modal edit jumlah pohon ditutup via Escape.');
                    }
                });
            @endif

            // Script for Edit Status Modal (Owner Only)
            @if (Auth::user()->role === 'owner')
                const editModal = document.getElementById('editModal');
                const editForm = document.getElementById('editForm');
                const editNamaLengkapInput = document.getElementById('edit_nama_lengkap');
                const editStatusSelect = document.getElementById('edit_status');
                const submitButton = document.getElementById('submitButton');
                const loadingOverlay = document.getElementById('loadingOverlay');

                window.openEditModal = function(id, nama, status) {
                    // Jika status ditolak, tampilkan pesan dan jangan buka modal
                    if (status === 'ditolak') {
                        Swal.fire({
                            icon: 'info',
                            title: 'Status Tidak Dapat Diubah',
                            text: 'Status mitra yang sudah ditolak tidak dapat diubah lagi.',
                            confirmButtonText: 'OK'
                        });
                        return;
                    }

                    editForm.action = `/owner/mitra/${id}`;
                    editNamaLengkapInput.value = nama;
                    editStatusSelect.value = status;

                    // Simpan status asli untuk referensi
                    editStatusSelect.setAttribute('data-original-status', status);

                    // Reset semua opsi ke enabled terlebih dahulu
                    const allOptions = editStatusSelect.querySelectorAll('option');
                    allOptions.forEach(option => {
                        option.disabled = false;
                    });

                    // Logika validasi berdasarkan status saat ini
                    if (status === 'menunggu') {
                        // Menunggu hanya bisa ke disetujui dan ditolak
                        editStatusSelect.querySelector('option[value="nonaktif"]').disabled = true;
                    } else if (status === 'disetujui') {
                        // Disetujui hanya bisa ke nonaktif
                        editStatusSelect.querySelector('option[value="menunggu"]').disabled = true;
                        editStatusSelect.querySelector('option[value="ditolak"]').disabled = true;
                    } else if (status === 'nonaktif') {
                        // Nonaktif hanya bisa ke disetujui
                        editStatusSelect.querySelector('option[value="menunggu"]').disabled = true;
                        editStatusSelect.querySelector('option[value="ditolak"]').disabled = true;
                    }

                    // Toggle penolakan fields based on current status
                    togglePenolakanFields(status);

                    editModal.classList.remove('hidden');
                };

                // Toggle field penolakan jika status = ditolak atau nonaktif
                function togglePenolakanFields(status) {
                    const penolakanFields = document.getElementById('penolakanFields');
                    const penolakanOptions = document.querySelector('.penolakan-options');
                    const nonaktifOptions = document.querySelector('.nonaktif-options');
                    const alasanSelect = document.getElementById('alasan_penolakan');
                    const deskripsiTextarea = document.getElementById('deskripsi_penolakan');

                    if (status === 'ditolak' || status === 'nonaktif') {
                        penolakanFields.classList.remove('hidden');

                        // Reset dan sembunyikan semua optgroup
                        penolakanOptions.classList.add('hidden');
                        nonaktifOptions.classList.add('hidden');

                        // Tampilkan optgroup yang sesuai
                        if (status === 'ditolak') {
                            penolakanOptions.classList.remove('hidden');
                            document.querySelector('label[for="alasan_penolakan"]').textContent = 'Alasan Penolakan';
                            document.querySelector('label[for="deskripsi_penolakan"]').textContent = 'Deskripsi Penolakan';
                            deskripsiTextarea.placeholder = 'Tuliskan deskripsi penolakan...';
                        } else {
                            nonaktifOptions.classList.remove('hidden');
                            document.querySelector('label[for="alasan_penolakan"]').textContent = 'Alasan Penonaktifan';
                            document.querySelector('label[for="deskripsi_penolakan"]').textContent = 'Deskripsi Penonaktifan';
                            deskripsiTextarea.placeholder = 'Tuliskan deskripsi penonaktifan...';
                        }

                        // Reset nilai select dan textarea
                        alasanSelect.value = '';
                        deskripsiTextarea.value = '';
                    } else {
                        penolakanFields.classList.add('hidden');
                        alasanSelect.value = '';
                        deskripsiTextarea.value = '';
                    }
                }

                editStatusSelect.addEventListener('change', function () {
                    const currentStatus = this.value;
                    const originalStatus = this.getAttribute('data-original-status');

                    // Reset semua opsi ke enabled terlebih dahulu
                    const allOptions = this.querySelectorAll('option');
                    allOptions.forEach(option => {
                        option.disabled = false;
                    });

                    // Logika validasi berdasarkan status yang dipilih
                    if (currentStatus === 'menunggu') {
                        // Jika pilih menunggu, disable nonaktif
                        this.querySelector('option[value="nonaktif"]').disabled = true;
                    } else if (currentStatus === 'disetujui') {
                        // Jika pilih disetujui, disable menunggu dan ditolak
                        this.querySelector('option[value="menunggu"]').disabled = true;
                        this.querySelector('option[value="ditolak"]').disabled = true;
                    } else if (currentStatus === 'nonaktif') {
                        // Jika pilih nonaktif, disable menunggu dan ditolak
                        this.querySelector('option[value="menunggu"]').disabled = true;
                        this.querySelector('option[value="ditolak"]').disabled = true;
                    }

                    togglePenolakanFields(currentStatus);
                });

                window.closeEditModal = function() {
                    editModal.classList.add('hidden');
                    submitButton.disabled = false;
                    submitButton.innerHTML = 'Simpan';
                    loadingOverlay.classList.add('hidden');
                };

                editModal.addEventListener('click', function(e) {
                    if (e.target === editModal) {
                        closeEditModal();
                    }
                });

                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && !editModal.classList.contains('hidden')) {
                        closeEditModal();
                    }
                });

                editForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const form = this;
                    const formData = new FormData(form);
                    const status = formData.get('status');

                    // Validasi tambahan untuk status ditolak dan nonaktif
                    if (status === 'ditolak' || status === 'nonaktif') {
                        const alasan = formData.get('alasan_penolakan');
                        const deskripsi = formData.get('deskripsi_penolakan');

                        if (!alasan || !deskripsi.trim()) {
                            const label = status === 'ditolak' ? 'penolakan' : 'penonaktifan';
                            Swal.fire({
                                icon: 'warning',
                                title: 'Validasi Gagal',
                                text: `Alasan dan deskripsi ${label} wajib diisi.`,
                            });
                            return;
                        }
                    }

                    // Disable submit button dan tampilkan loading
                    submitButton.disabled = true;
                    submitButton.innerHTML = `
                        <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Menyimpan...`;
                    loadingOverlay.classList.remove('hidden');

                    fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            closeEditModal();
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Status mitra berhasil diperbarui',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: data.message || 'Terjadi kesalahan saat memperbarui status mitra'
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi kesalahan saat memperbarui status mitra'
                        });
                    })
                    .finally(() => {
                        submitButton.disabled = false;
                        submitButton.innerHTML = 'Simpan';
                        loadingOverlay.classList.add('hidden');
                    });
                });
            @endif
        });

        // Media Modal Functions
        // No global video player instance needed for native player

        function openMediaModal(url, type) {
            const modal = document.getElementById('mediaModal');
            const modalInnerWrapper = document.getElementById('modalInnerWrapper');
            const mediaContent = document.getElementById('mediaContent');
            const preview = document.getElementById('mediaPreview');
            const downloadBtn = document.getElementById('downloadMediaBtn');

            // Set download link
            downloadBtn.href = url;

            // Clear previous content
            preview.innerHTML = '';

            // No disposal needed for native player

            // Ensure inner wrapper and its children are interactive
            if (modalInnerWrapper) {
                modalInnerWrapper.style.zIndex = '100'; // Ensure it's above the backdrop
                modalInnerWrapper.style.pointerEvents = 'auto';
            }
            if (mediaContent) {
                mediaContent.style.pointerEvents = 'auto';
            }

            // Add new content based on type
            if (type === 'video') {
                const video = document.createElement('video');
                // No specific ID needed for native player
                video.className = 'w-full video-modal-player'; // Apply the custom class
                video.style.maxHeight = '70vh'; // Keep max height styling
                video.setAttribute('playsinline', '');
                video.setAttribute('controls', ''); // Ensure native controls are present

                // Removed specific preload and data-setup attributes

                const source = document.createElement('source');
                source.src = url;
                source.type = 'video/' + url.split('.').pop();

                video.appendChild(source);
                preview.appendChild(video);

                // No initialization needed for native player

            } else {
                const img = document.createElement('img');
                img.src = url;
                img.className = 'w-full';
                img.style.maxHeight = '70vh';
                img.style.objectFit = 'contain';
                preview.appendChild(img);
            }

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeMediaModal() {
            const modal = document.getElementById('mediaModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';

            // No disposal needed for native player
        }

        // Close modal when clicking outside
        document.getElementById('mediaModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeMediaModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !document.getElementById('mediaModal').classList.contains('hidden')) {
                closeMediaModal();
            }
        });
    </script>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
    @endpush
@endsection
