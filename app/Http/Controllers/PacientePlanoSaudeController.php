<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PacientePlanoSaude;

class PacientePlanoSaudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pps = PacientePlanoSaude::all();
        return response()->json(['pps' => $pps], 200);
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
            'pac_codigo' => 'required|exists:paciente,pac_codigo',
            'plano_codigo' => 'required|exists:plano_saude,plano_codigo',
            'pps_nrContrato' => 'required|string|max:255'
        ]);

        $pps = PacientePlanoSaude::create([
            'pac_codigo' => $request->pac_codigo,
            'plano_codigo' => $request->plano_codigo,
            'pps_nrContrato' => $request->pps_nrContrato
        ]);

        return response()->json(['pps' => $pps], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pps = PacientePlanoSaude::findOrFail($id);
        return response()->json(['pps' => $pps], 200);
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
            'pac_codigo' => 'required|exists:paciente,pac_codigo',
            'plano_codigo' => 'required|exists:plano_saude,plano_codigo',
            'pps_nrContrato' => 'required|string|max:255'
        ]);

        $pps = PacientePlanoSaude::findOrFail($id);
        $pps->update([
            'pac_codigo' => $request->pac_codigo,
            'plano_codigo' => $request->plano_codigo,
            'pps_nrContrato' => $request->pps_nrContrato
        ]);

        return response()->json(['pps' => $pps], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pps = PacientePlanoSaude::findOrFail($id);
        $pps->delete();

        return response()->json(['message' => 'Relação Paciente-Plano de Saúde deletada com sucesso'], 200);
    }
}
