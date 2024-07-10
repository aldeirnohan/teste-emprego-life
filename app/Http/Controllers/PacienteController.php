<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return response()->json(['pacientes' => $pacientes], 200);
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
            'pac_nome' => 'required|string|max:255',
            'pac_dataNascimento' => 'required|date',
            'pac_telefones' => 'required|array'
        ]);

        $paciente = Paciente::create([
            'pac_nome' => $request->pac_nome,
            'pac_dataNascimento' => $request->pac_dataNascimento,
            'pac_telefones' => $request->pac_telefones
        ]);

        return response()->json(['paciente' => $paciente], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return response()->json(['paciente' => $paciente], 200);
    }

    public function showPlanos($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->load('planoSaudes');
        return response()->json(['paciente' => $paciente], 200);
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
            'pac_nome' => 'required|string|max:255',
            'pac_dataNascimento' => 'required|date',
            'pac_telefones' => 'required|array'
        ]);

        $paciente = Paciente::findOrFail($id);
        $paciente->update([
            'pac_nome' => $request->pac_nome,
            'pac_dataNascimento' => $request->pac_dataNascimento,
            'pac_telefones' => $request->pac_telefones
        ]);

        return response()->json(['paciente' => $paciente], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();

        return response()->json(['message' => 'Paciente deletado com sucesso'], 200);
    }
}
