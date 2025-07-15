@extends('layouts.app')

@section('title', 'Booking Berhasil')

@section('content')
<div class="container py-5 text-center">
  <h2 class="text-success">Booking Berhasil!</h2>
  <p>Terima kasih telah melakukan booking. Kami akan segera menghubungi Anda.</p>
  <a href="{{ route('booking.create') }}" class="btn btn-outline-primary mt-3">Kembali ke Form</a>
</div>
@endsection
