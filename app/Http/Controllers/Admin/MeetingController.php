<?php

namespace App\Http\Controllers\Admin;

use App\CategoryRelease;
use App\Meeting;
use App\PeriodAdmin;
use App\Representative;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meetings = Meeting::orderBy('id', 'DESC')->paginate(5);
        return view('admin.meeting.index', compact('meetings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periodids = PeriodAdmin::orderBy('name', 'ASC')->pluck('start_date', 'id');
        $representatives = Representative::orderBy('name', 'ASC')->pluck('name', 'id');


        return view('admin.meeting.create', compact('periodids','representatives'));
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
            'topic' => 'require',
            'slug' => 'require|unique:posts,slug',
            'representative_id'=>'required|integer',
            'category_id'=>'required|integer',
        ]};
        $meeting = Meeting::create($request->all());



        return redirect()->route('reunion.index')->with('info', 'Entrada creada con éxito');
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
        $request->validate{[
            'topic' => 'require',
            'slug' => 'require|unique:posts,slug',
            'representative_id'=>'required|integer',
            'category_id'=>'required|integer',
        ]};
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
