<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Atributo;
use Laracasts\Flash\Flash;
use App\Corral;

class AtributosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atributos = Atributo::all();
        return view('Atributos.index')->with('atributos',$atributos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $atributo = new Atributo($request->all());
        $atributo->save();
        Flash::success('El atributo ' . $atributo->nombre . ' ha sido creado con exito!');
        return redirect()->route('admin.atributos.index');

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
        $atributo = Atributo::find($id);

        return view('Atributos.edit')->with('atributo',$atributo);
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
        $atributo = Atributo::find($id);
        $atributo->fill($request->all());
        $atributo->save();

        Flash::warning('El atributo ' . $atributo->nombre . ' ha sido editado con exito!');
        return redirect()->route('admin.atributos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atributo = Atributo::find($id);
        $atributo->delete();
        Flash::error('El atributo ' . $atributo->name . 'ha sido borrado de forma exitosa!');
        return redirect()->route('admin.atributos.index');
    }
}
