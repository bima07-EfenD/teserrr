@extends('layouts.owner')

@section('title', 'Detail Mitra')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-blue-50 to-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
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
                        <h1 class="text-3xl font-bold text-white mb-1">Detail Mitra</h1>
                        <p class="text-blue-100">Informasi lengkap mitra</p>
                    </div>
                </div>
                <div
                    class="flex items-center justify-between px-8 py-4 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-blue-100">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full flex items-center justify-center bg-blue-100 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <span class="ml-3 text-blue-800 font-medium">Mitra</span>
                    </div>
                    <a href="{{ route('owner.mitra.index') }}"
                        class=" flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>

            <!-- Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Informasi Utama -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Profil -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-6">Informasi Profil</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Nama Lengkap</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $mitra->nama_lengkap }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Email</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $mitra->email }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Telepon</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $mitra->telepon }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Status</label>
                                <p class="mt-1">
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                    @if ($mitra->status == 'disetujui') bg-green-100 text-green-800
                                    @elseif($mitra->status == 'menunggu') bg-yellow-100 text-yellow-800
                                    @else bg-red-100 text-red-800 @endif">
                                        {{ ucfirst($mitra->status) }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Lahan -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-6">Informasi Lahan</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Luas Lahan</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $mitra->luas_lahan }} m<sup>2</sup></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Jumlah Pohon</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $mitra->pohon ?? '-' }} pohon</p>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-6">Alamat</h2>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Provinsi</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $mitra->provinsi->nama }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Kabupaten</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $mitra->kabupaten->nama }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Kecamatan</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $mitra->kecamatan->nama }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Desa</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $mitra->desa->nama }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Alamat Detail</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $mitra->alamat_detail }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Koordinat</label>
                                <p class="mt-1 text-sm text-gray-900">
                                    {{ $mitra->latitude }}, {{ $mitra->longitude }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-8">

                    <!-- Dokumen -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-6">Dokumen</h2>
                        <div class="space-y-4">
                            @if ($mitra->surat_tanah)
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Surat Tanah</label>
                                    <a href="{{ asset('storage/' . $mitra->surat_tanah) }}" target="_blank"
                                        class="mt-1 inline-flex items-center text-sm text-blue-600 hover:text-blue-800">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Lihat Surat Tanah
                                    </a>
                                </div>
                            @endif
                            @if ($mitra->kontrak)
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Kontrak</label>
                                    <a href="{{ asset('storage/' . $mitra->kontrak) }}" target="_blank"
                                        class="mt-1 inline-flex items-center text-sm text-blue-600 hover:text-blue-800">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Lihat Kontrak
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Aksi -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-6">Aksi</h2>
                        <div class="space-y-4">
                            <button type="button"
                                onclick="openEditModal({{ $mitra->id }}, '{{ $mitra->nama_lengkap }}', '{{ $mitra->email }}', '{{ $mitra->telepon }}', '{{ $mitra->luas_lahan }}', '{{ $mitra->pohon }}', '{{ $mitra->provinsi }}', '{{ $mitra->kabupaten->id }}', '{{ $mitra->kecamatan }}', '{{ $mitra->desa }}', '{{ $mitra->alamat_detail }}', '{{ $mitra->latitude }}', '{{ $mitra->longitude }}')"
                                class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Ubah Status
                            </button>
                        </div>
                    </div>
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
                            <label for="edit_nama_lengkap" class="block text-sm font-medium text-gray-700">Nama
                                Mitra</label>
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
                            </select>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button" onclick="closeEditModal()"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
        <script>
            function openEditModal(id, nama, email, telepon, luasLahan, pohon, provinsi, kabupatenId, kecamatan, desa, alamat,
                latitude, longitude) {
                const modal = document.getElementById('editModal');
                const form = document.getElementById('editForm');

                // Set form action
                form.action = `/owner/mitra/${id}`;

                // Set form values
                document.getElementById('edit_nama_lengkap').value = nama;

                // Show modal
                modal.classList.remove('hidden');
            }

            function closeEditModal() {
                const modal = document.getElementById('editModal');
                modal.classList.add('hidden');
            }

            // Close modal when clicking outside
            document.getElementById('editModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeEditModal();
                }
            });

            // Handle form submission
            document.getElementById('editForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const form = this;
                const formData = new FormData(form);

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
                                text: 'Terjadi kesalahan saat memperbarui status mitra'
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi kesalahan saat memperbarui status mitra'
                        });
                    });
            });
        </script>
    @endpush
@endsection
