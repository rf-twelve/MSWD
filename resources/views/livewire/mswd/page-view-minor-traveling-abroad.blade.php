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
                    <a href="{{ route('minor-traveling-abroad-list',['user_id'=>auth()->user()->id]) }}" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                        Minor Traveling Abroad List
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
                        <div class="p-4 space-y-6 divide-y divide-gray-200 sm:space-y-5">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Detailed Information</h3>

                            <div class="border-t border-gray-200">
                                <ul role="list" class="divide-y divide-gray-200">
                                    <li class="py-4">
                                        <div class="flex space-x-3">
                                            <div class="flex-1 space-y-1">
                                                <h3 class="text-sm font-medium uppercase">mta no :</h3>
                                                <p class="text-sm text-gray-500">{{ $data['mta_no'] }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="py-4">
                                        <div class="flex space-x-3">
                                            <div class="flex-1 space-y-1">
                                                <h3 class="text-sm font-medium uppercase">date :</h3>
                                                <p class="text-sm text-gray-500">{{ $data['date'] }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="py-4">
                                        <div class="flex space-x-3">
                                            <div class="flex-1 space-y-1">
                                                <h3 class="text-sm font-medium uppercase">name :</h3>
                                                <p class="text-sm text-gray-500">{{ $data['name'] }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="py-4">
                                        <div class="flex space-x-3">
                                            <div class="flex-1 space-y-1">
                                                <h3 class="text-sm font-medium uppercase">birthdate :</h3>
                                                <p class="text-sm text-gray-500">{{ $data['birthdate'] }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="py-4">
                                        <div class="flex space-x-3">
                                            <div class="flex-1 space-y-1">
                                                <h3 class="text-sm font-medium uppercase">destination :</h3>
                                                <p class="text-sm text-gray-500">{{ $data['destination'] }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="py-4">
                                        <div class="flex space-x-3">
                                            <div class="flex-1 space-y-1">
                                                <h3 class="text-sm font-medium uppercase">traveling companion :</h3>
                                                <p class="text-sm text-gray-500">{{ $data['traveling_companion'] }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="py-4">
                                        <div class="flex space-x-3">
                                            <div class="flex-1 space-y-1">
                                                <h3 class="text-sm font-medium uppercase">address :</h3>
                                                <p class="text-sm text-gray-500">{{ $data['address'] }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="py-4">
                                        <div class="flex space-x-3">
                                            <div class="flex-1 space-y-1">
                                                <h3 class="text-sm font-medium uppercase">parents :</h3>
                                                <p class="text-sm text-gray-500">{{ $data['parents'] }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="py-4">
                                        <div class="flex space-x-3">
                                            <div class="flex-1 space-y-1">
                                                <h3 class="text-sm font-medium uppercase">remarks :</h3>
                                                <p class="text-sm text-gray-500">{{ $data['remarks'] }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="py-4">
                                        <div class="flex space-x-3">
                                            <div class="flex-1 space-y-1">
                                                <h3 class="text-sm font-medium uppercase">Encoder :</h3>
                                                <p class="text-sm text-gray-500">{{ $data->encoderFullname() }}</p>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- More items... -->
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

                <section aria-labelledby="message-heading"
                    class="flex flex-col flex-1 h-full min-w-0 overflow-hidden xl:order-last">

                    <!-- RIGTH SIDE SPACE -->
                    <div class="flex-1 overflow-y-auto lg:block">
                        <div class="min-h-screen pb-6 bg-white shadow">
                            <div class="sm:items-baseline sm:justify-between">

                                <div class="p-4 space-y-6 divide-y divide-gray-200 sm:space-y-5">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                                        Image/Scanned Document
                                    </h3>
                                        {{--IMAGE/SCANNED DOCUMENTS--}}
                                        @forelse ($images as $key=>$image)
                                        <img class="object-cover object-center w-full p-2"
                                            src="{{ $image->imageUrl() }}"
                                            alt="An image file">
                                    @empty
                                    <div class="p-4 rounded-md bg-red-50">
                                        <div class="flex p-4 bg-gray-300 rounded">
                                            <div class="flex-shrink-0">
                                                <!-- Heroicon name: solid/exclamation -->
                                                <svg class="text-yellow-800 w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <div class="ml-3">
                                                <h3 class="text-lg font-medium text-yellow-800">
                                                    NO IMAGE FOUND!
                                                </h3>
                                                <div class="mt-2 text-yellow-700 text-md">
                                                    <p>This record has no images or scanned document attached!</p>
                                                    <p>To attach image file, go to edit record.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>


                </section>

            </main>
        </div>
    </div>
</div>
