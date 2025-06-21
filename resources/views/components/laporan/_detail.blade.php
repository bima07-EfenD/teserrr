@extends('layouts.' . Auth::user()->role)

@section('title', $laporan->judul)

@section('content')
<div class="bg-gradient-to-br from-indigo-50 via-sky-50 to-white min-h-screen">
    <div class="max-w-7xl mx-auto pt-8 pb-16 px-4 sm:px-6 lg:px-8">
        <!-- Back button -->
        <div class="mb-8">
            <a href="{{ route(Auth::user()->role . '.laporan.index') }}"
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
                    @if($laporan->template)
                        <div class="mt-2 text-blue-100">
                            <span class="font-medium"></span> {{ $laporan->template }}
                            @if($laporan->template === 'Kegiatan Lainnya' && $laporan->kegiatan_lainnya)
                                <span class="ml-2">- {{ $laporan->kegiatan_lainnya }}</span>
                            @elseif($laporan->template === 'Panen Buah' && $laporan->panen_buah)
                                <span class="ml-2">- Berhasil memanen buah seberat {{ $laporan->panen_buah }} kg</span>
                            @endif
                        </div>
                    @endif
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
                </div>

                <div class="text-sm text-gray-500">
                    Terakhir diperbarui: {{ $laporan->updated_at->format('d F Y H:i') }}
                </div>
            </div>

            <!-- Main content layout -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 p-8">
                <!-- Left column - Main report content -->
                <div class="lg:col-span-2 order-2 lg:order-1">
                    <!-- Report content -->
                    <div class="mb-10">
                        <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Detail Laporan
                        </h2>
                        <div class="prose max-w-none bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                            <div class="text-gray-700 text-lg leading-relaxed">
                                {!! $laporan->keterangan !!}
                    </div>
                </div>
            </div>

            <!-- Media Gallery -->
                    @if ($laporan->media_foto || $laporan->media_video)
                        <div class="mb-10">
                            <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Dokumentasi
                            </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @if ($laporan->media_foto)
                                    <div class="bg-white rounded-xl overflow-hidden border border-gray-100 shadow-sm group">
                                        <div class="relative aspect-video overflow-hidden">
                                            <img src="{{ asset('storage/' . $laporan->media_foto) }}" alt="Foto Laporan"
                                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" onclick="openMediaModal('{{ asset('storage/' . $laporan->media_foto) }}', 'image')">
                                        </div>
                                        <div class="p-4 bg-white">
                                            <p class="text-sm text-gray-500">Foto dokumentasi</p>
                                        </div>
                            </div>
                        @endif
                                @if ($laporan->media_video)
                                    <div class="bg-white rounded-xl overflow-hidden border border-gray-100 shadow-sm group cursor-pointer" onclick="openMediaModal('{{ asset('storage/' . $laporan->media_video) }}', 'video')">
                                        <div class="relative aspect-video overflow-hidden">
                                            <video controls class="w-full h-full object-cover video-modal-player">
                                    <source src="{{ asset('storage/' . $laporan->media_video) }}" type="video/mp4">
                                    Browser Anda tidak mendukung tag video.
                                </video>
                                        </div>
                                        <div class="p-4 bg-white">
                                            <p class="text-sm text-gray-500">Video dokumentasi</p>
                                        </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

                </div>
                <div class="mb-10">
                    <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Forum Chat
                    </h2>
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div id="chat-container" class="flex flex-col h-[500px] border border-gray-200 rounded-lg">
                            <!-- Chat messages -->
                            <div id="chat-box" class="flex-1 overflow-y-auto p-4">
                                @forelse ($chats as $chat)
                                <div class="mb-4">
                                    <div class="flex items-center">
                                        <x-chat-avatar :user="$chat->sender" />
                                        <div class="ml-4">
                                            <div class="flex items-center gap-2">
                                                <p class="text-sm font-medium text-gray-800 cursor-help chat-sender-name" data-phone-number="{{ $chat->sender->no_telepon ?? '-' }}">{{ $chat->sender->name ?? 'Pengguna Tidak Dikenal' }}</p>
                                                <span class="px-2 py-0.5 text-xs font-medium rounded-full
                                                    {{ $chat->sender->role === 'pegawai' ? 'bg-blue-100 text-blue-800' :
                                                       ($chat->sender->role === 'petani' ? 'bg-red-100 text-red-400' :
                                                       'bg-green-100 text-green-700') }}">
                                                    {{ ucfirst($chat->sender->role) }}
                                                </span>
                                            </div>
                                            <p class="text-xs text-gray-500">{{ $chat->created_at->format('H:i') }}</p>
                                        </div>
                                    </div>
                                    <div class="mt-2 bg-gray-100 rounded-lg p-3">
                                        <p class="text-sm text-gray-800">{{ $chat->message }}</p>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center text-gray-500 mt-10">Belum ada percakapan. Mulailah chat pertama Anda.</div>
                            @endforelse
                            </div>

                            <!-- Chat input -->
                            <form method="POST" action="{{ route('chat.store') }}" class="p-4 border-t border-gray-200">
                                @csrf
                                <input type="hidden" name="laporan_id" value="{{ $laporan->id }}">
                                <input type="hidden" name="receiver_id" value="{{ Auth::id() == $laporan->pegawai->id ? $laporan->mitra->id : $laporan->pegawai->id }}">
                                <div class="flex items-center">
                                    <textarea name="message" class="flex-1 border border-gray-300 rounded-lg p-2" rows="1" placeholder="Tulis pesan...">{{ old('message') }}</textarea>
                                    <button type="submit" class="ml-2 px-4 py-2 bg-indigo-500 text-white rounded-lg">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>


                <!-- Right column - Mitra info & actions -->
                <div class="lg:col-span-1 order-1 lg:order-2">
                    <!-- Mitra Card -->
                    <div class="bg-white rounded-xl shadow-sm p-6 mb-6 border border-gray-100 sticky top-4">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            Data Mitra
                        </h2>

                        <div class="border-t border-gray-100 pt-4">
                            <h3 class="text-lg font-medium text-gray-800 mb-2">
                                {{ $laporan->mitra->nama_lengkap }}
                            </h3>

                            <ul class="space-y-3 mt-4">
                                <li class="flex">
                                    <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-xs text-gray-500 font-medium">Email</p>
                                        <p class="text-sm text-gray-800">{{ $laporan->mitra->email }}</p>
                                    </div>
                                </li>

                                <li class="flex">
                                    <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-xs text-gray-500 font-medium">Telepon</p>
                                        <p class="text-sm text-gray-800">{{ $laporan->mitra->telepon }}</p>
                                    </div>
                                </li>

                                <li class="flex">
                                    <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-xs text-gray-500 font-medium">Lokasi</p>
                                        <p class="text-sm text-gray-800">{{ $laporan->mitra->kabupaten->nama }}</p>
                                    </div>
                                </li>
                                <li class="flex">
                                    <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-xs text-gray-500 font-medium">Luas Lahan</p>
                                        <p class="text-sm text-gray-800">{{ $laporan->mitra->luas_lahan }} m<sup>2</sup></p>
                                    </div>
                                </li>
                            </ul>
                    </div>

                        <!-- Action buttons -->
                        <div class="mt-8 space-y-3">
                            @include('components.laporan._action-buttons', ['laporan' => $laporan])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Media Preview Modal -->
    <div id="mediaModal" class="fixed inset-0 bg-black bg-opacity-75 hidden z-50 flex items-center justify-center">
        <div id="modalInnerWrapper" class="relative w-full max-w-4xl mx-4">
            <button type="button" onclick="closeMediaModal()" class="absolute -top-12 right-0 text-white hover:text-gray-300">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div id="mediaContent" class="bg-white rounded-lg overflow-hidden">
                <div id="mediaPreview" class="w-full">
                    <!-- Content will be dynamically inserted here -->
                </div>
                <div class="p-4 bg-white flex justify-between items-center">
                    <button type="button" onclick="closeMediaModal()" class="px-4 py-2 text-gray-700 hover:text-gray-900">
                        Tutup
                    </button>
                    <a id="downloadMediaBtn" href="#" download class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Download
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<style>
    /* Style for video player in modal to ensure interactivity */
    .video-modal-player {
        position: relative;
        pointer-events: auto; /* Ensure clicks are not blocked */
        touch-action: auto; /* Ensures touch gestures (like seeking) are responsive */
        user-select: auto; /* Prevents text selection from interfering with dragging */
    }
</style>
<script>
    function openMediaModal(url, type) {
        const modal = document.getElementById('mediaModal');
        const modalInnerWrapper = document.getElementById('modalInnerWrapper');
        const mediaContent = document.getElementById('mediaContent');
        const preview = document.getElementById('mediaPreview');
        const downloadBtn = document.getElementById('downloadMediaBtn');

        // Set download link
        downloadBtn.href = url;

        // Clear previous content
        preview.innerHTML = '';

        // Ensure inner wrapper and its children are interactive
        if (modalInnerWrapper) {
            modalInnerWrapper.style.zIndex = '100'; // Ensure it's above the backdrop
            modalInnerWrapper.style.pointerEvents = 'auto';
        }
        if (mediaContent) {
            mediaContent.style.pointerEvents = 'auto';
        }

        // Add new content based on type
        if (type === 'video') {
            const video = document.createElement('video');
            video.className = 'w-full video-modal-player';
            video.style.maxHeight = '70vh';
            video.setAttribute('playsinline', '');
            video.setAttribute('controls', ''); // Ensure native controls are present

            const source = document.createElement('source');
            source.src = url;
            source.type = 'video/' + url.split('.').pop();

            video.appendChild(source);
            preview.appendChild(video);

        } else {
            const img = document.createElement('img');
            img.src = url;
            img.className = 'w-full';
            img.style.maxHeight = '70vh';
            img.style.objectFit = 'contain';
            preview.appendChild(img);
        }

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeMediaModal() {
        const modal = document.getElementById('mediaModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside
    document.getElementById('mediaModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeMediaModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.getElementById('mediaModal').classList.contains('hidden')) {
            closeMediaModal();
        }
    });

    // Tooltip for phone number
    document.querySelectorAll('.chat-sender-name').forEach(nameElement => {
        let tooltipTimeout;
        let tooltipElement = null;

        nameElement.addEventListener('mouseenter', () => {
            // Clear any existing timeout to prevent flickering if quickly re-hovering
            clearTimeout(tooltipTimeout);

            // Create tooltip element if it doesn't exist
            if (!tooltipElement) {
                tooltipElement = document.createElement('div');
                tooltipElement.classList.add(
                    'absolute',
                    'px-3',
                    'py-2',
                    'bg-gray-900',
                    'text-white',
                    'text-xs',
                    'rounded-lg',
                    'opacity-0',
                    'transition-opacity',
                    'duration-200',
                    'z-50',
                    'pointer-events-none',
                    'max-w-xs'
                );
                // Create text element
                const textSpan = document.createElement('span');
                tooltipElement.appendChild(textSpan);

                // Add arrow
                const arrow = document.createElement('div');
                arrow.classList.add(
                    'absolute',
                    'top-full',
                    'transform',
                    'border-4',
                    'border-transparent',
                    'border-t-gray-900'
                );
                tooltipElement.appendChild(arrow);
                document.body.appendChild(tooltipElement);
            }

            // Get phone number from data attribute and set text content on the span
            const phoneNumber = nameElement.dataset.phoneNumber || '-';
            tooltipElement.querySelector('span').textContent = `Nomor telepon: ${phoneNumber}`;

            // Position the tooltip
            const nameRect = nameElement.getBoundingClientRect();
            const scrollX = window.scrollX || window.pageXOffset;
            const scrollY = window.scrollY || window.pageYOffset;

            // Temporarily make it visible to get its width/height
            tooltipElement.style.opacity = '0';
            tooltipElement.style.visibility = 'visible';
            tooltipElement.style.left = `0px`; // Initial position for calculation
            tooltipElement.style.top = `0px`; // Initial position for calculation

            const tooltipWidth = tooltipElement.offsetWidth;
            const tooltipHeight = tooltipElement.offsetHeight;

            // Calculate desired top position (30px buffer above the name)
            const topPosition = nameRect.top + scrollY - tooltipHeight - 30;

            // Calculate desired left position to center the tooltip over the name
            let leftPosition = nameRect.left + scrollX + (nameRect.width / 2) - (tooltipWidth / 2);

            // Adjust left position to ensure tooltip stays within viewport
            const viewportPadding = 10; // Small padding from viewport edges
            if (leftPosition < viewportPadding) {
                leftPosition = viewportPadding; // Nudge right if it goes off left edge
            } else if ((leftPosition + tooltipWidth) > (window.innerWidth - viewportPadding)) {
                leftPosition = window.innerWidth - tooltipWidth - viewportPadding; // Nudge left if it goes off right edge
            }

            // Apply final positions
            tooltipElement.style.top = `${topPosition}px`;
            tooltipElement.style.left = `${leftPosition}px`;
            tooltipElement.style.opacity = '1';

            // Update arrow position to point to the center of the name from the tooltip's new position
            const arrowElement = tooltipElement.querySelector('.border-t-gray-900');
            if (arrowElement) {
                // Calculate the center of the name relative to the document
                const nameCenterAbsolute = nameRect.left + scrollX + (nameRect.width / 2);
                // Calculate the arrow's 'left' property relative to the tooltip's own 'left' property
                // This means: (absolute center of name) - (absolute left of tooltip)
                const arrowOffsetFromTooltipLeft = nameCenterAbsolute - leftPosition;
                arrowElement.style.left = `${arrowOffsetFromTooltipLeft}px`;
                arrowElement.style.transform = 'translateX(-50%)'; // Keep it centered relative to its calculated 'left'
            }
        });

        nameElement.addEventListener('mouseleave', () => {
            // Use a timeout to delay removal, preventing flickering on quick re-hover
            tooltipTimeout = setTimeout(() => {
                if (tooltipElement) {
                    tooltipElement.style.opacity = '0';
                    tooltipElement.style.visibility = 'hidden';
                }
            }, 100);
        });

        // Cleanup on tooltip element itself to avoid memory leaks if parent removed (e.g., chat message disappears)
        nameElement.addEventListener('beforeunload', () => {
            if (tooltipElement && tooltipElement.parentNode) {
                tooltipElement.parentNode.removeChild(tooltipElement);
            }
        });
    });

</script>
@endpush
