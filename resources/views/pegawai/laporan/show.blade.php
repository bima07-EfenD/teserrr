@extends('layouts.pegawai')

@section('title', $laporan->judul)

@section('content')
<div class="bg-gradient-to-br from-indigo-50 via-sky-50 to-white min-h-screen">
    <div class="max-w-7xl mx-auto pt-8 pb-16 px-4 sm:px-6 lg:px-8">
        <!-- Back button -->
        <div class="mb-8">
            <a href="{{ route('pegawai.laporan.index') }}"
               class="group inline-flex items-center px-4 py-2 bg-white shadow-sm hover:bg-indigo-50 text-gray-700 rounded-lg transition-all duration-200 border border-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500 group-hover:-translate-x-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                    Kembali
                </a>
            </div>

        <!-- Main content area -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
            <!-- Header with cover gradient -->
            <div class="relative bg-gradient-to-r from-indigo-600 to-blue-500 h-48 flex items-end">
                <div class="absolute inset-0 opacity-20">
                    <div class="h-full w-full" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIiB2aWV3Qm94PSIwIDAgMTQwIDE0MCI+PHBhdGggZmlsbD0iI2ZmZiIgZD0iTTAgMGgxNDB2MTQwSDB6Ii8+PHBhdGggZD0iTTY5LjkgNDEuOWMuNS0uNSAxLjItLjQgMS43LjFsMTAuNiAxMC42YzIuMSAyIDIuMSA1LjQgMCA3LjVMNzAgNzIuM2wtMTIuMi0xMi4yYy0yLjEtMi4xLTIuMS01LjUgMC03LjVsMTAuNi0xMC42Yy41LS41IDEuMi0uNiAxLjctLjF6bS0yMS0xMi4zYy45LTEgMi0xLjcgMy4zLTIuMSAxLjItLjQgMi42LS40IDMuOS0uMUw2OSAzMC43YzIuMSAuOCAzLjggMi41IDQuNiA0LjZsMy4zIDEyLjhjLjMgMS4zLjMgMi42LS4xIDMuOS0uNCAxLjMtMS4xIDIuNC0yLjEgMy4zbC0zLjEgMy4xYy0yLjEgMi4xLTUuNSAyLjEtNy42IDBsLTEyLjItMTIuMmMtMi4xLTIuMS0yLjEtNS41IDAtNy42bDMuMS0zLjF6IiBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9Ii4yIi8+PC9zdmc+')"></div>
                </div>
                <div class="w-full px-8 py-6">
                    <!-- Status badge -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        @if (isset($laporan->status))
                            <span class="px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider
                                {{ $laporan->status == 'submitted' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                                {{ ucfirst($laporan->status) }}
                            </span>
                        @endif
                        <span class="px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider
                            {{ $laporan->metode == 'Kunjungan Langsung' ? 'bg-indigo-100 text-indigo-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ $laporan->metode }}
                        </span>
                </div>
                    <!-- Report title -->
                    <h1 class="text-3xl md:text-4xl font-bold text-white drop-shadow-sm">{{ $laporan->judul }}</h1>
            </div>
        </div>

            <!-- Report info bar -->
            <div class="bg-gray-50 border-b border-gray-100 px-8 py-4 flex flex-wrap md:flex-nowrap items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                </div>
                        <span class="ml-3 text-gray-700">{{ $laporan->pegawai->name ?? '-' }}</span>
                    </div>

                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="ml-3 text-gray-700">{{ $laporan->tanggal_laporan->format('d F Y') }}</span>
                    </div>

                    @if($laporan->mitra->isUmurPohonSet())
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="ml-3 text-gray-700">Umur: {{ round($laporan->mitra->umur_pohon_sekarang) }} hari</span>
                    </div>
                    @endif
                </div>

                <div class="text-sm text-gray-500">
                    Terakhir diperbarui: {{ $laporan->updated_at->format('d F Y H:i') }}
                </div>
            </div>

            <!-- Main content layout -->
            <div class="lg:col-span-2 order-2 lg:order-1">
                <!-- Detail Laporan -->
                <div class="mb-10">
                    <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Detail Laporan
                    </h2>
                    <div class="prose max-w-none bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                        <div class="text-gray-700 text-lg leading-relaxed">
                            @include('components.laporan._detail', ['laporan' => $laporan])
                        </div>
                    </div>
                </div>

@endsection
