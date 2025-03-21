<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Realiza login
     */
    public function login(Request $request)
    {
        try {
            $validateData = $request->validate([
                'email' => 'required|email',
                'password' => 'required|string'
            ], customErrorMessages());

            // Procura user
            $user = User::where('email', $validateData['email'])->first();
            if (!$user || !Hash::check($validateData['password'], $user->password)) {
                throw new \Exception('The credentials provided are incorrect.', 403);
            }

            // Cria token
            $token = $user->createToken('login_token')->plainTextToken;
            $expirationMinutes = config('sanctum.expiration');
            $expiresAt = $expirationMinutes ? now()->addMinutes($expirationMinutes) : null;
            $expiresAt = Carbon::parse($expiresAt)->timestamp;

            $userResponse = [
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => date('Y-m-d H:i:s', strtotime($user->created_at))
            ];

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Success logging in',
                'user' => $userResponse,
                'access_token' => $token,
                'access_token_expiration' => $expiresAt
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 403,
                'success' => false,
                'message' => 'Error logging in',
                'error' => $e->getMessage()
            ], 403);
        }
    }


    /**
     * Valida o token
     */
    public function validateToken(Request $request)
    {
        try {
            $token = $request->bearerToken();
            if (!$token) {
                throw new \Exception('The credentials provided are incorrect.', 403);
            }

            // Verifica se o token é válido
            $user = Auth::guard('sanctum')->user();
            if (!$user) {
                return response()->json([
                    'status' => 401,
                    'success' => false,
                    'message' => 'Invalid or expired token'
                ], 401);
            }

            $expirationMinutes = config('sanctum.expiration');
            $expiresAt = $expirationMinutes ? now()->addMinutes($expirationMinutes) : null;
            $expiresAt = Carbon::parse($expiresAt)->timestamp;

            $userResponse = [
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => date('Y-m-d H:i:s', strtotime($user->created_at))
            ];

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Token is valid',
                'user' => $userResponse,
                'access_token_expiration' => $expiresAt
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 401,
                'success' => false,
                'message' => 'Error validating token',
                'error' => $e->getMessage()
            ], 401);
        }
    }
}
