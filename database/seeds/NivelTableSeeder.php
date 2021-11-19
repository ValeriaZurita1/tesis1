<?php

use Illuminate\Database\Seeder;
use App\Nivel;

class NivelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Col= new Nivel();
        $Col->nombreN = "Inicial II";
        $Col->idColegio = "1";
        $Col->save();

        $Col= new Nivel();
        $Col->nombreN = "Jardin";
        $Col->idColegio = "1";
        $Col->save();

        $Col= new Nivel();
        $Col->nombreN = "Segundo de Basica";
        $Col->idColegio = "1";
        $Col->save();

        $Col= new Nivel();
        $Col->nombreN = "Tercero de Basica";
        $Col->idColegio = "1";
        $Col->save();

        $Col= new Nivel();
        $Col->nombreN = "Cuarto de Basica";
        $Col->idColegio = "1";
        $Col->save();

        $Col= new Nivel();
        $Col->nombreN = "Quinto de Basica";
        $Col->idColegio = "1";
        $Col->save();

        $Col= new Nivel();
        $Col->nombreN = "Sexto de Basica";
        $Col->idColegio = "1";
        $Col->save();
    }
}
