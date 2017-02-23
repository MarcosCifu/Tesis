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
                <li>Procesos</li>
            </ul>
        </div>
    </div>
    <!-- //banner1 -->

    <!-- testimonials -->
    <div class="about">
        <div class="container">
            <h3>Ciclos</h3>
            <p class="quia">En Ancali nos preocupamos de que cada proceso sea parte
                de un ciclo cerrado, donde prime la sustentabilidad, la innovación,
                el confort animal, el cuidado de las personas y del medio ambiente.</p>
            <div class="w3_testimonials_grids">
                <section class="slider">
                        <div class="flexslider">
                            <h2>La vida de los Alimentos</h2><br>
                            <ul class="slides">
                                <li>
                                    <div class="w3_testimonials_grid">
                                        <img src="{{ asset('plugins/index/web/images/maiz.jpg')}}" alt=" " class="img-responsive" />
                                    </div>
                                </li>
                                <li>
                                    <div class="w3_testimonials_grid">
                                        <img src="{{ asset('plugins/index/web/images/alfalfa.jpg')}}" alt=" " class="img-responsive" />
                                    </div>
                                </li>
                            </ul>
                        </div>
                    <div class="flexslider">
                        <h2>La vida de los Animales</h2><br>
                        <ul class="slides">
                            <li>
                                <div class="w3_testimonials_grid">
                                    <img src="{{ asset('plugins/index/web/images/cicloanimal.jpg')}}" alt=" " class="img-responsive" />
                                </div>
                            </li>
                            <li>
                                <div class="w3_testimonials_grid">
                                    <img src="{{ asset('plugins/index/web/images/vacas0.png')}}" alt=" " class="img-responsive" />
                                </div>
                            </li>
                            <li>
                                <div class="w3_testimonials_grid">
                                    <img src="{{ asset('plugins/index/web/images/vacas1.png')}}" alt=" " class="img-responsive" />
                                </div>
                            </li>
                            <li>
                                <div class="w3_testimonials_grid">
                                    <img src="{{ asset('plugins/index/web/images/vacas2.png')}}" alt=" " class="img-responsive" />
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
    <!-- about -->
    <div class="about">
        <div class="container">
            <div class="agile_about_grids">
                <div class="col-md-6 agile_about_grid_left">
                    <div class="clearfix"> </div>
                    <img class="agile_about_grid_left_img img-responsive" src="{{ asset('plugins/index/web/images/genetica.png') }}" alt=" " />
                </div>
                <div class="col-md-6 agile_about_grid_right">
                    <h4 class="capitalize">SELECCIÓN  <span>GENÉTICA</span></h4>
                    <p>
                        <i>
                            La selección de la genética al momento de adquirir el semen nos ha permitido en el
                            tiempo la homogenización de rebaño, mediante la selección de ejemplares en el
                            mercado internacional certificado por USDA y actualizado en el Red Book tres
                            veces al año, priorizando la utilización de semen importado priorizando sólidos totales
                            en leche, vida productiva y producción. Nuestro objetivo en la selección de genética
                            está en la búsqueda permanente de reproductores que promuevan mejoramiento de
                            ubres, ordeñabilidad, reforzamiento de patas y longevidad.
                        </i>
                    </p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- about -->
    <div class="about">
        <div class="container">
            <div class="agile_about_grids">
                <div class="col-md-6 agile_about_grid_left">
                    <div class="clearfix"> </div>
                    <img class="agile_about_grid_left_img img-responsive" src="{{ asset('plugins/index/web/images/confort.png') }}" alt=" " />
                </div>
                <div class="col-md-6 agile_about_grid_right">
                    <h4 class="capitalize">COW  <span>CONFORT</span></h4>
                    <p>
                        <i>
                            El confort animal lo definimos como simulación de las condiciones de su hábitat
                            natural en orden a que ellos puedan aportar su máximo potencial productivo. Tal
                            definición es asumida por Agrícola Ancali como un compromiso permanente al interior
                            de todas sus instalaciones, compartido y observado a su vez por todo el personal.

                            El desarrollo de este concepto ha implicado hasta la fecha una inversión permanente en
                            tiempo, capacitación y recursos orientados a lograr un ambiente confortable para
                            nuestro rebaño, lo que se traduce en:


                        </i>
                    </p>
                    <ul class="list-group">
                        <li class="list-group-item">- Utilización de camas de arena rellenada dos veces por semana.</li>
                        <li class="list-group-item">- Rascadores de pedestal al costado del bebedero.</li>
                        <li class="list-group-item">- Pisos de goma en todos los pasillos de tránsito y patios de espera.</li>
                        <li class="list-group-item">- Patios altos con excelente ventilación y luminosidad.</li>
                        <li class="list-group-item">- Rutina de limpieza tres veces al día con aspiradora autopropulsada y con Flushing de
                            Agua recirculada y tratada, en patios desocupados mientras se realiza la ordeña.</li>
                        <li class="list-group-item">- Acercamiento de comida cada 45 Minutos durante las 24 horas.</li>
                        <li class="list-group-item">- Baja densidad de animales con dos líneas de camas por patio.</li>
                        <li class="list-group-item">- Agua limpia, extraída de pozos profundos y a libre disposición.</li>
                        <li class="list-group-item">- Tres ordeñas por día.</li>
                        <li class="list-group-item">- Monitoreo individual del estado corporal, productivo y etapa reproductivos de la vaca.</li>
                    </ul>
                </div>
                <div class="col-md-6 agile_about_grid_left">
                    <div class="clearfix"> </div>
                    <img class="agile_about_grid_left_img img-responsive" src="{{ asset('plugins/index/web/images/biodigestor.png') }}" alt=" " />
                </div>
                <div class="col-md-6 agile_about_grid_right">
                    <h4 class="capitalize">BIODIGESTOR DE <span>PURINES</span></h4>
                    <p>
                        <i>
                            El proyecto de Biodigestión de purines involucró una inversión de 11 millones de
                            dólares y se hace cargo del manejo sustentable de los desechos orgánicos generados
                            en todo el plantel lechero.

                            Con ellos se espera generar 28.800 kwh/día de energía eléctrica. Esta se inyectará al
                            Sistema Interconectado Central (SIC) a través de la empresa CGE Distribución,
                            aportando energía renovable no convencional (ERNC) a la matriz energética del país.
                            Para dimensionar estas cifras, el proyecto podría proveer de energía eléctrica a 3.900
                            hogares o 15.700 personas.

                            <strong>Desde el punto de vista ecológico el impacto más importante que tiene el
                                Biodigestor de Ancali, es que convierte el gas metano en dióxido de carbono.</strong> Lo
                            que es altamente relevante para el medio ambiente, ya que el gas metano es un gas de
                            efecto invernadero 9 veces más perjudicial que el dióxido de carbono. En este sentido
                            aspiramos a ser una empresa certificada a nivel mundial en temas de energías
                            renovables y cuidado medioambiental.
                        </i>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- about -->
    <div class="about">
        <div class="container">
            <div class="agile_about_grids">

                <div class="clearfix"> </div>
            </div>
        </div>
    </div>


@endsection