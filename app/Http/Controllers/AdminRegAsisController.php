<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//llamado
use App\Http\Requests;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Nivel;
use App\Lista;
use App\Asistencia;
use App\AsistUser;
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

class AdminRegAsisController extends Controller
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
    public function store (Request $request)
    {
        $f=date_create()->format('Y-m-d H:i:s');
        $request->user()->authorizeRoles('admin');

        $ass=Asistencia::findOrFail($request->idAsis);

        $ass->estado='1';

        $ass->save();

        $aUs=AsistUser::findOrFail($ass->id);
        $idUR=$aUs->user_id;
        $P_Des=User::where('id',$idUR)->first();

        /* */

        $as1=new Lista;

        $as1->DescripLis="Asiste";

        $as1->fechaRegis=$f;

        $as1->save();

        /* */

        $asR=Lista::where('id',$as1->id)->first();

        $P_Des->listas()->attach($asR);
         // 
        
        return Redirect::to('UnidadSCH/Asistencia');
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
