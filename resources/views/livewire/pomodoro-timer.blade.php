<div class="bg-opacity-95 bg-focus rounded-lg shadow-lg p-6 w-1/4 text-center">
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
    let interval = null;
    let timeRemaining = 1500;
    let timerRunning = false;

    function updateDisplay() {
        const minutes = Math.floor(timeRemaining / 60);
        const seconds = timeRemaining % 60;
        document.getElementById("timerDisplay").textContent = 
            `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    }

    function startTimer() {
        document.getElementById("pauseTimer").style.display = "inline-flex";
        document.getElementById("skipTimer").style.display = "inline-flex";
        document.getElementById("startTimer").style.display = "none";

        if (!interval) {
            timerRunning = true;
            interval = setInterval(() => {
                if (timeRemaining > 0) {
                    timeRemaining--;
                    updateDisplay();
                } else {
                    clearInterval(interval);
                    interval = null;
                    timerRunning = false;
                }
            }, 1000);
        }
    }

    function pauseTimer() {
        if (timerRunning) {
            clearInterval(interval);
            interval = null;
            timerRunning = false;
            document.getElementById("pauseTimer").textContent = "RESUME";
        } else {
            startTimer();
            document.getElementById("pauseTimer").textContent = "PAUSE";
        }
    }

    function skipTimer() {
        timeRemaining = 5 * 60;
        updateDisplay();
        startTimer();
    }

    function setFocus() {
        timeRemaining = 25 * 60;
        updateDisplay();
        resetButtons();
    }

    function setBreak() {
        timeRemaining = 5 * 60;
        updateDisplay();
        resetButtons();
    }

    function setLongBreak() {
        timeRemaining = 15 * 60;
        updateDisplay();
        resetButtons();
    }

    function resetButtons() {
        clearInterval(interval);
        interval = null;
        timerRunning = false;
        document.getElementById("startTimer").style.display = "inline-flex";
        document.getElementById("pauseTimer").style.display = "none";
        document.getElementById("skipTimer").style.display = "none";
        document.getElementById("pauseTimer").textContent = "PAUSE";
    }

    document.getElementById("startTimer").addEventListener("click", startTimer);
    document.getElementById("pauseTimer").addEventListener("click", pauseTimer);
    document.getElementById("skipTimer").addEventListener("click", skipTimer);
    document.getElementById("setFocus").addEventListener("click", setFocus);
    document.getElementById("setBreak").addEventListener("click", setBreak);
    document.getElementById("setLongBreak").addEventListener("click", setLongBreak);

    updateDisplay();
</script>
