<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galpon;
use App\EstadisticaGalpon;
use Carbon\Carbon;
use App\Http\Requests;

class EstadisticasGalponesController extends Controller
{
    public function estadisticasgalpones($id){
        $galpon = Galpon::find($id);
        $corrales = $galpon->corrales;
        $cantidadcorrales = $corrales->count('id');
        $promedio = 0;
        foreach ($corrales as $corral){
            $ultimaestadistica = $corral->estadisticascorrales->take(-1);
            foreach ($ultimaestadistica as $ultima){
                $promedio += $ultima->pesaje_promedio;
            }
        }
        if ($cantidadcorrales > 0){
            $promedio = $promedio/$cantidadcorrales;
        }
        $estadisticas = New EstadisticaGalpon();
        $estadisticas->id_galpon = $galpon->id;
        $estadisticas->pesaje_promedio = $promedio;
        $estadisticas->fecha = Carbon::now()->toDateString();
        $estadisticas->save();
        return redirect()->route('admin.galpones.perfil',$galpon->id);

    }
}
