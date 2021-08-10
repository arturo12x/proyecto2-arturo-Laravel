@extends('layaouts.plantilla')
@section('contenido')
<h1>Mostrar Roles para asignar</h1>
<div class="card">
    <div class="card-body">
@if(session('info'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only"></span>
    </button>
    <strong>{{session('info')}}</strong>
</div>
@endif

<div class="card-header">
    Nombre: {{$user->name}}
</div>
<form action="{{route('user.update',$user->id)}}" method="post">
    @csrf
@method('PUT')
@foreach ($roles as $rol)

<div class="form-check">
<input type="checkbox" name="roleId[]" value="{{$rol->id}}">
<label class="form-check-label">{{$rol->name}}</label>
</div>
@endforeach
<button type="submit" class="btn btn-success">Asingar rol</button>
</form>

    </div>
</div>

@endsection