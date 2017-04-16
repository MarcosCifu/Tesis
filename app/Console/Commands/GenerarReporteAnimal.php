<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Animal;
use App\Peso;
use PDF;
use Carbon\Carbon;
use App\Precio;
use App\EstadisticaAnimal;

class GenerarReporteAnimal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generar:reporteanimal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Genera reporte del animal';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $animales = Animal::all();
        foreach ($animales as $animal){
            $pesos = Peso::where('id_animales','=', $animal->id)->orderBy('fecha', 'ASC')->lists('pesaje');
            $ultimopeso = collect($pesos)->last();
            $fechaactual = Carbon::now();
            $permanencia= $animal->created_at->diff($fechaactual)->days+1;
            $precios = Precio::all();
            $ultimoprecio = $precios->where('tipo',$animal->tipo)->last();
            $ultimodiagnostico = $animal->historialesmedicos->where('id_animales',$animal->id)->last();
            $pdf = PDF::loadview('Animales.pdf',[
                'animal' => $animal,
                'permanencia' => $permanencia,
                'ultimopeso' => $ultimopeso,
                'ultimodiagnostico' => $ultimodiagnostico]);
            $nombre = 'Reporteanimal:' . $animal->DIIO . time();
            \Storage::disk('s3')->put($nombre, $pdf->output());

            $estadistica = new EstadisticaAnimal();
            $estadistica->id_animal = $animal->id;
            $estadistica->ganancia_peso = $ultimopeso->pesaje - $animal->pesaje_inicial;
            $estadistica->path = $nombre;
            $estadistica->save();
        }
    }
}
