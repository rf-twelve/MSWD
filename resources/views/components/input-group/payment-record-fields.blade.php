<div class="mb-4 space-y-3 overflow-y-auto max-h-96">
    <div class="space-y-1 sm:col-span-2">
        <label for="pay_date" class="text-sm">Date :</label>
        <x-input wire:model.lazy="pay_date" id="pay_date" type="date" placeholder="Select Date"/>
        @error('pay_date')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="pay_serial_no" class="text-sm">O.R./Serial No. :</label>
        <x-input wire:model.lazy="pay_serial_no" id="pay_serial_no" type="text" placeholder="Enter O.R./Serial No."/>
        @error('pay_serial_no')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="pay_teller" class="text-sm">Teller :</label>
        <x-input wire:model.lazy="pay_teller" id="pay_teller" type="text" placeholder="Enter Teller Name"/>
        @error('pay_teller')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="pay_payee" class="text-sm">Payee :</label>
        <x-input wire:model.lazy="pay_payee" id="pay_payee" type="text" placeholder="Enter Payee name"/>
        @error('pay_payee')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="pay_fund" class="text-sm">Fund :</label>
        <x-input wire:model.lazy="pay_fund" id="pay_fund" type="text" placeholder="Select Fund type"/>
        @error('pay_fund')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="pay_type" class="text-sm">Payment Type :</label>
        <x-input wire:model.lazy="pay_type" id="pay_type" type="text" placeholder="Enter Payment type"/>
        @error('pay_type')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="pay_year_from" class="text-sm">Year From :</label>
        <x-input wire:model.lazy="pay_year_from" id="pay_year_from" type="text" placeholder="Enter year from"/>
        @error('pay_year_from')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="pay_quarter_from" class="text-sm">Quarter From :</label>
        <x-input wire:model.lazy="pay_quarter_from" id="pay_quarter_from" type="text" placeholder="Enter quarter from"/>
        @error('pay_quarter_from')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="pay_year_to" class="text-sm">Year To :</label>
        <x-input wire:model.lazy="pay_year_to" id="pay_year_to" type="text" placeholder="Enter year to"/>
        @error('pay_year_to')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="pay_quarter_to" class="text-sm">Quarter To :</label>
        <x-input wire:model.lazy="pay_quarter_to" id="pay_quarter_to" type="text" placeholder="Enter quarter to"/>
        @error('pay_quarter_to')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="pay_covered_year" class="text-sm">Year Covered:</label>
        <x-input wire:model.lazy="pay_covered_year" id="pay_covered_year" type="text" placeholder="Ex. 1990 Q1 - 2023 Q4"/>
        @error('pay_covered_year')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="pay_basic" class="text-sm">Basic :</label>
        <x-input wire:model.lazy="pay_basic" id="pay_basic" type="text" placeholder="Ex. 1,234.56"/>
        @error('pay_basic')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="pay_sef" class="text-sm">Sef :</label>
        <x-input wire:model.lazy="pay_sef" id="pay_sef" type="text" placeholder="Ex. 1,234.56"/>
        @error('pay_sef')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="pay_penalty" class="text-sm">Penalty :</label>
        <x-input wire:model.lazy="pay_penalty" id="pay_penalty" type="text" placeholder="Ex. 1,234.56"/>
        @error('pay_penalty')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="pay_amount_due" class="text-sm">Amount Due :</label>
        <x-input wire:model.lazy="pay_amount_due" id="pay_amount_due" type="text" placeholder="Ex. 1,234.56"/>
        @error('pay_amount_due')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="pay_cash" class="text-sm">Paid Cash :</label>
        <x-input wire:model.lazy="pay_cash" id="pay_cash" type="text" placeholder="Ex. 1,234.56"/>
        @error('pay_cash')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="pay_change" class="text-sm">Change :</label>
        <x-input wire:model.lazy="pay_change" id="pay_change" type="text" placeholder="Ex. 1,234.56"/>
        @error('pay_change')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="pay_directory" class="text-sm">Directory :</label>
        <x-form.text-area wire:model.lazy="pay_directory" id="pay_directory" rows="4"></x-form.text-area>
        @error('pay_directory')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="pay_remarks" class="text-sm">Remarks :</label>
        <x-form.text-area wire:model.lazy="pay_remarks" id="pay_remarks" rows="4"></x-form.text-area>
        @error('pay_remarks')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
</div>
