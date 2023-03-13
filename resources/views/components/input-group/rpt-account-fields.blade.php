<div class="mb-4 space-y-3 overflow-y-auto max-h-96">
    <div class="space-y-1 sm:col-span-2">
        <label for="rpt_pin" class="text-sm">PIN :</label>
        <x-input wire:model.lazy="rpt_pin" id="rpt_pin" type="text" placeholder="Enter PIN ex. 012-34-567-89-123"/>
        @error('rpt_pin')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="rpt_kind" class="text-sm">Kind :</label>
        <x-input wire:model.lazy="rpt_kind" id="rpt_kind" type="text" placeholder="Enter year ex. 2023"/>
        @error('rpt_kind')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="rpt_class" class="text-sm">Class :</label>
        <x-input wire:model.lazy="rpt_class" id="rpt_class" type="text" placeholder="Enter classname ex. 1,000.00"/>
        @error('rpt_class')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="rpt_td_no" class="text-sm">TD/ARP No. :</label>
        <x-input wire:model.lazy="rpt_td_no" id="rpt_td_no" type="text" placeholder="Enter TD/ARP ex. 01234-56789"/>
        @error('rpt_td_no')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="ro_name" class="text-sm">Owner's Name :</label>
        <x-form.text-area wire:model.lazy="ro_name" id="ro_name" rows="4"></x-form.text-area>
        @error('ro_name')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="ro_address" class="text-sm">Address :</label>
        <x-form.text-area wire:model.lazy="ro_address" id="ro_address" rows="4"></x-form.text-area>
        @error('ro_address')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="lp_lot_blk_no" class="text-sm">Lot/Blk No. :</label>
        <x-input wire:model.lazy="lp_lot_blk_no" id="lp_lot_blk_no" type="text" placeholder="Enter lot/block #"/>
        @error('lp_lot_blk_no')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="lp_street" class="text-sm">Streer Name :</label>
        <x-input wire:model.lazy="lp_street" id="lp_street" type="text" placeholder="Enter Street name"/>
        @error('lp_street')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="lp_brgy" class="text-sm">Barangay :</label>
        <x-input wire:model.lazy="lp_brgy" id="lp_brgy" type="text" placeholder="Select barangay"/>
        @error('lp_brgy')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="lp_municity" class="text-sm">Municipal/City :</label>
        <x-input wire:model.lazy="lp_municity" id="lp_municity" type="text" placeholder="Enter value"/>
        @error('lp_municity')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="lp_province" class="text-sm">Province :</label>
        <x-input wire:model.lazy="lp_province" id="lp_province" type="text" placeholder="Enter Province"/>
        @error('lp_province')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="rtdp_payment_date" class="text-sm">Payment Date :</label>
        <x-input wire:model.lazy="rtdp_payment_date" id="rtdp_payment_date" type="date"/>
        @error('rtdp_payment_date')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="rtdp_or_no" class="text-sm">O.R. No. :</label>
        <x-input wire:model.lazy="rtdp_or_no" id="rtdp_or_no" type="text" placeholder="Enter number"/>
        @error('rtdp_or_no')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="rtdp_payment_covered_fr" class="text-sm">Year From :</label>
        <x-input wire:model.lazy="rtdp_payment_covered_fr" id="rtdp_payment_covered_fr" type="text" placeholder="Enter year"/>
        @error('rtdp_payment_covered_fr')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="rtdp_payment_quarter_fr" class="text-sm">Quarter From :</label>
        <x-input wire:model.lazy="rtdp_payment_quarter_fr" id="rtdp_payment_quarter_fr" type="text" placeholder="Enter Quarter"/>
        @error('rtdp_payment_quarter_fr')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="rtdp_payment_covered_to" class="text-sm">Year To :</label>
        <x-input wire:model.lazy="rtdp_payment_covered_to" id="rtdp_payment_covered_to" type="text" placeholder="Enter rtdp_payment_covered_to"/>
        @error('rtdp_payment_covered_to')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="rtdp_payment_quarter_to" class="text-sm">Quarter To :</label>
        <x-input wire:model.lazy="rtdp_payment_quarter_to" id="rtdp_payment_quarter_to" type="text" placeholder="Enter rtdp_payment_quarter_to"/>
        @error('rtdp_payment_quarter_to')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="rtdp_directory" class="text-sm">Directory :</label>
        <x-input wire:model.lazy="rtdp_directory" id="rtdp_directory" type="text" placeholder="Enter rtdp_directory"/>
        @error('rtdp_directory')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="rtdp_remarks" class="text-sm">Remarks :</label>
        <x-input wire:model.lazy="rtdp_remarks" id="rtdp_remarks" type="text" placeholder="Enter rtdp_remarks"/>
        @error('rtdp_remarks')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="rtdp_payment_start" class="text-sm">Payment Start :</label>
        <x-input wire:model.lazy="rtdp_payment_start" id="rtdp_payment_start" type="text" placeholder="Enter rtdp_payment_start"/>
        @error('rtdp_payment_start')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
</div>
