<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // artisan
User::create([
'name'=>'admin',
'email'=>'admin@utlag.edu.mx',
'password'=>Hash::make(123),
])->assignRole('admin');

User::factory(10)->create();


$materias=array('Diseño Web Profesional','Bases de datos','Aplicaciones Web 4.0','Diseño Digital');
$cuatri=array(8,8,5,5);
$timestamp=now();

foreach($materias as $key => $mat){

    DB::table('materias')->insert(
        ['materia'=>$mat,
        'cuatri'=>$cuatri[$key],
        'created_at'=>$timestamp,
        'updated_at'=>$timestamp,
]);
    
    
}


    }
}
