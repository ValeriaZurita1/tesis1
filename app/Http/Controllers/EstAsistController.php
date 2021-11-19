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
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CursoFormRequest;
use Carbon\Carbon;
// use App\Http\Requests\UserUpdateFormRequest;


use DB;
//

class EstAsistController extends Controller
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
        $fechaHoy = date('Y-m-d');
        $user = Auth::user();

        if($request->idParaleloUsuario){
            $paraleloUsuario = ParaleloUs::find($request->idParaleloUsuario)->load('asistencia');
        }else{
            $paraleloUsuario = ParaleloUs::where('user_id', $user->id)->with('asistencia')->first();
        }

        if($paraleloUsuario){
            $dataParalelos = ParaleloUs::where('user_id', $user->id)->get();
            $asistencias = Asistencia::where('user_paralelo_id', $paraleloUsuario->id)->get();
        }else{
            $asistencias = [];
            $dataParalelos = null;
        }

        //dd($dataParalelos);

        if($request->session()->get('warning')){
            return view ('Estudiante.Asistencia.index',
            ["paraleloUsuario" => $paraleloUsuario, "user" => $user, "asistencias" => $asistencias, "fechaHoy" => $fechaHoy,"dataParalelos" => $dataParalelos])
            ->with('warning', $request->session()->get('warning'));
        }else if($request->session()->get('success')){
            return view ('Estudiante.Asistencia.index',
            ["paraleloUsuario" => $paraleloUsuario, "user" => $user, "asistencias" => $asistencias, "fechaHoy" => $fechaHoy,"dataParalelos" => $dataParalelos])
            ->with('warning', $request->session()->get('success'));
        }
        else{
            return view ('Estudiante.Asistencia.index',
            ["paraleloUsuario" => $paraleloUsuario, "user" => $user, "asistencias" => $asistencias, "fechaHoy" => $fechaHoy, "dataParalelos" => $dataParalelos]);
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
    public function store (Request $request)
    {

        $request->user()->authorizeRoles('user');
        $user = $request->user();
        $userParalelo = ParaleloUs::where('user_id', $user->id)
            ->where('paralelo_id', $request->idNivel2)->first();
        $data = [
            "DescripAsis" => "Asistencia del dia ".$request->fechaA,
            'fechaAsis' => $request->fechaA,
            "estado" => "1",
            "user_paralelo_id" => $userParalelo->id
        ];
        if($this->validateAsistenciaFecha($data)){
            Asistencia::create($data);
            return redirect('EstudianteSCH/Asistencia')->with('success', 'Asistencia registrada correctamente');

        }else {
            return redirect('EstudianteSCH/Asistencia')
            ->with('warning', 'Ya se registró la asistencia el día de hoy!');
        }
    }

    private function validateAsistenciaFecha($data){
        $asistencias = Asistencia::where([['user_paralelo_id','=', $data["user_paralelo_id"]],['fechaAsis','=',$data["fechaAsis"]]])->get();
        return ($asistencias->count() <= 0);
        $asistencia = DB::table('asistencias')
            ->leftJoin('paralelo_user', 'asistencias.user_paralelo_id', '=', 'paralelo_user.id')
            ->where([
                    ['asistencias.fechaAsis', '=', $data["fechaAsis"]],
                    ['paralelo_user.id', '=', $data["user_paralelo_id"]]
                    ])
            ->get();
        return($asistencia->count() <= 0);
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
