<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//llamado
use App\Http\Requests;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Nivel;
use App\Asistencia;
use App\paralelo;
use App\ParaleloUs;
use App\anio;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CursoFormRequest;
// use App\Http\Requests\UserUpdateFormRequest;


use DB;
//

class DocAsisController extends Controller
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

    public function index (Request $request)
    {

        $request->user()->authorizeRoles('docent');
        $idU=$request->user()->id;

        $paralelos = DB::table('nivels')
            ->join('paralelos', 'nivels.id', '=', 'paralelos.idNivel')
            ->join('paralelo_user', 'paralelos.id', '=', 'paralelo_user.paralelo_id')
            ->join('users', 'users.id', '=', 'paralelo_user.user_id')
            ->where('users.id', '=', $idU)
            // ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();

        return view ('Docente.Asistencia.index')->with('paralelos', $paralelos);

        // }
    }

    public function listadoAlumnosParalelo($idParalelo){
        $paralelo = paralelo::find($idParalelo);
        if($this->validateAlumnosParalelo($idParalelo)){
            $paralelo->load('paraleloUsuario');
        }
        // dd($paralelo);
        return view('Docente.Asistencia.paralelos.index')->with('paralelo', $paralelo);
    }

    public function listadoAsistenciasParaleloUsuario(Request $request, $idParaleloUsuario){
        $fechaActual = date("Y-m-d");
        $paraleloUsuario = ParaleloUs::find($idParaleloUsuario);
        $nivel = Nivel::find($paraleloUsuario->paralelo->id);
        $paraleloUsuario->load('asistencia');

        if($request->session()->get('warning')){
            return view('Docente.Asistencia.paralelos.asistenciasUsuario')
            ->with('paraleloUsuario', $paraleloUsuario)
            ->with('nivel', $nivel)
            ->with('fechaActual', $fechaActual)
            ->with('warning', $request->session()->get('warning'));
        }else if($request->session()->get('success')){
            return view('Docente.Asistencia.paralelos.asistenciasUsuario')
            ->with('paraleloUsuario', $paraleloUsuario)
            ->with('nivel', $nivel)
            ->with('fechaActual', $fechaActual)
            ->with('warning', $request->session()->get('success'));
        }
        else{
            return view('Docente.Asistencia.paralelos.asistenciasUsuario')
            ->with('paraleloUsuario', $paraleloUsuario)
            ->with('nivel', $nivel)
            ->with('fechaActual', $fechaActual);
        }
    }

    private function validateAlumnosParalelo($idParalelo){
        return true;
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
    public function store(Request $request)
    {
        if($this->validateAsistencia($request->idParaleloUsuario, $request->fechaA)){
            Asistencia::create([
                "DescripAsis" => "Asistencia del día ". $request->fechaA,
                "estado" => "1",
                "fechaAsis" => $request->fechaA,
                "user_paralelo_id" => $request->idParaleloUsuario
            ]);
            return redirect()->route('docente.paralelo.usuario.infoasis',['idParaleloUsuario' => $request->idParaleloUsuario])
            ->with('success', 'Registro correcto de la asistencia!');
        }else{
            return redirect()->route('docente.paralelo.usuario.infoasis',['idParaleloUsuario' => $request->idParaleloUsuario])
            ->with('warning', 'Ya cuenta con la asistencia registrada para el día de hoy!');
        }
    }

    public function validateAsistencia($idParaleloUsuario, $fechaAsistencia){
        $asistencias = Asistencia::where([['user_paralelo_id','=', $idParaleloUsuario],['fechaAsis','=',$fechaAsistencia]])->get();
        return ($asistencias->count() <= 0);
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
}
