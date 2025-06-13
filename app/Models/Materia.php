<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materias';
    protected $fillable = ['nombre'];

    public function tareas()
    {
        return $this->hasMany(Tareas::class);
    }

    public function proyectos()
    {
        return $this->hasMany(Proyectos::class);
    }
}
