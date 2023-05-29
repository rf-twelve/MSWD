<div class="mb-4 space-y-3 overflow-y-auto max-h-96">
    <div class="space-y-1 sm:col-span-2">
        <label for="name" class="text-sm">COMPLETE NAME :</label>
        <x-input wire:model.lazy="name" id="name" type="text"/>
        @error('name')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="address" class="text-sm">ADDRESS :</label>
        <x-form.text-area wire:model.lazy="address" id="address" rows="3"></x-form.text-area>
        @error('address')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="birthday" class="text-sm">BIRTHDATE :</label>
        <x-input wire:model.lazy="birthday" id="birthday" type="date"/>
        @error('birthday')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="age" class="text-sm">AGE :</label>
        <x-input wire:model.lazy="age" id="age" type="number"/>
        @error('age')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="problem_presented" class="text-sm">PROBLEM PRESENTED :</label>
        <x-form.text-area wire:model.lazy="problem_presented" id="problem_presented" rows="3"></x-form.text-area>
        @error('problem_presented')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    <div class="space-y-1 sm:col-span-2">
        <label for="intervention" class="text-sm">INTERVENTION :</label>
        <x-form.text-area wire:model.lazy="intervention" id="intervention" rows="3"></x-form.text-area>
        @error('intervention')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
    </div>
    {{-- @if ($file_images)
    @foreach ($file_images as $image)
    <div class="relative">
        <img src="{{ asset($image->name) }}" alt="Photo">
        <button wire:click.prevent="removeImage({{ $image->id }})"
            class="absolute top-0 px-2 py-1 text-sm italic text-white bg-red-500 rounded font-extralight hover:bg-blue-600">
            <x-icon.trash class="w-4 h-4" /> Remove?
        </button>
    </div>
    @endforeach
    @endif --}}

    @if ($temp_image)
    <img src="{{ $temp_image->temporaryUrl() }}" alt="Photo">
    @endif

    <div class="space-y-1 sm:col-span-2">
        <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Attach files(Optional) : </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="flex justify-center max-w-lg px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
            <div class="space-y-1 text-center">
                <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex text-sm text-gray-600">
                <label for="file-upload" class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    <span>Attach file(Optional) :</span>
                    <input id="file-upload" type="file" class="sr-only" multiple>
                </label>
                <p class="pl-1">or drag and drop</p>
                </div>
                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
            </div>
            </div>
        </div>
    </div>

</div>
