<?php

namespace App\Http\Controllers\Web;

use App\CategoryPlanification;
use App\Planification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class planificationUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planifications = Planification::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        return view('user.planification.planifications', compact('planifications'));
    }
    public function category($slug){
        $category = CategoryPlanification::where('slug',$slug)->pluck('id')->first();
        $planifications = Planification::where('category_id',$category)->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);
        return view('user.planification.planifications', compact('planifications'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $planification = Planification::where('slug', $slug)->first();

        return view('user.planification.planification', compact('planification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
