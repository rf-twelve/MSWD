<div class="min=h-full">
    <div class="flex flex-col min-h-0">
        <!-- Top nav-->

        <!-- Bottom section -->
        <div class="flex flex-1 min-h-0 overflow-hidden">
            <!-- Main area -->
            <main class="flex-1 min-w-0 border-t border-gray-200 xl:flex">
                <section aria-labelledby="message-heading"
                    class="flex flex-col flex-1 h-full min-w-0 overflow-hidden xl:order-last">
                    <!-- Top section -->
                    <div class="flex-shrink-0 bg-white border-b border-gray-200">
                        <!-- Toolbar-->
                        <div class="flex flex-col justify-center h-16">
                            <div class="px-4 bg-gray-300 sm:px-6 lg:px-8">
                                <div class="flex justify-between py-3">
                                    <!-- Left buttons -->
                                    <div>
                                        <span
                                            class="relative z-0 inline-flex rounded-md shadow-sm sm:space-x-3 sm:shadow-none">
                                            <span class="inline-flex space-x-2">
                                                <a href="{{ url()->previous() }}"
                                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white rounded-xl hover:bg-gray-50 focus:z-10 focus:border-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-600">
                                                    <x-icon.arrow-curve-left class="mr-2.5 h-5 w-5 text-gray-400" />
                                                    <span>Back</span>
                                                </a>
                                                <x-dropdown class="px-1 border border-gray-300 rounded-sm" label="Options">
                                                    <x-dropdown.item wire:click="$toggle('showDeleteSelectedRecordModal')"
                                                        type="button" class="flex items-center space-x-2 rounded-md">
                                                        <x-icon.trash class="w-5 h-5" /> <span>Delete</span>
                                                    </x-dropdown.item>

                                                    <x-dropdown.item wire:click="edit" type="button"
                                                        class="flex items-center space-x-2 rounded-md">
                                                        <x-icon.edit class="w-5 h-5" /> <span>Edit</span>
                                                    </x-dropdown.item>

                                                    <x-dropdown.item wire:click="receive" type="button"
                                                        class="flex items-center space-x-2 rounded-md">
                                                        <x-icon.arrow-down-on-square class="w-5 h-5" /> <span>Receive</span>
                                                    </x-dropdown.item>

                                                    <x-dropdown.item wire:click="release" type="button"
                                                        class="flex items-center space-x-2 rounded-md">
                                                        <x-icon.arrow-up-on-square class="w-5 h-5" /> <span>Release</span>
                                                    </x-dropdown.item>

                                                    <x-dropdown.item wire:click="terminal" type="button"
                                                        class="flex items-center space-x-2 rounded-md">
                                                        <x-icon.terminal class="w-5 h-5" /> <span>Terminal</span>
                                                    </x-dropdown.item>

                                                    <x-dropdown.item wire:click="transfer" type="button"
                                                        class="flex items-center space-x-2 rounded-md">
                                                        <x-icon.arrows-right-left class="w-5 h-5" /> <span>Transfer</span>
                                                    </x-dropdown.item>

                                                    <x-dropdown.item wire:click="unlock" type="button"
                                                        class="flex items-center space-x-2 rounded-md">
                                                        <x-icon.unlock class="w-5 h-5" /> <span>Unlock</span>
                                                    </x-dropdown.item>

                                                </x-dropdown>
                                            </span>
                                        </span>
                                    </div>
                                    <!-- Right buttons -->
                                    <nav aria-label="Pagination">
                                        <span class="relative z-0 inline-flex rounded-md shadow-sm">
                                            <a href="#"
                                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:border-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-600">
                                                <span class="sr-only">Next</span>
                                                <!-- Heroicon name: solid/chevron-up -->
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                            <a href="#"
                                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 focus:z-10 focus:border-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-600">
                                                <span class="sr-only">Previous</span>
                                                <!-- Heroicon name: solid/chevron-down -->
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </span>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Document Details -->
                    <div class="flex-1 hidden min-h-0 overflow-y-auto lg:block">
                        <div class="min-h-screen pt-5 pb-6 bg-white shadow">
                            <div class="px-4 sm:flex sm:items-baseline sm:justify-between sm:px-6 lg:px-8">
                                <!-- This example requires Tailwind CSS v2.0+ -->
                                <div class="w-full overflow-hidden bg-white shadow sm:rounded-lg">
                                    <div class="px-4 py-5 sm:px-6">
                                        <h3 class="text-3xl font-medium leading-6 text-gray-900">Users</h3>
                                        <p class="max-w-2xl mt-1 text-xl text-gray-500">Settings</p>
                                    </div>
                                    <div class="px-4 py-5 text-lg border-t border-gray-200 sm:p-0">
                                        <dl class="sm:divide-y sm:divide-gray-200">
                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="font-medium text-gray-500">
                                                    Tracking Number :</dt>
                                                <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                    {{ $document->tn }}</dd>
                                            </div>
                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="font-medium text-gray-500">
                                                    Classification :</dt>
                                                <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                    {{ $document->DocumentType }}</dd>
                                            </div>

                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="font-medium text-gray-500">
                                                    Title :</dt>
                                                <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                    {{ $document->title }}</dd>
                                            </div>

                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="font-medium text-gray-500">
                                                    Origin :</dt>
                                                <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                    {{ $document->origin }}</dd>
                                            </div>

                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="font-medium text-gray-500">
                                                    Nature :</dt>
                                                <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                    {{ $document->nature }}</dd>
                                            </div>

                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="font-medium text-gray-500">
                                                    For :</dt>
                                                <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                    {{ $document->ActionFor }}</dd>
                                            </div>
                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="font-medium text-gray-500">
                                                    Remarks</dt>
                                                <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                    {{ $document->remarks }}</dd>
                                            </div>
                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="font-medium text-gray-500">Attachments</dt>
                                                <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <ul role="list"
                                                        class="border border-gray-200 divide-y divide-gray-200 rounded-md">
                                                        <li
                                                            class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                                            <div class="flex items-center flex-1 w-0">
                                                                <!-- Heroicon name: solid/paper-clip -->
                                                                <svg class="flex-shrink-0 w-5 h-5 text-gray-400"
                                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                    fill="currentColor" aria-hidden="true">
                                                                    <path fill-rule="evenodd"
                                                                        d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                                <span class="flex-1 w-0 ml-2 truncate">
                                                                    resume_back_end_developer.pdf </span>
                                                            </div>
                                                            <div class="flex-shrink-0 ml-4">
                                                                <a href="#"
                                                                    class="font-medium text-indigo-600 hover:text-indigo-500">
                                                                    Download </a>
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                                            <div class="flex items-center flex-1 w-0">
                                                                <!-- Heroicon name: solid/paper-clip -->
                                                                <svg class="flex-shrink-0 w-5 h-5 text-gray-400"
                                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                    fill="currentColor" aria-hidden="true">
                                                                    <path fill-rule="evenodd"
                                                                        d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                                <span class="flex-1 w-0 ml-2 truncate">
                                                                    coverletter_back_end_developer.pdf </span>
                                                            </div>
                                                            <div class="flex-shrink-0 ml-4">
                                                                <a href="#"
                                                                    class="font-medium text-indigo-600 hover:text-indigo-500">
                                                                    Download </a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Audit Trails on mobile devices -->
                    <div class="lg:hidden">
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="overflow-hidden bg-white shadow sm:rounded-md">
                            <ul role="list" class="divide-y divide-gray-200">
                                <li>
                                    <a href="#" class="block hover:bg-gray-50">
                                        <div class="px-4 py-4 sm:px-6">
                                            <div class="flex items-center justify-between">
                                                <p class="text-sm font-medium text-indigo-600 truncate">
                                                    Tracking No.: {{ $document->tn }}
                                                </p>
                                                <div class="flex flex-shrink-0 ml-2">
                                                    <p
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full text-green-800  {{ $document->is_draft ? 'bg-gray-200' : 'bg-green-200' }} ">
                                                        {{ $document->is_draft ? 'Draft' : 'Submited' }}</p>
                                                </div>
                                            </div>

                                            <div class="mt-2">
                                                <dl class="grid grid-cols-1">
                                                    <dt class="font-serif text-xs italic text-gray-500">Class :</dt>
                                                    <dd
                                                        class="p-1 text-sm font-medium text-gray-600 border border-gray-300 rounded-xl">
                                                        {{ $document->DocumentType }}</dd>
                                                </dl>
                                            </div>

                                            <div class="mt-2">
                                                <dl class="grid grid-cols-1">
                                                    <dt class="font-serif text-xs italic text-gray-500">Date :</dt>
                                                    <dd
                                                        class="p-1 text-sm font-medium text-gray-600 border border-gray-300 rounded-xl">
                                                        {{ $document->date }}</dd>
                                                </dl>
                                            </div>

                                            <div class="mt-2">
                                                <dl class="grid grid-cols-1">
                                                    <dt class="font-serif text-xs italic text-gray-500">Received By :</dt>
                                                    <dd
                                                        class="p-1 text-sm font-medium text-gray-600 border border-gray-300 rounded-xl">
                                                        {{ $document->received_by }}</dd>
                                                </dl>
                                            </div>

                                            <div class="mt-2">
                                                <dl class="grid grid-cols-1">
                                                    <dt class="font-serif text-xs italic text-gray-500">Title :</dt>
                                                    <dd
                                                        class="p-1 text-sm font-medium text-gray-600 border border-gray-300 rounded-xl">
                                                        {{ $document->title }}</dd>
                                                </dl>
                                            </div>

                                            <div class="mt-2">
                                                <dl class="grid grid-cols-1">
                                                    <dt class="font-serif text-xs italic text-gray-500">Origin :</dt>
                                                    <dd
                                                        class="p-1 text-sm font-medium text-gray-600 border border-gray-300 rounded-xl">
                                                        {{ $document->origin }}</dd>
                                                </dl>
                                            </div>

                                            <div class="mt-2">
                                                <dl class="grid grid-cols-1">
                                                    <dt class="font-serif text-xs italic text-gray-500">Nature :</dt>
                                                    <dd
                                                        class="p-1 text-sm font-medium text-gray-600 border border-gray-300 rounded-xl">
                                                        {{ $document->nature }}</dd>
                                                </dl>
                                            </div>

                                            <div class="mt-2">
                                                <dl class="grid grid-cols-1">
                                                    <dt class="font-serif text-xs italic text-gray-500">For :</dt>
                                                    <dd
                                                        class="p-1 text-sm font-medium text-gray-600 border border-gray-300 rounded-xl">
                                                        {{ $document->ActionFor }}</dd>
                                                </dl>
                                            </div>

                                            <div class="mt-2">
                                                <dl class="grid grid-cols-1">
                                                    <dt class="font-serif text-xs italic text-gray-500">Remarks :</dt>
                                                    <dd
                                                        class="p-1 text-sm font-medium text-gray-600 border border-gray-300 rounded-xl">
                                                        {{ $document->remarks }}</dd>
                                                </dl>
                                            </div>

                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="block hover:bg-gray-50">
                                        <div class="px-4 py-4 sm:px-6">
                                            <div
                                                class="flex px-6 py-2 text-sm font-medium text-gray-500 border-t border-b border-gray-200 bg-gray-50">
                                                <x-icon.location class="w-5 h-5" />
                                                <span class="pl-2">PAPER TRAIL</span>
                                            </div>
                                            <div class="mt-2 mb-2 sm:flex sm:justify-between">

                                                <nav class="flex-1 min-h-0 overflow-y-auto">
                                                    <section aria-labelledby="timeline-title"
                                                        class="lg:col-start-3 lg:col-span-1">
                                                        <div class="min-h-screen px-4 py-5 sm:px-6">
                                                            <!-- Activity Feed -->

                                                        </div>
                                                    </section>
                                                </nav>

                                            </div>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                        </div>

                    </div>
                </section>

                <!-- Audit Trail List-->
                <aside class="xl:order-first xl:block xl:flex-shrink-0">
                    <div class="relative flex flex-col h-full bg-gray-100 border-r border-gray-200 w-96">
                        <div class="flex-shrink-0">
                            <div class="flex flex-col justify-center h-16 px-6 bg-white">
                                <div class="flex items-baseline space-x-3">
                                    <h2 class="text-lg font-medium text-gray-900">Tracking Number:</h2>
                                    <p class="text-sm font-medium text-gray-500">{{ $document->tn }}</p>
                                </div>
                            </div>
                            <div
                                class="flex px-6 py-2 text-sm font-medium text-gray-500 border-t border-b border-gray-200 bg-gray-50">
                                <x-icon.location class="w-5 h-5" />
                                <span class="pl-2">PAPER TRAIL</span>
                            </div>
                        </div>
                        <nav class="flex-1 min-h-0 overflow-y-auto">
                            <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1">
                                <div class="px-4 py-5 sm:px-6">
                                    <!-- Activity Feed -->
                                    <div class="flow-root mt-6">
                                        <ul role="list" class="-mb-8">

                                            @forelse ($document->audit_trails as $item)
                                            <li>
                                                <div class="relative pb-8">
                                                    <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                                        aria-hidden="true"></span>
                                                    <div class="relative flex space-x-3">
                                                        <div>
                                                            <span
                                                                class="flex items-center justify-center w-8 h-8 bg-gray-400 rounded-full ring-8 ring-white">
                                                                <x-icon.location class="w-5 h-5 text-white" />
                                                            </span>
                                                        </div>
                                                        <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                            <div>
                                                                <p class="text-sm">
                                                                    <span class="font-medium text-blue-500 text-md">{{
                                                                        Str::upper($item->trail) }}</span><br>
                                                                    @if ($item->trail == 'transit' || $item->trail == 'process')
                                                                        <span class="text-xs italic text-gray-500">Start:</span>
                                                                        {{ $item->start }}<br>
                                                                        <span class="text-xs italic text-gray-500">End:</span>
                                                                        {{ $item->end }}<br>
                                                                        <span class="text-xs italic text-gray-500">Elapse:</span>
                                                                        {{ $item->elapse }}<br>
                                                                    @else
                                                                        <span class="text-xs italic text-gray-500">From:</span>
                                                                        {{ $item->OfficeName }} <br>
                                                                        <span class="text-xs italic text-gray-500">User:</span>
                                                                        {{ $item->UserName }}<br>
                                                                        <span class="text-xs italic text-gray-500">Time:</span>
                                                                        {{ $item->TrailTime }}<br>
                                                                    @endif

                                                                    <span
                                                                        class="text-xs italic text-gray-500">Status:</span>
                                                                    <span class="px-1 text-xs bg-green-200 rounded-xl">{{ $item->TrailStatus }}</span><br>
                                                                </p>
                                                            </div>
                                                            <div class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                                <span
                                                                    class="p-1 font-serif text-xs italic text-white bg-blue-500 rounded-xl">
                                                                    {{ $item->TrailDate }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @empty

                                            @endforelse
                                            <li>
                                                <div class="relative pb-8">
                                                    <span class="absolute top-4 left-4 -ml-px w-0.5"
                                                        aria-hidden="true"></span>
                                                    <div class="relative flex space-x-3">
                                                        <div>
                                                            <span
                                                                class="flex items-center justify-center w-8 h-8 bg-gray-400 rounded-full ring-8 ring-white">
                                                                <x-icon.arrow-path-rounded class="w-5 h-5 text-white" />
                                                            </span>
                                                        </div>
                                                        <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                            <div>
                                                                <p class="font-serif text-sm italic tracking-wider">
                                                                    {{ count($document->audit_trails) ? 'Processing...' :
                                                                    'Document is in draft.' }}
                                                                </p>
                                                            </div>
                                                            <div class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                                <span
                                                                    class="p-1 font-serif text-xs italic text-white bg-blue-500 rounded-xl">
                                                                    {{ date('Y-m-d') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>


                                        </ul>
                                    </div>
                                    {{-- <div class="flex flex-col mt-6 justify-stretch">
                                        <button type="button"
                                            class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            Add action taken
                                        </button>
                                    </div> --}}
                                </div>
                            </section>
                        </nav>
                    </div>
                </aside>
            </main>

            <!-- Delete Single Record Modal -->
            <div>
                <form wire:submit.prevent="deleteSingleRecord">
                    <x-modal.confirmation wire:model.defer="showDeleteSelectedRecordModal">
                        <x-slot name="title">Delete Selected Record</x-slot>

                        <x-slot name="content">
                            <div class="py-8 text-gray-700">Are you sure you? This action is irreversible.</div>
                        </x-slot>

                        <x-slot name="footer">
                            <x-button type="button" wire:click.prevent="$set('showDeleteSelectedRecordModal', false)">Cancel
                            </x-button>

                            <x-button type="submit">Delete</x-button>
                        </x-slot>
                    </x-modal.confirmation>
                </form>
            </div>

        </div>
    </div>
    </div>
