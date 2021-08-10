<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $rolAdmin=Role::create(['name'=>'admin']);
        $rolDocente = Role::create(['name'=>'docente']);
        $rolAlumno = Role::create(['name'=>'alumno']);

Permission::create(['name'=>'admin.ingresar.usuario'])->syncRoles([$rolAdmin]);
Permission::create(['name'=>'admin.ingresar.profesores'])->syncRoles([$rolAdmin]);
Permission::create(['name'=>'admin.asingar.profesores'])->syncRoles([$rolAdmin]);
Permission::create(['name'=>'admin.asingar.alumnos'])->syncRoles([$rolAdmin]);
Permission::create(['name'=>'admin.asignar.materias.alumno'])->syncRoles([$rolAdmin]);
Permission::create(['name'=>'admin.asignar.materias.profesor'])->syncRoles([$rolAdmin]);
Permission::create(['name'=>'admin.asignar.permisos'])->syncRoles([$rolAdmin]);
Permission::create(['name'=>'admin.asignar.admin'])->syncRoles([$rolAdmin]);

Permission::create(['name'=>'docente.calificar.materias'])->syncRoles([$rolAdmin,$rolDocente]);
Permission::create(['name'=>'alumno.materias'])->syncRoles([$rolAlumno]);


    }
}
