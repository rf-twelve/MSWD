<div x-data="{openSidebarMobile:false}">
    <div class="min-h-screen bg-gray-100 ">
        <x-sidebar-mobile />

        {{-- ##################### --}}
        <!-- Static sidebar for desktop -->
        <x-sidebar-desktop />

        <!-- Main column -->
        <div class="flex flex-col lg:pl-64">

            <!-- Topbar Mobile -->
            {{-- <x-topbar-mobile /> --}}

            <main class="flex-1">

                <!-- Topbar Desktop -->
                <x-topbar-desktop>
                    <li class="flex">
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"aria-hidden="true">
                                <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                            </svg>
                            <a href="#" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                                COMPANY PROFILE
                            </a>
                        </div>
                    </li>
                </x-topbar-desktop>


<div class="relative z-0 overflow-hidden bg-white sm:flex">
    <div class="relative z-0 flex-1 overflow-y-auto focus:outline-none xl:order-last">

        <article>
        <!-- Profile header -->
        <div>
            {{-- Company Background Image --}}
            <div>
            <img class="object-cover w-full h-32 lg:h-48" src="{{ asset('img\users\users-mgt.jpg') }}" alt="company background">
            </div>
            <div class="max-w-5xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                {{-- Company Logo --}}
                <div class="flex">
                <img class="w-24 h-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32" src="{{ asset('img\users\avatar.png') }}" alt="user profile">
                </div>
                <div class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                <div class="flex-1 min-w-0 mt-6 2xl:block">
                    <h1 class="text-2xl font-bold text-gray-900 truncate">{{ $selected_user->fullname }}</h1>
                </div>
                <div class="flex flex-col mt-6 space-y-3 justify-stretch sm:flex-row sm:space-y-0 sm:space-x-4">
                    <button type="button" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                    <x-icon.edit class="w-4 h-4" />
                    <span>Modify</span>
                    </button>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Description list -->
        <div class="mx-3 mt-10 mb-10">
            <form wire:submit.prevent="save" enctype="multipart/form-data" class="grid grid-cols-1 font-medium gap-y-6 sm:grid-cols-2 sm:gap-x-8">
              {{-- <div class="space-y-1 sm:col-span-2">
                  <label for="class" class="text-sm">Classification :</label><br>
                  <x-select wire:model.lazy="editing.class" id="class" class="w-full border">
                      <option value="">-Select document type-</option>
                      @foreach (App\Models\Doc::CLASS_OF_DOC as $value => $label)
                          <option value="{{ $value }}">{{ $label }}</option>
                      @endforeach
                  </x-select>
                  @error('editing.class')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
              </div> --}}
              <div class="space-y-1 sm:col-span-2">
                  <label for="fullname" class="text-sm">FULLNAME :</label>
                  <x-input value="{{$selected_user->fullname}}" id="fullname" type="text" />
              </div>

              <div class="space-y-1 sm:col-span-2">
                  <label for="username" class="text-sm">USERNAME :</label>
                  <x-input value="{{$selected_user->username}}" id="username" type="text" />
              </div>

              <div class="space-y-1 sm:col-span-2">
                  <label for="email" class="text-sm">EMAIL :</label>
                  <x-input value="{{$selected_user->email}}" id="email" type="email" />
              </div>
              {{-- <div class="space-y-1 sm:col-span-2">
                  <label for="email" class="text-sm">EMAIL :</label>
                  <x-input wire:model.lazy="selected_user.email" id="email" type="email" />
                  @error('selected_user.email')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
              </div> --}}

              {{-- ROLES TABLE --}}
              <div class="space-y-1 sm:col-span-2">
                <label class="text-sm">ROLE :</label>
                @forelse ($role_list as $value => $label)
                <div class="flex items-center h-5">
                    <input wire:click="assignUserRole({{ $label }})" {{ $label->name == $user_role ? 'checked' : '' }} name="role" id="index{{ $value }}" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                    <label for="index{{ $value }}" class="ml-3 text-sm font-medium text-gray-700">
                        {{ $label->name}}
                    </label>
                    <a href="#" wire:click.defer="editRoleModal({{ $label }})">
                        <x-icon.edit class="w-4 ml-2" />
                    </a>

                </div>
                @empty
                @endforelse
                <x-button wire:click="createRoleModal" type="button" class="hover:bg-blue-500 hover:text-white">
                   + Add Role
                </x-button>
            </div>
              {{-- PERMISION TABLE --}}
              <div class="space-y-1 sm:col-span-2">
                <label class="text-sm">PERMISSION :</label>
                <table class="min-w-full divide-y divide-gray-300 table-fixed">
                    <thead class="bg-gray-50">
                    <tr class="py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                        <th scope="col">NAME</th>
                        <th scope="col">CREATE</th>
                        <th scope="col">READ</th>
                        <th scope="col">UPDATE</th>
                        <th scope="col">DELETE</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($permission_list as $value => $permission)
                    <tr>
                        <td>{{ $value }}</td>
                        @foreach ($action_array as $action)
                        <td>
                            <input {{ $user_permission->where('name',$value.'-'.$action)->first() ? 'checked' : '' }} type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        </td>
                        @endforeach
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center">No Permission Found!</td></tr>
                    @endforelse


                    <!-- More people... -->
                    </tbody>
                </table>
                <x-button wire:click="assignPermissionModal()" type="button" class="hover:bg-blue-500 hover:text-white">
                    Set User Permission
                </x-button>
                <x-button wire:click="createPermissionModal()" type="button" class="hover:bg-blue-500 hover:text-white">
                    + Add Permission
                </x-button>
              </div>
            </form>
        </div>

        </article>
    </div>

    {{-- ADD ROLES MODAL --}}
    <x-modal.dialog wire:model="addRoleModal" maxWidth="sm">
        <x-slot name="title">
            ROLE
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <label for="role_name" class="text-sm">Role Name :</label>
                <x-input wire:model.lazy="role_name" id="role_name" type="text" autocomplete="off" placeholder="Enter Name"/>
                @error('role_name')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-button wire:click="closeRoleModal()" type="button" class="text-white bg-gray-400 hover:bg-gray-500">
                {{ __('Cancel') }}
            </x-button>
            <x-button wire:click="saveRoleModal()" type="button" class="hover:bg-blue-500 hover:text-white">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-modal.dialog>

    {{-- ADD PERMISSION MODAL --}}
    <x-modal.dialog wire:model="addPermissionModal">
        <x-slot name="title">
            PERMISSION
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <label for="permission_name" class="text-sm">Permission Name :</label>
                <x-input wire:model.lazy="permission_name" id="permission_name" type="text" autocomplete="off" placeholder="Enter Name"/>
                @error('permission_name')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-button wire:click="closePermissionModal()" type="button" class="text-white bg-gray-400 hover:bg-gray-500">
                {{ __('Cancel') }}
            </x-button>
            <x-button wire:click="savePermissionModal()" type="button" class="hover:bg-blue-500 hover:text-white">
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
                    <div class="py-8 text-gray-700">Assign this role "{{ $assign_user_role_name }}"?.</div>
                </x-slot>

                <x-slot name="footer">
                    <x-button type="button" wire:click.prevent="$set('assign_role_confirmation', false)">Cancel</x-button>

                    <x-button type="submit">Yes</x-button>
                </x-slot>
            </x-modal.confirmation>
        </form>
    </div>

    <!-- ASSIGN USER PERMISSION CONFIRMATION -->
        <x-modal.dialog wire:model="assign_permission_confirmation">
            <x-slot name="title">
                Set User Permission
            </x-slot>

            <x-slot name="content">
                <form wire:submit.prevent="saveUserPermission()">
                    <table class="min-w-full divide-y divide-gray-300 table-fixed">
                        <thead class="bg-gray-50">
                        <tr class="py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                            <th scope="col">NAME</th>
                            <th scope="col">CREATE</th>
                            <th scope="col">READ</th>
                            <th scope="col">UPDATE</th>
                            <th scope="col">DELETE</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($permission_list as $key => $permission)
                        <tr>
                            <td>{{ $key }}</td>
                            @forelse ($permission as $index => $value)
                            <td>
                                {{-- {{ $user_permission }} --}}
                                @if ($edit_permission_key !== $key)
                                    <input {{ (in_array($value->name,$user_permission->toArray()) ? 'checked' : '') }} disabled
                                        type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded">
                                @else
                                    <input wire:model="user_permission_model.{{ $key }}.$value->name" value=""
                                       type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                @endif

                            </td>
                            @empty
                            @endforelse
                            <td>
                                @if ($edit_permission_key !== $key)
                                    <button wire:click.defer="userPermissionEdit({{ $key }})" class="text-red-500"
                                        type="button"><x-icon.edit class="w-4" /></button>
                                @else
                                    <button wire:click.defer="$set('user_permission_model_edit',false)" class="text-blue-500"
                                        type="button"><x-icon.circle-check class="w-4" /></button>
                                @endif

                            </td>
                        </tr>
                        <tr><td colspan="5"></td></tr>
                        @empty
                        <tr><td colspan="5" class="text-center">No Permission Found!</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                    <x-button type="submit" class="hover:bg-blue-500 hover:text-white">
                        {{ __('Save') }}
                    </x-button>
                </form>
            </x-slot>

            <x-slot name="footer">
                <x-button wire:click="closeAssignPermission()" type="button" class="text-white bg-gray-400 hover:bg-gray-500">
                    {{ __('Cancel') }}
                </x-button>
            </x-slot>
        </x-modal.dialog>
    </div>
</div>


            </main>
        </div>
    </div>
</div>
