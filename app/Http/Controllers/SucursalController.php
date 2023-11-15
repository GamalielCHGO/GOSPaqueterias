<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SucursalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sucursal.listaSucursales',[
            'sucursales'=> Sucursal::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sucursal.crearSucursal',[
            'sucursales'=> Sucursal::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre'=>'required|string',
            'direccion'=>'required|string',
            'correo'=>'required|string',
            'tipos_envio'=>'required|string',
            'link'=>'required|string',
            
        ]);

        Sucursal::create([
            'nombre' => $request['nombre'],
            'direccion' => $request['direccion'],
            'correo' => $request['correo'],
            'tipos_envio' => $request['tipos_envio'],
            'impresora' => $request['impresora'],
            'link' => $request['link'],
        ]);
        // validar que el username y el correo no existan

        return redirect()->route('listaSucursales')->with('status','La sucursal fue creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursal $sucursal)
    {
        return view('sucursal.sucursal',[
            'sucursal'=> $sucursal,
            'sucursales'=> Sucursal::get(),
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Sucursal $sucursal)
    {
        $request= request();
        request()->validate([
            'nombre'=>['required','string',Rule::unique('sucursal')->ignore($sucursal)],
            'direccion'=>'required|string',
            'correo'=>'required|string',
            'tipos_envio'=>'required|string',
            'link'=>'required|string',
        ]);
        $sucursal->update([
            'nombre' => $request['nombre'],
            'direccion' => $request['direccion'],
            'correo' => $request['correo'],
            'tipos_envio' => $request['tipos_envio'],
            'impresora' => $request['impresora'],
            'link' => $request['link'],
        ]);
            return redirect()->route('listaSucursales')->with('status','La sucursal fue actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sucursal $sucursal)
    {
        $sucursal->delete(); 
        return redirect()->route('listaSucursales')->with('status','La sucursal fue eliminada con exito');
    }

}

