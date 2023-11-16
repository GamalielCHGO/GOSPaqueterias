<?php

namespace App\Http\Controllers;

use App\Mail\nuevoUsuario;
use App\Models\Sucursal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

class UserController extends Controller
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
        return view('usuario.listaUsuarios',[
            'users'=> User::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.crearUsuario',[
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
            'name'=>'required|string',
            'role'=>'required|string',
            'lastname'=>'required|string',
            'email'=>'required|email|unique:users',
            'sucursal'=>'required|string',
        ]);
        $request['password']=Str::random(10);
        
        $mensaje['name']=$request['name'];
        $mensaje['password']=$request['password'];
        $mensaje['email']=$request['email'];

        Mail::to($request['email'])->queue(new nuevoUsuario ($mensaje));
        User::create([
            'name' => $request['name'],
            'role' => $request['role'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'sucursal' => $request['sucursal'],
            'password' => Hash::make($request['password']),
        ]);
        // validar que el username y el correo no existan

        return redirect()->route('listaUsuarios')->with('status','El usuario fue creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('usuario.usuario',[
            'user'=> $user,
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
    public function update(User $user)
    {

        request()->validate([
            'name'=>'required',
            'role'=>'required',
            'lastname'=>'required',
            'email'=>['required','email',
            Rule::unique('users')->ignore($user)],
            'sucursal'=>'string',
        ]);
        $user->update([
            'name'=> request('name'),
            'role'=> request('role'),
            'lastname'=> request('lastname'),
            'email'=> request('email'),
            'sucursal'=> request('sucursal'),
        ]);
            return redirect()->route('listaUsuarios')->with('status','El usuario fue actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete(); 
        return redirect()->route('listaUsuarios')->with('status','El usuario fue eliminado con exito');
    }

    public function perfil()
    {
        $userId=Auth::user()->id;
        $usuario=User::where('id',$userId)->get();

        return view('usuario.perfil',[
            'usuario'=>$usuario[0],
        ]);
    }

    public function updatePass()
    {
        $request=request();
        $request->user()->password;

        request()->validate([
            'passwordOld'=>'required|current_password',
            'contrasenaNueva'=>[
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
            'contrasenaNueva_confirmation'=>'required|min:8',
        ]);
        $userId=Auth::user()->id;
        $usuario=User::where('id',$userId)->get();
        User::where('id',$userId)->update([
            'password' => Hash::make($request['contrasenaNueva'])
        ]);
        
        return view('usuario.perfil',[
            'usuario'=>$usuario[0],
            'status'=>'Contrasena actualizada'
        ]);
    }
}

