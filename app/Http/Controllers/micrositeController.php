<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class micrositeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = role::all();
        $user = user::all();
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
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
