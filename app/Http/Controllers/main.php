<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class main extends Controller
{
  public function home(){

    return view('layouts.home');
  }
  
}
