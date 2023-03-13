<div class="min-h-screen bg-gray-100 ">

    <div class="flex flex-col">
        <main class="flex-1">

            {{-- <x-header.navigation>
                <a href="/components" class="flex-none text-gray-900">
                    <span class="sr-only">Logo</span>
                </a>
                <p class="hidden lg:block text-sm ml-6 border-l border-gray-200 pl-6">
                    <span class="sr-only">Description</span>

                </p>
                <div class="ml-auto flex items-center">
                    <a href="/components" class="hidden sm:block hover:text-gray-900">Components</a>
                    <a href="/documentation" class="hidden sm:block ml-6 mr-2 hover:text-gray-900">Documentation</a>

                    <div x-data="{ open: false }" x-init="window.addEventListener('focus', event => { if (open & amp; & amp; !$el.contains(event.target)) open = false }, true)" @click.away="open = false"
                        @keydown.escape="open = false;$refs.toggle.focus()"
                        class="relative sm:border-l -mr-1.5 sm:ml-2 sm:mr-0 sm:pl-6 border-gray-200">
                        <button type="button" x-ref="toggle" @click="open = !open" :aria-expanded="open"
                            class="font-medium flex items-center">
                            <span class="hidden sm:flex items-center">
                                Account
                                <svg aria-hidden="true" width="8" height="6" fill="none"
                                    class="ml-2.5 text-gray-400">
                                    <path d="M7 1.5l-3 3-3-3" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                            <span class="flex sm:hidden -my-1 w-8 h-8 rounded-lg items-center justify-center">
                                <svg aria-hidden="true" width="20" height="20" fill="none"
                                    class="text-gray-900">
                                    <path d="M3.75 4.75h12.5M3.75 9.75h12.5M3.75 14.75h12.5" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </button>
                        <div x-show="open"
                            class="absolute top-full right-0 w-60 mt-3 -mr-0.5 sm:-mr-3.5 bg-white rounded-lg shadow-md ring-1 ring-gray-900 ring-opacity-5 font-normal text-sm text-gray-900 divide-y divide-gray-100"
                            style="display: none;">
                            <p class="py-3 px-3.5 truncate">
                                <span class="block mb-0.5 text-xs text-gray-500">Signed in as</span>
                                <span class="font-semibold">Licensed User</span>
                            </p>
                            <div class="py-1.5 px-3.5">
                                <a href="/components"
                                    class="group flex sm:hidden items-center py-1.5 hover:text-teal-600">
                                    <svg aria-hidden="true" width="20" height="20" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="flex-none mr-3 text-gray-400 group-hover:text-teal-600">
                                        <rect x="2.75" y="2.75" width="5.5" height="5.5"
                                            rx="1"></rect>
                                        <rect x="2.75" y="11.75" width="5.5" height="5.5"
                                            rx="1"></rect>
                                        <rect x="11.75" y="11.75" width="5.5" height="5.5"
                                            rx="2.75"></rect>
                                        <path
                                            d="M13.616 3.305a1 1 0 011.79.004l1.731 3.498a1 1 0 01-.896 1.443H12.76a1 1 0 01-.894-1.448l1.751-3.497z">
                                        </path>
                                    </svg>
                                    Components
                                </a>
                                <span class="sr-only">Add more here</span>
                            <div class="py-1.5 px-3.5">
                                <a href="/account-settings"
                                    class="group flex items-center py-1.5 hover:text-teal-600">
                                    <svg aria-hidden="true" width="20" height="20" fill="none"
                                        stroke="currentColor" stroke-width="1.5"
                                        class="flex-none mr-3 text-gray-400 group-hover:text-teal-600">
                                        <rect x="7.75" y="5.75" width="4.5" height="4.5"
                                            rx="2.25"></rect>
                                        <rect x="2.75" y="2.75" width="14.5" height="14.5"
                                            rx="7.25"></rect>
                                        <path d="M14.618 15.5A5.249 5.249 0 0010 12.75a5.249 5.249 0 00-4.618 2.75">
                                        </path>
                                    </svg>
                                    Account Settings
                                </a>
                                <form method="POST" action="https://tailwindui.com/logout">
                                    <input type="hidden" name="_token" value="CONSTANT_TOKEN"> <button
                                        type="submit"
                                        class="group flex w-full items-center py-1.5 text-gray-900 hover:text-teal-600">
                                        <svg aria-hidden="true" width="20" height="20" fill="none"
                                            class="flex-none mr-3 text-gray-400 group-hover:text-teal-600">
                                            <path
                                                d="M10.25 3.75H9A6.25 6.25 0 002.75 10v0A6.25 6.25 0 009 16.25h1.25M10.75 10h6.5M14.75 12.25l2.5-2.25-2.5-2.25"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </x-header.navigation> --}}

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
                        <a href="{{ route('mto-settings',['user_id'=> auth()->user()->id]) }}" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                            Settings
                        </a>
                    </div>
                </li>
            </x-topbar-desktop>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                </div>
                <div class="flex justify-between px-2 my-2 space-x-2">
                    <div>
                        <x-button wire:click="toggleCreateRecordModal()"
                            class="flex w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-xl shadow-sm appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <x-icon.plus class="w-5 font-light" /> <p>Create</p>
                        </x-button>
                    </div>
                    <div class="flex justify-end space-x-1">
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
                <div class="mt-4 flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 rounded-none sm:rounded-lg md:rounded-lg">
                        <table class="divide-y min-w-full divide-gray-300 border">
                            <thead class="bg-gray-50 text-sm font-semibold text-gray-900 text-center">
                                <tr class="border border-gray-100">
                                    <th scope="col" rowspan="3" class="border bg-blue-200 w-20">Form</th>
                                    <th scope="col" colspan="3" class="border bg-blue-300">Beginning Balance</th>
                                    <th scope="col" colspan="3" class="border bg-blue-500">Issued</th>
                                    <th scope="col" colspan="3" class="border bg-blue-600">Ending Balance</th>
                                    <th scope="col" rowspan="3" class="border bg-blue-700">Teller Name</th>
                                    <th scope="col" rowspan="3" class="border bg-blue-200 w-20"></th>
                                </tr>
                                <tr class="border border-gray-100">
                                    <th scope="col" rowspan="2" class="border bg-blue-300" >Qty.</th>
                                    <th scope="col" colspan="2" class="bg-blue-300">Inclusive Serial No.</th>
                                    <th scope="col" rowspan="2" class="border bg-blue-500" >Qty.</th>
                                    <th scope="col" colspan="2" class="bg-blue-500">Inclusive Serial No.</th>
                                    <th scope="col" rowspan="2" class="border bg-blue-600" >Qty.</th>
                                    <th scope="col" colspan="2" class="bg-blue-600">Inclusive Serial No.</th>
                                </tr>
                                <tr class="border border-gray-100">
                                    <th scope="col" class="border bg-blue-300 w-20">From</th>
                                    <th scope="col" class="bg-blue-300 w-20">To</th>
                                    <th scope="col" class="border bg-blue-500 w-20">From</th>
                                    <th scope="col" class="bg-blue-500 w-20">To</th>
                                    <th scope="col" class="border bg-blue-600 w-20">From</th>
                                    <th scope="col" class="bg-blue-600 w-20">To</th>
                                </tr>

                            </thead>
                            <tbody class="bg-white text-gray-800 divide-y divide-gray-300 font-medium text-lg">
                                @forelse ($booklets as $item)
                                <tr class="divide-x divide-gray-300">
                                    <td class="px-2 whitespace-nowrap">{{ $item->forms['name']}}</td>
                                    <td class="px-2 text-right">{{ $item['begin_qty'] }}</td>
                                    <td class="px-2 text-right">{{ $item['begin_serial_fr'] }}</td>
                                    <td class="px-2 text-right">{{ $item['begin_serial_to'] }}</td>
                                    <td class="px-2 text-right">{{ $item['issued_qty'] }}</td>
                                    <td class="px-2 text-right">{{ $item['issued_serial_fr'] }}</td>
                                    <td class="px-2 text-right">{{ $item['issued_serial_to'] }}</td>
                                    <td class="px-2 text-right">{{ $item['end_qty'] }}</td>
                                    <td class="px-2 text-right">{{ $item['end_serial_fr'] }}</td>
                                    <td class="px-2 text-right">{{ $item['end_serial_to'] }}</td>
                                    <td class="px-2 text-right">{{ $item->users['fullname'] }}</td>
                                    <td class="px-2 relative pl-3 text-right">
                                        <div class="flex">
                                            <x-button class="px-2 rounded-xl hover:text-white hover:bg-blue-500" wire:click="toggleEditRecordModal({{ $item['id'] }})">
                                                <x-icon.edit class="w-4 h-4" /><span class="sr-only">Edit</span>
                                            </x-button>

                                            <x-button class="px-2 rounded-xl hover:text-white hover:bg-red-500" wire:click="toggleDeleteSingleRecordModal({{ $item['id'] }})">
                                                <x-icon.trash class="w-4 h-4" /><span class="sr-only">Delete</span>
                                            </x-button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="12">
                                        <div class="flex items-center justify-center">
                                            <x-icon.box-empty class="w-8 h-8 text-slate-400" />
                                            <span class="px-2 py-8 text-xl font-medium text-slate-400">No Records
                                                found...</span>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                                <tr>
                                    <td colspan="12">
                                        {{ $booklets->links('vendor.livewire.modified-tailwind') }}
                                    </td>
                                </tr>

                            </tbody>
                        </table>
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
                        <span>BOOKLET FORM</span>
                    </div>
                </x-slot>

                <x-slot name="content">
                    <x-input-group.booklet-fields />
                </x-slot>

                <x-slot name="footer">
                    <x-button wire:click="closeBookletRecord()" type="button" class="text-white bg-gray-400 hover:bg-gray-500">
                        {{ __('Cancel') }}
                    </x-button>
                    <x-button wire:click="saveBookletRecord()" type="button" class="hover:bg-blue-500 hover:text-white">
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
