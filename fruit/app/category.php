<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table="category";
    public $timestamps = false;
    public function detailcategory(){
      return $this->hasMany('App\detailcategory','categoryid','id');
    }
    public function product(){
      return $this->hasManyThrough('App\product','App\detailcategory','categoryid','detailcategoryid','id');
    }
}
