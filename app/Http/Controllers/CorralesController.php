<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Corral;
use App\Animal;
use App\Atributo;
use App\Galpon;
use Laracasts\Flash\Flash;
use App\Http\Requests\CorralRequest;


class CorralesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corrales = Corral::all();
        $corrales->each(function($corrales){
            $corrales->galpon;
            $corrales->atributos;
        });
        $atributos = Atributo::orderBy('nombre', 'ASC')->lists('nombre', 'id');
        $galpones = Galpon::orderBy('numero', 'ASC')->lists('numero', 'id');
        return view('Corrales.index')
            ->with('corrales',$corrales)
            ->with('galpones', $galpones)
            ->with('atributos', $atributos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $atributos = Atributo::orderBy('nombre', 'ASC')->lists('nombre', 'id');
        $galpones = Galpon::orderBy('numero', 'ASC')->lists('numero', 'id');

        return view('Corrales.create')
            ->with('galpones', $galpones)
            ->with('atributos', $atributos);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CorralRequest $request)
    {
        $corral = new Corral($request->all());
        $corral->save();
        $corral->atributos()->sync($request->atributos);
        Flash::success('El corral ' . $corral->numero . ' ha sido creado con exito!');
        return redirect()->route('admin.corrales.index');

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
        $corral = Corral::find($id);
        $atributos = Atributo::orderBy('nombre', 'ASC')->lists('nombre', 'id');
        $galpones = Galpon::orderBy('numero', 'ASC')->lists('numero', 'id');
        $losatributos = $corral->atributos->lists('id')->ToArray();


        return view('Corrales.edit')
            ->with('corral',$corral)
            ->with('galpones', $galpones)
            ->with('atributos',$atributos)
            ->with('losatributos',$losatributos);
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
        $corral = Corral::find($id);
        $corral->fill($request->all());
        $corral->save();
        $corral->atributos()->sync($request->atributos);
        Flash::warning('El corral ' . $corral->numero . ' ha sido editado con exito!');
        return redirect()->route('admin.corrales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $corral = Corral::find($id);
        $corral->each(function($corral){
            $corral->galpon;

        });
        $corral->delete();

        Flash::error('El corral ' . $corral->numero . ' en el galpón '. $corral->galpon->numero .' ha sido eliminado con exito!');
        return redirect()->route('admin.corrales.index');
    }
    public function perfil($id)
    {
        $corrales = Corral::find($id);
        return view ('Corrales.perfil')->with('corrales',$corrales);
    }
    public function animalcorral($id)
    {
        $corral = Corral::find($id);
        $fecha = Carbon::now();
        return view ('Corrales.animalcorral')
            ->with('corral', $corral)
            ->with('fecha',$fecha);
    }
}
