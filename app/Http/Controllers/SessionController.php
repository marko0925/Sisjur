<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Cliente;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    //
   

    public function salir()
    {
        Session::flush();
        return redirect("/");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function inicioSession(Request $request){
     // $pass=password_hash($request['contrasena'],PASSWORD_DEFAULT);
      $pass=$request['contrasena'];
      $cant=Persona::where('correo',$request['usuario'])->where('password',$pass)->count();
      if($cant!=0){
          $user=Persona::where('correo',$request['usuario'])->where('password',$pass)->first();
          //dd($user->all());
          Session::put('users',$user->toArray());
          //if($request['estado'])
           //   Session::put('estado',1);
          //else Session::put('estado',0);
          //dd($user->toArray());
         
          return redirect('/inicio');
      }
      return redirect("/")->with("status","Usuario o contraseña incorrectos");
      //return view('inicio');

    }

    public function inicio(){
        return view('login');
    }

    public function pruebaSession(){

      dd(Persona::find(1)->cliente());
    }
  
}
