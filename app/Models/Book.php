<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Book extends Model
{
    protected $fillable = [
        'isbn', 'title','author','no_Pages','publication_Year','publisher','price','no_Copies_Actual','no_Copies_Current','category_id','image','content','position'
    ];
    public function cat(){
        return $this->hasOne('App\Models\Category','id','category_Id');

    }
}
