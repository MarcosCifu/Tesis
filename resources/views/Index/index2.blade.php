@extends('Index.template')
@section('content')
<!-- banner -->
<div class="banner">
    <div class="container">
        <div class="w3ls_banner_info">
            <h2>Lechería</h2>
            <p>
                Nuestro compromiso es generar leche de la mejor
                calidad, a través de procesos tecnológicos que velan por
                el óptimo cuidado del animal y del medio ambiente.
            </p>
            <div class="wthree_more">
                <a href="{{route('about')}}" class="button--wayra button--border-thick button--text-upper button--size-s">Ver más</a>
            </div>
        </div>
    </div>
</div>
<!-- //banner -->

<!-- banner-bottom -->
<div class="banner-bottom">
    <div class="container">
        <div class="col-md-6 banner_bottom_left">
            <h3 class="capitalize">Agrícola Ancali Limitada</h3>
            <h3 class="lowercase"> es una sociedad agrícola, ganadera y lechera.</h3>
            <p><i>Actualmente es una de las lechería más grandes e importantes de Sudamérica.</i>
                En Ancali existe una constante búsqueda de procesos más
                limpios, eficientes y sustentables. Una de las herramientas
                para alcanzarlo son nuevas tecnologías. Los objetivos finales de
                esta búsqueda son lograr trabajos más sanos y agradables para nuestros
                trabajadores, incrementar el bienestar animal y la productividad.

            </p>
            <div class="wthree_more wthree_more1">
                <a href="{{route('procesos')}}" class="button--wayra button--border-thick button--text-upper button--size-s">Ver más</a>
            </div>
        </div>
        <div class="col-md-6 banner_bottom_right">
            <div class="wthree_banner_bottom_right_grids">
                <div class="col-md-6 banner_bottom_right_grid">
                    <div class="view view-tenth">
                        <div class="agile_text_box">
                            <i></i>
                            <h3>Selección Genética</h3>
                            <p>La selección genética nos ha permitido la homogenización de rebaño.</p>
                        </div>
                        <div class="mask">
                            <img src="{{ asset('plugins/index/web/images/1a.jpg')}}" class="img-responsive" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6 banner_bottom_right_grid">
                    <div class="view view-tenth">
                        <div class="agile_text_box">
                            <i class="men"></i>
                            <h3>Cow Confort</h3>
                            <p>Simulamos condiciones de su hábitat para maximizar potencial productivo.</p>
                        </div>
                        <div class="mask">
                            <img src="{{ asset('plugins/index/web/images/confort.jpg')}}" class="img-responsive" alt="" />
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="wthree_banner_bottom_right_grids">
                <div class="col-md-6 banner_bottom_right_grid">
                    <div class="view view-tenth">
                        <div class="agile_text_box">
                            <i class="shipping"></i>
                            <h3>Biodigestor</h3>
                            <p>Manejo sustentable de los desechos orgánicos generados.</p>
                        </div>
                        <div class="mask">
                            <img src="{{ asset('plugins/index/web/images/biodigestor.jpg')}}" class="img-responsive" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6 banner_bottom_right_grid">
                    <div class="view view-tenth">
                        <div class="agile_text_box">
                            <i class="clock"></i>
                            <h3>Ciclos</h3>
                            <p>Nos preocupamos de que cada proceso sea parte de un ciclo cerrado.</p>
                        </div>
                        <div class="mask">
                            <img src="{{ asset('plugins/index/web/images/bebe.jpg')}}" class="img-responsive" alt="" />
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- banner-bottom -->

<!-- banner-bottom1 -->
<div class="banner-bottom1">
    <div class="col-md-6 agile_banner_bottom1_left">
        <img src="{{ asset('plugins/index/web/images/ancali.jpg')}}" alt=" " class="img-responsive" />
    </div>
    <div class="col-md-6 agile_banner_bottom1_right">
        <h3>Sustentabilidad Medioambiental</h3>
        <p>Ancali cuenta con cuatro Resoluciones de Calificación Ambiental aprobadas por la CONAMA para
            sus planteles lechero y de crianza y de su digestor de purines. Estos estudios abarcan el manejo
            sustentable de los residuos orgánicos (purines y aguas de lavado), reúso de agua y arena,
            balance y aplicación de purines tratados en sus campos, análisis de suelos y aplicación de
            fertilizantes, control de olores y de vectores.</p>
        <div class="details">
            <a href="{{route('sustentabilidad')}}">Ver más</a>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
<!-- banner-bottom1 -->

<!-- testimonials -->
<div class="testimonials">
    <div class="container">
        <h3>Antecedentes</h3>
        <p class="quia">Datos de producción</p>
        <div class="w3_testimonials_grids">
            <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <div class="w3_testimonials_grid">
                                <img src="{{ asset('plugins/index/web/images/leche.png')}}" alt=" " class="img-responsive" />
                                <h4><i>Durante el año 2012 se produjeron alrededor de 90 millones de litros de leche.</i></h4>
                            </div>
                        </li>
                        <li>
                            <div class="w3_testimonials_grid">
                                <img src="{{ asset('plugins/index/web/images/purines.png')}}" alt=" " class="img-responsive" />
                                <h4><i>Se generan un total de 98.600 toneladas de purines al año, con los que se ahorra alrededor de US$400.000, considando sólo los fertilizantes químicos.</i></h4>
                            </div>
                        </li>
                        <li>
                            <div class="w3_testimonials_grid">
                                <img src="{{ asset('plugins/index/web/images/energia.png')}}" alt=" " class="img-responsive" />
                                <h4><i>Ancali entregará su energía al Sistema Interconectado con una capacidad de generación de 1,4 MW por hora. Lo cual equivale al consumo anual de 3.500 hogares.</i></h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
            <!-- flexSlider -->
            <link rel="stylesheet" href="{{ asset('plugins/index/web/css/flexslider.css')}}" type="text/css" media="screen" property="" />
            <script defer src="{{ asset('plugins/index/web/js/jquery.flexslider.js')}}"></script>
            <script type="text/javascript">
                $(window).load(function(){
                    $('.flexslider').flexslider({
                        animation: "slide",
                        start: function(slider){
                            $('body').removeClass('loading');
                        }
                    });
                });
            </script>
            <!-- //flexSlider -->
        </div>
    </div>
</div>
<!-- //testimonials -->
@endsection


