<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content_model;
use App\Http\Controllers\Controller;

class contentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Content_model::all();
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
        $content = new Content_model();
        $content->kategory_id = $request->kategori_id;
        $content->save();
        return response()->json([
            'Konten'=>$content,
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
        $content = Content_model::find($id);
        if(!$content){
            return response()->json([
                'message' => 'Content Not Found',
            ], 404);
        }
        
        $content->kategory_id = $request->input('kategori_id');
        $content->save();

        return response()->json([
           'message' => 'Content Update',
           'Content' => $content, 
        ], 200,);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $content = Content_model::find($id);
        if(!$content){
            return response()->json([
                'message' => 'Content Not Found'
            ], 404);
        }

        $content->delete();
        return response()->json([
            'message' => 'Berhasil'
        ], 200);
    }
}
