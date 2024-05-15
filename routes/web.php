<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Models\Listing;



Route::get('/', [ListingController::class,'index']);
// create
Route::get('/create', [ListingController::class,'create']);

// store
Route::post('/create', [ListingController::class,'store']);

// delete
Route::post('/listing/{listing}',[ListingController::class,'delete']);

// edit
Route::get('/listing/edit/{listing}',[ListingController::class,'edit']);

// update 
Route::put('/listing/{listing}',[ListingController::class,'update']);

// show
Route::get('/listing/{li}',[ListingController::class,'show']);

Route::get('/listings/manage',[ListingController::class,'manage']);


// regsiter form view
Route::get('/register',[UserController::class,'create']);

// register to database
Route::post('/users',[UserController::class,'store']);

// login view 
Route::get('/login',[UserController::class,'login']);

// login view 
Route::post('/users/authenticate',[UserController::class,'authenticate']);

// logout user
Route::post('/logout',[UserController::class,'logout']);

