<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\RegistersUsers;
// llamado
// use App\User;
use App\Role;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    public function redirectPath()
        {
        if (auth()->user()->hasRole('admin')) {
            return '/UnidadSCH/index';

        }
        else{
            if(auth()->user()->hasRole('docent')){
                return '/Docente/index';
            }
        }

        return '/Estudiante/index';
        }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'apellido' => 'required|regex:/^[\pL\s\-]+$/u',
            'direccion' => 'required|string|max:255',
            'telefono' => 'nullable|numeric|min:10',
            'celular' => 'nullable|numeric|min:10',
            'foto'=>'mimes:jpeg,bmp,jpg,png',
            'email' => 'required|string|email|max:255|unique:users',
            'estado'=>'required|max:1',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
    	if (Input::hasFile('foto')){
         $file=Input::file('foto');
         $nameF=time().$file->getClientOriginalName();
         $file->move(public_path().'/img/perfil/',$nameF);
        }


        return User::create([
            'name' => $data['name'],
            'apellido' => $data['apellido'],
            'direccion' => $data['direccion'],
            'telefono' => $data['telefono'],
            'celular' => $data['celular'],
            'foto' => $nameF,
            'email' => $data['email'],
            'estado' => $data['estado'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
        {
            return view('main.auth.register');
        }
}
