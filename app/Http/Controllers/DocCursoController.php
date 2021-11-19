<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//llamado
use App\Http\Requests;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Nivel;
use App\paralelo;
use App\anio;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CursoFormRequest;
// use App\Http\Requests\UserUpdateFormRequest;


use DB;
//

class DocCursoController extends Controller
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

        $request->user()->authorizeRoles(['docent']);
        $idU=$request->user()->id;
        // dd($idU);
        if ($request)
        {
        
            $query=trim($request->get('searchText')); //determinr texto de busqueda

            
            $curso=DB::table('nivels as tbN')
            ->join('paralelos as tbP', 'tbN.id','=','tbP.idNivel')
            ->join('paralelo_user as tbPU', 'tbPU.paralelo_id','=','tbP.id')
            ->join('anios as tbA', 'tbN.id','=','tbA.idNivel')
            ->select('tbP.id','tbA.id as idA','tbP.nombreP as Paralel','tbN.nombreN as Nivel','tbA.fechaA as fecha')
            
            // ->orwhere('tbP.nombreP','LIKE','%'.$query.'%')
            // ->orwhere('tbN.nombreN','LIKE','%'.$query.'%')
            // ->orwhere('tbA.fechaA','LIKE','%'.$query.'%')
            ->where('tbPU.user_id',$idU)
            
            ->orderBy('tbP.id','desc')

            ->paginate(7);

            return view ('Docente.Curso.index',["curso"=>$curso,"searchText"=>$query]);
            
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
    public function show (paralelo $paralelo)
    {

        return view("Docente.Curso.show",compact('paralelo'));

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
