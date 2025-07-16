@extends('layouts.app')

@section('no-footer')
@endsection

@push('styles')
    @vite(['resources/css/mentors/create.css'])
@endpush

@section('content')
<div class="profile-edit-wrapper">
    <div class="card profile-card shadow">
        <div class="card-body">
            <h3 class="mb-4">Tambah Mentor Baru</h3>
            <form action="{{ route('admin.mentors.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf

                <div class="row g-4">
                    <div class="col-md-3 text-center">
                        <div class="avatar-wrapper mx-auto" id="avatar-container">
                            <i id="avatar-preview" class="bi bi-person-circle avatar-icon"></i>
                        </div>
                        <label class="form-label mt-3">Foto Mentor</label>
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" value="{{ old('foto') }}" id="avatar">
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required>
                            @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No. Telepon</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Bidang</label>
                            <select name="bidang" class="form-select @error('bidang') is-invalid @enderror" required>
                                <option value="">-- Pilih Bidang --</option>
                                <option value="Klinis" {{ old('bidang') == 'Klinis' ? 'selected' : '' }}>Klinis</option>
                                <option value="Pendidikan" {{ old('bidang') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                                <option value="Organisasi" {{ old('bidang') == 'Organisasi' ? 'selected' : '' }}>Organisasi</option>
                                <option value="Anak & Remaja" {{ old('bidang') == 'Anak & Remaja' ? 'selected' : '' }}>Anak & Remaja</option>
                            </select>
                            @error('bidang')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Biodata</label>
                            <textarea name="biodata" class="form-control @error('biodata') is-invalid @enderror" rows="5" style="resize: none;" required>{{ old('biodata') }}</textarea>
                            @error('biodata')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6" style="margin-top: 2.3rem">
                        <a href="{{ route('admin.mentors.index') }}" class="btn btn-danger">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                    <div class="col-md-6 text-end">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-person-plus me-1"></i> Tambah Mentor
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    @vite(['resources/js/mentors/create.js'])
@endpush
