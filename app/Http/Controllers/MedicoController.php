<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::all();
        return response()->json(['medicos' => $medicos], 200);
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
            'med_nome' => 'required|string|max:255',
            'med_crm' => 'required|string|max:20',
            'espec_codigo' => 'required|exists:especialidade,espec_codigo'
        ]);

        $medico = Medico::create([
            'med_nome' => $request->med_nome,
            'med_crm' => $request->med_crm,
            'espec_codigo' => $request->espec_codigo
        ]);

        return response()->json(['medico' => $medico], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medico = Medico::findOrFail($id);
        $medico->load('especialidade');
        return response()->json(['medico' => $medico], 200);
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
            'med_nome' => 'required|string|max:255',
            'med_crm' => 'required|string|max:20',
            'espec_codigo' => 'required|exists:especialidade,espec_codigo'
        ]);

        $medico = Medico::findOrFail($id);
        $medico->update([
            'med_nome' => $request->med_nome,
            'med_crm' => $request->med_crm,
            'espec_codigo' => $request->espec_codigo
        ]);

        return response()->json(['medico' => $medico], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medico = Medico::findOrFail($id);
        $medico->delete();

        return response()->json(['message' => 'Médico deletado com sucesso'], 200);
    }
}
