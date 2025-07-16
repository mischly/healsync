<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $bookings = Booking::with(['mentor'])
            ->where('user_id', $user->id)
            ->orderByDesc('tanggal')
            ->orderByDesc('jam')
            ->get();

        return view('profile.index', compact('user', 'bookings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('profile.edit', ['user' => auth()->user()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = auth()->user();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'phone' => 'required|string|max:20',
            'avatar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($user->avatar) {
                $oldPath = public_path('storage/' . $user->avatar);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->phone = $validated['phone'];
        $user->save();

        return redirect()->route('user.profile')->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Show the form for editing password.
     */
    public function editPassword()
    {
        return view('profile.password.edit', ['user' => auth()->user()]);
    }

    /**
     * Update password.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ], [
            'current_password.required' => 'Password saat ini wajib diisi',
            'password.required' => 'Password baru wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        $user = auth()->user();

        // Cek password saat ini
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak benar']);
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('user.profile')->with('success', 'Password berhasil diubah');
    }

    /**
     * Show the form for editing email.
     */
    public function editEmail()
    {
        return view('profile.email.edit', ['user' => auth()->user()]);
    }

    /**
     * Update email.
     */
    public function updateEmail(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password wajib diisi untuk konfirmasi',
        ]);

        // Cek password untuk konfirmasi
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password tidak benar']);
        }

        // Update email
        $user->update([
            'email' => $request->email
        ]);

        return redirect()->route('user.profile')->with('success', 'Email berhasil diubah');
    }
}