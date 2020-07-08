<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dependencias;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DependenciaController extends Controller
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
        // return view('Dependencia.index')
        return view('Dependencia.index')
        ->with('query', Dependencias::paginate(6) 
        ->setPath('Dependencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       $dependencia = Dependencias::all();
        return view('Dependencia.create',compact('dependencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $dependencia = new Dependencias();
        $dependencia->nombre    = $request->get('nombre'); 
        $dependencia->ubicacion = $request->get('ubicacion'); 
        $dependencia->extension = $request->get('extension'); 
        $dependencia->estado = $request->get('estado'); 
       
        $dependencia->save();

        return redirect('Dependencias');
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
        //
         return view('Dependencia.edit')->with('query',Dependencias::find($id));
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
        $dependencia= Dependencias::find($id);
        $dependencia->nombre    = $request->get('nombre'); 
        $dependencia->ubicacion = $request->get('ubicacion'); 
        $dependencia->extension = $request->get('extension');
        $dependencia->estado = $request->get('estado'); 
       
        $dependencia->save();

        return redirect('Dependencias');

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
        User::destroy($id);

       

         return redirect('Dependencias')->with('message',' eliminado');
    }
}
