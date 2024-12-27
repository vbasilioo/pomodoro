<div class="flex flex-col items-center justify-center">
    @if($isPurchased)
    <div class="flex">
        <div class="size-8 -m-1 bg-white rounded-full flex items-center justify-center relative overflow-hidden">
            <img src="{{ asset('images/04_pupil.svg') }}" class="size-5 absolute">
        </div>
        <div class="size-8 -m-1 bg-white rounded-full flex items-center justify-center relative overflow-hidden">
            <img src="{{ asset('images/04_pupil.svg') }}" class="size-5 absolute">
        </div>
    </div>
    <div class="w-16 h-3 bg-black border-4 opacity-60 rounded-full mt-2"></div>

    @else
    <div class="size-8 -m-1 flex items-center justify-center relative overflow-hidden">
        <img src="{{ asset('images/locked.svg') }}" class="size-5 absolute">
    </div>
    @endif
</div>