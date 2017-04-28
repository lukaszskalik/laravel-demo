<?php

namespace App\Http\Controllers;

use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SitesController extends Controller
{
    public function index(){
        $sites = Site::all();
        return view('sites.index', compact('sites'));
    }

    public function add(){
        return view('sites.add');
    }

    public function save(Request $request)
    {

        //dd($request->all());
        $image = $request->file('img');
        $filname = $image->getClientOriginalName();
        Storage::put('/upload/images/' . $filname, file_get_contents($request->file('img')->getRealPath()));
        $site = new Site();
        $site->title = $request->input('title');
        $site->description = $request->input('description');
        $site->img = $filname;
        $site->save();
        return redirect()->route('sites.add');
    }
}
