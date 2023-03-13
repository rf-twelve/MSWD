<div x-data="{openSidebarMobile:false}">
    <div class="min-h-full">

        {{-- ################# For Mobile --}}
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <x-sidebar-mobile />


        {{-- ##################### --}}
        <!-- Static sidebar for desktop -->
        <x-sidebar-desktop />



        <!-- Main column -->
        <div class="flex flex-col lg:pl-64">
            <!-- Search header -->
            <div class="sticky top-0 z-10 flex flex-shrink-0 h-16 bg-white border-b border-gray-200 lg:hidden">
                <!-- Sidebar toggle, controls the 'sidebarOpen' sidebar state. -->
                <button x-on:click="openSidebarMobile = true" type="button"
                    class="px-4 text-gray-500 border-r border-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden">
                    <span class="sr-only">Open sidebar</span>
                    <!-- Heroicon name: outline/menu-alt-1 -->
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </button>
                <div class="flex justify-between flex-1 px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-1">
                        <form class="flex w-full md:ml-0" action="#" method="GET">
                            <label for="search-field" class="sr-only">Search</label>
                            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                    <!-- Heroicon name: solid/search -->
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input id="search-field" name="search-field"
                                    class="block w-full h-full py-2 pl-8 pr-3 text-gray-900 placeholder-gray-500 border-transparent focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-gray-400 sm:text-sm"
                                    placeholder="Search" type="search">
                            </div>
                        </form>
                    </div>
                    <div x-data={userDropdownMobile:false} class="flex items-center">
                        <!-- Profile dropdown -->
                        <div class="relative ml-3">
                            <div>
                                <button wire:click='clicked' x-on:click="userDropdownMobile = true" type="button"
                                    class="flex items-center max-w-xs text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-8 h-8 rounded-full"
                                        src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                </button>
                            </div>

                            <!--
                                Dropdown menu, show/hide based on menu state.

                                Entering: "transition ease-out duration-100"
                                From: "transform opacity-0 scale-95"
                                To: "transform opacity-100 scale-100"
                                Leaving: "transition ease-in duration-75"
                                From: "transform opacity-100 scale-100"
                                To: "transform opacity-0 scale-95"
                            -->
                            <div x-show="userDropdownMobile"
                                class="absolute right-0 w-48 mt-2 origin-top-right bg-white divide-y divide-gray-200 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <div class="py-1" role="none">
                                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-0">View profile</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-1">Settings</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-2">Notifications</a>
                                </div>
                                <div class="py-1" role="none">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-3">Get desktop app</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-4">Support</a>
                                </div>
                                <div class="py-1" role="none">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-5">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <main class="flex-1">
                <!-- Page title & actions -->
                <!-- This example requires Tailwind CSS v2.0+ -->
                <nav class="flex bg-white border-b border-gray-200" aria-label="Breadcrumb">
                    <ol role="list" class="flex w-full max-w-screen-xl px-4 mx-auto space-x-4 sm:px-6 lg:px-8">
                        <li class="flex">
                            <div class="flex items-center">
                                <a href="#" class="text-gray-400 hover:text-gray-500">
                                    <!-- Heroicon name: solid/home -->
                                    <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                    </svg>
                                    <span class="sr-only">Home</span>
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
                                <a href="#"
                                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Projects</a>
                            </div>
                        </li>

                        <li class="flex">
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44"
                                    preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true">
                                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                                </svg>
                                <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                                    aria-current="page">Project Nero</a>
                            </div>
                        </li>
                    </ol>
                </nav>
                {{-- <div
                    class="px-4 py-4 border-b border-gray-200 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                    <div class="flex-1 min-w-0">
                        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Home</h1>
                    </div>
                    <div class="flex mt-4 sm:mt-0 sm:ml-4">
                        <button type="button"
                            class="inline-flex items-center order-1 px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">Share</button>
                        <button type="button"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-purple-600 border border-transparent rounded-md shadow-sm order-0 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">Create</button>
                    </div>
                </div> --}}


                <!-- Pinned projects -->
                <div class="px-4 mt-2 sm:px-6 lg:px-8">
                    <h2 class="text-xs font-medium tracking-wide text-gray-500 uppercase">Account Status</h2>
                    <ul role="list" class="grid grid-cols-1 gap-4 mt-3 sm:gap-6 sm:grid-cols-2 xl:grid-cols-4"
                        x-max="1">

                        <li class="relative flex col-span-1 rounded-md shadow-sm">
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-indigo-600 rounded-l-md">
                                N
                            </div>
                            <div
                                class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
                                <div class="flex-1 px-4 py-2 text-sm truncate">
                                    <a href="#" class="font-medium text-gray-900 hover:text-gray-600">
                                        New
                                    </a>
                                    <p class="text-gray-500">12 Records</p>
                                </div>
                                <div x-data="{openOptions:false}" @click.away="openOptions = false"
                                    class="flex-shrink-0 pr-2">
                                    <button type="button" x-on:click="openOptions = !openOptions"
                                        class="inline-flex items-center justify-center w-8 h-8 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600"
                                        x-on:click="openOptions =! openOptions">
                                        <span class="sr-only">Open options</span>
                                        <svg class="w-5 h-5" x-description="Heroicon name: solid/dots-vertical"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path
                                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                                            </path>
                                        </svg>
                                    </button>

                                    <div x-show="openOptions" x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="transform opacity-0 scale-95"
                                        x-transition:enter-end="transform opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="transform opacity-100 scale-100"
                                        x-transition:leave-end="transform opacity-0 scale-95"
                                        class="absolute z-10 w-48 mx-3 mt-1 origin-top-right bg-white divide-y divide-gray-200 rounded-md shadow-lg right-10 top-3 ring-1 ring-black ring-opacity-5 focus:outline-none"
                                        style="display: none;">
                                        <div class="py-1" role="none">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">View</a>
                                        </div>
                                        <div class="py-1" role="none">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Removed from pinned</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Share</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </li>

                        <li class="relative flex col-span-1 rounded-md shadow-sm">
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-yellow-500 rounded-l-md">
                                D
                            </div>
                            <div
                                class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
                                <div class="flex-1 px-4 py-2 text-sm truncate">
                                    <a href="#" class="font-medium text-gray-900 hover:text-gray-600">
                                        Duplicates
                                    </a>
                                    <p class="text-gray-500">8 Records</p>
                                </div>
                                <div x-data="{ openOptions: false }" @click.away="openOptions = false"
                                    class="flex-shrink-0 pr-2">
                                    <button type="button" x-on:click="openOptions = !openOptions"
                                        class="inline-flex items-center justify-center w-8 h-8 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                        <span class="sr-only">Open options</span>
                                        <svg class="w-5 h-5" x-description="Heroicon name: solid/dots-vertical"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path
                                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                                            </path>
                                        </svg>
                                    </button>

                                    <div x-show="openOptions" x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="transform opacity-0 scale-95"
                                        x-transition:enter-end="transform opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="transform opacity-100 scale-100"
                                        x-transition:leave-end="transform opacity-0 scale-95"
                                        class="absolute z-10 w-48 mx-3 mt-1 origin-top-right bg-white divide-y divide-gray-200 rounded-md shadow-lg right-10 top-3 ring-1 ring-black ring-opacity-5 focus:outline-none"
                                        style="display: none;">
                                        <div class="py-1" role="none">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">View</a>
                                        </div>
                                        <div class="py-1" role="none">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Removed from pinned</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Share</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </li>

                        <li class="relative flex col-span-1 rounded-md shadow-sm">
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-green-500 rounded-l-md">
                                V
                            </div>
                            <div
                                class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
                                <div class="flex-1 px-4 py-2 text-sm truncate">
                                    <a href="#" class="font-medium text-gray-900 hover:text-gray-600">
                                        Verified
                                    </a>
                                    <p class="text-gray-500">14 Records</p>
                                </div>
                                <div x-data="{ openOptions: false }" @click.away="openOptions = false"
                                    class="flex-shrink-0 pr-2">
                                    <button type="button" x-on:click="openOptions = !openOptions"
                                        class="inline-flex items-center justify-center w-8 h-8 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                        <span class="sr-only">Open options</span>
                                        <svg class="w-5 h-5" x-description="Heroicon name: solid/dots-vertical"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path
                                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                                            </path>
                                        </svg>
                                    </button>

                                    <div x-show="openOptions" x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="transform opacity-0 scale-95"
                                        x-transition:enter-end="transform opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="transform opacity-100 scale-100"
                                        x-transition:leave-end="transform opacity-0 scale-95"
                                        class="absolute z-10 w-48 mx-3 mt-1 origin-top-right bg-white divide-y divide-gray-200 rounded-md shadow-lg right-10 top-3 ring-1 ring-black ring-opacity-5 focus:outline-none"
                                        style="display: none;">
                                        <div class="py-1" role="none">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">View</a>
                                        </div>
                                        <div class="py-1" role="none">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Removed from pinned</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Share</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </li>

                        <li class="relative flex col-span-1 rounded-md shadow-sm">
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-pink-600 rounded-l-md">
                                U
                            </div>
                            <div
                                class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
                                <div class="flex-1 px-4 py-2 text-sm truncate">
                                    <a href="#" class="font-medium text-gray-900 hover:text-gray-600">
                                        Unverified</a>
                                    <p class="text-gray-500">2 Records</p>
                                </div>
                                <div x-data="{ openOptions: false }" @click.away="openOptions = false"
                                    class="flex-shrink-0 pr-2">
                                    <button type="button" x-on:click="openOptions = !openOptions"
                                        class="inline-flex items-center justify-center w-8 h-8 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-600">
                                        <span class="sr-only">Open options</span>
                                        <svg class="w-5 h-5" x-description="Heroicon name: solid/dots-vertical"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path
                                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                                            </path>
                                        </svg>
                                    </button>

                                    <div x-show="openOptions" x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="transform opacity-0 scale-95"
                                        x-transition:enter-end="transform opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="transform opacity-100 scale-100"
                                        x-transition:leave-end="transform opacity-0 scale-95"
                                        class="absolute z-10 w-48 mx-3 mt-1 origin-top-right bg-white divide-y divide-gray-200 rounded-md shadow-lg right-10 top-3 ring-1 ring-black ring-opacity-5 focus:outline-none"
                                       style="display: none;">
                                        <div class="py-1" role="none">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">View</a>
                                        </div>
                                        <div class="py-1" role="none">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Removed from pinned</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Share</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </li>

                    </ul>
                </div>

                <!-- Navigation for search, filter and sort -->

                <!-- Projects list (only on smallest breakpoint) -->
                <div class="mt-10 sm:hidden">
                    <div class="px-4 sm:px-6">
                        <h2 class="text-xs font-medium tracking-wide text-gray-500 uppercase">Projects</h2>
                    </div>
                    <ul role="list" class="mt-3 border-t border-gray-200 divide-y divide-gray-100">
                        <li>
                            <a href="#"
                                class="flex items-center justify-between px-4 py-4 group hover:bg-gray-50 sm:px-6">
                                <span class="flex items-center space-x-3 truncate">
                                    <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-pink-600"
                                        aria-hidden="true"></span>
                                    <span class="text-sm font-medium leading-6 truncate">
                                        GraphQL API
                                        <span class="font-normal text-gray-500 truncate">in Engineering</span>
                                    </span>
                                </span>
                                <!-- Heroicon name: solid/chevron-right -->
                                <svg class="w-5 h-5 ml-4 text-gray-400 group-hover:text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>

                        <!-- More projects... -->
                    </ul>
                </div>

                <!-- Data table (small breakpoint and up) -->

                <div class="grid grid-cols-1 gap-4 px-4 mt-6 lg:px-8 sm:px-6 lg:grid-cols-2 ">
                    <div class="flex items-center flex-1">
                        <div class="w-full lg:max-w-xs">
                          <label for="search" class="sr-only">Search</label>
                          <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <x-icon.search class="w-5 h-5 text-gray-500" />
                            </div>
                            <x-form.input-text wire:model.debounce.500ms="filters.search" id="searchTerm" class="block w-full py-2 pl-10 pr-3 leading-5 placeholder-gray-500 bg-white border border-gray-300 rounded-xl focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Search" placeholder="Type any keyword..." type="search"/>
                          </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-center space-x-1 lg:justify-end">
                            <div>
                                <x-form.select class="" wire:model="perPage" id="perPage">
                                    <option value="10">10 / page</option>
                                    <option value="25">25 / page</option>
                                    <option value="50">50 / page</option>
                                    <option value="100">100 / page</option>
                                </x-form.select>
                            </div>
                            <div>
                                <x-form.dropdown class="rounded-xl" label="Actions">
                                    <x-form.dropdown-item class="rounded-xl" type="button" wire:click="$toggle('showDeleteModal')" class="flex items-center space-x-2">
                                        <x-icon.trash class="text-cool-gray-400"/> <span>Delete</span>
                                    </x-form.dropdown-item>
                                </x-form.dropdown>
                            </div>
                            <div>
                                <x-form.button wire:click="$toggle('showImportModal')" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-600 bg-white border border-transparent shadow-sm rounded-xl hover:bg-sky-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                                    <x-icon.download class="w-5 h-5"/> <span>Import</span>
                                </x-form.button>
                            </div>
                            <div>
                                <x-form.button wire:click="create" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-600 bg-white border border-transparent shadow-sm w-max rounded-xl hover:bg-sky-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                                    <x-icon.plus class="w-5 h-5"/> <span>New</span>
                                </x-form.button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Data table (small breakpoint and up) -->
                <div class="hidden sm:block">
                    <div class="inline-block min-w-full align-middle border-b border-gray-200">

                        <x-table>

                            <x-slot name="head">
                                <x-table.head class="flex py-1">
                                    <x-form.checkbox wire:model="selectPage" />
                                </x-table.head>
                                <x-table.head class="px-2 py-2" sortable wire:click="sortBy('rpt_pin')"
                                    :direction="$sortField === 'rpt_pin' ? $sortDirection : null">PIN</x-table.head>
                                <x-table.head class="px-2 py-2" sortable wire:click="sortBy('rpt_kind')"
                                    :direction="$sortField === 'rpt_kind' ? $sortDirection : null">KIND</x-table.head>
                                <x-table.head class="px-2 py-2" sortable wire:click="sortBy('rpt_class')"
                                    :direction="$sortField === 'rpt_class' ? $sortDirection : null">CLASS</x-table.head>
                                <x-table.head class="w-1/4 px-2 py-2" sortable wire:click="sortBy('rpt_arp_no')"
                                    :direction="$sortField === 'rpt_arp_no' ? $sortDirection : null">TD/ARP No.
                                </x-table.head>
                                <x-table.head class="w-1/4 px-2 py-2" sortable wire:click="sortBy('ro_name')"
                                    :direction="$sortField === 'ro_name' ? $sortDirection : null">Owner/s Name
                                </x-table.head>
                                <x-table.head class="px-6 py-2"><span class="sr-only">Edit</span></x-table.head>
                            </x-slot>


                            <x-slot name="body">
                                @if($selectPage)
                                <x-table.row class="bg-gray-300" wire:key="row-message">
                                    <x-table.cell colspan="9" class="py-2">
                                        @unless ($selectAll)
                                        <div>
                                            <span>You have selected <strong>{{ $accounts->count() }}</strong> records,
                                                do you want to select all <strong>{{ $accounts->total()
                                                    }}</strong>?</span>
                                            <x-form.link wire:click="selectAll" class="ml-1 text-blue-500">Select All
                                            </x-form.link>
                                        </div>
                                        @else
                                        <span>You have selected all <strong>{{ $accounts->total() }}</strong>
                                            records.</span>
                                        @endIf
                                    </x-table.cell>
                                </x-table.row>
                                @endif

                                @forelse ($accounts as $item)
                                <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $item->id }}">
                                    <x-table.cell class="w-6 pl-2 pr-0">
                                        <x-form.checkbox wire:model="selected" value="{{ $item->id }}" />
                                    </x-table.cell>
                                    <x-table.cell>
                                        <p class="text-gray-600">{{ $item->rpt_pin }}</p>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span class="text-gray-600">{{ $item->rpt_kind }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span class="text-gray-600">{{ $item->rpt_class }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span class="text-gray-600">{{ $item->rpt_arp_no }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span class="text-gray-600">{{ $item->doc_nature }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span class="text-gray-600">{{ $item->ro_name }}</span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <div class="flex space-x-2">
                                            <span class="text-gray-600">
                                                <x-form.link class="flex items-center space-x-2"
                                                    wire:click="edit({{ $item->id }})">
                                                    <x-icon.view class="w-5 h-5 text-gray-600" />
                                                </x-form.link>
                                            </span>
                                        </div>
                                    </x-table.cell>
                                </x-table.row>
                                @empty
                                <x-table.row wire:loading.class.delay="opacity-50">
                                    <x-table.cell colspan="10">
                                        <div class="flex items-center justify-center">
                                            <x-icon.box class="w-8 h-8 text-slate-400" />
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
                            {{ $accounts->links('vendor.livewire.modified-tailwind') }}
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
