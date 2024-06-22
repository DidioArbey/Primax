<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\AuditUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;

class JwtAuthenticationController extends Controller {

    public function __construct() {
        $this->middleware('guest')->except('logout');

    }

    public function generateToken(Request $request) {

        $validator = Validator::make($request->all(), [
                    'email' => 'required|string',
                    'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $token = compact('token');

        User::where('email', $request->email)
                ->update(['access_token' => $token['token']]);

//        dd();


            $datas = $request->getContent();
            $parsedJson = json_decode($datas, true);
           

            // return response()->json([
            //     'token' =>$token,
            //     'user' => auth()->user()
            // ]);
            return response()->json(auth()->user());
    }

    public function loginJWT($token) {

//        return "Hola mundo";
        $user = User::where([
                    'access_token' => $token
                ])->first();

        if ($user) {
            Auth::login($user);
            $this->authenticated($user);
            return redirect('/home');
        }

        return redirect('/login');

    }


    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated($user) {
        $audit_user = new AuditUsers;
        $audit_user->user_id = $user->id;
        $audit_user->save();
    }

//    public function getAuthenticatedUser() {
//        try {
//            if (!$user = JWTAuth::parseToken()->authenticate()) {
//                return response()->json(['user_not_found'], 404);
//            }
//        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
//            return response()->json(['token_expired'], $e->getStatusCode());
//        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
//            return response()->json(['token_invalid'], $e->getStatusCode());
//        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
//            return response()->json(['token_absent'], $e->getStatusCode());
//        }
//        return response()->json(compact('user'));
//    }
}
