<div x-cloak x-data="{ openModal: false }">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <x-primary-button @click="openModal = !openModal" class="w-full justify-between">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
            </svg>
          Portfolio Making
        </div>
        @if(Auth::user()->admin != 1)
          @if(!$contestant->portfolio->where('judge_id', Auth::user()->judge->id)->isEmpty())
          <div>
            <span class="bg-gray-700 text-gray-200 rounded-full py-1 px-2">
              {{ $contestant->portfolio->where('judge_id', Auth::user()->judge->id)->first()->score }}
            </span>
          </div>
          @endif
        @endif
    </x-primary-button>
    <div x-show="openModal" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!--
          Background backdrop, show/hide based on modal state.

          Entering: "ease-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div
        x-show="openModal"
        x-transition:enter="ease-out duration"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!--
              Modal panel, show/hide based on modal state.

              Entering: "ease-out duration-300"
                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                To: "opacity-100 translate-y-0 sm:scale-100"
              Leaving: "ease-in duration-200"
                From: "opacity-100 translate-y-0 sm:scale-100"
                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            -->
            <form
            wire:submit.prevent="submitScore"
            x-show="openModal"
            x-trap="openModal"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            @click.outside="openModal = !openModal" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
              <div class="bg-gray-50 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                  <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-gray-800 sm:mx-0 sm:h-10 sm:w-10">
                    <!-- Heroicon name: outline/exclamation-triangle -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-100">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                      </svg>
                  </div>
                  <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                    <h3 class="text-lg font-medium leading-6 text-gray-700" id="modal-title">Score Contestant {{ $contestant->name }} | portfolio Show</h3>
                    <div class="text-xs my-1 text-gray-500">
                        <p class="font-semibold">Criteria for Judging</p>
                        <ul>
                            <li>Purpose and Clarity - 40%</li>
                            <li>Visual Appeal - 20%</li>
                            <li>Audience & Context - 20%</li>
                            <li>Effectiveness & Impact - 20%</li>
                        </ul>
                        <p class="mt-1"><span class="font-semibold">NOTE:</span> Enter score between 75 and 100. You can include decimals</p>
                    </div>
                    {{-- <input type="text" hidden name="contestant_id"> --}}
                    <div class="mt-2">
                        <div class="mb-4">
                            <label class="block uppercase text-xs font-bold mb-2" for="score">Score</label>
                            <x-text-input required class="w-full appearance-none" wire:model="score" id="score" type="text" name="score" :value="old('score')" autofocus autocomplete="score" ></x-text-input>
                            @error('score') <span class="text-red-400 text-xs font-bold">{{ $message }}</span> @enderror
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bg-gray-100 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <x-primary-button class="sm:ml-3" wire:loading.attr="disabled">
                  Submit Score
                  <div wire:loading>
                    <?xml version="1.0" ?><svg class="feather feather-loader h-5 w-5 animate-spin ml-2" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><line x1="12" x2="12" y1="2" y2="6"/><line x1="12" x2="12" y1="18" y2="22"/><line x1="4.93" x2="7.76" y1="4.93" y2="7.76"/><line x1="16.24" x2="19.07" y1="16.24" y2="19.07"/><line x1="2" x2="6" y1="12" y2="12"/><line x1="18" x2="22" y1="12" y2="12"/><line x1="4.93" x2="7.76" y1="19.07" y2="16.24"/><line x1="16.24" x2="19.07" y1="7.76" y2="4.93"/></svg>
                  </div>
                </x-primary-button>
                <x-secondary-button @click="openModal = !openModal">Cancel</x-secondary-button>
              </div>
            </form>
          </div>
        </div>
      </div>
      {{-- @if($loading)
      <div class="fixed inset-0 w-full h-screen z-50 bg-gray-900 bg-opacity-75">
        <div class="w-full h-screen bg-gray-900 bg-opacity-75 text-gray-100 flex items-center content-center justify-center">
          <p class="">Submitting ...</p>
        </div>
      </div>
      @endif --}}
</div>
