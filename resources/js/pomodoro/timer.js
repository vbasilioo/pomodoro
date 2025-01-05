export function initializePomodoroTimer() {
    let interval = null;
    let timeRemaining = 15;
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
                    notifyPomodoroComplete();
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

    document.getElementById("startTimer").addEventListener("click", startTimer);
    document.getElementById("pauseTimer").addEventListener("click", pauseTimer);
    document.getElementById("skipTimer").addEventListener("click", skipTimer);
    document.getElementById("setFocus").addEventListener("click", () => {
        timeRemaining = 25 * 60;
        updateDisplay();
    });
    document.getElementById("setBreak").addEventListener("click", () => {
        timeRemaining = 5 * 60;
        updateDisplay();
    });
    document.getElementById("setLongBreak").addEventListener("click", () => {
        timeRemaining = 15 * 60;
        updateDisplay();
    });

    updateDisplay();
}
