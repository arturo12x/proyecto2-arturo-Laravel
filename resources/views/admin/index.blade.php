@extends('layouts.plantilla')
@section('contenido')

<div class="container col-md-5">

@if($resp=='si')
Registro guardado correctamente
@endif


<h1>Administrador</h1>
<form method="POST" action="{{route('admin.store')}}">
@csrf
<div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" name="name" class="form-control">
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" class="form-control">
</div>


<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control">
</div>
<button type="submit" class="btn btn-primary">Save</button>

</form>
</div>

@stop