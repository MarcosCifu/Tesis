<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Http\Requests;
use App\Peso;

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
        $pesos = Peso::all();
        $cantidad = collect($animal)->count('id');
        $promedio = collect($pesos)->avg('pesaje');
        $vivos = Animal::where("estado",'vivo')->count();
        $muertos = Animal::where("estado",'muerto')->count();
        $enfermos = Animal::where("estado",'enfermo')->count();

        return view('home')->with('promedio', $promedio)->with('cantidad', $cantidad)->with('vivos',$vivos)->with('muertos',$muertos)->with('enfermos',$enfermos);
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