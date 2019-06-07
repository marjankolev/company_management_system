<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timesheets extends Model
{
    protected $fillable  = [
    	'task_id',
    	'description',
    	'hours_spent',
    	'tasks_id',
    	'date',
        'employeename',
        'employeesurname'
    ];

    public function tasks(){
    	return $this->belongsTo(Tasks::class);
    }
    
}
