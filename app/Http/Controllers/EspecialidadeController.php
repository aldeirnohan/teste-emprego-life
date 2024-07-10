<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidade;

class EspecialidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidade = Especialidade::all();
        return response()->json(['especialidade' => $especialidade], 200);
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
            'espec_nome' => 'required|string|max:255'
        ]);

        $especialidade = Especialidade::create([
            'espec_nome' => $request->espec_nome
        ]);

        return response()->json(['especialidade' => $especialidade], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $especialidade = Especialidade::findOrFail($id);
        return response()->json(['especialidade' => $especialidade], 200);
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
            'espec_nome' => 'required|string|max:255'
        ]);

        $especialidade = Especialidade::findOrFail($id);
        $especialidade->update([
            'espec_nome' => $request->espec_nome
        ]);

        return response()->json(['especialidade' => $especialidade], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $especialidade = Especialidade::findOrFail($id);
        $especialidade->delete();

        return response()->json(['message' => 'Relação Paciente-Plano de Saúde deletada com sucesso'], 200);
    }
}
