<div class="mb-4 space-y-3 overflow-y-auto max-h-96">
    <div class="space-y-1 sm:col-span-2">
        <label for="year_from" class="text-sm">Date :</label>
        <x-input wire:model.lazy="year_from" id="year_from" type="text" placeholder="Enter year ex. 2023"/>
        @error('year_from')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="year_to" class="text-sm">O.R./Serial No. :</label>
        <x-input wire:model.lazy="year_to" id="year_to" type="text" placeholder="Enter year ex. 2023"/>
        @error('year_to')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Teller :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Payee :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Fund :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Payment Type :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">From :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">To :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Basic :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Sef :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Penalty :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Amount Due :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Paid Cash :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Change :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Directory :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Remarks :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
</div>
