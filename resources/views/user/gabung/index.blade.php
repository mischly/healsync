@extends('layouts.app')

@push('styles')
    @vite(['resources/css/gabung.css'])
@endpush

@section('content')
<section class="container-gabung">
    <h2>Gabung Bersama Healsync</h2>
    <p>Ayo berkontribusi bersama kami untuk membantu masyarakat Indonesia menjadi lebih sehat secara psikologis.</p>

    <div class="benefit-section">
        <h4>Kenapa Bergabung?</h4>
        <ul>
            <li>Ikut serta dalam gerakan kesehatan mental</li>
            <li>Kesempatan pengembangan profesional dan training</li>
            <li>Bekerja bersama tim yang suportif dan berdampak</li>
        </ul>
    </div>

    <div class="form-section">
        <h4>Formulir Pendaftaran</h4>
        <form action="#" method="POST">
            @csrf
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
            <input type="email" name="email" placeholder="Email Aktif" required>
            <input type="text" name="bidang" placeholder="Bidang Keahlian (misal: Psikolog, Admin, Dll)" required>
            <textarea name="alasan" rows="5" placeholder="Alasan ingin bergabung" required></textarea>
            <button type="submit">Kirim Pendaftaran</button>
        </form>
    </div>
</section>
@endsection