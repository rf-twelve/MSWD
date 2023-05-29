<div class="mb-4 space-y-3 overflow-y-auto max-h-96">
    <div class="space-y-1 sm:col-span-2">
        <label for="first_name" class="text-sm">First Name :</label>
        <x-input wire:model.lazy="first_name" id="first_name" type="text"/>
        @error('first_name')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="middle_name" class="text-sm">Middle Name :</label>
        <x-input wire:model.lazy="middle_name" id="middle_name" type="text"/>
        @error('middle_name')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="last_name" class="text-sm">Last Name :</label>
        <x-input wire:model.lazy="last_name" id="last_name" type="text"/>
        @error('last_name')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="birthdate" class="text-sm">Birthdate :</label>
        <x-input wire:model.lazy="birthdate" id="birthdate" type="date"/>
        @error('birthdate')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="gender" class="text-sm">Sex :</label>
        <x-select wire:model.lazy="gender" id="gender" class="w-full border">
            <option value="">-Select value-</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </x-select>
        @error('gender')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="category" class="text-sm">Category :</label>
        <x-select wire:model.lazy="category" id="category" class="w-full border">
            <option value="">-Select value-</option>
            <option value="Child">Child</option>
            <option value="PWD">PWD</option>
            <option value="Senior Citizen">Senior Citizen</option>
            <option value="N/A">N/A</option>
        </x-select>
        @error('category')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="lot_blk_no" class="text-sm">Lot/Blk no. :</label>
        <x-input wire:model.lazy="lot_blk_no" id="lot_blk_no" type="text"/>
        @error('lot_blk_no')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="street" class="text-sm">Street :</label>
        <x-input wire:model.lazy="street" id="street" type="text"/>
        @error('street')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="barangay" class="text-sm">Barangay :</label>
        <x-input wire:model.lazy="barangay" id="barangay" type="text"/>
        @error('barangay')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="contact" class="text-sm">Contact :</label>
        <x-input wire:model.lazy="contact" id="contact" type="text"/>
        @error('contact')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="email" class="text-sm">Email :</label>
        <x-input wire:model.lazy="email" id="email" type="text"/>
        @error('email')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="remarks_client" class="text-sm">Remarks :</label>
        <x-form.text-area wire:model.lazy="remarks_client" id="remarks_client" rows="4"></x-form.text-area>
        @error('remarks_client')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
</div>
