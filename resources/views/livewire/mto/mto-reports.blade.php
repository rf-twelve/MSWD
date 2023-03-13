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
                                MTO REPORTS
                            </a>
                        </div>
                    </li>
                </x-topbar-desktop>

                <div class="px-4 mt-2 mb-6 sm:px-6 lg:px-8">
                    <h2 class="text-xs italic font-medium tracking-wide text-gray-500 uppercase">REPORTS</h2>
                    <ul role="list" class="grid grid-cols-1 gap-4 mt-3 sm:gap-6 sm:grid-cols-2 xl:grid-cols-4" x-max="1">

                        <x-dashboard.stats>
                            <x-slot name="icon">
                                <x-icon.report class="flex-shrink-0 w-6 h-6 text-white" />
                            </x-slot>
                            <x-slot name="label">
                                <p class="font-medium text-gray-900">Assessment Roll</p>
                                <p class="font-medium text-gray-900">Report</p>
                            </x-slot>
                            <x-slot name="content">
                                <div class="py-1" role="none">
                                    <a href="{{ route('reports/assessment-roll-report',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">
                                        View
                                    </a>
                                </div>
                            </x-slot>
                        </x-dashboard.stats>

                        <x-dashboard.stats>
                            <x-slot name="icon">
                                <x-icon.report class="flex-shrink-0 w-6 h-6 text-white" />
                            </x-slot>
                            <x-slot name="label">
                                <p class="font-medium text-gray-900">Collectible</p>
                                <p class="font-medium text-gray-900">Report</p>
                            </x-slot>
                            <x-slot name="content">
                                <div class="py-1" role="none">
                                    <a href="{{ route('reports/collectible-report',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">
                                        View
                                    </a>
                                </div>
                            </x-slot>
                        </x-dashboard.stats>

                        <x-dashboard.stats>
                            <x-slot name="icon">
                                <x-icon.report class="flex-shrink-0 w-6 h-6 text-white" />
                            </x-slot>
                            <x-slot name="label">
                                <p class="font-medium text-gray-900">Collection & </p>
                                <p class="font-medium text-gray-900">Deposit Report</p>
                            </x-slot>
                            <x-slot name="content">
                                <div class="py-1" role="none">
                                    <a href="{{ route('reports/collection-and-deposit-report',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">
                                        View
                                    </a>
                                </div>
                            </x-slot>
                        </x-dashboard.stats>

                        <x-dashboard.stats>
                            <x-slot name="icon">
                                <x-icon.report class="flex-shrink-0 w-6 h-6 text-white" />
                            </x-slot>
                            <x-slot name="label">
                                <p class="font-medium text-gray-900">Delinquency</p>
                                <p class="font-medium text-gray-900">Report</p>
                            </x-slot>
                            <x-slot name="content">
                                <div class="py-1" role="none">
                                    <a href="{{ route('reports/delinquency-report',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">
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
