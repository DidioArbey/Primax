<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Http\Repositories\UsersRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Models\Users;
use App\Models\User;
use App\Models\Genders;
use Illuminate\Http\Request;
use App\Models\Profiles;
use App\Models\LaborAreas;

class UsersController extends Controller
{
    private $usersRepository;

    public function __construct(UsersRepository $usersRepository,)
    {
        $this->middleware('auth');
        $this->usersRepository = $usersRepository;
    }

    function list()
    {
        $user = auth()->user();
        $users = $this->usersRepository->getAllUsers();
        $genders = $this->usersRepository->getAllGenders();
        $profiles = $this->usersRepository->getAllProfiles();
        $labor_areas = $this->usersRepository->getAllLaborAreas();
        $positions = $this->usersRepository->getAllPosition();
        $countrys = $this->usersRepository->getAllCountrys();
        $bussinesLines = $this->usersRepository->getAllBussinessLine();
        return view('users.list-users', ['users' => $users, 'genders' => $genders, 'profiles' => $profiles, 'labor_areas' => $labor_areas,'positions' => $positions, 'countrys'=> $countrys, 'bussinesLines'=> $bussinesLines  ]);
    }

    function enable($id)
    {
        $data_update['active'] = 1;
        Users::where('id', $id)->update($data_update);
        return ['id' => $id];
    }

    function disable($id)
    {
        $data_update['active'] = 0;
        Users::where('id', $id)->update($data_update);
        return ['id' => $id];
    }

    function delete($id)
    {
        $data_update['state_id'] = 4;
        Users::where('id', $id)->update($data_update);
        return ['id' => $id];
        //Users::where('id', $id)->delete();
    }

    function store(Request $request)
    {
        $request->validate( $this->usersRepository->validation_rules(), $this->usersRepository->messages_validation_rules());
        $user = $this->usersRepository->storeUser();
        $user->save();
        return response()->json($user);
    }

    function updatePassword(Request $request)
    {
        $id = $request->user_id;
        $current_password = $request->current_password;
        if (Hash::check($request->mypassword, $current_password)) {
            $user = $this->usersRepository->updatePassword($request, $id);
            return redirect('/home')->with('updated_password_message', 'Contraseña actualizada con éxito');
        } else {
            return redirect('/user/edit/' . $id)->with('message', 'Credenciales incorrectas');
        }
    }

    function edit($id)
    {
        $user = $this->usersRepository->editUser($id);
        $genders = $this->usersRepository->getAllGenders();
        $profiles = $this->usersRepository->getAllProfiles();
        $labor_areas = $this->usersRepository->getAllLaborAreas();
        return view('users.edit-user', ['user' => $user, 'genders' => $genders, 'profiles' => $profiles, 'labor_areas' => $labor_areas]);
    }

    function update($id)
    {
        $this->usersRepository->updateUser($id);
        return redirect('/users');
    }

    function editPassword(Request $request)
    {
        $user = Auth::user();
        return view('users.updated-password', ['user' => $user]);
    }

    public function importUsers(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'excel' => 'required|mimes:xlsx, xls',
            ]);

            if ($validator->fails()){
                return Response()->json(['error' => ['type' => 'error', 'text' => $validator->errors()->first()]]);
            }

            $data = Excel::toArray(new UsersImport, request()->file('excel'));
            $array_errors = array();

            foreach ($data[0] as $row) {
                $process = true;
                $string_errors = "";

                //Validate if document exist
                $profile = Profiles::where('name', $row['profile'])->first();
                if (!$profile) {
                    $string_errors = "El perfil de asignado no existe: " . $row['profile'];
                    $process = false;
                }

                $gender = Genders::where('name', $row['gender'])->first();
                if (!$gender) {
                    $string_errors = "El género de asignado no existe: " . $row['gender'];
                    $process = false;
                }

                $labor_area = LaborAreas::where('name', $row['labor_area'])->first();
                if (!$labor_area) {
                    $string_errors = "El área de trabajo de asignado no existe: " . $row['labor_area'];
                    $process = false;
                }

                $document = User::where('document_number', $row['document_number'])->first();
                if ($document) {
                    $string_errors = "El documento de identidad ya se encuentra registrado: " . $row['document_number'];
                    $process = false;
                }

                if (!is_numeric($row['document_number'])) {
                    $string_errors = "El documento debe ser valores numéricos";
                    $process = false;
                }

                if ($row['document_number'] == null or $row['name'] == null or $row['lastname'] == null or $row['email'] == null or $row['gender'] == null or $row['profile'] == null) {
                    $string_errors = "Todos los datos del excel solicitados son requeridos";
                    $process = false;
                }

                $regexp = '/^[^$%&|<>#]*$/';
                if (!(preg_match($regexp, $row['document_number'])) or !(preg_match($regexp, $row['name'])) or !(preg_match($regexp, $row['lastname'])) or !(preg_match($regexp, $row['email'])) or !(preg_match($regexp, $row['gender'])) or !(preg_match($regexp, $row['labor_area'])) or !(preg_match($regexp, $row['profile']))) {
                    $string_errors = "Solo se permiten letras (a-z) y números (0-9)";
                    $process = false;
                }

                if (!filter_var($row['email'], FILTER_VALIDATE_EMAIL)) {
                    $string_errors = "El email introducido no es valido: " . $row['email'];
                    $process = false;
                }

                // $email = User::where('email', $row['email'])->first();
                // if ($email) {
                //     $string_errors = "El email ya se encuentra registrado: " . $row['email'];
                //     $process = false;
                // }

                // $phone = User::where('phone', $row['phone'])->first();
                // if ($phone) {
                //     $string_errors = "El número telefónico ya se encuentra registrado: " . $row['phone'];
                //     $process = false;
                // }

                if (!is_numeric($row['phone'])) {
                    $string_errors = "El número telefónico debe ser valores numericos";
                    $process = false;
                }

                if ($process) {
                    $user = $this->usersRepository->importUser($row['name'], $row['lastname'], $row['document_number'], $row['phone'], $row['email'], $row['gender'], $row['labor_area'], $row['profile']);
                    // $user->save();
                    $array_errors[] = "Procesado correctamente";
                } else {
                    $array_errors[] = $string_errors;
                }
            }

            return Response()->json(['data_erros' => $array_errors,]);
        } catch (\Exception $e) {
            return Response()->json([
                'error' => ['type' => 'error', 'text' => $e->getMessage()],
            ]);
        }
    }

    public function editProfile(){
        $user = Users::where('id',  Auth::id())->first();
        $genders = $this->usersRepository->getAllGenders();
        return view('users.updated-user-profile', ['user' => $user, 'genders' => $genders]);
    }

    function updateProfile($id)
    {
        $this->usersRepository->updateProfile($id);
        return redirect('/profile');
    }
}
