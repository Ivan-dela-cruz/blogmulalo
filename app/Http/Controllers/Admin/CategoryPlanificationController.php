<?php

namespace App\Http\Controllers\Admin;

use App\CategoryPlanification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryPlanificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = CategoryPlanification::orderBy('id', 'DESC')->paginate(5);
        return view('admin.categoryPlanification.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $category = new CategoryPlanification();
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->body = $request->body;
        $category->save();
        //$category = Category::create($request->all());
        return response()->json($category);
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
        //
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
            'body' => 'require',
        ]};
        $category = CategoryPlanification::find($request->id);
        $category->name = $request->name;
        $category->slug = str_slug($category->name);
        $category->body = $request->body;
        $category->save();
        return response()->json($category);
        //$category->fill($request->all())->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = CategoryPlanification::find($request->id)->delete();
        return response()->json();
    }
}
