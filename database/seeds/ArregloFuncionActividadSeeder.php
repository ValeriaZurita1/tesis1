<?php

use Illuminate\Database\Seeder;
use App\TestUser;

class ArregloFuncionActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 19 ; $i++) {
            for ($j=1; $j <=20 ; $j++) {
                TestUser::create(["user_id" => $i,"test_id" => $j]);
            }
        }
    }
}
