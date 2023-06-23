<div class="min-h-screen bg-gray-100">

    <div class="flex flex-col">
        <main class="flex-1">

            <!-- Topbar Desktop -->
            <x-topbar-desktop>
                <li class="flex">
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44"
                            preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                        </svg>
                        <a href="{{ route('user-dashboard',['user_id'=> auth()->user()->id]) }}"
                            class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                            Dashboard
                        </a>
                    </div>
                </li>
                <li class="flex">
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44"
                            preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                        </svg>
                        <a href="#" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                            Minor Traveling Abroad
                        </a>
                    </div>
                </li>
            </x-topbar-desktop>
            <div x-data="{ advance_search: false }" class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="sm:flex">

                    <div class="flex items-center flex-1 mt-2">
                        <div class="w-full lg:w-96">
                            <div class="relative mx-2 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center">
                                <label for="combo-search" class="sr-only">combo-search</label>
                                <select wire:model.debounce.500ms="filters.sort-field" id="combo-search" class="h-full py-0 pl-2 pr-2 text-gray-500 bg-transparent border-transparent rounded-md focus:border-transparent sm:text-sm">
                                    <option value="date">Date</option>
                                    <option value="name">Name</option>
                                    <option value="birthdate">Birthdate</option>
                                    <option value="destination">Destination</option>
                                    <option value="traveling_companion">Companion</option>
                                    <option value="address">Address</option>
                                    <option value="parents">Parents</option>
                                    <option value="status">Status</option>
                                    <option value="remarks">Remarks</option>
                                </select>
                                <x-icon.search class="w-5 h-5 text-gray-500" />

                            </div>
                            <x-input wire:model.debounce.500ms="filters.search" id="searchTerm"
                                class="block w-full pr-3 leading-5 placeholder-gray-500 bg-white border border-gray-300 pl-36 lg:pl-32 rounded-xl focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Search" placeholder="Type any keyword..." type="search" />
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between px-2 my-2 space-x-2">
                        <div>
                            <x-button wire:click="toggleCreateRecordModal()"
                                class="flex w-full px-3 py-2 placeholder-gray-400 border border-gray-300 shadow-sm appearance-none rounded-xl focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <x-icon.plus class="w-5 font-light" />
                                <p>Create</p>
                            </x-button>

                        </div>
                        <div class="flex justify-end space-x-1">
                            <div>
                                <x-select wire:model.debounce.500ms="filters.per-page" id="perPage">
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
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div
                                    class="overflow-hidden rounded-none shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg md:rounded-lg">
                                    <x-table>
                                        <x-slot name="head" class="uppercase">
                                            <x-table.head class="px-2 py-1">
                                                {{--
                                                <x-checkbox wire:model="selectPage" /> --}}
                                            </x-table.head>
                                            <x-table.head class="px-2 py-1">
                                                MTA NO.
                                            </x-table.head>
                                            <x-table.head class="px-2 py-1">
                                                DATE
                                            </x-table.head>
                                            <x-table.head class="px-2 py-1">
                                                FULLNAME
                                            </x-table.head>
                                            <x-table.head class="px-2 py-1">
                                                BIRTHDATE
                                            </x-table.head>
                                            <x-table.head class="w-10 px-2 py-1">
                                                DESTINATION
                                            </x-table.head>
                                            <x-table.head class="w-10 px-2 py-1">
                                                TRAVELING COMPANION
                                            </x-table.head>
                                            <x-table.head class="px-2 py-1">
                                                ADDRESS
                                            </x-table.head>
                                            <x-table.head class="px-2 py-1">
                                                PARENTS
                                            </x-table.head>
                                            <x-table.head class="px-2 py-1">
                                                STATUS
                                            </x-table.head>
                                            <x-table.head class="px-2 py-1">
                                                REMARKS
                                            </x-table.head>
                                        </x-slot>

                                        <x-slot name="body">
                                            {{-- @if($selectPage)
                                            <x-table.row class="bg-gray-300" wire:key="row-message">
                                                <x-table.cell colspan="9" class="py-2">
                                                    @unless ($selectAll)
                                                    <div>
                                                        <span>You have selected <strong>{{ $records->count() }}</strong>
                                                            records, do you
                                                            want to select all <strong>{{ $records->total()
                                                                }}</strong>?</span>
                                                        <x-button wire:click="selectAll" class="ml-1 text-blue-500">
                                                            Select All
                                                        </x-button>
                                                    </div>
                                                    @else
                                                    <span>You have selected all <strong>{{ $records->total() }}</strong>
                                                        records.</span>
                                                    @endIf
                                                </x-table.cell>
                                            </x-table.row>
                                            @endif --}}

                                            @forelse ($records as $item)
                                            <x-table.row wire:loading.class.delay="opacity-50"
                                                x-data="{ option_list: false }"
                                                wire:key="row-{{ $item->id }}" class="text-gray-600 hover:bg-blue-100">
                                                <x-table.cell class="max-w-2xl">
                                                    <div class="max-w-lg mx-auto">
                                                        <a x-on:click="option_list = ! option_list" href="#"
                                                            class="flex p-1 bg-gray-300 rounded-md">
                                                            <x-icon.dots-vertical class="w-4 h-4" />
                                                            <div :class="option_list ? 'rotate-90' : ''">
                                                                <x-icon.chevron-right class="w-4 h-4" />
                                                            </div>
                                                        </a>
                                                        <!-- Dropdown menu -->
                                                        <div x-show="option_list" @click.away="option_list = false"
                                                            class="absolute my-2 text-base list-none bg-white divide-y divide-gray-100 rounded shadow">
                                                            <ul class="py-1">
                                                                <li>
                                                                    <a wire:click="toggleView({{ $item->id }})" href="#"
                                                                        class="flex px-2 py-1">
                                                                        <x-icon.view class="w-5 h-5 mr-2" /> View
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a wire:click="toggleEditRecordModal({{ $item->id }})"
                                                                        href="#" class="flex px-2 py-1">
                                                                        <x-icon.edit class="w-5 h-5 mr-2" /> Edit
                                                                    </a>
                                                                </li>
                                                                {{-- <li>
                                                                    <a wire:click="toggleCertificate({{ $item->id }})"
                                                                        href="#" target="_blank" class="flex px-2 py-1">
                                                                        <x-icon.printer class="w-5 h-5 mr-2" />
                                                                        Certificate
                                                                    </a>
                                                                </li> --}}
                                                                <li>
                                                                    <a wire:click="toggleDeleteSingleRecordModal({{ $item->id }})"
                                                                        href="#" class="flex px-2 py-1">
                                                                        <x-icon.trash class="w-5 h-5 mr-2" /> Delete
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </x-table.cell>
                                                <x-table.cell>
                                                    <span>{{$item['mta_no']}}</span>
                                                </x-table.cell>
                                                <x-table.cell>
                                                    <span>{{$item['date']}}</span>
                                                </x-table.cell>
                                                <x-table.cell>
                                                    <span>{{$item['name']}}</span>
                                                </x-table.cell>
                                                <x-table.cell>
                                                    <span>{{$item['birthdate']}}</span>
                                                </x-table.cell>
                                                <x-table.cell>
                                                    <span>{{$item['destination']}}</span>
                                                </x-table.cell>
                                                <x-table.cell>
                                                    <span>{{$item['traveling_companion']}}</span>
                                                </x-table.cell>
                                                <x-table.cell>
                                                    <span>{{$item['address']}}</span>
                                                </x-table.cell>
                                                <x-table.cell>
                                                    <span>{{$item['parents']}}</span>
                                                </x-table.cell>
                                                <x-table.cell>
                                                    <span>{{$item['status']}}</span>
                                                </x-table.cell>
                                                <x-table.cell>
                                                    <span>{{$item['remarks']}}</span>
                                                </x-table.cell>

                                            </x-table.row>
                                            @empty
                                            <x-table.row wire:loading.class.delay="opacity-50">
                                                <x-table.cell colspan="14">
                                                    <div class="flex items-center justify-center">
                                                        <x-icon.box-empty class="w-8 h-8 text-slate-400" />
                                                        <span class="px-2 py-8 text-xl font-medium text-slate-400">No
                                                            Records
                                                            found...</span>
                                                    </div>
                                                </x-table.cell>
                                            </x-table.row>
                                            @endforelse
                                            <x-table.row class="bg-gray-300" wire:key="row-message">
                                                <x-table.cell colspan="14" class="">
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
            <!--Form -->
            <div>
                <x-modal.dialog wire:model="showFormModal" maxWidth="md">
                    <x-slot name="title">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                            <span class="uppercase">{{ $form_type }} FORM</span>
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        <div class="mb-4 space-y-3 overflow-y-auto max-h-96">
                            <div class="space-y-1 sm:col-span-2">
                                <label for="mta_no" class="text-sm">MTA Number :</label>
                                <x-input wire:model.lazy="mta_no" id="mta_no" type="text" disabled />
                                @error('mta_no')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                            </div>
                            <div class="space-y-1 sm:col-span-2">
                                <label for="date" class="text-sm">Date :</label>
                                <x-input wire:model.lazy="date" id="date" type="date" />
                                @error('date')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                            </div>
                            <div class="space-y-1 sm:col-span-2">
                                <label for="name" class="text-sm">Fullname :</label>
                                <x-input wire:model.lazy="name" id="name" type="text"
                                    placeholder="Enter value ex. 123" />
                                @error('name')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                            </div>
                            <div class="space-y-1 sm:col-span-2">
                                <label for="birthdate" class="text-sm">Birthdate :</label>
                                <x-input wire:model.lazy="birthdate" id="birthdate" type="date" />
                                @error('birthdate')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                            </div>
                            <div class="space-y-1 sm:col-span-2">
                                <label for="destination" class="text-sm">Destination :</label>
                                <x-form.text-area wire:model.lazy="destination" id="destination" rows="3"></x-form.text-area>
                                @error('destination')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                            </div>
                            <div class="space-y-1 sm:col-span-2">
                                <label for="traveling_companion" class="text-sm">Traveling Companion :</label>
                                <x-form.text-area wire:model.lazy="traveling_companion" id="traveling_companion" rows="3"></x-form.text-area>
                                @error('traveling_companion')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                            </div>
                            <div class="space-y-1 sm:col-span-2">
                                <label for="address" class="text-sm">Address :</label>
                                <x-form.text-area wire:model.lazy="address" id="address" rows="3"></x-form.text-area>
                                @error('address')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                            </div>
                            <div class="space-y-1 sm:col-span-2">
                                <label for="parents" class="text-sm">Parents :</label>
                                <x-form.text-area wire:model.lazy="parents" id="parents" rows="3"></x-form.text-area>
                                @error('parents')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                            </div>
                            <div class="space-y-1 sm:col-span-2">
                                <label for="status" class="text-sm">Status :</label>
                                <x-input wire:model.lazy="status" id="status" type="text" />
                                @error('status')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                            </div>
                            <div class="space-y-1 sm:col-span-2">
                                <label for="remarks" class="text-sm">Remarks :</label>
                                <x-form.text-area wire:model.lazy="remarks" id="remarks" rows="3"></x-form.text-area>
                                @error('remarks')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                            </div>

                        </div>
                    </x-slot>

                    <x-slot name="footer">
                        <x-button wire:click="closeRecord()" type="button"
                            class="text-white bg-gray-400 hover:bg-gray-500">
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
                            <x-button type="button" wire:click="$set('showDeleteSingleRecordModal', false)">Cancel
                            </x-button>

                            <x-button type="submit">Delete</x-button>
                        </x-slot>
                    </x-modal.confirmation>
                </form>
            </div>

            <!-- Delete Single Record Modal -->
        </main>
    </div>
</div>
