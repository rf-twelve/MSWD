<div class="mb-4 space-y-3 overflow-y-auto max-h-96">
    <div class="space-y-1 sm:col-span-2">
        <label for="form" class="text-sm">Select Form :</label>
        <x-select wire:model.lazy="form" id="form" class="w-full border">
            <option value="">-Select form-</option>
            @foreach (App\Models\ListForm::get() as $key => $value)
                <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
            @endforeach
        </x-select>
        @error('form')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="begin_qty" class="text-sm">Beginning Quantity :</label>
        <x-input wire:model.lazy="begin_qty" id="begin_qty" type="text" placeholder="Enter value ex. 123"/>
        @error('begin_qty')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="begin_serial_fr" class="text-sm">Beggining Serial From :</label>
        <x-input wire:model.lazy="begin_serial_fr" id="begin_serial_fr" type="text" placeholder="Enter value ex. 123"/>
        @error('begin_serial_fr')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="begin_serial_to" class="text-sm">Beggining Serial To :</label>
        <x-input wire:model.lazy="begin_serial_to" id="begin_serial_to" type="text" placeholder="Enter value ex. 123"/>
        @error('begin_serial_to')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="issued_qty" class="text-sm">Issued Quantity  :</label>
        <x-input wire:model.lazy="issued_qty" id="issued_qty" type="text" placeholder="Enter value ex. 123"/>
        @error('issued_qty')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="issued_serial_fr" class="text-sm">Issued Serial From  :</label>
        <x-input wire:model.lazy="issued_serial_fr" id="issued_serial_fr" type="text" placeholder="Enter value ex. 123"/>
        @error('issued_serial_fr')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="issued_serial_to" class="text-sm">Issued Serial To :</label>
        <x-input wire:model.lazy="issued_serial_to" id="issued_serial_to" type="text" placeholder="Enter value ex. 123"/>
        @error('issued_serial_to')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="end_qty" class="text-sm">Ending Quantity :</label>
        <x-input wire:model.lazy="end_qty" id="end_qty" type="text" placeholder="Enter value ex. 123"/>
        @error('end_qty')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="end_serial_fr" class="text-sm">Ending Serial From  :</label>
        <x-input wire:model.lazy="end_serial_fr" id="end_serial_fr" type="text" placeholder="Enter value ex. 123"/>
        @error('end_serial_fr')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="end_serial_to" class="text-sm">Issued Serial To :</label>
        <x-input wire:model.lazy="end_serial_to" id="end_serial_to" type="text" placeholder="Enter value ex. 123"/>
        @error('end_serial_to')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="user_id" class="text-sm">Teller :</label>
        <x-select wire:model.lazy="user_id" id="form" class="w-full border">
            <option value="">-Choose Teller-</option>
            @foreach (App\Models\User::get() as $key => $value)
                <option value="{{ $value['id'] }}">{{ $value['fullname'] }}</option>
            @endforeach
        </x-select>
        @error('user_id')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
</div>
