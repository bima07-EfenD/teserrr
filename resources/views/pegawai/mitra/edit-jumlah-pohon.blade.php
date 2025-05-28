@extends('layouts.pegawai')

@section('title', 'Edit Jumlah Pohon')
@if (session('success'))
    <div class="mb-4 px-4 py-3 rounded bg-green-100 border border-green-300 text-green-700">
        {{ session('success') }}
    </div>
@endif

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-blue-50 to-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <!-- Header Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
                <div class="relative h-28 bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center px-8">
                    <div class="relative z-10">
                        <h1 class="text-3xl font-bold text-white mb-1">Edit Jumlah Pohon</h1>
                        <p class="text-blue-100">Mitra: {{ $mitra->nama_lengkap }}</p>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <form action="{{ route('pegawai.mitra.update-jumlah-pohon', $mitra) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="jumlah_pohon" class="block text-sm font-medium text-gray-700 mb-2">
                            Jumlah Pohon Alpukat
                        </label>
                        <div class="relative">
                            <input type="number" name="jumlah_pohon" id="jumlah_pohon"
                                value="{{ old('jumlah_pohon', $mitra->jumlah_pohon) }}"
                                class="block w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-200 focus:ring-2 transition"
                                placeholder="Masukkan jumlah pohon">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <span class="text-gray-500">pohon</span>
                            </div>
                        </div>
                        @error('jumlah_pohon')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end space-x-4 pt-4">
                        <a href="{{ route('pegawai.mitra.show', $mitra) }}"
                            class="px-6 py-3 rounded-xl text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 font-medium shadow-sm transition-colors duration-200">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-6 py-3 rounded-xl text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 font-medium shadow-md transition-all duration-200">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
