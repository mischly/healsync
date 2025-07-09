<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function index()
    {
        $mentors = Mentor::all();
        return view('mentors.index', compact('mentors'));
    }

    public function create()
    {
        return view('mentors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'bidang' => 'required',
            'email' => 'required|email|unique:mentors',
            'foto' => 'nullable|image'
        ]);

        $mentor = new Mentor($request->except('foto'));

        if ($request->hasFile('foto')) {
            $mentor->foto = $request->file('foto')->store('foto_mentors', 'public');
        }

        $mentor->save();
        return redirect()->route('mentors.index')->with('success', 'Mentor berhasil ditambahkan');
    }

    public function edit(Mentor $mentor)
    {
        return view('mentors.edit', compact('mentor'));
    }

    public function update(Request $request, Mentor $mentor)
    {
        $request->validate([
            'nama' => 'required',
            'bidang' => 'required',
            'email' => 'required|email|unique:mentors,email,' . $mentor->id,
            'foto' => 'nullable|image'
        ]);

        $mentor->fill($request->except('foto'));

        if ($request->hasFile('foto')) {
            $mentor->foto = $request->file('foto')->store('foto_mentors', 'public');
        }

        $mentor->save();
        return redirect()->route('mentors.index')->with('success', 'Mentor diperbarui');
    }

    public function destroy(Mentor $mentor)
    {
        $mentor->delete();
        return redirect()->route('mentors.index')->with('success', 'Mentor dihapus');
    }
}