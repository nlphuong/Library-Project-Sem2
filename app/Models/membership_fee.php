<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class membership_fee extends Model
{
    protected $table ='membership_fee';
    protected $fillable = [
       'membership_id','price'
    ];
    public function membership(){
        return $this->hasOne('App\Models\Membership','id','membership_id');
    }
}
