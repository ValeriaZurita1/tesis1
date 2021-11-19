<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//llamado
use App\Http\Requests;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\User;
use App\Desactiv;
use App\SeccionActiv;
use Auth;
use App\DesactivUser;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use DB;
//

class EstRompController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //VOCALES
    public function indexA(Request $request)
    {
        $request->user()->authorizeRoles('user');
        // $m=date("i");
        // $s=date("s");
        // $c=$m.":".$s;
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.vocales.a.index');
        }
    }

    public function indexE(Request $request)
    {
        $request->user()->authorizeRoles('user');
        $m=date("i");
        $s=date("s");
        $c=$m.":".$s;
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.vocales.e.index',["c"=>$c]);
        }
    }

    public function indexI(Request $request)
    {
        $request->user()->authorizeRoles('user');
        $m=date("i");
        $s=date("s");
        $c=$m.":".$s;
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.vocales.i.index',["c"=>$c]);
        }
    }

    public function indexO(Request $request)
    {
        $request->user()->authorizeRoles('user');
        $m=date("i");
        $s=date("s");
        $c=$m.":".$s;
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.vocales.o.index',["c"=>$c]);
        }
    }

    public function indexU(Request $request)
    {
        $request->user()->authorizeRoles('user');
        $m=date("i");
        $s=date("s");
        $c=$m.":".$s;
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.vocales.u.index',["c"=>$c]);
        }
    }
    //
    //NUMEROS
    public function indexNU(Request $request)
    {
        $request->user()->authorizeRoles('user');
        $m=date("i");
        $s=date("s");
        $c=$m.":".$s;
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.numeros.1.index',["c"=>$c]);
        }
    }

    public function indexND(Request $request)
    {
        $request->user()->authorizeRoles('user');
        $m=date("i");
        $s=date("s");
        $c=$m.":".$s;
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.numeros.2.index',["c"=>$c]);
        }
    }

    public function indexNT(Request $request)
    {
        $request->user()->authorizeRoles('user');
        $m=date("i");
        $s=date("s");
        $c=$m.":".$s;
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.numeros.3.index',["c"=>$c]);
        }
    }

    public function indexNC(Request $request)
    {
        $request->user()->authorizeRoles('user');
        $m=date("i");
        $s=date("s");
        $c=$m.":".$s;
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.numeros.4.index',["c"=>$c]);
        }
    }

    public function indexNCC(Request $request)
    {
        $request->user()->authorizeRoles('user');
        $m=date("i");
        $s=date("s");
        $c=$m.":".$s;
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.numeros.5.index',["c"=>$c]);
        }
    }
     //
     //FAMILIA
    public function indexPa(Request $request)
    {
        $request->user()->authorizeRoles('user');
        $m=date("i");
        $s=date("s");
        $c=$m.":".$s;
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.familia.papa.index',["c"=>$c]);
        }
    }

    public function indexMa(Request $request)
    {
        $request->user()->authorizeRoles('user');
        $m=date("i");
        $s=date("s");
        $c=$m.":".$s;
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.familia.mama.index',["c"=>$c]);
        }
    }

    public function indexHer(Request $request)
    {
        $request->user()->authorizeRoles('user');
        $m=date("i");
        $s=date("s");
        $c=$m.":".$s;
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.familia.hermano.index',["c"=>$c]);
        }
    }

    public function indexAbu(Request $request)
    {
        $request->user()->authorizeRoles('user');
        $m=date("i");
        $s=date("s");
        $c=$m.":".$s;
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.familia.abuelo.index',["c"=>$c]);
        }
    }

    public function indexPri(Request $request)
    {
        $request->user()->authorizeRoles('user');
        $m=date("i");
        $s=date("s");
        $c=$m.":".$s;
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.familia.primo.index',["c"=>$c]);
        }
    }
     //ANIMALES
    public function indexElef(Request $request)
    {
        $request->user()->authorizeRoles('user');
        $m=date("i");
        $s=date("s");
        $c=$m.":".$s;
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.animales.elef.index',["c"=>$c]);
        }
    }

    public function indexGall(Request $request)
    {
        $request->user()->authorizeRoles('user');
        $m=date("i");
        $s=date("s");
        $c=$m.":".$s;
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.animales.gallo.index',["c"=>$c]);
        }
    }

    public function indexGat(Request $request)
    {
        $request->user()->authorizeRoles('user');
        $m=date("i");
        $s=date("s");
        $c=$m.":".$s;
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.animales.gato.index',["c"=>$c]);
        }
    }

    public function indexPerr(Request $request)
    {
        $request->user()->authorizeRoles('user');
        $m=date("i");
        $s=date("s");
        $c=$m.":".$s;
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.animales.perro.index',["c"=>$c]);
        }
    }

    public function indexVac(Request $request)
    {
        $request->user()->authorizeRoles('user');
        $m=date("i");
        $s=date("s");
        $c=$m.":".$s;
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.animales.vaca.index',["c"=>$c]);
        }
    }
     //

    public function index (Request $request)
    {

        $request->user()->authorizeRoles('user');
        if ($request)
        {
            return view ('Estudiante.Rompecabezas.vocales.index');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($let, Request $request)
    {
        // $user = Auth::user();
        $ruta ="";
        $parametro = "";
        $dataActividad = [
            "alumno" => Auth::user()->name . Auth::user()->apellido,
            "idUsuario" => Auth::user()->id,
            "tiempo" => $request->tiempo,
            "tiempoV" => $request->aciertos
        ];

        switch($let){
            case "A": $seccionActividad = SeccionActiv::where("descripcion","A")->first();
                      $dataActividad["idSecionActividad"] = $seccionActividad->id;
                      $ruta = "Estudiantes.actividades.testVocals.a";
                      $parametro = $request->tiempo;
                break;
            case "E": $seccionActividad = SeccionActiv::where("descripcion","E")->first();
                      $dataActividad["idSecionActividad"] = $seccionActividad->id;
                      $ruta = "Estudiantes.actividades.testVocals.e";
                      $parametro = $request->tiempo;
                break;
            case "I": $seccionActividad = SeccionActiv::where("descripcion","I")->first();
                      $dataActividad["idSecionActividad"] = $seccionActividad->id;
                      $ruta = "Estudiantes.actividades.testVocals.i";
                      $parametro = $request->tiempo;
                break;
            case "O": $seccionActividad = SeccionActiv::where("descripcion","O")->first();
                      $dataActividad["idSecionActividad"] = $seccionActividad->id;
                      $ruta = "Estudiantes.actividades.testVocals.o";
                      $parametro = $request->tiempo;
                break;
            case "U": $seccionActividad = SeccionActiv::where("descripcion","U")->first();
                      $dataActividad["idSecionActividad"] = $seccionActividad->id;
                      $ruta = "Estudiantes.actividades.testVocals.u";
                      $parametro = $request->tiempo;
                break;

            case "Numero1": $seccionActividad = SeccionActiv::where("descripcion","Uno")->first();
                          $dataActividad["idSecionActividad"] = $seccionActividad->id;
                          $ruta = "Estudiantes.actividades.testNumeros.1";
                          $parametro = $request->tiempo;
                    break;
            case "Numero2": $seccionActividad = SeccionActiv::where("descripcion","Dos")->first();
                          $dataActividad["idSecionActividad"] = $seccionActividad->id;
                          $ruta = "Estudiantes.actividades.testNumeros.2";
                          $parametro = $request->tiempo;
                    break;
            case "Numero3": $seccionActividad = SeccionActiv::where("descripcion","Tres")->first();
                          $dataActividad["idSecionActividad"] = $seccionActividad->id;
                          $ruta = "Estudiantes.actividades.testNumeros.3";
                          $parametro = $request->tiempo;
                    break;
            case "Numero4": $seccionActividad = SeccionActiv::where("descripcion","Cuatro")->first();
                          $dataActividad["idSecionActividad"] = $seccionActividad->id;
                          $ruta = "Estudiantes.actividades.testNumeros.4";
                          $parametro = $request->tiempo;
                break;
            case "Numero5": $seccionActividad = SeccionActiv::where("descripcion","Cinco")->first();
                          $dataActividad["idSecionActividad"] = $seccionActividad->id;
                          $ruta = "Estudiantes.actividades.testNumeros.5";
                          $parametro = $request->tiempo;
                break;
            case "Abuelo": $seccionActividad = SeccionActiv::where("descripcion","Abuelo")->first();
                            $dataActividad["idSecionActividad"] = $seccionActividad->id;
                            $ruta = "Estudiantes.actividades.familia.abuelo";
                            $parametro = $request->tiempo;
                break;
            case "Hermano": $seccionActividad = SeccionActiv::where("descripcion","Hermano")->first();
                            $dataActividad["idSecionActividad"] = $seccionActividad->id;
                            $ruta = "Estudiantes.actividades.familia.hermano";
                            $parametro = $request->tiempo;
                break;
            case "Mama": $seccionActividad = SeccionActiv::where("descripcion","Mamá")->first();
                            $dataActividad["idSecionActividad"] = $seccionActividad->id;
                            $ruta = "Estudiantes.actividades.familia.mama";
                            $parametro = $request->tiempo;
                break;
            case "Papa": $seccionActividad = SeccionActiv::where("descripcion","Papá")->first();
                            $dataActividad["idSecionActividad"] = $seccionActividad->id;
                            $ruta = "Estudiantes.actividades.familia.papa";
                            $parametro = $request->tiempo;
                break;
            case "Primo": $seccionActividad = SeccionActiv::where("descripcion","Primo")->first();
                            $dataActividad["idSecionActividad"] = $seccionActividad->id;
                            $ruta = "Estudiantes.actividades.familia.primo";
                            $parametro = $request->tiempo;
                break;
            case "Elefante": $seccionActividad = SeccionActiv::where("descripcion","Elefante")->first();
                            $dataActividad["idSecionActividad"] = $seccionActividad->id;
                            $ruta = "Estudiantes.actividades.animales.elefante";
                            $parametro = $request->tiempo;
                break;
            case "Gallo": $seccionActividad = SeccionActiv::where("descripcion","Gallo")->first();
                            $dataActividad["idSecionActividad"] = $seccionActividad->id;
                            $ruta = "Estudiantes.actividades.animales.gallo";
                            $parametro = $request->tiempo;
                break;
            case "Gato":    $seccionActividad = SeccionActiv::where("descripcion","Gato")->first();
                            $dataActividad["idSecionActividad"] = $seccionActividad->id;
                            $ruta = "Estudiantes.actividades.animales.gato";
                            $parametro = $request->tiempo;
                break;
            case "Perro":    $seccionActividad = SeccionActiv::where("descripcion","Perro")->first();
                            $dataActividad["idSecionActividad"] = $seccionActividad->id;
                            $ruta = "Estudiantes.actividades.animales.perro";
                            $parametro = $request->tiempo;
                break;
            case "Vaca":   $seccionActividad = SeccionActiv::where("descripcion","Vaca")->first();
                            $dataActividad["idSecionActividad"] = $seccionActividad->id;
                            $ruta = "Estudiantes.actividades.animales.vaca";
                            $parametro = $request->tiempo;
                break;

        }

        $this->insertDataSeccionActividad($dataActividad);
        if($parametro != ""){
            return redirect()->route($ruta, [$parametro])->with('message', 'Datos del rompecabezas almacenados');
        }else {
            return redirect($ruta)->with('message', 'Datos del rompecabezas almacenados');
        }
    }

    private function insertDataSeccionActividad($dataActividad){
        $desactiv = Desactiv::create([
            "estado" => 1,
            "tiempo" => $dataActividad["tiempo"],
            "Alumno" => $dataActividad["alumno"],
            "idSecact" => $dataActividad["idSecionActividad"],
            "tiempoV" => ""
        ]);
        DesactivUser::create([
            "user_id" => $dataActividad["idUsuario"],
            "desactiv_id" => $desactiv->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //VOCALES
    public function verObjA(Request $request,$tiempo)
    {
        $request->user()->authorizeRoles(['user']);
        // Para obtener el id de la actividad con descripcion A
        $dataSeccionAct = SeccionActiv::where('descripcion', 'A')->first();

        if($dataSeccionAct){
            $VaT =  $dataSeccionAct->id;
            $idA = $dataSeccionAct->id;
        } else{
            $VaT = '1';
            $idA = '1';
        }

        $Alum=$request->user()->name.' '.$request->user()->apellido; //nombre

        $Des=new Desactiv;
        $Des->estado='1';
        $Des->tiempo=$tiempo;
        $Des->tiempoV=$tiempo;
        $Des->Alumno=$Alum;
        $Des->idSecact=$idA;
        $Des->save();
        return redirect()->action('EstContTestController@verTestA', [$VaT]);
    }

    public function verObjE(Request $request,$tiempo)
    {
        $request->user()->authorizeRoles(['user']);
        // Para obtener el id de la actividad con descripcion E
        $dataSeccionAct = SeccionActiv::where('descripcion', 'E')->first();

        if($dataSeccionAct){
            $VaT =  $dataSeccionAct->id;
            $idA = $dataSeccionAct->id;
        } else{
            $VaT = '2';
            $idA = '2';
        }

        $Alum=$request->user()->name.' '.$request->user()->apellido; //nombre

        $Des=new Desactiv;
        $Des->estado='1';
        $Des->tiempo=$tiempo;
        $Des->tiempoV=$tiempo;
        $Des->Alumno=$Alum;
        $Des->idSecact=$idA;
        $Des->save();
        return redirect()->action('EstContTestController@verTestE', [$VaT]);
    }

    public function verObjI(Request $request,$tiempo)
    {
        $request->user()->authorizeRoles(['user']);
        // Para obtener el id de la actividad con descripcion I
        $dataSeccionAct = SeccionActiv::where('descripcion', 'I')->first();

        if($dataSeccionAct){
            $VaT =  $dataSeccionAct->id;
            $idA = $dataSeccionAct->id;
        } else{
            $VaT = '3';
            $idA = '3';
        }

        $Alum=$request->user()->name.' '.$request->user()->apellido; //nombre

        $Des=new Desactiv;
        $Des->estado='1';
        $Des->tiempo=$tiempo;
        $Des->tiempoV=$tiempo;
        $Des->Alumno=$Alum;
        $Des->idSecact=$idA;
        $Des->save();
        return redirect()->action('EstContTestController@verTestI', [$VaT]);
    }

    public function verObjO(Request $request,$tiempo)
    {
        $request->user()->authorizeRoles(['user']);
        // Para obtener el id de la actividad con descripcion O
        $dataSeccionAct = SeccionActiv::where('descripcion', 'O')->first();

        if($dataSeccionAct){
            $VaT =  $dataSeccionAct->id;
            $idA = $dataSeccionAct->id;
        } else{
            $VaT = '4';
            $idA = '4';
        }

        $Alum=$request->user()->name.' '.$request->user()->apellido; //nombre

        $Des=new Desactiv;
        $Des->estado='1';
        $Des->tiempo=$tiempo;
        $Des->tiempoV=$tiempo;
        $Des->Alumno=$Alum;
        $Des->idSecact=$idA;
        $Des->save();
        return redirect()->action('EstContTestController@verTestO', [$VaT]);
    }

    public function verObjU(Request $request,$tiempo)
    {
        $request->user()->authorizeRoles(['user']);
        // Para obtener el id de la actividad con descripcion U
        $dataSeccionAct = SeccionActiv::where('descripcion', 'U')->first();

        if($dataSeccionAct){
            $VaT =  $dataSeccionAct->id;
            $idA = $dataSeccionAct->id;
        } else{
            $VaT = '5';
            $idA = '5';
        }

        $Alum=$request->user()->name.' '.$request->user()->apellido; //nombre

        $Des=new Desactiv;
        $Des->estado='1';
        $Des->tiempo=$tiempo;
        $Des->tiempoV=$tiempo;
        $Des->Alumno=$Alum;
        $Des->idSecact=$idA;
        $Des->save();
        return redirect()->action('EstContTestController@verTestU', [$VaT]);
    }

    //NUMEROS
    public function verObjNU(Request $request,$tiempo)
    {
        $request->user()->authorizeRoles(['user']);
        // Para obtener el id de la actividad con descripcion Uno
        $dataSeccionAct = SeccionActiv::where('descripcion', 'Uno')->first();

        if($dataSeccionAct){
            $VaT =  $dataSeccionAct->id;
            $idA = $dataSeccionAct->id;
        } else{
            $VaT = '16';
            $idA = '16';
        }

        $Alum=$request->user()->name.' '.$request->user()->apellido; //nombre

        $Des=new Desactiv;
        $Des->estado='1';
        $Des->tiempo=$tiempo;
        $Des->tiempoV=$tiempo;
        $Des->Alumno=$Alum;
        $Des->idSecact=$idA;
        $Des->save();
        return redirect()->action('EstContTestController@verTestNU', [$VaT]);
    }

    public function verObjND(Request $request,$tiempo)
    {
        $request->user()->authorizeRoles(['user']);
        // Para obtener el id de la actividad con descripcion Dos
        $dataSeccionAct = SeccionActiv::where('descripcion', 'Dos')->first();

        if($dataSeccionAct){
            $VaT =  $dataSeccionAct->id;
            $idA = $dataSeccionAct->id;
        } else{
            $VaT = '17';
            $idA = '17';
        }

        $Alum=$request->user()->name.' '.$request->user()->apellido; //nombre

        $Des=new Desactiv;
        $Des->estado='1';
        $Des->tiempo=$tiempo;
        $Des->tiempoV=$tiempo;
        $Des->Alumno=$Alum;
        $Des->idSecact=$idA;
        $Des->save();
        return redirect()->action('EstContTestController@verTestND', [$VaT]);
    }

    public function verObjNT(Request $request,$tiempo)
    {
        $request->user()->authorizeRoles(['user']);
        // Para obtener el id de la actividad con descripcion Tres
        $dataSeccionAct = SeccionActiv::where('descripcion', 'Tres')->first();

        if($dataSeccionAct){
            $VaT =  $dataSeccionAct->id;
            $idA = $dataSeccionAct->id;
        } else{
            $VaT = '18';
            $idA = '18';
        }

        $Alum=$request->user()->name.' '.$request->user()->apellido; //nombre

        $Des=new Desactiv;
        $Des->estado='1';
        $Des->tiempo=$tiempo;
        $Des->tiempoV=$tiempo;
        $Des->Alumno=$Alum;
        $Des->idSecact=$idA;
        $Des->save();
        return redirect()->action('EstContTestController@verTestNT', [$VaT]);
    }

    public function verObjNC(Request $request,$tiempo)
    {
        $request->user()->authorizeRoles(['user']);
        // Para obtener el id de la actividad con descripcion Cuatro
        $dataSeccionAct = SeccionActiv::where('descripcion', 'Cuatro')->first();

        if($dataSeccionAct){
            $VaT =  $dataSeccionAct->id;
            $idA = $dataSeccionAct->id;
        } else{
            $VaT = '19';
            $idA = '19';
        }

        $Alum=$request->user()->name.' '.$request->user()->apellido; //nombre

        $Des=new Desactiv;
        $Des->estado='1';
        $Des->tiempo=$tiempo;
        $Des->tiempoV=$tiempo;
        $Des->Alumno=$Alum;
        $Des->idSecact=$idA;
        $Des->save();
        return redirect()->action('EstContTestController@verTestNC', [$VaT]);
    }

    public function verObjNCC(Request $request,$tiempo)
    {
        $request->user()->authorizeRoles(['user']);
        // Para obtener el id de la actividad con descripcion Cinco
        $dataSeccionAct = SeccionActiv::where('descripcion', 'Cinco')->first();

        if($dataSeccionAct){
            $VaT =  $dataSeccionAct->id;
            $idA = $dataSeccionAct->id;
        } else{
            $VaT = '20';
            $idA = '20';
        }

        $Alum=$request->user()->name.' '.$request->user()->apellido; //nombre

        $Des=new Desactiv;
        $Des->estado='1';
        $Des->tiempo=$tiempo;
        $Des->tiempoV=$tiempo;
        $Des->Alumno=$Alum;
        $Des->idSecact=$idA;
        $Des->save();
        return redirect()->action('EstContTestController@verTestNCC', [$VaT]);
    }

    //FAMILIA
    public function verObjPa(Request $request,$tiempo)
    {
        $request->user()->authorizeRoles(['user']);
        // Para obtener el id de la actividad con descripcion Papá
        $dataSeccionAct = SeccionActiv::where('descripcion', 'Papá')->first();

        if($dataSeccionAct){
            $VaT =  $dataSeccionAct->id;
            $idA = $dataSeccionAct->id;
        } else{
            $VaT = '14';
            $idA = '14';
        }

        $Alum=$request->user()->name.' '.$request->user()->apellido; //nombre

        $Des=new Desactiv;
        $Des->estado='1';
        $Des->tiempo=$tiempo;
        $Des->tiempoV=$tiempo;
        $Des->Alumno=$Alum;
        $Des->idSecact=$idA;
        $Des->save();
        return redirect()->action('EstContTestController@verTestPA', [$VaT]);
    }

    public function verObjMa(Request $request,$tiempo)
    {
        $request->user()->authorizeRoles(['user']);
        // Para obtener el id de la actividad con descripcion Mamá
        $dataSeccionAct = SeccionActiv::where('descripcion', 'Mamá')->first();

        if($dataSeccionAct){
            $VaT =  $dataSeccionAct->id;
            $idA = $dataSeccionAct->id;
        } else{
            $VaT = '13';
            $idA = '13';
        }

        $Alum=$request->user()->name.' '.$request->user()->apellido; //nombre

        $Des=new Desactiv;
        $Des->estado='1';
        $Des->tiempo=$tiempo;
        $Des->tiempoV=$tiempo;
        $Des->Alumno=$Alum;
        $Des->idSecact=$idA;
        $Des->save();
        return redirect()->action('EstContTestController@verTestMA', [$VaT]);
    }

    public function verObjHer(Request $request,$tiempo)
    {
        $request->user()->authorizeRoles(['user']);
        // Para obtener el id de la actividad con descripcion Hermano
        $dataSeccionAct = SeccionActiv::where('descripcion', 'Hermano')->first();

        if($dataSeccionAct){
            $VaT =  $dataSeccionAct->id;
            $idA = $dataSeccionAct->id;
        } else{
            $VaT = '12';
            $idA = '12';
        }

        $Alum=$request->user()->name.' '.$request->user()->apellido; //nombre

        $Des=new Desactiv;
        $Des->estado='1';
        $Des->tiempo=$tiempo;
        $Des->tiempoV=$tiempo;
        $Des->Alumno=$Alum;
        $Des->idSecact=$idA;
        $Des->save();
        return redirect()->action('EstContTestController@verTestHER', [$VaT]);
    }

    public function verObjAbu(Request $request,$tiempo)
    {
        $request->user()->authorizeRoles(['user']);
        // Para obtener el id de la actividad con descripcion Abuelo
        $dataSeccionAct = SeccionActiv::where('descripcion', 'Abuelo')->first();

        if($dataSeccionAct){
            $VaT =  $dataSeccionAct->id;
            $idA = $dataSeccionAct->id;
        } else{
            $VaT = '11';
            $idA = '11';
        }

        $Alum=$request->user()->name.' '.$request->user()->apellido; //nombre

        $Des=new Desactiv;
        $Des->estado='1';
        $Des->tiempo=$tiempo;
        $Des->tiempoV=$tiempo;
        $Des->Alumno=$Alum;
        $Des->idSecact=$idA;
        $Des->save();
        return redirect()->action('EstContTestController@verTestABU', [$VaT]);
    }

    public function verObjPri(Request $request,$tiempo)
    {
        $request->user()->authorizeRoles(['user']);
        // Para obtener el id de la actividad con descripcion Primo
        $dataSeccionAct = SeccionActiv::where('descripcion', 'Primo')->first();

        if($dataSeccionAct){
            $VaT =  $dataSeccionAct->id;
            $idA = $dataSeccionAct->id;
        } else{
            $VaT = '15';
            $idA = '15';
        }

        $Alum=$request->user()->name.' '.$request->user()->apellido; //nombre

        $Des=new Desactiv;
        $Des->estado='1';
        $Des->tiempo=$tiempo;
        $Des->tiempoV=$tiempo;
        $Des->Alumno=$Alum;
        $Des->idSecact=$idA;
        $Des->save();
        return redirect()->action('EstContTestController@verTestPRI', [$VaT]);
    }

    //ANIMALES
    public function verObjElef(Request $request,$tiempo)
    {
        $request->user()->authorizeRoles(['user']);
        // Para obtener el id de la actividad con descripcion Elefante
        $dataSeccionAct = SeccionActiv::where('descripcion', 'Elefante')->first();

        if($dataSeccionAct){
            $VaT =  $dataSeccionAct->id;
            $idA = $dataSeccionAct->id;
        } else{
            $VaT = '6';
            $idA = '6';
        }

        $Alum=$request->user()->name.' '.$request->user()->apellido; //nombre

        $Des=new Desactiv;
        $Des->estado='1';
        $Des->tiempo=$tiempo;
        $Des->tiempoV=$tiempo;
        $Des->Alumno=$Alum;
        $Des->idSecact=$idA;
        $Des->save();
        return redirect()->action('EstContTestController@verTestELEF', [$VaT]);
    }

    public function verObjGall(Request $request,$tiempo)
    {
        $request->user()->authorizeRoles(['user']);
        // Para obtener el id de la actividad con descripcion Gallo
        $dataSeccionAct = SeccionActiv::where('descripcion', 'Gallo')->first();

        if($dataSeccionAct){
            $VaT =  $dataSeccionAct->id;
            $idA = $dataSeccionAct->id;
        } else{
            $VaT = '7';
            $idA = '7';
        }

        $Alum=$request->user()->name.' '.$request->user()->apellido; //nombre

        $Des=new Desactiv;
        $Des->estado='1';
        $Des->tiempo=$tiempo;
        $Des->tiempoV=$tiempo;
        $Des->Alumno=$Alum;
        $Des->idSecact=$idA;
        $Des->save();
        return redirect()->action('EstContTestController@verTestGall', [$VaT]);
    }

    public function verObjGat(Request $request,$tiempo)
    {
        $request->user()->authorizeRoles(['user']);
        // Para obtener el id de la actividad con descripcion Gato
        $dataSeccionAct = SeccionActiv::where('descripcion', 'Gato')->first();

        if($dataSeccionAct){
            $VaT =  $dataSeccionAct->id;
            $idA = $dataSeccionAct->id;
        } else{
            $VaT = '8';
            $idA = '8';
        }

        $Alum=$request->user()->name.' '.$request->user()->apellido; //nombre

        $Des=new Desactiv;
        $Des->estado='1';
        $Des->tiempo=$tiempo;
        $Des->tiempoV=$tiempo;
        $Des->Alumno=$Alum;
        $Des->idSecact=$idA;
        $Des->save();
        return redirect()->action('EstContTestController@verTestGat', [$VaT]);
    }

    public function verObjPerr(Request $request,$tiempo)
    {
        $request->user()->authorizeRoles(['user']);
        // Para obtener el id de la actividad con descripcion Perro
        $dataSeccionAct = SeccionActiv::where('descripcion', 'Perro')->first();

        if($dataSeccionAct){
            $VaT =  $dataSeccionAct->id;
            $idA = $dataSeccionAct->id;
        } else{
            $VaT = '9';
            $idA = '9';
        }

        $Alum=$request->user()->name.' '.$request->user()->apellido; //nombre

        $Des=new Desactiv;
        $Des->estado='1';
        $Des->tiempo=$tiempo;
        $Des->tiempoV=$tiempo;
        $Des->Alumno=$Alum;
        $Des->idSecact=$idA;
        $Des->save();
        return redirect()->action('EstContTestController@verTestPerr', [$VaT]);
    }

    public function verObjVac(Request $request,$tiempo)
    {
        $request->user()->authorizeRoles(['user']);
        // Para obtener el id de la actividad con descripcion Vaca
        $dataSeccionAct = SeccionActiv::where('descripcion', 'Vaca')->first();

        if($dataSeccionAct){
            $VaT =  $dataSeccionAct->id;
            $idA = $dataSeccionAct->id;
        } else{
            $VaT = '10';
            $idA = '10';
        }

        $Alum=$request->user()->name.' '.$request->user()->apellido; //nombre

        $Des=new Desactiv;
        $Des->estado='1';
        $Des->tiempo=$tiempo;
        $Des->tiempoV=$tiempo;
        $Des->Alumno=$Alum;
        $Des->idSecact=$idA;
        $Des->save();
        return redirect()->action('EstContTestController@verTestVac', [$VaT]);
    }

}
