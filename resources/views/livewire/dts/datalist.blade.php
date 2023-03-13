<div class="min-h-full">
    <div class="px-2 pt-2 sm:px-4 lg:px-4">
        <x-header.pcso />

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol role="list" class="flex items-center space-x-4">
                      <li>
                        <div>
                          <a href="{{ route('User Dashboard') }}" class="text-gray-400 hover:text-gray-500">
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
                          <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Data List</a>
                        </div>
                      </li>

                    </ol>
                  </nav>

                <h2 class="mt-2 text-lg font-bold leading-7 text-gray-900 sm:text-lg sm:truncate">
                    Beneficiary List
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
                            :direction="$sortField === 'date' ? $sortDirection : null">DATE
                        </x-table.head>
                        <x-table.head class="w-10 px-2 py-1" sortable wire:click="sortBy('fullname')"
                            :direction="$sortField === 'fullname' ? $sortDirection : null">FULLNAME
                        </x-table.head>
                        <x-table.head class="px-2 py-1">DONATIONS</x-table.head>
                        <x-table.head class="px-2 py-1">REGION</x-table.head>
                        <x-table.head class="px-2 py-1">PROVINCE</x-table.head>
                        <x-table.head class="px-2 py-1">MUNICITY</x-table.head>
                        <x-table.head class="px-2 py-1">BARANGAY</x-table.head>
                        <x-table.head class="px-2 py-1">CONTACT #</x-table.head>
                        <x-table.head class="px-6 py-1"><span class="sr-only">Edit</span></x-table.head>
                    </x-slot>

                    <x-slot name="body">
                        @if($selectPage)
                        <x-table.row class="bg-gray-300" wire:key="row-message">
                            <x-table.cell colspan="9" class="py-2">
                                @unless ($selectAll)
                                <div>
                                    <span>You have selected <strong>{{ $beneficiaries->count() }}</strong> records, do you
                                        want to select all <strong>{{ $beneficiaries->total() }}</strong>?</span>
                                    <x-button wire:click="selectAll" class="ml-1 text-blue-500">Select All
                                    </x-button>
                                </div>
                                @else
                                <span>You have selected all <strong>{{ $beneficiaries->total() }}</strong> records.</span>
                                @endIf
                            </x-table.cell>
                        </x-table.row>
                        @endif

                        @forelse ($beneficiaries as $item)
                        <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $item->id }}" class="text-gray-600">
                            <x-table.cell class="w-6 pl-2 pr-0">
                                <x-checkbox wire:model="selected" value="{{ $item->id }}" />
                            </x-table.cell>
                            <x-table.cell>
                                <p>{{ $item->date }}</p>
                            </x-table.cell>
                            <x-table.cell>
                                <span>{{ $item->fullname }}</span>
                            </x-table.cell>
                            <x-table.cell>
                                @foreach ($item->donations as $donation)
                                <span>{{ $donation->AssistanceName }}..</span>
                                @endforeach
                            </x-table.cell>
                            <x-table.cell>
                                <span>{{ ($item->addresses->first())->RegionName ?? '' }}</span>
                            </x-table.cell>
                            <x-table.cell>
                                <span>{{ ($item->addresses->first())->ProvinceName ?? '' }}</span>
                            </x-table.cell>
                            <x-table.cell>
                                <span>{{ ($item->addresses->first())->MunicityName ?? '' }}</span>
                            </x-table.cell>
                            <x-table.cell>
                                <span>{{ ($item->addresses->first())->BarangayName ?? '' }}</span>
                            </x-table.cell>
                            <x-table.cell>
                                <span>{{ $item->cp_no }}</span>
                                <span>{{ $item->tel_no }}</span>
                            </x-table.cell>
                            <x-table.cell class="max-w-2xl">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('View Beneficiary',['user_id'=>Auth::user()->id,'id'=>$item->id]) }}" class="px-2 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 shadow-sm rounded-xl hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <x-icon.view class="w-5 h-5" />
                                    </a>
                                    <x-button class="px-2 rounded-xl" wire:click="toggleDeleteSingleRecordModal({{ $item->id }})">
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
                    </x-slot>
                </x-table>

                <!-- Pagination -->
                <div>
                    {{ $beneficiaries->links('vendor.livewire.modified-tailwind') }}
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
            <x-modal.confirmation wire:model.defer="showDeleteSingleRecordModal">
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
            <x-modal.confirmation wire:model.defer="showDeleteSelectedRecordModal">
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
