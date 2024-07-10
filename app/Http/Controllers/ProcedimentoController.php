<?php

namespace App\Http\Controllers;

use App\Models\Procedimento;
use Illuminate\Http\Request;

class ProcedimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procedimento = Procedimento::all();
        return response()->json(['procedimento' => $procedimento], 200);
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
            'proc_nome' => 'required|string|max:255',
            'proc_valor' => 'required|string|max:255'
        ]);

        $procedimento = Procedimento::create([
            'proc_nome' => $request->proc_nome,
            'proc_valor' => $request->proc_valor
        ]);

        return response()->json(['procedimento' => $procedimento], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $procedimento = Procedimento::findOrFail($id);
        return response()->json(['procedimento' => $procedimento], 200);
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
            'proc_nome' => 'required|string|max:255',
            'proc_valor' => 'required|string|max:255'
        ]);

        $procedimento = Procedimento::findOrFail($id);
        $procedimento->update([
            'proc_nome' => $request->proc_nome,
            'proc_valor' => $request->proc_valor
        ]);

        return response()->json(['procedimento' => $procedimento], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $procedimento = Procedimento::findOrFail($id);
        $procedimento->delete();

        return response()->json(['message' => 'Relação Paciente-Plano de Saúde deletada com sucesso'], 200);
    }
}
