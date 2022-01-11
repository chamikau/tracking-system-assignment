<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\IssueCategoryController;
use App\Http\Controllers\IssueSubCategoryController;
use App\Http\Controllers\SubCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//routes for issues
Route::apiResource('issue', IssueController::class);
//routes for categorie
Route::apiResource('category',CategoryController::class);
//routes for comment
Route::apiResource('comment', CommentController::class);
//routes for image
Route::apiResource('image', ImageController::class);
//routes for issuecategory
Route::apiResource('issuecategory', IssueCategoryController::class);
//routes for issuesubcategory
Route::apiResource('issuesubcategory', IssueSubCategoryController::class);
//routes for subcategory
Route::apiResource('subcategory', SubCategoryController::class);

