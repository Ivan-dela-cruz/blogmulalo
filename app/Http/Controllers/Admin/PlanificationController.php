<?php

namespace App\Http\Controllers\Admin;

use App\CategoryPlanification;
use App\Planification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PlanificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planifications = Planification::orderBy('id', 'DESC')->paginate(5);
        return view('admin.planifications.index', compact('planifications'));
    }

    public function publicadas()
    {
        $planifications = Planification::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        return view('admin.planifications.index', compact('planifications'));
    }

    public function borrador()
    {
        $planifications = Planification::orderBy('id', 'DESC')->where('status', 'DRAFT')->paginate(3);

        return view('admin.planifications.draft', compact('planifications'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $categories = CategoryPlanification::orderBy('name', 'ASC')->pluck('name', 'id');


        return view('admin.planifications.create', compact('categories'));
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
            'slug' => 'require|unique:planifications,slug',
            'category_id'=>'required|integer',
            'body'=>'required',
            'status'=>'required|in:DRAF,PUBLISHED',
            'file'=>'file|mimes:jpg,jpeg,png',
            'pdf'=>'file|mimes:pdf'
        ]};
        $planifications = Planification::create($request->all());


        //IMAGE
        if ($request->file('image')) {
            $path = Storage::disk('public')->put('image', $request->file('image'));
            $planifications->fill(['file' => asset($path)])->save();
        }
        //PDF
        if ($request->file('pdf')) {
            $path = Storage::disk('public')->put('pdf/planification', $request->file('pdf'));
            $planifications->fill(['pdf' => asset($path)])->save();
        }


        return redirect()->route('plan-published')->with('info', 'Entrada creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $planification = Planification::find($id);


        return view('admin.planifications.show', compact('planification'));
    }
    public function dowmloadPdf($id)
    {
        $pdf = Planification::find($id);
        $pathfile= 'public/pdf';

        return Storage::download($pdf->pdf);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = CategoryPlanification::orderBy('name', 'ASC')->pluck('name', 'id');
        $planification = Planification::find($id);


        return view('admin.planifications.edit', compact('planification', 'categories'));
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
            'slug' => 'require|unique:planifications,slug',
            'category_id'=>'required|integer',
            'body'=>'required',
            'status'=>'required|in:DRAF,PUBLISHED',
            'file'=>'mimes:jpg,jpeg,png',
            'pdf'=>'file|mimes:pdf'
        ]};
        $planifications = Planification::find($id);

        $planifications->fill($request->all())->save();

        //IMAGE
        if ($request->file('image')) {
            $path = Storage::disk('public')->put('image', $request->file('image'));
            $planifications->fill(['file' => asset($path)])->save();
        }
        //pdf
        if ($request->file('pdf')) {
            $path = Storage::disk('public')->put('pdf/planification', $request->file('pdf'));
            $planifications->fill(['pdf' => asset($path)])->save();
        }


        return redirect()->route('planification.edit', $planifications->id)->with('info', 'Entrada actualizada con éxito');
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
        $planifications = Planification::find($request->id)->delete();

        return response()->json();
        //return back()->with('info', 'Eliminado correctamente');
    }
}
