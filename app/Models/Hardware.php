<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    protected $table = 'hardware';
    protected $primaryKey = 'id_hardware';
    public $timestamps = false;

    protected $fillable = ['procesador', 'ram_gb', 'almacenamiento_gb', 'tipo_almacenamiento'];

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'id_hardware', 'id_hardware');
    }
}