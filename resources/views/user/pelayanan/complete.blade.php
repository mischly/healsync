@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/thankyou.css') }}">

<div class="container py-5 d-flex justify-content-center align-items-center" style="min-height: 80vh">
    <div class="thankyou-card">
        <h2>Terima kasih telah melakukan booking!</h2>
        <p>Kami akan menghubungi Anda via Whatsapp sebelum sesi konsultasi dimulai.</p>

        <div class="mb-3">
            <h5 class="mb-1">Jangan lupa tinggalkan review anda ke {{ $mentor->nama }} ya :)</h5>
        </div>

        <a href="{{ route('page.index') }}" class="btn btn-primary mt-2">Kembali ke Beranda</a>
    </div>
</div>
@endsection

@push('styles')
    @vite(['resources/css/pelayanan/complete.css'])
@endpush
