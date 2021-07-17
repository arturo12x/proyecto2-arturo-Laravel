@extends('layaouts.plantilla')

@section('contenido')


<div class="container col-md-7">
    <h3 class="h1">El usuario a editar es {{$data->name}}</h3>

    <form method="GET" action="">
        <select class="form-select" aria-label="Default select example" name="cuatri">
            <option selected value="0">Selecciona un cuatrimestre</option>
            <option value="5">5to cuatrimestre</option>
            <option value="8">8vo Cuatrimestre</option>

        </select>
        <button class="btn btn-primary" type="submit">Buscar</button>

    </form>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Materias</th>
                        <th>Cuatrimestre</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($materias[0])
                    @foreach ($materias as $m)
                    <tr>
                        <td>{{$m->materia}}</td>
                        <td>{{$m->cuatri}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

<hr>
<h1 class="h2"></h1>
    
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Materias</th>
                        <th>Cuatrimestre</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($matCursadas->first())
                    @foreach ($matCursadas as $m)
                    <tr>
                        <td>{{$m->materia}}</td>
                        <td>{{$m->cuatri}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <hr>

    <form method="GET" action="">

@if(isset($_GET['cuatri']))
        <input type="hidden" name="cuatri" value={{$_GET['cuatri']}}>

@endif
        <input type="hidden" name="save" value="si">
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>

</div>

@stop