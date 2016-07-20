<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Peso;
use App\Corral;
use App\Galpon;
use Carbon\Carbon;

use App\Http\Requests;

class ReportesController extends Controller
{
    public function index()
    {
        $galpones = Galpon::orderBy('numero','ASC')->lists('id');
        $corrales = Corral::orderBy('numero','ASC')->lists('numero','id');
        $fecha = Carbon::now();
        return view ('reportes')->with('corrales', $corrales)->with('fecha',$fecha)->with('galpones',$galpones);
    }
}
