@extends('layouts.app')

@push('styles')
    @vite('resources/css/pelayanan/index.css')
@endpush

@section('content')
<div class="container pelayanan">
    <div class="judul">
        <h2 class="fw-bold">Mau Mulai Konsultasi?</h2>
        <p class="fw-bold">Yuk Kenali Psikolog Kami!</p>
    </div>

    <div class="card-grid">
        @foreach ($psikologs as $p)
        <div class="card">
            <div class="img-wrapper">
                <img src="{{ $p['gambar'] }}" alt="Foto Psikolog">
            </div>
            <div class="card-content">
                <h3>{{ $p['nama'] }}</h3>
                <p>{{ $p['jenis'] }}</p>
                <div class="buttons">
                    <a href="#" class="btn btn-green">Lihat profil</a>
                    <a href="" class="btn btn-yellow">Konsultasi</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
