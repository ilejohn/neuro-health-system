<?php

namespace BrainApp\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {   

      return view('welcome');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function about()
  {   

      return view('about');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function services()
  {   

      return view('services');
  }

}
