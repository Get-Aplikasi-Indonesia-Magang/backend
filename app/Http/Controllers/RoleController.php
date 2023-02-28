<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\role;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = role::all();
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
        $role = new role();
        $role->name = $request->name;
        $role->save();
        return response()->json([
            'name'=>$role,
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
        //
        $role = role::find($id);
        if(!$role){
            return response()->json([
                'message' => 'Role Not Found',
            ], 404);
        }
        
        $role->name = $request->input('name');
        $role->save();

        return response()->json([
           'message' => 'Role Update',
           'Role' => $role, 
        ], 200,);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $role = role::find($id);
        if(!$role){
            return response()->json([
                'message' => 'Role Not Found'
            ], 404);
        }

        $role->delete();
        return response()->json([
            'message' => 'Berhasil'
        ], 200);
    }
}
