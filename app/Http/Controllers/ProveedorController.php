<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProveedorController extends Controller
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
        //
    
        return view('Proveedor.index')
        ->with('query', Proveedor::paginate(6) 
        ->setPath('Proveedor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        
        return view('Proveedor.create',compact('proveedor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
         $proveedor = new Proveedor();
        $proveedor->nombre = $request->get('nombre'); 
        $proveedor->nit = $request->get('nit'); 
        $proveedor->direccion = $request->get('direccion'); 
        $proveedor->ciudad = $request->get('ciudad'); 
        $proveedor->telempresa = $request->get('telempresa'); 
        $proveedor->email = $request->get('email'); 
        $proveedor->telcontacto = $request->get('telcontacto'); 
        $proveedor->estado = $request->get('estado'); 
        $proveedor->save();

        return redirect('Proveedor');
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
         return view('Proveedor.edit')->with('query',Proveedor::find($id));
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
        $proveedor= Proveedor::find($id);
        $proveedor->nombre = $request->get('nombre'); 
        $proveedor->nit = $request->get('nit'); 
        $proveedor->direccion = $request->get('direccion'); 
        $proveedor->ciudad = $request->get('ciudad'); 
        $proveedor->telempresa = $request->get('telempresa'); 
        $proveedor->email = $request->get('email'); 
        $proveedor->telcontacto = $request->get('telcontacto'); 
         $proveedor->estado = $request->get('estado'); 
        $proveedor->save();

        return redirect('Proveedor');
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

       

         return redirect('Proveedor')->with('message','eliminado');
    }
}
