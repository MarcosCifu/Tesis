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
                <li>Sustentabilidad</li>
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
                    <img class="agile_about_grid_left_img img-responsive" src="{{ asset('plugins/index/web/images/sustentabilidad.png') }}" alt=" " />
                </div>
                <div class="col-md-6 agile_about_grid_right">
                    <h4 class="capitalize">SUSTENTABILIDAD <span>MEDIOAMBIENTAL</span></h4>
                    <p>
                        <i>

                            Ancali cuenta con cuatro Resoluciones de Calificación Ambiental aprobadas por la CONAMA para
                            sus planteles lechero y de crianza y de su digestor de purines. Estos estudios abarcan el manejo
                            sustentable de los residuos orgánicos (purines y aguas de lavado), reúso de agua y arena,
                            balance y aplicación de purines tratados en sus campos, análisis de suelos y aplicación de
                            fertilizantes, control de olores y de vectores.

                            Lo anterior, permite un excelente control de los impactos ambientales asociados al plantel
                            lechero en sí, al tratamiento, transporte y aplicación de purines en campos; una significativa
                            reducción en el uso de fertilizantes químicos en los campos que aplican purines, una importante
                            reducción en uso de arena fresca y de agua, reduciendo el uso de recursos naturales.

                            La tecnología utilizada en el manejo sustentable de sus residuos involucra pozos de hormigón,
                            bombas, separadores de sólidos y de arena, digestores de purines, transporte adecuado y
                            piscinas con cobertura vegetal adecuada. Gran parte de esta tecnología es de origen
                            norteamericano, donde existen planteles lecheros estabulados semejantes.
                        </i>
                    </p>
                    <h4 class="capitalize">RESPONSABILIDAD <span>SOCIAL</span></h4>
                    <p>
                        <i>
                            Agrícola Ancali participa activamente en acciones de apoyo a las comunidades
                            aledañas a sus operaciones y partes interesadas. Es así como realiza acciones
                            de capacitación para escuelas agrícolas, institutos técnicos y universidades,
                            apoyo a actividades sociales como campeonatos deportivos, festividades,
                            apoyo a comités habitacionales y apoyo a trabajadores con enfermedades
                            graves o tratamiento costosos.
                        </i>
                    </p>
                </div>
                <div class="col-md-2 agile_about_grid_left">
                    <div class="clearfix"> </div>
                    <img class="agile_about_grid_left_img img-responsive" src="{{ asset('plugins/index/web/images/electricidad.png') }}" alt=" " />
                </div>
                <div class="col-md-4 agile_about_grid_right">
                    <p>
                        <i>
                            Ancali entregara su energía al Sistema Interconectado con una capacidad de generación de 1,4 MW por hora. Lo cual es equivalente a un consumo anual de 3.500 hogares.
                        </i>
                    </p>
                </div>
                <div class="col-md-2 agile_about_grid_left">
                    <div class="clearfix"> </div>
                    <img class="agile_about_grid_left_img img-responsive" src="{{ asset('plugins/index/web/images/social.png') }}" alt=" " />
                </div>
                <div class="col-md-4 agile_about_grid_right">
                    <p>
                        <i>
                            Ancali se hizo parte de la inciativa "Entorno Emprendedor para Futuros Técnicos Profesionales", que fomenta el emprendimiento en los estudiantes del Centro de Educación Agroalimentaria de la comuna de Negrete.
                        </i>
                    </p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endsection