<?php

namespace App\Http\Controllers;
use App\Models\Comment;

use Validator;



use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * List all Comment
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(
            Comment::all()
        );
    }
    /*
     * Store an Comment
     */
    public function store(Request $request)
    {
    /*
    *validate issue_id and body
    */
        $rules=array(
            'issue_id'=>"required|integer",
            'body'=>"required|min:10|max:225"
        );
    /*
    *check errors for entired data
    */
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }else{
        $result = Comment::create([
              'issue_id' => $request->issue_id,
              'body' => $request->body,
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
     * Find an Comment
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Comment $comment)
    {
        return response()->json(
            $comment
        );
    }

    /*
     * Update an Comment
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request , Comment $comment)
    {
    /*
    *validate issue_id and body
    */
        $rules=array(
            'issue_id'=>"required|integer",
            'body'=>"required|min:10|max:225"
        );
    /*
    *check errors for entired data
    */
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }else{
            $result = $comment->update($request->all());
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
     * Delete an Comment
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Comment $comment)
    {
        $result = $comment->delete();

        if($result){
            return ["result"=>"Data Deleted"];
        }else{
            return ["result"=>"Data Not Deleted"];
        }
    }
}
