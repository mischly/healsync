@extends('layouts.app')

@section('no-footer')
@endsection

@push('styles')
    @vite(['resources/css/mentors/dashboard.css'])
@endpush

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Dashboard Mentor</h1>
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5>Daftar Konsultasi</h5>
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-custom">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->tanggal }}</td>
                                <td>{{ $booking->jam }}</td>
                                <td>
                                    @if ($booking->status === 'selesai')
                                        <span class="badge bg-success">Selesai</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($booking->status !== 'selesai')
                                        <form action="{{ route('mentor.booking.selesai', $booking->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-outline-primary">Selesaikan</button>
                                        </form>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada konsultasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
