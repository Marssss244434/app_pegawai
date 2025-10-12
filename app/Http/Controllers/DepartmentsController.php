<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('Departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:100|unique:departments,nama_departemen',
        ]);

        Department::create($request->all());

        return redirect()->route('departments.index')->with('success', 'Departemen berhasil ditambahkan!');
    }


    public function show(Department $department)
    {return view('departments.show', compact('department'));}


    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:100|unique:departments,nama_departemen,' . $department->id,
        ]);

        $department->update($request->all());

        return redirect()->route('departments.index')->with('success', 'Departemen berhasil diperbarui!');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Departemen berhasil dihapus!');
    }
}
