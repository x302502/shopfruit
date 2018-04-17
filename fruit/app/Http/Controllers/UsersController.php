<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function getDanhsach(){
      $us=User::all();
      return view('admin.user.danhsach',compact('us'));
    }
    public function getXoaUser(){
      $us=User::all();
      return view('admin.user.danhsach',compact('us'));
    }
}
