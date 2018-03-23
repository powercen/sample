<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class StaticPagesController extends Controller
{
    public function home()
    {
        $data = [];
        if(Auth::check()){
            $data = Auth::user()->feed()->paginate(30);
        }

        return view('static_pages.home', compact('data'));
    }

    public function about()
    {
        return view('static_pages.about');
    }

    public function help()
    {
        return view('static_pages.help');
    }
}
