<?php

use Illuminate\Database\Seeder;
use App\Asistencia;


class AsistenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <=30 ; $i++) {
            Asistencia::create([
                "DescripAsis" => "Asistencia del día 2021-06-". $i,
                "estado"  => "1",
                "fechaAsis" => "2021-06-".$i,
                "user_paralelo_id" => 1
            ]);
        }

        for ($i=1; $i <= 16 ; $i++) {
            Asistencia::create([
                "DescripAsis" => "Asistencia del día 2021-07-". $i,
                "estado"  => "1",
                "fechaAsis" => "2021-07-".$i,
                "user_paralelo_id" => 1
            ]);
        }

    }
}
