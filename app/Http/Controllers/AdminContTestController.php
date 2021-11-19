<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//llamado
use App\Http\Requests;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\User;
use App\Desactiv;
use App\Destest;
use App\Respuesta;
use App\DesTestUser;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Test;

use DB;
use App\TestPreg;
//

class AdminContTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
    {
               //
        $idTs=$request->get('idTest');
        $test = Test::find($idTs);
        $fecha = date("Y-m-d");
        if($request->idRespuesta){
            $respuesta = Respuesta::find($request->idRespuesta);
            $desTest = Destest::create([
                'nombUsDes' => $request->user()->name . " " .$request->user()->apellido,
                'notaDes' => $respuesta->notaR,
                'fechaDes' => $fecha,
                'descTest' => $idTs
            ]);

            DesTestUser::create([
                'user_id' => $request->user()->id,
                'destest_id' => $desTest->id
            ]);
        } else {
            $desTest = null;
        }
        return view ('Administrador.ResolvTest.resp',["DesT"=>$desTest, "test" => $test]);
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

    //vocales
    public function verTestA(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Administrador.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
    }

    public function verTestE(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Administrador.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
    }

    public function verTestI(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Administrador.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
    }

    public function verTestO(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Administrador.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
    }

    public function verTestU(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Administrador.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
    }

    //numeros
    public function verTestNU(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Administrador.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
    }

    public function verTestND(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Administrador.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
    }

    public function verTestNC(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Administrador.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
    }

    public function verTestNCC(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Administrador.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
    }
    //familia
    public function verTestABU(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Administrador.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
    }

    public function verTestHER(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Administrador.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
    }

    public function verTestMA(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Administrador.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
    }

    public function verTestPA(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Administrador.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
    }

    public function verTestPRI(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Administrador.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
    }
    //ANIMALES
    public function verTestELEF(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Administrador.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
    }

    public function verTestGall(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Administrador.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
    }

    public function verTestGat(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Administrador.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
    }

    public function verTestPerr(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Administrador.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
    }

    public function verTestVac(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Administrador.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
    }


}
