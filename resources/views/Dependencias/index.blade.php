@extends('app')
@section('content')


<div id="content">
  <div class="row">
    <div class="col-md-offset-2 col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div  class="panel-heading">Registrar Usuario</div>
        <div class="panel-body">

          <form class="form-horizontal formulario" role="form" method="POST" action="{{ url('Usuarios') }}" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- nombre -->
            <div class="form-group">
              <label class="col-md-4 control-label">Nombre</label>
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Nombre" required="nombre" name="nombre" value="{{ old('nombre') }}">
              </div>
            </div>
            <!-- nombre -->
            <div class="form-group">
              <label class="col-md-4 control-label">Apellido</label>
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Apellido"  required="apellido" name="apellido" value="{{ old('apellido') }}">
              </div>
            </div>
            <!-- direccion -->
            <div class="form-group">
              <label class="col-md-4 control-label">Direccion</label>
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Direccion" name="direccion" required="direccion" value="{{ old('direccion') }}">
              </div>
            </div>
            <!-- direccion -->
            <div class="form-group">
              <label class="col-md-4 control-label" placeholder="Genero" required="genero">Genero </label>
              <div class="col-md-6">
                <select name="genero" class="form-control">
                  <option>Seleccionar.....</option>
                  <option value="Femenino">Femenino</option>
                  <option value="Masculino">Masculino</option>
                </select>
              </div>
            </div>
            <!-- direccion -->
            <div class="form-group">
              <label class="col-md-4 control-label" required="dependencia_id">Dependencia </label>
              <div class="col-md-6">
                <select name="dependencia_id" class="form-control">
                  <option>Seleccionar.....</option>
                  @foreach($dependencia as $var)
                  <option value="{{$var->id}}">{{$var->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <!-- telefono -->
            <div class="form-group">
              <label class="col-md-4 control-label" required="telefono">Telefono</label>
              <div class="col-md-6">
                <input type="number" class="form-control" name="telefono"  placeholder="Ingresa Solo Numeros" value="{{ old('telefono') }}">
              </div>
            </div>
            <!-- telefono -->
            <div class="form-group">
              <label class="col-md-4 control-label" required="celular">Celular</label>
              <div class="col-md-6">
                <input type="number" class="form-control" name="celular" placeholder="Ingresa Solo Numeros" value="{{ old('celular') }}">
              </div>
            </div>

             <!-- direccion -->
            <div class="form-group">
              <label class="col-md-4 control-label" required="rol">Rol</label>
              <div class="col-md-6">
                <select name="rol" class="form-control">
                  <option>Seleccionar.....</option>
                  <option value="Administrador">Administrador</option>
                  <option value="Tecnico">Tecnico</option>
                   <option value="Usuario">Usuario</option>
                </select>
              </div>
            </div>
            <!-- telefono -->
            <div class="form-group">
              <label class="col-md-4 control-label" required="email">Correo</label>
              <div class="col-md-6">
                <input type="email" class="form-control" name="email" placeholder="De Esta Forma: juan@gmail.com" value="{{ old('email') }}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" required="password">Contraseña</label>
              <div class="col-md-6">
                <input type="password" class="form-control"  placeholder="Minimo De 8 Digitos" name="password" value="{{ old('password') }}">
              </div>
            </div>

             <!-- direccion -->
            <div class="form-group">
              <label class="col-md-4 control-label">Estado</label>
              <div class="col-md-6">
                <select name="estado" class="form-control" required="estado">
                  <option>Seleccionar.....</option>
                  <option value="Activo">Activo</option>
                  <option value="Inactivo">Inactivo</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-success">Registrar</button>
                <a href="{{url('Usuarios')}}" class="btn btn-danger md">Regresar</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
