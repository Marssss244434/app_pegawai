@extends('master')

@section('title', 'Detail Posisi')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0"><i class="bi bi-card-text"></i> Detail Posisi</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 200px;">ID</th>
                    <td>{{ $position->id }}</td>
                </tr>
                <tr>
                    <th>Nama Jabatan</th>
                    <td>{{ $position->nama_jabatan }}</td>
                </tr>
                <tr>
                    <th>Gaji Pokok</th>
                    <td>Rp {{ number_format($position->gaji_pokok, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Dibuat</th>
                    <td>{{ $position->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('positions.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
