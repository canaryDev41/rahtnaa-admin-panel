<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function submit(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $status = auth('admin')->attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]);

        return $status ? redirect('/dashboard') : redirect('/');
    }

    public function logout(){

        auth('admin')->logout();
        return redirect()->route('admin.login');
    }
}
