<!DOCTYPE html>
<html>
<head>
    <title>Ancali</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Truckage Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <link href="{{asset("/plugins/index/web/css/bootstrap.css")}}" rel="stylesheet">
    <link href="{{asset("/plugins/index/web/css/style.css")}}" rel="stylesheet">
    <!-- js -->
    <script src="{{ asset ("/plugins/index/web/js/jquery-2.1.4.min.js") }}"></script>
    <!-- //js -->
    <!-- load-more -->
    <script>
        $(document).ready(function () {
            size_li = $("#myList li").size();
            x=1;
            $('#myList li:lt('+x+')').show();
            $('#loadMore').click(function () {
                x= (x+1 <= size_li) ? x+1 : size_li;
                $('#myList li:lt('+x+')').show();
            });
            $('#showLess').click(function () {
                x=(x-1<0) ? 1 : x-1;
                $('#myList li').not(':lt('+x+')').hide();
            });
        });
    </script>
    <!-- //load-more -->
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>

<body>

<!-- header -->
<div class="header">
    <div class="container">
        <div class="w3l_header_left">
            <ul>
                <li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>+ (123) 111 222 333</li>
                <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com">info@example.com</a></li>
            </ul>
        </div>
        <div class="w3l_header_right">
            <ul>

                @if(Auth::user())
                    <li><a href="{{route('home.index')}}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Panel de Control</a></li>
                    @else
                        <li><a href="{{route('log.index')}}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Ingresar</a></li>
                @endif
            </ul>
        </div>
        <div class="clearfix"> </div>
        <script type="text/javascript" src="{{ asset('plugins/index/web/js/demo.js') }}"></script>
    </div>
</div>
<div class="logo_nav">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="logo">
                    <h1><a class="navbar-brand" href="{{route('inicio')}}">A<span>n</span>cali</a></h1>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                <nav class="link-effect-2" id="link-effect-2">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.html"><span data-hover="Home">Home</span></a></li>
                        <li><a href="services.html"><span data-hover="Services">Services</span></a></li>
                        <li><a href="about.html"><span data-hover="About">About</span></a></li>
                        <li><a href="short-codes.html"><span data-hover="Short Codes">Short Codes</span></a></li>
                        <li><a href="mail.html"><span data-hover="Mail Us">Mail Us</span></a></li>
                    </ul>
                </nav>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </div>
</div>
<!-- //header -->
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
                <a href="single.html" class="button--wayra button--border-thick button--text-upper button--size-s">Learn More</a>
            </div>
        </div>
    </div>
</div>
<!-- //banner -->

<!-- banner-bottom -->
<div class="banner-bottom">
    <div class="container">
        <div class="col-md-6 banner_bottom_left">
            <h3>occaecat cupidatat proident</h3>
            <p><i>Ut enim ad minima veniam</i> Quis nostrum exercitationem ullam corporis suscipit
                laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure
                reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,
                vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</p>
            <div class="wthree_more wthree_more1">
                <a href="single.html" class="button--wayra button--border-thick button--text-upper button--size-s">Read More</a>
            </div>
        </div>
        <div class="col-md-6 banner_bottom_right">
            <div class="wthree_banner_bottom_right_grids">
                <div class="col-md-6 banner_bottom_right_grid">
                    <div class="view view-tenth">
                        <div class="agile_text_box">
                            <i></i>
                            <h3>heavy transport facility</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adip.</p>
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
                            <h3>service support</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adip.</p>
                        </div>
                        <div class="mask">
                            <img src="{{ asset('plugins/index/web/images/2.jpg')}}" class="img-responsive" alt="" />
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
                            <h3>transport charges free</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adip.</p>
                        </div>
                        <div class="mask">
                            <img src="{{ asset('plugins/index/web/images/3.jpg')}}" class="img-responsive" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6 banner_bottom_right_grid">
                    <div class="view view-tenth">
                        <div class="agile_text_box">
                            <i class="clock"></i>
                            <h3>ontime delivery</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adip.</p>
                        </div>
                        <div class="mask">
                            <img src="{{ asset('plugins/index/web/images/4.jpg')}}" class="img-responsive" alt="" />
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
        <img src="{{ asset('plugins/index/web/images/5.jpg')}}" alt=" " class="img-responsive" />
    </div>
    <div class="col-md-6 agile_banner_bottom1_right">
        <h3>occaecat cupidatat non proident, sunt in culpa qui officia</h3>
        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
            sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
            Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
            adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
        <div class="details">
            <a href="single.html">More Details</a>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
<!-- banner-bottom1 -->

<!-- testimonials -->
<div class="testimonials">
    <div class="container">
        <h3>testimonials</h3>
        <p class="quia">what our customers say</p>
        <div class="w3_testimonials_grids">
            <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <div class="w3_testimonials_grid">
                                <img src="{{ asset('plugins/index/web/images/1.png')}}" alt=" " class="img-responsive" />
                                <h4><i>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
                                        impedit quo minus id quod maxime placeat facere possimus, omnis voluptas.</i></h4>
                                <h5>John Frank</h5>
                                <p>Founder</p>
                            </div>
                        </li>
                        <li>
                            <div class="w3_testimonials_grid">
                                <img src="{{ asset('plugins/index/web/images/2.png')}}" alt=" " class="img-responsive" />
                                <h4><i>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
                                        impedit quo minus id quod maxime placeat facere possimus, omnis voluptas.</i></h4>
                                <h5>Michael Doe</h5>
                                <p>Transport Agent</p>
                            </div>
                        </li>
                        <li>
                            <div class="w3_testimonials_grid">
                                <img src="{{ asset('plugins/index/web/images/3.png')}}" alt=" " class="img-responsive" />
                                <h4><i>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
                                        impedit quo minus id quod maxime placeat facere possimus, omnis voluptas.</i></h4>
                                <h5>Thomas Carl</h5>
                                <p>Transport Agent</p>
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

<!-- for bootstrap working -->
<script src="{{ asset ("/plugins/index/web/js/bootstrap.js") }}"></script>
<!-- //for bootstrap working -->
</body>
</html>
