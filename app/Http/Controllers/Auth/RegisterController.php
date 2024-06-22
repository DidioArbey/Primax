<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {

        return Validator::make($data, [
                    'name' => ['required', 'string', 'max:255'],
                    'lastname' => ['required', 'string', 'max:255'],
                    'document_number' => ['required', 'max:255', 'unique:users'],
                    'birthday' => ['required'],
                    'gender' => ['required'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'phone' => ['required', 'string'],
                    'department' => ['required'],
                    'city' => ['required'],
                    'terms_conditions' => 'accepted'
                        ], [
                    'name.required' => 'Nombre completo requerido',
                    'lastname.required' => 'Los Apellidos son  requeridos',
                    'document_number.required' => 'Número de Cédula requerido',
                    'document_number.unique' => 'Número de Cédula ya registrado',
                    'birthday.required' => 'Fecha de Nacimiento requerida',
                    'gender.required' => 'Género requerido',
                    'email.required' => 'Correo electrónico requerido',
                    'email.email' => 'Correo electrónico invalido',
                    'email.unique' => 'Correo electrónico ya registrado',
                    'phone.required' => 'Número de Celular requerido',
                    'department.required' => 'Departamento requerido',
                    'city.required' => 'Ciudad requerida',
                    'terms_conditions.accepted' => 'Debe aceptar términos y condiciones',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {
        return User::create([
                    'name' => $data['name'],
                    'lastname' => $data['lastname'],
                    'document_type_id' => 1,
                    'document_number' => $data['document_number'],
                    'birthday' => $data['birthday'],
                    'phone' => $data['phone'],
                    'email' => $data['email'],
                    'gender_id' => $data['gender'],
                    'city_id' => $data['city'],
                    'password' => Hash::make('12345678'),
                    'profile_id' => 1,
                    'active' => 1
        ]);
    }

}
