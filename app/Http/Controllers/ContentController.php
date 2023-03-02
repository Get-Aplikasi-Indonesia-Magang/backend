<?php

namespace App\Http\Controllers;

use App\Models\content;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $content = content::all();
        return response()->json([
            'message' => 'success',
            'content' => $content,
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
        $content = new content();

        $content->microsite_id = $request->microsite_id;
        $content->link = $request->link;
        $content->title = $request->title;
        $content->description = $request->description;
        $file = $request->file('image');
        $content->image = time() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('uploads', $content->image, 'public');

        $file->move(public_path('uploads'), $content->image);

        $content->save();

        return response()->json([
            'message' => 'success',
            'file_path' => Storage::url($filePath),
            'data' => $content,
        ], 200);
    }

    /**
     * Display the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $content = content::find($id);

        if (!$content) {
            return response()->json([
                'message' => 'not found',
            ], 404);
        }

        $content->microsite_id = $request->microsite_id;
        $content->image = $request->image;
        $content->link = $request->link;
        $content->title = $request->title;
        $content->description = $request->description;


        $content->update();

        return response()->json([
            'message' => 'success',
            'data' => $content,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $content = content::find($id);
        if (!$content) {
            return response()->json([
                'message' => 'Tidak Berhasil'
            ], 404);
        }

        $content->delete();
        return response()->json([
            'message' => 'Berhasil'
        ], 200);
    }
}
