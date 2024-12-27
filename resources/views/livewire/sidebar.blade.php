<div>
    <button class="absolute top-4 right-4 text-white focus:outline-none" wire:click="toggleSideBar">
        @if ($isOpen)
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        @else
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        @endif
    </button>

    <div class="fixed top-0 right-0 h-full w-2/5 bg-sideBar shadow-lg transform {{ $isOpen ? '' : 'translate-x-full' }} transition-transform duration-300 overflow-y-auto">
        <div class="p-6">

            <h2 class="text-3xl font-bold text-center mb-6">FocusFriend.io</h2>

            <div class="flex items-center justify-between mb-8">
                <span class="text-lg font-bold">Focus Points:</span>
                <span class="text-xl font-bold">0</span>
            </div>

            <div class="grid grid-cols-5 gap-0 mb-8">
                <button wire:click="changeBackgroundColor('bg-primaryPurple')" class="bg-primaryPurple w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200">
                    @livewire('face-button', ['isPurchased' => true])
                </button>
                <button wire:click="changeBackgroundColor('bg-primaryBlue')" class="bg-primaryBlue w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200 -ml-2">
                    @livewire('face-button', ['isPurchased' => true])
                </button>
                <button class="bg-primaryOrange w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200 -ml-4">
                    @livewire('face-button', ['isPurchased' => false])
                </button>
                <button class="bg-primaryYellow w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200 -ml-6">
                    @livewire('face-button', ['isPurchased' => false])
                </button>
                <button class="bg-primaryGreen w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200 -ml-8">
                    @livewire('face-button', ['isPurchased' => false])
                </button>
            </div>

            <div class="grid grid-cols-5 gap-0 mb-8">
                <button class="bg-primaryPink w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200">
                    @livewire('face-button', ['isPurchased' => false])
                </button>
                <button class="bg-primaryDefault w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200 -ml-2">
                    @livewire('face-button', ['isPurchased' => false])
                </button>
                <button class="bg-primaryDefault w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200 -ml-4">
                    @livewire('face-button', ['isPurchased' => false])
                </button>
                <button class="bg-primaryDefault w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200 -ml-6">
                    @livewire('face-button', ['isPurchased' => false])
                </button>
                <button class="bg-primaryDefault w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200 -ml-8">
                    @livewire('face-button', ['isPurchased' => false])
                </button>
            </div>

            <div class="mb-8">
                <h3 class="text-xl font-bold mb-4">Settings</h3>
                <div class="flex items-center mb-4">
                    <input type="radio" name="settings" id="standard" class="mr-2">
                    <label for="standard" class="text-lg font-medium">Standard</label>
                </div>
                <div class="flex items-center mb-4">
                    <input type="radio" name="settings" id="custom" class="mr-2">
                    <label for="custom" class="text-lg font-medium">Custom</label>
                </div>
                <div class="flex items-center justify-between mb-4">
                    <span class="text-lg">Auto Start Focus</span>
                    <input type="checkbox" class="toggle">
                </div>
                <div class="flex items-center justify-between mb-4">
                    <span class="text-lg">Auto Start Breaks</span>
                    <input type="checkbox" class="toggle">
                </div>
            </div>

            <div class="text-center">
                <button class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600">
                    Report Bug
                </button>
            </div>
        </div>
    </div>
</div>