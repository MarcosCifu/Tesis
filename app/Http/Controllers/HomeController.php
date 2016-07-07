<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Http\Requests;
use App\Peso;
use App\Corral;
use App\Galpon;

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

        $pesos = Peso::all();
        $cantidad = collect($animal)->count('id');
        $promedio = collect($pesos)->avg('pesaje');
        $vivos = $animal->where("estado",'Vivo')->count();
        $muertos = $animal->where("estado",'Muerto')->count();
        $enfermos = $animal->where("estado",'Enfermo')->count();
        $minimo = $pesos->min('pesaje');
        $maximo = $pesos->max('pesaje');
        $pesosnoapto = Peso::where('pesaje','<', 450)->groupBy('created_at')->orderBy('fecha', 'ASC')->lists('pesaje');
        $galpones = Galpon::groupBy('numero')->lists('numero');

        return view('home')->with('animal',$animal)->with('promedio', $promedio)->with('cantidad', $cantidad)
            ->with('vivos',$vivos)->with('muertos',$muertos)->with('enfermos',$enfermos)
           ->with('minimo',$minimo)->with('maximo',$maximo)->with('pesosnoapto', $pesosnoapto)
            ->with('galpones',$galpones);
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