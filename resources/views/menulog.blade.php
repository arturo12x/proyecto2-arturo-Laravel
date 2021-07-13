@extends('layaouts.plantilla')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-6">
        <h1>Menu logeados: {{$nom}}</h1>
        <ul>
            
            @foreach ( $materias as $m )
              <li> {{$m->materia}} -- {{$m->cuatri}} </li>  
            @endforeach

        </ul>

    </div>
   

</div>

@stop