<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="overflow-x-auto relative">
        <h1>Variety Show Scores</h1>
        <table role="table" class="w-full text-sm text-left">
            <thead class="text-xs text-gray-500 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        <button class="uppercase" wire:click="sortBy('number')">
                            Contestant Name
                        </button>
                    </th>
                    @foreach($judges as $judge)
                        <th scope="col" class="py-3 px-6">
                            {{ $judge->fullName() }}'s Score
                        </th>
                    @endforeach
                    <th scope="col" class="py-3 px-6">
                        <button class="uppercase" wire:click="sortBy('score')">
                            Average
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($contestants as $contestant)
                    <tr class="bg-gray-100 border-b border-b-gray-200">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-700 whitespace-nowrap">
                            <span class="text-xs text-gray-500">{{ $contestant->number }}</span> - {{ $contestant->name }}
                        </th>
                        @foreach($judges as $judge)
                            <td class="py-4 px-6 text-center">
                                @if(!empty($judge->variety->where('contestant_id', $contestant->id)->first()))
                                {{ $judge->variety->where('contestant_id', $contestant->id)->first()->score }}
                                @else
                                <span class="text-red-400">0</span>
                                @endif
                            </td>
                        @endforeach
                        <td class="py-4 px-6 font-bold text-gray-900 text-center">
                            {{ round($contestant->score, 3) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
