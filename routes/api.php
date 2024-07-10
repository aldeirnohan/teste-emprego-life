<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PlanoSaudeController;
use App\Http\Controllers\ProcedimentoController;
use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\PacientePlanoSaudeController;
use App\Http\Controllers\ConsultaProcedimentoController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'me']);
    Route::group(['prefix' => 'paciente'], function() {
        Route::get('/', [PacienteController::class, 'index'])->name('index');
        Route::post('/', [PacienteController::class, 'store'])->name('store');
        Route::get('/{id}', [PacienteController::class, 'show'])->name('show');
        Route::get('/showPlanos/{id}', [PacienteController::class, 'showPlanos'])->name('showPlanos');
        Route::put('/{id}', [PacienteController::class, 'update'])->name('update');
        Route::delete('/{id}', [PacienteController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => 'planoSaude'], function() {
        Route::get('/', [PlanoSaudeController::class, 'index'])->name('index');
        Route::post('/', [PlanoSaudeController::class, 'store'])->name('store');
        Route::get('/{id}', [PlanoSaudeController::class, 'show'])->name('show');
        Route::get('/showPacientes/{id}', [PlanoSaudeController::class, 'showPacientes'])->name('showPacientes');
        Route::put('/{id}', [PlanoSaudeController::class, 'update'])->name('update');
        Route::delete('/{id}', [PlanoSaudeController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => 'pacientePlanoSaude'], function() {
        Route::get('/', [PacientePlanoSaudeController::class, 'index'])->name('index');
        Route::post('/', [PacientePlanoSaudeController::class, 'store'])->name('store');
        Route::get('/{id}', [PacientePlanoSaudeController::class, 'show'])->name('show');
        Route::put('/{id}', [PacientePlanoSaudeController::class, 'update'])->name('update');
        Route::delete('/{id}', [PacientePlanoSaudeController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => 'procedimento'], function() {
        Route::get('/', [ProcedimentoController::class, 'index'])->name('index');
        Route::post('/', [ProcedimentoController::class, 'store'])->name('store');
        Route::get('/{id}', [ProcedimentoController::class, 'show'])->name('show');
        Route::put('/{id}', [ProcedimentoController::class, 'update'])->name('update');
        Route::delete('/{id}', [ProcedimentoController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => 'especialidade'], function() {
        Route::get('/', [EspecialidadeController::class, 'index'])->name('index');
        Route::post('/', [EspecialidadeController::class, 'store'])->name('store');
        Route::get('/{id}', [EspecialidadeController::class, 'show'])->name('show');
        Route::put('/{id}', [EspecialidadeController::class, 'update'])->name('update');
        Route::delete('/{id}', [EspecialidadeController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => 'medico'], function() {
        Route::get('/', [MedicoController::class, 'index'])->name('index');
        Route::post('/', [MedicoController::class, 'store'])->name('store');
        Route::get('/{id}', [MedicoController::class, 'show'])->name('show');
        Route::put('/{id}', [MedicoController::class, 'update'])->name('update');
        Route::delete('/{id}', [MedicoController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => 'consulta'], function() {
        Route::get('/', [ConsultaController::class, 'index'])->name('index');
        Route::post('/', [ConsultaController::class, 'store'])->name('store');
        Route::get('/{id}', [ConsultaController::class, 'show'])->name('show');
        Route::get('/showProcedimentos/{id}', [ConsultaController::class, 'showProcedimentos'])->name('showProcedimentos');
        Route::put('/{id}', [ConsultaController::class, 'update'])->name('update');
        Route::delete('/{id}', [ConsultaController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => 'consultaProcedimento'], function() {
        Route::get('/', [ConsultaProcedimentoController::class, 'index'])->name('index');
        Route::post('/', [ConsultaProcedimentoController::class, 'store'])->name('store');
        Route::get('/{id}', [ConsultaProcedimentoController::class, 'show'])->name('show');
        Route::put('/{id}', [ConsultaProcedimentoController::class, 'update'])->name('update');
        Route::delete('/{id}', [ConsultaProcedimentoController::class, 'destroy'])->name('destroy');
    });
});
