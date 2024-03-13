<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Judges') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @livewire('judge.create')
                    <div class="overflow-x-auto relative rounded-lg border-gray-50 mt-2">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs uppercase bg-gray-100 border-b border-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 px-6">Name</th>
                                    <th scope="col" class="py-3 px-6">Email</th>
                                    <th scope="col" class="py-3 px-6"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($judges as $judge)
                                <tr class="border-b border-gray-100">
                                    <th scope="row" class="py-4 px-6">{{ $judge->fullName() }}</th>
                                    <td class="py-4 px-6">{{ $judge->user->email }}</td>
                                    <td class="py-4 px-6 text-center">@livewire('judge.update', ['judge' => $judge], key($judge->id))</td>
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
