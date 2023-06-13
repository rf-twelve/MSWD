<div class="min-h-full">
    <div class="flex flex-col min-h-0">
        <!-- Top nav-->
        <x-topbar-desktop>
            <li class="flex">
                <div class="flex items-center">
                    <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                    </svg>
                    <a href="{{ route('user-dashboard',['user_id'=> auth()->user()->id]) }}"
                        class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                        Dashboard
                    </a>
                </div>
            </li>
            <li class="flex">
                <div class="flex items-center">
                    <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                    </svg>
                    <a href="{{ route('strandee-list',['user_id'=> auth()->user()->id]) }}"
                        class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                        Strandee
                    </a>
                </div>
            </li>
            <li class="flex">
                <div class="flex items-center">
                    <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                    </svg>
                    <a href="#" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                        View
                    </a>
                </div>
            </li>
        </x-topbar-desktop>

        <!-- Bottom section -->
        <div class="flex-1 min-h-0 overflow-hidden">
            <!-- Main area -->
            <main class="flex-1 min-w-0 border-t border-gray-200 xl:flex">

                <div class="order-first xl:block xl:flex-shrink-0">
                    <div class="relative flex flex-col h-full bg-gray-100 border-r border-gray-200 w-96">
                        <div class="flex-shrink-0">
                            <div
                                class="flex justify-between px-6 py-2 text-sm font-medium text-gray-700 bg-blue-300 border-t border-b border-gray-200">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                    <span class="pl-2">IMAGE</span>
                                    <a target="_blank"
                                        href="{{ route('strandee-print',['user_id'=>auth()->user()->id, 'id'=> $strandee['id']]) }}"
                                        class="flex ml-3 text-indigo-600 hover:text-indigo-900">
                                        <x-icon.printer class="w-5 h-5" /><span class="text-sm">Print</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <nav class="flex-1 min-h-0 overflow-y-auto">
                            <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1">

                                <div class="flex-shrink-0">
                                    <img src="{{ $strandee->imageUrl() }}" alt="Strandee photo"
                                        class="object-cover object-center w-full p-2">
                                </div>

                            </section>
                        </nav>
                    </div>
                </div>

                <section aria-labelledby="message-heading"
                    class="flex flex-col flex-1 h-full min-w-0 overflow-hidden xl:order-last">

                    <!-- RIGTH SIDE SPACE -->
                    <div class="flex-1 overflow-y-auto lg:block">
                        <div class="min-h-screen pb-6 bg-white shadow">
                            <div class="sm:items-baseline sm:justify-between">

                                {{--MAINTENANCE LOG--}}
                                <div class="p-4 space-y-6 divide-y divide-gray-200 sm:space-y-5">
                                    <div>
                                        <h3 class="text-lg font-medium leading-6 text-gray-900">INFORMATION</h3>
                                        <p class="max-w-2xl mt-1 text-sm text-gray-500">Detailed information about the strandee.</p>
                                    </div>
                                    <div class="space-y-6 divide-y divide-gray-200 sm:space-y-5">
                                        <div class="pt-6 sm:pt-5">
                                            <div role="group" aria-labelledby="label-email">
                                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                                                    <div>
                                                        <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700"
                                                            id="label-email">Complete Name :</div>
                                                    </div>
                                                    <div class="mt-4 sm:mt-0 sm:col-span-2">
                                                        <div class="max-w-lg space-y-4">
                                                            <div class="relative flex items-start">
                                                                {{ $strandee['name'] }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="space-y-6 divide-y divide-gray-200 sm:space-y-5">
                                        <div class="pt-6 sm:pt-5">
                                            <div role="group" aria-labelledby="label-email">
                                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                                                    <div>
                                                        <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700"
                                                            id="label-email">Address :</div>
                                                    </div>
                                                    <div class="mt-4 sm:mt-0 sm:col-span-2">
                                                        <div class="max-w-lg space-y-4">
                                                            <div class="relative flex items-start">
                                                                {{ $strandee['address'] }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="space-y-6 divide-y divide-gray-200 sm:space-y-5">
                                        <div class="pt-6 sm:pt-5">
                                            <div role="group" aria-labelledby="label-email">
                                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                                                    <div>
                                                        <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700"
                                                            id="label-email">Age :</div>
                                                    </div>
                                                    <div class="mt-4 sm:mt-0 sm:col-span-2">
                                                        <div class="max-w-lg space-y-4">
                                                            <div class="relative flex items-start">
                                                                {{ $strandee['age'] }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="space-y-6 divide-y divide-gray-200 sm:space-y-5">
                                        <div class="pt-6 sm:pt-5">
                                            <div role="group" aria-labelledby="label-email">
                                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                                                    <div>
                                                        <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700"
                                                            id="label-email">Birthday :</div>
                                                    </div>
                                                    <div class="mt-4 sm:mt-0 sm:col-span-2">
                                                        <div class="max-w-lg space-y-4">
                                                            <div class="relative flex items-start">
                                                                {{ $strandee['birthday'] }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="space-y-6 divide-y divide-gray-200 sm:space-y-5">
                                        <div class="pt-6 sm:pt-5">
                                            <div role="group" aria-labelledby="label-email">
                                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                                                    <div>
                                                        <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700"
                                                            id="label-email">Problem Presented :</div>
                                                    </div>
                                                    <div class="mt-4 sm:mt-0 sm:col-span-2">
                                                        <div class="max-w-lg space-y-4">
                                                            <div class="relative flex items-start">
                                                                {{ $strandee['problem_presented'] }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="space-y-6 divide-y divide-gray-200 sm:space-y-5">
                                        <div class="pt-6 sm:pt-5">
                                            <div role="group" aria-labelledby="label-email">
                                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                                                    <div>
                                                        <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700"
                                                            id="label-email">Intervention :</div>
                                                    </div>
                                                    <div class="mt-4 sm:mt-0 sm:col-span-2">
                                                        <div class="max-w-lg space-y-4">
                                                            <div class="relative flex items-start">
                                                                {{ $strandee['intervention'] }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </section>

            </main>
        </div>
    </div>
</div>
