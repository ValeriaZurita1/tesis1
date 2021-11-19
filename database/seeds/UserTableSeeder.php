<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_user = Role::where('name','user')->first();
        $role_admin = Role::where('name','admin')->first();
        $role_docent = Role::where('name','docent')->first();
        
        
        $user=new User();
        $user->name="Juan";
        $user->apellido="Perez";
        $user->direccion = "Av. Milton Reyes y Luis Urdaneta";
        $user->telefono = "0993476102";
        $user->celular = "0993476102";
        $user->email="juanP@hotmail.com";
        $user->estado = "1";
        $user->password=bcrypt('juan123');
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = "Marlon";
        $user->apellido="Mosquera";
        $user->direccion = "Av. Milton Reyes y Luis Urdaneta";
        $user->telefono = "0990099486";
        $user->celular = "0990099486";
        $user->email = "marlonmosquera_2005@hotmail.com";
        $user->estado = "1";
        $user->password = bcrypt('bartolomeo');
        $user->save();
        $user->roles()->attach($role_admin);

        $user=new User();
        $user->name="Valeria";
        $user->apellido="Tesis";
        $user->direccion = "Av. Milton Reyes y Luis Urdaneta";
        $user->telefono = "0993476102";
        $user->celular = "0993476102";
        $user->email="valeriaT@hotmail.com";
        $user->estado = "1";
        $user->password=bcrypt('valeriaV123');
        $user->save();
        $user->roles()->attach($role_docent);

        //
    }
}
