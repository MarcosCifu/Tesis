<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Corral;
use App\EstadisticaCorral;
use App\Http\Requests;

class EstadisticasCorralesController extends Controller
{
    public function estadisticascorrales($id)
    {
        $corrales = Corral::find($id);
        $animales = $corrales->animals;
        $pesajepromedio = $animales->avg('pesaje_actual');
        $pesajemaximo = $animales->max('pesaje_actual');
        $pesajeminimo = $animales->min('pesaje_actual');
        $pesajetotal = $animales->sum('pesaje_actual');
        $estadisticas = New EstadisticaCorral();
        $estadisticas->id_corral = $corrales->id;
        $estadisticas->pesaje_promedio = $pesajepromedio;
        $estadisticas->pesaje_maximo = $pesajemaximo;
        $estadisticas->pesaje_minimo = $pesajeminimo;
        $estadisticas->pesaje_total = $pesajetotal;
        $estadisticas->fecha = Carbon::now()->toDateString();

        $estadisticas->save();
        return redirect()->route('admin.corrales.perfil',$corrales->id);
    }
}
