<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class usersControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return response()->json([
            'message' => 'success',
            'data' => $user,
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->id_role = $request->id_role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
        return response()->json([
            'message' => 'success',
            'data' => $user,
        ], 200);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'message' => 'not found',
            ], 404);
        }

        $user->id_role = $request->id_role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->update();

        $user->update();
        return response()->json([
            'message' => 'success',
            'data' => $user,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'message' => 'not found',
            ], 404);
        }
        $user->delete();
        return response()->json([
            'message' => 'success',
        ], 200);
    }
}
