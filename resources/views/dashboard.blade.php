<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" x-data="{ tab: 'total'}">
                    <nav class="flex border-b border-gray-400 mb-4 bg-gray-50">
                        @if(Auth::user()->admin == 1)
                        <a :class="{ '!border-gray-100 bg-indigo-400 hover:bg-indigo-400 text-gray-900': tab === 'total' }" x-on:click.prevent="tab = 'total'" class="p-2 cursor-pointer hover:border-gray-100 hover:bg-gray-300 border-b-2 border-transparent text-sm w-28 text-gray-500 hover:text-gray-700">
                            <div class="flex flex-col items-center content-center justify-center w-full text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                                <span>Total</span>
                            </div>
                        </a>
                        @endif
                        <a :class="{ '!border-gray-100 bg-indigo-400 hover:bg-indigo-400 text-gray-900': tab === 'variety' }" x-on:click.prevent="tab = 'variety'" class="p-2 cursor-pointer hover:border-gray-100 hover:bg-gray-300 border-b-2 border-transparent text-sm w-28 text-gray-500 hover:text-gray-700">
                            <div class="flex flex-col items-center content-center justify-center w-full text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                </svg>
                                <span>Variety Show</span>
                            </div>
                        </a>
                        <a :class="{ '!border-gray-100 bg-indigo-400 hover:bg-indigo-400 text-gray-900': tab === 'portfolio' }" x-on:click.prevent="tab = 'portfolio'" class="p-2 cursor-pointer hover:border-gray-100 hover:bg-gray-300 border-b-2 border-transparent text-sm w-28 text-gray-500 hover:text-gray-700">
                            <div class="flex flex-col items-center content-center justify-center w-full text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                </svg>
                                <span>Portfolio</span>
                            </div>
                        </a>
                    </nav>
                    <div class="p-4 rounded-lg">
                        @if(Auth::user()->admin == 1)
                        <div x-show="tab === 'total'" x-transition>@livewire('total')</div>
                        @endif
                        <div x-show="tab === 'variety'" x-transition>@livewire('variety.index')</div>
                        <div x-show="tab === 'portfolio'" x-transition>@livewire('portfolio.index')</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
