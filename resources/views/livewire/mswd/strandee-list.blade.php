<div class="min-h-screen bg-gray-100 ">

    <div class="flex flex-col">
        <main class="flex-1">

            <!-- Topbar Desktop -->
            <x-topbar-desktop>
                <li class="flex">
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"aria-hidden="true">
                            <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                        </svg>
                        <a href="{{ route('user-dashboard',['user_id'=> auth()->user()->id]) }}" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                            Dashboard
                        </a>
                    </div>
                </li>
                <li class="flex">
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"aria-hidden="true">
                            <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                        </svg>
                        <a href="#" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                            List of Strandee
                        </a>
                    </div>
                </li>
            </x-topbar-desktop>
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="sm:flex">
                <div class="flex items-center flex-1 my-2">
                    <div class="w-full lg:max-w-xs">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative w-full pl-2 pr-2">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <x-icon.search class="w-5 h-5 text-gray-500" />
                            </div>
                            <x-input wire:model.debounce.500ms="filters.search" id="searchTerm"
                                class="block w-full py-2 pl-10 pr-3 leading-5 placeholder-gray-500 bg-white border border-gray-300 rounded-xl focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Search" placeholder="Type any keyword..." type="search" />
                        </div>
                    </div>
                    <a target="_blank"
                        href="{{ route('mswd/strandee/print-list/all',['user_id'=>auth()->user()->id]) }}"
                        class="flex ml-3 text-indigo-600 hover:text-indigo-900">
                        <x-icon.printer class="w-5 h-5" /><span class="text-sm">Print List</span>
                    </a>
                </div>
                <div class="flex justify-between px-2 my-2 space-x-2">
                    <div>
                        <x-button wire:click="toggleCreateRecordModal()"
                            class="flex w-full px-3 py-2 placeholder-gray-400 border border-gray-300 shadow-sm appearance-none rounded-xl focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <x-icon.plus class="w-5 font-light" /> <p>Create</p>
                        </x-button>
                    </div>
                    <div class="flex justify-end space-x-1">
                        <div>
                            <x-select wire:model.debounce.500ms="filters.per-page"  id="perPage">
                                <option value="10">10 / page</option>
                                <option value="25">25 / page</option>
                                <option value="50">50 / page</option>
                                <option value="100">100 / page</option>
                            </x-select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sm:px-2 lg:px-4">
                <div class="flex flex-col mt-4">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden rounded-none shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg md:rounded-lg">
                        <x-table>
                            <x-slot name="head">
                                <x-table.head class="px-2 py-1">
                                </x-table.head>
                                <x-table.head class="px-2 py-1" sortable wire:click="sortBy('date')"
                                    :direction="$filters['sort-field'] === 'date' ? $filters['sort-direction'] : null">
                                    DATE
                                </x-table.head>
                                <x-table.head class="py-1">
                                    PHOTO
                                </x-table.head>
                                <x-table.head class="px-2 py-1" sortable wire:click="sortBy('name')"
                                    :direction="$filters['sort-field'] === 'name' ? $filters['sort-direction'] : null">
                                    NAME
                                </x-table.head>
                                <x-table.head class="px-2 py-1" sortable wire:click="sortBy('address')"
                                    :direction="$filters['sort-field'] === 'address' ? $filters['sort-direction'] : null">
                                    ADDRESS
                                </x-table.head>
                                <x-table.head class="px-2 py-1" sortable wire:click="sortBy('age')"
                                    :direction="$filters['sort-field'] === 'age' ? $filters['sort-direction'] : null">
                                    AGE
                                </x-table.head>
                                <x-table.head class="px-2 py-1" sortable wire:click="sortBy('birthday')"
                                    :direction="$filters['sort-field'] === 'birthday' ? $filters['sort-direction'] : null">
                                    BIRTHDAY
                                </x-table.head>
                                <x-table.head class="px-2 py-1" sortable wire:click="sortBy('problem_presented')"
                                    :direction="$filters['sort-field'] === 'problem_presented' ? $filters['sort-direction'] : null">
                                    PROBLEM
                                </x-table.head>
                                <x-table.head class="px-2 py-1" sortable wire:click="sortBy('intervention')"
                                    :direction="$filters['sort-field'] === 'intervention' ? $filters['sort-direction'] : null">
                                    INTERVENTION
                                </x-table.head>
                            </x-slot>

                            <x-slot name="body">
                                @if($selectPage)
                                <x-table.row class="bg-gray-300" wire:key="row-message">
                                    <x-table.cell colspan="9" class="py-2">
                                        @unless ($selectAll)
                                        <div>
                                            <span>You have selected <strong>{{ $records->count() }}</strong> records, do you
                                                want to select all <strong>{{ $records->total() }}</strong>?</span>
                                            <x-button wire:click="selectAll" class="ml-1 text-blue-500">Select All
                                            </x-button>
                                        </div>
                                        @else
                                        <span>You have selected all <strong>{{ $records->total() }}</strong> records.</span>
                                        @endIf
                                    </x-table.cell>
                                </x-table.row>
                                @endif

                                @forelse ($records as $item)
                                <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $item->id }}" class="text-gray-600 hover:bg-blue-100">
                                    <x-table.cell class="max-w-2xl">
                                        <div class="flex justify-center space-x-2">

                                            <x-button class="px-2 rounded-xl hover:text-white hover:bg-blue-500" wire:click="toggleView({{ $item->id }})">
                                                <x-icon.view class="w-5 h-5" />
                                            </x-button>

                                            <x-button class="px-2 rounded-xl hover:text-white hover:bg-blue-500" wire:click="toggleEditRecordModal({{ $item->id }})">
                                                <x-icon.edit class="w-5 h-5" />
                                            </x-button>

                                            <x-button class="px-2 rounded-xl hover:text-white hover:bg-red-500" wire:click="toggleDeleteSingleRecordModal({{ $item->id }})">
                                                <x-icon.trash class="w-5 h-5" />
                                            </x-button>
                                        </div>
                                    </x-table.cell>
                                    <x-table.cell class="space-y-2">
                                        <span>{{ $item['date'] }}</span>
                                    </x-table.cell>
                                    <x-table.cell class="space-y-2 text-center">
                                        <span>
                                            <img src="{{ $item->imageUrl() }}" alt="Photo" class="flex-none w-12 h-12 border border-gray-200 rounded-md">
                                        </span>
                                    </x-table.cell>
                                    <x-table.cell class="space-y-2">
                                        <span>{{ $item['name'] }}</span>
                                    </x-table.cell>
                                    <x-table.cell class="space-y-2">
                                        <span>{{ $item['address'] }}</span>
                                    </x-table.cell>
                                    <x-table.cell class="space-y-2">
                                        <span>{{ $item['age'] }}</span>
                                    </x-table.cell>
                                    <x-table.cell class="space-y-2">
                                        <span>{{ $item['birthday'] }}</span>
                                    </x-table.cell>
                                    <x-table.cell class="space-y-2">
                                        <span>{{ $item['problem_presented'] }}</span>
                                    </x-table.cell>
                                    <x-table.cell class="space-y-2">
                                        <span>{{ $item['intervention'] }}</span>
                                    </x-table.cell>
                                </x-table.row>
                                @empty
                                <x-table.row wire:loading.class.delay="opacity-50">
                                    <x-table.cell colspan="8">
                                        <div class="flex items-center justify-center">
                                            <x-icon.box-empty class="w-8 h-8 text-slate-400" />
                                            <span class="px-2 py-8 text-xl font-medium text-slate-400">No Records
                                                found...</span>
                                        </div>
                                    </x-table.cell>
                                </x-table.row>
                                @endforelse
                                <x-table.row class="bg-gray-300" wire:key="row-message">
                                    <x-table.cell colspan="8" class="">
                                        {{ $records->links('vendor.livewire.modified-tailwind') }}
                                    </x-table.cell>
                                </x-table.row>
                            </x-slot>
                        </x-table>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>


        <!-- Strandee Form -->
        <div>
            <x-modal.dialog wire:model="showFormModal" maxWidth="sm">
                <x-slot name="title">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                        <span>STRANDEE FORM</span>
                    </div>
                </x-slot>

                <x-slot name="content">
                    <div class="mb-4 space-y-3 overflow-y-auto max-h-96">
                        <div class="space-y-1 sm:col-span-2">
                            <label for="date" class="text-sm">DATE :</label>
                            <x-input wire:model.lazy="date" id="date" type="date"/>
                            @error('date')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="name" class="text-sm">COMPLETE NAME :</label>
                            <x-input wire:model.lazy="name" id="name" type="text"/>
                            @error('name')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="address" class="text-sm">ADDRESS :</label>
                            <x-form.text-area wire:model.lazy="address" id="address" rows="3"></x-form.text-area>
                            @error('address')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="birthday" class="text-sm">BIRTHDATE :</label>
                            <x-input wire:model.lazy="birthday" id="birthday" type="date"/>
                            @error('birthday')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="age" class="text-sm">AGE :</label>
                            <x-input wire:model.lazy="age" id="age" type="number"/>
                            @error('age')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="problem_presented" class="text-sm">PROBLEM PRESENTED :</label>
                            <x-form.text-area wire:model.lazy="problem_presented" id="problem_presented" rows="3"></x-form.text-area>
                            @error('problem_presented')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="intervention" class="text-sm">INTERVENTION :</label>
                            <x-form.text-area wire:model.lazy="intervention" id="intervention" rows="3"></x-form.text-area>
                            @error('intervention')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        {{-- @if ($file_images)
                        @foreach ($file_images as $image)
                        <div class="relative">
                            <img src="{{ asset($image->name) }}" alt="Photo">
                            <button wire:click.prevent="removeImage({{ $image->id }})"
                                class="absolute top-0 px-2 py-1 text-sm italic text-white bg-red-500 rounded font-extralight hover:bg-blue-600">
                                <x-icon.trash class="w-4 h-4" /> Remove?
                            </button>
                        </div>
                        @endforeach
                        @endif --}}

                        @if ($image && is_null($temp_image))
                            <img src="{{ $image }}" alt="Photo">
                        @endif

                        @if ($temp_image)
                            <img src="{{ $temp_image->temporaryUrl() }}" alt="Photo">
                        @endif

                        <div class="space-y-1 sm:col-span-2">
                            <label for="cover-photo" class="block text-sm text-gray-700 sm:mt-px sm:pt-2"> UPLOAD PHOTO (Optional) : </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="flex justify-center max-w-lg px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                    <label for="file-upload" class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Click here to attach file</span>
                                        <input wire:model="temp_image" id="file-upload" type="file" class="sr-only">
                                    </label>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG/JPG up to 10MB</p>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </x-slot>

                <x-slot name="footer">
                    <x-button wire:click="closeRecord()" type="button" class="text-white bg-gray-400 hover:bg-gray-500">
                        {{ __('Cancel') }}
                    </x-button>
                    <x-button wire:click="saveRecord()" type="button" class="hover:bg-blue-500 hover:text-white">
                        {{ __('Save') }}
                    </x-button>
                </x-slot>
            </x-modal.dialog>
        </div>

        <!-- Delete Single Record Modal -->
        <div>
            <form wire:submit.prevent="deleteSingleRecord">
                <x-modal.confirmation wire:model.defer="showDeleteSingleRecordModal" selectedIcon="delete">
                    <x-slot name="title">Delete Record</x-slot>

                    <x-slot name="content">
                        <div class="py-8 text-gray-700">Are you sure you? This action is irreversible.</div>
                    </x-slot>

                    <x-slot name="footer">
                        <x-button type="button" wire:click="$set('showDeleteSingleRecordModal', false)">Cancel</x-button>

                        <x-button type="submit">Delete</x-button>
                    </x-slot>
                </x-modal.confirmation>
            </form>
        </div>

        <!-- Delete Single Record Modal -->
        <div>
            <form wire:submit.prevent="deleteSelectedRecord">
                <x-modal.confirmation wire:model.defer="showDeleteSelectedRecordModal" selectedIcon="delete">
                    <x-slot name="title">Delete Selected Record</x-slot>

                    <x-slot name="content">
                        <div class="py-8 text-gray-700">Are you sure you? This action is irreversible.</div>
                    </x-slot>

                    <x-slot name="footer">
                        <x-button type="button" wire:click.prevent="$set('showDeleteSelectedRecordModal', false)">Cancel</x-button>

                        <x-button type="submit">Delete</x-button>
                    </x-slot>
                </x-modal.confirmation>
            </form>
        </div>


        </main>
    </div>
</div>
