<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipo';
    protected $primaryKey = 'id_equipo';
    public $timestamps = false;

    protected $fillable = [
        'nombre_dispositivo', 'numero_serie', 'direccion_ip', 'fecha_adquisicion',
        'estado_equipo', 'fecha_mantenimiento', 'observacion', 'copias_seguridad',
        'depreciacion_anual', 'programas_instalados', 'licencias', 'vpn_cusco',
        'vpn_abancay', 'antivirus', 'id_oficina', 'id_tipo', 'id_hardware',
        'id_modelo', 'id_so', 'id_responsable'
    ];

    public function oficina()
    {
        return $this->belongsTo(Oficina::class, 'id_oficina', 'id_oficina');
    }

    public function tipo()
    {
        return $this->belongsTo(TipoEquipo::class, 'id_tipo', 'id_tipo');
    }

    public function hardware()
    {
        return $this->belongsTo(Hardware::class, 'id_hardware', 'id_hardware');
    }

    public function modelo()
    {
        return $this->belongsTo(Modelo::class, 'id_modelo', 'id_modelo');
    }

    public function so()
    {
        return $this->belongsTo(SistemaOperativo::class, 'id_so', 'id_so');
    }

    public function responsable()
    {
        return $this->belongsTo(Responsable::class, 'id_responsable', 'id_responsable');
    }

    public function agencia()
    {
        return $this->oficina->agencia;
    }
}