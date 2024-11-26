<?php

namespace App\Http\Controllers;

use App\Models\Brayan;
use Illuminate\Http\Request;

class BrayanController extends Controller
{
    // Mostrar todos los registros
    public function index()
    {
        $brayans = Brayan::all();
        return response()->json($brayans);
    }

    // Mostrar un registro específico
    public function show($id)
    {
        $brayan = Brayan::find($id);

        if (!$brayan) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json($brayan);
    }

    // Crear un nuevo registro
    public function store(Request $request)
    {
        $validated = $request->validate([
            'campo1' => 'required|string|max:255', // Cambia 'campo1' por los nombres reales de tus columnas
            'campo2' => 'required|numeric',       // Agrega validaciones según tus necesidades
        ]);

        $brayan = Brayan::create($validated);

        return response()->json(['message' => 'Registro creado exitosamente', 'data' => $brayan], 201);
    }

    // Actualizar un registro existente
    public function update(Request $request, $id)
    {
        $brayan = Brayan::find($id);

        if (!$brayan) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $validated = $request->validate([
            'campo1' => 'sometimes|string|max:255', // Cambia 'campo1' por los nombres reales de tus columnas
            'campo2' => 'sometimes|numeric',
        ]);

        $brayan->update($validated);

        return response()->json(['message' => 'Registro actualizado exitosamente', 'data' => $brayan]);
    }

   
}
