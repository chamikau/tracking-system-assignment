<?php

namespace App\Http\Controllers;
use App\Models\IssueSubcategory;

use Illuminate\Http\Request;

class IssueSubCategoryController extends Controller
{
    /**
     * List all IssueSubcategory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(
            IssueSubcategory::all()
        );
    }
    /*
     * Store an IssueSubcategory
     */
    public function store(Request $request)
    {
        /*
        *Validate data issue_id and subcategory_id
        */
        $rules=array(
            'issue_id'=>"required|integer",
            'subcategory_id'=>"required|integer"
        );
        /*
        *check errors for entired data
        */
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }else{
        $result = IssueSubcategory::create([
              'issue_id' => $request->issue_id,
              'subcategory_id' => $request->subcategory_id

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
     * Find an IssueSubcategory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(IssueSubcategory $issuesubcategory)
    {
        return response()->json(
            $issuesubcategory
        );
    }

    /*
     * Update an IssueSubcategory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request , IssueSubcategory $issuesubcategory)
    {
        /*
        *Validate data issue_id and subcategory_id
        */
        $rules=array(
            'issue_id'=>"required|integer",
            'subcategory_id'=>"required|integer"
        );
        /*
        *check errors for entired data
        */
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }else{
        $result = $issuesubcategory->update($request->all());
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
     * Delete an IssueSubcategory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(IssueSubcategory $issuesubcategory)
    {
        $result = $issuesubcategory->delete();

        if($result){
            return ["result"=>"Data Deleted"];
        }else{
            return ["result"=>"Data Not Deleted"];
        }
    }
}
