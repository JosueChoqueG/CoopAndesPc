<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    protected $table = 'oficina';
    protected $primaryKey = 'id_oficina';
    public $timestamps = false;

    protected $fillable = ['nombre_oficina', 'ubicacion_equipo', 'id_agencia'];

    public function agencia()
    {
        return $this->belongsTo(Agencia::class, 'id_agencia', 'id_agencia');
    }

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'id_oficina', 'id_oficina');
    }
}