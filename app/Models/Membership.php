<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table ='Membership';
    protected $fillable = [
       'customer_id','start_date','expiration_Date','price','status',
    ];
    public function account(){
        return $this->hasOne('App\Models\account','id','customer_id');
    }
}
