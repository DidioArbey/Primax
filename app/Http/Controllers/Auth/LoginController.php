<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
        |--------------------------------------------------------------------------
        | Login Controller
        |--------------------------------------------------------------------------
        |
        | This controller handles authenticating users for the application and
        | redirecting them to your home screen. The controller uses a trait
        | to conveniently provide its functionality to your applications.
        |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->username = $this->findUsername();
    }

    public function findUsername()
    {

        $login = request()->input('document_number');
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'document_number';
        request()->merge([$fieldType => $login]);
        return $fieldType;
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
        $user = User::where($this->username(), '=', $request->input($this->username()))->first();
        if ($user) {
            if ($user->active != 1) {
                throw ValidationException::withMessages([$this->username() => __('La cuenta esta inactiva.')]);
            } else {
                // $this->setSessionVars($user);
                // $audit_user = new AuditUsers;
                // $audit_user->user_id = $user->id;
                // $audit_user->save();
            }
            if ($user->state_id == 4) {
                throw ValidationException::withMessages([$this->username() => __('El usuario fue eliminado de la plataforma.')]);
            }
        } else {
            throw ValidationException::withMessages([$this->username() => __('El usuario no se encuentra registrado')]);
        }
    }

    public function setSessionVars($user)
    {
        // $permissions = ProfilePermissions::where('profile_id', '=', $user->profile_id)->get();
        // $array_permissions=array();
        // foreach($permissions as $permission){
        //     array_push($array_permissions, $permission->permission_id);
        // }
        // Session::put('permissions', $array_permissions);
    }

    /**
     * Get username property.
     *
     * @return string
     */
    public function username()
    {
        return $this->username;
    }
}
