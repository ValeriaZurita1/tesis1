<?php

use Illuminate\Database\Seeder;
use App\Actividad;
use App\SeccionActiv;

class SeccActivTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $activV = Actividad::where('descripcion','vocales')->first();
        $activA = Actividad::where('descripcion','animales')->first();
        $activF = Actividad::where('descripcion','familia')->first();
        $activN = Actividad::where('descripcion','numeros')->first();

        $act= new SeccionActiv();
        $act->descripcion = "A";
        $act->idActiv = $activV->id;
        $act->save();

        $act= new SeccionActiv();
        $act->descripcion = "E";
        $act->idActiv = $activV->id;
        $act->save();

        $act= new SeccionActiv();
        $act->descripcion = "I";
        $act->idActiv = $activV->id;
        $act->save();

        $act= new SeccionActiv();
        $act->descripcion = "O";
        $act->idActiv = $activV->id;
        $act->save();

        $act= new SeccionActiv();
        $act->descripcion = "U";
        $act->idActiv = $activV->id;
        $act->save();

        //ANIMALES
        $act= new SeccionActiv();
        $act->descripcion = "Elefante";
        $act->idActiv = $activA->id;
        $act->save();

        $act= new SeccionActiv();
        $act->descripcion = "Gallo";
        $act->idActiv = $activA->id;
        $act->save();

        $act= new SeccionActiv();
        $act->descripcion = "Gato";
        $act->idActiv = $activA->id;
        $act->save();

        $act= new SeccionActiv();
        $act->descripcion = "Perro";
        $act->idActiv = $activA->id;
        $act->save();

        $act= new SeccionActiv();
        $act->descripcion = "Vaca";
        $act->idActiv = $activA->id;
        $act->save();

        //FAMILIA
        $act= new SeccionActiv();
        $act->descripcion = "Abuelo";
        $act->idActiv = $activF->id;
        $act->save();

        $act= new SeccionActiv();
        $act->descripcion = "Hermano";
        $act->idActiv = $activF->id;
        $act->save();

        $act= new SeccionActiv();
        $act->descripcion = "Mamá";
        $act->idActiv = $activF->id;
        $act->save();

        $act= new SeccionActiv();
        $act->descripcion = "Papá";
        $act->idActiv = $activF->id;
        $act->save();

        $act= new SeccionActiv();
        $act->descripcion = "Primo";
        $act->idActiv = $activF->id;
        $act->save();

        //NUMEROS

        $act= new SeccionActiv();
        $act->descripcion = "Uno";
        $act->idActiv = $activN->id;
        $act->save();

        $act= new SeccionActiv();
        $act->descripcion = "Dos";
        $act->idActiv = $activN->id;
        $act->save();

        $act= new SeccionActiv();
        $act->descripcion = "Tres";
        $act->idActiv = $activN->id;
        $act->save();

        $act= new SeccionActiv();
        $act->descripcion = "Cuatro";
        $act->idActiv = $activN->id;
        $act->save();

        $act= new SeccionActiv();
        $act->descripcion = "Cinco";
        $act->idActiv = $activN->id;
        $act->save();
    }
}
