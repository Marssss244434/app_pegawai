<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emploee;
use App\Models\Department;
use App\Models\Position;

class EmployeeController extends Controller
{
    /**
     * Tampilkan daftar pegawai.
     */
    public function index()
    {
        $employees = Emploee::with(['departement', 'position'])->latest()->paginate(5);
        return view('employees.index', compact('employees'));
    }

    /**
     * Tampilkan form tambah pegawai baru.
     */
    public function create()
    {
        $employee = Emploee::all();
        $departements = Department::all();
        $positions = Position::all();
        return view('employees.create', compact('departements', 'positions', 'employee'));
    }

    /**
     * Simpan data pegawai baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'nomor_telepon'  => 'required|string|max:20',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required|string|max:255',
            'tanggal_masuk'  => 'required|date',
            'status'         => 'required|in:aktif,nonaktif',
            'departemen_id'  => 'required|exists:departments,id',
            'jabatan_id'     => 'required|exists:positions,id',
        ]);

        Emploee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Data pegawai berhasil disimpan!');
    }

    /**
     * Tampilkan detail pegawai.
     */
    public function show(string $id)
    {
        $employee = Emploee::with(['departement', 'position'])->findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    /**
     * Tampilkan form edit pegawai.
     */
    public function edit(string $id)
    {
        $employee = Emploee::findOrFail($id);
        $departements = Department::all();
        $positions = Position::all();
        return view('employees.edit', compact('employee', 'departements', 'positions'));
    }

    /**
     * Update data pegawai.
     */



    public function update(Request $request, string $id)
{
    $request->validate([
        'nama_lengkap'   => 'required|string|max:255',
        'email'          => 'required|email|max:255',
        'nomor_telepon'  => 'required|string|max:20',
        'tanggal_lahir'  => 'required|date',
        'alamat'         => 'required|string|max:255',
        'tanggal_masuk'  => 'required|date',
        'status'         => 'required|in:aktif,nonaktif',
        'departemen_id'  => 'required|exists:departments,id',
        'jabatan_id'     => 'required|exists:positions,id',

        
    ]);

    $employee = Emploee::findOrFail($id);
    $employee->update($request->all());

    return redirect()->route('employees.index')->with('success', 'Data pegawai berhasil diperbarui!');
}
    /**
     * Hapus data pegawai.
     */
    public function destroy(string $id)
    {
        $employee = Emploee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Data pegawai berhasil dihapus!');
    }
}
