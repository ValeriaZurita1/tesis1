<?php

use Illuminate\Database\Seeder;
use App\Actividad;

class ActividadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $act= new Actividad();
        $act->descripcion = "vocales";
        $act->save();

        $act= new Actividad();
        $act->descripcion = "animales";
        $act->save();

        $act= new Actividad();
        $act->descripcion = "familia";
        $act->save();

        $act= new Actividad();
        $act->descripcion = "numeros";
        $act->save();
    }
}
