<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login_Controller extends Controller
{

    public function login()
    {
        return view('login');
    }
    public function login_store(Request $request)
    {
        
        if (auth('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return 'admin';
        } else {
            return redirect()->back()->with(['error' => 'Email Or Password Not Correct']);
        }
    }
    public function logout()
    {

        auth('admin')->logout();
        return redirect()->route('login');
    }
}