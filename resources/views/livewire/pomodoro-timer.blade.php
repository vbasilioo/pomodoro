@php use App\Enums\PomodoroStatusEnum; @endphp
<div class="bg-opacity-20 bg-white rounded-lg shadow-lg p-6 w-1/4 text-center">
    <div class="flex justify-center items-center gap-4 mb-6">
        <button wire:click="setType('regular')" id="setFocus" value="regular"
                class="px-4 h-8 rounded-md font-bold hover:bg-white focus:bg-white focus:outline-none shadow-sm">FOCUS
        </button>
        <button wire:click="setType('break')" id="setBreak" value="break"
                class="px-4 h-8 rounded-md font-bold hover:bg-white focus:bg-white shadow-sm">BREAK
        </button>
        <button wire:click="setType('custom')" id="setLongBreak" value="custom"
                class="px-4 h-8 rounded-md font-bold hover:bg-white focus:bg-white shadow-sm">LONG BREAK
        </button>
    </div>

    <div wire:poll.1000ms="decrementTime">
        <div id="timerDisplay" class="text-7xl font-extrabold mb-6 text-white">
            @if(isset($pomodoro))
                {{ sprintf('%02d:%02d', intdiv($pomodoro->time_expected, 60), $pomodoro->time_expected % 60) }}
            @else
                00:00
            @endif
        </div>
    </div>

    <div class="flex">
        @auth
            @if(isset($pomodoro) && !$pomodoro->checkStatus(PomodoroStatusEnum::Abandoned))
                @if ($pomodoro->checkStatus(PomodoroStatusEnum::Paused))
                    <button wire:click="resumePomodoro"
                            class="bg-white border-4 border-b-8 justify-start flex border-black px-4 py-2 rounded-md font-bold">
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
        @endauth
        @guest
            <div class="text-white flex justify-center items-center">
            And there. Before you can use Pomodoro, register or log in to your account. This measure is used to ensure that points are correctly deposited into your account.
            </div>
        @endguest
    </div>
</div>

<script>
    let timeRemaining = {{ $pomodoro?->time_expected ?? 0 }};
    let timerInterval = null;

    function updateDisplay() {
        const minutes = Math.floor(timeRemaining / 60);
        const seconds = timeRemaining % 60;
        document.getElementById("timerDisplay").textContent =
            `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        updateTitle();
    }

    function startTimer() {
        if (timerInterval) {
            clearInterval(timerInterval);
        }

        timerInterval = setInterval(() => {
            if (timeRemaining > 0) {
                timeRemaining--;
                updateDisplay();
                updateTitle();
            } else {
                clearInterval(timerInterval);
                timerInterval = null;
                notifyPomodoroComplete();
            }
        }, 1000);
    }

    function pauseTimer() {
        if (timerInterval) {
            clearInterval(timerInterval);
            timerInterval = null;
        }
    }

    function notifyPomodoroComplete() {
        Livewire.dispatch('completePomodoro');
    }

    function updateTitle() {
        const minutes = Math.floor(timeRemaining / 60);
        const seconds = timeRemaining % 60;
        const formattedTime = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        document.title = `${formattedTime} - FOCO`;
    }

    document.addEventListener('livewire:load', () => {
        updateDisplay();

        Livewire.on('pomodoroStatus', (data) => {
            timeRemaining = data.time_remaining;
            updateTitle();
            if (data.status === '{{ PomodoroStatusEnum::Running->value }}') {
                startTimer();
            } else if (data.status === '{{ PomodoroStatusEnum::Paused->value }}') {
                pauseTimer();
            }
        });

        if (timeRemaining > 0) {
            startTimer();
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        updateTitle();

        const focusButton = document.getElementById('setFocus');
        if (focusButton) {
            focusButton.focus();
        }
    });
</script>
