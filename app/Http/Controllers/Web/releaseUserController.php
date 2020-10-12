<?php

namespace App\Http\Controllers\Web;

use App\CategoryRelease;
use App\Release;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class releaseUserController extends Controller
{
    public function index()
    {
        $releases = Release::orderBy('id', 'DESC')->paginate(3);

        return view('user.releases.planifications', compact('releases'));
    }
    public function category($slug){
        $category = CategoryRelease::where('slug',$slug)->pluck('id')->first();
        $releases = Release::where('category_id',$category)->orderBy('id', 'DESC')->paginate(3);
        return view('user.planification.planifications', compact('releases'));
    }

    public function show($slug)
    {
        $release = Release::where('slug', $slug)->first();

        return view('user.planification.planification', compact('release'));
    }
}
