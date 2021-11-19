<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//llamado
use App\Http\Requests;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\User;
use App\Role;
use App\RoleUserR;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\UserFormRequest;
// use App\Http\Requests\UserUpdateFormRequest;


use DB;  
//

class AdminUserController extends Controller
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
        if ($request)
        {
        
            $query=trim($request->get('searchText')); //determinr texto de busqueda

            
            $usuario=DB::table('users as tbU')
            ->select('tbU.id','tbU.name','tbU.apellido','tbU.direccion','tbU.telefono','tbU.celular','tbU.email')
            
            ->where('tbU.name','LIKE','%'.$query.'%')
            ->orwhere('tbU.email','LIKE','%'.$query.'%')
            ->orwhere('tbU.apellido','LIKE','%'.$query.'%')
            ->orwhere('tbU.telefono','LIKE','%'.$query.'%')

            
            ->orderBy('tbU.id','desc')

            ->paginate(7);

            return view ('Administrador.Usuarios.index',["usuario"=>$usuario,"searchText"=>$query]);
            
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
        return view ("Administrador.Usuarios.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (UserFormRequest $request)
    {
        

        $role_user = Role::where('name','user')->first();
        $role_admin = Role::where('name','admin')->first();
        $role_docent = Role::where('name','docent')->first();
        //
        // dd($role_admin);
        $usuario=new User;

        $usuario->name=$request->get('name');

        $usuario->email=$request->get('email');

        $usuario->password=bcrypt($request->get('password'));

        $usuario->apellido=$request->get('apellido');

        $usuario->direccion=$request->get('direccion');
        
        $usuario->telefono=$request->get('telefono');

        $usuario->estado=$request->get('estado');
        
        $usuario->celular=$request->get('celular');

        if (Input::hasFile('foto')){
         $file=Input::file('foto');
         $nameF=time().$file->getClientOriginalName();
         $file->move(public_path().'/img/perfil/',$nameF);
         $usuario->foto=$nameF;
        }

        

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

        return Redirect::to('UnidadSCH/Usuarios');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show (User $usuario)
    {

        return view("Administrador.Usuarios.show",compact('usuario'));

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
        
        return view("Administrador.Usuarios.edit",["usuario"=>$usuario]);
        
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

        $roleV=DB::table('role_user as tbT')
        ->select('tbT.id','tbT.user_id','tbT.role_id')
                ->where('tbT.user_id',$id)
                ->get();
        
        //dd($roleU);
        $si='s'; $n='n';
        if(isset($roleV[0])){
        	//dd($si);
        	$idR=$roleV[0]->id;
        	$roleU=RoleUserR::findOrFail($idR);
        	//
        	if($request->get('TI')=='1'){
        	//$roleU=RoleUserR::where('user_id',$id)->first();
            $roleU->role_id='1';
            $roleU->save();
        }
        else{
            if($request->get('TI')=='2'){
            	//$roleU=RoleUserR::where('user_id',$id)->first();
                $roleU->role_id='2';
                $roleU->save();
            }
            else{
            	//$roleU=RoleUserR::where('user_id',$id)->first();
                $roleU->role_id='3';
                $roleU->save();
            }
        }
        	//
        }
        else{
        	//dd($n);
        	//
        	        //
        if($request->get('TI')=='1'){
        		$DesT=new RoleUserR;
            $DesT->user_id=$id;
            $DesT->role_id='1';
            $DesT->save();

        }
        else{
            if($request->get('TI')=='2'){
                $DesT=new RoleUserR;
            $DesT->user_id=$id;
            $DesT->role_id='2';
            $DesT->save();
            }
            else{
                $DesT=new RoleUserR;
            $DesT->user_id=$id;
            $DesT->role_id='3';
            $DesT->save();
            }
        }
        	//
        }
        //dd($DesT);

        return Redirect::to('UnidadSCH/Usuarios');
        
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

        return Redirect::to('UnidadSCH/Usuarios'); 


    }
}
