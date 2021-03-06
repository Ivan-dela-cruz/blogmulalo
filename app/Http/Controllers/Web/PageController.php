<?php

namespace App\Http\Controllers\Web;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function home()
    {
        return view('user.inicioUser');
    }

    public function blog()
    {
        $posts = Post::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        return view('user.posts', compact('posts'));
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('user.post', compact('post'));
    }

    public function category($slug){
        $category = Category::where('slug',$slug)->pluck('id')->first();
        $posts = Post::where('category_id',$category)->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);
        return view('user.posts', compact('posts'));
    }

    //para consultas de muchos a muchps

    public function tag($slug){

        $posts = Post::whereHas('tags',function ($query) use ($slug){
            $query->where('slug',$slug);
        })->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);
        return view('user.posts', compact('posts'));
    }

}
