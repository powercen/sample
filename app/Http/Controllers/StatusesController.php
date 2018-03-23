<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class StatusesController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:140'
        ]);

        Auth::user()->statuses()->create(['content' => $request['content']]);
        return redirect()->back();

    }

}
