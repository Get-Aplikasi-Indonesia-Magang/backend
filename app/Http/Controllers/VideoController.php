<?php

namespace App\Http\Controllers;

use App\Models\VideoModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $video = VideoModel::all();

        return response()->json([
            'message' => 'Berhasil',
            'Video' => $video
        ], 200);
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
        $video = new VideoModel();
        $video->user_id = $request->user_id;
        $video->link = $request->link;
        $video->save();

        return response()->json([
            'message' => 'Berhasil',
            'Video' => $video
        ], 200);
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
        $video = new VideoModel();
        $video = VideoModel::find($id);
        if(!$video){
            return response()->json([
                'message' => 'Video tidak di temukan'
            ], 404);
        }

        $video->user_id = $request->user_id;
        $video->link = $request->link;
        $video->update();

        return response()->json([
            'message' => 'Berhasil',
            'Video' => $video
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $video = VideoModel::find($id);
        if(!$video){
            return response()->json([
                'message' => 'Video tidak di temukan'
            ], 200);
        }

        $video->delete();
        return response()->json([
            'message' => 'Berhasil Hapus'
        ], 200);
    }
}
