<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
  protected $table="orderdetail";
  public $timestamps = false;
  public function orderdetail_product(){
    return $this->belongsTo('App\product','productid','id');
  }
  public function orderdetail_order(){
    return $this->belongsTo('App\order','orderid','id');
  }
}
