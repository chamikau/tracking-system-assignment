<?php

namespace App\Http\Controllers;
use App\Models\IssueCategory;

use Illuminate\Http\Request;

class IssueCategoryController extends Controller
{
    /**
     * List all IssueCategory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(
            IssueCategory::all()
        );
    }
    /*
     * Store an IssueCategory
     */
    public function store(Request $request)
    {
    /*
    *validate issue_id and category_id
    */
    $rules=array(
        'issue_id'=>"required|integer",
        'category_id'=>"required|integer"
    );
    /*
    *check errors for entired data
    */
    $validator=Validator::make($request->all(),$rules);
    if($validator->fails()){
        return $validator->errors();
    }else{
        $result = IssueCategory::create([
              'issue_id' => $request->issue_id,
              'category_id' => $request->category_id,
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
     * Find an IssueCategory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(IssueCategory $issuecategory)
    {
        return response()->json(
            $issuecategory
        );
    }

    /*
     * Update an IssueCategory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request , IssueCategory $issuecategory)
    {
    /*
    *validate issue_id and category_id
    */
    $rules=array(
        'issue_id'=>"required|integer",
        'category_id'=>"required|integer"
    );
    /*
    *check errors for entired data
    */
    $validator=Validator::make($request->all(),$rules);
    if($validator->fails()){
        return $validator->errors();
    }else{
        $result = $issuecategory->update($request->all());
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
     * Delete an IssueCategory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(IssueCategory $issuecategory)
    {
        $result = $issuecategory->delete();

        if($result){
            return ["result"=>"Data Deleted"];
        }else{
            return ["result"=>"Data Not Deleted"];
        }
    }
}
