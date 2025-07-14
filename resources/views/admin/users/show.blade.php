@extends('layouts.app')

@section('no-footer')
@endsection

@push('styles')
    @vite(['resources/css/admin/users/show.css']) 
@endpush

@section('content')
<div class="container py-5">
    <div class="card shadow p-4">
        <h2 class="mb-4 fw-bold">Detail User</h2>

        <div class="row mb-3">
            <div class="col-sm-3 fw-bold">ID</div>
            <div class="col-sm-9">{{ $user->id }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3 fw-bold">Nama</div>
            <div class="col-sm-9">{{ $user->name }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3 fw-bold">Email</div>
            <div class="col-sm-9">{{ $user->email }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3 fw-bold">Username</div>
            <div class="col-sm-9">{{ $user->username ?? '-' }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3 fw-bold">Nomor HP</div>
            <div class="col-sm-9">{{ $user->phone ?? '-' }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3 fw-bold">Role</div>
            <div class="col-sm-9">
                <span class="badge bg-{{ $user->isAdmin() ? 'danger' : 'primary' }}">
                    {{ $user->role->display_name ?? 'User' }}
                </span>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3 fw-bold">Tanggal Daftar</div>
            <div class="col-sm-9">{{ $user->created_at->format('d M Y') }}</div>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary me-2">Kembali</a>
        </div>
    </div>
</div>
@endsection
