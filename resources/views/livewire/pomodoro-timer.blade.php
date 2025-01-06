<div class="bg-opacity-20 bg-white rounded-lg shadow-lg p-6 w-1/4 text-center">
    <div class="flex justify-center items-center gap-4 mb-6">

        <button id="setFocus" class="px-4 h-8 rounded-md font-bold hover:bg-white focus:bg-white shadow-sm">FOCUS
        </button>
        <button id="setBreak" class="px-4 h-8 rounded-md font-bold hover:bg-white focus:bg-white shadow-sm">BREAK
        </button>
        <button id="setLongBreak" class="px-4 h-8 rounded-md font-bold hover:bg-white focus:bg-white shadow-sm">LONG
            BREAK
        </button>
    </div>

    <div id="timerDisplay" class="text-7xl font-extrabold mb-6 text-white">
        123
    </div>

    <div class="flex">
        @if(isset($pomodoro))
            @if ($pomodoro->checkStatus(\App\Enums\PomodoroStatusEnum::Paused))
                <button wire:click="resumePomodoro" class="bg-white border-4 border-b-8 justify-start flex border-black px-4 py-2 rounded-md font-bold">
                    RESUME
                </button>
            @else
                <button wire:click="pausePomodoro"
                        class="bg-white border-4 border-b-8 justify-start flex border-black px-4 py-2 rounded-md font-bold ml-2">
                    PAUSE
                </button>
            @endif
            <button wire:click="abandonPomodoro"
                    class="bg-white border-4 border-b-8 justify-start flex border-black px-4 py-2 rounded-md font-bold ml-2">
                SKIP
            </button>
        @else
            <button wire:click="startPomodoro" id="startTimer"
                    class="bg-white border-4 border-b-8 justify-start flex border-black px-4 py-2 rounded-md font-bold">
                START
            </button>
        @endif
    </div>
</div>


<script>

    let timeRemaining = {{ $pomodoro?->time_remaining ?? 15 }};
    let isRunning = {{ $pomodoro?->checkStatus(\App\Enums\PomodoroStatusEnum::Running) ?? false }};

    let timerInterval = null;

    function startTimer() {
        if (timerInterval) {
            clearInterval(timerInterval);
        }
        timerInterval = setInterval(() => {
            console.log(timeRemaining);
            if (timeRemaining > 0) {
                timeRemaining--;
                updateDisplay();
            } else {
                // Time is up—notify Livewire and stop the interval
                notifyPomodoroComplete();
                clearInterval(timerInterval);
                timerInterval = null;
            }
        }, 1000);
    }

    function pauseTimer() {
        if (timerInterval) {
            clearInterval(timerInterval);
            timerInterval = null;
        }
    }


    function updateDisplay() {
        const minutes = Math.floor(timeRemaining / 60);
        const seconds = timeRemaining % 60;
        document.getElementById("timerDisplay").textContent =
            `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    }

    function notifyPomodoroComplete() {
        Livewire.dispatch('completePomodoro');
    }

    document.addEventListener('livewire:init', () => {
        notifyPomodoroComplete();

        Livewire.on('pomodoroStatus', (event) => {
            console.log(event);
            if (event[0].status === 'running') {
                isRunning = true;
                startTimer();
            } else {
                isRunning = false;
                pauseTimer();
            }
        });

    });
</script>
