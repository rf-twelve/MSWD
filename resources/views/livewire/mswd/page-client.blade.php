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
                            Client List
                        </a>
                    </div>
                </li>
            </x-topbar-desktop>
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="sm:flex">
                <div class="flex items-center flex-1 my-2">
                    <div>
                        <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center">
                            <label for="combo-search" class="sr-only">combo-search</label>
                            <select wire:model.debounce.500ms="filters.sort-field" id="combo-search" class="h-full py-0 pl-1 pr-1 text-gray-500 bg-transparent border-transparent rounded-md focus:border-transparent sm:text-sm">
                            <option value="first_name">Firstname</option>
                            <option value="middle_name">Midname</option>
                            <option value="last_name">Lastname</option>
                            <option value="birthdate">Birthdate</option>
                            <option value="gender">Sex</option>
                            <option value="category">Category</option>
                            <option value="lot_blk_no">Lot/Blk.#</option>
                            <option value="street">Street</option>
                            <option value="barangay">Barangay</option>
                            <option value="contact">Contact</option>
                            <option value="email">Email</option>
                            </select>
                        </div>
                        <div class="absolute inset-y-0 left-0 flex items-center pl-24 pointer-events-none">
                            <x-icon.search class="w-5 h-5 text-gray-500" />
                            </div>
                        <x-input wire:model.debounce.500ms="filters.search" id="searchTerm"
                            class="block w-full pl-32 pr-3 leading-5 placeholder-gray-500 bg-white border border-gray-300 rounded-xl focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Search" placeholder="Type any keyword..." type="search" />
                        </div>
                    </div>
                    {{-- <a x-on:click="advance_search =! advance_search" href="#"
                        class="flex ml-3 text-indigo-600 underline hover:text-indigo-900">
                        <span class="pl-2 text-xs italic underline uppercase">Advance Search</span>
                    </a> --}}
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
                            <x-select wire:model.debounce.500ms="per_page"  id="perPage">
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
                                    {{-- <x-checkbox wire:model="selectPage" /> --}}
                                </x-table.head>
                                <x-table.head class="w-10 px-2 py-1">
                                    Photo
                                </x-table.head>
                                <x-table.head class="px-2 py-1" sortable wire:click="sortBy('first_name')"
                                    :direction="$filters['sort-field'] === 'first_name' ? $filters['sort-direction'] : null">
                                    First Name
                                </x-table.head>
                                <x-table.head class="px-2 py-1" sortable wire:click="sortBy('middle_name')"
                                    :direction="$filters['sort-field'] === 'middle_name' ? $filters['sort-direction'] : null">
                                    Middle Name
                                </x-table.head>
                                <x-table.head class="px-2 py-1" sortable wire:click="sortBy('last_name')"
                                    :direction="$filters['sort-field'] === 'last_name' ? $filters['sort-direction'] : null">
                                    Last Name
                                </x-table.head>
                                <x-table.head class="w-10 px-2 py-1">
                                    Birthdate
                                </x-table.head>
                                <x-table.head class="w-10 px-2 py-1">
                                    Sex
                                </x-table.head>
                                <x-table.head class="px-2 py-1">
                                    Category
                                </x-table.head>
                                <x-table.head class="px-2 py-1">
                                    Lot/Blk #
                                </x-table.head>
                                <x-table.head class="px-2 py-1">
                                    Street
                                </x-table.head>
                                <x-table.head class="px-2 py-1" sortable wire:click="sortBy('barangay')"
                                    :direction="$filters['sort-field'] === 'barangay' ? $filters['sort-direction'] : null">
                                    Barangay
                                </x-table.head>
                                <x-table.head class="px-2 py-1">
                                    Contact #
                                </x-table.head>
                                <x-table.head class="px-2 py-1">
                                    Email
                                </x-table.head>
                                <x-table.head class="px-2 py-1">
                                    Remarks
                                </x-table.head>
                            </x-slot>

                            <x-slot name="body">
                                @if($selectPage)
                                <x-table.row class="bg-gray-300" wire:key="row-message">
                                    <x-table.cell colspan="14" class="py-2">
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
                                    <x-table.cell class="flex space-y-2">
                                        <span>{{ $item->photo }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->first_name }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->middle_name }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->last_name }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->birthdate }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->gender }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->category }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->lot_blk_no }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->street }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->barangay }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->contact }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->email }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->remarks }}</span>
                                    </x-table.cell>
                                </x-table.row>
                                @empty
                                <x-table.row wire:loading.class.delay="opacity-50">
                                    <x-table.cell colspan="14">
                                        <div class="flex items-center justify-center">
                                            <x-icon.box-empty class="w-8 h-8 text-slate-400" />
                                            <span class="px-2 py-8 text-xl font-medium text-slate-400">No Records
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
        </div>


        <!-- Booklet Form -->
        <div>
            <x-modal.dialog wire:model="showFormModal" maxWidth="sm">
                <x-slot name="title">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                        <span>CLIENT FORM</span>
                    </div>
                </x-slot>

                <x-slot name="content">
                    <div class="mb-4 space-y-3 overflow-y-auto max-h-96">
                        <div class="space-y-1 sm:col-span-2">
                            <label for="first_name" class="text-sm">First Name :</label>
                            <x-input wire:model.lazy="first_name" id="first_name" type="text"/>
                            @error('first_name')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="middle_name" class="text-sm">Middle Name :</label>
                            <x-input wire:model.lazy="middle_name" id="middle_name" type="text"/>
                            @error('middle_name')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="last_name" class="text-sm">Last Name :</label>
                            <x-input wire:model.lazy="last_name" id="last_name" type="text"/>
                            @error('last_name')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="birthdate" class="text-sm">Birthdate :</label>
                            <x-input wire:model.lazy="birthdate" id="birthdate" type="date"/>
                            @error('birthdate')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="gender" class="text-sm">Sex :</label>
                            <x-select wire:model.lazy="gender" id="gender" class="w-full border">
                                <option value="">-Select value-</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </x-select>
                            @error('gender')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="category" class="text-sm">Category :</label>
                            <x-select wire:model.lazy="category" id="category" class="w-full border">
                                <option value="">-Select value-</option>
                                <option value="Child">Child</option>
                                <option value="PWD">PWD</option>
                                <option value="Senior Citizen">Senior Citizen</option>
                                <option value="N/A">N/A</option>
                            </x-select>
                            @error('category')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="lot_blk_no" class="text-sm">Lot/Blk no. :</label>
                            <x-input wire:model.lazy="lot_blk_no" id="lot_blk_no" type="text"/>
                            @error('lot_blk_no')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="street" class="text-sm">Street :</label>
                            <x-input wire:model.lazy="street" id="street" type="text"/>
                            @error('street')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="barangay" class="text-sm">Barangay :</label>
                            <x-input wire:model.lazy="barangay" id="barangay" type="text"/>
                            @error('barangay')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="contact" class="text-sm">Contact :</label>
                            <x-input wire:model.lazy="contact" id="contact" type="text"/>
                            @error('contact')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="email" class="text-sm">Email :</label>
                            <x-input wire:model.lazy="email" id="email" type="text"/>
                            @error('email')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="remarks_client" class="text-sm">Remarks :</label>
                            <x-form.text-area wire:model.lazy="remarks_client" id="remarks_client" rows="4"></x-form.text-area>
                            @error('remarks_client')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
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

        </main>
    </div>
</div>
