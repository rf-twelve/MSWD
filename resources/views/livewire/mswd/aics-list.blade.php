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
                            AICS List
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
                        href="{{ route('mswd/aics/print-list/all',['user_id'=>auth()->user()->id]) }}"
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
                    {{-- <div class="flex justify-end space-x-1">
                        <div>
                            <x-select wire:model.debounce.500ms="filters.sort-field"  id="sortField">
                                <option value="form">Form</option>
                                <option value="begin_qty">Begin qty</option>
                                <option value="begin_serial_fr">Begin serial from</option>
                                <option value="begin_serial_to">Begin serial to</option>
                                <option value="issued_qty">Issued qty</option>
                                <option value="issued_serial_fr">Issued serial from</option>
                                <option value="issued_serial_to">Issued serial to</option>
                                <option value="end_qty">End qty</option>
                                <option value="end_serial_fr">End serial from</option>
                                <option value="end_serial_to">End serial to</option>
                            </x-select>
                        </div>
                    </div> --}}
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
                                    {{-- <x-checkbox wire:model="selectPage" /> --}}
                                </x-table.head>
                                {{-- <x-table.head class="px-2 py-1" sortable wire:click="sortBy('date')"
                                    :direction="$filters['sort-field'] === 'date' ? $filters['sort-direction'] : null">
                                    Date
                                </x-table.head> --}}
                                <x-table.head class="px-2 py-1">
                                    Name of Claimant
                                </x-table.head>
                                <x-table.head class="px-2 py-1">
                                    Barangay
                                </x-table.head>
                                <x-table.head class="w-10 px-2 py-1">
                                    Name of Beneficiary
                                </x-table.head>
                                <x-table.head class="w-10 px-2 py-1">
                                    Relationship
                                </x-table.head>
                                <x-table.head class="px-2 py-1">
                                    Assistance
                                </x-table.head>
                                <x-table.head class="px-2 py-1">
                                    Amount
                                </x-table.head>
                                <x-table.head class="px-2 py-1">
                                    Contact #
                                </x-table.head>
                                <x-table.head class="px-2 py-1">
                                    Worker
                                </x-table.head>
                                <x-table.head class="px-2 py-1">
                                    Date Released
                                </x-table.head>
                                <x-table.head class="px-2 py-1">
                                    Charges
                                </x-table.head>
                                <x-table.head class="px-2 py-1">
                                    Remarks
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
                                            <x-button class="px-2 rounded-xl hover:text-white hover:bg-blue-500" wire:click="toggleViewRecordModal({{ $item->id }})">
                                                <x-icon.view class="w-5 h-5" />
                                            </x-button>

                                            <x-button class="px-2 rounded-xl hover:text-white hover:bg-red-500" wire:click="toggleDeleteSingleRecordModal({{ $item->id }})">
                                                <x-icon.trash class="w-5 h-5" />
                                            </x-button>
                                        </div>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>
                                            {{
                                            $item->claimant['first_name'].' '.
                                            $item->claimant['middle_name'].' '.
                                            $item->claimant['last_name']
                                            }}
                                        </span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->claimant['barangay'] }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>
                                            {{
                                            $item->beneficiary['first_name'].' '.
                                            $item->beneficiary['middle_name'].' '.
                                            $item->beneficiary['last_name']
                                            }}
                                        </span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->relation }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->assistance_type }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->amount }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        {{-- <span>{{  $item->claimant['contact'] }}</span> --}}
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->worker['fullname']}}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->date_released }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->charges }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->remarks }}</span>
                                    </x-table.cell>

                                </x-table.row>
                                @empty
                                <x-table.row wire:loading.class.delay="opacity-50">
                                    <x-table.cell colspan="12">
                                        <div class="flex items-center justify-center">
                                            <x-icon.box-empty class="w-8 h-8 text-slate-400" />
                                            <span class="px-2 py-8 text-xl font-medium text-slate-400">No Records
                                                found...</span>
                                        </div>
                                    </x-table.cell>
                                </x-table.row>
                                @endforelse
                                <x-table.row class="bg-gray-300" wire:key="row-message">
                                    <x-table.cell colspan="12" class="">
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
                        <span>AICS FORM</span>
                    </div>
                </x-slot>

                <x-slot name="content">
                    <x-input-group.aics-form />
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
