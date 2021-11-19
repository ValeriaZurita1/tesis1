<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* Rutas de la pagina Principal */

use App\Http\Controllers\AdminRompController;

Route::get('/','PrincipalContoller@index');
Route::get('/info','PrincipalContoller@informacion');
Route::get('/unidadeducativa','PrincipalContoller@unidadEducativa');
Route::get('/cursos','PrincipalContoller@cursos');
Route::get('/loginEstudiante', 'PrincipalContoller@loginEstudiante');





// Pagina Presentacion
Route::get('/informacion','DireccionController@infoIndex')->name('informacion');
Route::get('UnidadEduc','DireccionController@UnidEIndex');
Route::get('/Docentes','DireccionController@DocentIndex')->name('Docent');
Route::get('CursoU/InicialD','DireccionController@InicialIndex')->name('Inicial');
Route::get('CursosUnidadEduc','DireccionController@CursUnidEIndex');
Route::get('CursoU/Jardin','DireccionController@JardinIndex');
Route::get('CursoU/SegundoB','DireccionController@SegBIndex');
Route::get('CursoU/TerceroB','DireccionController@TercBIndex');
Route::get('CursoU/CuartoB','DireccionController@CuartBIndex');
Route::get('CursoU/QuintoB','DireccionController@QuinBIndex');
Route::get('CursoU/SextoB','DireccionController@SextBIndex');

//clase
Route::get('EstudianteSCH/ControlActividad/vocales/A/info','DireccionController@infovLA');
Route::get('EstudianteSCH/ControlActividad/vocales/A/video','DireccionController@infovLAv');

Route::get('EstudianteSCH/ControlActividad/vocales/E/info','DireccionController@infovLE');
Route::get('EstudianteSCH/ControlActividad/vocales/E/video','DireccionController@infovLEv');

Route::get('EstudianteSCH/ControlActividad/vocales/I/info','DireccionController@infovLI');
Route::get('EstudianteSCH/ControlActividad/vocales/I/video','DireccionController@infovLIv');

Route::get('EstudianteSCH/ControlActividad/vocales/O/info','DireccionController@infovLO');
Route::get('EstudianteSCH/ControlActividad/vocales/O/video','DireccionController@infovLOv');

Route::get('EstudianteSCH/ControlActividad/vocales/U/info','DireccionController@infovLU');
Route::get('EstudianteSCH/ControlActividad/vocales/U/video','DireccionController@infovLUv');

//
Route::get('EstudianteSCH/ControlActividad/numeros/1/info','DireccionController@infovN1');
Route::get('EstudianteSCH/ControlActividad/numeros/1/video','DireccionController@infovN1v');

Route::get('EstudianteSCH/ControlActividad/numeros/2/info','DireccionController@infovN2');
Route::get('EstudianteSCH/ControlActividad/numeros/2/video','DireccionController@infovN2v');

Route::get('EstudianteSCH/ControlActividad/numeros/3/info','DireccionController@infovN3');
Route::get('EstudianteSCH/ControlActividad/numeros/3/video','DireccionController@infovN3v');

Route::get('EstudianteSCH/ControlActividad/numeros/4/info','DireccionController@infovN4');
Route::get('EstudianteSCH/ControlActividad/numeros/4/video','DireccionController@infovN4v');

Route::get('EstudianteSCH/ControlActividad/numeros/5/info','DireccionController@infovN5');
Route::get('EstudianteSCH/ControlActividad/numeros/5/video','DireccionController@infovN5v');

//
Route::get('EstudianteSCH/ControlActividad/familia/abuelo/info','DireccionController@infovF1');
Route::get('EstudianteSCH/ControlActividad/familia/abuelo/video','DireccionController@infovF1v');

Route::get('EstudianteSCH/ControlActividad/familia/hermano/info','DireccionController@infovF2');
Route::get('EstudianteSCH/ControlActividad/familia/hermano/video','DireccionController@infovF2v');

Route::get('EstudianteSCH/ControlActividad/familia/mama/info','DireccionController@infovF3');
Route::get('EstudianteSCH/ControlActividad/familia/mama/video','DireccionController@infovF3v');

Route::get('EstudianteSCH/ControlActividad/familia/papa/info','DireccionController@infovF4');
Route::get('EstudianteSCH/ControlActividad/familia/papa/video','DireccionController@infovF4v');

Route::get('EstudianteSCH/ControlActividad/familia/primo/info','DireccionController@infovF5');
Route::get('EstudianteSCH/ControlActividad/familia/primo/video','DireccionController@infovF5v');

//
Route::get('EstudianteSCH/ControlActividad/animales/elef/info','DireccionController@infovA1');
Route::get('EstudianteSCH/ControlActividad/animales/elef/video','DireccionController@infovA1v');

Route::get('EstudianteSCH/ControlActividad/animales/gallo/info','DireccionController@infovA2');
Route::get('EstudianteSCH/ControlActividad/animales/gallo/video','DireccionController@infovA2v');

Route::get('EstudianteSCH/ControlActividad/animales/gato/info','DireccionController@infovA3');
Route::get('EstudianteSCH/ControlActividad/animales/gato/video','DireccionController@infovA3v');

Route::get('EstudianteSCH/ControlActividad/animales/perro/info','DireccionController@infovA4');
Route::get('EstudianteSCH/ControlActividad/animales/perro/video','DireccionController@infovA4v');

Route::get('EstudianteSCH/ControlActividad/animales/vaca/info','DireccionController@infovA5');
Route::get('EstudianteSCH/ControlActividad/animales/vaca/video','DireccionController@infovA5v');


//autentific
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/GestorP', 'DireccionController@indexGestor')->name('gestorP');
//Admin
Route::get('/UnidadSCH/index', 'DireccionController@indexAd')->name('gestorIndex');
Route::get('/UnidadSCH/actividades', 'DireccionController@indexAdAct')->name('ActiviIndex');
Route::get('/UnidadSCH/actividades/vocales', 'DireccionController@indexAdVoc')->name('VocIndex');

Route::get('/UnidadSCH/actividades/info/{identificador}', 'DireccionController@infoAd')->name('Administrador.actividad.info');
Route::get('/UnidadSCH/actividades/clase/{identificador}', 'DireccionController@claseAd')->name('Administrador.actividad.clase');

Route::get('/UnidadSCH/actividades/numeros', 'DireccionController@indexAdNum')->name('NumIndex');
Route::get('/UnidadSCH/actividades/familia', 'DireccionController@indexAdFam')->name('FamIndex');
Route::get('/UnidadSCH/actividades/animales', 'DireccionController@indexAdAnim')->name('AnimIndex');
//rompVoc
Route::get('/UnidadSCH/Vocales/A', 'AdminRompController@indexA')->name('UAIndex');
Route::get('/UnidadSCH/Vocales/E', 'AdminRompController@indexE')->name('UEIndex');
Route::get('/UnidadSCH/Vocales/I', 'AdminRompController@indexI')->name('IIndex');
Route::get('/UnidadSCH/Vocales/O', 'AdminRompController@indexO')->name('OIndex');
Route::get('/UnidadSCH/Vocales/U', 'AdminRompController@indexU')->name('UIndex');

Route::post('/UnidadSCH/Vocales/{let}', 'AdminRompController@store')->name('Index.store');

Route::get('UnidadSCH/Vocales/A/{id}', 'AdminRompController@verObjA')->name('actividades.testVocals.a');
Route::get('UnidadSCH/Vocales/E/{vocal}', 'AdminRompController@verObjE')->name('actividades.testVocals.e');
Route::get('UnidadSCH/Vocales/I/{id}', 'AdminRompController@verObjI')->name('actividades.testVocals.i');
Route::get('UnidadSCH/Vocales/O/{id}', 'AdminRompController@verObjO')->name('actividades.testVocals.o');
Route::get('UnidadSCH/Vocales/U/{vocal}', 'AdminRompController@verObjU')->name('actividades.testVocals.u');

//rompNum
Route::get('/UnidadSCH/Num/1', 'AdminRompController@indexNU')->name('NUIndex');
Route::get('/UnidadSCH/Num/2', 'AdminRompController@indexND')->name('NDIndex');
Route::get('/UnidadSCH/Num/3', 'AdminRompController@indexNT')->name('NTIndex');
Route::get('/UnidadSCH/Num/4', 'AdminRompController@indexNC')->name('NCIndex');
Route::get('/UnidadSCH/Num/5', 'AdminRompController@indexNCC')->name('NCCIndex');

Route::get('UnidadSCH/Num/1/{id}', 'AdminRompController@verObjNU')->name('actividades.testNumeros.1');
Route::get('UnidadSCH/Num/2/{id}', 'AdminRompController@verObjND')->name('actividades.testNumeros.2');
Route::get('UnidadSCH/Num/3/{id}', 'AdminRompController@verObjNT')->name('actividades.testNumeros.3');
Route::get('UnidadSCH/Num/4/{id}', 'AdminRompController@verObjNC')->name('actividades.testNumeros.4');
Route::get('UnidadSCH/Num/5/{id}', 'AdminRompController@verObjNCC')->name('actividades.testNumeros.5');
//rompFam
Route::get('/UnidadSCH/Fam/papa', 'AdminRompController@indexPa')->name('PaIndex');
Route::get('/UnidadSCH/Fam/mama', 'AdminRompController@indexMa')->name('MaIndex');
Route::get('/UnidadSCH/Fam/hermano', 'AdminRompController@indexHer')->name('HerIndex');
Route::get('/UnidadSCH/Fam/abuelo', 'AdminRompController@indexAbu')->name('AbuIndex');
Route::get('/UnidadSCH/Fam/primo', 'AdminRompController@indexPri')->name('PriIndex');

Route::get('UnidadSCH/Fam/papa/{id}', 'AdminRompController@verObjPa')->name('actividades.testFamilia.papa');
Route::get('UnidadSCH/Fam/mama/{id}', 'AdminRompController@verObjMa')->name('actividades.testFamilia.mama');
Route::get('UnidadSCH/Fam/hermano/{id}', 'AdminRompController@verObjHer')->name('actividades.testFamilia.hermano');
Route::get('UnidadSCH/Fam/abuelo/{id}', 'AdminRompController@verObjAbu')->name('actividades.testFamilia.abuelo');
Route::get('UnidadSCH/Fam/primo/{id}', 'AdminRompController@verObjPri')->name('actividades.testFamilia.primo');

//rompAnim
Route::get('/UnidadSCH/Anim/Elef', 'AdminRompController@indexElef')->name('ElefIndex');
Route::get('/UnidadSCH/Anim/Gall', 'AdminRompController@indexGall')->name('GallIndex');
Route::get('/UnidadSCH/Anim/Gat', 'AdminRompController@indexGat')->name('GatIndex');
Route::get('/UnidadSCH/Anim/Perr', 'AdminRompController@indexPerr')->name('PerrIndex');
Route::get('/UnidadSCH/Anim/Vac', 'AdminRompController@indexVac')->name('VacIndex');

Route::get('UnidadSCH/Anim/Elef/{id}', 'AdminRompController@verObjElef')->name('actividades.testAnimales.elefante');
Route::get('UnidadSCH/Anim/Gall/{id}', 'AdminRompController@verObjGall')->name('actividades.testAnimales.gallo');
Route::get('UnidadSCH/Anim/Gat/{id}', 'AdminRompController@verObjGat')->name('actividades.testAnimales.gato');
Route::get('UnidadSCH/Anim/Perr/{id}', 'AdminRompController@verObjPerr')->name('actividades.testAnimales.perro');
Route::get('UnidadSCH/Anim/Vac/{id}', 'AdminRompController@verObjVac')->name('actividades.testAnimales.vaca');

Route::get('UnidadSCH/Rendimiento/AlumnosT', 'AdminRendController@indexDesT')->name('DesarrolloTest');

Route::resource('UnidadSCH/Usuarios', 'AdminUserController');
Route::resource('UnidadSCH/Curso', 'AdminCursoController');
Route::resource('UnidadSCH/Alumnos', 'AlumnosController');
Route::resource('UnidadSCH/RompecabezasV', 'AdminRompController');
Route::resource('UnidadSCH/Asistencia', 'AdminAsistController');

// curso con nivel
Route::get('UnidadSCH/Curso/paralelo/{paralelo}', 'AdminCursoController@listarParalelo');
Route::get('UnidadSCH/Curso/paralelo/edit/{paralelo}', 'AdminCursoController@editParalelo');
Route::PUT('UnidadSCH/Curso/paralelo/{paralelo}', 'AdminCursoController@updateParalelo');
Route::delete('UnidadSCH/Curso/paralelo/{paralelo}', 'AdminCursoController@destroyParalelo');

// nivel con paralelo //
Route::get('UnidadSCH/Curso/paralelo/create/{paralelo}',  'AdminCursoController@create_Paralelo');
Route::post('UnidadSCH/Curso/paralelo/Create/{paralelo}',  'AdminCursoController@store_Paralelo');

/// paralelo con estudiante ///
Route::get('UnidadSCH/Curso/paralelo/estudiantes/{paralelo}', 'AdminCursoController@listarEstudiantes');

// crear estudiante de un paralelo
Route::get('UnidadSCH/Curso/paralelo/estudiante/create/{paralelo}',  'AdminCursoController@create_Estudiante');
Route::post('UnidadSCH/Curso/paralelo/estudiante/Create/{paralelo}',  'AdminCursoController@store_Estudiante');
Route::delete('UnidadSCH/Curso/paralelo/estudiantes/{paralelo}/{curso}', 'AdminCursoController@destroyEstudiante');

///

Route::get('UnidadSCH/Asistencia/paralelo/{paralelo}', 'AdminAsistController@listadoAlumnosParalelo');
Route::get('UnidadSCH/Asistencia/paralelo/informe/{paraleloUsuario}', 'AdminAsistController@listadoAsistenciasParaleloUsuario')
    ->name('administrador.paralelo.usuario.infoasis');

    //listadoAsistenciasParaleloUsuarioFechas
Route::post('UnidadSCH/Asistencia/paralelo/informe/{paraleloUsuario}', 'AdminAsistController@listadoAsistenciasParaleloUsuarioFechas');

Route::get('Admin/Reportes/Asistencia/usuario/pdf', 'AdminAsistController@generatePdfAsistenciasUsuarioCurso');
Route::get('Admin/Reportes/Asistencia/curso/pdf', 'AdminAsistController@generatePdfAsistenciageneralCurso');


Route::resource('UnidadSCH/RegistroAsis', 'AdminRegAsisController');
Route::resource('UnidadSCH/RegistroAsisF', 'AdminRegAsisFController');
Route::resource('UnidadSCH/Test', 'AdminTestController'); //inicio test
Route::resource('UnidadSCH/Test/Preg', 'AdminPregController');
Route::resource('UnidadSCH/Test/Resp', 'AdminRespController');
Route::resource('UnidadSCH/Activ/Regist', 'AdminContTestController');
Route::resource('UnidadSCH/Rendimiento/Alumnos', 'AdminRendController');

//adminVer
Route::get('UnidadSCH/Alumnos/AggAlumn/{id}', 'AlumnosController@verList');
Route::get('UnidadSCH/Alumnos/AddAlumn/{id}', 'AlumnosController@AddEst');
Route::get('UnidadSCH/Asistencia/AddAlumn/{id}', 'AdminAsistController@AddEst');
Route::get('UnidadSCH/Test/AggPreg/{id}', 'AdminTestController@verList');//test
Route::get('UnidadSCH/Test/Preg/AggResp/{id}', 'AdminPregController@verList');//test
Route::get('UnidadSCH/Activ/Regist/A/{id}', 'AdminContTestController@verTestA');
Route::get('UnidadSCH/Activ/Regist/E/{id}', 'AdminContTestController@verTestE');
Route::get('UnidadSCH/Activ/Regist/I/{id}', 'AdminContTestController@verTestI');
Route::get('UnidadSCH/Activ/Regist/O/{id}', 'AdminContTestController@verTestO');
Route::get('UnidadSCH/Activ/Regist/U/{id}', 'AdminContTestController@verTestU');

//NUMEROS
Route::get('UnidadSCH/Activ/Regist/1/{id}', 'AdminContTestController@verTestNU');
Route::get('UnidadSCH/Activ/Regist/2/{id}', 'AdminContTestController@verTestND');
Route::get('UnidadSCH/Activ/Regist/3/{id}', 'AdminContTestController@verTestNT');
Route::get('UnidadSCH/Activ/Regist/4/{id}', 'AdminContTestController@verTestNC');
Route::get('UnidadSCH/Activ/Regist/5/{id}', 'AdminContTestController@verTestNCC');

//fAMILIA
Route::get('UnidadSCH/Activ/Regist/Abuelo/{id}', 'AdminContTestController@verTestABU');
Route::get('UnidadSCH/Activ/Regist/Hermano/{id}', 'AdminContTestController@verTestHER');
Route::get('UnidadSCH/Activ/Regist/Mama/{id}', 'AdminContTestController@verTestMA');
Route::get('UnidadSCH/Activ/Regist/Papa/{id}', 'AdminContTestController@verTestPA');
Route::get('UnidadSCH/Activ/Regist/Primo/{id}', 'AdminContTestController@verTestPRI');

//animales
Route::get('UnidadSCH/Activ/Regist/Elefante/{id}', 'AdminContTestController@verTestELEF');
Route::get('UnidadSCH/Activ/Regist/Gallo/{id}', 'AdminContTestController@verTestGall');
Route::get('UnidadSCH/Activ/Regist/Gato/{id}', 'AdminContTestController@verTestGat');
Route::get('UnidadSCH/Activ/Regist/Perro/{id}', 'AdminContTestController@verTestPerr');
Route::get('UnidadSCH/Activ/Regist/Vaca/{id}', 'AdminContTestController@verTestVac');


//reportes
Route::resource('UnidadSCH/Reportes/lista','pdfRepAsisController');
Route::get('UnidadSCH/Reportes/lista/generar', 'pdfRepAsisController@buscar');
Route::get('UnidadSCH/Reportes/Actividades', 'pdfRepAsisController@indexAct');
Route::post('UnidadSCH/Reportes/Actividades', 'pdfRepAsisController@indexActParalelo');




Route::get('UnidadSCH/Reportes/Actividades/user/{idParaleloUsuario}', 'pdfRepAsisController@actividadesEstudianteParalelo');
Route::get('Admin/Reportes/Actividades/curso/pdf', 'pdfRepAsisController@generatePdfActividadesUsuariosCurso')
->name('admin.activ.curso.pdf');
Route::post('UnidadSCH/Reportes/Actividades/user/{idParaleloUsuario}', 'pdfRepAsisController@actividadesEstudianteParaleloActividad');
Route::post('UnidadSCH/Reportes/Actividades/user/fechas/{idParaleloUsuario}', 'pdfRepAsisController@actividadesEstudianteParaleloActividadFechas');
Route::get('Admin/Reportes/Actividades/user/pdf', 'pdfRepAsisController@generatePdfActividadUsuarioCurso')
->name('admin.activ.user.pdf');

Route::get('Admin/Reportes/Test/curso/pdf', 'pdfRepAsisController@generatePdfTestUsuariosCurso')
->name('admin.test.curso.pdf');
Route::get('Admin/Reportes/Test/user/pdf', 'pdfRepAsisController@generatePdfTestUsuarioCurso')
->name('admin.activ.user.pdf');

Route::get('UnidadSCH/Reportes/Generar/{id}', 'pdfRepAsisController@genList');

/* */
Route::get('UnidadSCH/Reportes/RendimientoA', 'pdfRepAsisController@indexRAct');
Route::get('UnidadSCH/Reportes/GenerarRA/{id}', 'pdfRepAsisController@genListA');
Route::get('UnidadSCH/Reportes/RendimientoT', 'pdfRepAsisController@indexRTest');
Route::post('UnidadSCH/Reportes/RendimientoT', 'pdfRepAsisController@indexRTestParalelo');
Route::get('UnidadSCH/Reportes/RendimientoT/user/{idParaleloUsuario}', 'pdfRepAsisController@testEstudianteParalelo');
Route::post('UnidadSCH/Reportes/RendimientoT/user/{idParaleloUsuario}', 'pdfRepAsisController@testEstudianteParaleloPost');
Route::post('UnidadSCH/Reportes/RendimientoT/user/fechas/{idParaleloUsuario}', 'pdfRepAsisController@testEstudianteParaleloFechas');



Route::get('UnidadSCH/Reportes/GenerarRT/{id}', 'pdfRepAsisController@genListT');

//Docente
Route::get('/Docente/index', 'DireccionController@indexDC')->name('gestorIndex');
Route::resource('DocenteSCH/Usuarios', 'DocUserController');
Route::resource('DocenteSCH/Curso', 'DocCursoController');
Route::resource('DocenteSCH/Alumnos', 'DocAlumnosController');
Route::resource('DocenteSCH/Asistencia', 'DocAsisController');

Route::get('DocenteSCH/Asistencia/paralelo/{paralelo}', 'DocAsisController@listadoAlumnosParalelo');
Route::get('DocenteSCH/Asistencia/paralelo/informe/{paraleloUsuario}', 'DocAsisController@listadoAsistenciasParaleloUsuario')
    ->name('docente.paralelo.usuario.infoasis');


Route::resource('DocenteSCH/RegistroAsis', 'DocRegistroAsisController');
Route::resource('DocenteSCH/RegistroAsisF', 'DocRegAsisFController');
Route::resource('DocenteSCH/Test', 'DocTestController'); //inicio test
Route::resource('DocenteSCH/Test/Preg', 'DocPregController');
Route::resource('DocenteSCH/Test/Resp', 'DocRespController');


//reportes
Route::resource('DocenteSCH/Reportes/lista','pdfDocRepAssController');
Route::get('DocenteSCH/Reportes/lista/generar', 'pdfDocRepAssController@buscar');
Route::get('DocenteSCH/Reportes/Actividades', 'pdfDocRepAssController@indexAct');
Route::get('DocenteSCH/Reportes/Generar/{id}', 'pdfDocRepAssController@genList');

//DocentVer
Route::get('DocenteSCH/Alumnos/AggAlumn/{id}', 'DocAlumnosController@verList');
Route::get('DocenteSCH/Alumnos/AddAlumn/{id}', 'DocAlumnosController@AddEst');
Route::get('DocenteSCH/Test/AggPreg/{id}', 'DocTestController@verList');//test
Route::get('DocenteSCH/Test/Preg/AggResp/{id}', 'DocPregController@verList');//test



//Estudiante
Route::resource('EstudianteSCH/Activ/Regist', 'EstContTestController');
Route::resource('EstudianteSCH/Resultados/VerRegist', 'EstVerResActController');
Route::get('/Estudiante/index', 'DireccionController@indexEs')->name('gestorIndex');
Route::get('/EstudianteSCH/actividades', 'DireccionController@indexEsAct')->name('ActiviIndex');
Route::resource('EstudianteSCH/Alumnos', 'EstAlumnosController');
// Route::resource('EstudianteSCH/ControlActividad', 'EstControlActController');
Route::resource('EstudianteSCH/Asistencia', 'EstAsistController');

//
Route::get('EstudianteSCH/ControlActividad', 'EstControlActController@index');
Route::get('/EstudianteSCH/ControlActividad/vocales', 'EstControlActController@indexCtVoc')->name('ctVocIndex');
Route::get('/EstudianteSCH/ControlActividad/numeros', 'EstControlActController@indexCtNum')->name('ctNumIndex');
Route::get('/EstudianteSCH/ControlActividad/familia', 'EstControlActController@indexCtFam')->name('ctFamIndex');
Route::get('/EstudianteSCH/ControlActividad/animales', 'EstControlActController@indexCtAnim')->name('ctAnimIndex');
//

Route::get('/EstudianteSCH/actividades/vocales', 'DireccionController@indexEsVoc')->name('VocIndex');
Route::get('/EstudianteSCH/actividades/numeros', 'DireccionController@indexEsNum')->name('NumIndex');
Route::get('/EstudianteSCH/actividades/familia', 'DireccionController@indexEsFam')->name('FamIndex');
Route::get('/EstudianteSCH/actividades/animales', 'DireccionController@indexEsAnim')->name('AnimIndex');

Route::post('/EstudianteSCH/Vocales/{let}', 'EstRompController@store')->name('Index.Estudiante.store');
//rompVoc
Route::get('/EstudianteSCH/Vocales/A', 'EstRompController@indexA')->name('AIndex');
Route::get('/EstudianteSCH/Vocales/E', 'EstRompController@indexE')->name('EIndex');
Route::get('/EstudianteSCH/Vocales/I', 'EstRompController@indexI')->name('IIndex');
Route::get('/EstudianteSCH/Vocales/O', 'EstRompController@indexO')->name('OIndex');
Route::get('/EstudianteSCH/Vocales/U', 'EstRompController@indexU')->name('UIndex');

Route::get('EstudianteSCH/Vocales/A/{id}', 'EstRompController@verObjA')->name('Estudiantes.actividades.testVocals.a');
Route::get('EstudianteSCH/Vocales/E/{id}', 'EstRompController@verObjE')->name('Estudiantes.actividades.testVocals.e');
Route::get('EstudianteSCH/Vocales/I/{id}', 'EstRompController@verObjI')->name('Estudiantes.actividades.testVocals.i');
Route::get('EstudianteSCH/Vocales/O/{id}', 'EstRompController@verObjO')->name('Estudiantes.actividades.testVocals.o');
Route::get('EstudianteSCH/Vocales/U/{id}', 'EstRompController@verObjU')->name('Estudiantes.actividades.testVocals.u');

Route::get('EstudianteSCH/Activ/Regist/A/{id}', 'EstContTestController@verTestA');
Route::get('EstudianteSCH/Activ/Regist/E/{id}', 'EstContTestController@verTestE');
Route::get('EstudianteSCH/Activ/Regist/I/{id}', 'EstContTestController@verTestI');
Route::get('EstudianteSCH/Activ/Regist/O/{id}', 'EstContTestController@verTestO');
Route::get('EstudianteSCH/Activ/Regist/U/{id}', 'EstContTestController@verTestU');


Route::get('EstudianteSCH/Resultados/VerRegist/A/{id}', 'EstVerResActController@verRegA');
Route::get('EstudianteSCH/Resultados/VerRegist/E/{id}', 'EstVerResActController@verRegE');
Route::get('EstudianteSCH/Resultados/VerRegist/I/{id}', 'EstVerResActController@verRegI');
Route::get('EstudianteSCH/Resultados/VerRegist/O/{id}', 'EstVerResActController@verRegO');
Route::get('EstudianteSCH/Resultados/VerRegist/U/{id}', 'EstVerResActController@verRegU');

//rompNum
Route::get('/EstudianteSCH/Num/1', 'EstRompController@indexNU')->name('NUIndex');
Route::get('/EstudianteSCH/Num/2', 'EstRompController@indexND')->name('NDIndex');
Route::get('/EstudianteSCH/Num/3', 'EstRompController@indexNT')->name('NTIndex');
Route::get('/EstudianteSCH/Num/4', 'EstRompController@indexNC')->name('NCIndex');
Route::get('/EstudianteSCH/Num/5', 'EstRompController@indexNCC')->name('NCCIndex');

//NUMEROS
Route::get('EstudianteSCH/Activ/Regist/1/{id}', 'EstContTestController@verTestNU');
Route::get('EstudianteSCH/Activ/Regist/2/{id}', 'EstContTestController@verTestND');
Route::get('EstudianteSCH/Activ/Regist/3/{id}', 'EstContTestController@verTestNT');
Route::get('EstudianteSCH/Activ/Regist/4/{id}', 'EstContTestController@verTestNC');
Route::get('EstudianteSCH/Activ/Regist/5/{id}', 'EstContTestController@verTestNCC');


Route::get('EstudianteSCH/Num/1/{id}', 'EstRompController@verObjNU')->name('Estudiantes.actividades.testNumeros.1');
Route::get('EstudianteSCH/Num/2/{id}', 'EstRompController@verObjND')->name('Estudiantes.actividades.testNumeros.2');
Route::get('EstudianteSCH/Num/3/{id}', 'EstRompController@verObjNT')->name('Estudiantes.actividades.testNumeros.3');
Route::get('EstudianteSCH/Num/4/{id}', 'EstRompController@verObjNC')->name('Estudiantes.actividades.testNumeros.4');
Route::get('EstudianteSCH/Num/5/{id}', 'EstRompController@verObjNCC')->name('Estudiantes.actividades.testNumeros.5');

Route::get('EstudianteSCH/Resultados/VerRegist/1/{id}', 'EstVerResActController@verRegNU');
Route::get('EstudianteSCH/Resultados/VerRegist/2/{id}', 'EstVerResActController@verRegND');
Route::get('EstudianteSCH/Resultados/VerRegist/3/{id}', 'EstVerResActController@verRegNT');
Route::get('EstudianteSCH/Resultados/VerRegist/4/{id}', 'EstVerResActController@verRegNC');
Route::get('EstudianteSCH/Resultados/VerRegist/5/{id}', 'EstVerResActController@verRegNCC');

//rompFam
Route::get('/EstudianteSCH/Fam/papa', 'EstRompController@indexPa')->name('PaIndex');
Route::get('/EstudianteSCH/Fam/mama', 'EstRompController@indexMa')->name('MaIndex');
Route::get('/EstudianteSCH/Fam/hermano', 'EstRompController@indexHer')->name('HerIndex');
Route::get('/EstudianteSCH/Fam/abuelo', 'EstRompController@indexAbu')->name('AbuIndex');
Route::get('/EstudianteSCH/Fam/primo', 'EstRompController@indexPri')->name('PriIndex');

Route::get('EstudianteSCH/Fam/papa/{id}', 'EstRompController@verObjPa')->name('Estudiantes.actividades.familia.papa');
Route::get('EstudianteSCH/Fam/mama/{id}', 'EstRompController@verObjMa')->name('Estudiantes.actividades.familia.mama');
Route::get('EstudianteSCH/Fam/hermano/{id}', 'EstRompController@verObjHer')->name('Estudiantes.actividades.familia.hermano');
Route::get('EstudianteSCH/Fam/abuelo/{id}', 'EstRompController@verObjAbu')->name('Estudiantes.actividades.familia.abuelo');
Route::get('EstudianteSCH/Fam/primo/{id}', 'EstRompController@verObjPri')->name('Estudiantes.actividades.familia.primo');

//fAMILIA
Route::get('EstudianteSCH/Activ/Regist/Abuelo/{id}', 'EstContTestController@verTestABU');
Route::get('EstudianteSCH/Activ/Regist/Hermano/{id}', 'EstContTestController@verTestHER');
Route::get('EstudianteSCH/Activ/Regist/Mama/{id}', 'EstContTestController@verTestMA');
Route::get('EstudianteSCH/Activ/Regist/Papa/{id}', 'EstContTestController@verTestPA');
Route::get('EstudianteSCH/Activ/Regist/Primo/{id}', 'EstContTestController@verTestPRI');

Route::get('EstudianteSCH/Resultados/VerRegist/Abuelo/{id}', 'EstVerResActController@verRegAbu');
Route::get('EstudianteSCH/Resultados/VerRegist/Hermano/{id}', 'EstVerResActController@verRegHer');
Route::get('EstudianteSCH/Resultados/VerRegist/Mama/{id}', 'EstVerResActController@verRegMa');
Route::get('EstudianteSCH/Resultados/VerRegist/Papa/{id}', 'EstVerResActController@verRegPa');
Route::get('EstudianteSCH/Resultados/VerRegist/Primo/{id}', 'EstVerResActController@verRegPri');


//rompAnim
Route::get('/EstudianteSCH/Anim/Elef', 'EstRompController@indexElef')->name('ElefIndex');
Route::get('/EstudianteSCH/Anim/Gall', 'EstRompController@indexGall')->name('GallIndex');
Route::get('/EstudianteSCH/Anim/Gat', 'EstRompController@indexGat')->name('GatIndex');
Route::get('/EstudianteSCH/Anim/Perr', 'EstRompController@indexPerr')->name('PerrIndex');
Route::get('/EstudianteSCH/Anim/Vac', 'EstRompController@indexVac')->name('VacIndex');

Route::get('EstudianteSCH/Anim/Elef/{id}', 'EstRompController@verObjElef')->name('Estudiantes.actividades.animales.elefante');
Route::get('EstudianteSCH/Anim/Gall/{id}', 'EstRompController@verObjGall')->name('Estudiantes.actividades.animales.gallo');
Route::get('EstudianteSCH/Anim/Gat/{id}', 'EstRompController@verObjGat')->name('Estudiantes.actividades.animales.gato');
Route::get('EstudianteSCH/Anim/Perr/{id}', 'EstRompController@verObjPerr')->name('Estudiantes.actividades.animales.perro');
Route::get('EstudianteSCH/Anim/Vac/{id}', 'EstRompController@verObjVac')->name('Estudiantes.actividades.animales.vaca');

//animales
Route::get('EstudianteSCH/Activ/Regist/Elefante/{id}', 'EstContTestController@verTestELEF');
Route::get('EstudianteSCH/Activ/Regist/Gallo/{id}', 'EstContTestController@verTestGall');
Route::get('EstudianteSCH/Activ/Regist/Gato/{id}', 'EstContTestController@verTestGat');
Route::get('EstudianteSCH/Activ/Regist/Perro/{id}', 'EstContTestController@verTestPerr');
Route::get('EstudianteSCH/Activ/Regist/Vaca/{id}', 'EstContTestController@verTestVac');

Route::get('EstudianteSCH/Resultados/VerRegist/Elefante/{id}', 'EstVerResActController@verRegElef');
Route::get('EstudianteSCH/Resultados/VerRegist/Gallo/{id}', 'EstVerResActController@verRegGall');
Route::get('EstudianteSCH/Resultados/VerRegist/Gato/{id}', 'EstVerResActController@verRegGat');
Route::get('EstudianteSCH/Resultados/VerRegist/Perro/{id}', 'EstVerResActController@verRegPerr');
Route::get('EstudianteSCH/Resultados/VerRegist/Vaca/{id}', 'EstVerResActController@verRegVac');

//Estver
Route::get('EstudianteSCH/Alumnos/AggAlumn/{id}', 'EstAlumnosController@verList');
