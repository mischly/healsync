@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/thankyou.css') }}">

<div class="container py-5 d-flex justify-content-center align-items-center" style="min-height: 80vh">
    <div class="thankyou-card">
        <h2>Terima kasih telah melakukan booking!</h2>
        <p>Kami akan menghubungi Anda via Whatsapp sebelum sesi konsultasi dimulai.</p>

        <div class="mb-3">
            <h5 class="mb-1">Jangan lupa tinggalkan review anda ke {{ $mentor->nama }} ya :)</h5>
            <a href="#{{-- {{ route('review.create', $mentor->id) }} --}}" class="btn btn-outline-primary mt-4">Beri Review</a>
        </div>

        <a href="{{ route('page.index') }}" class="btn btn-primary mt-2">Kembali ke Beranda</a>
    </div>
</div>
@endsection

@push('styles')
<style>
body {
    background: linear-gradient(to left bottom, #91EAE4, #86A8E7, #7F7FD5);
    min-height: 100vh;
}

.thankyou-card {
    max-width: 600px;
    width: 100%;
    padding: 2.5rem;
    background-color: #ffffff;
    border-radius: 1.5rem;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: all 0.3s ease-in-out;
}

.thankyou-card h2 {
    font-size: 2rem;
    color: #2d3436;
    margin-bottom: 1rem;
}

.thankyou-card p {
    font-size: 1.1rem;
    color: #636e72;
    margin-bottom: 1.5rem;
}

.thankyou-card h5 {
    color: #2d3436;
    font-size: 1.125rem;
}

.thankyou-card .btn {
    padding: 0.6rem 1.2rem;
    font-size: 1rem;
    border-radius: 0.75rem;
}
</style>
@endpush
