<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Dashboard');
    }
    public function home()
    {
        return view('home');
    }
    public function login()
    {
        // return view('welcome');
    }
    
    public function contact(){
        
        return view('Contact_us');
    
    }
    public function about(){
        
        return view('about_us');
    
    }
}
