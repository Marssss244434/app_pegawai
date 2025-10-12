<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Emploee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('employee')->latest()->get();
        return view('attendance.index', compact('attendances'));
        // console.log($attendances);
    }

    public function create()
    {
        $employees = Emploee::all();
        return view('attendance.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'tanggal' => 'required|date',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ]);

        Attendance::create($request->all());
        return redirect()->route('attendance.index')->with('success', 'Data absensi berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        Attendance::findOrFail($id)->delete();
        return redirect()->route('attendance.index')->with('success', 'Data absensi berhasil dihapus!');
    }
}
