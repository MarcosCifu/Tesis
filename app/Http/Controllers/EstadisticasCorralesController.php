<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
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
        $animalesenfermos = $corrales->animalesenfermos;

        $tiposenfermos = new Collection();
        $tiposenfermos->push($animalesenfermos->where('tipo','Vaca'));
        $tiposenfermos->push($animalesenfermos->where('tipo','Novillo'));
        $tiposenfermos->push($animalesenfermos->where('tipo','Vaquilla'));
        $tiposenfermos->push($animalesenfermos->where('tipo','Ternero'));
        $tiposenfermos->push($animalesenfermos->where('tipo','Ternera'));
        $animales = $corrales->animals;
        $promedio = 0;
        $pesajes = new Collection();
        foreach ($animales as $animal){
            $ultimaestadistica = $animal->estadisticasanimales->take(-1);
            $ultimopeso = $animal->pesos->take(-1);
            foreach ($ultimopeso as $ultimo){
                $promedio += $ultimo->pesaje/$animales->count();
                $pesajes->push($ultimo->pesaje);
            }
        }
        $pesajepromedio = $promedio;
        $pesajemaximo = $pesajes->max();
        $pesajeminimo = $pesajes->min();
        $pesajetotal = $animales->sum('pesaje_actual');
        $gananciapeso = $animales->sum('gananciaPeso_actual');
        $estadisticas = New EstadisticaCorral();
        $estadisticas->id_corral = $corrales->id;
        if($pesajepromedio == null){
            $pesajepromedio = 0;
        }
        if($pesajemaximo == null){
            $pesajemaximo = 0;
        }
        if($pesajeminimo == null){
            $pesajeminimo = 0;
        }
        $estadisticas->pesaje_promedio = $pesajepromedio;
        $estadisticas->pesaje_maximo = $pesajemaximo;
        $estadisticas->pesaje_minimo = $pesajeminimo;
        $estadisticas->pesaje_total = $pesajetotal;
        $estadisticas->cantidad_enfermos = $corrales->estadoanimales();
        $estadisticas->cantidad_muertos = $corrales->estadoanimalesmuertos();
        $estadisticas->fecha = Carbon::now()->toDateString();
        $estadisticas->ganancia_peso = $gananciapeso;
        $estadisticas->save();
        return redirect()->route('admin.corrales.perfil',$corrales->id);
    }
}
