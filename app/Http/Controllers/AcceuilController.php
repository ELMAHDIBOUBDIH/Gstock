<?php

namespace Drstock\Http\Controllers;

use Illuminate\Http\Request;

class AcceuilController extends Controller
{
  public function index()
  {
  	return view('Acceuil.index');
  }
}
