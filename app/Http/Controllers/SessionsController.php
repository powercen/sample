<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function create()
    {
        return view('sessions.create');
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $rs = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($rs, $request->has('remember'))){
            session()->flash('success', '欢迎回来！');
            //return redirect()->route('users.show', [Auth::user()]);
            return redirect()->intended(route('users.show', [Auth::user()]));
        }else {
            session()->flash('danger', '邮箱和密码不符');
            return redirect()->back();
        }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '你已成功退出');
        return redirect('login');
    }
}