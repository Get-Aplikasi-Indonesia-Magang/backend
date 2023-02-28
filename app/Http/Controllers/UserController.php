<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = User::all();
        return response()->json([
            'data' => $data,
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
      
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = new User();
        $user->name = $request->name;
        $user->role_id = $request->role;
        $user->email = $request->email;
        $user->save();
        return response()->json([
            'name'=>$user,
        ],200);
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $user = User::find($id);
            if(!$user){
                return response()->json([
                    'message' => 'User Not Found',
                ], 404);
            }
            
            $user->name = $request->input('name');
            $user->role_id = $request->input('role');
            $user->email = $request->input('email');

            $user->save();

            return response()->json([
               'message' => 'User Update',
               'user' => $user, 
            ], 200,);
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find($id);
        if(!$user){
            return response()->json([
                'message' => 'User Not Found'
            ], 404);
        }

        $user->delete();
        return response()->json([
            'message' => 'Berhasil'
        ], 200);
    }

   
}
