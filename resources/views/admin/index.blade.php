@extends('layaouts.plantilla')

@section('contenido')
<div class="container col-md-5">
    <h3>Registro de usuarios</h3>
    @if ($resp ?? '' =="si")
        <p>Usuario guardardo correctamente!</p>
    @endif

<form action="{{route('admin.store')}}" method="post">
@csrf
<div class="mb-3">
    <label for="name" class="form-label">Nombre:</label>
    <input type="text" name="name" class="form-label" >
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email:</label>
    <input type="email" name="email" class="form-label" >
</div>

<div class="mb-3">
    <label for="password" class="form-label">password:</label>
    <input type="password" name="password" class="form-label" >
</div>
<button type="submit" class="btn btn-primary">Guardar</button>

</form>
</div>
@stop