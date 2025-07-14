@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Kirim Testimoni</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama (opsional):</label>
            <input type="text" name="name" class="form-control" placeholder="Boleh dikosongkan">
        </div>

        <div class="mb-3">
            <label>Rating:</label>
            <select name="rating" class="form-control" required>
                <option value="5">⭐️⭐️⭐️⭐️⭐️ - Sangat Puas</option>
                <option value="4">⭐️⭐️⭐️⭐️ - Puas</option>
                <option value="3">⭐️⭐️⭐️ - Cukup</option>
                <option value="2">⭐️⭐️ - Kurang</option>
                <option value="1">⭐️ - Tidak Puas</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Testimoni Anda:</label>
            <textarea name="message" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="consent" class="form-check-input" required>
            <label class="form-check-label">Saya mengizinkan testimoni ini ditampilkan di halaman publik.</label>
        </div>

        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>
@endsection
