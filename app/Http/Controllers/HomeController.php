<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Animal;
use App\Http\Requests;
use App\Peso;
use App\Corral;
use App\Galpon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $animal = Animal::all();
        $animal->each(function($animales){
            $animales->corral->galpon;
            $animales->corral;
            $animales->pesos;
            $animales->users;

        });
        $galpones = Galpon::all();
        $cantidadgalpones = $galpones->count();
        $promediogalpones = new Collection();
        $primerpromediogalpones = new Collection();
        $numerogalpones = new Collection();
        foreach ($galpones as $galpon){
            $numerogalpones->push($galpon->numero());
            $ultimaestadistica = $galpon->estadisticasgalpones->take(-1);
            $primeraestadistica = $galpon->estadisticasgalpones->take(1);
            foreach ($primeraestadistica as $primera){
                $primerpromediogalpones->push($primera->pesaje_promedio);
            }
            foreach ($ultimaestadistica as $ultima){
                $promediogalpones->push($ultima->pesaje_promedio);
            }
        }
        $corrales = Corral::all();
        $cantidadenfermos = new Collection();
        $cantidadmuertos = new Collection();
        foreach ($corrales as $corral){
            $cantidadenfermos->push($corral->estadisticascorrales->pop());
            $cantidadmuertos->push($corral->estadisticascorrales->pop());

        }
        $masmuertos = $cantidadenfermos->sortBy('cantidad_muertos')->last();
        $masenfermos = $cantidadenfermos->sortBy('cantidad_enfermos')->last();

        if ($masenfermos != null)
        {
            $corralenfermos = Corral::findOrFail($masenfermos->id_corral);
            $maxenfermos = $masenfermos->cantidad_enfermos;
        }
        if ($masmuertos != null)
        {
            $corralmuertos = Corral::findOrFail($masmuertos->id_corral);
            $maxmuertos = $masmuertos->cantidad_muertos;
        }
        $cantidad = collect($animal)->count('id');
        $vivos = $animal->where("estado",'Vivo')->count();
        $muertos = $animal->where("estado",'Muerto')->count();
        $enfermos = $animal->where("estado",'Enfermo')->count();
        $vendidos = $animal->where("venta",1)->count();
        $minimo = $animal->where('venta',0)->sortBy('pesaje_actual')->first();
        $maximo = $animal->where('venta',0)->sortBy('pesaje_actual')->last();
        $promedio = $animal->avg('pesaje_actual');
        $aptos = $animal->filter(function ($item) {
            return $item['pesaje_actual'] > 599;
        });



        return view('home')->with('animal',$animal)
            ->with('promedio', $promedio)
            ->with('cantidad', $cantidad)
            ->with('vivos',$vivos)
            ->with('muertos',$muertos)
            ->with('aptos',$aptos)
            ->with('enfermos',$enfermos)
            ->with('minimo',$minimo)
            ->with('vendidos',$vendidos)
            ->with('maximo',$maximo)
            ->with('cantidadgalpones',$cantidadgalpones)
            ->with('numerogalpones',$numerogalpones)
            ->with('promediogalpones',$promediogalpones)
            ->with('primerpromediogalpones',$primerpromediogalpones)
            ->with('galpones',$galpones)
            ->with('maxenfermos', $maxenfermos)
            ->with('corralenfermos', $corralenfermos)
            ->with('maxmuertos', $maxmuertos)
            ->with('corralmuertos', $corralmuertos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function chart()
    {
        $animal = Animal::all();
        $pesos = $animal->pesos->list('pesaje');
        return view('home')->with('pesos', $pesos);
    }


}