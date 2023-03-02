<?php

namespace App\Http\Controllers;

use App\Models\microsite;
use App\Models\User;
use Illuminate\Http\Request;

class micrositeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $microsite = microsite::all();
        return response()->json([
            'message' => 'success',
            'data' => $microsite,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $microsite = new microsite();
        $microsite->id_user = $request->id_user;
        $microsite->title = $request->title;
        $microsite->bio = $request->bio;
        $microsite->instagram = $request->instagram;
        $microsite->twitter = $request->twitter;
        $microsite->facebook = $request->facebook;
        $microsite->youtube = $request->youtube;
        $microsite->tiktok = $request->tiktok;

        $file = $request->file('icon');
        $microsite->icon = time() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('uploads', $microsite->icon, 'public');

        $file->move(public_path('uploads'), $microsite->icon);

        $microsite->save();
        return response()->json([
            'message' => 'success',
            'data' => $microsite,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $microsite = microsite::find($id);

        if (!$microsite) {
            return response()->json([
                'message' => 'not found',
            ], 404);
        }

        $microsite->id_user = $request->id_user;
        $microsite->icon = $request->icon;
        $microsite->title = $request->title;
        $microsite->bio = $request->bio;
        $microsite->instagram = $request->instagram;
        $microsite->twitter = $request->twitter;
        $microsite->facebook = $request->facebook;
        $microsite->youtube = $request->youtube;
        $microsite->tiktok = $request->tiktok;

        $microsite->update();
        return response()->json([
            'message' => 'success',
            'data' => $microsite,
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
