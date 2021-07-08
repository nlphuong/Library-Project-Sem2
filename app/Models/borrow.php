<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class borrow extends Model
{
    public function account(){
        return $this->hasOne('App\Models\account','id','customer_id');
    }
    public function book(){
        return $this->hasOne('App\Models\book','isbn','book_isbn');
    }
    public function borrows(){
        return $this->hasMany('App\Models\borrow','customer_id');
    }
}
