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
                <!-- Grafik Panen Buah -->
                <div x-data="{ openModal: false, selectedMitraId: null, selectedMitraName: '' }" class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                    <div class="p-6 border-b border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900">Grafik Panen Buah</h3>
                    </div>
                    <div class="divide-y divide-gray-100">
                        @if($approvedMitras->count() > 0)
                            @foreach($approvedMitras as $mitra)
                                <div class="flex items-center justify-between p-6 hover:bg-gray-50 transition-colors duration-200">
                                    <div>
                                        <div class="text-base font-semibold text-gray-900">{{ $mitra->nama_lengkap }}</div>
                                        <div class="text-sm text-gray-500 mt-1">{{ $mitra->kabupaten->nama }}</div>
                                    </div>
                                    <button
                                        @click="
                                            openModal = true;
                                            selectedMitraId = {{ $mitra->id }};
                                            selectedMitraName = '{{ addslashes($mitra->nama_lengkap) }}';
                                            $nextTick(() => { loadPanenChart({{ $mitra->id }}); });
                                        "
                                        class="inline-flex items-center px-4 py-2 border border-blue-600 rounded-lg text-sm font-medium text-blue-600 bg-white hover:bg-blue-600 hover:text-white transition-colors duration-200"
                                        type="button"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                        Lihat Grafik Panen
                                    </button>
                                </div>
                            @endforeach
                            <div class="px-6 py-4">{{ $approvedMitras->links() }}</div>
                        @else
                            <div class="p-6 text-center text-gray-500">
                                Anda belum memiliki kemitraan yang disetujui. Silakan ajukan kemitraan terlebih dahulu.
                            </div>
                        @endif
                    </div>

                    <!-- Modal Grafik Panen -->
                    <div
                        x-show="openModal"
                        style="display: none;"
                        class="fixed inset-0 z-50 overflow-y-auto"
                        aria-labelledby="modal-title"
                        role="dialog"
                        aria-modal="true"
                    >
                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div
                                x-show="openModal"
                                x-transition:enter="ease-out duration-300"
                                x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="ease-in duration-200"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                aria-hidden="true"
                            ></div>
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                            <div
                                x-show="openModal"
                                x-transition:enter="ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave="ease-in duration-200"
                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full"
                            >
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                Grafik Panen Buah
                                            </h3>
                                            <div class="mt-1 text-base font-semibold text-blue-700" x-text="selectedMitraName"></div>
                                            <div class="mt-4 flex justify-end">
                                                <span id="avgBeratRataRata" class="text-sm font-semibold text-green-700"></span>
                                            </div>
                                            <div class="mt-4">
                                                <div class="h-96">
                                                    <canvas id="panenChart"></canvas>
                                                    <div id="noPanenDataMsg" class="flex items-center justify-center h-96 text-gray-500 text-lg" style="display:none"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <button type="button" @click="openModal = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                        Tutup
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Grafik Panen -->
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
                                    <a href="{{ route('petani.laporan.show', $laporan->id) }}" class="inline-flex items-center px-4 py-2 border border-blue-600 rounded-lg text-sm font-medium text-blue-600 bg-white hover:bg-blue-600 hover:text-white transition-colors duration-200">
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
                        <div class="px-6 py-4">{{ $laporanTerbaru->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let panenChartInstance = null;

        function loadPanenChart(mitraId) {
            // Debug: log pemanggilan fungsi
            console.log('loadPanenChart called', mitraId);

            fetch(`/grafik-panen/${mitraId}`)
                .then(response => response.json())
                .then(data => {
                    console.log('DATA API:', data);

                    const canvas = document.getElementById('panenChart');
                    const msgDiv = document.getElementById('noPanenDataMsg');
                    if (!canvas) {
                        console.error('Canvas panenChart tidak ditemukan!');
                        return;
                    }

                    // Destroy chart sebelumnya jika ada
                    if (panenChartInstance) {
                        panenChartInstance.destroy();
                    }

                    if (!data || !data.labels || data.labels.length === 0) {
                        canvas.style.display = 'none';
                        msgDiv.style.display = 'flex';
                        msgDiv.innerText = 'Belum ada data panen buah untuk mitra ini.';
                        return;
                    } else {
                        canvas.style.display = 'block';
                        msgDiv.style.display = 'none';
                    }

                    panenChartInstance = new Chart(canvas.getContext('2d'), {
                        type: 'line',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: 'Hasil Panen (kg)',
                                data: data.data,
                                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                                borderColor: 'rgba(16, 185, 129, 1)',
                                borderWidth: 2,
                                tension: 0.4,
                                fill: true,
                                pointBackgroundColor: '#ffffff',
                                pointBorderColor: '#10b981',
                                pointBorderWidth: 2,
                                pointRadius: 4,
                                pointHoverRadius: 6
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { display: false },
                                tooltip: {
                                    backgroundColor: '#ffffff',
                                    titleColor: '#1f2937',
                                    bodyColor: '#1f2937',
                                    borderColor: '#e5e7eb',
                                    borderWidth: 1,
                                    padding: 12,
                                    displayColors: false,
                                    callbacks: {
                                        title: function(context) { return context[0].label; },
                                        label: function(context) { return 'Hasil Panen: ' + context.raw + ' kg'; }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: { font: { size: 12 } },
                                    grid: { display: true, color: 'rgba(0, 0, 0, 0.05)' }
                                },
                                x: { grid: { display: false } }
                            }
                        }
                    });

                    if (data.avg_berat_rata_rata !== null && data.avg_berat_rata_rata !== undefined) {
                        document.getElementById('avgBeratRataRata').innerText = 'Berat Rata-rata Alpukat Terakhir: ' + data.avg_berat_rata_rata + ' kg';
                    } else {
                        document.getElementById('avgBeratRataRata').innerText = '';
                    }
                })
                .catch(err => {
                    console.error('Gagal fetch data grafik panen:', err);
                    const msgDiv = document.getElementById('noPanenDataMsg');
                    if (msgDiv) {
                        msgDiv.style.display = 'flex';
                        msgDiv.innerText = 'Gagal mengambil data grafik panen.';
                    }
                });
        }

        // Event listener untuk modal
        document.addEventListener('alpine:init', () => {
            Alpine.data('openModal', () => ({
                openModal: false,
                selectedMitraId: null,
                selectedMitraName: '',
                init() {
                }
            }));
        });
    </script>
@endsection
