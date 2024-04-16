<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        try {
            $validadeData = $request->validated();
            $validadeData['password'] = bcrypt($validadeData['password']);

            User::create($validadeData);

            return response()->json([
                "message" => "user create with sucess",
                "data" => []
            ], Response::HTTP_CREATED);

        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage(),
                "data" => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function login(Request $request)
    {
        try {
            if (Auth::attempt($request->only(["email", "password"]))) {
                $user = User::where("email", $request["email"])->firstOrFail();
                $token = $user->createToken("auth_token")->plainTextToken;

                return response()->json([
                    "message" => "Authorized",
                    "data" => [
                        "token" => $token,
                        "token_type" => "Bearer"
                    ]
                ], Response::HTTP_OK);
            }

            return response()->json([
                "message" => "Unauthorized",
                "data" => []
            ], Response::HTTP_UNAUTHORIZED);

        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage(),
                "data" => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return response()->json([
                "message" => "User logout",
                "data" => []
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage(),
                "data" => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
