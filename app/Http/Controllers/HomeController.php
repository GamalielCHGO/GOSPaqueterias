<?php

namespace App\Http\Controllers;

use App\Models\Envio;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('home',[
            'sucursales' => Sucursal::all(),
        ]);
    }

    public function rastrear()
    {
        return view('rastrear');
    }
    public function rastrearId(Request $request)
    {
        $envio = Envio::where('guia',$request->guia)->first();
        $envio;
        if($envio!=null)
        {
            return view('rastrearId',[
                'guia'=>$envio,
            ]);
        }
        else{
            return redirect()->route('rastrear')->with('status','El numero de guia proporcionado no existe');
        }
        
    }

    public function terminos()
    {
        return view('terminos');
    }


}
