@extends('layaouts.plantilla');
@section('contenido');

<div class="container col-md-7">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <form action="" method="get">
                    <input type="text" name="buscar">
                    <button class="btn btn-success">Buscar</button>
                </form>
            </div>

            <table class=" table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th></th>
                    </tr>
                </thead>

                @foreach ($users as $usr)
                <tr>
                    <th> {{$usr->id}} </th>
                    <th>{{$usr->name}} </th>
                    <th>{{$usr->email}}</th>
                    <th><a href="{{route('docente.edit',$usr->id)}}" class="btn btn-primary"> Asignar</a></th>
                </tr>
@endforeach
            </table>

        </div>

    </div>

    <hr>

    {{$users->links()}}

</div>
@stop
