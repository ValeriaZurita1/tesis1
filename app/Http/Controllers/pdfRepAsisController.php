<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\busquedaAsisFormRequest;

use DB;
use Fpdf;
use App\paralelo;
use App\ParaleloUs;
use App\SeccionActiv;
use App\Test;

class pdfRepAsisController extends Controller
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

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);


        $asisR=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('nivels as tbNi', 'tbNi.id','=','tbP.idNivel')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->join('asistencia_user as tbAU', 'tbAU.user_id','=','tbU.id')
                ->join('asistencias as tbAs', 'tbAs.id','=','tbAU.asistencia_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol','tbAs.id as idAss','tbAs.DescripAsis as desAss','tbAs.fechaAsis','tbNi.nombreN as lvl','tbP.nombreP as cP','tbAs.DescripAsis as DesAsis','tbAs.estado as eA')
                ->get();
        return view ('Administrador.Reportes.asistencia.index',["asisR"=>$asisR]);
    }

    public function indexAct(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $paralelos = paralelo::all();

        if($paralelos->count() > 0){
            $idParalelo = $paralelos[0]->id;
            $paralelo = paralelo::find($idParalelo);
            $usuariosParalelo = ParaleloUs::where('paralelo_id', $paralelos[0]->id)->get();
            $promedios = $this->promediosActividadUsuario($usuariosParalelo);
        } else {
            $paralelo = null;
            $usuariosParalelo = [];
            $promedios = [];
        }

        // Datos para la generacion del PDF
        $request->session()->put('reporteData', json_encode(['paralelo' =>$paralelo,
        'paralelos' => $paralelos,
        'usuariosParalelo' => $usuariosParalelo,
        'promedios' => $promedios
       ]));

        return view ('Administrador.Reportes.actividad.index',
        ['paralelo' =>$paralelo,
         'paralelos' => $paralelos,
         'usuariosParalelo' => $usuariosParalelo,
         'promedios' => $promedios
        ]);
    }

    private function promediosActividadUsuario($usuariosParalelo){
        $arrProm = array();
        foreach ($usuariosParalelo as $userParalelo) {
            $prom = $this->promedioTodasActividades($userParalelo->user->id);
            array_push($arrProm, round($prom,2));
        }
        return $arrProm;
    }


    public function indexActParalelo(Request $request){
        $request->user()->authorizeRoles(['admin']);
        $paralelos = paralelo::all();
        if($request->curso){
            $paralelo = paralelo::find($request->curso);
            $usuariosParalelo = ParaleloUs::where('paralelo_id', $request->curso)->get();
        } else {
            if($paralelos->count() > 0){
                $paralelo = paralelo::find($paralelos[0]->id);
                $usuariosParalelo = ParaleloUs::where('paralelo_id', $paralelos[0]->id)->get();
            }else {
                $paralelo = null;
                $usuariosParalelo = [];
            }
        }

        $promedios = $this->promediosActividadUsuario($usuariosParalelo);

        // Datos para la generacion del PDF
        $request->session()->put('reporteData', json_encode(['paralelo' =>$paralelo,
        'paralelos' => $paralelos,
        'usuariosParalelo' => $usuariosParalelo,
        'promedios' => $promedios
       ]));

        return view ('Administrador.Reportes.actividad.index',
        ['paralelo' =>$paralelo,
         'paralelos' => $paralelos,
         'usuariosParalelo' => $usuariosParalelo,
         'promedios' => $promedios
        ]);
    }

    public function actividadesEstudianteParalelo(Request $request, $idParaleloUsuario){
        $request->user()->authorizeRoles(['admin']);
        $seccionActivs = SeccionActiv::all();
        $paraleloUsuario = ParaleloUs::find($idParaleloUsuario);
        $dataSecAct = SeccionActiv::find($seccionActivs[0]->id);
        $desactivsUser = DB::table('desactiv_user')
        ->join('desactivs', 'desactiv_user.desactiv_id','=','desactivs.id')
        ->join('seccion_activs', 'desactivs.idSecact','=','seccion_activs.id')
        ->join('users', 'desactiv_user.user_id','=','users.id')
        ->where('desactiv_user.user_id', '=', $paraleloUsuario->user->id)
        ->where('desactivs.idSecact', '=', $seccionActivs[0]->id
        )->get();

        $promedios = [
            'promedioActividad' => round($this->promedioActividadEstudianteParalelo($desactivsUser), 2) ,
            'promedioActividades' => round($this->promedioTodasActividades($paraleloUsuario->user->id), 2)
        ];

        $request->session()->put('reporteData', json_encode(['dataSecAct' => $dataSecAct,
        'paraleloUsuario' =>$paraleloUsuario,
        'desactivsUser' => $desactivsUser,
        'seccionActivs'=> $seccionActivs,
        'promedios' => $promedios ]));

        return view ('Administrador.Reportes.actividad.actividades-estudiantePar',
        ['dataSecAct' => $dataSecAct,
        'paraleloUsuario' =>$paraleloUsuario,
        'desactivsUser' => $desactivsUser,
        'seccionActivs'=> $seccionActivs,
        'promedios' => $promedios ]);
    }

    public function actividadesEstudianteParaleloActividad(Request $request, $idParaleloUsuario){
        $request->user()->authorizeRoles(['admin']);
        $seccionActivs = SeccionActiv::all();
        $paraleloUsuario = ParaleloUs::find($idParaleloUsuario);
        $dataSecAct = SeccionActiv::find($request->idSecact);

        $desactivsUser = DB::table('desactiv_user')
        ->join('desactivs', 'desactiv_user.desactiv_id','=','desactivs.id')
        ->join('seccion_activs', 'desactivs.idSecact','=','seccion_activs.id')
        ->join('users', 'desactiv_user.user_id','=','users.id')
        ->where('desactiv_user.user_id', '=', $paraleloUsuario->user->id)
        ->where('desactivs.idSecact', '=', $request->idSecact
        )->get();

        $promedios = [
            'promedioActividad' => round($this->promedioActividadEstudianteParalelo($desactivsUser), 2) ,
            'promedioActividades' => round($this->promedioTodasActividades($paraleloUsuario->user->id), 2)
        ];

        $request->session()->put('reporteData', json_encode(['dataSecAct' => $dataSecAct,
        'paraleloUsuario' =>$paraleloUsuario,
        'desactivsUser' => $desactivsUser,
        'seccionActivs'=> $seccionActivs,
        'promedios' => $promedios ]));

        return view ('Administrador.Reportes.actividad.actividades-estudiantePar',
        ['dataSecAct' => $dataSecAct,
        'paraleloUsuario' =>$paraleloUsuario,
        'desactivsUser' => $desactivsUser,
        'seccionActivs'=> $seccionActivs,
        'promedios' => $promedios ]);
    }

    public function actividadesEstudianteParaleloActividadFechas(Request $request, $idParaleloUsuario){

        $request->user()->authorizeRoles(['admin']);
        $seccionActivs = SeccionActiv::all();
        $paraleloUsuario = ParaleloUs::find($idParaleloUsuario);
        $dataSecAct = SeccionActiv::find($request->idSecact);

        if($request->fechaInicio && $request->fechaFin){
            $desactivsUser = DB::table('desactiv_user')
                ->join('desactivs', 'desactiv_user.desactiv_id','=','desactivs.id')
                ->join('seccion_activs', 'desactivs.idSecact','=','seccion_activs.id')
                ->join('users', 'desactiv_user.user_id','=','users.id')
                ->where('desactiv_user.user_id', '=', $paraleloUsuario->user->id)
                ->where('desactivs.idSecact', '=', $request->idSecact)
                ->where('desactivs.created_at', '>=', $request->fechaInicio)
                ->where('desactivs.created_at', '<=', $request->fechaFin)
                ->get();
        }else {
            $desactivsUser = DB::table('desactiv_user')
                    ->join('desactivs', 'desactiv_user.desactiv_id','=','desactivs.id')
                    ->join('seccion_activs', 'desactivs.idSecact','=','seccion_activs.id')
                    ->join('users', 'desactiv_user.user_id','=','users.id')
                    ->where('desactiv_user.user_id', '=', $paraleloUsuario->user->id)
                    ->where('desactivs.idSecact', '=', $request->idSecact)
                    ->get();
        }

        $promedios = [
            'promedioActividad' => round($this->promedioActividadEstudianteParalelo($desactivsUser), 2) ,
            'promedioActividades' => round($this->promedioTodasActividades($paraleloUsuario->user->id), 2)
        ];

        $request->session()->put('reporteData', json_encode(['dataSecAct' => $dataSecAct,
        'paraleloUsuario' =>$paraleloUsuario,
        'desactivsUser' => $desactivsUser,
        'seccionActivs'=> $seccionActivs,
        'promedios' => $promedios,
        'fechaInicio' => $request->fechaInicio,
        'fechaFin' =>  $request->fechaFin]));

        return view ('Administrador.Reportes.actividad.actividades-estudiantePar',
        ['dataSecAct' => $dataSecAct,
        'paraleloUsuario' =>$paraleloUsuario,
        'desactivsUser' => $desactivsUser,
        'seccionActivs'=> $seccionActivs,
        'promedios' => $promedios ]);
    }

    public function promedioActividadEstudianteParalelo($seccionActivs){
        $sum = 0.0;
        if($seccionActivs->count() <= 0){
            return 0;
        }
        foreach ($seccionActivs as $seccActividad) {
            $arrStr = explode("\"",$seccActividad->tiempo);
            $tiempo = (float)$arrStr[0];
             $sum += $tiempo;
        }
        return ( $sum /  $seccionActivs->count());
    }


    private function promedioTodasActividades($userId){
        $actividadesUsuario = DB::table('desactiv_user')
        ->join('desactivs', 'desactiv_user.desactiv_id','=','desactivs.id')
        ->where('desactiv_user.user_id', $userId)
        ->get();
        $sum = 0;

        if($actividadesUsuario->count() <= 0){
            return 0;
        }

        foreach ($actividadesUsuario as $actividadUsuario) {
            $arrStr = explode("\"",$actividadUsuario->tiempo);
            $tiempo = (float)$arrStr[0];
            $sum += $tiempo;
        }

        return ( $sum / $actividadesUsuario->count());

    }


    private function promediosTestsUsuarios($usuariosParalelo){
        $arrProm = array();
        foreach ($usuariosParalelo as $userParalelo) {
            $prom = $this->promedioTodosTest($userParalelo->user->id);
            array_push($arrProm, round($prom,2));
        }
        return $arrProm;
    }

    private function promedioTodosTest($userId){
        $promedio = DB::table('destest_user as destestus')
        ->join('destests as des', 'destestus.destest_id', '=', 'des.id')
        ->where('destestus.user_id', $userId)
        ->avg('des.notaDes');
        return($promedio ? $promedio: 0);
    }

    private function promedioTestEstudianteParalelo($userId, $idTest){
        $promedio = DB::table('destest_user as destestus')
        ->join('destests as des', 'destestus.destest_id', '=', 'des.id')
        ->where('destestus.user_id', $userId)
	    ->where('des.descTest', $idTest)
        ->avg('des.notaDes');
        return($promedio ? $promedio: 0);
    }


    public function indexRAct(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);

        $asisR=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('nivels as tbNi', 'tbNi.id','=','tbP.idNivel')

                ->join('destest_user as tbDU', 'tbDU.user_id','=','tbU.id')
                ->join('destests as tbDT', 'tbDT.id','=','tbDU.destest_id')
                ->join('tests as tbTs', 'tbTs.desTest','=','tbDT.descTest')
                ->join('seccion_activs as tbSA', 'tbSA.id','=','tbTs.selecTest')
                ->join('desactivs as tbT', 'tbT.idSecact','=','tbSA.id')
                ->select(DB::raw('count(*) as n_Us'),
                    'tbT.tiempo')
                ->groupBy('tbT.tiempo')
                ->get();
                // dd($asisR);

        //
        return view ('Administrador.Rendimiento.actividad.index',["asisR"=>$asisR]);
    }

    public function indexRTest(Request $request)
    {

        $request->user()->authorizeRoles(['admin']);
        $paralelos = paralelo::all();
        if($paralelos->count() > 0){
            $idParalelo = $paralelos[0]->id;
            $paralelo = paralelo::find($idParalelo);
            $usuariosParalelo = ParaleloUs::where('paralelo_id', $paralelos[0]->id)->get();
            $promedios = $this->promediosTestsUsuarios($usuariosParalelo);
        } else{
            $paralelo = null;
            $usuariosParalelo = [];
            $promedios = [];
        }

        // Datos para la generacion del PDF
        $request->session()->put('reporteData', json_encode(['paralelo' =>$paralelo,
        'paralelos' => $paralelos,
        'usuariosParalelo' => $usuariosParalelo,
        'promedios' => $promedios
       ]));

        return view ('Administrador.Reportes.test.index',
        ['paralelo' =>$paralelo,
         'paralelos' => $paralelos,
         'usuariosParalelo' => $usuariosParalelo,
         'promedios' => $promedios
        ]);
    }

    public function indexRTestParalelo(Request $request){
        $request->user()->authorizeRoles(['admin']);
        $paralelos = paralelo::all();
        if($request->curso){
            $paralelo = paralelo::find($request->curso);
            $usuariosParalelo = ParaleloUs::where('paralelo_id', $request->curso)->get();
        } else {
            $paralelo = paralelo::find($request->curso);
            $usuariosParalelo = ParaleloUs::where('paralelo_id', $paralelos[0]->id)->get();
        }

        $promedios = $this->promediosTestsUsuarios($usuariosParalelo);

        // Datos para la generacion del PDF
        $request->session()->put('reporteData', json_encode(['paralelo' =>$paralelo,
        'paralelos' => $paralelos,
        'usuariosParalelo' => $usuariosParalelo,
        'promedios' => $promedios
       ]));

        return view ('Administrador.Reportes.test.index',
        ['paralelo' =>$paralelo,
         'paralelos' => $paralelos,
         'usuariosParalelo' => $usuariosParalelo,
         'promedios' => $promedios
        ]);

    }

    public function testEstudianteParalelo(Request $request, $idParaleloUsuario){
        $request->user()->authorizeRoles(['admin']);
        $tests = Test::all();
        $paraleloUsuario = ParaleloUs::find($idParaleloUsuario);
        $dataTest = Test::find($tests[0]->id);


        $desactivTest = DB::table('tests as te')
        ->join('destests as des', 'te.id','=','des.descTest')
        ->join('destest_user as desus', 'desus.destest_id','=','des.id')
        ->join('users as us', 'us.id','=','desus.user_id')
        ->where('te.id', '=', $tests[0]->id)
        ->where('us.id', '=', $paraleloUsuario->user->id)
	    ->get();


        $promedios = [
            'promedioTest' => round($this->promedioTestEstudianteParalelo($paraleloUsuario->user->id, $dataTest->id), 2) ,
            'promedioTodosTest' => round($this->promedioTodosTest($paraleloUsuario->user->id), 2)
        ];

        $request->session()->put('reporteData', json_encode(['dataTest' => $dataTest,
        'paraleloUsuario' =>$paraleloUsuario,
        'desactivTest' => $desactivTest,
        'tests'=> $tests,
        'promedios' => $promedios ]));

        return view ('Administrador.Reportes.test.test-estudiantesPar',
        ['dataTest' => $dataTest,
        'paraleloUsuario' =>$paraleloUsuario,
        'desactivTest' => $desactivTest,
        'tests'=> $tests,
        'promedios' => $promedios ]);
    }

    public function  testEstudianteParaleloPost(Request $request, $idParaleloUsuario){
        $request->user()->authorizeRoles(['admin']);
        $tests = Test::all();
        $paraleloUsuario = ParaleloUs::find($idParaleloUsuario);
        $dataTest = Test::find($tests[0]->id);


        $desactivTest = DB::table('tests as te')
        ->join('destests as des', 'te.id','=','des.descTest')
        ->join('destest_user as desus', 'desus.destest_id','=','des.id')
        ->join('users as us', 'us.id','=','desus.user_id')
        ->where('te.id', '=', $tests[0]->id)
        ->where('us.id', '=', $paraleloUsuario->user->id)
	    ->get();


        $promedios = [
            'promedioTest' => round($this->promedioTestEstudianteParalelo($paraleloUsuario->user->id, $dataTest->id), 2) ,
            'promedioTodosTest' => round($this->promedioTodosTest($paraleloUsuario->user->id), 2)
        ];

        $request->session()->put('reporteData', json_encode(['dataTest' => $dataTest,
        'paraleloUsuario' =>$paraleloUsuario,
        'desactivTest' => $desactivTest,
        'tests'=> $tests,
        'promedios' => $promedios ]));

        return view ('Administrador.Reportes.test.test-estudiantesPar',
        ['dataTest' => $dataTest,
        'paraleloUsuario' =>$paraleloUsuario,
        'desactivTest' => $desactivTest,
        'tests'=> $tests,
        'promedios' => $promedios ]);
    }

    public function testEstudianteParaleloFechas(Request $request, $idParaleloUsuario){
        $request->user()->authorizeRoles(['admin']);
        $tests = Test::all();
        $paraleloUsuario = ParaleloUs::find($idParaleloUsuario);
        $dataTest = Test::find($tests[0]->id);

        if($request->fechaInicio && $request->fechaFin){
            $desactivTest = DB::table('tests as te')
                            ->join('destests as des', 'te.id','=','des.descTest')
                            ->join('destest_user as desus', 'desus.destest_id','=','des.id')
                            ->join('users as us', 'us.id','=','desus.user_id')
                            ->where('te.id', '=', $tests[0]->id)
                            ->where('us.id', '=', $paraleloUsuario->user->id)
                            ->where('desus.created_at', '>=', $request->fechaInicio)
                            ->where('desus.created_at', '<=', $request->fechaFin)
	                        ->get();
        } else {
            $desactivTest = DB::table('tests as te')
                            ->join('destests as des', 'te.id','=','des.descTest')
                            ->join('destest_user as desus', 'desus.destest_id','=','des.id')
                            ->join('users as us', 'us.id','=','desus.user_id')
                            ->where('te.id', '=', $tests[0]->id)
                            ->where('us.id', '=', $paraleloUsuario->user->id)
	                        ->get();
        }

        $promedios = [
            'promedioTest' => round($this->promedioTestEstudianteParalelo($paraleloUsuario->user->id, $dataTest->id), 2) ,
            'promedioTodosTest' => round($this->promedioTodosTest($paraleloUsuario->user->id), 2)
        ];

        $request->session()->put('reporteData', json_encode(['dataTest' => $dataTest,
        'paraleloUsuario' =>$paraleloUsuario,
        'desactivTest' => $desactivTest,
        'tests'=> $tests,
        'promedios' => $promedios,
        'fechaInicio' => $request->fechaInicio,
        'fechaFin' =>  $request->fechaFin]));

        return view ('Administrador.Reportes.test.test-estudiantesPar',
        ['dataTest' => $dataTest,
        'paraleloUsuario' =>$paraleloUsuario,
        'desactivTest' => $desactivTest,
        'tests'=> $tests,
        'promedios' => $promedios ,
        'fechaInicio' => $request->fechaInicio,
        'fechaFin' =>  $request->fechaFin]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);

            $asisR=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('nivels as tbNi', 'tbNi.id','=','tbP.idNivel')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->join('asistencia_user as tbAU', 'tbAU.user_id','=','tbU.id')
                ->join('asistencias as tbAs', 'tbAs.id','=','tbAU.asistencia_id')
                ->select('tbAs.DescripAsis as DesAsis','tbR.descripcion as Rol','tbAs.fechaAsis','tbNi.nombreN as lvl','tbP.nombreP as cP')
                ->get();
            $this->bfecha($asisR);
    }

    public function genList(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);

            $asisR=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('nivels as tbNi', 'tbNi.id','=','tbP.idNivel')

                ->join('destest_user as tbDU', 'tbDU.user_id','=','tbU.id')
                ->join('destests as tbDT', 'tbDT.id','=','tbDU.destest_id')
                ->join('tests as tbTs', 'tbTs.desTest','=','tbDT.descTest')
                ->join('seccion_activs as tbSA', 'tbSA.id','=','tbTs.selecTest')
                ->join('desactivs as tbT', 'tbT.idSecact','=','tbSA.id')
                ->select('tbDT.nombUsDes as NombAlm','tbDT.descTest','tbT.tiempo','tbDT.notaDes','tbDT.fechaDes')
                ->get();
            $this->bActiv($asisR);
    }

    public function genListA(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);

            $asisR=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('nivels as tbNi', 'tbNi.id','=','tbP.idNivel')

                ->join('destest_user as tbDU', 'tbDU.user_id','=','tbU.id')
                ->join('destests as tbDT', 'tbDT.id','=','tbDU.destest_id')
                ->join('tests as tbTs', 'tbTs.desTest','=','tbDT.descTest')
                ->join('seccion_activs as tbSA', 'tbSA.id','=','tbTs.selecTest')
                ->join('desactivs as tbT', 'tbT.idSecact','=','tbSA.id')
                ->select(DB::raw('count(*) as n_Us'),
                    'tbT.tiempo')
                ->groupBy('tbT.tiempo')
                ->get();
            $this->bRendim($asisR);
    }

    public function genListT(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);

            $asisR=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('nivels as tbNi', 'tbNi.id','=','tbP.idNivel')

                ->join('destest_user as tbDU', 'tbDU.user_id','=','tbU.id')
                ->join('destests as tbDT', 'tbDT.id','=','tbDU.destest_id')
                ->join('tests as tbTs', 'tbTs.desTest','=','tbDT.descTest')
                ->join('seccion_activs as tbSA', 'tbSA.id','=','tbTs.selecTest')
                ->join('desactivs as tbT', 'tbT.idSecact','=','tbSA.id')
                ->select(DB::raw('count(*) as n_Us'),
                    // 'tbT.tiempo'
                    'tbDT.notaDes')
                // ->groupBy('tbT.tiempo')
                ->groupBy('tbDT.notaDes')
                ->get();
            $this->bRendim($asisR);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(busquedaAsisFormRequest $request)
    {
        $id='llega';
        // dd($id);
            $fecha1=trim($request->get('FechaInicio')); //determinr texto de busqueda
            $fecha2=trim($request->get('FechaFin')); //determinr texto de busqueda
            $f1=date("Y-m-d", strtotime($request->get('FechaInicio')));
            $f2=date("Y-m-d", strtotime($request->get('FechaFin')));
            $fechaI=DB::table('destests as tbI')
            ->whereBetween('tbI.fechaDes',[$f1,$f2])
            ->get();
            if($fechaI)
                {
                $asisR=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('nivels as tbNi', 'tbNi.id','=','tbP.idNivel')

                ->join('destest_user as tbDU', 'tbDU.user_id','=','tbU.id')
                ->join('destests as tbDT', 'tbDT.id','=','tbDU.destest_id')
                ->join('tests as tbTs', 'tbTs.desTest','=','tbDT.descTest')
                ->join('seccion_activs as tbSA', 'tbSA.id','=','tbTs.selecTest')
                ->join('desactivs as tbT', 'tbT.idSecact','=','tbSA.id')
                ->select('tbDT.nombUsDes as NombAlm','tbDT.descTest','tbT.tiempo','tbDT.notaDes','tbDT.fechaDes')
                ->whereBetween('tbDT.fechaDes',[$f1,$f2])
                ->get();
                        //
                        $this->bActiv($asisR);
                }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        return view("Administrador.Reportes.asistencia.show");
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
    public function bfecha ($asisR)
    {

            Fpdf::AddPage();
            Fpdf::Image('ENCABEZ.JPG',20,20,-100);
            Fpdf::Ln(50);
            Fpdf::SetFont('Arial','B',14);
            Fpdf::Write(5,'Reporte Asistencia ');
            Fpdf::Ln(10);
            Fpdf::Cell(45,6,'Nombre Apellido ',1,0,'C');
            Fpdf::Cell(30,6,'Rol',1,0,'C');
            Fpdf::Cell(30,6,'Fecha',1,0,'C');
            Fpdf::Cell(30,6,'Nivel',1,0,'C');
            Fpdf::Cell(30,6,'Paralelo',1,1,'C');
            Fpdf::SetFont('Arial','',10);

            foreach($asisR as $row)
            {
                $j=0;
                foreach($row as $col){
                    if($j==0){
                    Fpdf::Cell(45,6,$col,1);
                    }
                    else{
                        if($j==1){
                            Fpdf::Cell(30,6,$col,1,0,'C');
                        }
                        else{
                            if($j==3){
                                Fpdf::Cell(30,6,$col,1);
                            }
                            else{
                                Fpdf::Cell(30,6,$col,1);
                            }

                        }

                    }

                    $j++;
                    }
                Fpdf::Ln();
            }

            Fpdf::Output();
            exit;
    }

    public function bActiv ($asisR)
    {

            Fpdf::AddPage();
            Fpdf::Image('ENCABEZ.JPG',20,20,-100);
            Fpdf::Ln(50);
            Fpdf::SetFont('Arial','B',14);
            Fpdf::Write(5,'Reporte Asistencia ');
            Fpdf::Ln(10);
            Fpdf::Cell(45,6,'Nombre Apellido ',1,0,'C');
            Fpdf::Cell(40,6,'Test',1,0,'C');
            Fpdf::Cell(30,6,'Tiempo',1,0,'C');
            Fpdf::Cell(20,6,'Nota',1,0,'C');
            Fpdf::Cell(30,6,'Fecha',1,1,'C');
            Fpdf::SetFont('Arial','',10);

            foreach($asisR as $row)
            {
                $j=0;
                foreach($row as $col){
                    if($j==0){
                    Fpdf::Cell(45,6,$col,1);
                    }
                    else{
                        if($j==1){
                            Fpdf::Cell(40,6,$col,1);
                        }
                        else{
                            if($j==3){
                                Fpdf::Cell(20,6,$col,1,0,'C');
                            }
                            else{
                                Fpdf::Cell(30,6,$col,1,0,'C');
                            }

                        }

                    }

                    $j++;
                    }
                Fpdf::Ln();
            }

            Fpdf::Output();
            exit;
    }

    public function bRendim ($asisR)
    {

            Fpdf::AddPage();
            Fpdf::Image('ENCABEZ.JPG',20,20,-100);
            Fpdf::Ln(50);
            Fpdf::SetFont('Arial','B',14);
            Fpdf::Write(5,'Reporte Asistencia ');
            Fpdf::Ln(10);
            Fpdf::Cell(50,6,'Numero de Alumnos ',1,0,'C');
            // Fpdf::Cell(30,6,'Nota',1,0,'C');
            // Fpdf::Cell(30,6,'Fecha',1,0,'C');
            // Fpdf::Cell(30,6,'Nivel',1,0,'C');
            Fpdf::Cell(30,6,'Nota',1,1,'C');
            Fpdf::SetFont('Arial','',10);

            foreach($asisR as $row)
            {
                $j=0;
                foreach($row as $col){
                    if($j==0){
                    Fpdf::Cell(50,6,$col,1);
                    }
                    else{
                        if($j==1){
                            Fpdf::Cell(30,6,$col,1,0,'C');
                        }
                        else{
                            if($j==3){
                                Fpdf::Cell(30,6,$col,1);
                            }
                            else{
                                Fpdf::Cell(30,6,$col,1);
                            }

                        }

                    }

                    $j++;
                    }
                Fpdf::Ln();
            }

            Fpdf::Output();
            exit;
    }

    public function generatePdfActividadUsuarioCurso(Request $request){
        $request->user()->authorizeRoles(['admin']);
        $dataReporte = json_decode($request->session()->get('reporteData'));
        Fpdf::AddPage();
        Fpdf::Image('ENCABEZ.JPG',20,20,-100);
        Fpdf::Ln(50);

        Fpdf::SetFont('Arial','B',12);
        Fpdf::Ln(10);
        Fpdf::Write(5,'Curso: ');
        Fpdf::SetFont('Arial','',12);
        Fpdf::Write(5,$dataReporte->paraleloUsuario->paralelo->nivel->nombreN . " - " . $dataReporte->paraleloUsuario->paralelo->nombreP);

        Fpdf::Ln(10);
        Fpdf::SetFont('Arial','B',12);
        Fpdf::Write(5, 'Alumno: ');
        Fpdf::SetFont('Arial','',12);
        Fpdf::Write(5, $dataReporte->paraleloUsuario->user->name ." " .$dataReporte->paraleloUsuario->user->apellido );


        Fpdf::Ln(10);
        Fpdf::SetFont('Arial','B',12);
        Fpdf::Write(5, 'Promedio de tiempo todas las actividades: ');
        Fpdf::SetFont('Arial','',12);
        Fpdf::Write(5,  $dataReporte->promedios->promedioActividades .' s');

        Fpdf::Ln(10);
        Fpdf::SetFont('Arial','B',12);
        Fpdf::Write(5, 'Actividad: ');
        Fpdf::SetFont('Arial','',12);
        Fpdf::Write(5, $dataReporte->dataSecAct->descripcion );


        Fpdf::Ln(10);
        Fpdf::SetFont('Arial','B',12);
        Fpdf::Write(5, 'Promedio de tiempo de la actividad: ');
        Fpdf::SetFont('Arial','',12);
        Fpdf::Write(5,$dataReporte->promedios->promedioActividad . ' s');
        Fpdf::Ln(10);

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


        Fpdf::Write(5,'Se muestran los tiempos registrado por el estudiante en la actividad');
        Fpdf::Ln(10);

        Fpdf::Cell(90,6,'Actividad',1,0,'C');
        Fpdf::Cell(90,6,'Tiempo',1,0,'C');
        Fpdf::Ln();

        foreach ($dataReporte->desactivsUser as $desactiv) {
            Fpdf::Cell(90,6,$desactiv->descripcion,1,0,'L');
            Fpdf::Cell(90,6,$desactiv->tiempo,1,0,'L');
            Fpdf::Ln();
        }
        Fpdf::Output();
        exit;

    }


    public function generatePdfTestUsuarioCurso(Request $request){
        $request->user()->authorizeRoles(['admin']);
        $dataReporte = json_decode($request->session()->get('reporteData'));
        Fpdf::AddPage();
        Fpdf::Image('ENCABEZ.JPG',20,20,-100);
        Fpdf::Ln(50);

        Fpdf::SetFont('Arial','B',12);
        Fpdf::Ln(10);
        Fpdf::Write(5,'Curso: ');
        Fpdf::SetFont('Arial','',12);
        Fpdf::Write(5,$dataReporte->paraleloUsuario->paralelo->nivel->nombreN . " - " . $dataReporte->paraleloUsuario->paralelo->nombreP);

        Fpdf::Ln(10);
        Fpdf::SetFont('Arial','B',12);
        Fpdf::Write(5, 'Alumno: ');
        Fpdf::SetFont('Arial','',12);
        Fpdf::Write(5, $dataReporte->paraleloUsuario->user->name ." " .$dataReporte->paraleloUsuario->user->apellido );


        Fpdf::Ln(10);
        Fpdf::SetFont('Arial','B',12);
        Fpdf::Write(5, 'Promedio de tiempo todas las actividades: ');
        Fpdf::SetFont('Arial','',12);
        Fpdf::Write(5,  $dataReporte->promedios->promedioTodosTest);

        Fpdf::Ln(10);
        Fpdf::SetFont('Arial','B',12);
        Fpdf::Write(5, 'Test: ');
        Fpdf::SetFont('Arial','',12);
        Fpdf::Write(5, $dataReporte->dataTest->desTest );


        Fpdf::Ln(10);
        Fpdf::SetFont('Arial','B',12);
        Fpdf::Write(5, 'Promedio de tiempo del Test: ');
        Fpdf::SetFont('Arial','',12);
        Fpdf::Write(5,$dataReporte->promedios->promedioTest);
        Fpdf::Ln(10);

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


        Fpdf::Write(5,'Se muestran los tiempos registrado por el estudiante en la actividad');
        Fpdf::Ln(10);

        Fpdf::Cell(90,6,'Test',1,0,'C');
        Fpdf::Cell(90,6,'Nota',1,0,'C');
        Fpdf::Ln();

        foreach ($dataReporte->desactivTest as $desactiv) {
            Fpdf::Cell(90,6,$desactiv->desTest,1,0,'L');
            Fpdf::Cell(90,6,$desactiv->notaDes,1,0,'L');
            Fpdf::Ln();
        }
        Fpdf::Output();
        exit;

    }















    public function generatePdfActividadesUsuariosCurso(Request $request){

        $request->user()->authorizeRoles(['admin']);
        $dataReporte = json_decode($request->session()->get('reporteData'));
        Fpdf::AddPage();
        Fpdf::Image('ENCABEZ.JPG',20,20,-100);
        Fpdf::Ln(50);
        Fpdf::SetFont('Arial','B',14);
        Fpdf::Write(5,'Reporte de Actividades de un curso: '. $dataReporte->paralelo->nivel->nombreN . " " . $dataReporte->paralelo->nombreP);
        Fpdf::Ln(10);
        Fpdf::SetFont('Arial','',10);
        Fpdf::Write(5,'Se muestran los datos de los usuarios del curso, donde se muestran los promedios de todas las actividades por cada uno de los alumnos');
        Fpdf::Ln(10);
        Fpdf::Cell(90,6,'Nombres y Apellidos',1,0,'C');
        Fpdf::Cell(90,6,'Promedio Actividades',1,0,'C');
        Fpdf::Ln();
        for ($i=0; $i < count($dataReporte->usuariosParalelo); $i++) {
            Fpdf::Cell(90,6,$dataReporte->usuariosParalelo[$i]->user->name. " " . $dataReporte->usuariosParalelo[$i]->user->apellido,1,0,'L');
            Fpdf::Cell(90,6,$dataReporte->promedios[$i],1,0,'L');
            Fpdf::Ln();
        }
        Fpdf::Output();
        exit;
    }

    public function generatePdfTestUsuariosCurso(Request $request){
        $request->user()->authorizeRoles(['admin']);
        $dataReporte = json_decode($request->session()->get('reporteData'));
        Fpdf::AddPage();
        Fpdf::Image('ENCABEZ.JPG',20,20,-100);
        Fpdf::Ln(50);
        Fpdf::SetFont('Arial','B',14);
        Fpdf::Write(5,'Reporte de Tests de un curso: '. $dataReporte->paralelo->nivel->nombreN . " " . $dataReporte->paralelo->nombreP);
        Fpdf::Ln(10);
        Fpdf::SetFont('Arial','',10);
        Fpdf::Write(5,'Se muestran los datos de los usuarios del curso, donde se muestran los promedios de todos los test por cada uno de los alumnos');
        Fpdf::Ln(10);
        Fpdf::Cell(90,6,'Nombres y Apellidos',1,0,'C');
        Fpdf::Cell(90,6,'Promedio Test',1,0,'C');
        Fpdf::Ln();
        for ($i=0; $i < count($dataReporte->usuariosParalelo); $i++) {
            Fpdf::Cell(90,6,$dataReporte->usuariosParalelo[$i]->user->name. " " . $dataReporte->usuariosParalelo[$i]->user->apellido,1,0,'L');
            Fpdf::Cell(90,6,$dataReporte->promedios[$i],1,0,'L');
            Fpdf::Ln();
        }
        Fpdf::Output();
        exit;
    }

    public function destroy(busquedaAsisFormRequest $request,$id)
    {
            $fecha1=trim($request->get('FechaInicio')); //determinr texto de busqueda
            $fecha2=trim($request->get('FechaFin')); //determinr texto de busqueda
            $f1=date("Y-m-d", strtotime($request->get('FechaInicio')));
            $f2=date("Y-m-d", strtotime($request->get('FechaFin')));
            $fechaI=DB::table('asistencias as tbI')
            ->whereBetween('tbI.fechaAsis',[$f1,$f2])
            ->get();
            if($fechaI)
                {
                $asisR=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('nivels as tbNi', 'tbNi.id','=','tbP.idNivel')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->join('asistencia_user as tbAU', 'tbAU.user_id','=','tbU.id')
                ->join('asistencias as tbAs', 'tbAs.id','=','tbAU.asistencia_id')
                ->select('tbAs.DescripAsis as DesAsis','tbR.descripcion as Rol','tbAs.fechaAsis','tbNi.nombreN as lvl','tbP.nombreP as cP')
                ->whereBetween('tbAs.fechaAsis',[$f1,$f2])
                ->get();
                        //
                        $this->bfecha($asisR);
                }
    }


}
