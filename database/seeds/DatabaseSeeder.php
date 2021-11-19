<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ColegioTableSeeder::class);
        $this->call(NivelTableSeeder::class);
        $this->call(UserDesTableSeeder::class);
        $this->call(ActividadTableSeeder::class);
        $this->call(SeccActivTableSeeder::class);
        $this->call(DataTableSeeder::class);
        // $this->call(ParalelosSeeder::class);
        // $this->call(ArregloFuncionActividadSeeder::class);
        // $this->call(AsistenciasSeeder::class);
    }
}
