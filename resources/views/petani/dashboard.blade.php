@extends('layouts.petani')

@section('title', 'Dashboard')

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
                        <h1 class="text-3xl font-bold text-white">Dashboard Petani</h1>
                        <p class="text-blue-100 mt-1">Selamat datang di panel kontrol petani</p>
                    </div>
                </div>

                <div
                    class="flex items-center justify-between px-8 py-4 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-blue-100">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full flex items-center justify-center bg-blue-100 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <span class="ml-3 text-blue-800 font-medium">{{ now()->format('l, d F Y') }}</span>
                    </div>
                </div>
            </div>

            <!-- Statistik Utama -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <!-- Total Pengajuan -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Pengajuan</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ number_format($totalPengajuan) }}</p>
                        </div>
                        <div
                            class="h-14 w-14 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-sm text-gray-500">
                            Semua pengajuan yang pernah dibuat
                        </p>
                    </div>
                </div>

                <!-- Pengajuan Diterima -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Pengajuan Diterima</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ number_format($pengajuanDiterima) }}</p>
                        </div>
                        <div
                            class="h-14 w-14 bg-gradient-to-br from-green-100 to-emerald-100 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center">
                            <p class="text-sm text-gray-500">
                                <span
                                    class="font-medium text-green-600">{{ $pengajuanDiterima > 0 ? round(($pengajuanDiterima / $totalPengajuan) * 100) : 0 }}%</span>
                                tingkat keberhasilan
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Pengajuan Pending -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Pengajuan Pending</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ number_format($pengajuanPending) }}</p>
                        </div>
                        <div
                            class="h-14 w-14 bg-gradient-to-br from-yellow-100 to-amber-100 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-sm text-gray-500">
                            Menunggu verifikasi
                        </p>
                    </div>
                </div>

                <!-- Pengajuan Ditolak -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Pengajuan Ditolak</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ number_format($pengajuanDitolak) }}</p>
                        </div>
                        <div
                            class="h-14 w-14 bg-gradient-to-br from-red-100 to-rose-100 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-sm text-gray-500">
                            Perlu perbaikan data
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Grafik Pengajuan -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Statistik Pengajuan</h3>
                        <div class="flex items-center space-x-2">
                            <span
                                class="inline-block w-3 h-3 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full"></span>
                            <span class="text-sm text-gray-500">Jumlah per Bulan</span>
                        </div>
                    </div>
                    <div class="mt-6" style="height: 300px;">
                        <canvas id="pengajuanChart" class="w-full"></canvas>
                    </div>
                </div>

                <!-- Laporan Terkait -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                    <div class="p-6 border-b border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900">Laporan Terkait</h3>
                    </div>
                    <div class="divide-y divide-gray-100">
                        @forelse($laporanTerbaru as $laporan)
                            <div class="p-6 hover:bg-gray-50 transition-colors duration-200">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">{{ $laporan->judul }}</h4>
                                        <p class="text-sm text-gray-500 mt-1">Oleh: {{ $laporan->pegawai->name }}</p>
                                        <p class="text-sm text-gray-500 mt-1">Mitra: {{ $laporan->mitra->nama_lengkap }}</p>
                                    </div>
                                    <a href="{{ route('petani.laporan.show', $laporan->id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">
                                        Lihat Detail
                                    </a>
                                </div>
                                <div class="mt-4 flex items-center text-sm text-gray-500">
                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $laporan->created_at->format('d M Y') }}
                                </div>
                            </div>
                        @empty
                            <div class="p-6 text-center text-gray-500">
                                Belum ada laporan
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Chart.js CDN -->

    <script>
        // Data untuk grafik
        const ctx = document.getElementById('pengajuanChart').getContext('2d');
        const data = {
            labels: @json($bulan),
            datasets: [{
                label: 'Jumlah Pengajuan',
                data: @json($totalPengajuanPerBulan),
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 2,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#ffffff',
                pointBorderColor: '#3b82f6',
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        };

        // Konfigurasi grafik
        const config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#ffffff',
                        titleColor: '#1f2937',
                        bodyColor: '#1f2937',
                        borderColor: '#e5e7eb',
                        borderWidth: 1,
                        padding: 12,
                        displayColors: false,
                        callbacks: {
                            title: function(context) {
                                return context[0].label;
                            },
                            label: function(context) {
                                return 'Jumlah: ' + context.raw;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            font: {
                                size: 12
                            }
                        },
                        grid: {
                            display: true,
                            color: '#f3f4f6'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        };

        // Membuat grafik
        new Chart(ctx, config);
    </script>
@endpush
