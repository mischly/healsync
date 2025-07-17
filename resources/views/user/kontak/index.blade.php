@extends('layouts.app')

@push('styles')
    @vite(['resources/css/kontak.css'])
@endpush

@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<section class="kontak-section">
    <div class="container-kontak">
        <h2>Hubungi Kami</h2>
        <p>Jika kamu memiliki pertanyaan atau butuh bantuan, silakan hubungi kami melalui form atau informasi kontak berikut.</p>

        <div class="kontak-wrapper">
            <div class="kontak-form">
                <form action="#" method="POST">
                    @csrf
                    <input type="text" name="nama" placeholder="Nama Lengkap" required>
                    <input type="email" name="email" placeholder="Alamat Email" required>
                    <textarea name="pesan" rows="5" placeholder="Tulis pesan kamu di sini..." required></textarea>
                    <button type="submit">Kirim Pesan</button>
                </form>
            </div>

            <div class="kontak-info">
                <h4>Informasi Kontak</h4>
                <ul>
                    <li>
                        <i class="fas fa-envelope me-2 text-primary"></i>
                        <a href="mailto:support@layananpsikolog.com" class="text-decoration-none text-dark">
                            support@layananpsikolog.com
                        </a>
                    </li>
                    <li>
                        <i class="fas fa-phone me-2 text-primary"></i>
                        <a href="tel:+6282123374834" class="text-decoration-none text-dark">
                            +62 821-2337-4834
                        </a>
                    </li>
                    <li>
                        <i class="fab fa-whatsapp me-2 text-success"></i>
                        <a href="https://wa.me/6282123374834" target="_blank" class="text-decoration-none text-dark">
                            +62 821-2337-4834
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</section>
@endsection