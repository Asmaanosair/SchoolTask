<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\AppResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;

class UserController extends Controller
{
    use AppResponse;
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);
        if (!auth('api')->attempt($credentials)) {
            return $this->failedResponse('Invalid Data',400);
        }
        $user = User::where('email', $request['email'])->firstOrFail();
       $token = JWTAuth::fromUser($user);;
        return $this->successResponse(['token'=>$token,'user'=>$user],200) ;
    }
}
