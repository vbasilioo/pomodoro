<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pomodoro</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/eye-tracking.js'])
    @else
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/eye-tracking.js') }}"></script>
    @endif
    @livewireStyles
</head>

<body class="bg-primaryBlue font-sans flex flex-col items-center justify-center h-screen">

    @livewire('sidebar')
    <div class="flex flex-col items-center justify-center mb-10">
        <div class="flex">
            <div class="size-24 -m-2 bg-white rounded-full flex items-center justify-center relative overflow-hidden">
                <img id="eye-left" src="{{ asset('images/03_pupil.svg') }}" class="size-9 absolute" onclick="changeEyeImage()">
            </div>
            <div class="size-24 -m-2 bg-white rounded-full flex items-center justify-center relative overflow-hidden">
                <img id="eye-right" src="{{ asset('images/03_pupil.svg') }}" class="size-9 absolute" onclick="changeEyeImage()">
            </div>
        </div>
        <div class="w-48 h-7  bg-black border-8 border-borderMouth rounded-full mt-4"></div>
    </div>

    <div class="bg-opacity-95 bg-focus rounded-lg shadow-lg p-6 w-1/4 text-center">

        <div class="flex justify-center items-center gap-4 mb-6">
            <button class="px-4 h-8 rounded-md font-bold hover:bg-white focus:bg-white shadow-sm">FOCUS</button>
            <button class="px-4 h-8 rounded-md font-bold hover:bg-white focus:bg-white shadow-sm">BREAK</button>
            <button class="px-4 h-8 rounded-md font-bold hover:bg-white focus:bg-white shadow-sm">LONG BREAK</button>
        </div>

        <div class="text-7xl font-extrabold mb-6 text-white">0:59</div>

        <button class="bg-white border-4 border-b-8 justify-start flex border-black px-4 py-2 rounded-md font-bold">
            START
        </button>
    </div>

    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('changeBackgroundColor', (event) => {
                const {
                    color
                } = event.detail;
                document.body.classList.add(color);
            });
        });

        const eyeImages = [
            '{{ asset("images/01_pupil.svg") }}',
            '{{ asset("images/03_pupil.svg") }}',
            '{{ asset("images/04_pupil.svg") }}',
            '{{ asset("images/05_pupil.svg") }}',
            '{{ asset("images/06_pupil.svg") }}',
        ];

        function changeEyeImage() {
            const leftEye = document.getElementById("eye-left");
            const rightEye = document.getElementById("eye-right");

            let currentIndex = eyeImages.indexOf(leftEye.src);

            if (currentIndex === -1) {
                currentIndex = 1;
            }

            const nextIndex = (currentIndex + 1) % eyeImages.length;

            leftEye.src = eyeImages[nextIndex];
            rightEye.src = eyeImages[nextIndex];
        }
    </script>
    @livewireScripts
</body>

</html>