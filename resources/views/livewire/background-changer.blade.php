<div>
    <div class="grid grid-cols-5 gap-0 mb-8">
        <button wire:click="changeBackgroundColor('bg-primaryPurple', true)" class="bg-primaryPurple w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200">
            @livewire('face-button', [true])
        </button>
        <button wire:click="changeBackgroundColor('bg-primaryBlue', true)" class="bg-primaryBlue w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200 -ml-2">
            @livewire('face-button', [true])
        </button>
        <button wire:click="changeBackgroundColor('bg-primaryOrange', true)" class="bg-primaryOrange w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200 -ml-4">
            @livewire('face-button', [true])
        </button>
        <button wire:click="changeBackgroundColor('bg-primaryYellow', true)" class="bg-primaryYellow w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200 -ml-6">
            @livewire('face-button', [true])
        </button>
        <button wire:click="changeBackgroundColor('bg-primaryGreen', false)" class="bg-primaryGreen w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200 -ml-8">
            @livewire('face-button', [false])
        </button>
    </div>

    <div class="grid grid-cols-5 gap-0 mb-8">
        <button wire:click="changeBackgroundColor('bg-primaryGreen', false)" class="bg-primaryPink w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200">
            @livewire('face-button', [false])
        </button>
        <button wire:click="changeBackgroundColor('bg-primaryGreen', false)" class="bg-primaryDefault w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200 -ml-2">
            @livewire('face-button', [false])
        </button>
        <button wire:click="changeBackgroundColor('bg-primaryGreen', false)" class="bg-primaryDefault w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200 -ml-4">
            @livewire('face-button', [false])
        </button>
        <button wire:click="changeBackgroundColor('bg-primaryGreen', false)" class="bg-primaryDefault w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200 -ml-6">
            @livewire('face-button', [false])
        </button>
        <button wire:click="changeBackgroundColor('bg-primaryGreen', false)" class="bg-primaryDefault w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200 -ml-8">
            @livewire('face-button', [false])
        </button>
    </div>
</div>