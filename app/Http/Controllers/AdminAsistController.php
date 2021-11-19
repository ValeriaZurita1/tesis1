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
use Fpdf;
//

class AdminAsistController extends Controller
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
        $request->user()->authorizeRoles('admin');
        $idU=$request->user()->id;

        $paralelos = DB::table('nivels')
            ->join('paralelos', 'nivels.id', '=', 'paralelos.idNivel')
            ->join('paralelo_user', 'paralelos.id', '=', 'paralelo_user.paralelo_id')
            ->join('users', 'users.id', '=', 'paralelo_user.user_id')
            // ->where('users.id', '=', $idU)
            // ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();



        return view ('Administrador.Asistencia.index')->with('paralelos', $paralelos);

        // $user=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbPU.user_id',$idU)
        //         ->get();
        // dd($user);
                // $f2=date_create()->format('Y-m-d');
                // $f1=date_create()->format('Y-m-d');
        // $asisR=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('nivels as tbNi', 'tbNi.id','=','tbP.idNivel')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->join('asistencia_user as tbAU', 'tbAU.user_id','=','tbU.id')
        //         ->join('asistencias as tbAs', 'tbAs.id','=','tbAU.asistencia_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol','tbAs.id as idAss','tbAs.DescripAsis as desAss','tbAs.fechaAsis','tbNi.nombreN as lvl','tbP.nombreP as cP','tbAs.estado as eA')
        //         ->whereBetween('tbAs.fechaAsis',[$f1,$f2])
        //         // ->where('tbPU.user_id',$idU)
        //         ->get();
        // $cAsis = DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('nivels as tbNi', 'tbNi.id','=','tbP.idNivel')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->join('asistencia_user as tbAU', 'tbAU.user_id','=','tbU.id')
        //         ->join('asistencias as tbAs', 'tbAs.id','=','tbAU.asistencia_id')
        //              ->select(DB::raw('count(*) as tar_count'))
        //              ->whereBetween('tbAs.fechaAsis',[$f1,$f2])
        //              // ->where('estado', '<>', 0)
        //              // ->groupBy('estado')
        //              ->get();
        // // dd($cAsis);
        // $countA=$cAsis[0]->tar_count;
        // // dd($asisR);
        // $idP=$user[0]->idPR;

        // $parall=paralelo::findOrFail($idP);

        // $nivel=Nivel::findOrFail($parall->idNivel);

        // $anio=anio::findOrFail($idP);
        // $userC=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('nivels as tbNi', 'tbNi.id','=','tbP.idNivel')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbNi.nombreN as lvl','tbP.nombreP as cP','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbP.id','LIKE','%'.$parall->id.'%')
        //         ->get();
        //         // dd($asisR);
        // $valor=$idP;
        // if ($request)
        // {
        //     if ($countA>='3') {
                # code...
                // return view ('Administrador.Asistencia.index',["valor"=>$valor,"asisR"=>$asisR,"user"=>$user,"userC"=>$userC,"parall"=>$parall,"nivel"=>$nivel,"anio"=>$anio]);
                // return view ('Administrador.Asistencia.index');
        //     }
        //     else{
        //         return view ('errors.403');
        //     }
        // }
    }

    public function listadoAlumnosParalelo(Request $request, $idParalelo){
        $paralelo = paralelo::find($idParalelo);

        $data = DB::select("SELECT pu.*, pa.nombreP as nombreParalelo, us.name as nombreUsuario, us.apellido as apellidoUsuario,  COUNT(asis.id) as numeroAsistencias FROM paralelo_user pu
        LEFT JOIN asistencias asis ON asis.user_paralelo_id = pu.id
        INNER JOIN paralelos pa ON pu.paralelo_id = pa.id
        INNER JOIN users us ON PU.user_id = us.id
        WHERE pa.id = $idParalelo
        GROUP BY pu.id;");

        $request->session()->put('reporteData', json_encode([
            'paralelo' => $paralelo,
            'reporte' => $data
        ]));

        if($this->validateAlumnosParalelo($idParalelo)){
            $paralelo->load('paraleloUsuario');
        }
        // dd($paralelo);
        return view('Administrador.Asistencia.paralelos.index')->with('paralelo', $paralelo);
    }

    private function validateAlumnosParalelo($idParalelo){
        return true;
    }

    public function listadoAsistenciasParaleloUsuario(Request $request, $idParaleloUsuario){
        $fechaActual = date("Y-m-d");
        $paraleloUsuario = ParaleloUs::find($idParaleloUsuario);
        $nivel = Nivel::find($paraleloUsuario->paralelo->id);
        $paraleloUsuario->load('asistencia');

          // Datos para la generacion del PDF
          $request->session()->put('reporteData', json_encode(['paraleloUsuario' =>$paraleloUsuario,
          'nivel' => $nivel,
          'fechaActual' => $fechaActual
         ]));

        if($request->session()->get('warning')){
            return view('Administrador.Asistencia.paralelos.asistenciasUsuario')
            ->with('paraleloUsuario', $paraleloUsuario)
            ->with('nivel', $nivel)
            ->with('fechaActual', $fechaActual)
            ->with('warning', $request->session()->get('warning'));
        }else if($request->session()->get('success')){
            return view('Administrador.Asistencia.paralelos.asistenciasUsuario')
            ->with('paraleloUsuario', $paraleloUsuario)
            ->with('nivel', $nivel)
            ->with('fechaActual', $fechaActual)
            ->with('warning', $request->session()->get('success'));
        }
        else{
            return view('Administrador.Asistencia.paralelos.asistenciasUsuario')
            ->with('paraleloUsuario', $paraleloUsuario)
            ->with('nivel', $nivel)
            ->with('fechaActual', $fechaActual);
        }
    }

    public function listadoAsistenciasParaleloUsuarioFechas(Request $request, $idParaleloUsuario){
        $fechaActual = date("Y-m-d");

          // Datos para la generacion del PDF
          if($request->fechaInicio && $request->fechaFin){
            $paraleloUsuario = ParaleloUs::find($idParaleloUsuario);
            $asistencias = Asistencia::where([
                ['created_at', '>=', $request->fechaInicio],
                ['created_at', '<=', $request->fechaFin],
            ])->get();

            $nivel = Nivel::find($paraleloUsuario->paralelo->id);
            $request->session()->put('reporteData', json_encode(['paraleloUsuario' =>$paraleloUsuario,
                'nivel' => $nivel,
                'fechaActual' => $fechaActual,
                'fechaInicio' => $request->fechaInicio,
                'fechaFin' => $request->fechaInicio,
                'asistencias' => $asistencias
            ]));
          } else {
            $paraleloUsuario = ParaleloUs::find($idParaleloUsuario);
            $nivel = Nivel::find($paraleloUsuario->paralelo->id);
            $asistencias = $paraleloUsuario->asistencia;

            $request->session()->put('reporteData', json_encode(['paraleloUsuario' =>$paraleloUsuario,
                'nivel' => $nivel,
                'fechaActual' => $fechaActual,
                'asistencias' => $asistencias
            ]));
          }

        if($request->session()->get('warning')){
            return view('Administrador.Asistencia.paralelos.asistenciasUsuario')
            ->with('paraleloUsuario', $paraleloUsuario)
            ->with('nivel', $nivel)
            ->with('fechaActual', $fechaActual)
            ->with('asistencias', $asistencias)
            ->with('warning', $request->session()->get('warning'));
        }else if($request->session()->get('success')){
            return view('Administrador.Asistencia.paralelos.asistenciasUsuario')
            ->with('paraleloUsuario', $paraleloUsuario)
            ->with('nivel', $nivel)
            ->with('fechaActual', $fechaActual)
            ->with('asistencias', $asistencias)
            ->with('warning', $request->session()->get('success'));
        }
        else{
            return view('Administrador.Asistencia.paralelos.asistenciasUsuario')
            ->with('paraleloUsuario', $paraleloUsuario)
            ->with('nivel', $nivel)
            ->with('asistencias', $asistencias)
            ->with('fechaActual', $fechaActual);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        return view ("Administrador.Asistencia.create");
    }

    /*
    *agregarestudiante al registro
    */
    public function AddEst(Request $request,$id)
    {

        // return view ('Administrador.Asistencia.modalR',["valor"=>$valor,"user"=>$user,"parall"=>$parall,"nivel"=>$nivel,"anio"=>$anio]);
        // dd($id);
        return Redirect::to('UnidadSCH/Asistencia');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {

        // for ($i=1; $i <= 30; $i++) {
        //     Asistencia::create([
        //         "DescripAsis" => "Asistencia del dia 2021-06-".$i,
        //         "estado" => "1",
        //         "fechaAsis" => "2021-06-".$i,
        //         "user_paralelo_id" => 2]);
        // }
        if($this->validateAsistencia($request->idParaleloUsuario, $request->fechaA)){
            Asistencia::create([
                "DescripAsis" => "Asistencia del día ". $request->fechaA,
                "estado" => "1",
                "fechaAsis" => $request->fechaA,
                "user_paralelo_id" => $request->idParaleloUsuario
            ]);
            return redirect()->route('administrador.paralelo.usuario.infoasis',['idParaleloUsuario' => $request->idParaleloUsuario])
            ->with('success', 'Registro correcto de la asistencia!');
        }else{
            return redirect()->route('administrador.paralelo.usuario.infoasis',['idParaleloUsuario' => $request->idParaleloUsuario])
            ->with('warning', 'Ya cuenta con la asistencia registrada para el día de hoy!');
        }
    }

    public function generatePdfAsistenciasUsuarioCurso(Request $request){
        $request->user()->authorizeRoles(['admin']);
        $dataReporte = json_decode($request->session()->get('reporteData'));
        Fpdf::AddPage();
        Fpdf::Image('ENCABEZ.JPG',20,20,-100);
        Fpdf::Ln(50);
        Fpdf::SetFont('Arial','B',12);
        Fpdf::Write(5,'Reporte de asistencias');


        Fpdf::Ln(10);
        Fpdf::Write(5,'Usuario:');
        Fpdf::SetFont('Arial','',12);
        Fpdf::Write(5, $dataReporte->paraleloUsuario->user->name . " " . $dataReporte->paraleloUsuario->user->apellido);

        Fpdf::Ln(10);
        Fpdf::SetFont('Arial','B',12);
        Fpdf::Write(5, 'Promedio de tiempo todas las actividades: ');
        Fpdf::SetFont('Arial','',12);
        Fpdf::Write(5,  $dataReporte->paraleloUsuario->paralelo->nombreP . " - " .$dataReporte->paraleloUsuario->paralelo->nivel->nombreN);

        Fpdf::Ln(10);
        Fpdf::Write(5,'Se muestran los datos de asistencia de un usuario');
        Fpdf::Ln(10);

        $desStr = iconv('UTF-8', 'windows-1252', "Descripción");
        Fpdf::Cell(90,6,$desStr,1,0,'C');
        Fpdf::Cell(90,6,'Fecha',1,0,'C');
        Fpdf::Ln();


        if( property_exists($dataReporte,'fechaInicio') && property_exists($dataReporte,'fechaFin') ){
            Fpdf::SetFont('Arial','B',12);
            Fpdf::Write(5, 'Fecha de inicio: ');
            Fpdf::SetFont('Arial','',12);
            Fpdf::Write(5,$dataReporte->fechaInicio);

            Fpdf::Ln(10);
            Fpdf::SetFont('Arial','B',12);
            Fpdf::Write(5, 'Fecha de Fin: ');
            Fpdf::SetFont('Arial','',12);
            Fpdf::Write(5,$dataReporte->fechaFin);
            Fpdf::Ln(10);
        }

        if(property_exists($dataReporte,'asistencias')){
            foreach ($dataReporte->asistencias as $asistencia) {
                $desAsStr = iconv('UTF-8', 'windows-1252', $asistencia->DescripAsis);
                Fpdf::Cell(90,6,$desAsStr,1,0,'L');
                Fpdf::Cell(90,6,$asistencia->fechaAsis,1,0,'L');
                Fpdf::Ln();
            }
        }else {
            foreach ($dataReporte->paraleloUsuario->asistencia as $asistencia) {
                $desAsStr = iconv('UTF-8', 'windows-1252', $asistencia->DescripAsis);
                Fpdf::Cell(90,6,$desAsStr,1,0,'L');
                Fpdf::Cell(90,6,$asistencia->fechaAsis,1,0,'L');
                Fpdf::Ln();
            }
        }
        Fpdf::Output();
        exit;
    }

    public function generatePdfAsistenciageneralCurso(Request $request){
        $request->user()->authorizeRoles(['admin']);
        $dataReporte = json_decode($request->session()->get('reporteData'));

        Fpdf::AddPage();
        Fpdf::Image('ENCABEZ.JPG',20,20,-100);
        Fpdf::Ln(50);
        Fpdf::SetFont('Arial','B',12);
        Fpdf::Write(5,'Reporte de asistencias del curso');

        // dd($dataReporte);

        Fpdf::Ln(10);
        Fpdf::Write(5,'Paralelo: ');
        Fpdf::SetFont('Arial','',12);
        Fpdf::Write(5, $dataReporte->paralelo->nombreP. " - " . $dataReporte->paralelo->nivel->nombreN);

        Fpdf::Ln(10);
        Fpdf::Cell(90,6,'Nombres y Apellidos',1,0,'C');
        $desStr = iconv('UTF-8', 'windows-1252', "Número de Asistencias");
        Fpdf::Cell(90,6,$desStr,1,0,'C');
        Fpdf::Ln();

        foreach ($dataReporte->reporte as $data) {
            Fpdf::Cell(90,6,$data->nombreUsuario . " " .$data->apellidoUsuario,1,0,'L');
            Fpdf::Cell(90,6,$data->numeroAsistencias,1,0,'L');
            Fpdf::Ln();
        }

        Fpdf::Output();
        exit;
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
    public function show (User $usuario)
    {

        return view("Administrador.Asistencia.show",compact('usuario'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {

        $request->user()->authorizeRoles(['admin','user']);
        $usuario=User::findOrFail($id);

        return view("Administrador.Asistencia.edit",["usuario"=>$usuario]);

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
        $role_user = Role::where('name','user')->first();
        $role_admin = Role::where('name','admin')->first();
        $role_docent = Role::where('name','docent')->first();

        $usuario=User::findOrFail($id);

        $usuario->name=$request->get('name');

        // $usuario->email=$request->get('email');

        $usuario->password=bcrypt($request->get('password'));

        $usuario->apellido=$request->get('apellido');

        $usuario->direccion=$request->get('direccion');

        $usuario->telefono=$request->get('telefono');

        $usuario->estado=$request->get('estado');

        $usuario->celular=$request->get('celular');

        $usuario->save();
        if($request->get('TI')=='1'){
            $usuario->roles()->attach($role_admin);
        }
        else{
            if($request->get('TI')=='2'){
                $usuario->roles()->attach($role_docent);
            }
            else{
                $usuario->roles()->attach($role_user);
            }
        }

        return Redirect::to('UnidadSCH/Asistencia');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $usuario=User::findOrFail($id);

        // $usuario->estado='0';

        $usuario->delete();

        return Redirect::to('UnidadSCH/Asistencia');


    }
}
