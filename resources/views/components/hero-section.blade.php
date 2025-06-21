<section id="beranda"
    class="relative text-white overflow-hidden py-24 md:py-32 flex items-center justify-center min-h-screen"
    style="background-image: url('/images/avocado.png'); background-size: cover; background-position: center;">

    <!-- Gradient overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-green-600/50 via-green-500/40 to-green-400/30" ></div>

    <!-- Main content -->
    <div class="max-w-6xl mx-auto px-6 text-center relative z-10" data-aos="fade-up" data-aos-once="false">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-6 tracking-wide leading-tight drop-shadow-lg">
            Bersama TEAM TAS, Panen Alpukat Jadi Lebih Mudah dan Menguntungkan!
        </h1>
        <p class="text-lg md:text-xl mb-10 max-w-3xl mx-auto leading-relaxed text-white/90">
            Dipercaya para petani alpukat, TEAM TAS hadir sebagai solusi kemitraan modern untuk meningkatkan hasil
            panen Anda. Dengan sistem pemantauan terintegrasi dan laporan berkualitas, kami membantu Anda mengelola
            kebun secara efisien, tepat, dan menguntungkan. Bergabunglah sekarang dan nikmati kemitraan yang
            transparan, terpercaya, dan penuh manfaat!
        </p>
        @auth
            <a href="{{ route('petani.mitra.create') }}"
                class="inline-block bg-white text-green-700 px-8 py-3 font-semibold rounded-full shadow-lg hover:bg-green-100 transition duration-300 transform hover:scale-105">
                Bermitra Sekarang
            </a>
        @else
            <a href="{{ route('login', ['redirect' => 'petani.mitra.create', 'intended' => route('petani.mitra.create')]) }}"
                class="inline-block bg-white text-green-700 px-8 py-3 font-semibold rounded-full shadow-lg hover:bg-green-100 transition duration-300 transform hover:scale-105">
                Bermitra Sekarang
            </a>
        @endauth
    </div>

    <!-- Infinite Wave Animation -->
    <div class="absolute bottom-0 left-0 right-0 z-20 overflow-hidden h-[200px]">
        <div class="wave-background absolute inset-0"></div>
    </div>

    <!-- Animation CSS -->
    <style>
        /* Removed @keyframes fadeInUp and .animate-fade-in-up as Alpine handles it */
        /* .animate-fade-in-up-1 {
            animation: fadeInUp 1.2s ease-out both;
            animation-delay: 0.2s;
        }

        .animate-fade-in-up-2 {
            animation: fadeInUp 1.2s ease-out both;
            animation-delay: 0.6s;
        } */

        @keyframes wave-motion {
            0% {
                background-position-x: 0;
            }
            100% {
                background-position-x: 800px; /* Lebar pola gelombang SVG */
            }
        }

        .wave-background {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 200'%3E%3Cpath fill='%23f8fafc' d='M0,100 Q200,50,400,100 T800,100 V200 H0 Z'/%3E%3C/svg%3E");
            background-repeat: repeat-x;
            background-size: 800px 200px;
            animation: wave-motion 4.5s linear infinite;
        }
    </style>
</section>
