<?php

namespace App\Http\Controllers;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class alumnoController extends Controller


{
    public function index()
    {
        return view('index');
    }
    public function login()
    {
        return view('login');
    }

    public function datos(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha|',
        ]);


        $credentials = $request->only('email', 'password');


        $usr = $request->input('email');
        $res = DB::table('users')->where('email', '=', $usr)->first();


        session(['id' => $res->id]);

      //verificas que realmente me este devolviendo datos de la BD
        //$materias= DB::table('users')->get();
        //dump($materias);
        //  $user= DB::table('users')->get();


        if (Auth::attempt($credentials)) {
            return redirect(route('menulog'));
            // return redirect(route('menulog') , "?nom=$res->name")->with('id', $res->id);
        } else {
            return redirect(route('login'));
        }

        //dump($credentials);

    }

    public function menulog(Request $request)
    {

        $id = session('id');
        $res = DB::table('users')->where('id', '=', $id)->first();



        $materias = DB::table('materias')
            ->join('alumnoMateria', 'alumnoMateria.idSemestre', '=', 'materias.id')
            ->where('alumnoMateria.idAlumno', '=', $res->id)->get();


        return view('menulog', [
            'materias' => $materias,
            'nom' => $res->name
        ]);
    }


    public function contacto()
    {
        return view('contacto');
    }
    public function carreras()
    {
        return view('carreras');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
