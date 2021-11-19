<?php

use Illuminate\Database\Seeder;
use App\paralelo;
use App\ParaleloUs;

class ParalelosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 7 ; $i++) {
            paralelo::create(["nombreP" => "A", "idNivel" => $i]);
            paralelo::create(["nombreP" => "B", "idNivel" => $i]);
        }

        ParaleloUs::create([
            "user_id" => 18,
            "paralelo_id" => 1
        ]);

        ParaleloUs::create([
            "user_id" => 19,
            "paralelo_id" => 1
        ]);

        ParaleloUs::create([
            "user_id" => 19,
            "paralelo_id" => 2
        ]);
    }
}
