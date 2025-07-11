<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MentorController extends Controller
{
    public function index(Request $request)
    {
        $query = Mentor::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $mentors = $query->orderBy('nama')->paginate(5); // Tampilkan 5 per halaman

        return view('mentors.index', compact('mentors'));
    }

    // Form tambah mentor
    public function create()
    {
        return view('mentors.create');
    }

    // Simpan mentor baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        $mentor = new Mentor();
        $mentor->nama = $request->nama;
        $mentor->bidang = $request->bidang;

        if ($request->hasFile('foto')) {
            $mentor->foto = $request->file('foto')->store('foto_mentors', 'public');
        }

        $mentor->save();

        return redirect()->route('mentors.index')->with('success', 'Mentor berhasil ditambahkan.');
    }

    // Tampilkan detail mentor
    public function show($id)
    {
        $mentor = Mentor::findOrFail($id);
        return view('mentors.show', compact('mentor'));
    }

    // Form edit mentor
    public function edit($id)
    {
        $mentor = Mentor::findOrFail($id);
        return view('mentors.edit', compact('mentor'));
    }

    // Update data mentor
    public function update(Request $request, $id)
    {
        $mentor = Mentor::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        $mentor->nama = $request->nama;
        $mentor->bidang = $request->bidang;

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($mentor->foto && Storage::exists('public/' . $mentor->foto)) {
                Storage::delete('public/' . $mentor->foto);
            }

            // Simpan foto baru
            $mentor->foto = $request->file('foto')->store('foto_mentors', 'public');
        }

        $mentor->save();

        return redirect()->route('mentors.index')->with('success', 'Data mentor berhasil diperbarui.');
    }

    // Hapus mentor
    public function destroy($id)
    {
        $mentor = Mentor::findOrFail($id);

        if ($mentor->foto && Storage::exists('public/' . $mentor->foto)) {
            Storage::delete('public/' . $mentor->foto);
        }

        $mentor->delete();

        return redirect()->route('mentors.index')->with('success', 'Mentor berhasil dihapus.');
    }
}
