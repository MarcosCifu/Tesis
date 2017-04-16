@extends('Index.template')
@section('content')
<!-- banner1 -->
<div class="banner1">
    <div class="container">
    </div>
</div>

<div class="services-breadcrumb">
    <div class="container">
        <ul>
            <li><a href="{{route('inicio')}}">Inicio</a><i>|</i></li>
            <li>Empresa</li>
        </ul>
    </div>
</div>
<!-- //banner1 -->

<!-- about -->
<div class="about">
    <div class="container">
        <div class="agile_about_grids">
            <div class="col-md-6 agile_about_grid_left">
                <div class="clearfix"> </div>
                <img class="agile_about_grid_left_img img-responsive" src="{{ asset('plugins/index/web/images/chile.jpg') }}" alt=" " />
            </div>
            <div class="col-md-6 agile_about_grid_right">
                <h4 class="capitalize">Agrícola Ancali Limitada</h4>
                <h4 class="lowercase"> es una sociedad agrícola, ganadera y lechera.</h4>
                <p>
                    <span>Actualmente es una de las lechería más grandes e importantes de Sudamérica.</span>
                    <i>
                        Nuestro compromiso es generar leche de la mejor
                        calidad, a través de procesos tecnológicos que velan por
                        el óptimo cuidado del animal y del medio ambiente.
                    </i>
                </p>
                <p> <span>Visión</span><br> Nos proyectamos
                    como una de las lecherías más
                    eficientes y tecnológicamente
                    más avanzadas del mundo,
                    produciendo una leche de
                    calidad superior, reconocida
                    permanentemente por el
                    consumidor final, dispuesta
                    en mercados globales y
                    producida a través de
                    procesos altamente
                    tecnológicos.
                </p>
                <p> <span>Misión</span><br>  Implementar y
                    operar eficientemente
                    sistemas productivos con
                    equipos de vanguardia y
                    personal de excelencia,
                    comprometiéndonos a
                    resguardar permanente la
                    salud y bienestar de nuestros
                    animales así como el medio
                    ambiente, generando
                    procesos productivos
                    intensivos invariablemente
                    amigables con el medio
                    ambiente y que ofrezcan un
                    entorno responsable hacia la
                    comunidad.
                </p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //about -->
<div class="container">
    <div class="page-header">

    </div>
    <ul class="timeline">
        <li>
            <div class="timeline-badge warning"><i class="counter">1987</i></div>
            <div class="timeline-panel">
                <div class="timeline-body">
                    <p>Liliana Solari Falabella, fundadora del grupo Bethia, crea la sociedad agrícola
                        Ancali junto a sus hijos Carlos Heller y Andrea Heller.</p>
                </div>
            </div>
        </li>
        <li class="timeline-inverted">
            <div class="timeline-badge warning"><i class="counter">2002</i></div>
            <div class="timeline-panel">
                <div class="timeline-body">
                    <p>Ancali compra predio Curiche que contiene pequeña Lechería.</p>
                </div>
            </div>
        </li>
        <li>
            <div class="timeline-badge warning"><i class="counter">2003</i></div>
            <div class="timeline-panel">
                <div class="timeline-body">
                    <p>Ancali construye lechería de 1.000 vacas en Fundo El Risquillo.</p>
                </div>
            </div>
        </li>
        <li class="timeline-inverted">
            <div class="timeline-badge warning"><i class="counter">2006</i></div>
            <div class="timeline-panel">
                <div class="timeline-body">
                    <p>En Fundo Risquillo se aumenta capacidad de ordeña a 4.500 Vacas.</p>
                </div>
            </div>
        </li>
        <li>
            <div class="timeline-badge warning"><i class="counter">2008</i></div>
            <div class="timeline-panel">
                <div class="timeline-body">
                    <p>Ancali construye su centro de Crianza en Fundo Curiche.</p>
                </div>
            </div>
        </li>
        <li class="timeline-inverted">
            <div class="timeline-badge warning"><i class="counter">2010</i></div>
            <div class="timeline-panel">
                <div class="timeline-body">
                    <p>Se construye cuarta sala rotativa, aumentando capacidad a 6.000 vacas.</p>
                </div>
            </div>
        </li>
        <li>
            <div class="timeline-badge warning"><i class="counter">2010</i></div>
            <div class="timeline-panel">
                <div class="timeline-body">
                    <p>Ancali construye separador de arenas que permite su reciclado.</p>
                </div>
            </div>
        </li>
        <li class="timeline-inverted">
            <div class="timeline-badge warning"><i class="counter">2013</i></div>
            <div class="timeline-panel">
                <div class="timeline-body">
                    <p>Ancali inaugura el primer digestor de purines para generar energía eléctrica.</p>
                </div>
            </div>
        </li>
    </ul>
</div>
@endsection
