<div class="max-w-7xl mx-auto grid grid-cols-2 gap-8 text-gray-700 mt-2">
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    @foreach($contestants as $contestant)
        <div class="shadow-lg rounded-lg shadow-gray-400 px-2 py-4 flex justify-evenly flex-grow items-center border border-gray-400 space-x-4">
            <div class="w-full">
                <img src="{{ asset('assets/images/' . $contestant->name . '.png') }}" alt="">
            </div>
            <div class="text-center w-full">
                <h1 class="font-bold"><span class="font-light text-gray-400">{{ $contestant->number }}</span> - {{ $contestant->name }}</h1>
                <hr class="mb-4 border-gray-700">
                <div class="flex flex-col space-y-4">
                    @livewire('variety.score', ['contestant' => $contestant], key($contestant->id))
                    @livewire('portfolio.score', ['contestant' => $contestant], key($contestant->id))
                </div>
            </div>
        </div>
    @endforeach
</div>
