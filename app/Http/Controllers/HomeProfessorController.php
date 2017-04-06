<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeProfessorController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('professor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('professor/home');
    }
}
