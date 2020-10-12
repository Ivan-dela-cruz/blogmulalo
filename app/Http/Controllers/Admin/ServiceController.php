<?php

namespace App\Http\Controllers\Admin;

use App\Service;
use App\CategoryService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicess = Post::orderBy('id', 'DESC')->paginate(5);
        return view('admin.service.index', compact('services'));
    }

    public function publicadas()
    {
        $services = Service::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        return view('admin.service.index', compact('services'));
    }
    public function borrador()
    {
        $services = Service::orderBy('id', 'DESC')->where('status', 'DRAFT')->paginate(3);

        return view('admin.service.draft', compact('services'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryService::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.service.create', compact('categories'));
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
            'name' => 'require',
            'slug' => 'require|unique:services,slug',
            'category_id'=>'required|integer',
            'body'=>'required',
            'description'=>'required',
            'status'=>'required|in:DRAF,PUBLISHED',
            'file'=>'file|mimes:jpg,jpeg,png'
        ]};
        $service = Service::create($request->all());


        //IMAGE
        if ($request->file('image')) {
            $path = Storage::disk('public')->put('image', $request->file('image'));
            $service->fill(['file' => asset($path)])->save();
        }

        return redirect()->route('services.edit', $service->id)->with('info', 'Entrada creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);


        return view('admin.service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = CategoryService::orderBy('name', 'ASC')->pluck('name', 'id');
        $service = Service::find($id);


        return view('admin.service.edit', compact('service', 'categories'));
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
            'name' => 'require',
            'slug' => 'require|unique:services,slug,',
            'category_id'=>'required|integer',
            'body'=>'required',
            'description'=>'required',
            'status'=>'required|in:DRAF,PUBLISHED',
            'file'=>'mimes:jpg,jpeg,png'
        ]};
        $service = Service::find($id);

        $service->fill($request->all())->save();

        //IMAGE
        if ($request->file('image')) {
            $path = Storage::disk('public')->put('image', $request->file('image'));
            $service->fill(['file' => asset($path)])->save();
        }

        return redirect()->route('services.edit', $service->id)->with('info', 'Entrada actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $service = Service::find($request->id)->delete();
        return response()->json();
    }
}