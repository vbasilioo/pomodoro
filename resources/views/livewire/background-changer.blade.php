<div>
    <div class="grid grid-cols-5 gap-0 mb-8">
        @foreach ($products as $product)
            @php
                $context = $product->context;
                $colorClass = 'bg-' . $context;
                $isPurchased = in_array($product->id, $userProducts);
            @endphp
            <button wire:click="changeBackgroundColor({{ $product->id }}, {{ $isPurchased ? 'true' : 'false' }})"
                    class="{{ $colorClass }} w-full h-28 rounded-lg flex items-center justify-center text-white focus:border-4 focus:border-black transform hover:scale-110 transition-transform duration-200">
                <div class="flex flex-col items-center justify-center">
                    @if($isPurchased)
                        <div class="flex">
                            <div
                                class="size-8 -m-1 bg-white rounded-full flex items-center justify-center relative overflow-hidden">
                                <img src="{{ asset('images/04_pupil.svg') }}" class="size-5 absolute">
                            </div>
                            <div
                                class="size-8 -m-1 bg-white rounded-full flex items-center justify-center relative overflow-hidden">
                                <img src="{{ asset('images/04_pupil.svg') }}" class="size-5 absolute">
                            </div>
                        </div>
                        <div class="w-16 h-3 bg-black border-4 opacity-60 rounded-full mt-2"></div>
                    @else
                        <div class="size-16 -m-1 flex flex-col justify-center items-center relative">
                            <div class="absolute inset-0 flex flex-col justify-center items-center">
                                <img src="{{ asset('images/locked.svg') }}" alt="Imagem de um cadeado" class="w-8 h-8">
                                <div class="flex items-center justify-center mt-2">
                                    <img src="{{ asset('images/focuspoints_icon.svg') }}" alt="Icone dos focus points"
                                         class="size-4">
                                    <span class="text-black font-extrabold ml-2">{{ $product->price }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </button>
        @endforeach
    </div>
</div>
