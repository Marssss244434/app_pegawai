@extends('master')
@section('title', 'Data Absensi')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center"> Data Absensi Pegawai</h1>

    {{-- Tombol Tambah Absensi --}}
    <div class="text-end mb-3">
        <a href="{{ route('attendance.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Tambah Absensi
        </a>
    </div>

    {{-- Notifikasi Sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Tabel Absensi --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Tanggal</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Keluar</th>
                        <th>Status</th>
                        <th width="100">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendances as $index => $attendance)
                        <tr class="text-center">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $attendance->employee->nama_lengkap ?? '-' }}</td>
                            <td>{{ $attendance->tanggal }}</td>
                            <td>{{ $attendance->waktu_masuk ?? '-' }}</td>
                            <td>{{ $attendance->waktu_keluar ?? '-' }}</td>
                            <td>
                                @if($attendance->status_absensi == 'hadir')
                                    <span class="badge bg-success">Hadir</span>
                                @elseif($attendance->status_absensi == 'izin')
                                    <span class="badge bg-warning text-dark">Izin</span>
                                @else
                                    <span class="badge bg-danger">Alpa</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('attendance.destroy', $attendance->id) }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-3 text-muted">Belum ada data absensi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
