<?php

namespace App\Http\Controllers;

use App\Models\Issue;

use Validator;
use App\Models\Comment;



use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * List all issues
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(
            Issue::all()
        );
    }
    /*
     * Store an issue
     */
    public function store(Request $request)
    {
    /*
    *validate title,body,uuid and slug
    */
          $rules=array(
            'title'=>"required|min:5|max:55",
            'body'=>"required|min:10|max:225",
            'uuid'=>"required",
            'slug'=>"required"
        );
    /*
    *check errors for entired data
    */
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }else{
            $result=Issue::create([
                'title' => $request->title,
                'body' => $request->body,
                'uuid' => $request->uuid,
                'slug' => $request->slug,
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
     * Find an issue
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {

 //get comment table data using foriegn key(one to Many relationship)
        
 
        $result= issue::find($id)->comments;
        return $result;
           
           
    }

    /*
     * Update an issue
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function update(Request $request,Issue $issue)
    {
    /*
    *validate title,body,uuid and slug
    */
        $rules=array(
            'title'=>"required|min:5|max:55",
            'body'=>"required|min:10|max:225",
            'uuid'=>"required",
            'slug'=>"required"
        );
    /*
    *check errors for entired data
    */
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }else{
           $result = $issue->update($request->all());
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
     * Delete an issue
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Issue $issue)
    {
        $result = $issue->delete();

        if($result){
            return ["result"=>"Data Deleted"];
        }else{
            return ["result"=>"Data Not Deleted"];
        }
    }


}
