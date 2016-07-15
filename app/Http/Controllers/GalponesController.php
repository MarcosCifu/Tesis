<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Galpon;
use App\Animal;
use App\Corral;
use Laracasts\Flash\Flash;
use App\Http\Requests\GalponRequest;

class GalponesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galpones = Galpon::all();
        $galpones->each(function ($galpones){
            $galpones->corrales;
        });
        return view('Galpones.index')->with('galpones',$galpones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view ('Galpones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalponRequest $request)
    {
        $galpon = new Galpon($request->all());
        $galpon->save();
        Flash::success('El galpón ' . $galpon->numero . ' ha sido creado con exito!');
        return redirect()->route('admin.galpones.index');
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
        $galpon = Galpon::find($id);
        return view('Galpones.edit')->with('galpon',$galpon);
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
        $galpon = Galpon::find($id);
        $galpon->fill($request->all());
        $galpon->save();

        Flash::warning('El galpón ' . $galpon->numero . ' ha sido editado con exito!');
        return redirect()->route('admin.galpones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galpon = Galpon::find($id);
        $galpon->delete();
        Flash::error('El galpón ' . $galpon->numero . ' ha sido eliminado con exito!');
        return redirect()->route('admin.galpones.index');
    }
    public function perfil($id)
    {
        $galpon = Galpon::find($id);
        $corrales = Corral::where('id_galpon','=', $galpon->id);
        $animales = $corrales->sum('cantidad_animales');
      
        return view ('Galpones.perfil')->with('galpon',$galpon)->with('corrales',$corrales)->with('animales',$animales);
    }
    public function corralcreate($id)
    {
        $galpones = Galpon::find($id);
        return view ('Galpones.corralcreate')->with('galpones', $galpones);
    }
}
