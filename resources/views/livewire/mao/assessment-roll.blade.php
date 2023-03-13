<div x-data="{openSidebarMobile:false}">
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
                                Assessment Roll
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
                            <x-button wire:click="toggleCreateAssmtRollModal()"
                                class='flex w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-xl shadow-sm appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500'>
                                <x-icon.plus class="w-5 h-5" /> <span>Create</span>
                            </x-button>
                        </div>
                        <div class="flex justify-end space-x-1">
                            <div>
                                <x-select wire:model="per_page" id="perPage">
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
                            <x-slot name="head" class="border border-white">
                                <x-table.head class="px-2 py-1 text-white bg-blue-600 border">
                                    <x-checkbox wire:model="selectPage" />
                                </x-table.head>
                                <x-table.head class="px-2 py-1 text-white bg-blue-600 border"
                                    sortable wire:click="sortBy('assmt_roll_td_arp_no')"
                                    :direction="$sortField === 'assmt_roll_td_arp_no' ? $sortDirection : null">
                                    TD/ARP No.
                                </x-table.head>
                                <x-table.head class="px-2 py-1 text-white bg-blue-600 border"
                                    sortable wire:click="sortBy('assmt_roll_pin')"
                                    :direction="$sortField === 'assmt_roll_pin' ? $sortDirection : null">
                                    PIN
                                </x-table.head>
                                <x-table.head class="w-10 px-2 py-1 text-white bg-blue-600 border"
                                    sortable wire:click="sortBy('assmt_roll_lot_blk_no')"
                                    :direction="$sortField === 'assmt_roll_lot_blk_no' ? $sortDirection : null">
                                    Lot/Blk. No.
                                </x-table.head>
                                <x-table.head class="px-2 py-1 text-white bg-blue-600 border"
                                    sortable wire:click="sortBy('assmt_roll_owner')"
                                    :direction="$sortField === 'assmt_roll_owner' ? $sortDirection : null">
                                    Property Owner
                                </x-table.head>
                                <x-table.head class="w-10 px-2 py-1 text-white bg-blue-600 border"
                                    sortable wire:click="sortBy('assmt_roll_address')"
                                    :direction="$sortField === 'assmt_roll_address' ? $sortDirection : null">
                                    Address of Property
                                </x-table.head>
                                <x-table.head class="px-2 py-1 text-white bg-blue-600 border"
                                    sortable wire:click="sortBy('assmt_roll_kind')"
                                    :direction="$sortField === 'assmt_roll_kind' ? $sortDirection : null">
                                    Kind
                                </x-table.head>
                                <x-table.head class="px-2 py-1 text-white bg-blue-600 border"
                                    sortable wire:click="sortBy('assmt_roll_class')"
                                    :direction="$sortField === 'assmt_roll_class' ? $sortDirection : null">
                                    Class
                                </x-table.head>
                                <x-table.head class="px-2 py-1 text-white bg-blue-600 border"
                                    sortable wire:click="sortBy('assmt_roll_av')"
                                    :direction="$sortField === 'assmt_roll_av' ? $sortDirection : null">
                                    AV
                                </x-table.head>
                                <x-table.head class="px-2 py-1 text-white bg-blue-600 border"
                                    sortable wire:click="sortBy('assmt_roll_td_arp_no_prev')"
                                    :direction="$sortField === 'assmt_roll_td_arp_no_prev' ? $sortDirection : null">
                                    Prev. TD/ARP No.
                                </x-table.head>
                                <x-table.head class="px-2 py-1 text-white bg-blue-600 border"
                                    sortable wire:click="sortBy('assmt_roll_effective')"
                                    :direction="$sortField === 'assmt_roll_effective' ? $sortDirection : null">
                                    Effectivity
                                </x-table.head>
                                <x-table.head class="px-2 py-1 text-white bg-blue-600 border"
                                    sortable wire:click="sortBy('assmt_roll_av_prev')"
                                    :direction="$sortField === 'assmt_roll_av_prev' ? $sortDirection : null">
                                    Previous AV
                                </x-table.head>
                                <x-table.head class="px-2 py-1 text-white bg-blue-600 border">
                                    Remarks
                                </x-table.head>
                                <x-table.head class="w-10 px-6 py-1 text-white bg-blue-600 border"></x-table.head>
                            </x-slot>

                            <x-slot name="body">
                                @if($selectPage)
                                <x-table.row class="bg-gray-300" wire:key="row-message">
                                    <x-table.cell colspan="9" class="py-2">
                                        @unless ($selectAll)
                                        <div>
                                            <span>You have selected <strong>{{ $assmt_rolls->count() }}</strong> records, do you
                                                want to select all <strong>{{ $assmt_rolls->total() }}</strong>?</span>
                                            <x-button wire:click="selectAll" class="ml-1 text-blue-500">Select All
                                            </x-button>
                                        </div>
                                        @else
                                        <span>You have selected all <strong>{{ $assmt_rolls->total() }}</strong> records.</span>
                                        @endIf
                                    </x-table.cell>
                                </x-table.row>
                                @endif

                                @forelse ($assmt_rolls as $item)
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
                                        <p class="ml-2">{{ $item->assmt_roll_td_arp_no }}</p>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->assmt_roll_pin }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->assmt_roll_lot_blk_no }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->assmt_roll_owner }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->assmt_roll_address }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->assmt_roll_kind }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->assmt_roll_class }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->assmt_roll_av }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->assmt_roll_effective }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->assmt_roll_td_arp_no_prev }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->assmt_roll_av_prev }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span>{{ $item->assmt_roll_remarks }}</span>
                                    </x-table.cell>
                                    <x-table.cell class="max-w-2xl">
                                        <div class="flex justify-center space-x-2">
                                            {{-- VERIFICATION --}}
                                            {{-- @if ($item->is_verified != 1)
                                                <a href="{{ route('account-verification',['user_id'=>Auth::user()->id,'id'=>$item->id]) }}" class="px-2 py-2 text-sm font-medium text-center text-gray-700 bg-white border border-gray-300 shadow-sm hover:text-white hover:bg-green-500 rounded-xl">
                                                    <x-icon.verified class="w-5 h-5" />
                                                </a> --}}

                                            {{-- LEDGER ENTRY --}}
                                            {{-- @else
                                                <a href="{{ route('ledger-entry',['user_id'=>Auth::user()->id,'id'=>$item->id]) }}" class="px-2 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 shadow-sm hover:text-white hover:bg-blue-500 rounded-xl">
                                                    <x-icon.view class="w-5 h-5" />
                                                </a>
                                            @endif --}}

                                            {{-- EDIT --}}
                                            <x-button class="px-2 rounded-xl hover:text-white hover:bg-blue-500" wire:click="toggleEditAssmtRollModal({{ $item->id }})">
                                                <x-icon.edit class="w-5 h-5" />
                                            </x-button>
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
                                    <x-table.cell colspan="13" class="">
                                        {{ $assmt_rolls->links('vendor.livewire.modified-tailwind') }}
                                    </x-table.cell>
                                </x-table.row>
                            </x-slot>
                        </x-table>

                        <!-- Pagination -->

                    </div>
                </div>
            </div>

            <!-- Assessment Roll Form -->
            <div>
                <x-modal.dialog wire:model="show_assmt_roll_modal" maxWidth="sm">
                    <x-slot name="title">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                            <span>ASSESSMENT ROLL FORM</span>
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        <x-input-group.assessment-roll-fields />
                    </x-slot>

                    <x-slot name="footer">
                        <x-button wire:click="closeAssmtRollForm()" type="button" class="text-white bg-gray-400 hover:bg-gray-500">
                            {{ __('Cancel') }}
                        </x-button>
                        <x-button wire:click="saveAssmtRollForm()" type="button" class="hover:bg-blue-500 hover:text-white">
                            {{ __('Save') }}
                        </x-button>
                    </x-slot>
                </x-modal.dialog>
            </div>
            {{-- Import file --}}
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
</div>
