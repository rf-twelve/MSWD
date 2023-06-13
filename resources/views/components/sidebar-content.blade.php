<div class="flex flex-col flex-1 mt-1 overflow-y-auto bg-purple-600">
    <!-- User account dropdown -->
    <div x-data="{userDropdown:false}" class="relative inline-block px-3 my-1 text-left">
        <div>
            <button x-on:click="userDropdown=!userDropdown" type="button"
                class="group w-full bg-gray-100 rounded-md px-3.5 py-2 text-sm text-left font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500"
                id="options-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="flex items-center justify-between w-full">
                    <span class="flex items-center justify-between min-w-0 space-x-3">
                        <img class="flex-shrink-0 w-10 h-10 bg-gray-300 rounded-full"
                            src="{{ asset('img/users/avatar.png') }}" alt="User profile">
                        <span class="flex flex-col flex-1 min-w-0">
                            <span class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->fullname }}</span>
                            <span class="text-sm text-gray-500 truncate">{{ Auth::user()->email }}</span>
                        </span>
                    </span>
                    <!-- Heroicon name: solid/selector -->
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </button>
        </div>

        {{-- PROFILE SETTINGS --}}
        <div x-show="userDropdown" @click.outside="userDropdown = false"
            class="absolute left-0 right-0 z-10 mx-3 mt-1 origin-top bg-white divide-y divide-gray-200 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
            role="menu" aria-orientation="vertical" aria-labelledby="options-menu-button" tabindex="-1">
            <div class="py-1" role="none">
                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                <a onclick="window.open('{{ route('profile-settings',['user_id'=>Auth::user()->id]) }}','_blank')" href="#"
                    class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                    id="options-menu-item-0">View profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                    id="options-menu-item-2">Notifications</a>
                <a wire:click='logout()' href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                    id="options-menu-item-5">Logout</a>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-2 space-y-1 uppercase" aria-label="Sidebar">
        <div>
            <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
            <a href="{{ route('user-dashboard',['user_id'=>Auth::user()->id])  }}"
                class="flex items-center w-full py-2 pl-2 font-semibold text-purple-700 bg-purple-200 rounded-md text-md group hover:text-gray-900 hover:bg-gray-50">
                <x-icon.home class="flex-shrink-0 w-6 h-6 mr-3" />
                DASHBOARD
            </a>
        </div>
        {{-- MUNICIPAL SOCIAL WELFARE DEVELOPMENT OFFICE --}}
        <div class="space-y-1">
            <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
            <button type="button"
                class="flex items-center w-full py-2 pl-2 pr-1 font-medium text-left text-purple-700 bg-purple-200 rounded-md text-md hover:bg-gray-50 hover:text-gray-900 group focus:outline-none focus:ring-2 focus:ring-indigo-500"
                aria-controls="sub-menu-4" aria-expanded="false">
                <x-icon.document class="flex-shrink-0 w-6 h-6 mr-3" />
                <span class="flex-1"> MSWD </span>
                <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                <x-icon.arrow-head class="flex-shrink-0 w-5 h-5 ml-3 text-gray-300 transition-colors duration-150 ease-in-out transform rotate-90 group-hover:text-gray-400"/>
            </button>
            <!-- Expandable link section, show/hide based on state. -->

            <div class="space-y-1 italic" id="sub-menu-4">
                <a href="{{ route('aics-list',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 text-sm font-medium text-purple-100 rounded-md group pl-11 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> AICS</span></a>
            </div>
            <div class="space-y-1 italic" id="sub-menu-4">
                <a href="{{ route('client-list',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 text-sm font-medium text-purple-100 rounded-md group pl-11 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> CLIENTS</span></a>
            </div>
            <div class="space-y-1 italic" id="sub-menu-4">
                <a href="{{ route('minor-traveling-abroad-list',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 text-sm font-medium text-purple-100 rounded-md group pl-11 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> MTA </span></a>
            </div>
            <div class="space-y-1 italic" id="sub-menu-4">
                <a href="{{ route('referral-list',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 text-sm font-medium text-purple-100 rounded-md group pl-11 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> REFERRAL </span></a>
            </div>
            <div class="space-y-1 italic" id="sub-menu-4">
                <a href="{{ route('mswd-reports',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 text-sm font-medium text-purple-100 rounded-md group pl-11 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> REPORTS </span></a>
            </div>
            <div class="space-y-1 italic" id="sub-menu-4">
                <a href="{{ route('strandee-list',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 text-sm font-medium text-purple-100 rounded-md group pl-11 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> STRANDEE</span></a>
            </div>
            {{-- <div class="space-y-1" id="sub-menu-4">
                <a href="{{ route('special-case-list',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 text-sm font-medium text-purple-100 rounded-md group pl-11 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> SPECIAL CASES</span></a>
            </div> --}}
        </div>

        <div class="space-y-1">
            <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
            <button type="button"
                class="flex items-center w-full py-2 pl-2 pr-1 font-medium text-left text-purple-700 bg-purple-200 rounded-md text-md hover:bg-gray-50 hover:text-gray-900 group focus:outline-none focus:ring-2 focus:ring-indigo-500"
                aria-controls="sub-menu-4" aria-expanded="false">
                <x-icon.settings class="flex-shrink-0 w-6 h-6 mr-3" />
                <span class="flex-1 font-semibold uppercase"> Settings </span>
                <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                <x-icon.arrow-head class="flex-shrink-0 w-5 h-5 ml-3 text-gray-300 transition-colors duration-150 ease-in-out transform rotate-90 group-hover:text-gray-400"/>
            </button>
            <!-- Expandable link section, show/hide based on state. -->
            <div class="space-y-1" id="sub-menu-4">

                <a href="{{ route('user-management',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 text-sm font-medium text-purple-100 rounded-md group pl-11 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.users class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1 italic"> User Management </span></a>

            </div>
            <div class="space-y-1" id="sub-menu-4">

                <a href="{{ route('company-profile',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 text-sm font-medium text-purple-100 rounded-md group pl-11 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.users class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1 italic"> System Config </span></a>

            </div>
        </div>

        <div class="mt-8 text-center bg-blue-100">
            <!-- Secondary navigation -->
            <h3 class="px-3 text-xs font-semibold tracking-wider text-gray-500 uppercase"
                id="desktop-teams-headline">LGU KALIBO - MSWD 2023</h3>

        </div>
        {{-- <div class="mt-8">
            <!-- Secondary navigation -->
            <h3 class="px-3 text-xs font-semibold tracking-wider text-gray-500 uppercase"
                id="desktop-teams-headline">CONNECTION STATUS</h3>
            <div class="mt-1 space-y-1" role="group" aria-labelledby="desktop-teams-headline">
                <a href="#"
                    class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md group hover:text-gray-900 hover:bg-gray-50">
                    <span class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full" aria-hidden="true"></span>
                    <span class="truncate"> Engineering </span>
                </a>

                <a href="#"
                    class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md group hover:text-gray-900 hover:bg-gray-50">
                    <span class="w-2.5 h-2.5 mr-4 bg-green-500 rounded-full" aria-hidden="true"></span>
                    <span class="truncate"> Server: 192.168.82.6 </span>
                </a>

                <a href="#"
                    class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md group hover:text-gray-900 hover:bg-gray-50">
                    <span class="w-2.5 h-2.5 mr-4 bg-yellow-500 rounded-full" aria-hidden="true"></span>
                    <span class="truncate"> Customer Success </span>
                </a>
            </div>
        </div> --}}
    </nav>
</div>
