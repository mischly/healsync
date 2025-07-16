@extends('layouts.app')

@section('no-footer')
@endsection

@push('styles')
    @vite(['resources/css/profile/index.css'])
@endpush

@section('content')
<div class="container container-profile">
    <div class="row">
        <div class="col-md-4 mb-4 mb-md-0">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    @if($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" class="rounded-circle mb-3" width="120" height="120">
                    @else
                        <i class="bi bi-person-circle text-secondary" style="font-size: 5rem;"></i>
                    @endif
                    <h5 class="mb-0">{{ $user->name }}</h5>
                    <p class="text-muted mb-3">{{ $user->email }}</p>
                    <a href="{{ route('user.profile.edit') }}" class="btn btn-outline-primary btn-sm">Edit Profil</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <h5 class="mb-3 text-white">Riwayat Booking Konsultasi</h5>
            @if($bookings->isEmpty())
                <div class="alert alert-warning">Belum ada riwayat booking.</div>
            @else
                <div class="table-responsive shadow-sm rounded">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Mentor</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($booking->tanggal)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->jam)->format('H:i') }}</td>
                                    <td>{{ $booking->mentor->nama ?? '-' }}</td>
                                    <td>
                                        @if($booking->status == 'selesai')
                                            <span class="badge bg-success">Selesai</span>
                                        @elseif($booking->status == 'dibatalkan')
                                            <span class="badge bg-danger">Dibatalkan</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Menunggu</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('booking.show', $booking->id) }}" class="btn btn-sm btn-outline-primary align-center">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
