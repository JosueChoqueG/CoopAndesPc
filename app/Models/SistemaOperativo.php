<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SistemaOperativo extends Model
{
    protected $table = 'sistema_operativo';
    protected $primaryKey = 'id_so';
    public $timestamps = false;

    protected $fillable = ['nombre_so', 'edicion', 'version'];

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'id_so', 'id_so');
    }
}