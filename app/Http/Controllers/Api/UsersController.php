<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json([
            'data' => $users
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'phone' => 'required|numeric',
                'address' => 'required|string'
            ]);
            $validatedData['password'] = bcrypt($validatedData['password']);
            $validatedData['role'] = 'user';
            $user = User::create($validatedData);
            return response()->json([
                'data' => $user
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'User not created',
                'error' => $e->errors()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if (!$user) return response()->json(['message' => 'User not found'], 404);
        return response()->json([
            'data' => $user
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if (!$user) return response()->json(['message' => 'User not found'], 404);
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
                'phone' => 'required|numeric',
                'address' => 'required|string'
            ]);
            $user->update($validatedData);
            return response()->json([
                'data' => $user
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'User not updated',
                'error' => $e->errors()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) return response()->json(['message' => 'User not found'], 404);
        $user->delete();
        return response()->json([
            'message' => 'User deleted'
        ], 200);
    }
}
