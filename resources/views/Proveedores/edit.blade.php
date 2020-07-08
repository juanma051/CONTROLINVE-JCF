@extends('app')
@section('content')


<div id="content">
  <div class="row">
    <div class="col-md-offset-2 col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div  class="panel-heading">Registrar Usuario</div>
        <div class="panel-body">
          <form class="form-horizontal formulario" role="form" method="POST" action="{{ url('Usuarios/'.$query->id) }}" enctype="multipart/form-data">

             <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">
            <!-- nombre -->
            <div class="form-group">
              <label class="col-md-4 control-label">Nombre</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="nombre" value="{{ $query->nombre }}">
              </div>
            </div>
            <!-- nombre -->
            <div class="form-group">
              <label class="col-md-4 control-label">Apellido</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="apellido" value="{{ $query->apellido }}">
              </div>
            </div>
            <!-- direccion -->
            <div class="form-group">
              <label class="col-md-4 control-label">Direccion</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="direccion" value="{{ $query->direccion }}">
              </div>
            </div>
            <!-- direccion -->
            <div class="form-group">
              <label class="col-md-4 control-label">Genero</label>
              <div class="col-md-6">
                <select  id="genero" name="genero"  class="form-control">
                  <option  value="{{ $query->genero }}">{{$query->genero }}</option>
                  <option value="Femenino" >Femenino</option>
                  <option value="Masculino">Masculino</option>
                </select>
              </div>
            </div>
          
            <!-- telefono -->
            <div class="form-group">
              <label class="col-md-4 control-label">Telefono</label>
              <div class="col-md-6">
                <input type="number" class="form-control" name="telefono" value="{{ $query->telefono }}">
              </div>
            </div>
            <!-- telefono -->
            <div class="form-group">
              <label class="col-md-4 control-label">Celular</label>
              <div class="col-md-6">
                <input type="number" class="form-control" name="celular" value="{{ $query->celular }}">
              </div>
            </div>

             <!-- direccion -->
            <div class="form-group">
              <label class="col-md-4 control-label">Rol</label>
              <div class="col-md-6">
                <select name="rol" value="{{ $query->rol }}" class="form-control">
                  <option>{{$query->rol }}</option>
                  <option value="Administrador">Administrador</option>
                  <option value="Tecnico">Tecnico</option>
                   <option value="Usuario">Usuario</option>
                </select>
              </div>
            </div>
            <!-- telefono -->
            <div class="form-group">
              <label class="col-md-4 control-label">Correo</label>
              <div class="col-md-6">
                <input type="email" class="form-control" name="email" value="{{ $query->email }}">
              </div>
            </div>
           
              <!-- direccion -->
            <div class="form-group">
              <label class="col-md-4 control-label">Estado</label>
              <div class="col-md-6">
                <select name="estado" class="form-control">
                  <option>{{$query->estado}}</option>
                  <option value="Activo">Activo</option>
                  <option value="Inactivo">Inactivo</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" value="Update" class="btn btn-success">Actualizar</button>
              
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