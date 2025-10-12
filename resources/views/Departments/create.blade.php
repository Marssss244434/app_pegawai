@extends('master')

@section('title', 'Tambah Departemen')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">➕ Tambah Departemen</h1>

    {{-- Notifikasi Error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Tambah Departemen --}}
    <form action="{{ route('departments.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        <div class="mb-3">
            <label for="nama_departemen" class="form-label">Nama Departemen</label>
            <input 
                type="text" 
                name="nama_departemen" 
                id="nama_departemen" 
                class="form-control" 
                placeholder="Masukkan nama departemen..." 
                value="{{ old('nama_departemen') }}" 
                required
            >
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan
            </button>
        </div>
    </form>
</div>
@endsection
