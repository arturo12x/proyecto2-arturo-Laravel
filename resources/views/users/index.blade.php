@extends('layaouts.plantilla')
@section('contenido')

<div class="card">
    <div class="card-body">
        <h1>Mostrar usuarios</h1>

        <div class="card-header">
            <form action="" method="get" class="row g-3">
                <div class="col-auto">
                    <input type="text" class="form-control" name="dato" placeholder="Buscar usuario">
                </div>

                    <div class="col-auto">

                <button type="submit" class="btn btn-success" name="buscar" value="si">Buscar</button>
            </div>

            </form>
        </div>
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($users as $user)
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td width="8px"><a class="btn btn-primary"href="{{route('user.edit',$user->id)}}">Asignar Rol</a></td>
            </tr>
            @endforeach
        </tbody>
</table>

</div>
{{ $users->links() }}

</div>



@endsection