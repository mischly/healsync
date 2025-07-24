@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Detail Booking</h2>

    <table class="table table-bordered mt-3">
        <tr>
            <th>User</th>
            <td>{{ $booking->user->name ?? '-' }}</td>
        </tr>
        <tr>
            <th>Mentor</th>
            <td>{{ $booking->mentor->nama ?? '-' }}</td>
        </tr>
        <tr>
            <th>Metode</th>
            <td>{{ ucfirst($booking->metode) }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $booking->tanggal }}</td>
        </tr>
        <tr>
            <th>Jam</th>
            <td>{{ $booking->jam }}</td>
        </tr>
        <tr>
            <th>Keluhan</th>
            <td>{{ $booking->keluhan }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <span class="badge bg-{{ $booking->status === 'selesai' ? 'success' : ($booking->status === 'batal' ? 'danger' : 'secondary') }}">
                    {{ ucfirst($booking->status) }}
                </span>
            </td>
        </tr>
    </table>

    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
