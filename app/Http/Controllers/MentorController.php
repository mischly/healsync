<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RoleMiddleware;
use App\Models\Mentor;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MentorController extends Controller
{
    // Middleware hanya admin yang bisa masuk

    public function __construct()
    {
        $this->middleware(RoleMiddleware::class);
    }

    // Method Resource Controller

    public function index(Request $request)
    {
        $query = Mentor::with('user');

        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $mentors = $query->latest()->paginate(5)->withQueryString();

        if ($request->ajax()) {
            return view('admin.mentors._table', compact('mentors'))->render();
        }

        return view('admin.mentors.index', compact('mentors'));
    }

    public function create()
    {
        return view('admin.mentors.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'bidang' => 'required|string',
            'biodata' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
        ]);

        // Assign role mentor
        $role = Role::where('name', 'mentor')->first();

        if ($role) {
            $user->roles()->attach($role->id);
        }
        
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = now()->format('Ymd_His') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $fotoPath = $file->storeAs('foto_mentors', $filename, 'public');
        }

        Mentor::create([
            'user_id' => $user->id,
            'nama' => $validated['name'],
            'bidang' => $validated['bidang'],
            'biodata' => $validated['biodata'],
            'foto' => $fotoPath,
        ]);

        return redirect()->route('admin.mentors.index')->with('success', 'Mentor dan akun pengguna berhasil ditambahkan.');
    }

    public function show($id)
    {
        $mentor = Mentor::findOrFail($id);
        return view('admin.mentors.show', compact('mentor'));
    }

    public function edit($id)
    {
        $mentor = Mentor::with('user')->findOrFail($id);
        return view('admin.mentors.edit', compact('mentor'));
    }


    public function update(Request $request, $id)
    {
        $mentor = Mentor::with('user')->findOrFail($id);
        $user = $mentor->user;

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'phone' => 'required|string|max:20',
            'bidang' => 'required|string|max:255',
            'biodata' => 'required|string',
            'password' => 'nullable|confirmed|min:6',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->phone = $request->phone;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $mentor->nama = $request->name;
        $mentor->bidang = $request->bidang;
        $mentor->biodata = $request->biodata;

        if ($request->hasFile('foto')) {
            if ($mentor->foto && Storage::exists('public/' . $mentor->foto)) {
                Storage::delete('public/' . $mentor->foto);
            }

            $file = $request->file('foto');
            $filename = now()->format('Ymd_His') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $fotoPath = $file->storeAs('foto_mentors', $filename, 'public');

            $mentor->foto = $fotoPath;
        }

        $mentor->save();

        return redirect()->route('admin.mentors.index')->with('success', 'Data mentor dan akun pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mentor = Mentor::findOrFail($id);

        if ($mentor->foto && Storage::exists('public/' . $mentor->foto)) {
            Storage::delete('public/' . $mentor->foto);
        }

        $mentor->delete();

        return redirect()->route('admin.mentors.index')->with('success', 'Mentor berhasil dihapus.');
    }
}
