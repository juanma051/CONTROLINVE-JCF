@extends('app')
@section('content')
<div id="content">
	<div class="row">
	   <div class="col-md-12">
    		<div class="panel panel-default padding">
          <!-- PANEL -->
      		<div class="panel-heading">
        		<h3>Lista de Usuarios</h3>
      		</div>
          <!-- PANEL -->
          <a href="{{ url('Usuarios/create')}}" class="btn btn-success margin"> 
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              Adicionar Usuario 
          </a>
          <!-- BUSCAR -->
          <form class="navbar-form navbar-right" action="{{ url('/buscar_usuario')}}">
            <div class="form-group">
              <input type="text" name="nombre" class="form-control " id="buscar_usuario" placeholder="Buscar" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-default margin2">Enviar</button>
          </form>
          <br>
  		    <div class="panel-body">



            <!-- MENSAJE -->
            @if (Session::has('message'))
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span> 
              </button>
              {{Session::get('message')}}
              </div>
  		      @endif
            <!-- ////// -->

        		 <table class="table table-bordered table-striped">
        				<tr>
        					<th class="center" style="width:12%">Nombre</th>
                  <th class="center" style="width:10%">Apellido</th>
                  <th class="center" style="width:10%">Direccion</th>
                  <th class="center" style="width:8%">Genero</th>
                  <th class="center" style="width:8%">Celular</th>
                  <th class="center" style="width:8%">Rol</th>
                  <th class="center" style="width:10%">Dependencia</th>
                  <th class="center" style="width:10%">Email</th>
                   <th class="center" style="width:10%">Estado</th>
        					<th class="center" style="width:14%">Acciones</th>
        				</tr>
            		@foreach ($query as $var)
            		<tr>
        					<td class="center">{{$var->nombre }}</td>
                  <td class="center">{{$var->apellido }}</td>
                  <td class="center">{{$var->direccion }}</td>
                  <td class="center">{{$var->genero}}</td>
                  <td class="center">{{$var->celular }}</td>
                  <td class="center">{{$var->rol }}</td> 
                  <td class="center">{{$var->dependencia->nombre}}</td> 
                  <td class="center">{{$var->email }}</td>
                  <td class="center">{{$var->estado }}</td>

              		<td class="center">
                    <a href="{{ url('Usuarios/'.$var->id) }}" class="btn btn-primary ">
                      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>	
                    <a href="{{ url('Usuarios/'.$var->id) }}/edit" class="btn btn-primary ">
                      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    <form action="{{ url('Usuarios/'.$var->id) }}" method="post" id="frmdelete">
                      <input type="hidden" name="_token"  value="{{csrf_token()}}">
                        <input type="hidden" name="_method"  value="delete">
                         <button class="btn btn-danger  btn-alert"  role="button">
                           
                           <span class="glyphicon glyphicon-trash"  aria-hidden="true"></span>
                         </button>


                    </form>
      					  </td>
          			</tr>
          			@endforeach
			       </table>
			       <div class="text-center">{!! $query->render() !!}</div>
  		    </div>
  		  </div>
      </div>
    </div>
  </div>
@endsection