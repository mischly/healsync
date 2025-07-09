@extends('layouts.app')
@section('content')
<div class="container">
  <h2>Tambah Mentor</h2>
  <form action="{{ route('mentors.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Bidang</label>
      <input type="text" name="bidang" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Foto (Opsional)</label>
      <input type="file" name="foto" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
  </form>
</div>
@endsection
