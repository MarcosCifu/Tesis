@extends('template')
@section('content')
     <div class="panel panel-default animated pulse slow go">
         <div class="panel-heading">
             <h1 class="headline text-yellow">401</h1>
         </div>
         <div class="panel-body">
                <h3><i class="fa fa-warning text-yellow"></i><b> Oops! </b>Acceso denegado.</h3>

                <p>
                    Lo sentimos, no tiene el permiso para acceder a esta zona.
                    Mientras tanto, puede <a href="/">regresar al inicio</a>.
                </p>

            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
@endsection