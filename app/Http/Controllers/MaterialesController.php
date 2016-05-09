<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
use App\User;
use App\Http\Requests;
use App\Http\Requests\MaterialesRequest;
use Laracasts\Flash\Flash;

class MaterialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiales = Material::orderBy('numero','ASC')->paginate(10);
        return view('Materiales.index')->with('materiales', $materiales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Materiales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaterialesRequest $request)
    {
        $material = new Material($request->all());
        $material->id_user = \Auth::user()->id;
        $material->save();
        Flash::success('El material ' . $material->nombre . ' ha sido creado con exito!');
        return redirect()->route('admin.materiales.index');
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
        $material = Material::find($id);

        return view('Materiales.edit')->with('material',$material);
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
        $material = Material::find($id);
        $material->fill($request->all());
        $material->save();

        Flash::warning('El material ' . $material->nombre . ' ha sido editado con exito!');
        return redirect()->route('admin.materiales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Material::find($id);
        $material->delete();
        Flash::error('El material ' . $material->name . 'ha sido borrado de forma exitosa!');
        return redirect()->route('admin.materiales.index');
    }
}
