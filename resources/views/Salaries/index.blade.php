@extends('master')

@section('title', 'Data Gaji Karyawan')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Data Gaji Karyawan</h2>
        <a href="{{ route('salaries.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Data
        </a>
    </div>

    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Tabel Data Gaji --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nama Karyawan</th>
                        <th>Bulan</th>
                        <th>Gaji Pokok</th>
                        <th>Tunjangan</th>
                        <th>Potongan</th>
                        <th>Total Gaji</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salaries as $salary)
                        <tr class="text-center">
                            <td>{{ $salary->id }}</td>
                            <td>{{ $salary->emploees->nama_lengkap ?? 'Tidak ada' }}</td>
                            <td>{{ $salary->bulan }}</td>
                            <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                            <td><strong>Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</strong></td>
                            <td>
                                <a href="{{ route('salaries.show', $salary->id) }}" class="btn btn-sm btn-info text-white">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $salaries->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
