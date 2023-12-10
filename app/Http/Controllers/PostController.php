<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

       $posts = Post::with('user')->paginate(9);
        return view('welcome', get_defined_vars());
    }
    public function postById(Request $request){
       
        $post = Post::with('user')->where('id', $request->id)->first();
       return response()->json(get_defined_vars());
    }
}
