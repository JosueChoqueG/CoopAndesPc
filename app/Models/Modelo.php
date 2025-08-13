<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = 'modelo';
    protected $primaryKey = 'id_modelo';
    public $timestamps = false;

    protected $fillable = ['nombre_modelo', 'id_marca'];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'id_marca', 'id_marca');
    }

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'id_modelo', 'id_modelo');
    }
}