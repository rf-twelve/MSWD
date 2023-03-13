<div x-data="{openSidebarMobile:false}">
    <div class="min-h-screen bg-gray-100 ">

        {{-- ################# For Mobile --}}
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <x-sidebar-mobile />

        {{-- ##################### --}}
        <!-- Static sidebar for desktop -->
        <x-sidebar-desktop />

        <!-- Main column -->
        <div class="flex flex-col lg:pl-64">

            <!-- Topbar Mobile -->
            {{-- <x-topbar-mobile /> --}}

            <main class="flex-1">

                <!-- Topbar Desktop -->
                <x-topbar-desktop>
                    <li class="flex">
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"aria-hidden="true">
                                <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                            </svg>
                            <a href="#" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                                MTO SETTINGS
                            </a>
                        </div>
                    </li>
                </x-topbar-desktop>

                <div class="px-4 mt-2 mb-6 sm:px-6 lg:px-8">
                    <h2 class="text-xs italic font-medium tracking-wide text-gray-500 uppercase">SETTINGS</h2>
                    <ul role="list" class="grid grid-cols-1 gap-4 mt-3 sm:gap-6 sm:grid-cols-2 xl:grid-cols-4" x-max="1">

                        <x-dashboard.stats>
                            <x-slot name="icon">
                                <x-icon.document class="flex-shrink-0 w-6 h-6 text-white" />
                            </x-slot>
                            <x-slot name="label">
                                <p class="font-medium text-gray-900">Booklet</p>
                                <p class="font-medium text-gray-900">Setting</p>
                            </x-slot>
                            <x-slot name="content">
                                <div class="py-1" role="none">
                                    <a href="{{ route('settings/booklet-setting',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">
                                        View
                                    </a>
                                </div>
                            </x-slot>
                        </x-dashboard.stats>

                        <x-dashboard.stats>
                            <x-slot name="icon">
                                <x-icon.document class="flex-shrink-0 w-6 h-6 text-white" />
                            </x-slot>
                            <x-slot name="label">
                                <p class="font-medium text-gray-900">Form</p>
                                <p class="font-medium text-gray-900">Setting</p>
                            </x-slot>
                            <x-slot name="content">
                                <div class="py-1" role="none">
                                    <a href="{{ route('settings/form-setting',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">
                                        View
                                    </a>
                                </div>
                            </x-slot>
                        </x-dashboard.stats>

                        <x-dashboard.stats>
                            <x-slot name="icon">
                                <x-icon.document class="flex-shrink-0 w-6 h-6 text-white" />
                            </x-slot>
                            <x-slot name="label">
                                <p class="font-medium text-gray-900">Locality</p>
                                <p class="font-medium text-gray-900">Setting</p>
                            </x-slot>
                            <x-slot name="content">
                                <div class="py-1" role="none">
                                    <a href="{{ route('settings/locality-setting',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">
                                        View
                                    </a>
                                </div>
                            </x-slot>
                        </x-dashboard.stats>

                        <x-dashboard.stats>
                            <x-slot name="icon">
                                <x-icon.document class="flex-shrink-0 w-6 h-6 text-white" />
                            </x-slot>
                            <x-slot name="label">
                                <p class="font-medium text-gray-900">Tax</p>
                                <p class="font-medium text-gray-900">Setting</p>
                            </x-slot>
                            <x-slot name="content">
                                <div class="py-1" role="none">
                                    <a href="{{ route('settings/tax-setting',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">
                                        View
                                    </a>
                                </div>
                            </x-slot>
                        </x-dashboard.stats>


                    </ul>
                </div>

            </main>
        </div>
    </div>
</div>
