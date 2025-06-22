@extends('layouts.owner')

@section('title', 'Daftar Pegawai')

@section('content')
<div class="mb-6">
    <a href="{{ route('owner.pegawai.create') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-700">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
        </svg>
        Tambah Pegawai
    </a>
</div>

<div class="overflow-hidden bg-white shadow sm:rounded-lg">
    <div class="hidden md:block overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">No</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Nama</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Status Akun</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($pegawais as $pegawai)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ ($pegawais->currentPage() - 1) * $pegawais->perPage() + $loop->iteration }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $pegawai->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ $pegawai->email }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full
                            @if($pegawai->status_akun)
                                bg-green-100 text-green-800
                            @else
                                bg-red-100 text-red-800
                            @endif">
                            {{ $pegawai->status_akun ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex space-x-2">
                            <a href="{{ route('owner.pegawai.show', $pegawai) }}" class="text-blue-600 hover:text-blue-900">Detail</a>
                            <a href="{{ route('owner.pegawai.edit', $pegawai) }}" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-sm text-center text-gray-500">
                        Tidak ada data pegawai
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Mobile Card View -->
    <div class="md:hidden">
        <div class="p-4 space-y-4">
            @forelse($pegawais as $pegawai)
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $pegawai->name }}</h3>
                            <p class="text-sm text-gray-600">{{ $pegawai->email }}</p>
                        </div>
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                            @if($pegawai->status_akun)
                                bg-green-100 text-green-800
                            @else
                                bg-red-100 text-red-800
                            @endif">
                            {{ $pegawai->status_akun ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>
                    <div class="border-t border-gray-200 mt-4 pt-3 flex items-center justify-end space-x-4">
                        <a href="{{ route('owner.pegawai.show', $pegawai) }}" class="text-blue-600 hover:text-blue-900">Detail</a>
                        <a href="{{ route('owner.pegawai.edit', $pegawai) }}" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                    </div>
                </div>
            @empty
                <div class="text-center py-8">
                    <p class="text-gray-500">Tidak ada data pegawai.</p>
                </div>
            @endforelse
        </div>
    </div>

    @if($pegawais->hasPages())
    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
        {{ $pegawais->links() }}
    </div>
    @endif
</div>
@endsection
