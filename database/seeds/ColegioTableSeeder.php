<?php

use Illuminate\Database\Seeder;
use App\Colegio;

class ColegioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Col= new Colegio();
        $Col->nombre = "Unidad Educativa Especializada Sordos de Chimborazo";
        $Col->direccion = "Riobamba";
        $Col->telefono = "0999999999";
        $Col->save();
    }
}
