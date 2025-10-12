<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments'; // nama tabel

    protected $fillable = ['nama_departemen']; // field yang bisa diisi mass-assignment
}
