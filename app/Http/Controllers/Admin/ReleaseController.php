<?php

namespace App\Http\Controllers\Admin;

use App\CategoryRelease;
use App\Meeting;
use App\Release;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $releases = Release::orderBy('id', 'DESC')->paginate(5);
        return view('admin.convocatorias.index', compact('releases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $meetings = Meeting::orderBy('topic', 'ASC')->pluck('topic', 'id');
        $categories = CategoryRelease::orderBy('name', 'ASC')->pluck('name', 'id');


        return view('admin.convocatorias.create', compact('categories','meetings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate{[
            'meeting_id'=>'required|integer',
            'category_id'=>'required|integer',
            'body' => 'require',
            'date' => 'require',
            'place' => 'require',
            'hour' => 'require',
            'slug' => 'require|unique:posts,slug',

        ]};
        $meeting = Release::create($request->all());



        return redirect()->route('convocatoria.index')->with('info', 'Entrada creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meetings = Meeting::orderBy('topic', 'ASC')->pluck('topic', 'id');
        $categories = CategoryRelease::orderBy('name', 'ASC')->pluck('name', 'id');
        $release = Release::find($id);
        return view('admin.convocatorias.edit', compact('release','meetings','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate{[
            'meeting_id'=>'required|integer',
            'category_id'=>'required|integer',
            'body' => 'require',
            'date' => 'require',
            'place' => 'require',
            'hour' => 'require',
            'slug' => 'require|unique:posts,slug',

        ]};
        $release = Release::find($id);

        $release->fill($request->all())->save();

        return redirect()->route('convocatoria.index')->with('info', 'Entrada actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $release = Release::find($id)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
