<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Corral;
use App\EstadisticaCorral;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class ActualizarEstadisticas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'actualizar:estadisticas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualiza las Estadisticas de los corrales, animales y galpones';

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
        $corrales = Corral::all();
        foreach ($corrales as $corral){
            $animales = $corral->animals;
            $promedio = 0;
            $pesajes = new Collection();
            foreach ($animales as $animal){
                $ultimaestadistica = $animal->estadisticasanimales->take(-1);
                $ultimopeso = $animal->pesos->take(-1);
                foreach ($ultimopeso as $ultimo){
                    $promedio += $ultimo->pesaje/$animales->count();
                    $pesajes->push($ultimo->pesaje);
                }
            }
            $pesajepromedio = $promedio;
            $pesajemaximo = $pesajes->max();
            $pesajeminimo = $pesajes->min();
            $pesajetotal = $animales->sum('pesaje_actual');
            $gananciapeso = $animales->sum('gananciaPeso_actual');
            $estadisticas = New EstadisticaCorral();
            $estadisticas->id_corral = $corral->id;
            if($pesajepromedio == null){
                $pesajepromedio = 0;
            }
            if($pesajemaximo == null){
                $pesajemaximo = 0;
            }
            if($pesajeminimo == null){
                $pesajeminimo = 0;
            }
            $estadisticas->pesaje_promedio = $pesajepromedio;
            $estadisticas->pesaje_maximo = $pesajemaximo;
            $estadisticas->pesaje_minimo = $pesajeminimo;
            $estadisticas->pesaje_total = $pesajetotal;
            $estadisticas->cantidad_enfermos = $corral->estadoanimales();
            $estadisticas->cantidad_muertos = $corral->estadoanimalesmuertos();
            $estadisticas->fecha = Carbon::now()->toDateString();
            $estadisticas->ganancia_peso = $gananciapeso;
            $estadisticas->save();
        }

    }
}
