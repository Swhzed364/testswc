<?php

namespace App\Http\Controllers\api\User;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LoginController extends BaseController
{

    public function __invoke()
    {
        $credentials = request(['login', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'error' => 'Unauthorized'
            ], 401);
        }else{
            $user = User::where(['login' => $credentials['login']])->get();
        }

        $user = $user[0];

        $this->acquireToken($user);

        return [
            'error' => Session::get('errors'),
            'result' => [
                'id' => $user->id,
                'first_name' => $user->name,
                'last_name' => $user->last_name,
                'api_token' => $user->api_token,
            ]
        ];
    }

    public function acquireToken($user)
    {
        if($user->api_token == null){
            $user->api_token = Str::random();
            $user->save();
        }
    }
}
