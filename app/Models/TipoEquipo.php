<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEquipo extends Model
{
    protected $table = 'tipo_equipo';
    protected $primaryKey = 'id_tipo';
    public $timestamps = false;

    protected $fillable = ['nombre_tipo'];

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'id_tipo', 'id_tipo');
    }
}