<div class="space-y-3">
    <div class="space-y-1 sm:col-span-2">
        <label for="year_from" class="text-sm">Year from :</label>
        <x-input wire:model.lazy="year_from" id="year_from" type="text" placeholder="Enter year ex. 2023"/>
        @error('year_from')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="year_to" class="text-sm">Year to :</label>
        <x-input wire:model.lazy="year_to" id="year_to" type="text" placeholder="Enter year ex. 2023"/>
        @error('year_to')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Value :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
</div>
