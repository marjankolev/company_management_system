<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    protected $fillable  = [
    	'id',
    	'updated_at',
    	'employees_id',
    	'leave_reason',
    	'numdays',
    	'employeename',
    	'employeesurname',
        'approved'
    ];

    public function employees(){
    	return $this->belongsTo(Employees::class);
    }
}
