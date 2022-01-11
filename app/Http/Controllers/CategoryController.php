<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Validator;


use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * List all Category
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(
            Category::all()
        );
    }
    /*
     * Store an Category
     */
    public function store(Request $request)
    {
    
    /*
    *check name and description min and max size
    */
        $rules=array(
            'name'=>"required|min:5|max:55",
            'description'=>"required|min:10|max:225"
        );
    /*
    *check errors for entired data
    */
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }else{
            $result=Category::create([
              'name' => $request->name,
              'description' => $request->description,
          ]);
    /*
    *check data has pass to database
    */
          if($result){
            return ["result"=>"data inserted"];
            }else{
                return ["result"=>"data not inserted"];
            }
        }
   }

    /*
     * Find an Category
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Category $category)
    {
        return response()->json(
            $category
        );
    }

    /*
     * Update an Category
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request , Category $category)
    {
    /*
    *check errors for entired data
    */
        $rules=array(
            'name'=>"required|max:55",
            'description'=>"required|min:10|max:225"
        );
    /*
    *check errors for entired data
    */
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }else{
           $result = $category->update($request->all());
    /*
    *check data has pass to database
    */
          if($result){
            return ["result"=>"data updated"];
            }else{
                return ["result"=>"data not updated"];
            }
        }
    }

    /*
     * Delete an Category
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category $category)
    {
        $result = $category->delete();

        if($result){
            return ["result"=>"Data Deleted"];
        }else{
            return ["result"=>"Data Not Deleted"];
        }
    }
}
