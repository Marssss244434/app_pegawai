@extends('master')
@section('title', 'Tambah Absensi')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="bi bi-clipboard-plus"></i> Form Tambah Absensi</h4>
        </div>
        <div class="card-body">
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

            <form action="{{ route('attendance.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="karyawan_id" class="form-label">Pegawai</label>
                    <select id="karyawan_id" name="karyawan_id" class="form-select" required>
                        <option value="">-- Pilih Pegawai --</option>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}">{{ $emp->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="waktu_masuk" class="form-label">Waktu Masuk</label>
                        <input type="time" name="waktu_masuk" id="waktu_masuk" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="waktu_keluar" class="form-label">Waktu Keluar</label>
                        <input type="time" name="waktu_keluar" id="waktu_keluar" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="status_absensi" class="form-label">Status</label>
                    <select id="status_absensi" name="status_absensi" class="form-select" required>
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="sakit">Sakit</option>
                        <option value="alpha">Alpha</option>
                    </select>
                </div>

                <div class="text-end">
                    <a href="{{ route('attendance.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
