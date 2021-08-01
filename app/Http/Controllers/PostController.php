<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Validator,Redirect,Response;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::paginate(8);
        $data = '';
        if ($request->ajax()) {
            foreach ($posts as $post) {
                $data.='<li>'.$post->id.' <strong>'.$post->title.'</strong> : '.$post->description.'</li>';
            }
            return $data;
        }
        return view('posts');
    }
}
