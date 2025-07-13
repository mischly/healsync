@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Edit Mentor</h2>

    <form action="{{ route('admin.mentors.update', $mentor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" 
                   value="{{ old('nama', $mentor->nama) }}">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Bidang --}}
        <div class="mb-3">
            <label for="bidang" class="form-label">Bidang</label>
            <input type="text" name="bidang" id="bidang" class="form-control @error('bidang') is-invalid @enderror" 
                   value="{{ old('bidang', $mentor->bidang) }}">
            @error('bidang')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Foto --}}
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label><br>
            @if ($mentor->foto)
                <img src="{{ asset('storage/' . $mentor->foto) }}" alt="Foto Mentor" width="100" class="mb-2 d-block">
            @endif
            <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.mentors.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
