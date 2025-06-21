@extends('layouts.owner')

@section('title', 'Daftar Mitra')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
@endpush

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
                        <h1 class="text-3xl font-bold text-white mb-1">Daftar Mitra</h1>
                        <p class="text-blue-100">Kelola data mitra yang terdaftar</p>
                    </div>
                </div>
                <div
                    class="flex items-center justify-between px-8 py-4 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-blue-100">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full flex items-center justify-center bg-blue-100 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <span class="ml-3 text-blue-800 font-medium">Mitra</span>
                    </div>
                    <div class="text-sm text-blue-600">
                        {{ now()->format('l, d F Y') }}
                    </div>
                </div>
            </div>

            <!-- Filter dan Pencarian -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                <form action="{{ route('owner.mitra.index') }}" method="GET"
                    class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Cari</label>
                        <input type="text" name="search" id="search" value="{{ request('search') }}"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Cari nama atau email...">
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" id="status"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Semua Status</option>
                            <option value="menunggu" {{ request('status') == 'menunggu' ? 'selected' : '' }}>Menunggu
                            </option>
                            <option value="disetujui" {{ request('status') == 'disetujui' ? 'selected' : '' }}>Disetujui
                            </option>
                            <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>
                    <div>
                        <label for="kabupaten" class="block text-sm font-medium text-gray-700 mb-1">Kabupaten</label>
                        <select name="kabupaten" id="kabupaten"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Semua Kabupaten</option>
                            @foreach ($kabupaten as $kab)
                                <option value="{{ $kab->id }}"
                                    {{ request('kabupaten') == $kab->id ? 'selected' : '' }}>
                                    {{ $kab->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button type="submit"
                            class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                            Cari
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabel Mitra -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kabupaten
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal Daftar
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($mitra as $m)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex flex-col">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $m->nama_lengkap }}
                                                </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $m->user->name }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $m->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $m->kabupaten->nama }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                            @if ($m->status == 'disetujui') bg-green-100 text-green-800
                                            @elseif($m->status == 'menunggu') bg-yellow-100 text-yellow-800
                                            @elseif($m->status == 'nonaktif') bg-gray-100 text-gray-800
                                            @else bg-red-100 text-red-800 @endif">
                                            {{ ucfirst($m->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $m->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <div class="flex items-center justify-end space-x-3">
                                            <a href="{{ route('owner.mitra.show', $m->id) }}"
                                                class="text-blue-600 hover:text-blue-900">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            <button type="button"
                                                onclick="openEditModal({{ $m->id }}, '{{ $m->nama_lengkap }}', '{{ $m->status }}')"
                                                class="text-indigo-600 hover:text-indigo-900">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                            <form action="{{ route('owner.mitra.destroy', $m->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus mitra ini?')">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                        Tidak ada data mitra
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                    {{ $mitra->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Ubah Status Mitra</h3>
                <form id="editForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label for="edit_nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Mitra</label>
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

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
    <script>
        function openEditModal(id, nama, status) {
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

            const modal = document.getElementById('editModal');
            const form = document.getElementById('editForm');
            const statusSelect = document.getElementById('edit_status');

            // Set form action
            form.action = `/owner/mitra/${id}`;

            // Set form values
            document.getElementById('edit_nama_lengkap').value = nama;
            statusSelect.value = status;

            // Simpan status asli untuk referensi
            statusSelect.setAttribute('data-original-status', status);

            // Reset semua opsi ke enabled terlebih dahulu
            const allOptions = statusSelect.querySelectorAll('option');
            allOptions.forEach(option => {
                option.disabled = false;
            });

            // Logika validasi berdasarkan status saat ini
            if (status === 'menunggu') {
                // Menunggu hanya bisa ke disetujui dan ditolak
                statusSelect.querySelector('option[value="nonaktif"]').disabled = true;
            } else if (status === 'disetujui') {
                // Disetujui hanya bisa ke nonaktif
                statusSelect.querySelector('option[value="menunggu"]').disabled = true;
                statusSelect.querySelector('option[value="ditolak"]').disabled = true;
            } else if (status === 'nonaktif') {
                // Nonaktif hanya bisa ke disetujui
                statusSelect.querySelector('option[value="menunggu"]').disabled = true;
                statusSelect.querySelector('option[value="ditolak"]').disabled = true;
            }

            // Toggle penolakan fields based on current status
            togglePenolakanFields(status);

            // Show modal
            modal.classList.remove('hidden');
        }

        function closeEditModal() {
            const modal = document.getElementById('editModal');
            const submitButton = document.getElementById('submitButton');
            const loadingOverlay = document.getElementById('loadingOverlay');

            modal.classList.add('hidden');
            // Reset button state
            submitButton.disabled = false;
            submitButton.innerHTML = 'Simpan';
            // Sembunyikan loading jika masih terlihat
            loadingOverlay.classList.add('hidden');
        }

        // Tutup modal jika klik luar
        document.getElementById('editModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeEditModal();
            }
        });

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

        document.getElementById('edit_status').addEventListener('change', function () {
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

        // Handle form submission
        document.getElementById('editForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const form = this;
            const formData = new FormData(form);
            const status = formData.get('status');
            const submitButton = document.getElementById('submitButton');
            const loadingOverlay = document.getElementById('loadingOverlay');

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
                Menyimpan...
            `;
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
                // Reset button dan sembunyikan loading
                submitButton.disabled = false;
                submitButton.innerHTML = 'Simpan';
                loadingOverlay.classList.add('hidden');
            });
        });
    </script>
    @endpush
@endsection
