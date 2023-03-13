<div class="mb-4 space-y-3 overflow-y-auto max-h-96">
    <div class="space-y-1 sm:col-span-2">
        <label for="pin" class="text-sm">PIN :</label>
        <x-input wire:model.lazy="pin" id="pin" type="text" placeholder="Enter year ex. 2023"/>
        @error('pin')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="kind" class="text-sm">Kind :</label>
        <x-input wire:model.lazy="kind" id="kind" type="text" placeholder="Enter year ex. 2023"/>
        @error('kind')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="classname" class="text-sm">Class :</label>
        <x-input wire:model.lazy="class" id="classname" type="text" placeholder="Enter classname ex. 1,000.00"/>
        @error('class')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">TD/ARP No. :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Owner's Name :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Address :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Lot/Blk No. :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Streer Name :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Barangay :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Municipal/City :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Province :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Payment Date :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">O.R. No. :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Year From :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Quarter From :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Year To :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Quarter To :</label>
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
    <div class="space-y-1 sm:col-span-2">
        <label for="value" class="text-sm">Payment Start :</label>
        <x-input wire:model.lazy="value" id="value" type="text" placeholder="Enter value ex. 1,000.00"/>
        @error('value')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
</div>
