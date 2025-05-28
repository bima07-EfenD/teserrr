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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
            <!-- Step Indicator & Progress Bar -->
            <div class="flex items-center justify-between mb-6">
                <button type="button" onclick="showStep1()" id="step1Btn"
                    class="inline-block px-3 py-1 text-sm font-semibold rounded bg-blue-600 text-white cursor-pointer transition">Informasi Lahan</button>
                <div class="w-2/3 mx-4">
                    <div class="w-full bg-blue-100 rounded-full h-2.5">
                        <div id="progressBar" class="bg-gradient-to-r from-blue-600 to-indigo-600 h-2.5 rounded-full transition-all duration-300"
                            style="width: 50%"></div>
                    </div>
                </div>
                <button type="button" onclick="showStep2()" id="step2Btn"
                    class="inline-block px-3 py-1 text-sm font-semibold rounded bg-blue-100 text-blue-600 cursor-pointer transition">Upload Dokumen</button>
            </div>
            <!-- Step 1: Informasi Lahan -->
            <form id="form-step-1" action="{{ route('petani.mitra.store') }}" method="POST" enctype="multipart/form-data">
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
                        <input type="text" name="telepon" required placeholder="Masukkan No.Telepon"
                            class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
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
                                @foreach($provinsis as $provinsi)
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
                        <input type="text" name="alamat_detail" required placeholder="Detail Alamat (RT/RW, patokan, dll)"
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
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Lokasi Saya
                            </button>
                        </div>
                        <div class="rounded-xl overflow-hidden border border-gray-300">
                            <div id="map" class="w-full h-64"></div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-2">
                            <div>
                                <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
                                <input type="text" id="latitude" name="latitude" required readonly
                                    class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                                @error('latitude')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
                                <input type="text" id="longitude" name="longitude" required readonly
                                    class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                                @error('longitude')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div id="step2-content" class="space-y-4" style="display:none;">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Upload Foto/Video Lahan</label>
                        <input type="file" name="media_lahan" accept="image/*, .mp4, .MOV"
                               class="mt-1 block w-full rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                               onchange="validateFileSize(this, 10)">
                        <p class="text-sm text-gray-500 mt-1">Format: JPG, JPEG, PNG. Maksimal 10MB</p>
                        @error('media_lahan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Upload Surat Tanah</label>
                        <input type="file" name="surat_tanah" accept=".pdf"
                               class="mt-1 block w-full rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                               onchange="validateFileSize(this, 10)">
                        <p class="text-sm text-gray-500 mt-1">Format: PDF. Maksimal 10MB</p>
                        @error('surat_tanah')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Baca Kontrak Kemitraan</label>
                        <div class="border rounded-xl bg-gray-50 p-2">
                            <iframe src="{{ asset('storage/template/template.pdf') }}" class="w-full h-48" frameborder="0"></iframe>
                            <div class="flex justify-end mt-2">
                                <a href="{{ asset('storage/template/template.pdf') }}" download
                                    class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-1 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition">Download</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Upload Kontrak Kemitraan (PDF)</label>
                        <input type="file" name="kontrak" accept=".pdf"
                               class="mt-1 block w-full rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                               onchange="validateFileSize(this, 10)">
                        <p class="text-sm text-gray-500 mt-1">Format: PDF. Maksimal 10MB</p>
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
        z-index: 1;
        position: relative;
    }

    .mapboxgl-ctrl-top-right {
        z-index: 1000;
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
        const requiredFields = document.querySelectorAll('#step1-content input[required], #step1-content select[required]');
        let isValid = true;
        requiredFields.forEach(field => {
            if (!field.value) {
                isValid = false;
                field.classList.add('border-red-500');
            } else {
                field.classList.remove('border-red-500');
            }
        });
        if (!isValid) {
            alert('Mohon lengkapi semua data pada Informasi Lahan');
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

    // Inisialisasi tampilan awal
    showStep1();

    // Mapbox & Wilayah (sama seperti owner)
    let map = null;
    let marker = null;
    let defaultLocation = [112.768845, -7.250445];

    function initMap() {
        mapboxgl.accessToken =
            'pk.eyJ1IjoiZGl2b3RhaHRhIiwiYSI6ImNtYThkcWo1bzBxcDIyaW9hbWpoZnJycXIifQ.e2G1z1pWPNbjv5fMwulRcg';
        map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v12',
            center: defaultLocation,
            zoom: 13,
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
            marker = new mapboxgl.Marker({
                    draggable: true,
                    color: '#10B981'
                })
                .setLngLat(defaultLocation)
                .addTo(map);
            marker.on('dragend', () => {
                const position = marker.getLngLat();
                updateCoordinates([position.lat, position.lng]);
            });
            map.on('click', (e) => {
                marker.setLngLat(e.lngLat);
                updateCoordinates([e.lngLat.lat, e.lngLat.lng]);
            });
            geocoder.on('result', (e) => {
                const coordinates = e.result.center;
                marker.setLngLat(coordinates);
                updateCoordinates([coordinates[1], coordinates[0]]);
                map.flyTo({
                    center: coordinates,
                    zoom: 15,
                    essential: true
                });
            });
            updateCoordinates([defaultLocation[1], defaultLocation[0]]);
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

    function validateFileSize(input, maxSize) {
        const file = input.files[0];
        const fileSize = file.size / 1024 / 1024; // konversi ke MB

        if (fileSize > maxSize) {
            alert(`Ukuran file tidak boleh lebih dari ${maxSize}MB`);
            input.value = ''; // Reset input file
        }
    }
</script>
@endsection

@push('scripts')
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Cek jika ada session success
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        }).then(() => {
            window.location.href = '{{ route('petani.mitra.index') }}';
        });
    @endif

    // Cek jika ada error
    @if($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Terjadi kesalahan saat menyimpan data!',
            footer: '<ul class="text-left">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>'
        });
    @endif
</script>
@endpush
