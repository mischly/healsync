<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index() {
        return view('page.testimoni.index');
    }
}
