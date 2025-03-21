<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Cria um user
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'confirmed',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/'
                ],
            ]);

            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password'])
            ]);

            $userResponse = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at->format('Y-m-d H:i:s')
            ];

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Success creating user',
                'user' => $userResponse
            ], 201);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Error creating user',
                'error' => $th->getMessage()
            ], 500);
        }
    }


    /**
     * Atualiza um user
     */
    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            $validatedData = $request->validate([
                'id' => 'nullable|integer',
                'name' => 'nullable|string'
            ]);

            $loggedUser = Auth::user();
            $userId = $loggedUser->type == 'admin' && isset($validatedData['id']) ? $validatedData['id'] : $loggedUser->id;

            $user = User::find($userId);
            if (!$user) {
                throw new \Exception('User not found', 404);
            }

            $updateArray = [];
            foreach ($validatedData as $key => $value) {
                $updateArray += [$key => $value];
            }

            if (count($updateArray) > 0) {
                $user->update($updateArray);
            }

            $userResponse = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at->format('Y-m-d H:i:s')
            ];

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Success updating user',
                'user' => $userResponse
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            $message = $th->getCode() <= 500 ? $th->getMessage() : 'Error updating user';
            $code = $th->getCode() > 100 && $th->getCode() <= 500 ? $th->getCode() : 500;

            return response()->json([
                'success' => false,
                'message' => $message,
                'error' => $th->getMessage()
            ], $code);
        }
    }


    /**
     * Deleta um user
     */
    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();

            $validatedData = $request->validate([
                'id' => 'nullable|integer'
            ]);

            $loggedUser = Auth::user();
            $userId = $loggedUser->type == 'admin' && isset($validatedData['id']) ? $validatedData['id'] : $loggedUser->id;

            $user = User::find($userId);
            if (!$user) {
                throw new \Exception('User not found', 404);
            }
            if ($user->type == 'admin') {
                throw new \Exception('Did someone cast Confusion on you', 500);
            }

            $userResponse = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at->format('Y-m-d H:i:s')
            ];

            $user->delete();

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Success deleting user',
                'user' => $userResponse
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            $message = $th->getCode() <= 500 ? $th->getMessage() : 'Error deleting user';
            $code = $th->getCode() > 100 && $th->getCode() <= 500 ? $th->getCode() : 500;

            return response()->json([
                'success' => false,
                'message' => $message,
                'error' => $th->getMessage()
            ], $code);
        }
    }


    /**
     * Busca um user
     */
    public function show(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'id' => 'nullable|integer'
            ]);
            $loggedUser = Auth::user();
            $userId = $loggedUser->type == 'admin' && isset($validatedData['id']) ? $validatedData['id'] : $loggedUser->id;

            $user = User::find($userId);
            if (!$user) {
                throw new \Exception('User not found', 404);
            }

            $userResponse = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at->format('Y-m-d H:i:s'),
                'campaigns' => Campaign::where('user_id', $user->id)->get()->map(function ($campaign) {
                    return [
                        'id' => $campaign->id,
                        'name' => $campaign->name,
                        'description' => $campaign->description,
                        'created_at' => $campaign->created_at->format('Y-m-d H:i:s')
                    ];
                })
            ];

            return response()->json([
                'success' => true,
                'message' => 'Success consulting user',
                'user' => $userResponse
            ], 200);
        } catch (\Throwable $th) {
            $message = $th->getCode() <= 500 ? $th->getMessage() : 'Error consulting user';
            $code = $th->getCode() > 100 && $th->getCode() <= 500 ? $th->getCode() : 500;

            return response()->json([
                'success' => false,
                'message' => $message,
                'error' => $th->getMessage()
            ], $code);
        }
    }
}
