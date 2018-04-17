<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table="product";
    public $timestamps = false;
    public function category(){
      return $this->belongsTo('App\category','categoryid','id');
    }
    public function detailcategory(){
      return $this->belongsTo('App\detailcategory','detailcategoryid','id');
    }
    public function product_comment(){
      return $this->hasMany('App\comment','productid','id');
    }
    public function product_orderdetail(){
      return $this->hasMany('App\orderdetail','productid','id');
    }
}
