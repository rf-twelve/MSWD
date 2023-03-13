<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    protected $casts = ['id' => 'integer'];

    public function getOfficeNameAttribute(){
        return Office::find($this->office_id) ? (Office::find($this->office_id))->name : '(Unknown)';
    }

    public function getUserNameAttribute(){
        return User::find($this->user_id) ? (User::find($this->user_id))->fullname : '(Unknown)';
    }

    public function getTrailDateAttribute(){
        return date("Y-m-d", strtotime($this->date_time));
    }

    public function getTrailTimeAttribute(){
        return date("h:i:s a", strtotime($this->date_time));
    }

    public function getTrailStatusAttribute(){
        return [
            '1' => 'Open',
            '0' => 'Closed',
        ][$this->is_open] ?? '(Unknown)';
    }





    public function getOfficeNameRecipientAttribute(){
        return Office::find($this->office_recipient) ? (Office::find($this->office_recipient))->name : '(Unknown)';
    }

    public function getActionPersonAttribute(){
        return User::find($this->action_by) ? (User::find($this->action_by))->fullname : '(Unknown)';
    }
}
