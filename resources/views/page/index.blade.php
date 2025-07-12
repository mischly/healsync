@extends('layouts.app')

@push('styles')
    @vite(['resources/css/page-css/index.css'])
@endpush

@section('content')
<section class="jumbotron-hero home">
    <div class="container hero-inner">
        <div class="row align-items-center w-100">
            <div class="col-lg-6">
                <h2 class="hero-title">"Pulihkan Kesehatan Mentalmu<br>Bersama Healsync"</h2>
                <p class="hero-subtitle">Dukungan seperti apa yang kamu butuhkan?</p>

                <div class="cards-group">
                    <div class="card-konseling">
                        <h5>Konseling untuk saya</h5>
                        <p class="mb-2">Konseling&nbsp;Online</p>

                        <a href="{{ route('pelayanan.index') }}" class="btn-pilih">Pilih&nbsp;→</a>
                        <img src="{{ asset('img/vektor7.png') }}"
                             alt="Konseling Online" class="konseling-img">

                        {{ -- <a href="#" class="btn-pilih">Pilih&nbsp;→</a>
                        <img src="{{ asset('img/vektor7.png') }}" alt="Konseling Online" class="konseling-img"> --}}
                    </div>

                    <div class="card-konseling">
                        <h5>Konseling untuk saya</h5>
                        <p class="mb-2">Konseling&nbsp;Offline</p>
                        <a href="#" class="btn-pilih">Pilih&nbsp;→</a>
                        <img src="{{ asset('img/vektor8.png') }}" alt="Konseling Offline" class="konseling-img">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 d-none d-lg-block text-end">
                <img src="{{ asset('img/vektor6.png') }}" alt="vector-6" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section class="bg-white section-l">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="fw-bold">Layanan Psikologi Online</h1>
        </div>
        <div class="row gy-4 text-center text-md-start">
            <div class="col-md-4">
                <h3 class="fw-semibold text-dark mb-2">Konseling Online</h3>
                <p class="text-muted fs-5">Temukan ruang aman untuk berbicara tentang perasaan dan kendalamu. Kamu bisa mengakses dukungan kapan saja, dan di mana saja.</p>
            </div>
            <div class="col-md-4">
                <h3 class="fw-semibold text-dark mb-2">Asesmen Psikologis</h3>
                <p class="text-muted fs-5">Layanan ini dirancang untuk memberikan pemahaman mendalam mengenai kondisi psikologismu untuk berbagai kebutuhan.</p>
            </div>
            <div class="col-md-4">
                <h3 class="fw-semibold text-dark mb-2">Psikoterapi</h3>
                <p class="text-muted fs-5">Kami menyediakan psikoterapi dengan berbagai pendekatan untuk mendampingimu dalam proses penyembuhan.</p>
            </div>
        </div>
    </div>
</section>

<section class="cara-daftar-section">
    <div class="container py-5">
        <h2 class="text-center fw-bold mb-5">Bagaimana cara mendaftarkan<br> diri untuk konseling?</h2>

        <div class="row align-items-center mb-5">
            <div class="col-md-7">
                <h3 class="text-primary fw-bold fs-1 mb-2">01</h3>
                <h5 class="fw-bold">Isi Formulir Pendaftaran</h5>
                <p class="">Kamu dapat mengisi data diri dan preferensi layanan konseling yang kamu butuhkan. Kami akan menghubungimu setelah proses singkat.</p>
                <a href="#" class="btn btn-outline-primary rounded-pill px-4 py-2">Daftar di sini</a>
            </div>
            <div class="col-md-5 text-center">
                <div class="img-placeholder">
                    <img src="{{ asset('img/vektor9.svg') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="row align-items-center mb-5 flex-md-row-reverse">
            <div class="col-md-7">
                <h3 class="text-primary fw-bold fs-1 mb-2">02</h3>
                <h5 class="fw-bold">Lakukan Pembayaran</h5>
                <p class="">Untuk melanjutkan pendaftaran, cukup ikuti instruksi pembayaran sesuai layanan yang kamu pilih.</p>
                <a href="#" class="btn btn-outline-primary rounded-pill px-4 py-2">Konfirmasi di sini</a>
            </div>
            <div class="col-md-5 text-center">
                <div class="img-placeholder">
                    <img src="{{ asset('img/vektor10.svg') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-7">
                <h3 class="text-primary fw-bold fs-1 mb-2">03</h3>
                <h5 class="fw-bold">Sesi Pertemuan</h5>
                <p class="">Tim kami akan mengatur jadwal pertemuan dan menghubungimu melalui media yang tersedia. Silakan siapkan diri, sesi akan dilaksanakan sesuai jadwal.</p>
                <a href="#" class="btn btn-outline-primary rounded-pill px-4 py-2">Hubungi kami</a>
            </div>
            <div class="col-md-5 text-center">
                <div class="img-placeholder">
                    <img src="{{ asset('img/vektor11.svg') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
