@extends('layaouts.plantilla')

@section('contenido')
<div class="row justify-content-center"> 

<div class="col-4">
    <h1>Formulario de login</h1>
   
  @if ($errors->any())
    @foreach ($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
  @endif


<form  method="POST" action="{{route('datos')}}" >
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Usuario</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <!--Creación del capcha-->
    <div class="mb-3">
      <span id="captcha-img">
          {!!captcha_img()!!}
      </span>
      <button id="reload" class="btn btn-warning">Recargar</button>
   </div>

    <div class="mb-3">
       <input type="text" id="captcha" name="captcha" class="form-control" placeholder="captcha">
    </div>
    <!--fin de la creación del capcha-->

    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>

</div>

</div>
@stop