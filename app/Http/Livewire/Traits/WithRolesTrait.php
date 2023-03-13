<?php

namespace App\Http\Livewire\Traits;

use App\Models\User;
use Spatie\Permission\Models\Role;

trait WithRolesTrait
{
    public function clearRoleVariables(){
        $this->role_id = '';
        $this->role_name = '';
    }
    ## ASSIGN USER ROLE
    public function assignUserRole($role)
    {
        $this->assign_user_role_id = $role['id'];
        $this->assign_user_role_name = $role['name'];
        $this->assign_role_confirmation = true;
    }
    ## ASSIGN USER ROLE
    public function saveUserRole()
    {
        $user = User::find($this->selected_user->id);
        $user->removeRole($this->user_role);
        $user->assignRole($this->assign_user_role_id);
        $this->assign_role_confirmation = false;
        $this->notify('New role assigned successfully!');
    }
    ## CREATE ROLE MODAL
    public function createRoleModal()
    {
        $this->clearRoleVariables();
        $this->addRoleModal = true;
    }
    ## EDIT ROLE MODAL
    public function editRoleModal($role)
    {
        $this->role_id = $role['id'];
        $this->role_name = $role['name'];
        $this->addRoleModal = true;
    }
    ## CLOSE ROLE MODAL
    public function closeRoleModal()
    {
        $this->clearRoleVariables();
        $this->addRoleModal = false;
    }
    ## SAVE ROLE MODAL
    public function saveRoleModal()
    {
        // dd($this->role_id);
        $this->validate([
            'role_name' => 'required'
        ]);

        if (!empty($this->role_id)) {
            Role::find($this->role_id)->update(['name' => $this->role_name]);
            $this->notify('New Role has been updated successfully!');
        }else{
            Role::create(['name' => $this->role_name]);
            $this->notify('New Role has been added successfully!');
        }
        $this->addRoleModal = false;
        $this->clearRoleVariables();


    }

}
