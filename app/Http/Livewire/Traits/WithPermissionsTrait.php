<?php

namespace App\Http\Livewire\Traits;

use Spatie\Permission\Models\Permission;

trait WithPermissionsTrait
{
    public $user_permission_model;
    public $user_permission_model_edit = false;
    public $edit_permission_key;

    public function clearPermissionVariables(){
        $this->permission_id = '';
        $this->permission_name = '';
    }
    ## CREATE Permission MODAL
    public function createPermissionModal()
    {
//         $grouped = $collection->groupBy('account_id');
// $grouped->all();
        // dd(Permission::get()->groupBy('group'));
        $this->clearPermissionVariables();
        $this->addPermissionModal = true;
    }
    ## EDIT Permission MODAL
    public function editPermissionModal($permission)
    {
        $this->permission_id = $permission['id'];
        $this->permission_name = $permission['name'];
        $this->addPermissionModal = true;
    }
    ## CLOSE Permission MODAL
    public function closePermissionModal()
    {
        $this->clearPermissionVariables();
        $this->addPermissionModal = false;
    }
    ## SAVE Permission MODAL
    public function savePermissionModal()
    {
        $this->validate([
            'permission_name' => 'required'
        ]);

        if (isset($this->Permission_id)) {
            Permission::find()(['name' => $this->permission_name]);
            $this->notify('New Permission has been updated successfully!');
        }else{
            $count = 0;
            foreach ($this->action_array as $key => $value) {
                Permission::create([
                    'name' => $this->permission_name.'-'.$value,
                    'group' => $this->permission_name
                ]);
            };
            $this->notify('New Permission has been added successfully!');
        }
        $this->addPermissionModal = false;
        $this->clearPermissionVariables();

    }

    public function assignPermissionModal(){
        // $this->user_permission_model = $this->user_permission;
        $this->assign_permission_confirmation = true;
        $this->user_permission_model = $this->user_permission;
    }
    public function userPermissionEdit($key){
        dd($key);
        $this->edit_permission_key = $key;
    }
    public function saveUserPermission(){

        dd($this->user_permission_model);

        dd('ok');
        // dump($value);
        // dd($action);
    }
    public function closeAssignPermission(){
       $this->assign_permission_confirmation = false;
        // dump($value);
        // dd($action);
    }



}
