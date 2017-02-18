<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Peso;
use App\Corral;
use App\Galpon;
use App\Http\Requests\AnimalRequest;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Carbon\Carbon;
use App\Precio;
use PDF;




class AnimalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $animales = Animal::all();
        $animales->each(function($animales){
            $animales->corral->galpon;
            $animales->corral;
            $animales->pesos;
            $animales->users;
            $animales->ultimopeso;

        });
        $corrales = Corral::orderBy('numero','ASC')->lists('numero','id');
        $fecha = Carbon::now();
        return view('Animales.index')->with('animales',$animales)->with('corrales', $corrales)->with('fecha',$fecha);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galpones = Galpon::orderBy('numero','ASC')->lists('id');
        $corrales = Corral::orderBy('numero','ASC')->lists('numero','id');
        $fecha = Carbon::now();

        return view('Animales.create')->with('corrales', $corrales)->with('fecha',$fecha)->with('galpones',$galpones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalRequest $request)
    {
        $animal = new Animal($request->all());
        $user = Auth::user();
        $animal->id_corral = $request->input('corral');
        $animal->pesaje_actual = $animal->pesaje_inicial;
        $animal->save();
        Flash::success('El animal ' . $animal->DIIO . ' ha sido creado con exito!');
        $animal->corral()->increment('cantidad_animales',1);
        $fechacompra = $request->input('fecha');
        $peso = new Peso($request->all());
        $peso->id_animales = $animal->id;
        $peso->pesaje = $request->input('pesaje_inicial');
        $peso->fecha = Carbon::now();
        $peso->save();
        $animal->users()->attach($user->id, ['fecha_compra'=> $fechacompra]);

        return redirect()->route('admin.animales.index');
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
        $animal = Animal::find($id);
        $galpones = Galpon::orderBy('numero','ASC')->lists('id');
        $corrales = Corral::orderBy('numero','ASC')->lists('numero','id');
        return view('Animales.edit')
            ->with('animal', $animal)
            ->with('corrales', $corrales)
            ->with('galpones',$galpones);
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
        $animal = Animal::find($id);
        $animal->fill($request->all());
        if ($animal->id_corral != $request->input('corral')){
            $animal->corral()->decrement('cantidad_animales',1);
            $animal->id_corral = $request->input('corral');
            $animal->corral()->increment('cantidad_animales',1);
        }
        $animal->save();
        Flash::warning('El animal ' . $animal->DIIO . ' ha sido editado con exito!');
        return redirect()->route('admin.animales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = Animal::find($id);
        $animal->each(function($animal){
            $animal->corral->galpon;
            $animal->corral;
            $animal->historiales_medicos;

        });
        $animal->delete();
        $animal->corral()->decrement('cantidad_animales',1);
        Flash::error('El animal ' . $animal->DIIO . ' ha sido eliminado con exito!');
        return redirect()->route('admin.animales.index');
    }
    public function perfil($id)
    {
        $animal = Animal::find($id);
        $pesos = Peso::where('id_animales','=', $animal->id)->orderBy('fecha', 'ASC')->lists('pesaje');
        $fecha = Peso::where('id_animales','=', $animal->id)->orderBy('fecha', 'ASC')->lists('fecha');
        $fechaganancia = Peso::where('id_animales','=', $animal->id)->orderBy('fecha', 'ASC')->lists('fecha');
        $fechaganancia->shift();
        $fechaganancia->all();
        $ultimopeso = collect($pesos)->last();
        $fechaactual = Carbon::now();
        $permanencia= $animal->created_at->diff($fechaactual)->days+1;
        $gananciapeso = $animal->estadisticasanimales->lists('ganancia_peso');
        $distribucionapeso = $animal->estadisticasanimales->lists('distribucion');
        $precios = Precio::all();
        $ultimoprecio = $precios->where('tipo',$animal->tipo)->last();



        return view ('Animales.perfil')
            ->with('animal',$animal)

            ->with('pesos',$pesos)
            ->with('fecha',$fecha)
            ->with('ultimoprecio',$ultimoprecio)
            ->with('fechaganancia',$fechaganancia)
            ->with('ultimopeso',$ultimopeso)
            ->with('permanencia',$permanencia)
            ->with('gananciapeso',$gananciapeso)
            ->with('distribucionpeso',$distribucionapeso);

    }
    public function pesoperfil($id)
    {
        $animal = Animal::find($id);
        $fecha = Carbon::now();
       

        return view ('Animales.pesoperfil')
            ->with('animal', $animal)
            ->with('fecha', $fecha);
    }
    public function historialperfil($id)
    {
        $animal = Animal::find($id);
        $fecha = Carbon::now();
        return view ('Animales.historialperfil')
            ->with('animal', $animal)
            ->with('fecha', $fecha);
    }
    public function crearPDF($id)
    {
        $animal = Animal::find($id);
        $pdf = PDF::loadview('Animales.perfil',['animal' => $animal]);
        return $pdf->stream('animal.pdf');

    }
    public function descargarPDF($id)
    {
        $animal = Animal::find($id);
        $pdf = PDF::loadview('Animales.pdf',['animal' => $animal]);
        return $pdf->download('animal.pdf');
    }
    public function ventas()
    {
        $animales = Animal::all();
        return view('Animales.ventas')->with('animales',$animales);
    }
    public function vender($id)
    {
        $animal = Animal::find($id);
        $animal->venta = 1;
        $animal->save();
        $user = Auth::user();
        $fechaventa = Carbon::now();
        $animal->users()->attach($user->id, ['fecha_venta'=> $fechaventa]);
        $animales = Animal::all();
        Flash::success('El animal ' . $animal->DIIO . ' ha sido vendido con exito!');
        return view('Animales.ventas')->with('animales',$animales);

    }
    public function vendertodos()
    {
        $animales = Animal::all();
        foreach ($animales as $animal)
        {
            if ($animal->pesaje_actual > 600 AND $animal->venta == 0)
            {
                $animal->venta = 1;
                $animal->save();
                $user = Auth::user();
                $fechaventa = Carbon::now();
                $animal->users()->attach($user->id, ['fecha_venta'=> $fechaventa]);
                $animales = Animal::all();
                Flash::success('Los animales ha sido vendidos con exito!');
                return view('Animales.ventas')->with('animales',$animales);
            }
        }

    }
    public function vendidos()
    {
        $animal = Animal::all();
        $vendidos = $animal->where('venta',1);
        return view('Animales.')->with('vendidos',$vendidos);

    }


}
