@extends('layouts.app')

@section('no-footer')
@endsection

@push('styles')
    @vite(['resources/css/admin/dashboard.css'])
@endpush

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="welcome-title">Dashboard Admin</h1>
            <p>Selamat datang, Admin!</p>
        </div>
    </div>

    <div class="row">
        <!-- Data Mentor -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-person-video3 display-4 text-primary"></i>
                    <h5 class="mt-2">Data Mentor</h5>
                    <a href="{{ route('admin.mentors.index') }}" class="btn btn-sm btn-outline-primary mt-2">Kelola</a>
                </div>
            </div>
        </div>

        <!-- Data User -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-people-fill display-4 text-success"></i>
                    <h5 class="mt-2">Data User</h5>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-success mt-2">Kelola</a>
                </div>
            </div>
        </div>

        <!-- Data Booking -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-calendar-check-fill display-4 text-warning"></i>
                    <h5 class="mt-2">Data Booking</h5>
                    <a href="#" class="btn btn-sm btn-outline-warning mt-2">Kelola</a>
                </div>
            </div>
        </div>

        <!-- Data Review -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-clock-fill display-4 text-danger"></i>
                    <h5 class="mt-2">Data Jadwal</h5>
                    <a href="{{ route('admin.jadwal.index') }}" class="btn btn-sm btn-outline-danger mt-2">Kelola</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
