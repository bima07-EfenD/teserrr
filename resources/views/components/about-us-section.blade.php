<section id="tentang" class="py-20 px-6 bg-green-700 relative overflow-hidden">

    <!-- Background Pattern Overlay -->
    <div class="absolute inset-0 z-0 opacity-20"
        style="background-image: url('https://img.pixers.pics/download(s3:700/FO/17/10/28/54/8/700_FO171028548_165442a59631307d920cde142efa621c.jpg):pattern(0.2381w,0.2381h):resize(700,700):compose(download(cms:2018/10/5bd1b6b8d04b8_220x50-watermark.png),over,480,650):format(jpg)/wallpapers-seamless-pattern-with-watercolor-tropical-leaves.jpg.jpg'); background-repeat: repeat; background-size: cover;"></div>

    <div class="max-w-6xl mx-auto relative z-10" data-aos="fade-up" data-aos-once="false">
        <h2 class="text-3xl font-bold mb-4 text-center text-white">Tentang Kami</h2>
        <p class="text-center text-white mb-12 max-w-2xl mx-auto">
            TEAM TAS hadir untuk mendampingi petani alpukat dengan layanan kemitraan dan teknologi pemantauan panen
            terkini.
        </p>

        <!-- Swiper -->
        <div class="swiper aboutSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="flex flex-col items-center text-center p-4">
                        <div class="bg-white rounded-full p-4 border border-gray-200 mb-6 shadow-xl transition-transform duration-300 hover:scale-105">
                            <img src="/images/buah.png" alt="Pengelolaan Buah"
                                class="w-40 h-40 object-cover rounded-full border-4 border-green-300">
                        </div>
                        <h3 class="text-lg font-semibold mb-2 text-white">Bantu pengelolaan buah alpukat Anda dengan baik</h3>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="flex flex-col items-center text-center p-4">
                        <div class="bg-white rounded-full p-4 border border-gray-200 mb-6 shadow-xl transition-transform duration-300 hover:scale-105">
                            <img src="/images/hand.png" alt="Pertemuan Supplier"
                                class="w-40 h-40 object-cover rounded-full border-4 border-green-300">
                        </div>
                        <h3 class="text-lg font-semibold mb-2 text-white">Pertemukan Anda langsung dengan supplier terpercaya</h3>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="flex flex-col items-center text-center p-4">
                        <div class="bg-white rounded-full p-4 border border-gray-200 mb-6 shadow-xl transition-transform duration-300 hover:scale-105">
                            <img src="/images/bibit.png" alt="Pemantauan Proses"
                                class="w-40 h-40 object-cover rounded-full border-4 border-green-300">
                        </div>
                        <h3 class="text-lg font-semibold mb-2 text-white">Bantu pemantauan proses dari pembibitan sampai pembuahan</h3>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="flex flex-col items-center text-center p-4">
                        <div class="bg-white rounded-full p-4 border border-gray-200 mb-6 shadow-xl transition-transform duration-300 hover:scale-105">
                            <img src="/images/buah.png" alt="Laporan Panen"
                                class="w-40 h-40 object-cover rounded-full border-4 border-green-300">
                        </div>
                        <h3 class="text-lg font-semibold mb-2 text-white">Sediakan laporan panen terintegrasi dan mudah dipahami</h3>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="flex flex-col items-center text-center p-4">
                        <div class="bg-white rounded-full p-4 border border-gray-200 mb-6 shadow-xl transition-transform duration-300 hover:scale-105">
                            <img src="/images/hand.png" alt="Dampingi Petani"
                                class="w-40 h-40 object-cover rounded-full border-4 border-green-300">
                        </div>
                        <h3 class="text-lg font-semibold mb-2 text-white">Dampingi petani dalam proses evaluasi dan peningkatan hasil panen</h3>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="flex flex-col items-center text-center p-4">
                        <div class="bg-white rounded-full p-4 border border-gray-200 mb-6 shadow-xl transition-transform duration-300 hover:scale-105">
                            <img src="/images/bibit.png" alt="Kemitraan Jangka Panjang"
                                class="w-40 h-40 object-cover rounded-full border-4 border-green-300">
                        </div>
                        <h3 class="text-lg font-semibold mb-2 text-white">Dorong kemitraan jangka panjang yang adil dan saling menguntungkan</h3>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Navigation -->
            <div class="swiper-button-next text-green-600 hover:text-green-800 transition-colors duration-300"></div>
            <div class="swiper-button-prev text-green-600 hover:text-green-800 transition-colors duration-300"></div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.aboutSwiper', {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    },
                },
            });
        });
    </script>
@endpush

<style>
    #tentang {
        /* Background handled by overlay div */
    }

    /* Swiper custom styling for pagination dots */
    .swiper-pagination-bullet-active {
        background-color: #10B981; /* Tailwind green-500 */
    }
</style>
