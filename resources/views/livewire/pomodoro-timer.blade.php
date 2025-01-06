<div class="bg-opacity-20 bg-white rounded-lg shadow-lg p-6 w-1/4 text-center">
    <div class="flex justify-center items-center gap-4 mb-6">
        <button id="setFocus" class="px-4 h-8 rounded-md font-bold hover:bg-white focus:bg-white shadow-sm">FOCUS</button>
        <button id="setBreak" class="px-4 h-8 rounded-md font-bold hover:bg-white focus:bg-white shadow-sm">BREAK</button>
        <button id="setLongBreak" class="px-4 h-8 rounded-md font-bold hover:bg-white focus:bg-white shadow-sm">LONG BREAK</button>
    </div>

    <div id="timerDisplay" class="text-7xl font-extrabold mb-6 text-white">
        25:00
    </div>

    <div class="flex">
        <button id="startTimer" class="bg-white border-4 border-b-8 justify-start flex border-black px-4 py-2 rounded-md font-bold">
            START
        </button>
        <button id="pauseTimer" class="bg-white border-4 border-b-8 justify-start flex border-black px-4 py-2 rounded-md font-bold ml-2" style="display: none;">
            PAUSE
        </button>
        <button id="skipTimer" class="bg-white border-4 border-b-8 justify-start flex border-black px-4 py-2 rounded-md font-bold ml-2" style="display: none;">
            SKIP
        </button>
    </div>
</div>

<script>
    function notifyPomodoroComplete() {
        Livewire.dispatch('completePomodoro');
    }

    document.addEventListener('livewire:init', () => {
        notifyPomodoroComplete();
    });
</script>