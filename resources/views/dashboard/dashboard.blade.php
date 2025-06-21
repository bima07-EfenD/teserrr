@extends('layouts.owner')

@section('title', 'Dashboard')

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
                        <h1 class="text-3xl font-bold text-white mb-1">Dashboard Owner</h1>
                        <p class="text-blue-100">Selamat datang di panel admin</p>
                    </div>
                </div>
                <div class="flex items-center justify-between px-8 py-4 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-blue-100">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full flex items-center justify-center bg-blue-100 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <span class="ml-3 text-blue-800 font-medium">Statistik</span>
                    </div>
                    <div class="text-sm text-blue-600">
                        {{ now()->format('l, d F Y') }}
                    </div>
                </div>
            </div>

            <!-- Statistik Utama -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Total Mitra -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Mitra</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ number_format($totalMitra) }}</p>
                        </div>
                        <div class="h-14 w-14 bg-blue-50 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Total mitra yang telah bergabung</p>
                    </div>
                </div>

                <!-- Total Pegawai -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Pegawai</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ number_format($totalPegawai) }}</p>
                        </div>
                        <div class="h-14 w-14 bg-green-50 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Jumlah pegawai aktif</p>
                    </div>
                </div>

                <!-- Total Pohon -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Pohon</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ number_format($totalPohon) }}</p>
                        </div>
                        <div class="h-14 w-14 bg-yellow-50 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Total pohon alpukat Mitra TAS</p>
                    </div>
                </div>

                <!-- Pengajuan Baru -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Pengajuan Baru</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ number_format($pengajuanBaru) }}</p>
                        </div>
                        <div class="h-14 w-14 bg-purple-50 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Menunggu persetujuan</p>
                    </div>
                </div>
            </div>

            <!-- Grafik -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-8">
                <!-- Grafik Pengajuan -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-200">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Statistik Pengajuan</h3>
                        <div class="flex items-center space-x-2">
                            <span class="inline-block w-3 h-3 bg-blue-600 rounded-full"></span>
                            <span class="text-sm text-gray-500">6 Bulan Terakhir</span>
                        </div>
                    </div>
                    <div class="mt-6" style="height: 300px;">
                        <canvas id="pengajuanChart"></canvas>
                    </div>
                </div>

                <!-- Grafik Laporan -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-200">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Statistik Laporan</h3>
                        <div class="flex items-center space-x-2">
                            <span class="inline-block w-3 h-3 bg-indigo-600 rounded-full"></span>
                            <span class="text-sm text-gray-500">6 Bulan Terakhir</span>
                        </div>
                    </div>
                    <div class="mt-6" style="height: 300px;">
                        <canvas id="laporanChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Daftar Terbaru -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-8">
                <!-- Pengajuan Terbaru -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-200">
                    <div class="p-6 border-b border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900">Pengajuan Terbaru</h3>
                    </div>
                    <div class="divide-y divide-gray-100">
                        @forelse($pengajuanTerbaru as $pengajuan)
                            <a href="{{ url('/owner/mitra/' . $pengajuan->id) }}" class="block">
                                <div class="relative p-6 hover:bg-gray-50 transition-colors duration-200">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">
                                                {{ $pengajuan->nama_lengkap ?? '-' }}
                                            </h4>
                                            <p class="text-sm text-gray-500 mt-1">
                                                {{ $pengajuan->kabupaten->nama ?? '-' }}
                                            </p>
                                        </div>
                                        <span class="px-3 py-1 rounded-full text-sm font-medium
                                            @if ($pengajuan->status == 'disetujui') bg-green-100 text-green-800
                                            @elseif($pengajuan->status == 'menunggu') bg-yellow-100 text-yellow-800
                                            @else bg-red-100 text-red-800 @endif">
                                            {{ ucfirst($pengajuan->status) }}
                                        </span>
                                    </div>
                                    <div class="mt-4 flex items-center text-sm text-gray-500">
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ $pengajuan->created_at->format('d M Y') }}
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="p-6 text-center text-gray-500">
                                Belum ada pengajuan baru
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Laporan Terbaru -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-200">
                    <div class="p-6 border-b border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900">Laporan Terbaru</h3>
                    </div>
                    <div class="divide-y divide-gray-100">
                        @forelse($laporanTerbaru as $laporan)
                            <div class="p-6 hover:bg-gray-50 transition-colors duration-200">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">
                                            {{ Str::limit($laporan->judul, 50) }}
                                        </h3>
                                        <p class="text-sm text-gray-500 mt-1">
                                            <span class="font-medium">Mitra:</span> {{ $laporan->mitra->nama_lengkap ?? '-' }}
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            <span class="font-medium">Pegawai:</span> {{ $laporan->pegawai->name ?? '-' }}
                                        </p>
                                    </div>
                                    <a href="{{ url('/owner/laporan/' . $laporan->id) }}" class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium text-indigo-700 bg-indigo-50 hover:bg-indigo-100 transition-colors duration-200">
                                        Detail
                                    </a>
                                </div>
                                <div class="mt-4 flex items-center text-sm text-gray-500">
                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $laporan->created_at->format('d M Y') }}
                                    <span class="mx-2">•</span>
                                    {{ $laporan->created_at->format('H:i') }}
                                </div>
                            </div>
                        @empty
                            <div class="p-6 text-center text-gray-500">
                                Belum ada laporan terbaru
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Chart Pengajuan
            const ctxPengajuan = document.getElementById('pengajuanChart').getContext('2d');
            new Chart(ctxPengajuan, {
                type: 'line',
                data: {
                    labels: @json($chartLabels),
                    datasets: [{
                        label: 'Jumlah Pengajuan',
                        data: @json($chartValues),
                        borderColor: '#2563eb',
                        backgroundColor: 'rgba(37, 99, 235, 0.1)',
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#2563eb',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
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
            });

            // Chart Laporan
            const ctxLaporan = document.getElementById('laporanChart').getContext('2d');
            new Chart(ctxLaporan, {
                type: 'line',
                data: {
                    labels: @json($laporanChartLabels),
                    datasets: [{
                        label: 'Jumlah Laporan',
                        data: @json($laporanChartValues),
                        borderColor: '#4f46e5',
                        backgroundColor: 'rgba(79, 70, 229, 0.1)',
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#4f46e5',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
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
            });
        });
    </script>
    @endpush
@endsection
