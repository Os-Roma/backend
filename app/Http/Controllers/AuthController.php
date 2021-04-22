<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt', ['except' => [ 'unauthorized', 'login']]);
        $this->guard = 'api';
    }

    public function unauthorized() {
    	return response()->json(Response::HTTP_UNAUTORIZED);
    }

    /**
     * @return \Illuminate\Http\JsonResponse */

    public function login() // Get a JWT via given credentials.
    {

        $credentials = request(['email','password']);

        if(! $token = auth($this->guard)->attempt($credentials)){
            return response()->json(['error' => 'Unauthorized'],401);
        }
        $token = $this->respondWithToken($token);

        $user = response()->json(auth($this->guard)->user());
        return response()->json(['token' => $token, 'user' => $user],200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */

    public function me() // Get the authenticated User.
    {
        return response()->json(auth($this->guard)->user());
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */

    public function logout() // Log the user out (Invalidate the token).
    {
        auth($this->guard)->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */

    public function refresh() // Refresh a token.
    {
        return $this->respondWithToken(auth($this->guard)->refresh());
    }

    /**
     * @param string $token
     * @return \Illuminate\Http\JsonResponse */

    protected function respondWithToken($token) // Get the token array structure.
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth($this->guard)->factory()->getTTL() * 60
        ]);
    }
}
