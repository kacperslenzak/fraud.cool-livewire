<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinksController extends Controller
{
    public function index()
    {
        return view('dashboard.links');
    }

    public function linkTypes()
    {
        return view('dashboard.link-types');
    }
}
