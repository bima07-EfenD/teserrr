<div class="relative w-full h-[200px] overflow-hidden bg-white">
    <div class="absolute inset-0 wave-background-divider"></div>
</div>

<style>
    @keyframes wave-motion-divider {
        0% {
            background-position-x: 0;
        }
        100% {
            background-position-x: 800px; /* Adjust based on SVG width */
        }
    }

    .wave-background-divider {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 200'%3E%3Cpath fill='%2315803D' d='M0,100 Q200,50,400,100 T800,100 V200 H0 Z'/%3E%3C/svg%3E");
        background-repeat: repeat-x;
        background-size: 800px 200px;
        animation: wave-motion-divider 4.5s linear infinite;
        height: 100%;
    }
</style>
