<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    /**
     * Login function
     * @param $request
     * @return User
     */
    public function login(Request $request){
        $user = User::where('email', $request->email)->first();
        $user->tokens()->delete();
        if(!$user || !Hash::check($request->password, $user->password))
        {   
            return response()->json(['sms'=>'invalid', 'email'=> $request->email, 'password'=> $request->password], 404);
        }
        $token = $user->createToken('myToken', ['user'])->plainTextToken;
        return response()->json(['token'=> $token, 'role'=> $user->role], 200);
    }

    /**
     * create user
     * @param Request $request
     * @return user
     */
    public function register(Request $request){
        try {
            $validateUser = Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ]);
            if($validateUser->fails())
            {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'error' => $validateUser->errors(),
                ], 401);
            }
            $user = User::create(
                [
                    'name'=> $request->name,
                    'email'=> $request->email,
                    'password'=> Hash::make($request->password),
                ]
            );
            return response()->json([
                'status' => true,
                'message' => 'user create successful',
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'role' => 'user',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

}
