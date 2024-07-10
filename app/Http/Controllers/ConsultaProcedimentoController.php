<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsultaProcedimento;

class ConsultaProcedimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultas = ConsultaProcedimento::all();
        $consultas->load('procedimento');
        $consultas->load('consulta');
        return response()->json(['consultas' => $consultas], 200);
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
            'cons_codigo' => 'required|exists:consulta,cons_codigo',
            'proc_codigo' => 'required|exists:procedimento,proc_codigo',
        ]);

        $consultaProcedimento = ConsultaProcedimento::create([
            'cons_codigo' => $request->cons_codigo,
            'proc_codigo' => $request->proc_codigo
        ]);

        return response()->json(['consultaProcedimento' => $consultaProcedimento], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta = ConsultaProcedimento::findOrFail($id);
        $consulta->load('procedimento');
        $consulta->load('consulta');
        return response()->json(['consulta' => $consulta], 200);
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
            'cons_codigo' => 'required|exists:consulta,cons_codigo',
            'proc_codigo' => 'required|exists:procedimento,proc_codigo',
        ]);

        $consultaProcedimento = ConsultaProcedimento::create([
            'cons_codigo' => $request->cons_codigo,
            'proc_codigo' => $request->proc_codigo
        ]);

        return response()->json(['consultaProcedimento' => $consultaProcedimento], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consultaProcedimento = ConsultaProcedimento::findOrFail($id);
        $consultaProcedimento->delete();

        return response()->json(['message' => 'procedimento da consulta deletado com sucesso'], 200);
    }
}
