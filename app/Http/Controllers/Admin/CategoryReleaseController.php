<?php

namespace App\Http\Controllers\Admin;

use App\CategoryRelease;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = CategoryRelease::orderBy('id', 'DESC')->paginate(5);
        return view('admin.CategoryRelease.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.CategoryRelease.create');
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
            'body' => 'require',
        ]
        };
        $category = CategoryRelease::create($request->all());

        return redirect()->route('categoria_convocatoria.index')->with('info', 'Entrada creada con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = CategoryRelease::find($id);
        return view('admin.CategoryRelease.edit', compact('category'));
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
        $request->validate{
        [
            'name' => 'require',
            'body' => 'require',
        ]
        };
        $category = CategoryRelease::find($id);

        $category->fill($request->all())->save();
        return redirect()->route('categoria_convocatoria.index')->with('info', 'Entrada actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = CategoryRelease::find($id)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
