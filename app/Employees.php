<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable  = [
    	'id',
    	'name',
    	'surname',
    	'email'
    ];

    public function tasks(){
    	return $this->hasMany(Tasks::class);
    }

    public function leaves(){
    	return $this->hasMany(Leaves::class);
    }
}
