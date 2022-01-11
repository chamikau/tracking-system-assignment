<?php

namespace App\Http\Controllers;
use App\Models\Image;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * List all Image
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(
            Image::all()
        );
    }
    /*
     * Store an Image
     */
    public function store(Request $request)
    {
        Image::create([
              'imagable_type' => $request->imagable_type,
              'imagable_id' => $request->imagable_id,
              'size' => $request->size,
              'path' => $request->file('path')->store('public/upload'),
              'name' => $request->name,
              'extension' => $request->extension,
          ]);   


          return response()->noContent();
    }

    /*
     * Find an Image
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Image $image)
    {
        return response()->json(
            $image
        );
    }

    /*
     * Update an Image
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request , Image $image)
    {
        $image->update($request->all());

        return response()->noContent();
    }

    /*
     * Delete an Image
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Image $image)
    {
        $result = $image->delete();

        if($result){
            return ["result"=>"Data Deleted"];
        }else{
            return ["result"=>"Data Not Deleted"];
        }
    }
}
