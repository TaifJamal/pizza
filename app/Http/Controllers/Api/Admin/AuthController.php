<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Http\Requests\loginRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use GeneralTrait;


   public function login(LoginRequest $request)
    {
        try {

            $admin = User::where('email', $request->email)->first();

            if (!$admin || !Hash::check($request->password, $admin->password)) {
                return $this->returnError('401', 'Unauthorized');
            }

            $token = $admin->createToken('admin-api-token', ['*'], now()->addDay(10))->plainTextToken;

            return $this->returnData('user', new UserResource($admin), 'damin login successfully', $token);
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return $this->returnSuccessMessage('Logged out successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
}
