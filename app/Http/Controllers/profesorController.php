<?php

namespace App\Http\Controllers;

use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (isset($_GET['buscar'])) {
            $users = DB::table('users')->select('id', 'name', 'email')
                ->where('name', 'LIKE', '%' . trim($_GET['buscar']) . '%')
                ->orWhere('id', 'LIKE', '%' . trim($_GET['buscar']))
                ->orWhere('email', 'LIKE', '%' . trim($_GET['buscar']))
                ->paginate(7);
        } else {
            $users = DB::table('users')->paginate(7);
        }

        return view('profe.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


$id=session('id');
$profeMateria= DB::table('materias')
->join('profemateria','profemateria.idmateria','=','materias.id')
->where('profemateria.idUser','=',$id)->get();



if(isset($_GET['cuatri']) && $_GET['cuatri']!=0 && $_GET['buscar']=='si'){

$alumno= DB::table('alumnoMateria')
->join('users','alumnoMateria.idAlumno','=','users.id')
->where('alumnoMateria.idSemestre','=',$_GET['cuatri'])->paginate(10);
dump($alumno);

}else{
    $alumno[0]=0;
}

return view('profe.create',compact('profeMateria','alumno'));

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $calif=$request->input('calif');
      $id=$request->input('id');
      foreach ($id as $key =>$eva){
          if($calif[$key]!=null){
              DB::table('alumnoMateria')
              ->where('idAlumno','=',$eva)
              ->update(['calif'=>calif[$key]]);
          }
      }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    //Mostrar las materias a cursar
    {

        $materias = DB::table('materias')->get();

        $profeMateria = DB::table('materias')
            ->join('profeMateria', 'profemateria.idmateria', '=', 'materias.id')
            ->where('profemateria.idUser', '=', $id)->get();



        if (isset($_GET['guardar']) && $_GET['guardar'] == 'si' && !empty($_GET['idMat'])) {

            foreach ($_GET['idMat'] as $val) {

                $resp = $profeMateria->where('idMateria', $val)->first();

                if (!$resp) {
                    DB::table('profeMateria')->insert([
                        'idUser' => $id,
                        'idMateria' => $val
                    ]);
                }
            }
        }

        if (isset($_GET['eliminar']) && $_GET['eliminar'] == 'eliminar' && !empty($_GET['idMat'])) {

            dump('Si');

            foreach ($_GET['idMat'] as $val) {
                DB::table('profeMateria')
                    ->where('id', '=', $val)
                    ->delete();
            }
        }


        return view('profe.edit', compact('materias', 'profeMateria'));
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
