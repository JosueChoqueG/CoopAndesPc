<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    protected $table = 'agencia';
    protected $primaryKey = 'id_agencia';
    public $timestamps = false;

    protected $fillable = ['codigo_agencia', 'nombre_agencia'];

    public function oficinas()
    {
        return $this->hasMany(Oficina::class, 'id_agencia', 'id_agencia');
    }
}
