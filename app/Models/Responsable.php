<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $table = 'responsable';
    protected $primaryKey = 'id_responsable';
    public $timestamps = false;

    protected $fillable = ['nombre_responsable', 'cargo', 'correo'];

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'id_responsable', 'id_responsable');
    }
}
