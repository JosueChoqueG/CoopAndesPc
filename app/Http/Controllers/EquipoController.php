<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agencia;
use App\Models\Oficina;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\TipoEquipo;
use App\Models\Hardware;
use App\Models\SistemaOperativo;
use App\Models\Responsable;
use App\Models\Equipo;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::with([
            'oficina.agencia', 'tipo', 'hardware', 'modelo.marca', 'so', 'responsable'
        ])->get();

        return view('equipos.index', compact('equipos'));
    }

    public function create()
    {
        $agencias = Agencia::all();
        $oficinas = Oficina::all();
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $tipos = TipoEquipo::all();
        $hardwares = Hardware::all();
        $sistemas = SistemaOperativo::all();
        $responsables = Responsable::all();

        return view('equipos.create', compact(
            'agencias', 'oficinas', 'marcas', 'modelos',
            'tipos', 'hardwares', 'sistemas', 'responsables'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_dispositivo' => 'required|string|max:100',
            'numero_serie' => 'nullable|string|unique:equipo',
            'id_oficina' => 'required|exists:oficina,id_oficina',
            'id_tipo' => 'required|exists:tipo_equipo,id_tipo',
            'id_hardware' => 'required|exists:hardware,id_hardware',
            'id_modelo' => 'required|exists:modelo,id_modelo',
            'id_so' => 'required|exists:sistema_operativo,id_so',
            'id_responsable' => 'required|exists:responsable,id_responsable',
        ]);

        Equipo::create($request->all());

        return redirect()->route('equipos.index')->with('success', 'Equipo creado correctamente.');
    }

    public function edit(Equipo $equipo)
    {
        $agencias = Agencia::all();
        $oficinas = Oficina::all();
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $tipos = TipoEquipo::all();
        $hardwares = Hardware::all();
        $sistemas = SistemaOperativo::all();
        $responsables = Responsable::all();

        return view('equipos.edit', compact(
            'equipo', 'agencias', 'oficinas', 'marcas', 'modelos',
            'tipos', 'hardwares', 'sistemas', 'responsables'
        ));
    }

    public function update(Request $request, Equipo $equipo)
    {
        $request->validate([
            'nombre_dispositivo' => 'required|string|max:100',
            'numero_serie' => 'nullable|string|unique:equipo,numero_serie,' . $equipo->id_equipo . ',id_equipo',
            'id_oficina' => 'required|exists:oficina,id_oficina',
            'id_tipo' => 'required|exists:tipo_equipo,id_tipo',
            'id_hardware' => 'required|exists:hardware,id_hardware',
            'id_modelo' => 'required|exists:modelo,id_modelo',
            'id_so' => 'required|exists:sistema_operativo,id_so',
            'id_responsable' => 'required|exists:responsable,id_responsable',
        ]);

        $equipo->update($request->all());

        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado.');
    }

    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado.');
    }
}