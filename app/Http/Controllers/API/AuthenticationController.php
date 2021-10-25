<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function verify(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'mobile' => 'required|regex:/^01[0-9]{9}$/',
            'otp' => 'required|string|min:6'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=> 'failed',
                'msg' => 'failed to validate request.',
                'data' => $validator->errors()
            ], 400);
        }
        $user = User::where('mobile', $request->mobile)->where(['otp' => $request->otp])->first();

        if ($user) {
            $token = $user->createToken('daktarLagbe')->accessToken;
            $user->otp = null;
            $user->verified = true;
            $user->save();
            $user['token'] = $token;
            return response()->json([
                'status' => "success",
                'msg' => "User Verified successfully.",
                "data" => $user
            ], 200);
        }
        return response()->json([
            'status' => "error",
            'msg' => "User not found.",
            "data" => []
        ], 404);
    }
}
