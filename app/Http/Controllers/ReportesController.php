<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Peso;
use App\Corral;
use App\Galpon;
use Carbon\Carbon;
use PDF;

use App\Http\Requests;

class ReportesController extends Controller
{
    public function index()
    {
        return view("Reportes.index");
    }


    public function crearPDF()
    {
        $pdf = PDF::loadview('Estadisticas.animal');
        return $pdf->stream('animal.pdf');


    }

}
