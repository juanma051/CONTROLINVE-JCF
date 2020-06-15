<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Dependencias;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    public function __construct() {
        
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('Usuario.index')
        ->with('query', User::paginate(6) 
        ->setPath('Usuarios'));
    }

    public function buscar_usuario(Request $request)
    {
        $query = User::nombre($request->get('nombre'))->orderBy('id', 'ASC')
        ->paginate(6)
        ->setPath('Usuarios');
        return view('Usuario.index', compact('query'));
    }

    public function buscar_usuario_ajax(Request $request)
    {
        $query = User::nombre($request->get('nombre'))->orderBy('id', 'ASC')
        ->paginate(10)
        ->setPath('Usuarios');
         return view('Usuario.ajax', compact('query'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $dependencia = Dependencias::all();
        return view('Usuario.create',compact('dependencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $usuario = new User();
        $usuario->nombre = $request->get('nombre'); 
        $usuario->apellido = $request->get('apellido'); 
        $usuario->direccion = $request->get('direccion'); 
        $usuario->genero = $request->get('genero'); 
        $usuario->dependencia_id = $request->get('dependencia_id'); 
        $usuario->telefono = $request->get('telefono'); 
        $usuario->celular = $request->get('celular'); 
        $usuario->rol = $request->get('rol'); 
        $usuario->email = $request->get('email'); 
        $usuario->password = bcrypt($request->get('password')); 
        $usuario->save();

        return redirect('Usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
       return view('Usuario.edit')->with('query',User::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        //
        $usuario = User::find($id);
        $usuario->nombre = $request->get('nombre'); 
        $usuario->apellido = $request->get('apellido'); 
        $usuario->direccion = $request->get('direccion'); 
        $usuario->genero = $request->get('genero'); 
       
        $usuario->telefono = $request->get('telefono'); 
        $usuario->celular = $request->get('celular'); 
        $usuario->rol = $request->get('rol'); 
        $usuario->email = $request->get('email');
        $usuario->estado = $request->get('estado'); 
       
        $usuario->save();

          return redirect('Usuarios')->with('message','Usuario modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $usuario = User::find($id);
        $usuario->estado = 'Inactivo';
        $usuario->save();
        return redirect('Usuarios')->with('message','Usuario Inactivado');
    }
}
