<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\User;

class APIAuthController extends Controller
{
    public function login(Request $request) {
        $username = $request->getUser();
        $password = $request->getPassword();

        if ($username == "") return response()->json([
            'error' => [
                "code" => 400,
                "message" => "Missing username"
            ]
        ], 400);

        if ($password == "") return response()->json([
            'error' => [
                "code" => 400,
                "message" => "Missing password"
            ]
        ], 400);

        // Find user based on username
        $user = User::where('username', $username)->first();

        // Check if there is a user with matching password
        if ($user && Hash::check($password, $user->password)) {
            // Create a new token
            $token = Str::random(60);
            // Save the token
            $user->api_token = hash('sha256', $token);
            $user->save();

            return response()->json([
                'message' => 'Login successful',
                'access_token' => $token,
                'token_type' => 'Bearer'
            ]);
        }

        return response()->json([
            'error' => [
                "code" => 401,
                "message" => "Invalid credentials"
            ]
        ], 401);
    }
}
