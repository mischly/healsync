<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $psikologs = [
            [
                'nama' => 'Dr. Raditya Mahesa, M.Psi.',
                'gambar' => asset('img/dokter1.jpeg'),
                'jenis' => 'Psikolog Klinis'
            ],
            [
                'nama' => 'Dr. Kayla Theresia, M.Psi.,',
                'gambar' => asset('img/dokter2.jpeg'),
                'jenis' => 'Psikolog Klinis'
            ],
            [
                'nama' => 'Dr. Keenan, M.Psi.',
                'gambar' => asset('img/dokter3.jpeg'),
                'jenis' => 'Psikolog Klinis'
            ],
            [
                'nama' => 'Dr. Kayla Theresia, M.Psi.',
                'gambar' => asset('img/dokter4.jpeg'),
                'jenis' => 'Psikolog Klinis'
            ],
            [
                'nama' => 'Dr. Arya Aditya, M.Psi.',
                'gambar' => asset('img/dokter5.jpeg'),
                'jenis' => 'Psikolog Klinis'
            ],
            [
                'nama' => 'Dr. Nadhira Elvania, M.Psi.',
                'gambar' => asset('img/dokter6.jpeg'),
                'jenis' => 'Psikolog Klinis'
            ],
             [
                'nama' => 'Dr. Andrean Halim, M.Psi.',
                'gambar' => asset('img/dokter7.jpeg'),
                'jenis' => 'Psikolog Klinis'
            ],
             [
                'nama' => 'Elina Putri, M.Psi.',
                'gambar' => asset('img/dokter8.jpeg'),
                'jenis' => 'Psikolog Klinis'
            ],
             [
                'nama' => 'Dr. Julian Mahendra, M.Psi.',
                'gambar' => asset('img/dokter9.jpg'),
                'jenis' => 'Psikolog Klinis'
            ],
             [
                'nama' => 'Dr. Amara Celestine, M.Psi.',
                'gambar' => asset('img/dokter10.jpg'),
                'jenis' => 'Psikolog Klinis'
            ],
             [
                'nama' => 'Dr. Daryl Mahendra, M.Psi.',
                'gambar' => asset('img/dokter11.jpg'),
                'jenis' => 'Psikolog Klinis'
            ],
             [
                'nama' => 'Dr. Tiara Nandita, M.Psi.',
                'gambar' => asset('img/dokter12.jpg'),
                'jenis' => 'Psikolog Klinis'
            ],
        ];

        return view('user.pelayanan.index', compact('psikologs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
