<?php

namespace BrainApp\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        if (auth()->check()) {

          $user = auth()->user();
          return view('home',compact('user')); 

        } else {
            return redirect('/');
        }

    }
}
