@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Detail Mentor</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $mentor->nama }}</p>
            <p><strong>Bidang:</strong> {{ $mentor->bidang }}</p>

            @if ($mentor->foto)
                <p><strong>Foto:</strong></p>
                <img src="{{ asset('storage/' . $mentor->foto) }}" alt="Foto Mentor" width="150">
            @endif
        </div>
    </div>

    <a href="{{ route('admin.mentors.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
