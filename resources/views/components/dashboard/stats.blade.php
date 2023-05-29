<li class="relative flex col-span-1 rounded-md shadow-sm">
    <div
        class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-purple-500 rounded-l-md">
        {{ $icon }}
        {{-- <x-icon.folder-open class="flex-shrink-0 w-6 h-6 text-white" /> --}}
    </div>
    <div
        class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
        <div class="flex-1 px-4 py-2 text-sm truncate">
            {{ $label }}
            {{-- <p class="font-medium text-gray-900">Office Documents</p>
            <p class="text-gray-500">12 Records</p> --}}
        </div>
        <div x-data="{openOptions:false}" @click.away="openOptions = false"
            class="flex-shrink-0 pr-2">
            <button type="button" x-on:click="openOptions = !openOptions"
                class="inline-flex items-center justify-center w-8 h-8 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                <x-icon.dots-vertical class="w-5 h-5" />
            </button>

            <div x-show="openOptions" x-transition.duration.500ms
                class="absolute z-10 mx-1 mt-1 origin-top-right bg-white divide-y divide-gray-200 rounded-md shadow-lg right-10 top-10 ring-1 ring-black ring-opacity-5 focus:outline-none"
                style="display: none;">
                {{ $content }}
                {{-- <div class="py-1" role="none">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700">View</a>
                </div> --}}
            </div>

        </div>
    </div>
</li>
