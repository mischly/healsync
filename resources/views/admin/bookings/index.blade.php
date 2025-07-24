@extends('layouts.app')

@push('styles')
    @vite(['resources/css/admin/bookings/booking.css'])
@endpush

@section('title', 'Daftar Booking')

@section('no-footer')
@endsection

@section('content')
<div class="booking-container">
    <h2 class="booking-title">Daftar Booking</h2>

    <form method="GET" action="{{ route('admin.bookings.index') }}" class="booking-search-form">
        <input type="text" name="search" class="booking-search-input" placeholder="Cari nama user atau mentor..." value="{{ request('search') }}">
        <button class="booking-search-button" type="submit">
            <i class="bi bi-search"></i>
        </button>
    </form>

    <div class="table-responsive">
        <table class="booking-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Mentor</th>
                    <th>Metode</th>
                    <th>Jadwal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->mentor->name }}</td>
                        <td>{{ ucfirst($booking->metode) }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->jadwal)->translatedFormat('d F Y - H:i') }}</td>
                        <td>
                            <span class="badge bg-{{ $booking->status == 'pending' ? 'warning' : ($booking->status == 'approved' ? 'success' : 'secondary') }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-info btn-sm text-white">
                                <i class="bi bi-eye"></i>
                            </a>
                            <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Tidak ada booking ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
