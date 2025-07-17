<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;

class PelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $psikologs = Mentor::with('reviews')->get();
        return view('user.pelayanan.index', compact('psikologs'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mentor = Mentor::with(['reviews.user'])->findOrFail($id);
        return view('user.pelayanan.show', compact('mentor'));
    }
}
