<div class="min-h-full">
    <div class="px-2 pt-2 sm:px-4 lg:px-4">
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
                        Collections
                    </a>
                </div>
            </li>
        </x-topbar-desktop>

        <div class="grid grid-cols-1 gap-4 mt-4 lg:grid-cols-2">
            <div class="flex items-center flex-1">
                <div class="w-full lg:max-w-xs">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <x-icon.search class="w-5 h-5 text-gray-500" />
                        </div>
                        <x-input wire:model.debounce.500ms="filters.search" id="searchTerm"
                            class="block w-full py-2 pl-10 pr-3 leading-5 placeholder-gray-500 bg-white border border-gray-300 rounded-xl focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Search" placeholder="Type any keyword..." type="search" />
                    </div>
                </div>
            </div>
            <div>
                <div class="flex justify-center space-x-1 lg:justify-end">
                    <div>
                        <x-select wire:model="perPage" id="perPage">
                            <option value="10">10 / page</option>
                            <option value="25">25 / page</option>
                            <option value="50">50 / page</option>
                            <option value="100">100 / page</option>
                        </x-select>
                    </div>
                    <div>
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
                    </div>
                    <div>
                        <x-button wire:click="create"
                            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-600 bg-white border border-transparent shadow-sm w-max rounded-xl hover:bg-sky-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                            <x-icon.plus class="w-5 h-5" /> <span>Create</span>
                        </x-button>
                    </div>
                </div>
            </div>
        </div>


        <div class="flex flex-col mt-2">
            <div class="min-w-full overflow-hidden overflow-x-scroll align-middle shadow sm:rounded-lg">
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
                        <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $item->id }}" class="text-gray-600">
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
                                @if ($item->is_verified)
                                {{-- COMPUTE IF VERIFIED --}}
                                <a href="{{ route('account-computation',['user_id'=>Auth::user()->id,'id'=>$item->id]) }}" class="flex px-2 py-2 text-sm font-medium text-center text-gray-700 bg-blue-300 border border-gray-300 shadow-sm rounded-xl hover:bg-blue-500 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V13.5zm0 2.25h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V18zm2.498-6.75h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V13.5zm0 2.25h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V18zm2.504-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zm0 2.25h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V18zm2.498-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zM8.25 6h7.5v2.25h-7.5V6zM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 002.25 2.25h10.5a2.25 2.25 0 002.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0012 2.25z" />
                                    </svg>
                                    Compute
                                </a>
                                @else
                                {{-- VERIFIED ACCOUNT FIRST--}}
                                <a href="{{ route('account-verification',['user_id'=>Auth::user()->id,'id'=>$item->id]) }}" class="flex px-2 py-2 text-sm font-medium text-center text-gray-700 bg-white border border-gray-300 shadow-sm rounded-xl hover:bg-blue-500 hover:text-white">
                                    <x-icon.verified class="w-5 h-5 mr-1" />
                                    Verify
                                </a>
                                @endif
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
                    </x-slot>
                </x-table>

                <!-- Pagination -->
                <div>
                    {{ $rpt_accounts->links('vendor.livewire.modified-tailwind') }}
                </div>
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
</div>
{{--

<div class="min-h-full">
    <div class="px-2 pt-2 sm:px-4 lg:px-4">
        <x-header.top-banner />

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol role="list" class="flex items-center space-x-4">
                      <li>
                        <div>
                          <a href="{{ route('user-dashboard',['user_id'=> auth()->user()->id]) }}" class="text-gray-400 hover:text-gray-500">
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
                          <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Treasurer</a>
                        </div>
                      </li>

                    </ol>
                  </nav>

                <h2 class="mt-2 text-lg font-bold leading-7 text-gray-900 sm:text-lg sm:truncate">
                    Collections
                </h2>
                <div class="flex flex-col mt-1 sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">

                </div>
            </div>
            <div class="flex mt-2 lg:mt-0 lg:ml-4">


                <div class="flex items-center text-sm text-gray-500">
                    <!-- Heroicon name: solid/calendar -->
                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ date('M d, Y') }}
                </div>
            </div>
        </div>


        <div class="grid grid-cols-1 gap-4 mt-4 lg:grid-cols-2">
            <div class="flex items-center flex-1">
                <div class="w-full lg:max-w-xs">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <x-icon.search class="w-5 h-5 text-gray-500" />
                        </div>
                        <x-input wire:model.debounce.500ms="filters.search" id="searchTerm"
                            class="block w-full py-2 pl-10 pr-3 leading-5 placeholder-gray-500 bg-white border border-gray-300 rounded-xl focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Search" placeholder="Type any keyword..." type="search" />
                    </div>
                </div>
            </div>
            <div>
                <div class="flex justify-center space-x-1 lg:justify-end">
                    <div>
                        <x-select wire:model="perPage" id="perPage">
                            <option value="10">10 / page</option>
                            <option value="25">25 / page</option>
                            <option value="50">50 / page</option>
                            <option value="100">100 / page</option>
                        </x-select>
                    </div>
                    <div>
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
                    </div>
                    <div>
                        <x-button wire:click="create"
                            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-600 bg-white border border-transparent shadow-sm w-max rounded-xl hover:bg-sky-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                            <x-icon.plus class="w-5 h-5" /> <span>Create</span>
                        </x-button>
                    </div>
                </div>
            </div>
        </div>


        <div class="flex flex-col mt-2">
            <div class="min-w-full overflow-hidden overflow-x-scroll align-middle shadow sm:rounded-lg">
                <x-table>
                    <x-slot name="head">
                        <x-table.head class="flex py-2">
                            <x-checkbox wire:model="selectPage" />
                        </x-table.head>
                        <x-table.head class="px-2 py-1" sortable wire:click="sortBy('date')"
                            :direction="$sortField === 'date' ? $sortDirection : null">PIN
                        </x-table.head>
                        <x-table.head class="px-2 py-1" sortable wire:click="sortBy('tn')"
                            :direction="$sortField === 'tn' ? $sortDirection : null">Owner's Name
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
                                    <span>You have selected <strong>{{ $docs->count() }}</strong> records, do you
                                        want to select all <strong>{{ $docs->total() }}</strong>?</span>
                                    <x-button wire:click="selectAll" class="ml-1 text-blue-500">Select All
                                    </x-button>
                                </div>
                                @else
                                <span>You have selected all <strong>{{ $docs->total() }}</strong> records.</span>
                                @endIf
                            </x-table.cell>
                        </x-table.row>
                        @endif

                        @forelse ($docs as $item)
                        <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $item->id }}" class="text-gray-600">
                            <x-table.cell class="w-6 pl-2 pr-0">
                                <x-checkbox wire:model="selected" value="{{ $item->id }}" />
                            </x-table.cell>
                            <x-table.cell>
                                <p>{{ $item->date }}</p>
                            </x-table.cell>
                            <x-table.cell>
                                <span>{{ $item->tn }}</span>
                            </x-table.cell>
                            <x-table.cell>
                                <span>{{ $item->title }}</span>
                            </x-table.cell>
                            <x-table.cell>
                                <span>{{ $item->origin }}</span>
                            </x-table.cell>
                            <x-table.cell>
                                <span>{{ $item->nature }}</span>
                            </x-table.cell>
                            <x-table.cell>
                                <span>{{ $item->for }}</span>
                            </x-table.cell>
                            <x-table.cell>
                                <span>{{ $item->OfficeName }}</span>
                            </x-table.cell>
                            <x-table.cell class="max-w-2xl">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('account-verification',['user_id'=>Auth::user()->id,'id'=>$item->id]) }}" class="flex px-2 py-2 text-sm font-medium text-center text-gray-700 bg-white border border-gray-300 shadow-sm rounded-xl hover:bg-blue-500 hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12" />
                                        </svg>
                                        Verify
                                    </a>
                                    <a href="{{ route('account-computation',['user_id'=>Auth::user()->id,'id'=>$item->id]) }}" class="flex px-2 py-2 text-sm font-medium text-center text-gray-700 bg-white border border-gray-300 shadow-sm rounded-xl hover:bg-blue-500 hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V13.5zm0 2.25h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V18zm2.498-6.75h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V13.5zm0 2.25h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V18zm2.504-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zm0 2.25h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V18zm2.498-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zM8.25 6h7.5v2.25h-7.5V6zM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 002.25 2.25h10.5a2.25 2.25 0 002.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0012 2.25z" />
                                        </svg>
                                        Compute
                                    </a>
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
                    </x-slot>
                </x-table>

                <!-- Pagination -->
                <div>
                    {{ $docs->links('vendor.livewire.modified-tailwind') }}
                </div>
            </div>
        </div>
    </div>

    <!-- COMPUTATION CONFIRMATION -->
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
</div> --}}
