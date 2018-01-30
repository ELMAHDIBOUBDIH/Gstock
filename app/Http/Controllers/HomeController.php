<?php

namespace Drstock\Http\Controllers;


class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //return view('welcome');
        return view('Acceuil.index');
    }
    public function dashboard()
    {
        return view('home');
    }
}
