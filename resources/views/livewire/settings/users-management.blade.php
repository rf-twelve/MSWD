<div x-data="{openSidebarMobile:false}">
    <div class="min-h-screen bg-gray-100 ">
        <!-- MOBILE SIDEBAR -->
        <x-sidebar-mobile />

        <!-- DESKTOP SIDEBAR -->
        <x-sidebar-desktop />

        <!-- Main column -->
        <div class="flex flex-col lg:pl-64">

            <main class="flex-1">

                <!-- Topbar Desktop -->
                <x-topbar-desktop>
                    <li class="flex">
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44"
                                preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true">
                                <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                            </svg>
                            <a href="#" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                                USER MANAGEMENT
                            </a>
                        </div>
                    </li>
                </x-topbar-desktop>

                <div class="relative z-0 overflow-y-auto bg-white sm:flex">

                    <aside class="flex-shrink-0 order-first border-r border-gray-200 xl:flex xl:flex-col w-96">
                        <div class="sticky top-0 z-10 px-6 py-1 text-sm font-medium text-gray-500 bg-purple-200 border border-gray-200">
                            <h3>LIST OF USERS</h3>
                        </div>
                        <div class="px-2 bg-purple-600 border-b">
                            <div class="flex-1 min-w-0 py-2">
                                <div class="relative rounded-md shadow-sm">
                                    <div class="flex">
                                        <div class="relative flex items-stretch flex-grow focus-within:z-10">
                                            <x-form.input-text wire:model='search' type="search"
                                                placeholder="Search users..."
                                                class="pl-2 border rounded-none rounded-l-md" />
                                        </div>
                                        <x-form.button
                                            class="relative inline-flex items-center -ml-px space-x-2 border-gray-300 rounded-none rounded-r-md bg-gray-50 hover:bg-gray-100">
                                            <x-icon.search class="w-6 h-6" /><span></span>
                                        </x-form.button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Directory list -->
                        <nav class="flex-1 min-h-0 overflow-y-auto" aria-label="Directory">
                            <div class="relative">
                                <ul role="list" class="relative z-0 divide-y divide-gray-200">
                                    @forelse ($users as $list)
                                    <li wire:click.defer="userSelect({{ $list->id }})">
                                        <div
                                            class="relative flex items-center px-6 py-2 space-x-3 border-b hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-purple-500">
                                            <div class="flex-shrink-0">
                                                <img class="w-10 h-10 rounded-full"
                                                    src="{{ asset('img\users\avatar.png') }}" alt="">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <a href="#" class="focus:outline-none">
                                                    <!-- Extend touch target to entire panel -->
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    <p class="text-sm font-medium text-gray-900">{{ $list->fullname }}
                                                    </p>
                                                    <p class="text-sm text-gray-500 truncate">{{ $list->username }}</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @empty
                                    <li class="pt-2 text-center">Record not found!</li>
                                    @endforelse

                                </ul>
                            </div>

                        </nav>
                    </aside>

                    <div class="relative z-0 flex-1 overflow-y-auto focus:outline-none xl:order-last">
                        <div class="sticky top-0 z-10 px-6 py-1 text-sm font-medium text-gray-500 bg-purple-200 border border-gray-200">
                            <h3>USER INFORMATION</h3>
                        </div>
                        @if (isset($user_selected))
                        <article>
                            <!-- Profile header -->
                            <div>

                                <div>
                                    <img class="object-cover w-full h-32 lg:h-48"
                                        src="{{ asset('img\users\users-mgt.jpg') }}" alt="user managment background">
                                </div>
                                <div class="max-w-5xl px-4 mx-auto sm:px-6 lg:px-8">
                                    <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                                        <div class="flex">
                                            <img class="w-24 h-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32"
                                                src="{{ asset('img\users\avatar.png') }}" alt="user profile">
                                        </div>
                                        <div
                                            class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                                            <div class="flex-1 min-w-0 mt-6 2xl:block">
                                                <h1 class="text-2xl font-bold text-gray-900 truncate">{{
                                                    $user_selected->fullname }}</h1>
                                            </div>
                                            <div
                                                class="flex flex-col mt-6 space-y-3 justify-stretch sm:flex-row sm:space-y-0 sm:space-x-4">
                                                <button type="button"
                                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                                                    <x-icon.edit class="w-4 h-4" />
                                                    <span>Modify</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- USER DETAILS -->
                            <div class="mx-2 my-2 border-gray-200 border-y">
                                <ul role="list" class="divide-y divide-gray-200">
                                    <li class="py-1">
                                        <div class="flex space-x-3">
                                            <h3 class="w-24 text-xs italic font-medium uppercase">fullname :</h3>
                                            <p class="text-lg text-gray-700 uppercase">{{ $user_selected['fullname'] ?? '(Empty)' }}</p>
                                        </div>
                                    </li>
                                    <li class="py-1">
                                        <div class="flex space-x-3">
                                            <h3 class="w-24 text-xs italic font-medium uppercase">username :</h3>
                                            <p class="text-lg text-gray-700">{{ $user_selected['username'] ?? '(Empty)' }}</p>
                                        </div>
                                    </li>
                                    <li class="py-1">
                                        <div class="flex space-x-3">
                                            <h3 class="w-24 text-xs italic font-medium uppercase">email :</h3>
                                            <p class="text-lg text-gray-700 uppercase">{{ $user_selected['email'] ?? '(Empty)' }}</p>
                                        </div>
                                    </li>
                                    <li class="py-1">
                                        <div class="flex space-x-3">
                                            <h3 class="w-24 text-xs italic font-medium uppercase">is active :</h3>
                                            @if ($user_selected['is_active'] == 1)
                                                <span class="inline-flex items-center px-3 text-lg text-gray-800 bg-green-200 rounded-full"> Active </span>
                                            @else
                                                <span class="inline-flex items-center px-3 text-lg text-gray-800 bg-gray-200 rounded-full"> Inactive </span>
                                            @endif

                                        </div>
                                    </li>
                                    <li class="py-1">
                                        <h3 class="text-xs italic font-medium uppercase bg-purple-200">ROLES & PERMISSION</h3>
                                    </li>

                                    {{-- ROLES --}}
                                    <li class="py-1">
                                        <div class="flex space-x-3">
                                            <h3 class="w-24 text-xs italic font-medium uppercase">User Role :</h3>
                                             {{-- ROLES TABLE --}}

                                            <div x-data="{open:false}">
                                                <div class="relative">
                                                    <input id="combobox" type="text" class="w-full py-2 pl-3 pr-12 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" role="combobox" aria-controls="options" aria-expanded="false">
                                                    <button x-on:click="open =! open" type="button" class="absolute inset-y-0 right-0 flex items-center px-2 rounded-r-md focus:outline-none">
                                                    <!-- Heroicon name: solid/selector -->
                                                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                    </button>

                                                    <ul x-show="open" class="absolute z-10 w-full py-1 mt-1 overflow-auto text-base bg-white rounded-md shadow-lg max-h-60 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" id="options" role="listbox">
                                                    <!--Combobox option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.
                                                        Active: "text-white bg-indigo-600", Not Active: "text-gray-900"-->
                                                    @forelse ($roles as $role)
                                                        <li class="relative py-2 pl-8 pr-4 text-gray-900 cursor-default select-none hover:bg-indigo-500 hover:text-white" id="option-0" role="option" tabindex="-1">
                                                            <!-- Selected: "font-semibold" -->
                                                            <span class="block uppercase truncate">{{ $role['name'] }}</span>
                                                            <!-- Checkmark, only display for selected option.
                                                            Active: "text-white", Not Active: "text-indigo-600"-->
                                                            <span class="absolute inset-y-0 left-0 flex items-center pl-1.5 text-indigo-600">
                                                                <x-icon.circle-check class="w-5 h-5"/>
                                                            </span>
                                                        </li>
                                                    @empty

                                                    @endforelse


                                                    </ul>
                                                </div>
                                            </div>

{{--
                                            <div class="w-full space-y-1">
                                                @forelse ($roles as $value => $label)
                                                <div class="flex items-center h-5">
                                                    <input wire:click="assignUserRole({{ $label }})" {{ $label->name == $user_role ? 'checked' : '' }} name="role" id="index{{ $value }}"
                                                        type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                                    <label for="index{{ $value }}" class="ml-3 font-medium text-gray-700 uppercase text-md">
                                                        {{ $label->name}}
                                                    </label>
                                                    <a href="#" wire:click.defer="editRoleModal({{ $label }})">
                                                        <x-icon.edit class="w-4 ml-2" />
                                                    </a>

                                                </div>
                                                @empty
                                                @endforelse
                                                <x-button wire:click="createRoleModal" type="button"
                                                    class="px-1 py-1 hover:bg-purple-500 hover:text-white">
                                                    + Add Role
                                                </x-button>
                                            </div> --}}
                                        </div>
                                    </li>
                                    {{-- PERMISSION --}}
                                    <li class="py-1">
                                        <div class="flex space-x-3">
                                            <h3 class="w-24 text-xs italic font-medium uppercase">user permission :</h3>
                                            {{-- PERMISION TABLE --}}
                                            <div class="w-full space-y-1">
                                                <table class="min-w-full divide-y divide-gray-300 table-fixed">
                                                    <thead class="bg-gray-50">
                                                        <tr class="py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                                            <th scope="col">NAME</th>
                                                            <th scope="col">ACCESS</th>
                                                            <th scope="col">CREATE</th>
                                                            <th scope="col">READ</th>
                                                            <th scope="col">UPDATE</th>
                                                            <th scope="col">DELETE</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-200">
                                                        @forelse ($permission_list as $value => $permission)
                                                        <tr>
                                                            <td>{{ strtoupper($value) }}</td>
                                                            @foreach (App\Models\User::ACTIONS as $action)
                                                            <td>
                                                                <a href="#"
                                                                    wire:click="togglePermissionForUser('{{ $value.'-'.$action }}')">
                                                                    @if ($user_permission->contains($value.'-'.$action))
                                                                    <x-icon.circle-check class="w-6 h-6 text-blue-500" />
                                                                    @else
                                                                    <x-icon.circle-times class="w-6 h-6 text-red-500" />
                                                                    @endif
                                                                </a>
                                                            </td>
                                                            @endforeach
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td colspan="5" class="text-center">No Permission Found!</td>
                                                        </tr>
                                                        @endforelse


                                                        <!-- More people... -->
                                                    </tbody>
                                                </table>
                                                <x-button wire:click="assignPermissionModal()" type="button"
                                                    class="px-1 py-1 hover:bg-purple-500 hover:text-white">
                                                    Set User Permission
                                                </x-button>
                                                <x-button wire:click="createPermissionModal()" type="button"
                                                    class="px-1 py-1 hover:bg-purple-500 hover:text-white">
                                                    + Add Permission
                                                </x-button>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                        </article>
                        @else
                        {{-- USER NOT SELECTED --}}
                        <div class="p-4 rounded-md bg-red-50">
                            <div class="flex p-4 bg-gray-300 rounded">
                                <div class="flex-shrink-0">
                                    <!-- Heroicon name: solid/exclamation -->
                                    <svg class="text-yellow-800 w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-lg font-medium text-yellow-800">
                                        NO USER SELECTED!
                                    </h3>
                                    <div class="mt-2 text-yellow-700 text-md">
                                        <p>Please select user from a list.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endif

                    </div>


                    {{-- ADD ROLES MODAL --}}
                    <x-modal.dialog wire:model="addRoleModal" maxWidth="sm">
                        <x-slot name="title">
                            ROLE
                        </x-slot>

                        <x-slot name="content">
                            <div class="col-span-6 sm:col-span-4">
                                <label for="role_name" class="text-sm">Role Name :</label>
                                <x-input wire:model.lazy="role_name" id="role_name" type="text" autocomplete="off"
                                    placeholder="Enter Name" />
                                @error('role_name')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                            </div>
                        </x-slot>

                        <x-slot name="footer">
                            <x-button wire:click="closeRoleModal()" type="button"
                                class="text-white bg-gray-400 hover:bg-gray-500">
                                {{ __('Cancel') }}
                            </x-button>
                            <x-button wire:click="saveRoleModal()" type="button"
                                class="hover:bg-blue-500 hover:text-white">
                                {{ __('Save') }}
                            </x-button>
                        </x-slot>
                    </x-modal.dialog>

                    {{-- ADD PERMISSION MODAL --}}
                    <x-modal.dialog wire:model="permission_modal">
                        <x-slot name="title">
                            PERMISSION
                        </x-slot>

                        <x-slot name="content">
                            <div class="col-span-6 sm:col-span-4">
                                <label for="permission_name" class="text-sm">Permission Name :</label>
                                <x-input wire:model.debounce.500="permission_name" id="permission_name" type="text"
                                    autocomplete="off" placeholder="Enter Name" />
                                @error('permission_name')<x-comment class="text-red-500">*{{ $message }}</x-comment>
                                @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-4">

                                @if ($permission_name != null || $permission_name != "")
                                <ul role="list" class="divide-y divide-gray-200">
                                    <li
                                        class="relative px-4 py-5 bg-white hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                        <div class="flex justify-between space-x-3">
                                            <div class="flex-1 min-w-0">
                                                <span href="#" class="block focus:outline-none">
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    <p class="text-sm font-medium text-gray-900 truncate">Note: List of
                                                        permissions will be created.</p>
                                                    <p class="text-sm text-gray-500 truncate">{{
                                                        $permission_name."-access" }} -
                                                        <i>Permission to access.</i>
                                                    </p>
                                                    <p class="text-sm text-gray-500 truncate">{{
                                                        $permission_name."-create" }} -
                                                        <i>Permission to create.</i>
                                                    </p>
                                                    <p class="text-sm text-gray-500 truncate">{{
                                                        $permission_name."-read" }} -
                                                        <i>Permission to read.</i>
                                                    </p>
                                                    <p class="text-sm text-gray-500 truncate">{{
                                                        $permission_name."-update" }} -
                                                        <i>Permission to update.</i>
                                                    </p>
                                                    <p class="text-sm text-gray-500 truncate">{{
                                                        $permission_name."-delete" }} -
                                                        <i>Permission to delete.</i>
                                                    </p>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                @endif


                            </div>
                        </x-slot>

                        <x-slot name="footer">
                            <x-button wire:click="closePermissionModal()" type="button"
                                class="text-white bg-gray-400 hover:bg-gray-500">
                                {{ __('Cancel') }}
                            </x-button>
                            <x-button wire:click="savePermissionModal()" type="button"
                                class="hover:bg-blue-500 hover:text-white">
                                {{ __('Save') }}
                            </x-button>
                        </x-slot>
                    </x-modal.dialog>

                    <!-- ASSIGN USER ROLE CONFIRMATION -->
                    <div>
                        <form wire:submit.prevent="saveUserRole">
                            <x-modal.confirmation wire:model.defer="assign_role_confirmation" selectedIcon="confirm">
                                <x-slot name="title">Role Confirmation</x-slot>

                                <x-slot name="content">
                                    <div class="py-8 text-gray-700">Assign this role "{{ $assign_user_role_name }}"?.
                                    </div>
                                </x-slot>

                                <x-slot name="footer">
                                    <x-button type="button"
                                        wire:click.prevent="$set('assign_role_confirmation', false)">Cancel</x-button>

                                    <x-button type="submit">Yes</x-button>
                                </x-slot>
                            </x-modal.confirmation>
                        </form>
                    </div>

                    <!-- ASSIGN USER PERMISSION CONFIRMATION -->
                    <div>
                        <form wire:submit.prevent="saveUserPermission">
                            <x-modal.confirmation wire:model.defer="assign_permission_confirmation"
                                selectedIcon="confirm">
                                <x-slot name="title">Permission Confirmation</x-slot>

                                <x-slot name="content">
                                    <div class="py-8 text-gray-700">Assign or remove if exist this permission "{{
                                        $assign_user_permission_name }}" permission?</div>
                                </x-slot>

                                <x-slot name="footer">
                                    <x-button type="button"
                                        wire:click.prevent="$set('assign_permission_confirmation', false)">Cancel
                                    </x-button>

                                    <x-button type="submit">Yes</x-button>
                                </x-slot>
                            </x-modal.confirmation>
                        </form>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
</div>
