<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\CompanyFactory;
class Company extends Model
{
       use HasFactory;
       protected $guarded = [];
       public function customers(){
        return $this->hasMany(Customers::class);
       }
}
