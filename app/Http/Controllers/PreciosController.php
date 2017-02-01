<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Precio;
use Carbon\Carbon;
use Laracasts\Flash\Flash;
use App\Http\Requests;

class PreciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $precios = Precio::orderBy('fecha','DESC')->paginate();
        $fecha = Carbon::now();
        return view('Precios.index')->with('precios', $precios)->with('fecha',$fecha);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fecha = Carbon::now();
        return view('Precios.create')->with('fecha',$fecha);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $precio = new Precio($request->all());
        $precio->id_users = \Auth::user()->id;
        $precio->save();
        Flash::success('El valor de '. $precio->tipo . ' a $' . $precio->valor . ' /Kg, ha sido creado con exito!');
        return redirect()->route('admin.precios.index');
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
        $precio = Precio::find($id);
        $fecha = $precio->fecha;

        return view('Precios.edit')->with('precio',$precio)->with('fecha',$fecha);
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
        $precio = Precio::find($id);
        $precio->fill($request->all());
        $precio->save();

        Flash::warning('El valor de '. $precio->tipo . ' a $' . $precio->valor . ' /Kg, ha sido editado con exito!');
        return redirect()->route('admin.precios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $precio = Precio::find($id);
        $precio->delete();
        Flash::error('El valor de '. $precio->tipo . ' a $' . $precio->valor . ' /Kg, ha sido borrado de forma exitosa!');
        return redirect()->route('admin.precios.index');
    }
}
