@props([
    'sortable' => null,
    'direction' => null,
])

<th {{ $attributes->merge(['class'=>'text-lg uppercase text-white bg-blue-600'])}}>
    @unless ($sortable)
        <span class="flex px-3 text-sm font-medium tracking-wider">
            {{ $slot }}
        </span>
    @else
        <button {{ $attributes->except('class')}} class="flex items-center space-x-1 text-sm font-medium leading-4 tracking-wider text-left">
            <span>{{ $slot }}</span>
            <span>
                @if ($direction === 'asc')
                    <x-icon.sort-up class="w-5 h-5 text-gray-600"/>
                @elseif ($direction === 'desc')
                    <x-icon.sort-down class="w-5 h-5 text-gray-600"/>
                @else
                    <x-icon.sort class="w-5 h-5 text-gray-200 hover:text-gray-600"/>
                @endif
            </span>
        </button>
    @endif
</th>

