<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminRendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
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
                    // 'tbDT.notaDes') 
                ->groupBy('tbT.tiempo')
                // ->groupBy('tbDT.notaDes')
                ->get();

        return view ('Administrador.Rendimiento.index',["asisR"=>$asisR]);
    }

    public function indexDesT(Request $request)
    {
        //
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

        return view ('Administrador.Rendimiento.indexT',["asisR"=>$asisR]);
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
        //
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
