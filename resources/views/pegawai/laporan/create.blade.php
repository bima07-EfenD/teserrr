@extends('layouts.pegawai')

@section('title', 'Tambah Laporan Baru')

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
                    <h1 class="text-3xl font-bold text-white">Tulis Laporan Baru</h1>
                    <p class="text-blue-100 mt-1">Mitra: <span class="font-semibold text-white">{{ $selectedMitra->nama_lengkap }}</span></p>
                </div>
            </div>

            <div class="flex items-center justify-between px-8 py-4 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-blue-100">
                <div class="flex items-center">
                    <div class="h-10 w-10 rounded-full flex items-center justify-center bg-blue-100 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <span class="ml-3 text-blue-800 font-medium">Formulir Laporan</span>
                </div>
                <a href="{{ route('pegawai.laporan.create') }}" class="group flex items-center text-blue-700 hover:text-blue-900 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:-translate-x-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Daftar Mitra
                </a>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <form action="{{ route('pegawai.laporan.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                <input type="hidden" name="mitra_id" value="{{ $selectedMitra->id }}">

                <!-- Form Sections -->
                <div class="space-y-10">
                    <!-- Basic Info Section -->
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                            <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-blue-100 text-blue-600 mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            Informasi Dasar
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="col-span-1 md:col-span-2 lg:col-span-1">
                                <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Laporan</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
                                        class="block w-full pl-10 px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-200 focus:ring-2 transition"
                                        placeholder="Masukkan judul laporan..." required>
                                </div>
                                @error('judul')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="tanggal_laporan" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Laporan</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <input type="date" name="tanggal_laporan" id="tanggal_laporan" value="{{ old('tanggal_laporan', date('Y-m-d')) }}"
                                        class="block w-full pl-10 px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-200 focus:ring-2 transition" required>
                                </div>
                                @error('tanggal_laporan')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="metode" class="block text-sm font-medium text-gray-700 mb-1">Metode</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </div>
                                    <select name="metode" id="metode"
                                        class="block w-full pl-10 px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-200 focus:ring-2 transition" required>
                                        <option value="" disabled selected>Pilih metode</option>
                                        <option value="Vegetatif" {{ old('metode') == 'Vegetatif' ? 'selected' : '' }}>Vegetatif</option>
                                        <option value="Generatif" {{ old('metode') == 'Generatif' ? 'selected' : '' }}>Generatif</option>
                                    </select>
                                </div>
                                @error('metode')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div id="template-container" class="hidden">
                                <label for="template" class="block text-sm font-medium text-gray-700 mb-1">Kegiatan</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </div>
                                    <select name="template" id="template"
                                        class="block w-full pl-10 px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-200 focus:ring-2 transition">
                                        <option value="" disabled selected>Pilih kegiatan</option>
                                    </select>
                                </div>
                            </div>

                            <div id="custom-template-container" class="hidden">
                                <label for="kegiatan_lainnya" class="block text-sm font-medium text-gray-700 mb-1">Kegiatan Kustom</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="kegiatan_lainnya" id="kegiatan_lainnya"
                                        class="block w-full pl-10 px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-200 focus:ring-2 transition"
                                        placeholder="Masukkan kegiatan kustom...">
                                </div>
                            </div>

                            <div id="harvest-amount-container" class="hidden">
                                <label for="panen_buah" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Panen (kg)</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                        </svg>
                                    </div>
                                    <input type="number" step="0.01" name="panen_buah" id="panen_buah" value="{{ old('panen_buah') }}"
                                        class="block w-full pl-10 px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-200 focus:ring-2 transition"
                                        placeholder="Masukkan jumlah panen dalam kg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Report Content Section -->
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                            <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-blue-100 text-blue-600 mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </span>
                            Isi Laporan
                        </h2>

                        <div class="bg-gray-50 rounded-xl border border-gray-200 p-4">
                            <textarea id="keterangan" name="keterangan" rows="10" style="resize:vertical; min-height:300px;"
                                class="w-full rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-blue-200 focus:ring-2 transition">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Media Upload Section -->
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                            <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-blue-100 text-blue-600 mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </span>
                            Dokumentasi Media
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Photo Upload -->
                            <div class="bg-gray-50 border-2 border-dashed border-gray-300 rounded-xl p-6 hover:bg-blue-50 hover:border-blue-300 transition-colors duration-200">
                                <div class="text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <div class="mt-4 flex text-sm text-gray-600 justify-center">
                                        <label for="media_foto" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                            <span>Upload foto</span>
                                            <input id="media_foto" name="media_foto" type="file" accept="image/*" class="sr-only">
                                        </label>
                                        <p class="pl-1">atau drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-2">PNG, JPG, GIF hingga 2MB</p>
                                </div>

                                <div id="photo-preview-container" class="mt-4 hidden">
                                    <div class="relative aspect-video bg-gray-100 rounded-lg overflow-hidden">
                                        <img id="photo-preview" src="#" alt="Preview" class="w-full h-full object-cover">
                                        <button type="button" id="remove-photo" class="absolute top-2 right-2 bg-red-100 text-red-600 rounded-full p-1 hover:bg-red-200 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                @error('media_foto')
                                    <p class="mt-1 text-sm text-red-600 text-center">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Video Upload -->
                            <div class="bg-gray-50 border-2 border-dashed border-gray-300 rounded-xl p-6 hover:bg-blue-50 hover:border-blue-300 transition-colors duration-200">
                                <div class="text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                    <div class="mt-4 flex text-sm text-gray-600 justify-center">
                                        <label for="media_video" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                            <span>Upload video</span>
                                            <input id="media_video" name="media_video" type="file" accept="video/*" class="sr-only">
                                        </label>
                                        <p class="pl-1">atau drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-2">MP4, MOV, AVI hingga 10MB</p>
                                </div>

                                <div id="video-preview-container" class="mt-4 hidden">
                                    <div class="relative aspect-video bg-gray-100 rounded-lg overflow-hidden">
                                        <video id="video-preview" src="#" controls class="w-full h-full object-cover"></video>
                                        <button type="button" id="remove-video" class="absolute top-2 right-2 bg-red-100 text-red-600 rounded-full p-1 hover:bg-red-200 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                @error('media_video')
                                    <p class="mt-1 text-sm text-red-600 text-center">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="mt-12 pt-6 border-t border-gray-200 flex items-center justify-end gap-4">
                    <a href="{{ route('pegawai.laporan.create') }}"
                        class="px-6 py-3 rounded-xl text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 font-medium shadow-sm transition-colors duration-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Batal
                    </a>
                    <button type="submit"
                        class="px-8 py-3 rounded-xl text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 font-medium shadow-md transition-all duration-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Laporan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Custom file upload styling */
    .filepond--panel-root {
        background-color: #f9fafb !important;
        border: 2px dashed #e5e7eb !important;
    }

    .filepond--drop-label {
        color: #6b7280 !important;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize CKEditor
        ClassicEditor
            .create(document.querySelector('#keterangan'), {
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'link', 'bulletedList',
                    'numberedList', 'blockQuote', 'undo', 'redo', 'insertTable', 'imageUpload'
                ]
            })
            .then(editor => {
                const editable = editor.ui.view.editable.element;
                editable.style.minHeight = '300px';
                editable.style.overflowY = 'auto';
            })
            .catch(error => {
                console.error(error);
            });

        // Form validation
        const form = document.querySelector('form');
        if (!form) return;

        const fotoInput = document.getElementById('media_foto');
        const videoInput = document.getElementById('media_video');
        const photoPreview = document.getElementById('photo-preview');
        const videoPreview = document.getElementById('video-preview');
        const photoPreviewContainer = document.getElementById('photo-preview-container');
        const videoPreviewContainer = document.getElementById('video-preview-container');
        const removePhotoBtn = document.getElementById('remove-photo');
        const removeVideoBtn = document.getElementById('remove-video');

        // Photo preview functionality
        if (fotoInput) {
            fotoInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        photoPreview.src = e.target.result;
                        photoPreviewContainer.classList.remove('hidden');
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            if (removePhotoBtn) {
                removePhotoBtn.addEventListener('click', function() {
                    fotoInput.value = '';
                    photoPreviewContainer.classList.add('hidden');
                });
            }
        }

        // Video preview functionality
        if (videoInput) {
            videoInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        videoPreview.src = e.target.result;
                        videoPreviewContainer.classList.remove('hidden');
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            if (removeVideoBtn) {
                removeVideoBtn.addEventListener('click', function() {
                    videoInput.value = '';
                    videoPreviewContainer.classList.add('hidden');
                });
            }
        }

        // Form validation
        form.addEventListener('submit', function(e) {
            // Validasi foto
            if (fotoInput && fotoInput.files.length > 0) {
                const foto = fotoInput.files[0];
                const fotoSize = foto.size / 1024 / 1024; // dalam MB
                if (fotoSize > 2) {
                    e.preventDefault();
                    alert('Ukuran foto maksimal 2MB');
                    return;
                }
                if (!foto.type.startsWith('image/')) {
                    e.preventDefault();
                    alert('Format file harus berupa gambar');
                    return;
                }
            }

            // Validasi video
            if (videoInput && videoInput.files.length > 0) {
                const video = videoInput.files[0];
                const videoSize = video.size / 1024 / 1024; // dalam MB
                if (videoSize > 10) {
                    e.preventDefault();
                    alert('Ukuran video maksimal 10MB');
                    return;
                }
                if (!video.type.startsWith('video/')) {
                    e.preventDefault();
                    alert('Format file harus berupa video');
                    return;
                }
            }
        });

        // Drag and drop functionality
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            document.querySelectorAll('.border-dashed').forEach(element => {
                element.addEventListener(eventName, preventDefaults, false);
            });
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        // Highlight drop area when dragging over it
        ['dragenter', 'dragover'].forEach(eventName => {
            document.querySelectorAll('.border-dashed').forEach(element => {
                element.addEventListener(eventName, highlight, false);
            });
        });

        ['dragleave', 'drop'].forEach(eventName => {
            document.querySelectorAll('.border-dashed').forEach(element => {
                element.addEventListener(eventName, unhighlight, false);
            });
        });

        function highlight(e) {
            e.currentTarget.classList.add('bg-blue-50', 'border-blue-300');
        }

        function unhighlight(e) {
            e.currentTarget.classList.remove('bg-blue-50', 'border-blue-300');
        }

        // Handle dropped files
        document.querySelectorAll('.border-dashed').forEach((element, index) => {
            element.addEventListener('drop', function(e) {
                const dt = e.dataTransfer;
                const files = dt.files;

                if (files.length) {
                    if (index === 0 && fotoInput) { // Photo upload area
                        fotoInput.files = files;
                        const event = new Event('change', { bubbles: true });
                        fotoInput.dispatchEvent(event);
                    } else if (index === 1 && videoInput) { // Video upload area
                        videoInput.files = files;
                        const event = new Event('change', { bubbles: true });
                        videoInput.dispatchEvent(event);
                    }
                }
            }, false);
        });

        const metodeSelect = document.getElementById('metode');
        const templateContainer = document.getElementById('template-container');
        const templateSelect = document.getElementById('template');
        const customTemplateContainer = document.getElementById('custom-template-container');
        const kegiatanLainnyaInput = document.getElementById('kegiatan_lainnya');
        const harvestAmountContainer = document.getElementById('harvest-amount-container');
        const panenBuahInput = document.getElementById('panen_buah');
        const judulInput = document.getElementById('judul');

        const vegetatifTemplates = [
            'Pemupukan',
            'Penyiraman',
            'Pemangkasan',
            'Pengendalian Hama',
            'Kegiatan Lainnya'
        ];

        const generatifTemplates = [
            'Panen Buah',
            'Pembibitan',
            'Persiapan Lahan',
            'Kegiatan Lainnya'
        ];

        metodeSelect.addEventListener('change', function() {
            const selectedMethod = this.value;
            templateContainer.classList.remove('hidden');
            customTemplateContainer.classList.add('hidden');
            harvestAmountContainer.classList.add('hidden');

            // Clear and update template options
            templateSelect.innerHTML = '<option value="" disabled selected>Pilih kegiatan</option>';

            const templates = selectedMethod === 'Vegetatif' ? vegetatifTemplates : generatifTemplates;
            templates.forEach(template => {
                const option = document.createElement('option');
                option.value = template;
                option.textContent = template;
                templateSelect.appendChild(option);
            });
        });

        templateSelect.addEventListener('change', function() {
            const selectedTemplate = this.value;

            // Show custom template input if "Kegiatan Lainnya" is selected
            if (selectedTemplate === 'Kegiatan Lainnya') {
                customTemplateContainer.classList.remove('hidden');
                kegiatanLainnyaInput.setAttribute('required', 'required');
            } else {
                customTemplateContainer.classList.add('hidden');
                kegiatanLainnyaInput.removeAttribute('required');
            }

            // Show harvest amount input if "Panen Buah" is selected
            if (selectedTemplate === 'Panen Buah') {
                harvestAmountContainer.classList.remove('hidden');
            } else {
                harvestAmountContainer.classList.add('hidden');
            }
        });
    });
</script>
@endpush
