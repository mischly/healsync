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
            <h3 class="mb-4">Edit Data Mentor</h3>
            <form action="{{ route('admin.mentors.update', $mentor->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    <div class="col-md-3 text-center">
                        <div class="avatar-wrapper mx-auto" id="avatar-container">
                            @if($mentor->foto)
                                <img src="{{ asset('storage/' . $mentor->foto) }}" id="avatar-preview" class="avatar-img rounded-circle" alt="Avatar">
                            @else
                                <i id="avatar-preview" class="bi bi-person-circle avatar-icon"></i>
                            @endif
                        </div>
                        <label class="form-label mt-3">Foto Mentor</label>
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="avatar">
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $mentor->user->name) }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                                value="{{ old('username', $mentor->user->username) }}" required>
                            @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No. Telepon</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone', $mentor->user->phone) }}" required>
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Bidang</label>
                            <select name="bidang" class="form-select @error('bidang') is-invalid @enderror" required>
                                <option value="">Pilih Bidang</option>
                                @php $selectedBidang = old('bidang', $mentor->bidang); @endphp
                                <option value="Klinis" {{ $selectedBidang == 'Klinis' ? 'selected' : '' }}>Klinis</option>
                                <option value="Pendidikan" {{ $selectedBidang == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                                <option value="Organisasi" {{ $selectedBidang == 'Organisasi' ? 'selected' : '' }}>Organisasi</option>
                                <option value="Anak & Remaja" {{ $selectedBidang == 'Anak & Remaja' ? 'selected' : '' }}>Anak & Remaja</option>
                            </select>
                            @error('bidang')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Biodata</label>
                            <textarea name="biodata" class="form-control @error('biodata') is-invalid @enderror" rows="5" style="resize: none;" required>{{ old('biodata', $mentor->biodata) }}</textarea>
                            @error('biodata')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $mentor->user->email) }}" disabled readonly>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan Perubahan
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