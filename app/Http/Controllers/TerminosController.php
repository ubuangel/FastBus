<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TerminosController extends Controller
{
    public function index()
    {
        return view('terminos'); 
    }
}
