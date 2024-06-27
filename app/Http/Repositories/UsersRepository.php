<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\CreatedUser;
use Illuminate\Support\Facades\Auth;
use App\Models\Genders;
use App\Models\Profiles;
use App\Models\LaborAreas;
use App\Models\Countrys;
use App\Models\BussinesLine;
use App\Models\Positions;
use App\Models\PasswordResetTokens;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;



class UsersRepository {

    public function validation_rules() {
        $rules = [
            'name' => 'required|max:50|regex:/^[^$%&<>#]+$/',
            'lastname' => 'required|max:100|regex:/^[^$%&<>#]+$/',
            'document_number' => 'required|unique:users',
            'phone' => 'required|numeric',
            'email' => 'required|string|email',
            'gender_id' => 'required|numeric',
            'labor_area_id' => 'required|numeric',
            'active' => 'required|numeric|min:0|max:1',
        ];
        return $rules;
    }

    public function messages_validation_rules() {
        return $rules = [
            'document_number.required' => 'El Documento de identificación es requerido.',
            'document_number.unique' => 'El Documento de identificación debe ser único.',
            'name.required' => 'El nombre es requerido.',
            'lastname.required' => 'El apellido es requerido.',
            'phone.required' => 'El télefono es requerido.',
            'email.required' => 'El email es requerido.',
            'email.email' => 'El email debe ser en un formato correcto example@example.com',
            'email.unique' => 'El email debe ser en único.',
            'document_number.regex' => 'Solo se permiten letras (a-z) y números (0-9).',
            'name.regex' => 'Solo se permiten letras (a-z) y números (0-9).',
            'lastname.regex' => 'Solo se permiten letras (a-z) y números (0-9).',
            'phone.regex' => 'Solo se permiten números (0-9).',
            'name.max' => 'El nombre es muy largo, máximo 255 caracteres.',
            'lastname.max' => 'El apellido es muy largo, máximo 100 caracteres.',
            'email.max' => 'El email es muy largo, máximo 255 caracteres.',
            'gender_id.required' => 'El género es requerido.',
            'labor_area_id.required' => 'El área de labor es requerido.',
        ];
    }

    public function getAllUsers(){
        $users = DB::table('users AS u')
            ->select('u.id', 'u.profile_id', 'u.name', 'u.lastname', 'u.nickname','u.document_number', 'u.phone', 'u.email', 'u.gender_id', 'u.labor_area_id', 'u.state_id', 'u.active')
            ->where('u.state_id', 5)
            ->orderBy('u.created_at', 'desc')
            ->get();
            // dd($users);
        return $users;
    }

    function storeUser() {
        $user = new User;
        $user->profile_id = request('profile_id');
        $user->name = request('name');
        $user->lastname = request('lastname');
        $user->nickname = request('nickname');
        $user->document_number = request('document_number');
        $user->phone = request('phone');
        $user->email = request('email');
        $user->gender_id = request('gender_id');
        $random_password = Str::random(16);
        $user->password = Hash::make($random_password);
        $user->labor_area_id = request('labor_area_id');
        $user->positions_id = request('positions_id');
        $user->country_id = request('country_id');
        $user->business_line_id = request('business_line_id');
        $user->company_id = request('company_id');
        $user->remember_token = Str::random(60);
        $user->state_id = 5;
        $user->active = request('active');
        $user->created_by_user_id = Auth::id();
        $success = $user->save();

        if($success){
            if($user) $this->asingProfile($user -> id);
            $token = Str::random(60);
            $password_reset_token = new PasswordResetTokens;
            $password_reset_token->email = $user->email;
            $password_reset_token->token = bcrypt($token);
            $success_reset_password = $password_reset_token->save();
            if($success_reset_password){
                $url = url(route('password.reset', [
                    'token' => $token,
                    'email' => $user->email,
                ], false));
            }
        }


        /*Send mail*/
        $name = $user->name;
        $email = $user->email;
        $document_number = $user->document_number;
        $token = $user->remember_token;
        Mail::to($email)->send(new CreatedUser($name, $document_number, $random_password, $url));
        return $user;
    }

    function getAllGenders(){
        return $genders= DB::select("SELECT * FROM genders ");
    }

    function getAllPosition(){
        return $positions = DB::select("SELECT * FROM positions");
    }

    function getAllCountrys(){
        return $countrys = DB::select("SELECT * FROM countrys");
    }

    function getAllBussinessLine(){
        return $bussinesLines = DB::select("SELECT * FROM business_line");
    }


    function getAllProfiles(){
        $profiles = DB::table('roles AS p')->select('p.id', 'p.name', 'p.active')
        ->where('p.active', 1)
        ->get();
        return $profiles;
    }

    function getAllLaborAreas(){
        $profiles = DB::table('labor_areas AS l')->select('l.id', 'l.name', 'l.description', 'l.active')
        ->where('l.active', 1)
        ->get();
        return $profiles;
    }

    function updatePassword(Request $request, $id) {

        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18',
        ];

        $messages = [
            'mypassword.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Los passwords no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('/user/edit/' . $id)->withErrors($validator);
        } else {
            $user = new User;
            $user->where('id', '=', $id)->update(['password' => bcrypt($request->password)]);
            return $user;
        }
    }

    function editUser($id) {
        $user = User::where('id', $id)->first();
        return $user;
    }

    function updateUser($id) {

        $user = User::where('id', $id)->update([
            'profile_id' => request('profile_id'),
            'name' => request('name'),
            'lastname' => request('lastname'),
            'document_number' => request('document_number'),
            'phone' => request('phone'),
            'email' => request('email'),
            'gender_id' => request('gender_id'),
            'labor_area_id' => request('labor_area_id'),
            'active' => request('active'),
            'updated_by_user_id' =>  Auth::id(),
        ]);
        if($user) $this->asingProfile($id);
        return $user;
    }

    function asingProfile($id){
        $user = User::find($id);
        $role = Role::where('id',request('profile_id'))->get();
        $user->roles()->sync($role);
    }

    function getUsersActiveCourse($course_id){
        return  $users = DB::select("SELECT ua.* FROM (SELECT @course_id:='$course_id' ci) param, users_active_course AS ua");
    }

    public function importUser($row_name, $row_lastname, $row_document_number, $row_phone, $row_email, $row_gender, $row_labor_area, $row_profile) {

        $random_password = Str::random(16);
        $user = new User;
        $user->profile_id = Profiles::where('name', $row_profile)->first()->id;;
        $user->name = $row_name;
        $user->lastname = $row_lastname;
        $user->document_number = $row_document_number;
        $user->phone = $row_phone;
        $user->email = $row_email;
        $user->gender_id = Genders::where('name', $row_gender)->first()->id;
        $user->password = Hash::make($random_password);
        $user->labor_area_id = LaborAreas::where('name', $row_labor_area)->first()->id;
        $user->remember_token = Str::random(60);
        $user->state_id = 5;
        $user->active = 1;
        $user->created_by_user_id = Auth::id();
        $success = $user->save();

        if($user) $this->asingProfile($user -> id);


        if($success){
            if($user) $this->asingProfile($user -> id);
            $token = Str::random(60);
            $password_reset_token = new PasswordResetTokens;
            $password_reset_token->email = $user->email;
            $password_reset_token->token = bcrypt($token);
            $success_reset_password = $password_reset_token->save();
            if($success_reset_password){
                $url = url(route('password.reset', [
                    'token' => $token,
                    'email' => $user->email,
                ], false));
            }
        }

        /*Send mail*/
        $name = $user->name;
        $email = $user->email;
        $document_number = $user->document_number;
        $token = $user->remember_token;
        Mail::to($email)->send(new CreatedUser($name, $document_number, $random_password, $url));
        return $user;
    }

    function getTrainersActive($course_id){
        return  $trainers = DB::select("SELECT ta.* FROM (SELECT @course_id:='$course_id' ci) param, trainers_active AS ta");
    }

    function getUsersActiveLearningPath($learning_path_id){
        return  $users = DB::select("SELECT ua.* FROM (SELECT @learning_path_id:='$learning_path_id' ci) param, users_active_learning_path AS ua");
    }

    function updateProfile($id) {
        $user = User::where('id', $id)->update([
            'name' => request('name'),
            'lastname' => request('lastname'),
            'phone' => request('phone'),
            'email' => request('email'),
            'gender_id' => request('gender_id'),
            'nickname' => request('nickname'),
            'updated_by_user_id' =>  Auth::id(),
        ]);
        return $user;
    }


}
