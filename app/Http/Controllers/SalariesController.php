<?php

namespace App\Http\Controllers;

use App\Models\Salaries;
use App\Models\Emploee;
use Illuminate\Http\Request;

class SalariesController extends Controller
{
    // tampilkan daftar gaji
    public function index()
    {
        $salaries = Salaries::with('emploees')->latest()->paginate(10);
        return view('salaries.index', compact('salaries'));
    }

    // form input gaji
    public function create()
    {
        $employees = Emploee::all();
        return view('salaries.create', compact('employees'));
    }

    // simpan data gaji
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:emploees,id',
            'bulan'       => 'required|string|max:10',
            'gaji_pokok'  => 'required|numeric',
            'tunjangan'   => 'nullable|numeric',
            'potongan'    => 'nullable|numeric',
        ]);

        $total = $request->gaji_pokok + ($request->tunjangan ?? 0) - ($request->potongan ?? 0);

        Salaries::create([
            'karyawan_id' => $request->karyawan_id,
            'bulan'       => $request->bulan,
            'gaji_pokok'  => $request->gaji_pokok,
            'tunjangan'   => $request->tunjangan ?? 0,
            'potongan'    => $request->potongan ?? 0,
            'total_gaji'  => $total,
        ]);

        return redirect()->route('salaries.index')->with('success', 'Slip gaji berhasil ditambahkan!');
    }

    // tampilkan detail gaji
    public function show($id)
    {
        $salary = Salaries::with('emploees')->findOrFail($id);
        return view('salaries.show', compact('salary'));
    }

    // hapus data gaji
    public function destroy(Salaries $salaries)
    {
        $salaries->delete();
        return redirect()->route('salaries.index')->with('success', 'Data Gaji Karyawan Telah dihapus');
    }
}
