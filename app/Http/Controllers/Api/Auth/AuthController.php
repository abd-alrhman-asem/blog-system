<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Traits\apiResponseTrait;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


class AuthController extends Controller
{
    use apiResponseTrait;

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login' , 'test','register']]);
    }
    /**
    * regester the users .
    *
    * return the user and his token
    */
    public  function register(RegisterRequest $request) {
        $user = User::create([
                  'name' => $request->name,
                  'email' => $request->email,
                  'password' => Hash::make($request->password),
                  'cell_phone' => $request->cell_phone
              ]);
        return $this->apiResponse('true' , $user , ' the user has been registered '  , 200) ;
    }
    /**
     * Get a JWT via given credentials.
     *
     * return the user and his token
     */
    public function login ( LoginRequest $request){

        $credentials = $request->only('email', 'password');
        if (! $token = auth()->attempt($credentials)) {
            return $this->apiResponse(false , null  , 'Unauthorized'  , ResponseAlias::HTTP_UNAUTHORIZED );
        }
        $user = auth()->user();
        $data = ['token' => $token , 'user' => $user];
        return $this->apiResponse(true , $data ,'the user has login successfully' , ResponseAlias::HTTP_OK  );
    }
    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     */
    protected function me()
    {
        return $this->apiResponse(true , auth()->user()  , "this is me " , ResponseAlias::HTTP_OK);
    }
    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */

    public function logout()
    {
        auth()->logout();
        return $this->apiResponse(true   , 'no data ' , 'user logout successfully' , ResponseAlias::HTTP_OK);
    }

}
