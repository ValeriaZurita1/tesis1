<?php

use Illuminate\Database\Seeder;

use App\User;
use App\SeccionActiv;
use App\Role;
use App\Test;
use App\Desactiv;
use App\DesactivUser;
use App\Destest;
use App\DesTestUser;
use App\paralelo;
use App\ParaleloUs;

class DataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name','user')->first();
        // $role_admin = Role::where('name','admin')->first();
        $role_docent = Role::where('name','docent')->first();

        $user = User::create([
            "name" => "Lesly",
            "apellido" => "Ortega",
            "direccion" => "La que cruza",
            "telefono" => "022766044",
            "celular" => "0996674478",
            "email" => "example@corebitsdev.com",
            "estado" => "1",
            "password" => bcrypt('123456789')
        ]);
        $user->roles()->attach($role_user);

        // for ($actividades=1; $actividades <= 20 ; $actividades++) {

        //     $dataActividad = SeccionActiv::find($actividades);

        //     // dd($actividades);



        //     for ($i=1; $i <=20 ; $i++) {
        //         if($i % 2 == 0){
        //             $tiempo = "10\"";
        //         }else {
        //             $tiempo = "11\"";
        //         }
        //         $desActiv = Desactiv::create([
        //             "estado" => "1",
        //             "tiempo" => $tiempo,
        //             "tiempoV" => $tiempo,
        //             "Alumno" => "Alex Soria",
        //             "idSecact" => $actividades
        //         ]);
        //         DesactivUser::create([
        //             "user_id" => $user->id,
        //             "desactiv_id" => $desActiv->id
        //         ]);


        //     }
        // }


        // for ($i=1; $i <=4 ; $i++) {
        //     for ($actividades=1; $actividades <= 20 ; $actividades++) {
        //         $dataActividad = SeccionActiv::find($actividades);
        //         $test = Test::create([
        //             "desTest" => "Test ". $dataActividad->descripcion,
        //             "tipoTest" => $i,
        //             "selecTest" => $actividades
        //         ]);
        //         for ($j=1; $j <=20 ; $j++) {
        //             $desTest = Destest::create([
        //                 "nombUsDes" => "Alex Soria",
        //                 "notaDes" => rand(1,10),
        //                 "fechaDes" => "2021-06-".$i,
        //                 "descTest" => $test->id
        //             ]);
        //             DesTestUser::create([
        //                 "user_id" => $user->id,
        //                 "destest_id" => $desTest->id
        //             ]);
        //         }
        //     }
        // }

        $user = User::create([
            "name" => "Alex",
            "apellido" => "Soria",
            "direccion" => "La que cruza",
            "telefono" => "022766044",
            "celular" => "0996674478",
            "email" => "example2@corebitsdev.com",
            "estado" => "1",
            "password" => bcrypt('123456789')
        ]);
        $user->roles()->attach($role_docent);

    }
}
