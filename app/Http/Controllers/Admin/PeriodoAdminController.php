<?php

namespace App\Http\Controllers\Admin;

use App\PeriodAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeriodoAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $periods = PeriodAdmin::orderBy('id', 'DESC')->paginate(5);
        return view('admin.period.index', compact('periods'));
    }

    public function update(Request $request)
    {
        $request->validate{[
            'name' => 'require',
            'start_date' => 'require',
            'end_date' => 'require',
        ]};

        $period = PeriodAdmin::find($request->id);
        $period->fill($request->all())->save();
        return response()->json($period);
        //return redirect()->route('tag.edit', $tag->id)->with('info', 'Etiqueta actualizada con éxito');
    }

    public function destroy(Request $request)
    {
        $tag = PeriodAdmin::find($request->id)->delete();
        return response()->json();
        // return back()->with('info', 'Eliminado correctamente');
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
            'start_date' => 'require',
            'end_date' => 'require',
        ]
        };
        $period = PeriodAdmin::create($request->all());
        return response()->json($period);
        //return redirect()->route('tag.edit', $tag->id)->with('info', 'Etiqueta creada con éxito');
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

}
