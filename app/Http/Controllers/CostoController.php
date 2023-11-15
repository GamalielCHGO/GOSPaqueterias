<?php

namespace App\Http\Controllers;

use App\Models\Costo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CostoController extends Controller
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
        return view('costo.listaCostos',[
            'costos'=> Costo::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('costo.crearCosto',[
            'costos'=> Costo::get(),
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
            'nombre'=>['required','string',Rule::unique('costos')],
            'descripcion'=>'required|string',
            'alto'=>'required',
            'largo'=>'required',
            'ancho'=>'required',
            'peso'=>'required',
            'costo'=>'required',
            
        ]);

        Costo::create([
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion'],
            'alto' => $request['alto'],
            'largo' => $request['largo'],
            'ancho' => $request['ancho'],
            'peso' => $request['peso'],
            'costo' => $request['costo'],
        ]);

        return redirect()->route('listaCostos')->with('status','El costo fue creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Costo $costo)
    {
        return view('costo.costo',[
            'costo'=> $costo,
            'costos'=> Costo::get(),
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
    public function update(Costo $costo)
    {
        $request= request();
        request()->validate([
            'nombre'=>['required','string',Rule::unique('costos')->ignore($costo)],
            'descripcion'=>'required|string',
            'alto'=>'required',
            'largo'=>'required',
            'ancho'=>'required',
            'peso'=>'required',
            'costo'=>'required',
        ]);
        $costo->update([
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion'],
            'alto' => $request['alto'],
            'largo' => $request['largo'],
            'ancho' => $request['ancho'],
            'peso' => $request['peso'],
            'costo' => $request['costo'],
        ]);
            return redirect()->route('listaCostos')->with('status','El costo fue actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Costo $costo)
    {
        $costo->delete(); 
        return redirect()->route('listaCostos')->with('status','El costo fue eliminado con exito');
    }

}
