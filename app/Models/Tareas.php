<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    protected $table = 'tareas';
    protected $fillable = ['nombre', 'fecha', 'estado', 'materia_id'];

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }
}
