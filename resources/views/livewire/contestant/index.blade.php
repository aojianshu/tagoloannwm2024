<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contestants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @livewire('contestant.create')
                    <div class="overflow-x-auto relative rounded-lg border-gray-50 mt-2">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs uppercase bg-gray-100 border-b border-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 px-6">Name</th>
                                    <th scope="col" class="py-3 px-6">Number</th>
                                    <th scope="col" class="py-3 px-6"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contestants as $contestant)
                                <tr class="border-b border-gray-100">
                                    <th scope="row" class="py-4 px-6">{{ $contestant->name }}</th>
                                    <td class="py-4 px-6">#{{ $contestant->number }}</td>
                                    <td class="py-4 px-6 text-center">@livewire('contestant.update', ['contestant' => $contestant], key($contestant->id))</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
