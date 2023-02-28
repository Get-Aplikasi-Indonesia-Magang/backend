<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori_model;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Kategori_model::all();
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
        $kategori = new Kategori_model();
        $kategori->nama_kategori = $request->name;
        $kategori->save();
        return response()->json([
            'Kategori'=>$kategori,
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
        $kategori = Kategori_model::find($id);
        if(!$kategori){
            return response()->json([
                'message' => 'kategori Not Found',
            ], 404);
        }
        
        $kategori->nama_kategori = $request->input('name');
        $kategori->save();

        return response()->json([
           'message' => 'kategori Update',
           'kategori' => $kategori, 
        ], 200,);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $kategori = Kategori_model::find($id);
        if(!$kategori){
            return response()->json([
                'message' => 'kategori Not Found'
            ], 404);
        }

        $kategori->delete();
        return response()->json([
            'message' => 'Berhasil'
        ], 200);
    }
}
