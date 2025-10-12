@extends('master')
@section('title', 'Tambah Data Gaji')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded-4">
        <h2 class="mb-4 text-center text-primary">Tambah Data Gaji</h2>

        <form action="{{ route('salaries.store') }}" method="POST">
            @csrf

            {{-- Pilih Karyawan --}}
            <div class="mb-3">
                <label for="karyawan_id" class="form-label">Karyawan:</label>
                <select id="karyawan_id" name="karyawan_id" class="form-select" required>
                    <option value="">-- Pilih Karyawan --</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Bulan --}}
            <div class="mb-3">
                <label for="bulan" class="form-label">Bulan:</label>
                <input type="date" name="bulan" id="bulan" class="form-control" required>
            </div>

            {{-- Gaji Pokok --}}
            <div class="mb-3">
                <label for="gaji_pokok" class="form-label">Gaji Pokok:</label>
                <input type="number" step="0.01" name="gaji_pokok" id="gaji_pokok" class="form-control" required>
            </div>

            {{-- Tunjangan --}}
            <div class="mb-3">
                <label for="tunjangan" class="form-label">Tunjangan:</label>
                <input type="number" step="0.01" name="tunjangan" id="tunjangan" class="form-control">
            </div>

            {{-- Potongan --}}
            <div class="mb-3">
                <label for="potongan" class="form-label">Potongan:</label>
                <input type="number" step="0.01" name="potongan" id="potongan" class="form-control">
            </div>

            {{-- Tombol Simpan --}}
            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
