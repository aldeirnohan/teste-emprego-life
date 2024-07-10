<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ConsultaProcedimento;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultas = Consulta::all();
        $consultas->load('paciente');
        $consultas->load('medico');
        $consultas->load('pacientePlanoSaude');
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
            'cons_data' => 'required|date',
            'cons_hora' => 'required|date_format:H:i:s',
            'pac_codigo' => 'required|exists:paciente,pac_codigo',
            'med_codigo' => 'required|exists:medico,med_codigo',
            'pps_codigo' => 'exists:paciente_plano_saude,pps_codigo',
            'procedimentos' => 'array'
        ]);

        $consulta = Consulta::create([
            'cons_data' => $request->cons_data,
            'cons_hora' => $request->cons_hora,
            'pac_codigo' => $request->pac_codigo,
            'med_codigo' => $request->med_codigo,
            'pps_codigo' => $request->pps_codigo
        ]);

        $procedimentos = $request->procedimentos;

        $consultaProcedimento = [];

        if(isset($procedimentos)){
            foreach($procedimentos as $procedimento){
                $consultaProcedimento[] = ConsultaProcedimento::create([
                    'cons_codigo' => $consulta->cons_codigo,
                    'proc_codigo' => $procedimento
                ]);
            }
        }

        return response()->json(['consulta' => $consulta], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->load('paciente');
        $consulta->load('medico');
        $consulta->load('pacientePlanoSaude');
        return response()->json(['consulta' => $consulta], 200);
    }

    public function showProcedimentos($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->load('paciente');
        $consulta->load('medico');
        $consulta->load('pacientePlanoSaude');
        $consulta->load('procedimentos');
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
            'cons_data' => 'required|date',
            'cons_hora' => 'required|timestamp',
            'pac_codigo' => 'required|exists:paciente,pac_codigo',
            'med_codigo' => 'required|exists:paciente,med_codigo',
            'pps_codigo' => 'exists:pacientePlanoSaude,pps_codigo',
            'procedimentos' => 'array'
        ]);

        $consulta = Consulta::findOrFail($id);
        $consulta->update([
            'pac_nome' => $request->pac_nome,
            'pac_dataNascimento' => $request->pac_dataNascimento,
            'pac_telefones' => $request->pac_telefones
        ]);

        return response()->json(['consulta' => $consulta], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->delete();

        return response()->json(['message' => 'Consulta deletado com sucesso'], 200);
    }
}
