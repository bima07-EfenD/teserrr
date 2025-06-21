<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kemitraan - TAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body class="bg-gray-50">
    <x-navbar />
    <main>
        <section class="relative bg-gradient-to-br from-green-700 via-green-600 to-green-800 flex items-center overflow-hidden"
            style="height: 560px;">
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute top-20 left-10 w-32 h-32 bg-green-500/10 rounded-full blur-xl animate-pulse"></div>
                <div
                    class="absolute bottom-20 right-10 w-40 h-40 bg-green-400/10 rounded-full blur-xl animate-pulse delay-1000">
                </div>
                <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-white/5 rounded-full blur-lg animate-bounce"></div>
            </div>
            <div class="container mx-auto px-8 z-10">
                <div class="grid lg:grid-cols-2 items-center gap-12">
                    <div class="text-white pl-4 lg:pl-8" data-aos="fade-right" data-aos-duration="800">
                        <div class="max-w-2xl space-y-6">
                            <h1
                                class="text-4xl md:text-5xl font-extrabold leading-tight text-balance md:whitespace-nowrap">
                                Kemitraan dengan TAS
                            </h1>
                            <p class="text-lg leading-relaxed text-balance opacity-90 md:whitespace-nowrap"
                                data-aos="fade-up" data-aos-delay="200">
                                Kami membantu membuka peluang bagi para petani alpukat untuk menghasilkan panen yang
                                berkualitas.
                            </p>
                            <p class="text-lg leading-relaxed text-balance opacity-90 md:whitespace-nowrap"
                                data-aos="fade-up" data-aos-delay="400">
                                Dan juga, bagi calon petani dengan lahan kosong, mari bersama menjadi petani alpukat
                                yang sukses.
                            </p>
                            <p class="text-xl font-semibold text-white text-balance md:whitespace-nowrap"
                                data-aos="fade-up" data-aos-delay="600">
                                Yuk pelajari peluang kemitraan di bawah ini!
                            </p>
                        </div>
                    </div>

                    <!-- Gambar -->
                    <div class="flex justify-center lg:justify-end pr-4 md:pr-8 lg:pr-12" data-aos="fade-left"
                        data-aos-duration="800">
                        <div class="relative">
                            <img src="{{ asset('images/makrufno.png') }}" alt="Petani Alpukat"
                                class="w-64 md:w-80 max-w-full h-auto object-contain drop-shadow-2xl">
                            <!-- Floating decorative elements -->
                            <div class="absolute -top-4 -right-4 w-8 h-8 bg-yellow-400/20 rounded-full animate-ping">
                            </div>
                            <div
                                class="absolute -bottom-2 -left-2 w-6 h-6 bg-green-400/20 rounded-full animate-pulse delay-500">
                            </div>
                            <div
                                class="absolute top-1/2 -right-6 w-4 h-4 bg-white/30 rounded-full animate-bounce delay-1000">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <section class="py-16 bg-white" data-aos="fade-up">
        <div class="container mx-auto px-4 flex flex-col items-center">
            <h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-2 text-center" data-aos="fade-up"
                data-aos-delay="0">Flowchart Kemitraan</h2>
            <p class="text-gray-700 mb-8 text-center" data-aos="fade-up" data-aos-delay="100">Berikut alur singkat
                proses kemitraan di TAS.</p>
            <div x-data="{ open: false, zoom: false }" class="w-full flex flex-col items-center">
                <img src="{{ asset('images/flowchart.png') }}" alt="Flowchart Kemitraan TAS"
                    class="w-full max-w-2xl rounded-lg shadow-lg cursor-zoom-in transition duration-200 hover:shadow-2xl"
                    @click="open = true" data-aos="zoom-in" data-aos-delay="200">
                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                    class="fixed inset-0 z-[9999] flex items-center justify-center bg-white/60 backdrop-blur-sm"
                    style="display: none;" @click.away="open = false; zoom = false"
                    @keydown.escape.window="open = false; zoom = false">
                    <div
                        class="relative w-full max-w-3xl mx-auto bg-white rounded-lg shadow-2xl overflow-auto max-h-[90vh] flex flex-col items-center p-4">
                        <button @click="open = false; zoom = false" aria-label="Tutup"
                            class="absolute top-2 right-4 text-gray-700 text-4xl font-bold focus:outline-none transition hover:scale-110 hover:text-red-400 z-10">&times;</button>
                        <div class="w-full flex justify-center items-center">
                            <img :class="zoom ? 'scale-150 cursor-zoom-out' : 'scale-100 cursor-zoom-in'"
                                @click="zoom = !zoom" src='{{ asset('images/flowchart.png') }}'
                                alt='Flowchart Kemitraan TAS'
                                class="transition-transform duration-300 max-h-[70vh] w-auto h-auto object-contain select-none">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-10 bg-white flex flex-col items-center">
        <div class="w-full max-w-md bg-green-700 rounded-2xl p-8 flex flex-col items-center mb-10 shadow-lg"
            data-aos="fade-up" data-aos-delay="100">
            <div class="text-center text-white font-bold text-lg mb-4">
                Selengkapnya<br>
                Download Kontrak Kemitraan
            </div>
            <a href={{ asset('storage/template/template.pdf') }} download
                class="bg-white rounded-lg p-3 mb-2 flex items-center justify-center transition hover:bg-green-100 hover:scale-105 shadow-md"
                title="Download Kontrak">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-700" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                </svg>
            </a>
        </div>
        <a href="{{ route('petani.mitra.create') }}"
            class="bg-green-700 hover:bg-green-800 text-white font-semibold text-lg rounded-xl px-10 py-4 shadow-lg transition-all duration-200 hover:scale-105 mb-2"
            data-aos="zoom-in" data-aos-delay="250">Gabung Kemitraan</a>
    </section>

    <x-footer />

    <script>
        AOS.init({
            duration: 1000,
            once: false
        });
    </script>
</body>

</html>
