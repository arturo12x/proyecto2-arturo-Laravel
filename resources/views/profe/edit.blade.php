@extends('layaouts.plantilla')
@section('contenido')



<h1>Nombre: {{Auth::User()->name}}</h1>
<div class="container col-md-7">
    <div class="card">
        <div class="card-body">
            <form action="" method="get">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Materia</th>
                            <th>Cuatrimestre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($materias as $m)
                        <tr>
                            <th>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="idMat[]" value={{$m->id}}
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{$m->materia}}
                                    </label>
                                </div>
                            </th>
                            <th>{{$m->cuatri}}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary" name="guardar" value="si">Guardar</button>
            </form>
        </div>
    </div>

<hr>
    <div class="card-body">
        <form action="" method="get">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Materia</th>
                        <th>Cuatrimestre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profeMateria as $m)
                    <tr>
                        <th>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="idMat[]" value={{$m->id}}
                                    id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{$m->materia}}
                                </label>
                            </div>
                        </th>
                        <th>{{$m->cuatri}}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-danger" name="eliminar" value="eliminar">Eliminar</button>
        </form>
    </div>
    
</div>
@stop