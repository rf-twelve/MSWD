@props([
    'sortable' => null,
    'direction' => null,
])

<th {{ $attributes->merge(['class'=>'text-lg uppercase text-white bg-purple-600'])}}>
    @unless ($sortable)
        <span class="flex px-3 text-sm font-medium uppercase tracking-wider">
            {{ $slot }}
        </span>
    @else
        <button {{ $attributes->except('class')}} class="flex uppercase items-center space-x-1 text-sm font-medium leading-4 tracking-wider text-left">
            <span>{{ $slot }}</span>
            <span>
                @if ($direction === 'asc')
                    <x-icon.sort-up class="w-5 h-5 text-white"/>
                @elseif ($direction === 'desc')
                    <x-icon.sort-down class="w-5 h-5 text-white"/>
                @else
                    <x-icon.sort class="w-5 h-5 text-purple-300 hover:text-white"/>
                @endif
            </span>
        </button>
    @endif
</th>

