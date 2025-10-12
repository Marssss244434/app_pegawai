@extends('master')

@section('title', 'Tambah Posisi')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm p-4 rounded-4">
        <h2 class="mb-4 text-center text-primary">➕ Tambah Posisi</h2>

        {{-- Tampilkan error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi Kesalahan!</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('positions.store') }}" method="POST">
            @csrf

            {{-- Nama Jabatan --}}
            <div class="mb-3">
                <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" 
                       value="{{ old('nama_jabatan') }}" required>
            </div>

            {{-- Gaji Pokok --}}
            <div class="mb-3">
                <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                <input type="number" step="0.01" name="gaji_pokok" id="gaji_pokok" class="form-control" 
                       value="{{ old('gaji_pokok') }}" required>
            </div>

            {{-- Tombol aksi --}}
            <div class="text-end">
                <a href="{{ route('positions.index') }}" class="btn btn-secondary me-2">
                    <i class="bi bi-arrow-left-circle"></i> Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
