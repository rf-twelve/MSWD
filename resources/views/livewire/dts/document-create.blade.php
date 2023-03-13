<div x-data="{disabled:true, finalize:false}" class="relative flex flex-col justify-center min-h-screen py-6 overflow-hidden bg-gray-50 sm:py-12">
    <div class="absolute inset-0 bg-[url(/img/grid.svg)] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]"></div>
    <div class="relative px-6 pt-10 pb-8 bg-white shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">
      <div class="max-w-md mx-auto">
        <div class="divide-y divide-gray-300/50">
          <div class="space-y-6 text-base leading-7 text-gray-600">

            <!-- This example requires Tailwind CSS v2.0+ -->
            <nav class="flex" aria-label="Breadcrumb">
              <ol role="list" class="flex items-center space-x-4">
                <li>
                  <div>
                    <a href="{{ route('user-dashboard',['user_id'=>Auth::user()->id]) }}" class="text-gray-400 hover:text-gray-500">
                      <!-- Heroicon name: solid/home -->
                      <x-icon.home class="flex-shrink-0 w-5 h-5"/>
                      <span class="sr-only">Home</span>
                    </a>
                  </div>
                </li>

                <li>
                  <div class="flex items-center">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                      <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                    </svg>
                    <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Document</a>
                  </div>
                </li>

                <li>
                  <div class="flex items-center">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                      <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                    </svg>
                    <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">Create</a>
                  </div>
                </li>
              </ol>
            </nav>

            <div class="relative">
              <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-gray-300"></div>
              </div>
              <div class="relative flex justify-center">
                <span class="px-3 text-xl font-bold text-gray-900 bg-white">Create Documents </span>
              </div>
            </div>
            <div class="mt-12">
              <form wire:submit.prevent="save" enctype="multipart/form-data" class="grid grid-cols-1 font-medium gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                <div class="space-y-1 sm:col-span-2">
                    <label for="tn" class="text-sm">Tracking Number :</label>
                    <x-input wire:model.lazy="editing.tn" id="tn" type="text" disabled/>
                    <x-comment> *Please print and attach tracking number to document correctly.</x-comment>
                </div>
                <div class="space-y-1 sm:col-span-2">
                    <label for="class" class="text-sm">Classification :</label><br>
                    <x-select wire:model.lazy="editing.class" id="class" class="w-full border">
                        <option value="">-Select document type-</option>
                        @foreach (App\Models\Doc::CLASS_OF_DOC as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </x-select>
                    @error('editing.class')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                </div>
                <div class="space-y-1 sm:col-span-2">
                    <label for="date" class="text-sm">Date :</label>
                    <x-input wire:model.lazy="editing.date" id="date" type="date" />
                    @error('editing.date')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                </div>
                @error('editing.title')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror

                {{-- Show this field if classification of document is a letter --}}
                @if ($editing['class'] == 'l')
                    <div class="space-y-1 sm:col-span-2">
                        <label for="received_by" class="text-sm">Received by :</label>
                        <x-input wire:model.lazy="editing.received_by" id="received_by" type="text" placeholder="Enter complete name"/>
                        @error('editing.received_by')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                    </div>
                    <div class="space-y-1 sm:col-span-2">
                        <label for="origin" class="text-sm">Origin :</label>
                        <x-input wire:model.lazy="editing.origin" id="origin" type="text" placeholder="Enter origin"/>
                        <x-comment> *Any sensitive information(amounts, names, etc.) are optional or not necessary.</x-comment>
                        @error('editing.origin')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                    </div>

                    <div class="space-y-1 sm:col-span-2">
                        <label for="nature" class="text-sm">Nature :</label>
                        <x-input wire:model.lazy="editing.nature" id="nature" type="text" placeholder="Enter nature"/>
                        <x-comment> *Any sensitive information(amounts, names, etc.) are optional or not necessary.</x-comment>
                        @error('editing.nature')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                    </div>

                @else
                    <div class="space-y-1 sm:col-span-2">
                        <label for="title" class="text-sm">Title :</label>
                        <x-input wire:model.lazy="editing.title" id="title" type="text" placeholder="Enter title"/>
                        <x-comment> *Any sensitive information(amounts, names, etc.) are optional or not necessary.</x-comment>
                    </div>
                    @error('editing.title')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                @endif


                <div class="space-y-1 sm:col-span-2">
                    <label class="text-sm">For :</label>
                    @foreach (App\Models\Doc::FOR as $value => $label)
                    <div class="flex items-center h-5">
                        <input wire:model='editing.for' value="{{ $value }}"  id="{{ $value }}" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        <label for="{{ $value }}" class="ml-3 text-sm font-medium text-gray-700">
                            {{ $label }}
                        </label>
                    </div>
                    @endforeach
                    @error('editing.for')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                </div>

                <div class="space-y-1 sm:col-span-2">
                    <label for="remarks" class="text-sm">Remarks :</label>
                    <div class="mt-1">
                        <textarea wire:model.lazy="editing.remarks" rows="4" id="remarks" class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                    </div>
                    @error('editing.remarks')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                </div>

                @if ($file_images)
                @foreach ($file_images as $image)
                <div class="relative">
                    <img src="{{ asset($image->name) }}" alt="Photo">
                    <button wire:click.prevent="removeImage({{ $image->id }})"
                        class="absolute top-0 px-2 py-1 text-sm italic text-white bg-red-500 rounded font-extralight hover:bg-blue-600">
                        <x-icon.trash class="w-4 h-4" /> Remove?
                    </button>
                </div>
                @endforeach
                @endif

                @if ($temp_images)
                @foreach ($temp_images as $image)
                <img src="{{ $image->temporaryUrl() }}" alt="Photo">
                @endforeach
                @endif

                <div class="space-y-1 sm:col-span-2">
                    <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Attach files(Optional) : </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="flex justify-center max-w-lg px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                            <label for="file-upload" class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span>Attach file(Optional) :</span>
                                <input id="file-upload" type="file" class="sr-only" multiple>
                            </label>
                            <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-2">
                  <div class="flex items-start">
                    <div class="flex-shrink-0">
                      <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
                      <button type="button" x-on:click="disabled = !disabled" :class="disabled ? 'bg-gray-200' : 'bg-indigo-600 '" class="relative inline-flex flex-shrink-0 h-6 transition-colors duration-200 ease-in-out border-2 border-transparent rounded-full cursor-pointer w-11 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" role="switch" aria-checked="false">
                        <span class="sr-only">Agree to policies</span>
                        <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                        <span aria-hidden="true" :class="disabled ? 'translate-x-0' : 'translate-x-5'" class="inline-block w-5 h-5 transition duration-200 ease-in-out transform bg-white rounded-full shadow ring-0"></span>
                      </button>
                    </div>
                    <div class="ml-3">
                      <p class="text-base text-gray-500">
                        By selecting this, you agree to the
                        <a href="{{ route('Privacy Policy') }}" class="font-medium text-gray-700 underline">Privacy Policy</a>
                      </p>
                    </div>
                  </div>
                </div>

                <div x-show="finalize" x-transition class="p-4 bg-gray-100 rounded-lg sm:col-span-2">
                    <div class="space-y-1 sm:col-span-2">
                        <label for="class" class="text-sm">Recipient Office :</label><br>
                        <x-select wire:model.lazy="recipient_office" id="class" class="w-full">
                            <option value="">-Select Registered Offices-</option>
                            {{-- @foreach (App\Models\Office::LIST as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach --}}
                        </x-select>
                        @error('recipient_office')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                    </div>

                    <div class="space-y-1 sm:col-span-2">
                        <label for="recipient_person" class="text-sm">Recipient Person :</label>
                        <x-input wire:model.lazy="recipient_person" id="recipient_person" type="text" placeholder="Enter title"/>
                        @error('recipient_person')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                    </div>
                    <div class="flex justify-end mt-4">
                        {{-- <x-button type="submit" x-bind:disabled="disabled" ::class="disabled ? '' : 'hover:bg-gray-200 bg-red-500'">
                            <span :class="disabled ? 'text-gray-200' : 'hover:bg-gray-200 text-white'">Close</span>
                        </x-button> --}}
                        <x-button wire:click="$set('is_draft', false)" type="submit" x-bind:disabled="disabled" ::class="disabled ? '' : 'bg-indigo-600 hover:bg-indigo-400'" class="ml-3">
                        <span :class="disabled ? 'text-gray-200' : 'text-white'">Submit</span>
                        </x-button>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <div class="flex justify-end">
                        <x-button wire:click="$set('is_draft', true)" type="submit" x-bind:disabled="disabled" ::class="disabled ? '' : 'hover:bg-gray-200'">
                            <span :class="disabled ? 'text-gray-200' : 'hover:bg-gray-200'">Save as Draft</span>
                        </x-button>
                        <x-button x-on:click="finalize = !finalize" type="button" x-bind:disabled="disabled" ::class="disabled ? '' : 'bg-indigo-600 hover:bg-indigo-400'" class="ml-3">
                        <span x-text="finalize ? 'Unfinalize' : 'Finalize'" :class="disabled ? 'text-gray-200' : 'text-white'"></span>
                        </x-button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
