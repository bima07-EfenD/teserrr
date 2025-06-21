<div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
    @if (!empty($user->foto_profil) && file_exists(public_path('storage/' . $user->foto_profil)))
        <img src="{{ asset('storage/' . $user->foto_profil) }}" alt="{{ $user->name }}"
            class="h-full w-full object-cover rounded-full">
    @else
        <span class="text-blue-500 font-bold">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
    @endif
</div>
