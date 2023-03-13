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
                            Account List
                        </a>
                    </div>
                </li>
            </x-topbar-desktop>
            <div class="sm:flex">
                <div class="flex items-center flex-1 my-2">
                    <div class="w-full lg:max-w-xs">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative w-full pl-2 pr-2">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <x-icon.search class="w-5 h-5 text-gray-500" />
                            </div>
                            <x-input wire:model.debounce.500ms="filters.search" id="searchTerm"
                                class="block w-full py-2 pl-10 pr-3 leading-5 placeholder-gray-500 bg-white border border-gray-300 rounded-xl focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Search" placeholder="Type any keyword..." type="search" />
                        </div>
                    </div>
                </div>
                <div class="flex justify-between px-2 my-2 space-x-2">
                    <div>
                        <x-button wire:click="create"
                            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-600 bg-white border border-transparent border-gray-300 shadow-sm hover:text-white w-max rounded-xl hover:bg-blue-500">
                            <x-icon.plus class="w-5 h-5" /> <span>Create</span>
                        </x-button>
                    </div>
                    <div class="flex justify-end space-x-1">
                        <div>
                            <x-select wire:model="perPage" id="perPage">
                                <option value="10">10 / page</option>
                                <option value="25">25 / page</option>
                                <option value="50">50 / page</option>
                                <option value="100">100 / page</option>
                            </x-select>
                        </div>
                        {{-- <div>
                            <x-dropdown class="rounded-xl" label="Action">
                                <x-dropdown.item class="rounded-xl" type="button" wire:click="$toggle('showDeleteSelectedRecordModal')"
                                    class="flex items-center space-x-2">
                                    <x-icon.trash class="text-cool-gray-400" /> <span>Verify</span>
                                </x-dropdown.item>
                                <x-dropdown.item class="rounded-xl" type="button" wire:click="$toggle('showDeleteSelectedRecordModal')"
                                    class="flex items-center space-x-2">
                                    <x-icon.trash class="text-cool-gray-400" /> <span>Ledger Entry</span>
                                </x-dropdown.item>
                                <x-dropdown.item class="rounded-xl" type="button" wire:click="$toggle('showDeleteSelectedRecordModal')"
                                    class="flex items-center space-x-2">
                                    <x-icon.trash class="text-cool-gray-400" /> <span>Delete</span>
                                </x-dropdown.item>
                            </x-dropdown>
                        </div>
                        <div>
                            <x-button wire:click="$toggle('showImportModal')"
                                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-600 bg-white border border-transparent shadow-sm rounded-xl hover:bg-sky-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                                <x-icon.download class="w-5 h-5" /> <span>Import</span>
                            </x-button>
                        </div> --}}

                    </div>
                </div>
            </div>


            <div class="flex flex-col">
                <div class="min-w-full overflow-hidden overflow-x-scroll align-middle shadow">
                    <x-table>
                        <x-slot name="head">
                            <x-table.head class="px-2 py-1">
                                <x-checkbox wire:model="selectPage" />
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('rpt_pin')"
                                :direction="$sortField === 'rpt_pin' ? $sortDirection : null">PIN
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('ro_name')"
                                :direction="$sortField === 'ro_name' ? $sortDirection : null">Owner's Name
                            </x-table.head>
                            <x-table.head class="w-10 px-2 py-1">Kind</x-table.head>
                            <x-table.head class="px-2 py-1">Class</x-table.head>
                            <x-table.head class="px-2 py-1">Last Payment Date</x-table.head>
                            <x-table.head class="px-2 py-1">O.R. No.</x-table.head>
                            <x-table.head class="px-2 py-1">Covered</x-table.head>
                            <x-table.head class="w-10 px-6 py-1"><span class="sr-only">Edit</span></x-table.head>
                        </x-slot>

                        <x-slot name="body">
                            @if($selectPage)
                            <x-table.row class="bg-gray-300" wire:key="row-message">
                                <x-table.cell colspan="9" class="py-2">
                                    @unless ($selectAll)
                                    <div>
                                        <span>You have selected <strong>{{ $rpt_accounts->count() }}</strong> records, do you
                                            want to select all <strong>{{ $rpt_accounts->total() }}</strong>?</span>
                                        <x-button wire:click="selectAll" class="ml-1 text-blue-500">Select All
                                        </x-button>
                                    </div>
                                    @else
                                    <span>You have selected all <strong>{{ $rpt_accounts->total() }}</strong> records.</span>
                                    @endIf
                                </x-table.cell>
                            </x-table.row>
                            @endif

                            @forelse ($rpt_accounts as $item)
                            <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $item->id }}" class="text-gray-600 hover:bg-blue-100">
                                <x-table.cell class="w-6 pl-2 pr-0">
                                    <x-checkbox wire:model="selected" value="{{ $item->id }}" />
                                </x-table.cell>
                                <x-table.cell class="flex space-y-2">
                                    @if ($item->is_verified == 1)
                                    <p><x-icon.verified class="w-4 h-4 text-green-400" /></p>
                                    @else
                                    <p><x-icon.unverified class="w-4 h-4 text-red-500" /></p>
                                    @endif
                                    <p class="ml-2">{{ $item->rpt_pin }}</p>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item->ro_name }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item->rpt_kind }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item->rpt_class }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item->rtdp_payment_date }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item->rtdp_or_no }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item->rtdp_payment_covered_year }}</span>
                                </x-table.cell>
                                <x-table.cell class="max-w-2xl">
                                    <div class="flex justify-center space-x-2">
                                        {{-- <div>
                                            <span class="relative z-0 inline-flex rounded-md shadow-sm">
                                                <span class="relative inline-flex items-center px-2 py-2 bg-white border border-gray-300 rounded-l-md">
                                                    <label for="dropdown1">Option</label>
                                                </span>
                                                <select id="dropdown1" class="block w-full py-2 pl-3 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-none pr-9 rounded-r-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                    <option><span class="ml-4">
                                                    Sample
                                                </span></option>
                                                    <option>Ledger</option>
                                                    <option>
                                                    <x-button class="px-2 rounded-xl" wire:click="toggleDeleteSingleRecordModal({{ $item->id }})">
                                                        <x-icon.trash class="w-5 h-5" />
                                                    </x-button>
                                                    </option>
                                                </select>
                                                </span>
                                        </div> --}}

                                        {{-- VERIFICATION --}}
                                        @if ($item->is_verified != 1)
                                            <a href="{{ route('account-verification',['user_id'=>Auth::user()->id,'id'=>$item->id]) }}" class="px-2 py-2 text-sm font-medium text-center text-gray-700 bg-white border border-gray-300 shadow-sm hover:text-white hover:bg-green-500 rounded-xl">
                                                <x-icon.verified class="w-5 h-5" />
                                            </a>

                                        {{-- LEDGER ENTRY --}}
                                        @else
                                            <a href="{{ route('ledger-entry',['user_id'=>Auth::user()->id,'id'=>$item->id]) }}" class="px-2 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 shadow-sm hover:text-white hover:bg-blue-500 rounded-xl">
                                                <x-icon.view class="w-5 h-5" />
                                            </a>
                                        @endif

                                        {{-- DELETE --}}
                                        <x-button class="px-2 rounded-xl hover:text-white hover:bg-red-500" wire:click="toggleDeleteSingleRecordModal({{ $item->id }})">
                                            <x-icon.trash class="w-5 h-5" />
                                        </x-button>
                                    </div>
                                </x-table.cell>
                            </x-table.row>
                            @empty
                            <x-table.row wire:loading.class.delay="opacity-50">
                                <x-table.cell colspan="10">
                                    <div class="flex items-center justify-center">
                                        <x-icon.box-empty class="w-8 h-8 text-slate-400" />
                                        <span class="px-2 py-8 text-xl font-medium text-slate-400">No Records
                                            found...</span>
                                    </div>
                                </x-table.cell>
                            </x-table.row>
                            @endforelse
                            <x-table.row class="bg-gray-300" wire:key="row-message">
                                <x-table.cell colspan="9" class="">
                                    {{ $rpt_accounts->links('vendor.livewire.modified-tailwind') }}
                                </x-table.cell>
                            </x-table.row>
                        </x-slot>
                    </x-table>

                    <!-- Pagination -->

                </div>
            </div>
        </div>

        <div>
            <form wire:submit.prevent="importFile">
                <x-modal.dialog wire:model.defer="showImportModal">
                    <x-slot name="title">Import Data</x-slot>

                    <x-slot name="content">
                        {{-- <x-input.fileupload :error="$errors->first('imports.file')"
                            helpText="Excell or Csv file up to 10MB.">
                            <x-slot name="inputIcon">
                                <x-icon.upload class="w-12 h-12 mx-auto text-gray-400" />
                            </x-slot>
                            <x-slot name="inputLabel">
                                <x-input.file-label label="Upload a file" for="file_upload">
                                    <x-input.file wire:model="imports.file" class="sr-only" id="file_upload" />
                                </x-input.file-label>
                            </x-slot>
                        </x-input.fileupload> --}}
                    </x-slot>
                    <x-slot name="footer">
                        <x-button wire:click="$set('showImportModal', false)">Cancel</x-button>
                        <x-button type="submit">Import</x-button>
                    </x-slot>
                </x-modal.dialog>
            </form>
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
