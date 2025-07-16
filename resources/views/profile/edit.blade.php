@extends('layouts.app')

@section('no-footer')
@endsection

@push('styles')
    @vite(['resources/css/profile/create.css'])
@endpush

@section('content')
<div class="profile-edit-wrapper">
    <div class="card profile-card shadow">
        <div class="card-body">
            <h3 class="mb-4">Edit Profil</h3>
            <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf

                <div class="row g-4">
                    {{-- Kolom 1: Foto --}}
                    <div class="col-md-3 text-center">
                        <div class="avatar-wrapper-card mx-auto" id="avatar-container">
                            @if($user->avatar)
                                <img id="avatar-preview" src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="avatar-img-card rounded-circle">
                            @else
                                <i id="avatar-preview" class="bi bi-person-circle avatar-icon"></i>
                            @endif
                        </div>
                        <label class="form-label mt-3">Foto Profil</label>
                        <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" id="avatar" accept="image/*">
                        @error('avatar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Kolom 2: Nama, Username, Telepon --}}
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username) }}" required>
                            @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No. Telepon</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $user->phone) }}" required>
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    {{-- Kolom 3: Email (disabled) --}}
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                            <small class="text-muted">Email tidak dapat diubah disini</small>
                        </div>
                    </div>

                    {{-- Kolom 4: Tombol Actions --}}
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Aksi Tambahan</label>
                            <div class="d-grid gap-2">
                                <a href="{{ route('user.password.edit') }}" class="btn btn-outline-warning btn-sm">
                                    <i class="bi bi-key me-1"></i> Ubah Password
                                </a>
                                <a href="{{ route('user.email.edit') }}" class="btn btn-outline-info btn-sm">
                                    <i class="bi bi-envelope me-1"></i> Ubah Email
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tombol Kembali dan Simpan --}}
                <div class="row mt-4">
                    <div class="col-md-6" style="margin-top: 2.3rem">
                        <a href="{{ route('user.profile') }}" class="btn btn-danger">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                    <div class="col-md-6 text-end">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-person-check me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('avatar').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const container = document.getElementById('avatar-container');

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(evt) {
                const current = document.getElementById('avatar-preview');
                if (current.tagName.toLowerCase() === 'i') {
                    const img = document.createElement('img');
                    img.id = 'avatar-preview';
                    img.src = evt.target.result;
                    img.alt = 'Avatar';
                    img.className = 'avatar-img rounded-circle';

                    container.innerHTML = '';
                    container.appendChild(img);
                } else {
                    current.src = evt.target.result;
                }
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush