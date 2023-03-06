<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('owner-list',[OwnerController::class,'index']);
Route::get('add-owner',[OwnerController::class,'addOwner']);
Route::post('save-owner',[OwnerController::class,'saveOwner']);
Route::get('edit-owner/{id}',[OwnerController::class,'editOwner']);
Route::post('update-owner',[OwnerController::class,'updateOwner']);
Route::get('delete-owner/{id}',[OwnerController::class,'deleteOwner']);




