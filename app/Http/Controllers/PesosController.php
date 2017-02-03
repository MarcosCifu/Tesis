<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peso;
use App\Animal;
use Carbon\Carbon;
use App\EstadisticaAnimal;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Http\Requests\PesoRequest;

class PesosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesos = Peso::all();
        $animales = Animal::orderBy('DIIO', 'ASC')->lists('DIIO', 'id');
        $fecha = Carbon::now();
        return view('Pesos.index')->with('pesos',$pesos)
                                    ->with('animales', $animales)
                                    ->with('fecha',$fecha);
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
    public function store(PesoRequest $request)
    {
        $peso = new Peso ($request->all());
        $peso->save();
        $animal = Animal::find($peso->id_animales);
        $estadistica = new EstadisticaAnimal();
        $estadistica->id_animal = $request->id_animales;
        $estadistica->ganancia_peso = $peso->pesaje - $animal->pesaje_inicial;
        $estadistica->save();
        $animal->pesaje_actual = $peso->pesaje;
        $animal->gananciaPeso_actual = $estadistica->ganancia_peso;
        $animal->save();
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
        $peso = Peso::find($id);
        $animal = Animal::lists('DIIO','id');
        return view('Pesos.edit')->with('peso',$peso)->with('animal',$animal);
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
        $peso = Peso::find($id);
        $peso->fill($request->all());
        $peso->save();
        Flash::warning('El pesaje del animal ' . $peso->animal->DIIO . ' ha sido editado con exito!');
        return redirect()->route('admin.pesos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peso = Peso::find($id);
        $animal = $peso->animal;
        $primerpesoanimal = $animal->pesos->first();
        if($peso->id == $primerpesoanimal->id)
        {
            Flash::error('El peso del animal ' . $peso->animal->DIIO . ' no puede ser eliminado!');
            return redirect()->route('admin.pesos.index');
        }

        else{
            $peso->delete();
            Flash::error('El peso del animal ' . $peso->animal->DIIO . ' ha sido eliminado con exito!');
            $pesos = Peso::all();
            $ultimopeso = $pesos->last();
            $animal->pesaje_actual = $ultimopeso->pesaje;
            $animal->save();
            return redirect()->route('admin.pesos.index');
        }


    }
    public function ultimospesos()
    {
        $animales = Animal::orderBy('DIIO', 'ASC')->lists('DIIO', 'id');
        $ultimos = Animal::all();
        $fecha = Carbon::now();
        return view('Pesos.ultimos')->with('animales',$animales)->with('fecha',$fecha)->with('ultimos',$ultimos);
    }
    
    
}
