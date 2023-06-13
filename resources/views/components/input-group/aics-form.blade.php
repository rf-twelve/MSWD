<div class="mb-4 space-y-3 overflow-y-auto max-h-96">
    <div class="space-y-1 sm:col-span-2">
        <label for="date" class="text-sm">Date :</label>
        <x-input wire:model.lazy="date" id="date" type="date"/>
        @error('date')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="claimant_id" class="text-sm">Claimant :</label>
        <x-select wire:model.lazy="claimant_id" id="claimant_id" class="w-full border">
            <option value="">-Select Client-</option>
            @foreach ($clients as $key => $value)
                <option value="{{ $value['id'] }}">{{ $value['first_name'].' '.$value['last_name']}}</option>
            @endforeach
        </x-select>
        @error('claimant_id')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>

    <div class="space-y-1 sm:col-span-2">
        <label for="beneficiary_id" class="text-sm">Beneficiary :</label>
        <x-select wire:model.lazy="beneficiary_id" id="beneficiary_id" class="w-full border">
            <option value="">-Select Client-</option>
            @foreach ($clients as $key => $value)
                <option value="{{ $value['id'] }}">{{ $value['first_name'].' '.$value['last_name']}}</option>
            @endforeach
        </x-select>
        @error('beneficiary_id')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>

    <div class="space-y-1 sm:col-span-2">
        <label for="relation" class="text-sm">Relationship :</label>
        <x-select wire:model.lazy="relation" id="relation" class="w-full border">
            <option value="">-Choose Relationship-</option>
            @foreach (App\Models\Assistance::RelationType as $key => $value)
                <option value="{{$value}}">{{ $value }}</option>
            @endforeach
        </x-select>
        @error('relation')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>

    <div class="space-y-1 sm:col-span-2">
        <label for="assistance_type" class="text-sm">Assistance :</label>
        <x-select wire:model.lazy="assistance_type" id="assistance_type" class="w-full border">
            <option value="">-Select value-</option>
            @foreach (App\Models\Assistance::AssistanceType as $key => $value)
                <option value="{{$value}}">{{ $value }}</option>
            @endforeach
        </x-select>
        @error('assistance_type')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>

    {{-- <div class="space-y-1 sm:col-span-2">
        <label for="assistance_class" class="text-sm">Classification :</label>
        <x-select wire:model.lazy="assistance_class" id="assistance_class" class="w-full border">
            <option value="">-Select value-</option>
            @foreach (App\Models\Assistance::AssistanceClass as $key => $value)
                <option value="{{$value}}">{{ $value }}</option>
            @endforeach
        </x-select>
        @error('assistance_class')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div> --}}
    <div class="space-y-1 sm:col-span-2">
        <label for="amount" class="text-sm">Amount :</label>
        <x-input wire:model.lazy="amount" id="amount" type="text" placeholder="Enter value ex. 123"/>
        @error('amount')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="amount_type" class="text-sm">Ammount Type :</label>
        <x-select wire:model.lazy="amount_type" id="amount_type" class="w-full border">
            <option value="">-Select value-</option>
            @foreach (App\Models\Assistance::AmountType as $key => $value)
                <option value="{{$value}}">{{ $value }}</option>
            @endforeach
        </x-select>
        @error('amount_type')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="worker_id" class="text-sm">Worker :</label>
        <x-select wire:model.lazy="worker_id" id="worker_id" class="w-full border">
            <option value="">-Select Worker-</option>
            @foreach (App\Models\User::get() as $key => $value)
                <option value="{{ $value['id'] }}">{{ $value['fullname']}}</option>
            @endforeach
        </x-select>
        @error('worker_id')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="remarks" class="text-sm">Remarks :</label>
        <x-form.text-area wire:model.lazy="remarks" id="remarks" rows="4"></x-form.text-area>
        @error('remarks')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>

</div>
