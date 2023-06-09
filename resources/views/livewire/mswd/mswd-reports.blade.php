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
                                MSWD REPORTS
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
                                <p class="font-medium text-gray-900">Add Capital</p>
                                <p class="font-medium text-gray-900">Report</p>
                            </x-slot>
                            <x-slot name="content">
                                <div class="py-1" role="none">
                                    <a href="{{ route('mswd-reports-add-capital',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">
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
                                <p class="font-medium text-gray-900">Burial</p>
                                <p class="font-medium text-gray-900">Report</p>
                            </x-slot>
                            <x-slot name="content">
                                <div class="py-1" role="none">
                                    <a href="{{ route('mswd-reports-burial',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">
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
                                <p class="font-medium text-gray-900">Educational</p>
                                <p class="font-medium text-gray-900">Report</p>
                            </x-slot>
                            <x-slot name="content">
                                <div class="py-1" role="none">
                                    <a href="{{ route('mswd-reports-educational',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">
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
                                <p class="font-medium text-gray-900">Fire Victim</p>
                                <p class="font-medium text-gray-900">Report</p>
                            </x-slot>
                            <x-slot name="content">
                                <div class="py-1" role="none">
                                    <a href="{{ route('mswd-reports-fire-disaster-victim',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">
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
                                <p class="font-medium text-gray-900">House Repair</p>
                                <p class="font-medium text-gray-900">Report</p>
                            </x-slot>
                            <x-slot name="content">
                                <div class="py-1" role="none">
                                    <a href="{{ route('mswd-reports-house-repair',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">
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
                                <p class="font-medium text-gray-900">Medical</p>
                                <p class="font-medium text-gray-900">Report</p>
                            </x-slot>
                            <x-slot name="content">
                                <div class="py-1" role="none">
                                    <a href="{{ route('mswd-reports-medical',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">
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
                                <p class="font-medium text-gray-900">PWD</p>
                                <p class="font-medium text-gray-900">Report</p>
                            </x-slot>
                            <x-slot name="content">
                                <div class="py-1" role="none">
                                    <a href="{{ route('mswd-reports-person-with-disability',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">
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
                                <p class="font-medium text-gray-900">SeniorCitizen</p>
                                <p class="font-medium text-gray-900">Report</p>
                            </x-slot>
                            <x-slot name="content">
                                <div class="py-1" role="none">
                                    <a href="{{ route('mswd-reports-senior-citizen',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">
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
                                <p class="font-medium text-gray-900">Transportation</p>
                                <p class="font-medium text-gray-900">Report</p>
                            </x-slot>
                            <x-slot name="content">
                                <div class="py-1" role="none">
                                    <a href="{{ route('mswd-reports-transportation',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">
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
