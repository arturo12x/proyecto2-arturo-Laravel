@extends('layouts.plantilla')
@section('contenido')
<div class="row justify-content-center">
<div class="col-6">

    <h1>Menu logeados</h1>

    <ul>
        @foreach($materias as $materias)
            <li>{{$materias->materia}} -- {{$materias->cuatri}}</li>
        @endforeach
    </ul>

</div>



</div>

@stop

