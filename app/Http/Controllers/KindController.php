<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KindController extends Controller
{
    public function index()
    {
        return view('kind_page');
    }
}
