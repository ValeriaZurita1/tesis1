<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//llamado
use App\Http\Requests;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;

use App\Nivel;
use App\paralelo;
use App\anio;
use App\ParaleloUs;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CursoFormRequest;
// use App\Http\Requests\UserUpdateFormRequest;


use DB;
//

class AdminCursoController extends Controller
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
        $searchText = "";

        if($request->searchText && $request->searchText != ""){
            $cursos = Nivel::where('nombreN', 'like', $request->searchText.'%')->get();
        }else{
            $cursos = Nivel::all()->load('colegio');
        }    

        return view ('Administrador.Curso.index',["cursos"=>$cursos, 'searchText' => $searchText]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles('admin');   
        return view ("Administrador.Curso.create");
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_Paralelo(Request $request, $id)
    {
        $request->user()->authorizeRoles('admin');  
        $nivel=Nivel::findOrFail($id);
        return view ("Administrador.Curso.createParalelo", ["nivel"=>$nivel]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_Estudiante(Request $request, $id)
    {
        $request->user()->authorizeRoles('admin');  
        $paralelo = Paralelo::findOrFail($id);
        $estudiantes= User::all();
        $dimension =  $estudiantes->count();
        $i = 0;
        while($i < $dimension){
            if($this->existUser($id,$estudiantes[$i]->id)){
                unset($estudiantes[$i]);  // sierve para eliminar del array            
            }
            $i =$i +1;
        }       
        return view ("Administrador.Curso.createEstudiante", ["paralelo"=> $paralelo, "estudiantes"=> $estudiantes]);
    }

    public function existUser($id , $id_user){
     // dd($id_user);     
      $usuarioParalelo = ParaleloUS::Where('paralelo_id',$id)->get();
      $encontrado = false;
      foreach($usuarioParalelo as $usuario){
        if($usuario->user_id == $id_user){
            $encontrado = true;
        }
      } 
      return  $encontrado;
    }


    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        //dd($request);

        if($request->nombreN && $request->nombreN != ""){

            if(!$this->existsNombre($request->nombreN)){
                Nivel::create([
                    "nombreN" => $request->nombreN,
                    "idColegio" => 1
                ]);
                Session::flash('success', 'Ingreso Correcto');
            }else{
                Session::flash('warning', 'YA existe un curso con ese nombre');
            }
        }else{
            Session::flash('error', 'Se debe ingresar el nombre');
        }

        return Redirect::to('UnidadSCH/Curso');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_Paralelo (Request $request, $id)
    {

        if($request->nombreP && $request->nombreP != ""){

            if(!$this->validateExistsParalelo($request->get('nombreP') , $id)){
                paralelo::create([
                    "nombreP" => $request->nombreP,
                    "idNivel" => $id
                ]);
                Session::flash('success', 'Ingreso Correcto');
            }else{
                Session::flash('warning', 'YA existe un paralelo con ese nombre');
            }
        }else{
            Session::flash('error', 'Se debe ingresar el nombre');
        }

        return Redirect::to('UnidadSCH/Curso/paralelo/'.$id);
    }


    public function store_Estudiante (Request $request, $id)
    {

        if($request->user_id && $request->user_id != "0"){


            ParaleloUS::create([
                "user_id" => $request->user_id,
                "paralelo_id"=> $id
            ]);
           
            Session::flash('success', 'Se añadio Correctamente !');
        }else{
            Session::flash('error', 'Se debe seleccionar el estudiante !');
        }

        return Redirect::to('UnidadSCH/Curso/paralelo/estudiantes/'.$id);
    }

    
    public function validateExistsParalelo($datos , $id){
        $paralelo = paralelo::where([
            ['idNivel', '=', $id],
            ['nombreP', 'like',$datos]
        ])->count();
        return  ($paralelo > 0);
    }

   

      

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listarParalelo (Request $request,$id)
    {   $request->user()->authorizeRoles(['admin','user']);
        $searchText = "";
        $nivel=Nivel::findOrFail($id);
        if($request->searchText && $request->searchText != ""){
                  
            $paralelo = paralelo::where([
                ['idNivel', '=', $id],
                ['nombreP', 'like',$request->searchText.'%']
            ])->get();
        }else{

           // $paralelo = Nivel::find($id)->load('paralelos');
             $paralelo = paralelo::where('idNivel', 'like',$id )->get();
        }    

    
        
        return view("Administrador.Curso.show",["paralelos"=>$paralelo , "nivel"=>$nivel,'searchText' => $searchText]);
    }


     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listarEstudiantes (Request $request, $id)
    {   $request->user()->authorizeRoles(['admin','user']);          
        $searchText = "";
        $paralelo=paralelo::findOrFail($id);
        $estudiantes = ParaleloUS::join('users', 'paralelo_user.user_id', '=', 'users.id')
        ->where("paralelo_user.paralelo_id", "=", $id)
        ->select('*')
        ->get();
        
        return view("Administrador.Curso.showEstudiante", ['estudiantes' => $estudiantes,'searchText' => $searchText , "paralelo"=>$paralelo]);
     
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
        $nivel=Nivel::findOrFail($id);
        return view("Administrador.Curso.edit",["nivel"=>$nivel]);
        
    }



     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editParalelo(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin','user']);
        $paralelo=paralelo::findOrFail($id);
        return view("Administrador.Curso.editParalelo",["paralelo"=>$paralelo]);
        
    }

    private function existsNombre($nombre){
        $data = Nivel::where('nombreN', $nombre)->count();
        return  ($data > 0);
    } 


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) // para realizar la modificacion
    {

        if($request->nombreN && $request->nombreN != ""){
            
            $nivel=Nivel::findOrFail($id);

            if( !$this->existsNombre($request->get('nombreN'))){
                $nivel->nombreN=$request->get('nombreN');
                $nivel->save();
                Session::flash('success', 'ActualizacionCorrecta');
            }else{
                Session::flash('warning', 'Ya existe un curso con el nombre ingresado !');
            }
                 

        }else{
            Session::flash('error', 'Se debe ingresar el nombre');
        }
 
        return Redirect::to('UnidadSCH/Curso');
 
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateParalelo(Request $request, $id) // para realizar la modificacion
    {

        if($request->nombreP && $request->nombreP != ""){
            
            $paralelo=paralelo::findOrFail($id);

            if( !$this->validateExistsParalelo($request->get('nombreP'), $paralelo->nivel->id)){
                $paralelo->nombreP=$request->get('nombreP');
                $paralelo->save();
                Session::flash('success', 'ActualizacionCorrecta');
            }else{
                Session::flash('warning', 'Ya existe un paralelo con el nombre ingresado !');
            }
                 

        }else{
            Session::flash('error', 'Se debe ingresar el nombre');
        }
 
        return Redirect::to('UnidadSCH/Curso/paralelo/'.$paralelo->nivel->id);
 
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nivel = Nivel::find($id);
        $nivel->load('paralelos');

        if($nivel->paralelos->count() <= 0){
            $nivel->delete();
            Session::flash('success', 'Eliminación Correcta');
        } else{
            Session::flash('warning', 'No se puede eliminar por que cuenta con paralelos asociados');
        }
        return Redirect::to('UnidadSCH/Curso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyParalelo($id)
    {
        $paralelo = paralelo::find($id);
        $paralelo->load('paraleloUsuario');

        if($paralelo->paraleloUsuario->count() <= 0){
            $paralelo->delete();
            Session::flash('success', 'Eliminación Correcta');
        } else{
            Session::flash('warning', 'No se puede eliminar por que cuenta con usuarios asociados');
        }
        return Redirect::to('UnidadSCH/Curso/paralelo/'.$paralelo->nivel->id);
    }


     /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyEstudiante($id,$paralelo)
    {
    
        $estudiante= User::find($id);
        $estudiante->load('paralelos');
       
        if($estudiante->paralelos->count() <= 0){
            $estudiante->delete();
            Session::flash('success', 'Eliminación Correcta');
        } else{
            Session::flash('warning', 'No se puede eliminar por que cuenta con paralelos asociados');
        }
        return Redirect::to('UnidadSCH/Curso/paralelo/estudiantes/'.$paralelo);
    }



    
}
