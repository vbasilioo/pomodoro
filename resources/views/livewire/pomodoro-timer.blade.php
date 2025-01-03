<div class="bg-opacity-20 bg-white rounded-lg shadow-lg p-6 w-1/4 text-center">
    <div class="flex justify-center items-center gap-4 mb-6">
        <button wire:click="setFocus" class="px-4 h-8 rounded-md font-bold hover:bg-white focus:bg-white shadow-sm">FOCUS</button>
        <button wire:click="setBreak" class="px-4 h-8 rounded-md font-bold hover:bg-white focus:bg-white shadow-sm">BREAK</button>
        <button wire:click="setLongBreak" class="px-4 h-8 rounded-md font-bold hover:bg-white focus:bg-white shadow-sm">LONG BREAK</button>
    </div>

    <div class="text-7xl font-extrabold mb-6 text-white">
        {{ gmdate("i:s", $timeRemaining) }}
    </div>

    <button wire:click="startTimer" class="bg-white border-4 border-b-8 justify-start flex border-black px-4 py-2 rounded-md font-bold">
        START
    </button>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('timerStarted', (timeRemaining) => {
            console.log('Timer Started:', timeRemaining);
        });

        Livewire.on('updateTimeRemaining', (timeRemaining) => {
            console.log('Time Remaining update:', timeRemaining);
        });
    });
</script>
