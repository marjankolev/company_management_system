<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [ 
    	'title', 
    	'description', 
    	'projects_id', 
    	'employee_id',
        'employees_id',
        'estimation',
    ]; 

    public function projects(){
    	return $this->belongsTo(Projects::class); 
    }

    public function employees(){
    	return $this->belongsTo(Employees::class);
    }

    public function timesheets(){
        return $this->hasMany(Timesheets::class);
    }
}
