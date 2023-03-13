<?php

namespace App\Http\Livewire\Settings;

use App\Http\Livewire\Traits\WithPermissionsTrait;
use App\Http\Livewire\Traits\WithRolesTrait;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersManagement extends Component
{
    use WithRolesTrait, WithPermissionsTrait;

    public $selected_user;
    public $all_users;
    public $user_role;
    public $user_permission;
    public $search;
    public $addRoleModal, $addPermissionModal;
    public $assign_role_confirmation, $assign_permission_confirmation;
    public $role_id;
    public $role_name;
    public $assign_user_role_id, $assign_user_role_name;
    public $permission_id;
    public $permission_name;
    public $action_array = ['create','read','update','delete'];

    public function render()
    {
        // dd(Role::get());
        return view('livewire.settings.users-management',[
            'role_list' => Role::get(),
            'permission_list' => Permission::get()->groupBy('group'),
            'user_list' => $this->all_users,
        ]);
    }

    public function mount(){
        $this->all_users =  User::get();
        $this->addRoleModal = false;
        $this->addPermissionModal = false;
        $this->assign_role_confirmation = false;
        $this->assign_permission_confirmation = false;
        $this->selectedUser(($this->all_users->first())['id']);
    }

    public function updatedSearch(){
        $this->all_users = User::where('fullname','LIKE','%'.$this->search.'%')->get();
    }

    public function selectedUser($id){
        $this->selected_user = User::find($id);

        $get_role = '';
        $get_permissions = [];
        try {
            $get_role = $this->selected_user->getRoleNames()->first();
            $get_permissions = $this->selected_user->getPermissionNames();
        } catch (\Throwable $th) {
            dump($th);
        }
        $this->user_role = $get_role;
        $this->user_permission = $get_permissions;
        // dd($get_permissions);
        // $this->selected_user = [
        //     'id' => $user['id'],
        //     'fullname' => $user['fullname'],
        //     'username' => $user['username'],
        //     'email' => $user['email'],
        //     'avatar' => $user['avatar'],
        //     'role' => $get_roles,
        //     'permission' => $get_permissions,
        // ];
    }

}
