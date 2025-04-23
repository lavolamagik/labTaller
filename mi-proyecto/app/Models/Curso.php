<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'profesor',
        'estado',
        'curso',
        'oficina',
        'desde',
        'hasta'
    ];
}