<section id="faq" class="py-20 px-6 bg-white" data-aos="fade-up" data-aos-once="false">
    <div class="max-w-4xl mx-auto">
        <h2 class="text-4xl font-bold text-center text-green-700 mb-2">Frequently Asked Questions</h2>
        <p class="text-center text-gray-600 mb-12">Temukan jawaban atas pertanyaan umum Anda tentang kemitraan kami.</p>

        <div class="space-y-6">
            <!-- FAQ Item 1 -->
            <div x-data="{ open: false }" class="bg-white rounded-lg shadow hover:shadow-md transition-shadow duration-300">
                <button @click="open = !open" class="flex justify-between items-center w-full p-6 text-lg font-semibold text-left text-gray-800 border-b border-gray-200 focus:outline-none">
                    <span>Bagaimana cara daftar kemitraan di TAS?</span>
                    <svg :class="{ 'rotate-180': open, 'rotate-0': !open }" class="w-5 h-5 text-green-700 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-3" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-3" class="px-6 py-4 text-gray-700">
                    Dengan daftar akun di website dan isi form pendaftaran mitra.
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div x-data="{ open: false }" class="bg-white rounded-lg shadow hover:shadow-md transition-shadow duration-300">
                <button @click="open = !open" class="flex justify-between items-center w-full p-6 text-lg font-semibold text-left text-gray-800 border-b border-gray-200 focus:outline-none">
                    <span>Berapa lama proses daftar kemitraan?</span>
                    <svg :class="{ 'rotate-180': open, 'rotate-0': !open }" class="w-5 h-5 text-green-700 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-3" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-3" class="px-6 py-4 text-gray-700">
                    Untuk prosesnya sekitar seminggu, tim TAS akan langsung survei ke tempat Anda setelah mengajukan daftar kemitraan.
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div x-data="{ open: false }" class="bg-white rounded-lg shadow hover:shadow-md transition-shadow duration-300">
                <button @click="open = !open" class="flex justify-between items-center w-full p-6 text-lg font-semibold text-left text-gray-800 border-b border-gray-200 focus:outline-none">
                    <span>Bagaimana sistem kemitraan di TAS?</span>
                    <svg :class="{ 'rotate-180': open, 'rotate-0': !open }" class="w-5 h-5 text-green-700 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-3" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-3" class="px-6 py-4 text-gray-700">
                    Sistem kemitraan di TAS bersifat edukatif, mirip seperti mengikuti kelas. Mitra akan mendapatkan pendampingan, pengetahuan praktis, dan keuntungan yang kompetitif.
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div x-data="{ open: false }" class="bg-white rounded-lg shadow hover:shadow-md transition-shadow duration-300">
                <button @click="open = !open" class="flex justify-between items-center w-full p-6 text-lg font-semibold text-left text-gray-800 border-b border-gray-200 focus:outline-none">
                    <span>Apakah memungkinkan jika hanya punya lahan saja bisa gabung di kemitraan?</span>
                    <svg :class="{ 'rotate-180': open, 'rotate-0': !open }" class="w-5 h-5 text-green-700 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-3" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-3" class="px-6 py-4 text-gray-700">
                    Tentu saja. Kami menyediakan skema kemitraan dari tahap awal pembibitan hingga panen.
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div x-data="{ open: false }" class="bg-white rounded-lg shadow hover:shadow-md transition-shadow duration-300">
                <button @click="open = !open" class="flex justify-between items-center w-full p-6 text-lg font-semibold text-left text-gray-800 border-b border-gray-200 focus:outline-none">
                    <span>Hasil panen nanti dijualnya caranya bagaimana?</span>
                    <svg :class="{ 'rotate-180': open, 'rotate-0': !open }" class="w-5 h-5 text-green-700 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-3" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-3" class="px-6 py-4 text-gray-700">
                    Mitra tidak perlu mencari pembeli. Hasil panen akan langsung didistribusikan oleh tim TAS ke supplier terpercaya dengan harga yang kompetitif.
                </div>
            </div>

            <!-- FAQ Item 6 -->
            <div x-data="{ open: false }" class="bg-white rounded-lg shadow hover:shadow-md transition-shadow duration-300">
                <button @click="open = !open" class="flex justify-between items-center w-full p-6 text-lg font-semibold text-left text-gray-800 border-b border-gray-200 focus:outline-none">
                    <span>Benefit apa saja setelah menjadi mitra TAS?</span>
                    <svg :class="{ 'rotate-180': open, 'rotate-0': !open }" class="w-5 h-5 text-green-700 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-3" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-3" class="px-6 py-4 text-gray-700">
                    Selain keuntungan dari hasil panen, mitra akan mendapatkan ilmu bisnis, strategi marketing, serta pendampingan pengelolaan kebun.
                </div>
            </div>
        </div>
    </div>
</section>
