<div class="space-y-3">
    <div class="space-y-1 sm:col-span-2">
        <label for="av_year_from" class="text-sm">Year from :</label>
        <x-input wire:model.lazy="av_year_from" id="av_year_from" type="text" placeholder="Ex. 2023"/>
        @error('av_year_from')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="av_year_to" class="text-sm">Year to :</label>
        <x-input wire:model.lazy="av_year_to" id="av_year_to" type="text" placeholder="Ex. 2023"/>
        @error('av_year_to')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="av_value" class="text-sm">Assessed value :</label>
        <x-input wire:model.lazy="av_value" id="av_value" type="text" placeholder="Ex. 1,000.00"/>
        @error('av_value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
</div>
