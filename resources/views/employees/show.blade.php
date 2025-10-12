@extends('master')

@section('title', 'Detail Pegawai')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0 text-center">👤 Detail Pegawai</h4>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th style="width: 25%">Nama Lengkap</th>
                    <td>{{ $employee->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $employee->email }}</td>
                </tr>
                <tr>
                    <th>Nomor Telepon</th>
                    <td>{{ $employee->nomor_telepon }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d M Y') }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $employee->alamat }}</td>
                </tr>
                <tr>
                    <th>Tanggal Masuk</th>
                    <td>{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d M Y') }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if($employee->status == 'aktif')
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Departemen</th>
                    <td>{{ $employee->departement->nama_departemen ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td>{{ $employee->position->nama_jabatan ?? '-' }}</td>
                </tr>
            </table>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                    ← Kembali ke Daftar Pegawai
                </a>

                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning text-white">
                    ✏️ Edit Pegawai
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
