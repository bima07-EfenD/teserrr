<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAS - Kemitraan Petani Alpukat</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700&display=swap" rel="stylesheet" />

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

    <!-- HERO SECTION -->
    @include('components.hero-section')

    <!-- ABOUT US -->
    @include('components.about-us-section')

    <!-- Wave Divider -->
    @include('components.wave-divider')

    <!-- BENEFITS / LAYANAN -->
    @include('components.benefits-section')

    <!-- FAQ Section -->
    @include('components.faq-section')

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
