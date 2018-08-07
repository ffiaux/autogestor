<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $userRole;
        if ($this->isUserCommon())
        {
            $userRole = 'Regular user';
        
            return view('home', compact('userRole'));
        }
        else if ($this->isUserAdmin())
        {
            $userRole = 'Admin user';

            return view('homeadmin', compact('userRole'));
        }
        else
        {
            return $this->notFound();
        }
    }
}
