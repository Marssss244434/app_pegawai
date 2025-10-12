@extends('master')

@section('title', 'Detail Departemen')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Detail Departemen</h1>

    <table class="table table-bordered">
        <tr>
            <th style="width: 200px;">ID</th>
            <td>{{ $department->id }}</td>
        </tr>
        <tr>
            <th>Nama Departemen</th>
            <td>{{ $department->nama_departemen }}</td>
        </tr>
        <tr>
            <th>Dibuat Pada</th>
            <td>{{ $department->created_at->format('d-m-Y H:i') }}</td>
        </tr>
        <tr>
            <th>Diperbarui Pada</th>
            <td>{{ $department->updated_at->format('d-m-Y H:i') }}</td>
        </tr>
    </table>

    <div class="mt-3">
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
</div>
@endsection
