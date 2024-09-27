<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
   
    protected $guarded = [];
   
    ///////////////////////////////////////////////
    protected $attributes = ['active'=>1];
    ////////////////////////////////////////////////////
    public function getActiveAttribute($attributes){
return $this->activeOptions()[$attributes];
    }
public function activeOptions(){
    return [1=>'Active',0=>'Inactive',];
}
public function scopeActive($query){
    return $query->where('active',1);
}
public function scopeInactive($query){
    return $query->where('active',0);
}
public function company(){
    return $this->belongsTo(Company::class);
}
}
