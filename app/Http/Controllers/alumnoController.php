<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    public function index()
    {
        return view('index'); //muestro el menu (login)
    }

    public function login()
    {
        return view('login');
    }

    public function datos(Request $request)
    {

        /*$request->validate([
            'email'=>'required',
            'password'=>'required',
            'captcha'=>'required|captcha',
        ]);*/
        //  $code = $request->input('captcha');
        // $isHuman = captcha_validate($code);
        //dump($isHuman);


        $credentials = $request->only('email', 'password');
        // dump($credentials);
        //Verificar que realmetne me este devolviendo algo de la base de datos
        $email = $request->input('email');


        $res = DB::table('users')->where('email', '=', $email)->first();


        session(['id' => $res->id]);
        //dd($id);
        //die();
        //$urs = DB::table('users')->get();

        if (Auth::attempt($credentials)) {
            // return redirect(route('menulog'))->with('nom', $res->name);
            return redirect(route('menulog'));
        } else {

            return redirect(route('login'));
        }
    }
    public function menulog(Request $request)
    {

        //Select * from  user;
        //dump(session('email'));
        //echo session('nom');
        // die();
        // $nom = $request->input('nom');
        //creación de una sesión para el envio de parametros.
        // $prueba = $request->input('email');
        $id = session('id');
        //dd($id);
        //die();
        $res = DB::table('users')->where('id', '=', $id)->first();
        // dump($res->id);
        // die();
        $materias = DB::table('materias')
            ->join('alumnoMateria', 'alumnoMateria.idSemestre', '=', 'materias.id')
            ->where('alumnoMateria.idAlumno', '=', $res->id)->get();
        //$materias = DB::table('materias')->get();
        return view('menulog', [
            'materias' => $materias,
            'nom' => $res->name
        ]);
    }

    public function layaout()
    {
        return view('layaouts.plantilla');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
