@extends('layouts.petani')

@section('title', 'Detail Mitra')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-blue-50 to-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <!-- Header Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
                <div class="relative h-28 bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center px-8">
                    <div class="relative z-10">
                        <h1 class="text-3xl font-bold text-white mb-1">Detail Mitra: {{ $mitra->nama_lengkap }}</h1>
                        <p class="text-blue-100">Status: <span class="font-semibold">{{ ucfirst($mitra->status) }}</span></p>
                    </div>
                </div>
            </div>
            <!-- Tombol Kembali & Status -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
                <a href="{{ route('petani.mitra.index') }}"
                    class="inline-flex items-center px-6 py-3 rounded-xl text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 font-medium shadow-sm transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
                <div
                    class="px-6 py-3 rounded-xl text-sm font-semibold flex items-center
                    @if ($mitra->status == 'disetujui') bg-green-100 text-green-800
                    @elseif($mitra->status == 'ditolak') bg-red-100 text-red-800 =
                    @else bg-yellow-100 text-yellow-800 @endif">
                    <p>Status: {{ ucfirst($mitra->status) }}</p>
                </div>
            </div>
            <!-- Informasi Mitra -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Informasi Pemilik Lahan</h3>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Nama Lengkap</label>
                            <p class="mt-1">{{ $mitra->nama_lengkap }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Email</label>
                            <p class="mt-1">{{ $mitra->email }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Nomor Telepon</label>
                            <p class="mt-1">{{ $mitra->telepon }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Informasi Lahan</h3>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Luas Lahan</label>
                            <p class="mt-1">{{ $mitra->luas_lahan }} m²</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Jumlah Pohon Alpukat</label>
                            <div class="flex items-center justify-between">
                                <p class="mt-1" id="jumlahPohonValue">{{ $mitra->jumlah_pohon }} pohon</p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Alamat</label>
                            <p class="mt-1">
                                {{ $mitra->alamat_detail }},
                                Desa {{ $mitra->desa->nama }},
                                Kec. {{ $mitra->kecamatan->nama }},
                                {{ $mitra->kabupaten->nama }},
                                {{ $mitra->provinsi->nama }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Media dan Dokumen -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <label class="block text-sm font-medium text-gray-600 mb-2">Foto/Video Lahan</label>
                    @php
                        $mediaExtension = pathinfo($mitra->media_lahan, PATHINFO_EXTENSION);
                        $isVideo = in_array(strtolower($mediaExtension), ['mp4', 'mov']);
                    @endphp
                    @if ($isVideo)
                        <video controls class="w-full rounded-lg shadow">
                            <source src="{{ asset('storage/' . $mitra->media_lahan) }}"
                                type="video/{{ $mediaExtension }}">
                            Browser Anda tidak mendukung pemutaran video.
                        </video>
                    @else
                        <img src="{{ asset('storage/' . $mitra->media_lahan) }}" alt="Foto Lahan"
                            class="w-full rounded-lg shadow object-cover">
                    @endif
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">Surat Tanah</label>
                        <a href="{{ asset('storage/' . $mitra->surat_tanah) }}" target="_blank"
                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl shadow-md hover:from-blue-700 hover:to-indigo-700 transition">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586L7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z">
                                </path>
                            </svg>
                            Lihat Surat Tanah
                        </a>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">Kontrak Kemitraan</label>
                        <a href="{{ asset('storage/' . $mitra->kontrak) }}" target="_blank"
                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl shadow-md hover:from-blue-700 hover:to-indigo-700 transition">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586L7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z">
                                </path>
                            </svg>
                            Lihat Kontrak
                        </a>
                    </div>
                </div>
            </div>
            <!-- Peta Lokasi -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Lokasi Lahan</h3>
                    <a href="https://www.google.com/maps?q={{ $mitra->latitude }},{{ $mitra->longitude }}" target="_blank"
                        class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl shadow-md hover:from-blue-700 hover:to-indigo-700 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                        Buka di Google Maps
                    </a>
                </div>
                <div class="w-full h-96 rounded-lg shadow overflow-hidden">
                    <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?q={{ $mitra->latitude }},{{ $mitra->longitude }}&z=15&output=embed">
                    </iframe>
                </div>
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
    <!-- Mapbox Script -->
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // mapboxgl.accessToken =
            //     'pk.eyJ1IjoiZGl2b3RhaHRhIiwiYSI6ImNtYThkcWo1bzBxcDIyaW9hbWpoZnJycXIifQ.e2G1z1pWPNbjv5fMwulRcg';

            // const map = new mapboxgl.Map({
            //     container: 'map',
            //     style: 'mapbox://styles/mapbox/streets-v12',
            //     center: [{{ $mitra->longitude }}, {{ $mitra->latitude }}],
            //     zoom: 15
            // });

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
                    form.action = `/petani/mitra/${id}/update-jumlah-pohon`;
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
@endsection
