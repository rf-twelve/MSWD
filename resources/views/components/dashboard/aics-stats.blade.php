<div class="px-4 mt-2 mb-6 sm:px-6 lg:px-8">
    <h2 class="text-xs italic font-medium tracking-wide text-gray-500 uppercase">AICS STATUS</h2>
    <ul role="list" class="grid grid-cols-1 gap-4 mt-3 sm:gap-6 sm:grid-cols-2 xl:grid-cols-4" x-max="1">

        <x-dashboard.stats>
            <x-slot name="icon">
                <x-icon.folder-open class="flex-shrink-0 w-6 h-6 text-white" />
            </x-slot>
            <x-slot name="label">
                <p class="font-medium text-gray-900">AICS</p>
                <p class="text-gray-500">
                    {{ number_format(App\Models\Assistance::count(), 0, '.', ',') }}
                </p>
            </x-slot>
            <x-slot name="content">
            </x-slot>
        </x-dashboard.stats>
        <x-dashboard.stats>
            <x-slot name="icon">
                <x-icon.folder-open class="flex-shrink-0 w-6 h-6 text-white" />
            </x-slot>
            <x-slot name="label">
                <p class="font-medium text-gray-900">CLIENT</p>
                <p class="text-gray-500">
                    {{ number_format(App\Models\Client::count(), 0, '.', ',') }}
                </p>
            </x-slot>
            <x-slot name="content">
            </x-slot>
        </x-dashboard.stats>
        <x-dashboard.stats>
            <x-slot name="icon">
                <x-icon.folder-open class="flex-shrink-0 w-6 h-6 text-white" />
            </x-slot>
            <x-slot name="label">
                <p class="font-medium text-gray-900">REFERRAL</p>
                <p class="text-gray-500">
                    {{ number_format(App\Models\Referral::count(), 0, '.', ',') }}
                </p>
            </x-slot>
            <x-slot name="content">
            </x-slot>
        </x-dashboard.stats>
        <x-dashboard.stats>
            <x-slot name="icon">
                <x-icon.folder-open class="flex-shrink-0 w-6 h-6 text-white" />
            </x-slot>
            <x-slot name="label">
                <p class="font-medium text-gray-900">STRANDEE</p>
                <p class="text-gray-500">
                    {{ number_format(App\Models\Strandee::count(), 0, '.', ',') }}
                </p>
            </x-slot>
            <x-slot name="content">
            </x-slot>
        </x-dashboard.stats>

    </ul>
</div>
