<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailcategory extends Model
{
    //
    protected $table="detailcategory";
public $timestamps = false;
    public function category(){
      return $this->belongsTo('App\category','categoryid','id');
    }
    public function product(){
      return $this->hasMany('App\product','detailcategoryid','id');
    }
}
