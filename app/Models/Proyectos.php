<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    protected $table = 'proyectos';

    protected $fillable = ['nombre', 'fecha', 'estado', 'materia_id'];

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

}
