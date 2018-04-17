<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table="comment";
    public $timestamps = false;
    public function comment_product(){
      return $this->belongsTo('App\product','productid','id');
    }
    public function comment_user(){
      return $this->belongsTo('App\User','userid','id');
    }
}
