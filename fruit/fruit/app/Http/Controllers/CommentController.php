<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;
use App\user;
use App\product;

class CommentController extends Controller
{
    public function getDanhsach()
    {
        $temp=comment::all();
        return view('admin.comment.danhsach',compact('temp'));
    }
    public function getXoa($id)
    {
        $key=comment::find($id);
        $key->delete();
        return redirect('admin/comment/danhsach/');
    }
}
