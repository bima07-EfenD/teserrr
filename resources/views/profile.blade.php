<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAS - Profil</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@800&display=swap" rel="stylesheet">

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Custom Style -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8fafc;
        }

        section {
            scroll-margin-top: 80px;
        }

        .nav-shadow {
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body class="antialiased text-gray-800 bg-white">

    <!-- NAVIGATION -->
    @include('components.navbar')

    <!-- PROFILE SECTION -->
    <section id="profile" class="relative py-16 bg-green-700 overflow-hidden sm:px-2">
        <!-- Green overlay/gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-green-800 to-green-600 opacity-75"></div>

        <div class="relative container mx-auto px-6 md:px-10 lg:px-20 z-10">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
                <!-- Left content - Text -->
                <div class="w-full lg:w-2/3 text-white text-center lg:text-left" data-aos="fade-up">
                    <h2 class="text-5xl md:text-6xl font-bold mb-8 tracking-tight"
                        style="text-shadow: 4px 4px #000, -2px -2px #FFF, 2px -2px #FFF, -2px 2px #FFF, 2px 2px #FFF;">
                        TANI ALPUKAT SIDOREJO
                    </h2>
                    <p class="mb-6 leading-relaxed text-lg">
                        Tani Alpukat Sidorejo (TAS) merupakan badan utama yang menjalankan sistem kemitraan dan pengelolaan
                        budidaya alpukat secara terstandar dan berkelanjutan. Berpusat di Semboro Kulon, Semboro, Kecamatan
                        Semboro, Kabupaten Jember, Jawa Timur, TAS dipimpin oleh Bapak Makruf Mulyono yang berkomitmen
                        kuat dalam penerapan budidaya yang sehat dan ramah lingkungan.
                    </p>
                    <p class="mb-6 leading-relaxed text-lg">
                        Seluruh kegiatan kemitraan TAS mengacu pada standar budidaya alpukat premium yang telah dikembangkan
                        secara sistematis. Setiap mitra yang tergabung wajib mengikuti panduan budidaya yang telah
                        ditetapkan demi menjaga kualitas dan keberlanjutan produksi.
                    </p>
                    <p class="mb-6 leading-relaxed text-lg">
                        Salah satu keunggulan sistem TAS adalah pengurangan signifikan penggunaan pupuk kimia, yang
                        bertujuan untuk menghasilkan buah alpukat dengan kualitas tinggi. Pendekatan ini menjadikan daging
                        buah tidak berair dan memiliki daya simpan lebih lama, sehingga sangat diminati oleh pasar premium.
                    </p>
                    <p class="leading-relaxed text-lg">
                        Bermitra dengan TAS berarti bukan hanya menanam, tetapi juga berproses bersama dalam ekosistem
                        agribisnis modern, dengan pendampingan teknis, pengawasan berkala, serta akses ke jaringan
                        distribusi terpercaya.
                    </p>
                </div>

                <!-- Right content - Image and Quote -->
                <div class="w-full lg:w-1/3 flex flex-col items-center justify-center relative" data-aos="zoom-in">
                    <div class="relative w-80 h-80 md:w-96 md:h-96 rounded-full overflow-hidden bg-white shadow-lg mb-8">
                        <img src="{{ asset('images/makruf.png') }}" alt="Makruf Mulyono"
                            class="w-full h-full object-cover object-center transform scale-110">
                    </div>

                    <div
                        class="relative w-full max-w-sm p-8 bg-yellow-500 rounded-full shadow-xl flex flex-col items-center justify-center text-center text-gray-800 font-semibold italic">
                        <p class="text-xl mb-4 leading-relaxed">
                            "Bertani bukan hanya soal panen, tapi soal proses. Proses yang benar akan menghasilkan buah
                            terbaik."
                        </p>
                        <p class="text-lg font-bold">
                            — Makruf Mulyono, KetuaTAS
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- VISI MISI SECTION -->
    @include('components.visi-misi-section')

    <!-- FOOTER -->
    @include('components.footer')

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: false, // Ensures animation runs every time, not just once
        });
    </script>

    @stack('scripts')

</body>

</html>
