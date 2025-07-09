@extends('layouts.app')

@section('content')
<div class="about-container">
    <h1 class="text-center fw-bold mb-5">TENTANG KAMI</h1>

    <div class="about-section">
    <div class="about-text">
        <h4>Untuk Indonesia</h4>
        <h5>yang Sejahtera Secara Psikologis</h5>
        <p>
            Healsync menghubungkan setiap orang yang ingin bertumbuh dengan Psikolog terpercaya.
            Kami hadir sebagai solusi untuk menjawab kebutuhan layanan psikolog yang aman, terpercaya, dan mudah diakses.
            Kami percaya bahwa kesehatan mental merupakan hal penting, bukan hanya untuk orang yang sedang tertekan,
            tapi juga yang ingin terus bertumbuh.
        </p>
    </div>
    <div class="about-values">
        <h5 class="our-values">Our Values</h5>
        <div class="values">
            <div class="item">
                <img src="{{ asset('img/about1.png') }}" alt="Comprehensive">
                <p><strong>Comprehensive</strong><br>Memproses klien secara psikologis sampai ke akarnya</p>
            </div>
            <div class="item">
                <img src="{{ asset('img/about2.png') }}" alt="Helpful">
                <p><strong>Helpful</strong><br>Melayani dengan sepenuh hati dan niat baik</p>
            </div>
            <div class="item">
                <img src="{{ asset('img/about3.png') }}" alt="Growing">
                <p><strong>Growing</strong><br>Mendukung klien untuk tidak hanya sembuh, namun juga bertumbuh</p>
            </div>
        </div>
    </div>
</div>

<div class="visi-misi-section">
    <div class="row">
        <div class="col">
            <h5 class="text-info">VISI HEALSYNC</h5>
            <p>
                Mewujudkan masyarakat Indonesia yang sejahtera secara psikologis, di mana setiap individu merasa layak untuk didengar, dipahami, dan bertumbuh
            </p>
        </div>
        <div class="col">
            <h5 class="text-warning">MISI HEALSYNC</h5>
            <ol>
                <li>Menghubungkan individu dengan psikolog terpercaya melalui layanan yang aman dan mudah diakses</li>
                <li>Memberikan ruang konseling yang suportif, empatik, dan non-judgemental</li>
                <li>Menyediakan edukasi dan tools untuk mendukung perkembangan kesehatan mental secara berkelanjutan</li>
                <li>Membangun komunitas yang saling mendukung dan terbuka terhadap isu kesehatan mental</li>
            </ol>
        </div>
    </div>
</div>

<div class="tree-image">
    <img src="{{ asset('img/about4.png') }}" alt="Gambar Pohon">
</div>

<div class="fitur-section">
    <div class="fitur-wrapper">
        <div class="fitur-card">
            <img src="{{ asset('img/about5.png') }}" alt="Konseling">
            <h5>Konsultasi dengan psikolog sekarang</h5>
            <p>Ambil langkah pertama untuk memperoleh hidup yang lebih baik</p>
            <a href="#" class="fitur-btn">MULAI KONSELING</a>
        </div>
        <div class="fitur-card">
            <img src="{{ asset('img/about6.png') }}" alt="Kerjasama">
            <h5>Jalin kerjasama B2B dengan Healsync</h5>
            <p>Untuk keperluan training, seminar, dan sesi counseling untuk perusahaan</p>
            <a href="#" class="fitur-btn">HUBUNGI KAMI</a>
        </div>
        <div class="fitur-card">
            <img src="{{ asset('img/about7.png') }}" alt="Tim">
            <h5>Bergabung dengan tim</h5>
            <p>Ayo berkontribusi dalam mewujudkan mimpi masyarakat Indonesia untuk sejahtera secara psikologis</p>
            <a href="#" class="fitur-btn">GABUNG SEKARANG</a>
        </div>
    </div>

    <div class="fitur-tagline">
        <h4>#TumbuhBersamaHealsync</h4>
        <p>Bersama, kita bisa berkembang jadi versi terbaik dari diri sendiri.</p>
    </div>
</div>

@endsection
