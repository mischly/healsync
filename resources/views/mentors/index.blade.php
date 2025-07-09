@extends('layouts.app')
@section('content')
<div class="container">
  <h2>Daftar Mentor</h2>
  <a href="{{ route('mentors.create') }}" class="btn btn-primary mb-3">Tambah Mentor</a>
  @foreach ($mentors as $mentor)
    <div class="card mb-2 p-3">
        <h5>{{ $mentor->nama }}</h5>
        <p>{{ $mentor->bidang }} | {{ $mentor->email }}</p>
        @if($mentor->foto)
          <img src="{{ asset('storage/' . $mentor->foto) }}" width="100">
        @endif
        <a href="{{ route('mentors.edit', $mentor) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('mentors.destroy', $mentor) }}" method="POST" style="display:inline;">
          @csrf @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
        </form>
    </div>
  @endforeach
</div>
@endsection
