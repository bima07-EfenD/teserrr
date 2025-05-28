@forelse ($mitras as $mitra)
<tr class="hover:bg-gray-50 transition-colors duration-200">
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        {{ $loop->iteration }}
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="h-10 w-10 flex-shrink-0">
                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-100 to-indigo-100 flex items-center justify-center text-blue-600 font-semibold">
                    {{ strtoupper(substr($mitra->nama_lengkap, 0, 1)) }}
                </div>
            </div>
            <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">{{ $mitra->nama_lengkap }}</div>
                <div class="text-sm text-gray-500">{{ $mitra->telepon }}</div>
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900">{{ $mitra->email }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900">{{ $mitra->kabupaten->nama }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-center">
        <div class="text-sm text-gray-900">{{ $mitra->jumlah_pohon }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
        <div class="flex items-center space-x-3">
            <a href="{{ route('pegawai.mitra.show', $mitra) }}" 
               class="text-blue-600 hover:text-blue-900 transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </a>
            <a href="{{ route('pegawai.mitra.edit', $mitra) }}" 
               class="text-indigo-600 hover:text-indigo-900 transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </a>
            <form action="{{ route('pegawai.mitra.destroy', $mitra) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="text-red-600 hover:text-red-900 transition-colors duration-200"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus mitra ini?')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </form>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
        <div class="flex flex-col items-center justify-center py-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <p class="text-lg font-medium text-gray-900">Data mitra tidak ditemukan</p>
            <p class="text-sm text-gray-500">Silakan tambahkan mitra baru</p>
        </div>
    </td>
</tr>
@endforelse 