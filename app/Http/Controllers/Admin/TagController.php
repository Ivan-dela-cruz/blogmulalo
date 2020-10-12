<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use Validator;
use Response;

use App\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware(auth);
    }

    public function index()
    {
        $tags = Tag::orderBy('id', 'DESC')->paginate(5);
        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate{
        [
            'name' => 'require',
            'slug' => 'require',
        ]
        };
        $tag = Tag::create($request->all());
        return response()->json($tag);
        //return redirect()->route('tag.edit', $tag->id)->with('info', 'Etiqueta creada con éxito');
    }

    public function addPost(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'slug' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toarray()));

        else {
            $tag = Tag::create($request->all());
            return response()->json($tag);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate{[
            'name' => 'require',
            'slug' => 'require',
        ]};

        $tag = Tag::find($request->id);
        $tag->fill($request->all())->save();
        return response()->json($tag);
        //return redirect()->route('tag.edit', $tag->id)->with('info', 'Etiqueta actualizada con éxito');
    }
    public function destroy(Request $request)
    {
        $tag = Tag::find($request->id)->delete();
        return response()->json();
        // return back()->with('info', 'Eliminado correctamente');
    }
    /**
     * public function editPost(request $request)
     * {
     * $tag = Tag::find($request->id);
     * $tag->name = $request->name;
     * $tag->slug = $request->slug;
     * $tag->save();
     * return response()->json($tag);
     * }
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    /**
     * public function deletePost(request $request)
     * {
     * $tag = Tag::find($request->id)->delete();
     * return response()->json();
     * }
     * */
}
