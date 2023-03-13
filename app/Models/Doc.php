<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = ['id' => 'integer'];

    const TYPE_OF_DOC = [
        'd' => 'Draft',
        'o' => 'Office',
        'p' => 'public'
    ];

    const FOR = [
        'sign' => 'Signature',
        'act' => 'Appropriate Action',
        'endorse' => 'Endorsement/Recomendation',
        'file' => 'Filing/Keep',
        'return' => 'Return',
        'draft' => 'Draft',
    ];

    const STATUS = [
        'origin' => 'Originated',
        'received' => 'Received',
        'released' => 'Released',
        'terminal' => 'Terminal',
    ];

    const CLASS_OF_DOC = [
    'cos' => 'Certificate of Service',
    'dv' => 'Disbursement Voucher',
    'iir' => 'Inventory and Inspection Report',
    'l' => 'Letter',
    'lr' => 'Liquidation Report',
    'memo' => 'Memorandum',
    'moa' => 'Memorandum of Agreement',
    'mr' => 'Memorandum Receipt',
    'ocd' => 'Official Cash Book',
    'pds' => 'Personal Data Sheet',
    'po' => 'Purchase Order',
    'pr' => 'Purchase Request',
    'rs' => 'Referral Slip',
    'roa' => 'Request for Obligation of Allotments',
    'riv' => 'Requisition and Issue Voucher',
    'u' => 'Unclassified',
    ];

    public function getActionForAttribute(){
        return [
            'sign' => 'Signature',
            'act' => 'Appropriate Action',
            'endorse' => 'Endorsement/Recomendation',
            'file' => 'Filing/Keep',
            'return' => 'Return',
            'draft' => 'Draft',
        ][$this->for] ?? '(Unknown)';
    }

    public function getDocumentStatusAttribute(){
        return [
            'origin' => 'Originated',
            'received' => 'Received',
            'released' => 'Released',
            'terminal' => 'Terminal',
        ][$this->status] ?? '(Unknown)';
    }

    public function getDocumentTypeAttribute(){
        return [
            'cos' => 'Certificate of Service',
            'dv' => 'Disbursement Voucher',
            'iir' => 'Inventory and Inspection Report',
            'l' => 'Letter',
            'lr' => 'Liquidation Report',
            'memo' => 'Memorandum',
            'moa' => 'Memorandum of Agreement',
            'mr' => 'Memorandum Receipt',
            'ocd' => 'Official Cash Book',
            'pds' => 'Personal Data Sheet',
            'po' => 'Purchase Order',
            'pr' => 'Purchase Request',
            'rs' => 'Referral Slip',
            'roa' => 'Request for Obligation of Allotments',
            'riv' => 'Requisition and Issue Voucher',
            'u' => 'Unclassified',
        ][$this->class] ?? '(Unknown)';
    }


    public function getUserFullnameAttribute(){
        return User::find($this->created_by) ? (User::find($this->created_by))->fullname : '(Unknown)';
    }

    public function getOfficeNameAttribute(){
        return Office::find($this->office_id) ? (Office::find($this->office_id))->name : '(Unknown)';
    }

    public function action_takens()
    {
        return $this->hasMany(ActionTaken::class);
    }

    public function audit_trails()
    {
        return $this->hasMany(AuditTrail::class);
    }

}



