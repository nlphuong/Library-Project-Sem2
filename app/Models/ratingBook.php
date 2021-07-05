<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ratingBook extends Model
{
    protected $table="ratingBooks";
    public $timestamps = false;
    public function account(){
        return $this->hasOne('App\Models\account','id','customer_Id');
    }
    public function book(){
        return $this->hasOne('App\Models\Book','isbn','isbn');
    }
}
