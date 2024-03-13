<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="overflow-x-auto relative">
        <table role="table" class="w-full text-sm text-left text-gray-900">
            <thead class="text-xs text-gray-700 uppercase">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        <button class="uppercase" wire:click="sortBy('number')">
                            Contestant Name
                        </button>
                    </th>
                    <th scope="col" class="py-3 px-6">Variety Show</th>
                    <th scope="col" class="py-3 px-6">Portfolio Making</th>
                    <th scope="col" class="py-3 px-6">
                        <button class="uppercase" wire:click="sortBy('score')">
                            Average
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contestants as $contestant)
                    <tr class="bg-gray-100 border-b border-b-gray-300">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                            <span class="text-xs text-gray-500">{{ $contestant->number }}</span> - {{ $contestant->name }}
                        </th>
                        <td class="py-4 px-6">
                            {{ is_null($contestant->variety->avg('score')) ? '0' : $contestant->variety->avg('score') }}
                        </td>
                        <td class="py-4 px-6">
                            {{ is_null($contestant->portfolio->avg('score')) ? '0' : $contestant->portfolio->avg('score') }}
                        </td>
                        <td class="py-4 px-6 font-bold">
                            {{ round($contestant->score, 3) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
