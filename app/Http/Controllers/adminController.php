<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//librerias para poderlas utilizar
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        //Creación de la vista de index para poder llamar
     return view('admin.index');

      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Aqui vamos aponer los datos para poder ejecutar
        //paginate nos sierve para mostrar cuantos datos
        //por pagina queremos mostrar
        $data = DB::table('users')->paginate(6);
                //Select * from users(Solo muestra 6)
      
       return view('admin.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Recibimos los parametros de la vista
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        //Verificación de que estan llegando los parametros
        //dd($name, $email, $password);
        DB::table('users')->insert([
            'name'=>$name,
            'email'=>$email,
            'password'=>Hash::make($password)
        ]);
       
        return view('admin.index')->with('resp', 'si');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Edición de usuarios
        //Recopilación de datos
        $data = DB::table('users')->where('id', '=', $id)->first();
        return view('admin.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
