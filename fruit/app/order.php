<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    //
    protected $table="order";
    public $timestamps = false;
    public function orderdetail_order(){
      return $this->hasMany('App\orderdetail','orderid','id');
    }
}
