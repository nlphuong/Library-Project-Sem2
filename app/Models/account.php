<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{   protected $table ='accounts';
    protected $fillable = [
        'fullname', 'email','password','gender','address','birthday','phone','image','role','active','dept'
    ];
}
