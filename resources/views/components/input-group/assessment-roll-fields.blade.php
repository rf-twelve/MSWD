<div class="mb-4 space-y-3 overflow-y-auto max-h-96">
    <div class="space-y-1 sm:col-span-2">
        <label for="assmt_roll_td_arp_no" class="text-sm">TD/ARP Number :</label>
        <x-input wire:model.lazy="assmt_roll_td_arp_no" id="assmt_roll_td_arp_no" type="text" placeholder="Enter TD/ARP Numnber"/>
        @error('assmt_roll_td_arp_no')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="assmt_roll_pin" class="text-sm">PIN :</label>
        <x-input wire:model.lazy="assmt_roll_pin" id="assmt_roll_pin" type="text" placeholder="Enter PIN"/>
        @error('assmt_roll_pin')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="assmt_roll_owner" class="text-sm">Property Owner  :</label>
        <x-input wire:model.lazy="assmt_roll_owner" id="assmt_roll_owner" type="text" placeholder="Enter Owner Name"/>
        @error('assmt_roll_owner')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="assmt_roll_address" class="text-sm">Address  :</label>
        <x-input wire:model.lazy="assmt_roll_address" id="assmt_roll_address" type="text" placeholder="Enter Owner Address"/>
        @error('assmt_roll_address')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="assmt_roll_lot_blk_no" class="text-sm">Lot\Blk Number :</label>
        <x-input wire:model.lazy="assmt_roll_lot_blk_no" id="assmt_roll_lot_blk_no" type="text" placeholder="Enter Property Location"/>
        @error('assmt_roll_lot_blk_no')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>

    <div class="space-y-1 sm:col-span-2">
        <label for="assmt_roll_brgy" class="text-sm">Barangay :</label>
        <x-select wire:model.lazy="assmt_roll_brgy" id="assmt_roll_brgy" class="w-full border">
            <option value="">-Select Barangay-</option>
            @foreach (App\Models\ListBarangay::get() as $key => $value)
                <option value="{{ $value['index'] }}">{{ $value['name'] }}</option>
            @endforeach
        </x-select>
        @error('assmt_roll_brgy')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="assmt_roll_municity" class="text-sm">Municity :</label>
        <x-select wire:model.lazy="assmt_roll_municity" id="assmt_roll_municity" class="w-full border">
            <option value="">-Select Municipality-</option>
            @foreach (App\Models\ListMunicity::get() as $key => $value)
                <option value="{{ $value['index'] }}">{{ $value['name'] }}</option>
            @endforeach
        </x-select>
        @error('assmt_roll_municity')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="assmt_roll_province" class="text-sm">Province  :</label>
        <x-select wire:model.lazy="assmt_roll_province" id="assmt_roll_province" class="w-full border">
            <option value="">-Select Province-</option>
            @foreach (App\Models\ListProvince::get() as $key => $value)
                <option value="{{ $value['index'] }}">{{ $value['name'] }}</option>
            @endforeach
        </x-select>
        @error('assmt_roll_province')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="assmt_roll_kind" class="text-sm">Kind :</label>
        <x-input wire:model.lazy="assmt_roll_kind" id="assmt_roll_kind" type="text" placeholder="Enter Property Kind"/>
        @error('assmt_roll_kind')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="assmt_roll_class" class="text-sm">Class :</label>
        <x-input wire:model.lazy="assmt_roll_class" id="assmt_roll_class" type="text" placeholder="Enter Property Class"/>
        @error('assmt_roll_class')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="assmt_roll_av" class="text-sm">Assessed Value :</label>
        <x-input wire:model.lazy="assmt_roll_av" id="assmt_roll_av" type="text" placeholder="Enter Property AV"/>
        @error('assmt_roll_av')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="assmt_roll_effective" class="text-sm">Effectivity :</label>
        <x-input wire:model.lazy="assmt_roll_effective" id="assmt_roll_effective" type="text" placeholder="Enter Effectivity Year"/>
        @error('assmt_roll_effective')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="assmt_roll_td_arp_no_prev" class="text-sm">Previous TD/ARP No. :</label>
        <x-input wire:model.lazy="assmt_roll_td_arp_no_prev" id="assmt_roll_td_arp_no_prev" type="text" placeholder="Enter TD/ARP Previous"/>
        @error('assmt_roll_td_arp_no_prev')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="assmt_roll_av_prev" class="text-sm">Previous Assessed Value. :</label>
        <x-input wire:model.lazy="assmt_roll_av_prev" id="assmt_roll_av_prev" type="text" placeholder="Enter AV Previous"/>
        @error('assmt_roll_av_prev')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="assmt_roll_remarks" class="text-sm">Remarks :</label>
        <x-form.text-area wire:model.lazy="assmt_roll_remarks" id="assmt_roll_remarks" rows="4"></x-form.text-area>
        @error('assmt_roll_remarks')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
</div>
