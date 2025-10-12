@extends('master')

@section('title', 'Detail Gaji Karyawan')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0"><i class="bi bi-card-text"></i> Detail Gaji Karyawan</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 200px;">ID</th>
                    <td>{{ $salary->id }}</td>
                </tr>
                <tr>
                    <th>Nama Karyawan</th>
                    <td>{{ $salary->employee->nama_lengkap ?? 'Tidak ada' }}</td>
                </tr>
                <tr>
                    <th>Bulan</th>
                    <td>{{ $salary->bulan }}</td>
                </tr>
                <tr>
                    <th>Gaji Pokok</th>
                    <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Tunjangan</th>
                    <td>Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Potongan</th>
                    <td>Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Total Gaji</th>
                    <td><strong>Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</strong></td>
                </tr>
                <tr>
                    <th>Tanggal Dibuat</th>
                    <td>{{ $salary->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('salaries.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Kembali ke Daftar Gaji
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
