<?php

namespace App\Http\Controllers\Admin;

use App\PeriodAdmin;
use App\Representative;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class RepresentativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $representatives = Representative::orderBy('id', 'DESC')->paginate(5);
        return view('admin.representative.index', compact('representatives'));
    }
    public function indexUser()
    {
        $representatives = Representative::orderBy('id', 'DESC')->paginate(10);
        return view('user.representative.index', compact('representatives'));
    }

    public function periodRepresentatives($name){
        $period = PeriodAdmin::where('name',$name)->pluck('id')->first();
        $representatives = Representative::where('period_id',$period)->orderBy('id', 'DESC')->paginate(3);
        return view('admin.representative.index', compact('representatives'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $periods = PeriodAdmin::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.representative.create', compact('periods'));
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
            'period_id' => 'required|integer',
            'name' => 'require',
            'last_name' => 'require',
            'ci' => 'require',
            'email' => 'require',
            'position' => 'required',
            'file' => 'file|mimes:pdf'
        ]};
        $representative = Representative::create($request->all());


        //IMAGE
        if ($request->file('image')) {
            $path = Storage::disk('public')->put('image/reprentatives', $request->file('image'));
            $representative->fill(['file' => asset($path)])->save();
        }


        return redirect()->route('representative.index', $representative->id)->with('info', 'Entrada creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $representative = Representative::find($id);


        return view('admin.representative.show', compact('representative'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $periods = PeriodAdmin::orderBy('name', 'ASC')->pluck('name', 'id');
        $representative = Representative::find($id);


        return view('admin.representative.edit', compact('representative', 'periods'));
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
            'period_id' => 'required|integer',
            'name' => 'require',
            'last_name' => 'require',
            'ci' => 'require',
            'email' => 'require',
            'position' => 'required',
            'file' => 'file|mimes:jpg,jpeg,png'
        ]};
        $representative = Representative::find($id);

        $representative->fill($request->all())->save();

        //IMAGE
        if ($request->file('image')) {
            $path = Storage::disk('public')->put('image/reprentatives', $request->file('image'));
            $representative->fill(['file' => asset($path)])->save();
        }


        return redirect()->route('representative.index', $representative->id)->with('info', 'Entrada actualizada con éxito');
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
        $post = Representative::find($request->id)->delete();

        return response()->json();
        //return back()->with('info', 'Eliminado correctamente');
    }
}
