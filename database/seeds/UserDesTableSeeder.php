<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;


class UserDesTableSeeder extends Seeder
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
        // $role_admin = Role::where('name','admin')->first();
        $role_docent = Role::where('name','docent')->first();
        
        //Usuarios
        $user=new User();
        $user->name="Juan";
        $user->apellido="Alvares";
        $user->direccion = "Av. Milton Reyes y Luis Urdaneta";
        $user->telefono = "0993476102";
        $user->celular = "0993476102";
        $user->email="juanA@hotmail.com";
        $user->estado = "1";
        $user->password=bcrypt('juan123');
        $user->save();
        $user->roles()->attach($role_user);

        $user=new User();
        $user->name="Cristina";
        $user->apellido="Perez";
        $user->direccion = "Av. Milton Reyes y Luis Urdaneta";
        $user->telefono = "0993476102";
        $user->celular = "0993476102";
        $user->email="cristinaP@hotmail.com";
        $user->estado = "1";
        $user->password=bcrypt('crist123');
        $user->save();
        $user->roles()->attach($role_user);

        $user=new User();
        $user->name="alexis";
        $user->apellido="Paez";
        $user->direccion = "Av. Milton Reyes y Luis Urdaneta";
        $user->telefono = "0993476102";
        $user->celular = "0993476102";
        $user->email="alexisP@hotmail.com";
        $user->estado = "1";
        $user->password=bcrypt('alexis123');
        $user->save();
        $user->roles()->attach($role_user);

        $user=new User();
        $user->name="Diana";
        $user->apellido="Carrera";
        $user->direccion = "Av. Milton Reyes y Luis Urdaneta";
        $user->telefono = "0993476102";
        $user->celular = "0993476102";
        $user->email="cianaC@hotmail.com";
        $user->estado = "1";
        $user->password=bcrypt('dianaC123');
        $user->save();
        $user->roles()->attach($role_user);

        $user=new User();
        $user->name="Carlos";
        $user->apellido="Andrade";
        $user->direccion = "Av. Milton Reyes y Luis Urdaneta";
        $user->telefono = "0993476102";
        $user->celular = "0993476102";
        $user->email="carlosA@hotmail.com";
        $user->estado = "1";
        $user->password=bcrypt('carlosA123');
        $user->save();
        $user->roles()->attach($role_user);

        $user=new User();
        $user->name="Elena";
        $user->apellido="Gilber";
        $user->direccion = "Av. Milton Reyes y Luis Urdaneta";
        $user->telefono = "0993476102";
        $user->celular = "0993476102";
        $user->email="elenaG@hotmail.com";
        $user->estado = "1";
        $user->password=bcrypt('elenaG123');
        $user->save();
        $user->roles()->attach($role_user);

        $user=new User();
        $user->name="Angela";
        $user->apellido="Arcos";
        $user->direccion = "Av. Milton Reyes y Luis Urdaneta";
        $user->telefono = "0993476102";
        $user->celular = "0993476102";
        $user->email="angelaA@hotmail.com";
        $user->estado = "1";
        $user->password=bcrypt('angelA123');
        $user->save();
        $user->roles()->attach($role_user);




        //Docentes 
        $user=new User();
        $user->name="Valeria";
        $user->apellido="Carnovan";
        $user->direccion = "Av. Milton Reyes y Luis Urdaneta";
        $user->telefono = "0993476102";
        $user->celular = "0993476102";
        $user->email="valeriaC@hotmail.com";
        $user->estado = "1";
        $user->password=bcrypt('valeriaV123');
        $user->save();
        $user->roles()->attach($role_docent);

        $user=new User();
        $user->name="Adalberto";
        $user->apellido="Tanes";
        $user->direccion = "Av. Milton Reyes y Luis Urdaneta";
        $user->telefono = "0993476102";
        $user->celular = "0993476102";
        $user->email="adalbertT@hotmail.com";
        $user->estado = "1";
        $user->password=bcrypt('valeriaV123');
        $user->save();
        $user->roles()->attach($role_docent);

        $user=new User();
        $user->name="Angela";
        $user->apellido="Tituaña";
        $user->direccion = "Av. Milton Reyes y Luis Urdaneta";
        $user->telefono = "0993476102";
        $user->celular = "0993476102";
        $user->email="angelaT@hotmail.com";
        $user->estado = "1";
        $user->password=bcrypt('valeriaV123');
        $user->save();
        $user->roles()->attach($role_docent);

        $user=new User();
        $user->name="Carlos";
        $user->apellido="Astudillo";
        $user->direccion = "Av. Milton Reyes y Luis Urdaneta";
        $user->telefono = "0993476102";
        $user->celular = "0993476102";
        $user->email="carlos.Astud@hotmail.com";
        $user->estado = "1";
        $user->password=bcrypt('valeriaV123');
        $user->save();
        $user->roles()->attach($role_docent);

        $user=new User();
        $user->name="Jose Luis";
        $user->apellido="Gilber";
        $user->direccion = "Av. Milton Reyes y Luis Urdaneta";
        $user->telefono = "0993476102";
        $user->celular = "0993476102";
        $user->email="jose.luisG@hotmail.com";
        $user->estado = "1";
        $user->password=bcrypt('valeriaV123');
        $user->save();
        $user->roles()->attach($role_docent);

        $user=new User();
        $user->name="Jeremi";
        $user->apellido="Salvatore";
        $user->direccion = "Av. Milton Reyes y Luis Urdaneta";
        $user->telefono = "0993476102";
        $user->celular = "0993476102";
        $user->email="jeremi.salv@hotmail.com";
        $user->estado = "1";
        $user->password=bcrypt('valeriaV123');
        $user->save();
        $user->roles()->attach($role_docent);

        $user=new User();
        $user->name="Bonnie";
        $user->apellido="Michaelson";
        $user->direccion = "Av. Milton Reyes y Luis Urdaneta";
        $user->telefono = "0993476102";
        $user->celular = "0993476102";
        $user->email="bonnie.Mich@hotmail.com";
        $user->estado = "1";
        $user->password=bcrypt('valeriaV123');
        $user->save();
        $user->roles()->attach($role_docent);

        //
    }
}
