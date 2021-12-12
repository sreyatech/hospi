<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// admin

Route::get('/add_doctor_view',[AdminController::class,'addview']); 
Route::post('/upload_doctor',[AdminController::class,'upload']); 
Route::get('/showappointments',[AdminController::class,'showappointments']); 
Route::get('/approve/{id}',[AdminController::class,'approve']); 
Route::get('/cancel/{id}',[AdminController::class,'cancel']); 
Route::get('/emailview/{id}',[AdminController::class,'emailview']); 
Route::post('/sendemail/{id}',[AdminController::class,'sendemail']); 
Route::get('/showalldoctors',[AdminController::class,'showalldoctors']); 
Route::get('/updatedoctor/{id}',[AdminController::class,'updatedoctor']); 
Route::post('/editdoctor/{id}',[AdminController::class,'editdoctor']); 
Route::get('/deletedoctor/{id}',[AdminController::class,'deletedoctor']); 

// home

Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified'); 
Route::post('/appointment',[HomeController::class,'appointment']); 
Route::get('/myappointment',[HomeController::class,'myappointment']); 
Route::get('/cancel_appo/{id}',[HomeController::class,'cancel_appo']); 



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
