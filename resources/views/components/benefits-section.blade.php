<section id="benefits" class="py-20 px-6" style="background-color: #15803D;" data-aos="fade-up" data-aos-once="false">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <!-- Left Column: Content -->
        <div class="text-white">
            <h2 class="text-3xl font-bold mb-8 md:text-left text-center">Keunggulan Bermitra dengan Kami</h2>
            <ul class="space-y-4">
                <li class="flex items-start">
                    <svg class="flex-shrink-0 w-6 h-6 text-green-300 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Didampingi oleh tim profesional</span>
                </li>
                <li class="flex items-start">
                    <svg class="flex-shrink-0 w-6 h-6 text-green-300 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Proses pengajuan mudah dan cepat</span>
                </li>
                <li class="flex items-start">
                    <svg class="flex-shrink-0 w-6 h-6 text-green-300 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Tanpa biaya tersembunyi</span>
                </li>
                <li class="flex items-start">
                    <svg class="flex-shrink-0 w-6 h-6 text-green-300 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Dukungan pemasaran digital</span>
                </li>
                <li class="flex items-start">
                    <svg class="flex-shrink-0 w-6 h-6 text-green-300 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Pendampingan teknis berkala</span>
                </li>
                <li class="flex items-start">
                    <svg class="flex-shrink-0 w-6 h-6 text-green-300 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Produk hasil mitra kami terkurasi</span>
                </li>
            </ul>
            <a href="{{ route('petani.mitra.create') }}"
                class="mt-10 inline-block bg-green-500 text-white px-8 py-3 font-semibold rounded-full shadow-lg transition duration-300 ease-in-out hover:scale-105 hover:bg-green-600 transform animate-bounce-subtle">
                Gabung Kemitraan
            </a>
        </div>

        <!-- Right Column: Image -->
        <div class="md:flex justify-center hidden">
            <img src="https://png.pngtree.com/png-vector/20221006/ourmid/pngtree-avocado-vector-illustration-design-with-stem-and-leaf-png-image_6287189.png"
                alt="Avocado Illustration" class="w-full max-w-sm h-auto object-contain">
        </div>
    </div>
</section>

@push('scripts')
    <style>
        @keyframes bounce-subtle {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }

        .animate-bounce-subtle:hover {
            animation: bounce-subtle 0.6s infinite alternate;
        }
    </style>
@endpush
