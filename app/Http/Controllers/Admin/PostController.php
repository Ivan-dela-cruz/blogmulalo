<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(5);
        return view('admin.post.index', compact('posts'));
    }

    public function publicadas()
    {
        $posts = Post::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        return view('admin.post.index', compact('posts'));
    }

    public function borrador()
    {
        $posts = Post::orderBy('id', 'DESC')->where('status', 'DRAFT')->paginate(3);

        return view('admin.post.draft', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->get();

        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate{[
            'name' => 'require',
            'slug' => 'require|unique:posts,slug',
            'user_id'=>'required|integer',
            'category_id'=>'required|integer',
            'tags'=>'required|array',
            'body'=>'required',
            'status'=>'required|in:DRAF,PUBLISHED',
            'file'=>'file|mimes:jpg,jpeg,png'
        ]};
        $post = Post::create($request->all());


        //IMAGE
        if ($request->file('image')) {
            $path = Storage::disk('public')->put('image', $request->file('image'));
            $post->fill(['file' => asset($path)])->save();
        }

        //TAGS
        $post->tags()->attach($request->get('tags'));

        return redirect()->route('posts.edit', $post->id)->with('info', 'Entrada creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);


        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->get();
        $post = Post::find($id);


        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate{[
            'name' => 'require',
            'slug' => 'require|unique:posts,slug,',
            'user_id'=>'required|integer',
            'category_id'=>'required|integer',
            'tags'=>'required|array',
            'body'=>'required',
            'status'=>'required|in:DRAF,PUBLISHED',
            'file'=>'mimes:jpg,jpeg,png'
        ]};
        $post = Post::find($id);

        $post->fill($request->all())->save();

        //IMAGE
        if ($request->file('image')) {
            $path = Storage::disk('public')->put('image', $request->file('image'));
            $post->fill(['file' => asset($path)])->save();
        }

        //TAGS
        $post->tags()->sync($request->get('tags'));

        return redirect()->route('posts.edit', $post->id)->with('info', 'Entrada actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       // $post = Post::find($id)->delete();
        $post = Post::find($request->id)->delete();

        return response()->json();
        //return back()->with('info', 'Eliminado correctamente');
    }
}
