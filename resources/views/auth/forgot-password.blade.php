@extends('layouts.guest')

@section('content')
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Lupa password Anda? Tidak masalah. Beri tahu kami alamat email Anda dan kami akan mengirimkan link reset password yang memungkinkan Anda memilih password baru.') }}
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form id="forgotForm" method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500" type="email" name="email" :value="old('email')" required autofocus />
            @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <button id="submitBtn" type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Kirim Link Reset Password') }}
            </button>
        </div>
    </form>

    <!-- Modal Loading -->
    <div id="modalLoading" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50 hidden">
        <div class="bg-white rounded-xl p-8 flex flex-col items-center shadow-lg">
            <svg class="animate-spin h-10 w-10 text-green-600 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
            </svg>
            <div class="text-green-700 font-semibold text-lg">Mengirim link reset password...</div>
        </div>
    </div>

    <script>
        const forgotForm = document.getElementById('forgotForm');
        const modalLoading = document.getElementById('modalLoading');
        const submitBtn = document.getElementById('submitBtn');
        forgotForm.addEventListener('submit', function(e) {
            submitBtn.disabled = true;
            modalLoading.classList.remove('hidden');
        });
    </script>
@endsection
