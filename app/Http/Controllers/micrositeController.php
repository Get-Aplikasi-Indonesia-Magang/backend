<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class micrositeController extends Controller
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
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->icon = $request->icon;
        $user->id_role = $request->id_role;
        $user->title = $request->title;
        $user->bio = $request->bio;
        $user->instagram = $request->instagram;
        $user->twitter = $request->twitter;
        $user->facebook = $request->facebook;
        $user->youtube = $request->youtube;
        $user->tiktok = $request->tiktok;

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

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->icon = $request->icon;
        $user->id_role = $request->id_role;
        $user->title = $request->title;
        $user->bio = $request->bio;
        $user->instagram = $request->instagram;
        $user->twitter = $request->twitter;
        $user->facebook = $request->facebook;
        $user->youtube = $request->youtube;
        $user->tiktok = $request->tiktok;

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
