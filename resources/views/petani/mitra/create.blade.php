@extends('layouts.petani')

@section('title', 'Ajukan Mitra')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-blue-50 to-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
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
                        <h1 class="text-3xl font-bold text-white mb-1">Ajukan Mitra</h1>
                        <p class="text-blue-100">Formulir pengajuan mitra petani</p>
                    </div>
                </div>
            </div>
            <!-- Card Form -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <!-- Tombol Kembali -->
                <div class="mb-6">
                    <a href="{{ url()->previous() }}" class="inline-flex items-center text-gray-600 hover:text-gray-900">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                </div>
                <!-- Step Indicator & Progress Bar -->
                <div class="flex items-center justify-between mb-6">
                    <button type="button" onclick="showStep1()" id="step1Btn"
                        class="inline-block px-3 py-1 text-sm font-semibold rounded bg-blue-600 text-white cursor-pointer transition">Informasi
                        Lahan</button>
                    <div class="w-2/3 mx-4">
                        <div class="w-full bg-blue-100 rounded-full h-2.5">
                            <div id="progressBar"
                                class="bg-gradient-to-r from-blue-600 to-indigo-600 h-2.5 rounded-full transition-all duration-300"
                                style="width: 50%"></div>
                        </div>
                    </div>
                    <button type="button" onclick="showStep2()" id="step2Btn"
                        class="inline-block px-3 py-1 text-sm font-semibold rounded bg-blue-100 text-blue-600 cursor-pointer transition">Upload
                        Dokumen</button>
                </div>
                <!-- Step 1: Informasi Lahan -->
                <form id="form-step-1" action="{{ route('petani.mitra.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div id="step1-content" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Pemilik Lahan</label>
                            <input type="text" name="nama_lengkap" required placeholder="Masukkan Nama Mitra"
                                class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @error('nama_lengkap')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                            <input type="tel" name="telepon" id="telepon" required
                                class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="08123456789"
                                pattern="[0-9]*"
                                inputmode="numeric"
                                maxlength="13"
                                oninput="formatPhoneNumber(this)"
                                onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            <p class="mt-1 text-sm text-gray-500">Contoh: 08123456789</p>
                            @error('telepon')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Luas Lahan (m²)</label>
                            <input type="number" name="luas_lahan" required min="0" step="0.01"
                                class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @error('luas_lahan')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Apakah memiliki pohon alpukat?</label>
                            <select name="punya_alpukat" id="punya_alpukat" required
                                class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="tidak">Tidak</option>
                                <option value="ya">Ya</option>
                            </select>
                        </div>
                        <div id="jumlah_pohon_container" style="display: none;">
                            <label class="block text-sm font-medium text-gray-700">Jumlah Pohon Alpukat</label>
                            <input type="number" name="jumlah_pohon" min="0"
                                class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan jumlah pohon alpukat">
                            @error('jumlah_pohon')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap</label>
                            <div class="grid grid-cols-2 gap-4 mb-2">
                                <select name="provinsi_id" id="provinsi" required
                                    class="block w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinsis as $provinsi)
                                        <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                                    @endforeach
                                </select>
                                @error('provinsi_id')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                <select name="kabupaten_id" id="kabupaten" required
                                    class="block w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    disabled>
                                    <option value="">Pilih Kabupaten</option>
                                </select>
                                @error('kabupaten_id')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="grid grid-cols-2 gap-4 mb-2">
                                <select name="kecamatan_id" id="kecamatan" required
                                    class="block w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    disabled>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                                @error('kecamatan_id')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                <select name="desa_id" id="desa" required
                                    class="block w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    disabled>
                                    <option value="">Pilih Desa</option>
                                </select>
                                @error('desa_id')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <input type="text" name="alamat_detail" required
                                placeholder="Detail Alamat (RT/RW, patokan, dll)"
                                class="block w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @error('alamat_detail')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Lokasi di Peta</label>
                            <div class="mb-2 flex space-x-2">
                                <div id="geocoder" class="geocoder flex-1"></div>
                                <button type="button" id="useCurrentLocation"
                                    class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg class="h-5 w-5 mr-2 md:mr-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="hidden md:inline">Lokasi Saya</span>
                                </button>
                            </div>
                            <div class="rounded-xl overflow-hidden border border-gray-300" style="position: relative;">
                                <div id="map" class="w-full h-64"></div>
                                <div class="absolute bottom-2 left-2 flex space-x-1 bg-white p-1 rounded-md shadow-md"
                                    style="z-index: 99999;">
                                    <button type="button"
                                        class="map-style-btn px-2 py-1 text-xs rounded-sm text-gray-700 bg-gray-200 hover:bg-gray-300"
                                        data-style="streets-v12">Jalan</button>
                                    <button type="button"
                                        class="map-style-btn px-2 py-1 text-xs rounded-sm text-gray-700 hover:bg-gray-300"
                                        data-style="satellite-v9">Satelit</button>
                                    <button type="button"
                                        class="map-style-btn px-2 py-1 text-xs rounded-sm text-gray-700 hover:bg-gray-300"
                                        data-style="satellite-streets-v12">Hybrid</button>
                                </div>
                            </div>
                            <input type="hidden" id="latitude" name="latitude" required>
                            <input type="hidden" id="longitude" name="longitude" required>
                        </div>
                    </div>
                    <div id="step2-content" class="space-y-6" style="display:none;">
                        <div class="bg-gray-50 rounded-xl p-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Upload Foto/Video Lahan</label>
                            <div class="flex items-center justify-center w-full">
                                <label for="media_lahan"
                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-xl cursor-pointer bg-white hover:bg-gray-50">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-2 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk
                                                upload</span> atau drag and drop</p>
                                        <p class="text-xs text-gray-500">JPG, JPEG, PNG, MP4, MOV (Max. 10MB)</p>
                                    </div>
                                    <input id="media_lahan" name="media_lahan" type="file" class="hidden"
                                        accept="image/*, .mp4, .MOV"
                                        onchange="handleFileUpload(this, 'media_lahan_preview', 'media_lahan_name')" />
                                </label>
                            </div>
                            <div id="media_lahan_preview" class="mt-2 hidden">
                                <div class="flex items-center p-2 bg-white rounded-lg border border-gray-200">
                                    <svg class="w-6 h-6 text-gray-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                    <span id="media_lahan_name" class="text-sm text-gray-700 truncate"></span>
                                    <button type="button"
                                        onclick="removeFile('media_lahan', 'media_lahan_preview', 'media_lahan_name')"
                                        class="ml-auto text-red-500 hover:text-red-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <span id="media_lahan_error" class="text-red-500 text-sm mt-1"></span>
                            @error('media_lahan')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Upload Surat Tanah</label>
                            <div class="flex items-center justify-center w-full">
                                <label for="surat_tanah"
                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-xl cursor-pointer bg-white hover:bg-gray-50">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-2 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk
                                                upload</span> atau drag and drop</p>
                                        <p class="text-xs text-gray-500">PDF (Max. 10MB)</p>
                                    </div>
                                    <input id="surat_tanah" name="surat_tanah" type="file" class="hidden"
                                        accept=".pdf"
                                        onchange="handleFileUpload(this, 'surat_tanah_preview', 'surat_tanah_name')" />
                                </label>
                            </div>
                            <div id="surat_tanah_preview" class="mt-2 hidden">
                                <div class="flex items-center p-2 bg-white rounded-lg border border-gray-200">
                                    <svg class="w-6 h-6 text-gray-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                    <span id="surat_tanah_name" class="text-sm text-gray-700 truncate"></span>
                                    <button type="button"
                                        onclick="removeFile('surat_tanah', 'surat_tanah_preview', 'surat_tanah_name')"
                                        class="ml-auto text-red-500 hover:text-red-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <span id="surat_tanah_error" class="text-red-500 text-sm mt-1"></span>
                            @error('surat_tanah')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Baca Kontrak Kemitraan</label>
                            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                                <iframe src="{{ asset('storage/template/template.pdf') }}" class="w-full h-64"
                                    frameborder="0"></iframe>
                            </div>
                            <div class="mt-3 flex justify-center">
                                <a href="{{ asset('storage/template/template.pdf') }}" target="_blank" download
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-xl text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Download Template
                                </a>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Upload Kontrak Kemitraan</label>
                            <div class="flex items-center justify-center w-full">
                                <label for="kontrak"
                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-xl cursor-pointer bg-white hover:bg-gray-50">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-2 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk
                                                upload</span> atau drag and drop</p>
                                        <p class="text-xs text-gray-500">PDF (Max. 10MB)</p>
                                    </div>
                                    <input id="kontrak" name="kontrak" type="file" class="hidden" accept=".pdf"
                                        onchange="handleFileUpload(this, 'kontrak_preview', 'kontrak_name')" />
                                </label>
                            </div>
                            <div id="kontrak_preview" class="mt-2 hidden">
                                <div class="flex items-center p-2 bg-white rounded-lg border border-gray-200">
                                    <svg class="w-6 h-6 text-gray-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                    <span id="kontrak_name" class="text-sm text-gray-700 truncate"></span>
                                    <button type="button"
                                        onclick="removeFile('kontrak', 'kontrak_preview', 'kontrak_name')"
                                        class="ml-auto text-red-500 hover:text-red-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <span id="kontrak_error" class="text-red-500 text-sm mt-1"></span>
                            @error('kontrak')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center justify-between mt-8">
                        <button type="button" onclick="showStep1()" id="backBtn"
                            class="px-6 py-3 rounded-xl text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 font-medium shadow-sm transition-colors duration-200 hidden">Kembali</button>
                        <button type="button" onclick="showStep2()" id="nextBtn"
                            class="px-6 py-3 rounded-xl text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 font-medium shadow-md transition-all duration-200">Selanjutnya</button>
                        <button type="submit" id="submitBtn"
                            class="px-6 py-3 rounded-xl text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 font-medium shadow-md transition-all duration-200 hidden">Ajukan</button>
                    </div>
                </form>
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
    </style>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js'></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <script>
        // Multi Step Logic
        const formStep1 = document.getElementById('form-step-1');
        const step1Content = document.getElementById('step1-content');
        const step2Content = document.getElementById('step2-content');
        const backBtn = document.getElementById('backBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        const step1Btn = document.getElementById('step1Btn');
        const step2Btn = document.getElementById('step2Btn');
        const progressBar = document.getElementById('progressBar');

        function showStep1() {
            step1Content.style.display = 'block';
            step2Content.style.display = 'none';
            step1Btn.classList.remove('bg-blue-100', 'text-blue-600');
            step1Btn.classList.add('bg-blue-600', 'text-white');
            step2Btn.classList.remove('bg-blue-600', 'text-white');
            step2Btn.classList.add('bg-blue-100', 'text-blue-600');
            backBtn.classList.add('hidden');
            nextBtn.classList.remove('hidden');
            submitBtn.classList.add('hidden');
            progressBar.style.width = '50%';
        }

        function showStep2() {
            // Validasi form step 1 sebelum pindah ke step 2
            const requiredFields = document.querySelectorAll(
                '#step1-content input[required], #step1-content select[required]');
            let isValid = true;
            let invalidFields = [];

            requiredFields.forEach(field => {
                if (!field.value) {
                    isValid = false;
                    field.classList.add('border-red-500');
                    invalidFields.push(field.previousElementSibling?.textContent || 'Field');
                } else {
                    field.classList.remove('border-red-500');
                }
            });

            if (!isValid) {
                Swal.fire({
                    icon: 'error',
                    title: 'Data Belum Lengkap',
                    html: `
                    <div class="text-left">
                        <p class="mb-2">Mohon lengkapi data berikut:</p>
                        <ul class="list-disc pl-5">
                            ${invalidFields.map(field => `<li>${field}</li>`).join('')}
                        </ul>
                    </div>
                `,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3B82F6'
                });
                return;
            }

            step1Content.style.display = 'none';
            step2Content.style.display = 'block';
            step1Btn.classList.remove('bg-blue-600', 'text-white');
            step1Btn.classList.add('bg-blue-100', 'text-blue-600');
            step2Btn.classList.remove('bg-blue-100', 'text-blue-600');
            step2Btn.classList.add('bg-blue-600', 'text-white');
            backBtn.classList.remove('hidden');
            nextBtn.classList.add('hidden');
            submitBtn.classList.remove('hidden');
            progressBar.style.width = '100%';
        }

        // Event listener untuk tombol Lanjut dan Kembali
        nextBtn.addEventListener('click', showStep2);
        backBtn.addEventListener('click', showStep1);

        // Form submission handler
        formStep1.addEventListener('submit', function(e) {
            e.preventDefault();

            // Validasi file uploads
            const mediaLahan = document.querySelector('input[name="media_lahan"]');
            const suratTanah = document.querySelector('input[name="surat_tanah"]');
            const kontrak = document.querySelector('input[name="kontrak"]');

            let isValid = true;
            let invalidFields = [];

            if (!mediaLahan.files.length) {
                isValid = false;
                invalidFields.push('Foto/Video Lahan');
                mediaLahan.classList.add('border-red-500');
            } else {
                mediaLahan.classList.remove('border-red-500');
            }

            if (!suratTanah.files.length) {
                isValid = false;
                invalidFields.push('Surat Tanah');
                suratTanah.classList.add('border-red-500');
            } else {
                suratTanah.classList.remove('border-red-500');
            }

            if (!kontrak.files.length) {
                isValid = false;
                invalidFields.push('Kontrak Kemitraan');
                kontrak.classList.add('border-red-500');
            } else {
                kontrak.classList.remove('border-red-500');
            }

            if (!isValid) {
                Swal.fire({
                    icon: 'error',
                    title: 'Dokumen Belum Lengkap',
                    html: `
                    <div class="text-left">
                        <p class="mb-2">Mohon upload dokumen berikut:</p>
                        <ul class="list-disc pl-5">
                            ${invalidFields.map(field => `<li>${field}</li>`).join('')}
                        </ul>
                    </div>
                `,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3B82F6'
                });
                return;
            }

            // Jika semua validasi berhasil, submit form
            this.submit();
        });

        // Inisialisasi tampilan awal
        showStep1();

        // Mapbox & Wilayah (sama seperti owner)
        let map = null;
        let marker = null;
        let defaultLocation = [113.7630, -8.1725];

        function initMap() {
            mapboxgl.accessToken =
                'pk.eyJ1IjoiZGl2b3RhaHRhIiwiYSI6ImNtYThkcWo1bzBxcDIyaW9hbWpoZnJycXIifQ.e2G1z1pWPNbjv5fMwulRcg';
            map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v12',
                center: defaultLocation,
                zoom: 8,
                attributionControl: false
            });
            map.on('load', () => {
                map.addControl(new mapboxgl.NavigationControl(), 'top-right');
                const geocoder = new MapboxGeocoder({
                    accessToken: mapboxgl.accessToken,
                    mapboxgl: mapboxgl,
                    placeholder: 'Cari lokasi...',
                    marker: false,
                    countries: 'id',
                    language: 'id',
                    bbox: [95.0, -11.0, 141.0, 6.0],
                    types: 'place,locality,neighborhood,address',
                    minLength: 3,
                    limit: 5,
                    flyTo: {
                        speed: 1.5
                    }
                });
                const geocoderContainer = document.getElementById('geocoder');
                if (geocoderContainer) {
                    geocoderContainer.appendChild(geocoder.onAdd(map));
                }

                // Create marker but don't add it to map initially
                marker = new mapboxgl.Marker({
                    draggable: true,
                    color: '#10B981'
                });

                map.on('click', (e) => {
                    if (!marker) {
                        marker = new mapboxgl.Marker({
                            draggable: true,
                            color: '#10B981'
                        });
                    }
                    marker.setLngLat(e.lngLat).addTo(map);
                    updateCoordinates([e.lngLat.lat, e.lngLat.lng]);
                });

                marker.on('dragend', () => {
                    const position = marker.getLngLat();
                    updateCoordinates([position.lat, position.lng]);
                });

                geocoder.on('result', (e) => {
                    const coordinates = e.result.center;
                    if (!marker) {
                        marker = new mapboxgl.Marker({
                            draggable: true,
                            color: '#10B981'
                        });
                    }
                    marker.setLngLat(coordinates).addTo(map);
                    updateCoordinates([coordinates[1], coordinates[0]]);
                    map.flyTo({
                        center: coordinates,
                        zoom: 15,
                        essential: true
                    });
                });

                // Custom style switcher logic
                const styleButtons = document.querySelectorAll('.map-style-btn');
                styleButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const styleId = this.dataset.style;
                        map.setStyle('mapbox://styles/mapbox/' + styleId);

                        // Update active button style
                        styleButtons.forEach(btn => btn.classList.remove('bg-gray-200'));
                        this.classList.add('bg-gray-200');
                    });
                });
            });
            const useCurrentLocationBtn = document.getElementById('useCurrentLocation');
            if (useCurrentLocationBtn) {
                useCurrentLocationBtn.addEventListener('click', () => {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            (position) => {
                                const pos = [position.coords.longitude, position.coords.latitude];
                                marker.setLngLat(pos);
                                map.flyTo({
                                    center: pos,
                                    zoom: 15,
                                    essential: true
                                });
                                updateCoordinates([position.coords.latitude, position.coords.longitude]);
                            },
                            (error) => {
                                alert('Tidak dapat mengakses lokasi Anda.');
                            }, {
                                enableHighAccuracy: true,
                                timeout: 5000,
                                maximumAge: 0
                            }
                        );
                    } else {
                        alert('Browser Anda tidak mendukung geolokasi.');
                    }
                });
            }
        }

        function updateCoordinates(latLng) {
            const latitudeInput = document.getElementById('latitude');
            const longitudeInput = document.getElementById('longitude');
            if (latitudeInput && longitudeInput) {
                latitudeInput.value = latLng[0].toFixed(8);
                longitudeInput.value = latLng[1].toFixed(8);
            }
        }
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(initMap, 100);
        });
        // Dropdown wilayah dari database lokal
        const provinsiSelect = document.getElementById('provinsi');
        const kabupatenSelect = document.getElementById('kabupaten');
        const kecamatanSelect = document.getElementById('kecamatan');
        const desaSelect = document.getElementById('desa');

        provinsiSelect.addEventListener('change', function() {
            kabupatenSelect.innerHTML = '<option value="">Pilih Kabupaten</option>';
            kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
            desaSelect.innerHTML = '<option value="">Pilih Desa</option>';
            kabupatenSelect.disabled = true;
            kecamatanSelect.disabled = true;
            desaSelect.disabled = true;
            if (this.value) {
                fetch(`/api/kabupaten/${this.value}`)
                    .then(response => response.json())
                    .then(data => {
                        kabupatenSelect.disabled = false;
                        data.forEach(kab => {
                            const option = document.createElement('option');
                            option.value = kab.id;
                            option.textContent = kab.nama;
                            kabupatenSelect.appendChild(option);
                        });
                    });
            }
        });

        kabupatenSelect.addEventListener('change', function() {
            kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
            desaSelect.innerHTML = '<option value="">Pilih Desa</option>';
            kecamatanSelect.disabled = true;
            desaSelect.disabled = true;
            if (this.value) {
                fetch(`/api/kecamatan/${this.value}`)
                    .then(response => response.json())
                    .then(data => {
                        kecamatanSelect.disabled = false;
                        data.forEach(kec => {
                            const option = document.createElement('option');
                            option.value = kec.id;
                            option.textContent = kec.nama;
                            kecamatanSelect.appendChild(option);
                        });
                    });
            }
        });

        kecamatanSelect.addEventListener('change', function() {
            desaSelect.innerHTML = '<option value="">Pilih Desa</option>';
            desaSelect.disabled = true;
            if (this.value) {
                fetch(`/api/desa/${this.value}`)
                    .then(response => response.json())
                    .then(data => {
                        desaSelect.disabled = false;
                        data.forEach(des => {
                            const option = document.createElement('option');
                            option.value = des.id;
                            option.textContent = des.nama;
                            desaSelect.appendChild(option);
                        });
                    });
            }
        });

        // Toggle form jumlah pohon
        const punyaAlpukatSelect = document.getElementById('punya_alpukat');
        const jumlahPohonContainer = document.getElementById('jumlah_pohon_container');

        punyaAlpukatSelect.addEventListener('change', function() {
            if (this.value === 'ya') {
                jumlahPohonContainer.style.display = 'block';
            } else {
                jumlahPohonContainer.style.display = 'none';
            }
        });

        // File upload handling
        function handleFileUpload(input, previewId, nameId) {
            const file = input.files[0];
            const preview = document.getElementById(previewId);
            const nameElement = document.getElementById(nameId);
            const errorElement = document.getElementById(input.id + '_error');

            if (errorElement) {
                errorElement.textContent = '';
            }

            if (file) {
                const fileSize = file.size / 1024 / 1024; // Convert to MB
                const maxSize = 10; // Max size in MB

                if (fileSize > maxSize) {
                    if (errorElement) {
                        errorElement.textContent = `Ukuran file tidak boleh lebih dari ${maxSize}MB`;
                    }
                    input.value = '';
                    preview.classList.add('hidden');
                    return;
                }

                // Show preview
                preview.classList.remove('hidden');
                nameElement.textContent = file.name;
            } else {
                preview.classList.add('hidden');
            }
        }

        function removeFile(inputId, previewId, nameId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            const nameElement = document.getElementById(nameId);
            const errorElement = document.getElementById(inputId + '_error');

            input.value = '';
            preview.classList.add('hidden');
            nameElement.textContent = '';
            if (errorElement) {
                errorElement.textContent = '';
            }
        }

        // Phone number formatting
        function formatPhoneNumber(input) {
            // Remove any non-numeric characters
            let value = input.value.replace(/\D/g, '');

            // Limit to 13 digits (including country code)
            if (value.length > 13) {
                value = value.slice(0, 13);
            }

            // Update input value
            input.value = value;

            // Validate phone number length
            const phoneInput = document.getElementById('telepon');
            if (value.length < 10 || value.length > 13) {
                phoneInput.setCustomValidity('Nomor telepon harus antara 10-13 digit');
            } else {
                phoneInput.setCustomValidity('');
            }
        }
    </script>
@endsection

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
        {{-- @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Terjadi kesalahan saat memproses data!',
                footer: '<ul class="text-left">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>'
            });
        @endif --}}

        // Validasi ukuran file
        function validateFileSize(input, maxSizeMB, errorElementId) {
            const file = input.files[0];
            const errorElement = document.getElementById(errorElementId);

            if (errorElement) {
                errorElement.textContent = ''; // Clear previous error
            }

            if (file) {
                const fileSize = file.size / 1024 / 1024; // konversi ke MB

                if (fileSize > maxSizeMB) {
                    if (errorElement) {
                        errorElement.textContent = `Ukuran file tidak boleh lebih dari ${maxSizeMB}MB`;
                    }
                    input.value = ''; // Reset input file
                }
            }
        }
    </script>
@endpush
