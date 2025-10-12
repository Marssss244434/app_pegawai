@extends('master')

@section('title', 'Edit Departemen')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">✏️ Edit Departemen</h1>

    {{-- Notifikasi error validasi --}}
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

    {{-- Form Edit --}}
    <form action="{{ route('departments.update', $department->id) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_departemen" class="form-label">Nama Departemen</label>
            <input 
                type="text" 
                name="nama_departemen" 
                id="nama_departemen" 
                class="form-control" 
                value="{{ old('nama_departemen', $department->nama_departemen) }}" 
                required
            >
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
