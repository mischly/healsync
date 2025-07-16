@extends('layouts.app')

@push('styles')
    @vite(['resources/css/page-css/layanan.css'])
@endpush

@section('content')
<div class="layanan-section">
    <h2 class="layanan-title">Layanan Psikologi Online</h2>
    <p class="layanan-subtitle">Dukungan profesional yang dapat kamu akses secara fleksibel.</p>

    <div class="layanan-grid">
        <div class="card-layanan">
            <img src="{{ asset('img/online1.jpg') }}" alt="Konseling Online" class="layanan-img">
            <h3 class="card-title">Konseling Online</h3>
            <p class="card-text">
                Temukan ruang aman untuk berbicara tentang perasaan dan kendalamu. 
                Kamu bisa mengakses dukungan kapan saja, dan di mana saja.
            </p>
            <a href="#" class="card-link">Pelajari Selengkapnya →</a>
        </div>

        <div class="card-layanan">
            <img src="{{ asset('img/online2.jpg') }}" alt="Asesmen Psikologis" class="layanan-img">
            <h3 class="card-title">Asesmen Psikologis</h3>
            <p class="card-text">
                Layanan ini dirancang untuk memberikan pemahaman mendalam mengenai kondisi psikologismu untuk berbagai kebutuhan.
            </p>
            <a href="#" class="card-link">Pelajari Selengkapnya →</a>
        </div>

        <div class="card-layanan">
            <img src="{{ asset('img/online3.jpg') }}" alt="Psikoterapi" class="layanan-img">
            <h3 class="card-title">Psikoterapi</h3>
            <p class="card-text">
                Kami menyediakan psikoterapi dengan berbagai pendekatan untuk mendampingimu dalam proses penyembuhan.
            </p>
            <a href="#" class="card-link">Pelajari Selengkapnya →</a>
        </div>
    </div>
    
    <div class="spacer"></div> 

    <h2 class="layanan-title">Layanan Psikologi Offline</h2>
    <p class="layanan-subtitle">Pendekatan tatap muka untuk pengalaman yang lebih mendalam.</p>

    <div class="layanan-grid">
        <div class="card-layanan">
            <img src="{{ asset('img/offline1.jpg') }}" alt="Konseling Tatap Muka" class="layanan-img">
            <h3 class="card-title">Konseling Tatap Muka</h3>
            <p class="card-text">
                Temui psikolog secara langsung di ruang konsultasi yang nyaman dan aman. 
                Konseling tatap muka membantu menjalin kedekatan emosional dan komunikasi yang lebih intens.
            </p>
            <a href="#" class="card-link">Pelajari Selengkapnya →</a>
        </div>

        <div class="card-layanan">
            <img src="{{ asset('img/offline2.jpg') }}" alt="Asesmen Langsung" class="layanan-img">
            <h3 class="card-title">Asesmen Psikologis Langsung</h3>
            <p class="card-text">
                Asesmen dilakukan secara langsung dengan alat ukur psikologis yang divalidasi. 
                Membantu menggali kondisi psikologismu secara menyeluruh dan akurat.
            </p>
            <a href="#" class="card-link">Pelajari Selengkapnya →</a>
        </div>

        <div class="card-layanan">
            <img src="{{ asset('img/offline3.jpg') }}" alt="Psikoterapi Terjadwal" class="layanan-img">
            <h3 class="card-title">Psikoterapi Terjadwal</h3>
            <p class="card-text">
                Dapatkan sesi psikoterapi dengan jadwal tetap di klinik atau ruang praktik. 
                Pendekatan disesuaikan dengan kebutuhan untuk mendukung proses pemulihan secara konsisten.
            </p>
            <a href="#" class="card-link">Pelajari Selengkapnya →</a>
        </div>
    </div>
</div>
@endsection
