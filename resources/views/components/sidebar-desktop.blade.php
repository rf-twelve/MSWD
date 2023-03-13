<div class="hidden bg-blue-200 lg:flex lg:flex-col lg:w-64 lg:fixed lg:inset-y-0 lg:border-r lg:border-gray-200">
    <div class="flex items-center flex-shrink-0 px-6">
        <img class="w-auto h-8" src="{{ asset(env('APP_LOGO')) }}" alt="app logo">
        <span class="flex flex-col flex-1 min-w-0 pl-2">
            <span class="text-sm font-medium text-gray-900 truncate">{{ env('APP_CLIENT') }}</span>
            <span class="text-sm text-gray-500 truncate">{{ env('APP_PROVINCE') }}</span>
        </span>
    </div>
    <!-- Sidebar component, swap this element with another sidebar if you like -->

    <x-sidebar-content />

</div>
