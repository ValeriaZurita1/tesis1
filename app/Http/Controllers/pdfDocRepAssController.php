<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParaleloUs;
use App\paralelo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\AplicacionFormRequest;
use App\Http\Requests\busquedaAsisFormRequest;
// use phpCAS;

use DB;
use Fpdf;

class pdfDocRepAssController extends Controller
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
        $request->user()->authorizeRoles(['docent']);
        $idU=$request->user()->id;
        $PrU=ParaleloUs::where('user_id',$idU)->first();

        $pA=paralelo::findOrFail($PrU->paralelo_id);
        $idP=$pA->id;
        $f2=date_create()->format('Y-m-d');
        $f1=date_create()->format('Y-m-d');


        $asisR=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('nivels as tbNi', 'tbNi.id','=','tbP.idNivel')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->join('asistencia_user as tbAU', 'tbAU.user_id','=','tbU.id')
                ->join('asistencias as tbAs', 'tbAs.id','=','tbAU.asistencia_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol','tbAs.id as idAss','tbAs.DescripAsis as desAss','tbAs.fechaAsis','tbNi.nombreN as lvl','tbP.nombreP as cP','tbAs.DescripAsis as DesAsis','tbAs.estado as eA')
                ->where('tbP.id','LIKE','%'.$idP.'%')
                ->whereBetween('tbAs.fechaAsis',[$f1,$f2])
                ->get();
                // dd($asisR);
        return view ('Docente.Reportes.asistencia.index',["asisR"=>$asisR]);
    }

    public function indexAct(Request $request)
    {
        // $request->user()->authorizeRoles(['docent']);
        $idU=$request->user()->id;

        $paralelosUsuario = ParaleloUs::where('user_id', $idU)->get();

        if($paralelosUsuario->count() > 0){
            $paraleloUsuario = $paralelosUsuario[0];
            $paraleloUser= ParaleloUs::where('paralelo_id', $paraleloUsuario->id)->get();
        }else{
            $paraleloUser = null;
            $paraleloUsuario = null;
        }

        return view ('Docente.Reportes.actividad.index',
        ["paralelosUsuario"=>$paralelosUsuario, "paraleloUsuario" => $paraleloUsuario, "paraleloUser" => $paraleloUser]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['docent']);
        $idU=$request->user()->id;
        $PrU=ParaleloUs::where('user_id',$idU)->first();

        $pA=paralelo::findOrFail($PrU->paralelo_id);
        $idP=$pA->id;
        $f2=date_create()->format('Y-m-d');
        $f1=date_create()->format('Y-m-d');


        $asisR=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('nivels as tbNi', 'tbNi.id','=','tbP.idNivel')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->join('asistencia_user as tbAU', 'tbAU.user_id','=','tbU.id')
                ->join('asistencias as tbAs', 'tbAs.id','=','tbAU.asistencia_id')
                ->select('tbAs.DescripAsis as DesAsis','tbR.descripcion as Rol','tbAs.fechaAsis','tbNi.nombreN as lvl','tbP.nombreP as cP')
                ->where('tbP.id','LIKE','%'.$idP.'%')
                ->whereBetween('tbAs.fechaAsis',[$f1,$f2])
                ->get();
            $this->bfecha($asisR);
    }

    public function genList(Request $request,$id)
    {
        $request->user()->authorizeRoles(['docent']);
        $idU=$request->user()->id;
        $PrU=ParaleloUs::where('user_id',$idU)->first();

        $pA=paralelo::findOrFail($PrU->paralelo_id);
        $idP=$pA->id;

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
                ->where('tbP.id','LIKE','%'.$idP.'%')
                ->get();
            $this->bActiv($asisR);
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
        $idU=$request->user()->id;
        $PrU=ParaleloUs::where('user_id',$idU)->first();

        $pA=paralelo::findOrFail($PrU->paralelo_id);
        $idP=$pA->id;
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
                ->where('tbP.id','LIKE','%'.$idP.'%')
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
        return view("Docente.Reportes.asistencia.show");
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
            Fpdf::Cell(40,6,'Nivel',1,0,'C');
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
                                Fpdf::Cell(40,6,$col,1);
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
