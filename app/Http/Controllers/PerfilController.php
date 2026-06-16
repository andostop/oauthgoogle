<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function show($id)
    {
        $perfil = Perfil::where('usuario_id', $id)->first();

        if (!$perfil) {
            return response()->json([
                'mensaje' => 'Perfil no encontrado'
            ], 404);
        }

        return response()->json($perfil);
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|integer',
            'bio' => 'required|string',
            'carrera' => 'required|string',
            'ciclo' => 'required|integer'
        ]);
    
        $perfil = Perfil::create([
            'usuario_id' => $request->usuario_id,
            'bio' => $request->bio,
            'carrera' => $request->carrera,
            'ciclo' => $request->ciclo,
            'habilidades' => $request->habilidades,
            'disponibilidad' => $request->disponibilidad,
            'foto_url' => $request->foto_url
        ]);

        return response()->json([
            'mensaje' => 'Perfil creado correctamente',
            'perfil' => $perfil
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bio' => 'required|string',
            'carrera' => 'required|string',
            'ciclo' => 'required|integer'
        ]);
    
        $perfil = Perfil::where('usuario_id', $id)->first();

        if (!$perfil) {
            return response()->json([
                'mensaje' => 'Perfil no encontrado'
            ], 404);
        }

        $perfil->update([
            'bio' => $request->bio,
            'carrera' => $request->carrera,
            'ciclo' => $request->ciclo,
            'habilidades' => $request->habilidades,
            'disponibilidad' => $request->disponibilidad,
            'foto_url' => $request->foto_url
        ]);

        return response()->json([
            'mensaje' => 'Perfil actualizado correctamente',
            'perfil' => $perfil
        ]);
    }

}