<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//llamado
use App\Http\Requests;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Pregunta;
use App\Respuesta;
use App\TestPreg; 
use App\Test;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\RespFormRequest;


use DB;
//

class AdminRespController extends Controller
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

    public function index()
    {
        //
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
    public function store(RespFormRequest $request)
    {
        // 
        // dd($request->idTest);
        $idT=$request->idTest;
        $idP=$request->idPreg;
        // dd($request->desPreg);
        // $nomb=$request->user()->id;
        // $P_Des=Test::where('id',$idT)->first();
        // dd($P_Des);

        $preg=new Respuesta;

        if (Input::hasFile('descripR')){
         $file=Input::file('descripR');
         $nameF=time().$file->getClientOriginalName();
         $file->move(public_path().'/img/Resp/',$nameF);
         $preg->descripR=$nameF;
        }

        $preg->notaR=$request->get('notaR');

        $preg->idPreg=$idP;       

        $preg->save();
        //

        // $preg->tests()->attach($P_Des);
        //
        // return Redirect::to('UnidadSCH/Test');
        return redirect()->action('AdminPregController@verList', [$idP]);
           
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
    public function edit(Request $request,$id)
    {

        $request->user()->authorizeRoles(['admin','user']);

        $resp=Respuesta::findOrFail($id);
        $preg=Pregunta::findOrFail($resp->idPreg);
        $idP=$preg->id;

        $testP=TestPreg::where('pregunta_id',$idP)->first();
        $idT=$testP->test_id;
        $test=Test::findOrFail($idT);
        
        
        return view("Administrador.Test.Respuest.edit",["test"=>$test,"preg"=>$preg,"resp"=>$resp]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RespFormRequest $request, $id)
    {
        //
        $idT=$request->idTest;
        $idP=$request->idPreg;

        // $idT=$request->idTest;

        $preg=Respuesta::findOrFail($id);

        if (Input::hasFile('descripR')){
         $file=Input::file('descripR');
         $nameF=time().$file->getClientOriginalName();
         $file->move(public_path().'/img/Resp/',$nameF);
         $preg->descripR=$nameF;
        }

        $preg->notaR=$request->get('notaR');

        $preg->idPreg=$idP;

        $preg->save();

        // return Redirect::to('UnidadSCH/Test');
        return redirect()->action('AdminPregController@verList', [$idP]);
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
        // $P_Des=TestPreg::where('pregunta_id',$id)->first();
        // $idR=$P_Des->id;
        // $idT=$P_Des->test_id;
        // dd($P_Des);
        // $relTes=TestPreg::findOrFail($idR);

        // $relTes->delete();

        $test=Respuesta::findOrFail($id);

        $idP=$test->idPreg;

        $test->delete();

        // return Redirect::to('UnidadSCH/Test'); 
        return redirect()->action('AdminPregController@verList', [$idP]);
    }
}
