<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historial_Medico;
use App\Animal;
use App\Http\Requests;
use Carbon\Carbon;
use Laracasts\Flash\Flash;
use App\Http\Requests\HistorialesRequest;

class HistorialesMedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historiales = Historial_Medico::orderBy('id_animales','ASC')->paginate();
        $historiales->each(function($historiales){
            $historiales->animal;

        });
        $animales = Animal::orderBy('DIIO', 'ASC')->lists('DIIO', 'id');
        $fecha = Carbon::now();
        return view('HistorialesMedicos.index')->with('historiales',$historiales)
            ->with('animales', $animales)->with('fecha',$fecha);
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

        return view('HistorialesMedicos.create')
            ->with('animales', $animales)->with('fecha',$fecha);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HistorialesRequest $request)
    {
        $historial = new Historial_Medico($request->all());
        $historial->save();
        $animal = Animal::find($historial->id_animales);
        $animal->estado = 'Enfermo';
        $animal->save();
        Flash::success('El diagnostico ' . $historial->enfermedad . ' ha sido creado con exito!');
        return redirect()->route('admin.historiales.index');
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
        $animales = Animal::orderBy('DIIO', 'ASC')->lists('DIIO', 'id');
        $fecha = Carbon::now();
        $historial = Historial_Medico::find($id);

        return view('HistorialesMedicos.edit')->with('historial',$historial)->with('animales', $animales)->with('fecha',$fecha);
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
        $historial = Historial_Medico::find($id);
        $historial->fill($request->all());
        $historial->save();

        Flash::warning('El diagnostico ' . $historial->name . ' ha sido editado con exito!');
        return redirect()->route('admin.historiales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $historial = Historial_Medico::find($id);
        $historial->each(function($historial){
            $historial->animal;

        });
        $historial->delete();

        Flash::error('El diagnostico ' . $historial->name . ' del animal '. $historial->animal->DIIO .' ha sido eliminado con exito!');
        return redirect()->route('admin.historiales.index');
    }
}
