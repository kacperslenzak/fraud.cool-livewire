<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinksController extends Controller
{
    public function index()
    {
        return view('links');
    }

    public function linkTypes()
    {
        return view('link-types');
    }
}
