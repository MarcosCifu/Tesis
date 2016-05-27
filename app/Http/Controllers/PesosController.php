<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peso;
use App\Animal;
use Carbon\Carbon;
use App\Http\Requests;
use Laracasts\Flash\Flash;

class PesosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesos = Peso::orderBy('id_animales')->paginate();
        $pesos->each(function($pesos){
            $pesos->animal;

        });
        return view('Pesos.index')->with('pesos',$pesos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animales = Animal::orderBy('DIIO', 'ASC')->lists('DIIO', 'id');
        $fecha = Carbon::now();

        return view('Pesos.create')
            ->with('animales', $animales)->with('fecha',$fecha);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peso = new Peso ($request->all());
        $peso->save();
        Flash::success('El pesaje del animal ' . $peso->animal->DIIO . ' ha sido registrado con exito!');
        return redirect()->route('admin.pesos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    
}
