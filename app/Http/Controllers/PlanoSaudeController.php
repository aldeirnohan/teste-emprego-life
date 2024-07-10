<?php

namespace App\Http\Controllers;

use App\Models\PlanoSaude;
use Illuminate\Http\Request;

class PlanoSaudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planos = PlanoSaude::all();
        return response()->json(['planos' => $planos], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'plano_descricao' => 'required|string|max:255',
            'plano_telefone' => 'required|string|max:20',
        ]);

        $plano = PlanoSaude::create([
            'plano_descricao' => $request->plano_descricao,
            'plano_telefone' => $request->plano_telefone,
        ]);

        return response()->json(['plano' => $plano], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plano = PlanoSaude::findOrFail($id);
        return response()->json(['plano' => $plano], 200);
    }

    public function showPacientes($id)
    {
        $plano = PlanoSaude::findOrFail($id);
        $plano->load('pacientes');
        return response()->json(['plano' => $plano], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'plano_descricao' => 'required|string|max:255',
            'plano_telefone' => 'required|string|max:20',
        ]);

        $plano = PlanoSaude::findOrFail($id);
        $plano->update([
            'plano_descricao' => $request->plano_descricao,
            'plano_telefone' => $request->plano_telefone,
        ]);

        return response()->json(['plano' => $plano], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plano = PlanoSaude::findOrFail($id);
        $plano->delete();

        return response()->json(['message' => 'Plano de saúde deletado com sucesso'], 200);
    }
}
