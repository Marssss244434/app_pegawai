@extends('master')

@section('title', 'Daftar Departemen')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"></i>Daftar Departemen</h4>
            <a href="{{ route('departments.create') }}" class="btn btn-light btn-sm">
                <i class="bi bi-plus-circle me-1"></i>Tambah Departemen
            </a>
        </div>

        <div class="card-body">
            {{-- 🔹 Alert Sukses --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- 🔹 Tabel Departemen --}}
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-primary text-center">
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Nama Departemen</th>
                            <th style="width: 25%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($departments as $index => $department)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $department->nama_departemen }}</td>
                                <td class="text-center">
                                    {{-- Tombol Detail --}}
                                    <a href="{{ route('departments.show', $department->id) }}" class="btn btn-info btn-sm text-white me-1">
                                        <i class="bi bi-eye"></i> Lihat
                                    </a>

                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning btn-sm text-white me-1">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    {{-- Tombol Hapus --}}
                                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Yakin ingin menghapus departemen ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">
                                    <i class="bi bi-exclamation-circle me-2"></i>Belum ada departemen yang ditambahkan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
