@extends('master')

@section('title', 'Daftar Pegawai')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-semibold">Daftar Pegawai</h1>
        <a href="{{ route('employees.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Tambah Pegawai
        </a>
    </div>

    {{-- 🔹 Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- 🔹 Card Tabel Data --}}
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white fw-semibold">
            <i class="bi bi-people-fill me-1"></i> Data Pegawai
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Tanggal Masuk</th>
                            <th>Status</th>
                            <th>Departemen</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($employees as $employee)
                        <tr>
                            <td>{{ $employee->nama_lengkap }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->nomor_telepon }}</td>
                            <td>{{ $employee->tanggal_lahir }}</td>
                            <td>{{ $employee->alamat }}</td>
                            <td>{{ $employee->tanggal_masuk }}</td>
                            <td class="text-center">
                                <span class="badge {{ $employee->status === 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($employee->status) }}
                                </span>
                            </td>
                            <td>{{ $employee->departement->nama_departemen ?? '-' }}</td>
                            <td>{{ $employee->position->nama_jabatan ?? '-' }}</td>
                            <td>
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm text-white">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pegawai ini?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center text-muted py-4">
                                <i class="bi bi-exclamation-circle"></i> Tidak ada data pegawai.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- 🔹 Pagination --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $employees->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
