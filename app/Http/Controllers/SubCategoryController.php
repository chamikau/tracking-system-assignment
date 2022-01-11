<?php

namespace App\Http\Controllers;
use App\Models\SubCategory;
use Validator;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * List all SubCategory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(
            SubCategory::all()
        );
    }
    /*
     * Store an SubCategory
     */
    public function store(Request $request)
    {
    /*
    *Validate data category_id,name and description
    */
        $rules=array(
            'category_id'=>"required|integer",
            'name'=>"required|min:4|max:55",
            'description'=>"required|min:10|max:225"
        );
    /*
    *check errors for entired data
    */
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }else{
        $result = SubCategory::create([
              'category_id' => $request->category_id,
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
     * Find an SubCategory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(SubCategory $subcategory)
    {
        return response()->json(
            $subcategory
        );
    }

    /*
     * Update an SubCategory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request , SubCategory $subcategory)
    {
    /*
    *Validate data category_id,name and description
    */ 
        $rules=array(
            'category_id'=>"required|integer",
            'name'=>"required|min:4|max:55",
            'description'=>"required|min:10|max:225"
        );
    /*
    *check errors for entired data
    */
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }else{
        $result = $subcategory->update($request->all());
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
     * Delete an SubCategory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(SubCategory $subcategory)
    {
        $result = $subcategory->delete();
        if($result){
            return ["result"=>"Data Deleted"];
        }else{
            return ["result"=>"Data Not Deleted"];
        }
         
      }
}
